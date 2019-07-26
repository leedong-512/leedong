<?php

?>
用户名：
<div class="layui-inline">
    <input class="layui-input" name="id" id="demoReload" autocomplete="off">
</div>
<button class="layui-btn" data-type="reload">搜索</button>
&nbsp;&nbsp;&nbsp;
<!--<button data-method="offset" data-type="auto" class="layui-btn">添加用户</button>-->
<div class="site-demo-button layui-inline" id="layerDemo" style="margin-bottom: 0;">
<button data-method="offset" data-type="auto" id="add_user" class="layui-btn">添加用户</button>
</div>
<table class="layui-hide" id="LAY_table_user" lay-filter="user"></table>
<script>
    layui.use('table', function(){
        var table = layui.table;

        //方法级渲染
        table.render({
            elem: '#LAY_table_user'
            ,url: '/index/userlist'
            ,page: { //支持传入 laypage 组件的所有参数（某些参数除外，如：jump/elem） - 详见文档
                layout: ['limit', 'count', 'prev', 'page', 'next', 'skip'] //自定义分页布局
                //,curr: 5 //设定初始在第 5 页
                ,limit: 2
                // ,groups: 1 //只显示 1 个连续页码
                // ,first: false //不显示首页
                // ,last: false //不显示尾页

            }
            ,cols: [[
                {checkbox: true, fixed: true}
                ,{field:'id', title: 'ID', sort: false, fixed: true}
                ,{field:'username', title: '用户名'}
                // ,{field:'sex', title: '性别', width:80, sort: true}
                // ,{field:'city', title: '城市', width:80}
                // ,{field:'sign', title: '签名'}
                // ,{field:'experience', title: '积分', sort: true, width:80}
                // ,{field:'score', title: '评分', sort: true, width:80}
                // ,{field:'classify', title: '职业', width:80}
                ,{field:'authority', title: '权限', sort: false}
            ]]
            ,id: 'testReload'
            // ,page: true
            ,height: 310
        });

        /*var $ = layui.$, active = {
            reload: function(){
                var demoReload = $('#demoReload');

                //执行重载
                table.reload('testReload', {
                    page: {
                        curr: 1 //重新从第 1 页开始
                    }
                    ,where: {
                        key: {
                            id: demoReload.val()
                        }
                    }
                }, 'data');
            }
        };*/

        /*$('.demoTable .layui-btn').on('click', function(){
            var type = $(this).data('type');
            active[type] ? active[type].call(this) : '';
        });*/
    });
    
    $('#add_user').click(function () {
        layer.open({
            type: 2
            ,offset: 'auto' //具体配置参考：http://www.layui.com/doc/modules/layer.html#offset
            // ,id: 'layerDemo'+type //防止重复弹出
            ,content: '/index/adduserpage'
            ,title: '添加用户'
            // ,btn: '关闭'
            ,area: ['60%', '75%']
            ,btnAlign: 'c' //按钮居中
            ,shade: 0.5 //不显示遮罩
            /*,yes: function(){
                layer.closeAll();
            }*/
        });
        return false;
    })
    /*layui.use('layer', function(){ //独立版的layer无需执行这一句
       var $ = layui.jquery, layer = layui.layer; //独立版的layer无需执行这一句

        //触发事件
        var active = {
            offset: function(othis){
                // var type = othis.data('type')

            }
        };*/

       /* $('#layerDemo .layui-btn').on('click', function(){
            var othis = $(this), method = othis.data('method');
            active[method] ? active[method].call(this, othis) : '';
            return false;
        });*/

   //});
</script>
