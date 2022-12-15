<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>发送邮件配置--后台管理</title>
	<meta name="renderer" content="webkit">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="format-detection" content="telephone=no">
	<link rel="stylesheet" href="/Public/admin/layui/css/layui.css" media="all" />
	
	<style type="text/css">
		.layui-table td, .layui-table th{ text-align: center; }
		.layui-table td{ padding:5px; }
	</style>

</head>

<body class="childrenBody">
	<form class="layui-form">
		<table class="layui-table">
			<colgroup>
				<col width="20%">
				<col width="50%">
				<col>
		    </colgroup>
		    <thead>
		    	<tr>
		    		<th>参数说明</th>
		    		<th>参数值</th>
		    		<th>变量名</th>
		    	</tr>
		    </thead>
		    <tbody>
		    	<tr>
		    		<td>发件人名称</td>
		    		<td><input type="text" class="layui-input" value="<?php echo C('EMAIL_FROM_NAME');?>" name="EMAIL_FROM_NAME" lay-verify="required" placeholder="请输入发件人名称"></td>
		    		<td>EMAIL_FROM_NAME</td>
		    	</tr>
		    	<tr>
		    		<td>smtp</td>
		    		<td><input type="text" class="layui-input" value="<?php echo C('EMAIL_SMTP');?>" name="EMAIL_SMTP" placeholder="smtp"></td>
		    		<td>EMAIL_SMTP</td>
		    	</tr>
		    	<tr>
		    		<td>账号</td>
		    		<td><input type="text" class="layui-input" value="<?php echo C('EMAIL_USERNAME');?>" name="EMAIL_USERNAME" placeholder="请输入发送邮件的帐号"></td>
		    		<td>EMAIL_USERNAME</td>
		    	</tr>
		    	<tr>
		    		<td>密码</td>
		    		<td><input type="text" class="layui-input" value="<?php echo C('EMAIL_PASSWORD');?>" name="EMAIL_PASSWORD" placeholder="请输入密码（授权码）"></td>
		    		<td>EMAIL_PASSWORD</td>
		    	</tr>
		    	<tr>
		    		<td>SMTP协议</td>
		    		<td><input type="text" class="layui-input" value="<?php echo C('EMAIL_SMTP_SECURE');?>" name="EMAIL_SMTP_SECURE" placeholder="如果使用QQ邮箱；需要把此项改为  ssl"></td>
		    		<td>EMAIL_SMTP_SECURE</td>
		    	</tr>
		    	<tr>
		    		<td>端口</td>
		    		<td><input type="text" class="layui-input" value="<?php echo C('EMAIL_PORT');?>" name="EMAIL_PORT" placeholder="如果使用QQ邮箱；需要把此项改为  465"></td>
		    		<td>EMAIL_PORT</td>
		    	</tr>
		    </tbody>
		</table>
		<div class="layui-form-item" style="text-align: right;">
			<div class="layui-input-block">
				<button class="layui-btn" lay-submit="" lay-filter="systemParameter">立即提交</button>
				<button type="reset" class="layui-btn layui-btn-primary">重置</button>
		    </div>
		</div>
	</form>
	<script type="text/javascript" src="/Public/admin/layui/layui.js"></script>
	<script type="text/javascript">
		layui.config({
			base : "/Public/admin/js/"
		}).use(['form','layer','jquery'],function(){
			var form = layui.form(),
				layer = parent.layer === undefined ? layui.layer : parent.layer,
				laypage = layui.laypage,
				$ = layui.jquery;
			form.on("submit(systemParameter)",function(data){
				//弹出loading
				var index = top.layer.msg('数据提交中，请稍候',{icon: 16,time:false,shade:0.8});
				setTimeout(function(){
					$.post("<?php echo U('System/email');?>",data.field,function(data){
						layer.close(index);
						layer.msg(data);
					})
				},1000);
				return false;
			})
			
		})
	</script>
</body>

</html>