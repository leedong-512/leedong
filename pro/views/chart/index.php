<?php
?>
<html lang="zh">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="format-detection" content="telephone=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta content="yes" name="apple-mobile-web-app-capable">
    <meta content="yes" name="apple-touch-fullscreen">
    <meta name="full-screen" content="yes">
    <meta content="default" name="apple-mobile-web-app-status-bar-style">
    <meta name="screen-orientation" content="portrait">
    <meta name="browsermode" content="application">
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="x5-orientation" content="portrait">
    <meta name="x5-fullscreen" content="true">
    <meta name="x5-page-mode" content="app">
    <base target="_blank">
    <title>萌聊</title>
    <script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
    <!-- 包含了所有编译插件 -->
    <script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!--    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">-->
    <link rel="stylesheet" href="css/chat.css">
<!--    <script type="text/javascript" src="js/jquery.min.js"></script>-->
    <!--    <script src="/css/chat.js"></script>-->
</head>
<body lang="zh">
<!--<img style="width:100%;height:100%" src="~/Images/chatBack.jpg">-->
<div class="abs cover contaniner">
    <div class="abs cover pnl">
        <div class="top pnl-head"></div>
        <div class="abs cover pnl-body" id="pnlBody">
            <div class="abs cover pnl-left">
                <div class="abs cover pnl-msgs scroll" id="show">
<!--                    <div class="msg min time" id="histStart">加载历史消息</div>-->
                    <div class="pnl-list" id="hists">
                        <!-- 历史消息 -->
                    </div>
                    <div class="pnl-list" id="msgs">
                        <!--<div class="msg robot">
                            <div class="msg-left" worker="小龙">
                                <div class="msg-host photo" style="background-image: url(images/ls.png)"></div>
                                <div class="msg-ball" title="今天 17:52:06">你好，我是只能打字的聊天机器人                <br><br>您是想要了解哪些方面呢？</div>
                            </div>
                        </div>
                        <div class="msg guest">
                            <div class="msg-right">
                                <div class="msg-host headDefault"  style="background-image: url(images/ld.png)"></div>
                                <div class="msg-ball" title="今天 17:52:06">你好</div>
                            </div>
                        </div>-->
                    </div>
                    <div class="pnl-list hide" id="unreadLine">
                        <div class="msg min time unread">未读消息</div>
                    </div>
                </div>
                <div class="abs bottom pnl-text">
                    <div class="abs top pnl-warn" id="pnlWarn">
                        <div class="fl btns rel pnl-warn-free">
                            <img src="images/Smile.png" class="kh warn-btn" title="表情" id="emojiBtn" />
                            <img src="images/img.png" class="kh warn-btn" title="图片" id="emojiBtn" />
                            <img src="images/jt.png" class="kh warn-btn" title="截屏" id="emojiBtn" />
                            <!--<img src="../Images/icon/pic.png" class="kh warn-btn" title="截屏" id="emojiBtn" />
                            <img src="../Images/icon/camera.png" class="kh warn-btn" title="图片" id="emojiBtn" />
                            <img src="../Images/icon/edit.png" class="kh warn-btn" title="保存" id="emojiBtn" />-->
                        </div>
                    </div>
                    <div class="abs cover pnl-input">
                        <textarea class="scroll" id="text" wrap="hard" placeholder="在此输入文字信息..."></textarea>
                        <div class="abs atcom-pnl scroll hide" id="atcomPnl">
                            <ul class="atcom" id="atcom"></ul>
                        </div>
                    </div>
                    <div class="abs br pnl-btn" id="submit" style="background-color: rgb(32, 196, 202); color: rgb(255, 255, 255);" onclick="SendMsg()">发送</div>
                    <!--                    <div class="pnl-support" id="copyright"><a href="#">版权什么的</a></div>-->
                </div>
            </div>
            <div class="abs right pnl-right">
                <div class="slider-container hide"></div>
                <div class="pnl-right-content">
                    <div class="pnl-tabs">
                        <div class="tab-btn active" id="hot-tab">好友列表</div>
                        <div class="tab-btn" id="rel-tab"><a href="/chart/addfriend">添加好友</a>+</div>
                    </div>
                    <div class="pnl-hot">
                        <ul class="rel-list unselect" id="hots">
<!--                             <li class="rel-item"><img src="images/ld.png" width="150" class="kh warn-btn" title="表情" id="" />leedong</li>-->
<!--                             <li class="rel-item"><img src="images/ls.png" width="150" class="kh warn-btn" title="表情" id="" />黄萌萌</li>-->
                        </ul>
                    </div>
                    <div class="pnl-rel" style="display: none;">
                        <ul class="rel-list unselect" id="rels">
                            <!-- <li class="rel-item">这是一个问题，这是一个问题？</li> -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<input type="hidden" value="" id="def_uid">
<input type="hidden" value="<?php echo $userinfo['id'];?>" id="uid">
<input type="hidden" value="<?php echo $userinfo['username'];?>" id="username">
<input type="hidden" value="<?php echo $userinfo['user_icon'];?>" id="my_user_icon">
</body>
</html>
<script>
    $(function () {
        $.post("/chart/chartlist",function(res){
            if(res.code == 200){
                var data = res.data;
                var html_str = '';
                for(i = 0; i < data.length; i++) {
                    html_str += '<li class="rel-item" onclick="clickuser('+data[i]['slave_uid']+')"><img src="'+data[i]['user_icon']+'" width="150" class="kh warn-btn" id="'+data[i]['slave_uid']+'" />'+data[i]['username']+'</li>';
                }
                if(html_str != '') {
                    $("#hots").html(html_str);
                } else {
                    $("#hots").html('<li class="rel-item">没有好友！</li>');
                }
            }else{
                $("#hots").html('<li class="rel-item">获取好友列表失败！</li>');
            }
        },'json');
    });

    function clickuser(obj) {
        var s_uid = obj;
        console.log(s_uid);
        $("#def_uid").val(s_uid);
    }
    function SendMsg()
    {
        var text = document.getElementById("text");
        if (text.value == "" || text.value == null)
        {
            return false;
            // layer.alert("发送信息为空，请输入！")
        }
        else
        {
            // AddMsg('default', SendMsgDispose(text.value));
            var content = SendMsgDispose(text.value);
            var s_uid = $("#def_uid").val();
            var user_icon = $('#my_user_icon').val();
            var username = $('#username').val();
            // var user_icon = $('#my_user_icon').val();
            str = "<div class=\"msg guest\"><div class=\"msg-right\"><div class=\"msg-host headDefault\"  style=\"background-image: url("+user_icon+")\"></div><div class=\"msg-ball\" title=\"今天 17:52:06\">" + content +"</div></div></div>"
            var msgs = document.getElementById("msgs");
            msgs.innerHTML = msgs.innerHTML + str;
            if(!s_uid) {
                return false;
            }
            $.post('/chart/sendmessage', {content: content, s_uid: s_uid}, function(dat){
                if(dat.code == 200) {
                    var data = eval("("+dat.data+")");

                }
                console.log(data);
                // alert(dat.data);
            }, 'json');
            text.value = "";
        }
    }
    // 发送的信息处理
    function SendMsgDispose(detail)
    {
        detail = detail.replace("\n", "<br>").replace(" ", "&nbsp;")
        return detail;
    }

    // 增加信息
    /*function AddMsg(user,content)
    {
        var str = CreadMsg(user, content);
        var msgs = document.getElementById("msgs");
        msgs.innerHTML = msgs.innerHTML + str;
    }*/

    // 生成内容
    /*function CreadMsg(user, content)
    {
        var str = "";
        if(user == 'default')
        {
            str = "<div class=\"msg guest\"><div class=\"msg-right\"><div class=\"msg-host headDefault\"></div><div class=\"msg-ball\" title=\"今天 17:52:06\">" + content +"</div></div></div>"
        }
        else
        {
            str = "<div class=\"msg robot\"><div class=\"msg-left\" worker=\"" + user + "\"><div class=\"msg-host photo\" style=\"background-image: url(../Images/head.png)\"></div><div class=\"msg-ball\" title=\"今天 17:52:06\">" + content + "</div></div></div>";
        }
        return str;
    }*/

    ws = new WebSocket("ws://*.*.*.*:8282");
    // 服务端主动推送消息时会触发这里的onmessage
    ws.onmessage = function(e){
        // json数据转换成js对象
        var data = eval("("+e.data+")");
        var type = data.type || '';
        console.log(data);
        switch(type){
            // Events.php中返回的init类型的消息，将client_id发给后台进行uid绑定
            case 'init':
                // 利用jquery发起ajax请求，将client_id发给后端进行uid绑定
                $.post('/chart/bind', {client_id: data.client_id}, function(dat){
                    // console.log(dat);
                    console.log(dat.msg);
                }, 'json');
                break;
            // 当mvc框架调用GatewayClient发消息时直接alert出来
            default :
                console.log(data);
                //console.log(mes.msg);
                str = "<div class=\"msg robot\"><div class=\"msg-left\" worker=\"" + data.s_username + "\"><div class=\"msg-host photo\" style=\"background-image: url("+data.user_icon+")\"></div><div class=\"msg-ball\" title=\""+data.send_time+"\">" + data.msg + "</div></div></div>";
                var msgs = document.getElementById("msgs");
                msgs.innerHTML = msgs.innerHTML + str;
        }
    };
</script>
