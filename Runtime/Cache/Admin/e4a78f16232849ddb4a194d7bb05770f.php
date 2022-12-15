<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>添加权限--后台管理</title>
	<meta name="renderer" content="webkit">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="format-detection" content="telephone=no">
	<link rel="stylesheet" href="/Public/admin/layui/css/layui.css" media="all" />
	
</head>

<body class="childrenBody">
	<form class="layui-form" method="post">
		<div class="layui-form-item">
			<label class="layui-form-label">权限名：</label>
			<div class="layui-input-inline">
				<input class="layui-input newsAuthor"  type="text" name="title" value='' placeholder="">
			</div>
		</div>
		<div class="layui-form-item">
			<div class="layui-inline">		
				<label class="layui-form-label">权限：</label>
				<div class="layui-input-inline">
					<input class="layui-input newsAuthor" lay-verify="required" type="text" name="name" value="">
				</div>
				
			</div>
			输入模块/控制器/方法即可 例如 Admin/Rule/index
		</div>
		<div class="layui-form-item">
		<input type="hidden" name="id" value="">
			<div class="layui-input-block">
				<input type="hidden" name="pid" value='<?php if($_GET['id']> 0): echo ($_GET['id']); else: ?>0<?php endif; ?>'>
				<button class="layui-btn" lay-submit="" lay-filter="submit">立即提交</button>
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
			form.on("submit(submit)",function(data){
				var index = top.layer.msg('数据提交中，请稍候',{icon: 16,time:false,shade:0.8});
				setTimeout(function(){
					$.post("<?php echo U('Rule/add');?>",data.field,function(data){
						top.layer.close(index);
						top.layer.msg(data);
						layer.closeAll("iframe");
						//刷新父页面
						parent.location.reload();
					})
				},1000);
				return false;
			})
		})
	</script>
</body>

</html>