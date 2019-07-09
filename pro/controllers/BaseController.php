<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;

class BaseController extends Controller {


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
}