<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>文章列表--后台管理</title>
	<meta name="renderer" content="webkit">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="format-detection" content="telephone=no">
	<link rel="stylesheet" href="/Public/admin/layui/css/layui.css" media="all" />
	<link rel="stylesheet" href="//at.alicdn.com/t/font_tnyc012u2rlwstt9.css" media="all" />
	<link rel="stylesheet" href="/Public/admin/css/news.css" media="all" />
</head>
<body class="childrenBody">
	<div class="layui-form jlk_list">
	  	<table class="layui-table">
		    <thead>
				<tr>
					<th>ID</th>
					<th>用户姓名</th>
					<th>联系方式</th>
					<th>留言内容</th>
					<th>提交时间</th>
				</tr>
		    </thead>
			<tbody class="news_content">
			<?php if(is_array($data)): foreach($data as $key=>$v): ?><tr>
					<th><?php echo ($v['id']); ?></th>
					<th><?php echo ($v['username']); ?></th>
					<th><?php echo ($v['mobile']); ?></th>
					<th><?php echo ($v['content']); ?></th>
					<td><?php echo (date("Y-m-d H:i:s",$v['add_time'])); ?></td>

				</tr><?php endforeach; endif; ?>
			</tbody>
		</table>
	</div>
	<div id="page"><?php echo ($page); ?></div>

	<script type="text/javascript" src="/Public/admin/layui/layui.js"></script>
</body>
</html>