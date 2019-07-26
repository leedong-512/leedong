<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <title>后台</title>
        <link rel="stylesheet" href="/js/layui/css/layui.css">
        <style>
            .layui-body{
                margin-top: 10px;
                margin-left: 10px;
            }
        </style>
    </head>
    <body class="layui-layout-body">
    <?php $this->beginBody() ?>
    <div class="layui-layout layui-layout-admin">
        <div class="layui-header">
            <div class="layui-logo">后台系统</div>
            <!-- 头部区域（可配合layui已有的水平导航） -->
            <!--<ul class="layui-nav layui-layout-left">
                <li class="layui-nav-item"><a href="">控制台</a></li>
                <li class="layui-nav-item"><a href="">商品管理</a></li>
                <li class="layui-nav-item"><a href="">用户</a></li>
                <li class="layui-nav-item">
                    <a href="javascript:;">其它系统</a>
                    <dl class="layui-nav-child">
                        <dd><a href="">邮件管理</a></dd>
                        <dd><a href="">消息管理</a></dd>
                        <dd><a href="">授权管理</a></dd>
                    </dl>
                </li>
            </ul>-->
            <ul class="layui-nav layui-layout-right">
                <li class="layui-nav-item">
                    <a href="javascript:;">
                        <img src="http://t.cn/RCzsdCq" class="layui-nav-img">
                        <?php echo Yii::$app->getSession()->get('system_last_login_id')['username'];?>
                    </a>
                    <dl class="layui-nav-child">
                        <dd><a href="">基本资料</a></dd>
                        <dd><a href="/chart">进入聊天</a></dd>
                        <!--                    <dd><a href="">安全设置</a></dd>-->
                    </dl>
                </li>
                <li class="layui-nav-item"><a href="/user/logout">退了</a></li>
            </ul>
        </div>

        <div class="layui-side layui-bg-black">
            <div class="layui-side-scroll">
                <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
                <ul class="layui-nav layui-nav-tree"  lay-filter="test">
                    <!--<li class="layui-nav-item layui-nav-itemed">
                        <a class="" href="javascript:;">用户管理</a>
                        <dl class="layui-nav-child">
                            <dd><a href="/index/index">用户列表</a></dd>
                            <dd><a href="/index/useradd">用户添加</a></dd>
                            <dd><a href="javascript:;">列表三</a></dd>
                            <dd><a href="">超链接</a></dd>
                        </dl>
                    </li>-->
                    <li class="layui-nav-item layui-nav-itemed">
                        <a href="javascript:;">用户管理</a>
                        <dl class="layui-nav-child">
                            <dd <?php if($this->params['module'] == 'userlist') { echo  'class="layui-this"';}?>><a href="/index/index">用户列表</a></dd>
                            <dd <?php if($this->params['module'] == 'adduser') { echo  'class="layui-this"';}?>><a href="/index/adduserpage">用户添加</a></dd>
                            <!--                        <dd><a href="">超链接</a></dd>-->
                        </dl>
                    </li>
                    <!--                <li class="layui-nav-item"><a href="/index/index">用户管理</a></li>-->
                    <!--                <li class="layui-nav-item"><a href="/index/index">用户管理</a></li>-->
                    <!--                <li class="layui-nav-item"><a href="">发布商品</a></li>-->
                </ul>
            </div>
        </div>
        <script type="text/javascript" src="/js/layui/layui.js"></script>
        <script type="text/javascript" src="/js/jquery.min.js"></script>
        <div class="layui-body">
            <?= $content ?>
        </div>
        <div class="layui-footer">
        </div>
    </div>
    <script>
        //JavaScript代码区域
        layui.use('element', function(){
            var element = layui.element;
            element.on('nav(test)', function(elem){
                $.load();
                //console.log(elem)
                // layer.msg(elem.text());
            });
        });
    </script>
    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>