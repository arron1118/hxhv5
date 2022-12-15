<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>数据库配置--后台管理</title>
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
		    		<td>数据库类型</td>
		    		<td><input type="text" class="layui-input" value="<?php echo C('DB_TYPE');?>" name="DB_TYPE" lay-verify="required" placeholder="数据库类型"></td>
		    		<td>DB_TYPE</td>
		    	</tr>
		    	<tr>
		    		<td>服务器地址</td>
		    		<td><input type="text" class="layui-input" value="<?php echo C('DB_HOST');?>" name="DB_HOST" placeholder="服务器地址"></td>
		    		<td>DB_HOST</td>
		    	</tr>
		    	<tr>
		    		<td>数据库名</td>
		    		<td><input type="text" class="layui-input" value="<?php echo C('DB_NAME');?>" name="DB_NAME" placeholder="数据库名"></td>
		    		<td>DB_NAME</td>
		    	</tr>
		    	<tr>
		    		<td>用户名</td>
		    		<td><input type="text" class="layui-input" value="<?php echo C('DB_USER');?>" name="DB_USER" placeholder="用户名"></td>
		    		<td>DB_USER</td>
		    	</tr>
		    	<tr>
		    		<td>密码</td>
		    		<td><input type="text" class="layui-input" value="<?php echo C('DB_PWD');?>" name="DB_PWD" placeholder="密码  ssl"></td>
		    		<td>DB_PWD</td>
		    	</tr>
		    	<tr>
		    		<td>端口</td>
		    		<td><input type="text" class="layui-input" value="<?php echo C('DB_PORT');?>" name="DB_PORT" placeholder="端口（默认3306）"></td>
		    		<td>DB_PORT</td>
		    	</tr>
				<tr>
		    		<td>数据库表前缀</td>
		    		<td><input type="text" class="layui-input" value="<?php echo C('DB_PREFIX');?>" name="DB_PREFIX" placeholder="数据库表前缀"></td>
		    		<td>DB_PREFIX</td>
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
					$.post("<?php echo U('System/db');?>",data.field,function(data){
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