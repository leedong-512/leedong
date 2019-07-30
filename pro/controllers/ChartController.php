<?php
namespace app\controllers;

use app\commands\GateWayBind;
use app\models\ChatLog;
use app\models\User;
use app\models\UserChartList;
use yii\base\UserException;

class ChartController extends BaseController {


    private $clien_id;
/*    public function init()
    {
        parent::init(); // TODO: Change the autogenerated stub
//        $this->clien_id = $this->get_client_id();
//        GateWayBind::Binduid($this->userinfo['userid'], $this->clien_id);
    }*/

    /**
     * @function 绑定uid
     * @return \yii\web\Response
     * @author lidong@simpleedu.com.cn
     */
    public function actionBind() {
        $post = $this->getPost();
        $this->clien_id = $post['client_id'];
        GateWayBind::Binduid($this->userinfo['userid'], $post['client_id']);
        $user_db = User::findOne($this->userinfo['userid']);
        $user_db->client_id = $post['client_id'];
        if(!$user_db->save()) {
            GateWayBind::unBindUid($this->userinfo['userid'], $post['client_id']);
            return $this->asJson(['code' => 500, 'msg' => '绑定失败！']);
        }

        return $this->asJson(['code' => 200, 'msg' => '绑定成功！']);
    }
    public function actionIndex() {
        $this->layout = false;
        $userinfo = User::findOne($this->userinfo['userid']);
        return $this->render('index', ['userinfo' => $userinfo]);
    }
    public function actionChartlist() {
//        $userchartdb = new UserChartList();


        $friendlist = UserChartList::find()->alias('cu')
            ->select(['cu.id', 'cu.slave_uid', 'u.username', 'u.user_icon'])
            ->leftJoin('user u', 'cu.slave_uid = u.id')
            ->where(['master_uid' => $this->userinfo['userid']])
            ->asArray()
            ->all();

        return $this->asJson(['code' => 200, 'mes' => '', 'data' => $friendlist]);
    }


    public function get_client_id() {
        $key = 'test_key_value';
        return md5($key);
    }

    public function actionSendmessage() {
        $post = $this->getPost();

        $db = \Yii::$app->db->beginTransaction();
        try {
            $s_userInfo = User::findOne($this->userinfo['userid']);
            $send_data = [
                'm_uid' => $this->userinfo['userid'],
                'msg' => trim($post['content']),
                's_uid' => (int)$post['s_uid'],
                'user_icon' => $s_userInfo->user_icon,
                's_username' => $s_userInfo->username,
                'send_time' => date('H:i:s')
            ];

            $chat_log_db = new ChatLog();
            $chat_log_db->m_uid = $this->userinfo['userid'];
            $chat_log_db->s_uid = (int)$post['s_uid'];
            $chat_log_db->content = trim($post['content']);
            $chat_log_db->create_time = date('Y-m-d H:i:s');
            $chat_log_db->status = 2;

            if(!$chat_log_db->save()) {
                throw new UserException('发送失败！', 500);
            }
            $send_message = json_encode($send_data);
            GateWayBind::SendMessage((int)$post['s_uid'], $send_message);
            $db->commit();
            return $this->asJson(['code' => 200, 'msg' => '', 'data' => $send_message]);
        } catch (UserException $e) {
            $db->rollBack();
            return $this->asJson(['code' => $e->getCode(), 'msg' => $e->getMessage(), 'data' => '']);
        }




    }


    public function actionAddfriend() {

    }
}