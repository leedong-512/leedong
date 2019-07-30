<?php
namespace app\controllers;

use app\models\User;
use yii\helpers\Url;
use yii\web\Controller;
class UserController extends BaseController {

    public function init()
    {
        parent::init(); // TODO: Change the autogenerated stub\

    }

    /**
     * @function 登录页面
     * @return string
     * @author lidong@simpleedu.com.cn
     */
    public function actionIndex() {
        $this->layout = false;
        return $this->render('login');

    }

    /**
     * @function 登陆操作
     * @return \yii\web\Response
     * @author lidong@simpleedu.com.cn
     */
    public function actionLogin() {
        $post = $this->getPost();
        if(!$this->_isAjax() && !isset($post)) {
            return $this->asJson(['code' => 500, 'msg' => '请求有误！']);
        }
        $username = trim($post['username']);
        $password = md5(md5(trim($post['password'])));
        $data = User::find()->where(['username' => $username])->asArray()->one();
        if(!$data) {
            return $this->asJson(['code' => 500, 'msg' => '用户不存在！']);
        }
        if($data['password'] != $password) {
            return $this->asJson(['code' => 500, 'msg' => '用户名或密码错误！']);
        }

        $session_data = [
            'userid' => $data['id'],
            'username' => $data['username'],
        ];
        $last_login_id_key = 'system_last_login_id';
        $this->getSession()->set($last_login_id_key, $session_data);//存入到session中
        return $this->asJson(['code' => 200, 'msg' => '登录成功！']);

    }

    /**
     * @function 登出操作
     * @return \yii\web\Response
     * @author lidong@simpleedu.com.cn
     */
    public function actionLogout() {
        $this->getSession()->destroy();
        return $this->redirect(Url::to('/user/index'));
    }
}