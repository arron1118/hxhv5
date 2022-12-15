<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>登录-后台管理</title>
	<meta name="renderer" content="webkit">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="format-detection" content="telephone=no">
	<link rel="stylesheet" href="/Public/admin/layui/css/layui.css" media="all" />
	<link rel="stylesheet" href="/Public/admin/css/login.css" media="all" />
</head>
<body>
	<img src="/Public/admin/images/bj.jpg">
	<div class="video_mask"></div>
	<div class="login">
	    <h1>后台登录</h1>
	    <form class="layui-form" method="post">
	    	<div class="layui-form-item">
				<input class="layui-input" value="" name="username" placeholder="用户名" lay-verify="required" type="text" autocomplete="off">
		    </div>
		    <div class="layui-form-item">
				<input class="layui-input" name="password" placeholder="密码" lay-verify="required" type="password" autocomplete="off">
		    </div>
			
		    <div class="layui-form-item form_code">
			<?php if((C('YZM_STATUS')['status'] == 1)): ?><input class="layui-input" name="code" id="code" maxlength="4" placeholder="验证码" lay-verify="required" type="text" autocomplete="off" />
				<div class="code"><img src="<?php echo U('login/verify');?>" width="116" height="36" id="yzm" onclick="javascript:this.src='<?php echo U('login/verify');?>?'+Math.random();" style="cursor:pointer;"></div><?php endif; ?>
			</div>
			<button class="layui-btn login_btn" lay-submit="" lay-filter="login">登录</button>
		</form>
	</div>
	<script type="text/javascript" src="/Public/admin/layui/layui.js"></script>
	<script type="text/javascript">
		layui.config({
			base : "/Public/admin/js/"
		}).use(['form','layer'],function(){
			var form = layui.form(),
				layer = parent.layer === undefined ? layui.layer : parent.layer,
				$ = layui.jquery;

			form.on("submit(login)",function(data){
				var index = top.layer.msg('努力登录中，请稍候',{icon: 16,time:false,shade:0.8});
				setTimeout(function(){
					$.post("<?php echo U('login/index');?>", data.field, function (kungege) {
						if(kungege==0){
							$('#code').val('');
							layer.msg('验证码错误');
							$('#yzm').attr('src',"<?php echo U('login/verify');?>?"+Math.random());
						}else if(kungege==1){
							layer.msg('登录成功');
							window.location.href = "<?php echo U('index/index');?>";
						}else{
							$('#code').val('');
							layer.msg(kungege);
							$('#yzm').attr('src',"<?php echo U('login/verify');?>?"+Math.random());
						}
					});
				},1000);
				return false;
			})
			//登录按钮事件
		})
	</script>
</body>
</html>