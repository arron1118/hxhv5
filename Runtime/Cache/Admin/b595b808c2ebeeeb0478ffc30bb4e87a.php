<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>后台管理</title>
	<meta name="renderer" content="webkit">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta http-equiv="Access-Control-Allow-Origin" content="*">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="format-detection" content="telephone=no">
	<link rel="icon" href="favicon.ico">
	<link rel="stylesheet" href="/Public/admin/layui/css/layui.css" media="all" />
	<link rel="stylesheet" href="//at.alicdn.com/t/font_tnyc012u2rlwstt9.css" media="all" />
	<link rel="stylesheet" href="/Public/admin/css/main.css" media="all" />
	<script src="/Public/home/js/open.js"></script>
</head>
<body class="main_body">
	<div class="layui-layout layui-layout-admin">
		<!-- 顶部 -->
		<div class="layui-header header">
			<div class="layui-main">
				<a href="/" class="logo" target="_blank" title="返回前台页面">后台管理</a>
				<!-- 显示/隐藏菜单 -->
				<a href="javascript:;" class="iconfont hideMenu icon-menu1"></a>
			    <!-- 天气信息 -->
			    <div class="weather" pc>
			    	<div id="tp-weather-widget"></div>
					<script>(function(T,h,i,n,k,P,a,g,e){g=function(){P=h.createElement(i);a=h.getElementsByTagName(i)[0];P.src=k;P.charset="utf-8";P.async=1;a.parentNode.insertBefore(P,a)};T["ThinkPageWeatherWidgetObject"]=n;T[n]||(T[n]=function(){(T[n].q=T[n].q||[]).push(arguments)});T[n].l=+new Date();if(T.attachEvent){T.attachEvent("onload",g)}else{T.addEventListener("load",g,false)}}(window,document,"script","tpwidget","//widget.seniverse.com/widget/chameleon.js"))</script>
					<script>tpwidget("init", {
					    "flavor": "slim",
					    "location": "WX4FBXXFKE4F",
					    "geolocation": "enabled",
					    "language": "zh-chs",
					    "unit": "c",
					    "theme": "chameleon",
					    "container": "tp-weather-widget",
					    "bubble": "disabled",
					    "alarmType": "badge",
					    "color": "#FFFFFF",
					    "uid": "U9EC08A15F",
					    "hash": "039da28f5581f4bcb5c799fb4cdfb673"
					});
					tpwidget("show");</script>
			    </div>
			    <!-- 顶部右侧菜单 -->
			    <ul class="layui-nav top_menu">
			    	<!-- <li class="layui-nav-item showNotice" id="showNotice" pc> -->
						<!-- <a href="javascript:;"><i class="iconfont icon-gonggao"></i><cite>系统公告</cite></a> -->
					<!-- </li> -->
			    	<li class="layui-nav-item" mobile>
			    		<a href="javascript:;" class="mobileAddTab" data-url="page/user/changePwd.html"><i class="iconfont icon-shezhi1" data-icon="icon-shezhi1"></i><cite>设置</cite></a>
			    	</li>
			    	<li class="layui-nav-item" mobile>
			    		<a href="<?php echo U('Login/logout');?>" class="signOut"><i class="iconfont icon-loginout"></i> 退出</a>
			    	</li>
					<!-- <li class="layui-nav-item lockcms" pc> -->
						<!-- <a href="javascript:;"><i class="iconfont icon-lock1"></i><cite>锁屏</cite></a> -->
					<!-- </li> -->
					<?php $_SESSION['admin_user']['avatar'] ? $img = $_SESSION['admin_user']['avatar'] : $img = '/Public/admin/images/face.jpg';?>
					<li class="layui-nav-item" pc>
						<a href="javascript:;">
							<img src="<?php echo ($img); ?>" class="layui-circle" width="35" height="35">
							<cite><?php echo $_SESSION['admin_user']['username'];?></cite>
						</a>
						<dl class="layui-nav-child">
							<dd><a href="javascript:;" onclick="open_show('个人资料','<?php echo U('Rule/userinfo');?>','1000','600')"><i class="iconfont icon-zhanghu" data-icon="icon-zhanghu"></i><cite>个人资料</cite></a></dd>
							<dd><a href="javascript:;" onclick="open_show('修改密码','<?php echo U('Rule/pwd');?>','600','300')"><i class="iconfont icon-shezhi1" data-icon="icon-shezhi1"></i><cite>修改密码</cite></a></dd>
							<dd><a href="javascript:;" class="changeSkin"><i class="iconfont icon-huanfu"></i><cite>更换皮肤</cite></a></dd>
							<dd><a href="<?php echo U('Login/logout');?>" class="signOut"><i class="iconfont icon-loginout"></i><cite>退出</cite></a></dd>
						</dl>
					</li>
				</ul>
			</div>
		</div>
		<!-- 左侧导航 -->
		<div class="layui-side layui-bg-black">
			<div class="user-photo">
				<a class="img" title="我的头像" ><img src="<?php echo ($img); ?>" width="35" height="35"></a>
				<p>你好！<span class="userName"><?php echo $_SESSION['admin_user']['username'];?></span>, 欢迎登录</p>
			</div>
			<div class="navBar layui-side-scroll">
				<ul class="layui-nav layui-nav-tree">
					<li class="layui-nav-item layui-this"><a href="javascript:;" data-url="<?php echo U('index/information');?>"><i class="iconfont icon-computer" data-icon="icon-computer"></i><cite>后台首页</cite></a>
					</li>
					<?php if(is_array($nav_data)): foreach($nav_data as $key=>$v): if(empty($v['_data'])): ?><!-- <?php echo ($v['ico']); ?> -->
							<li class="layui-nav-item"><a href="javascript:;" data-url="<?php echo U($v['mca']);?>"><cite><?php echo ($v['name']); ?></cite></a>
							</li>
							<?php else: ?>
							<li class="layui-nav-item"><a href="javascript:;" data-url="<?php echo U($v['mca']);?>"><cite><?php echo ($v['name']); ?></cite></a>
								<dl class="layui-nav-child">
								<?php if(is_array($v['_data'])): foreach($v['_data'] as $key=>$n): ?><dd><a href="javascript:;" data-url="<?php echo U($n['mca']);?>"><cite><?php echo ($n['name']); ?></cite></a>
									</dd><?php endforeach; endif; ?>
								</dl>
							</li><?php endif; endforeach; endif; ?>
					<span class="layui-nav-bar" style="top: 67.5px; height: 0px; opacity: 0;"></span>
				</ul>
			</div>
		</div>
		<!-- 右侧内容 -->
		<div class="layui-body layui-form">
			<div class="layui-tab marg0" lay-filter="bodyTab" id="top_tabs_box">
				<ul class="layui-tab-title top_tab" id="top_tabs">
					<li class="layui-this" lay-id=""><i class="iconfont icon-computer"></i> <cite>后台首页</cite></li>
				</ul>
				<ul class="layui-nav closeBox">
				  <li class="layui-nav-item">
				    <a href="javascript:;"><i class="iconfont icon-caozuo"></i> 页面操作</a>
				    <dl class="layui-nav-child">
					  <dd><a href="javascript:;" class="refresh refreshThis"><i class="layui-icon">&#x1002;</i> 刷新当前</a></dd>
				      <dd><a href="javascript:;" class="closePageOther"><i class="iconfont icon-prohibit"></i> 关闭其他</a></dd>
				      <dd><a href="javascript:;" class="closePageAll"><i class="iconfont icon-guanbi"></i> 关闭全部</a></dd>
				    </dl>
				  </li>
				</ul>
				<div class="layui-tab-content clildFrame">
					<div class="layui-tab-item layui-show">
						<iframe src="<?php echo U('index/information');?>"></iframe>
					</div>
				</div>
			</div>
		</div>
		<!-- 底部 -->
		<div class="layui-footer footer">
			<p>copyright @2017 <?php echo $_SESSION['admin_user']['username'];?>, 欢迎登录</p>
		</div>
	</div>
	
	<!-- 移动导航 -->
	<div class="site-tree-mobile layui-hide"><i class="layui-icon">&#xe602;</i></div>
	<div class="site-mobile-shade"></div>

	<script type="text/javascript" src="/Public/admin/layui/layui.js"></script>
	<script type="text/javascript" src="/Public/admin/js/leftNav.js"></script>
	<script type="text/javascript" src="/Public/admin/js/index.js"></script>
</body>
</html>