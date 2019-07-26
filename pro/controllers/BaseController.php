<?php
namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;

class BaseController extends Controller {


    public $userinfo = [];
    public function init()
    {
        parent::init(); // TODO: Change the autogenerated stub

//        $this->getSession()->destroy();
        if($this->id != 'user') {
            $session = $this->getSession()->get('system_last_login_id');
            $this->userinfo = $session;
            if(!$session) {
                $this->redirect('/user/index');
            }
        }
    }

    /*public function behaviors()
    {
        $behaviors = parent::behaviors();
        $access_login = [
            'class' => AccessControl::className(),
            'except' => ['index', 'login'],
            'rules' => [
                [
                    //'actions' => [],
                    'allow' => true,
                    'roles' => ['@'],
                ],
                [
                    'allow' => false,
                    'actions' => [],
                    'roles' => ['?']
                ]
            ],
        ];
        $access_isLogin = [
            'class' => AccessControl::className(),
            'rules' => [
                [
                    'actions' => [],
                    'allow' => true,
                    'roles' => ['@'],
                ],
                [
                    'allow' => false,
                    'actions' => [],
                    'roles' => ['?']
                ]
            ],
        ];

        //管理端登录和其他访问判断区分
        $access = ($this instanceof UserController) ? $access_login : $access_isLogin;
        $behaviors['access'] = $access;
        return $behaviors;
    }*/

    public function getPost() {
        return Yii::$app->request->post();
    }

    public function getGet() {
        return Yii::$app->request->get();
    }

    public function _isAjax() {
        return Yii::$app->request->getIsAjax();
    }

    public function _isPost() {
        return Yii::$app->request->getIsPost();
    }

    public function _isGet() {
        return Yii::$app->request->getIsGet();
    }
    public function getSession()
    {
        return Yii::$app->getSession();
    }

    public function ControllerName() {
        return Yii::$app->controller->id;
    }
}