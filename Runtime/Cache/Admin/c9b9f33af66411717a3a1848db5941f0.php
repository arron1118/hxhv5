<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>修改--后台管理</title>
	<meta name="renderer" content="webkit">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="format-detection" content="telephone=no">
	<link rel="stylesheet" href="/Public/admin/layui/css/layui.css" media="all" />
	
	<link rel="stylesheet" href="/Public/home/layui/css/layui.css">

</head>

<body class="childrenBody">
		<form class="layui-form" action="">
            <div class="layui-form-item">
                <label class="layui-form-label">原密码：</label>
                <div class="layui-input-block">
                  <input type="password" name="old" lay-verify="required" autocomplete="off" placeholder="请输入原密码" class="layui-input">
                </div>
			</div>
            <div class="layui-form-item">
                <label class="layui-form-label">新密码：</label>
                <div class="layui-input-block">
                  <input type="password" name="password" lay-verify="required|pass" maxlength="40" autocomplete="off" placeholder="请输入新密码" class="layui-input">
                </div>
			</div>
            <div class="layui-form-item">
                <label class="layui-form-label">确认密码：</label>
                <div class="layui-input-block">
                  <input type="password" name="password2" lay-verify="required" maxlength="40" autocomplete="off" placeholder="请再次输入新密码" class="layui-input">
                </div>
			</div>
			<div class="layui-form-item">
                <div class="layui-input-block">
                  <button class="layui-btn" lay-submit="" lay-filter="submit">确定修改</button>
                  <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                </div>
            </div>
        </form>
	<script src="/Public/home/layui/layui.js"></script>
<script type="text/javascript">
layui.use(['layer', 'form' ,'jquery'], function(){
  var layer = layui.layer
  ,$ = layui.jquery
  ,form = layui.form;
	form.on("submit(submit)",function(data){
		if($('input[name="password"]').val()!=$('input[name="password2"]').val()){
			layer.msg('两次输入的密码不一致，请确认重新输入。');
			return false;
		}
		var index = top.layer.msg('数据提交中，请稍候',{icon: 16,time:false,shade:0.8});
		setTimeout(function(){
			$.post("<?php echo U('Rule/pwd');?>",data.field,function(data){
				if(data.status==true){
					layer.closeAll("iframe");
					top.layer.msg(data.msg);
					
				}else{
					top.layer.msg(data.msg);
				}
			})
		},1000);
		return false;
	});
	form.verify({
	  pass: [
		/^[\S]{6,16}$/
		,'为了您的帐号安全，密码必须6到16位之间，且不能出现空格'
	  ] 
	});
});
</script>
</body>

</html>