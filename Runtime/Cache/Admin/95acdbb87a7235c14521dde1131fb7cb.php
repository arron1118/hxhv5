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
	<script src="/Public/home/js/open.js"></script>
</head>
<body class="childrenBody">
	<blockquote class="layui-elem-quote news_search">
		<div class="layui-inline">
			<div class="layui-form-mid layui-word-aux">功能的开关。</div>
		</div>
	</blockquote>
	<div class="layui-form news_list">
	  	<table class="layui-table">
		    <colgroup>
				<col width="100">
				<col width="30%">
				<col>
				<col width="10%">
				<col width="10%">
		    </colgroup>
		    <thead>
				<tr>
					<th>ID</th>
					<th>标题</th>
					<th style="text-align:left;">功能介绍</th>
					<th>状态</th>
					<th>操作</th>
				</tr> 
		    </thead>
			<tbody class="news_content">
			<?php if(is_array($data)): foreach($data as $key=>$v): ?><tr>
					<td><?php echo ($v['id']); ?></td>
					<td><?php echo ($v['title']); ?></td>
					<td align="left"><?php echo ($v['content']); ?></td>
					<td>
						<input type="checkbox" name="show" lay-skin="switch" lay-text="允许|禁止" lay-filter="isShow" listId="<?php echo ($v['id']); ?>"  <?php if($v['status'] == 1): ?>checked=""<?php endif; ?> >
						<div class="layui-unselect layui-form-switch layui-form-onswitch" lay-skin="_switch"><em>允许</em><i></i>
						</div>
					</td>
					<td>
					<a class="layui-btn layui-btn-mini" onclick="open_show('编辑','<?php echo U('Admin/Switch/edit',array('id'=>$v['id']));?>',600,400)"><i class="iconfont icon-edit"></i> 编辑</a>
					</td>
				</tr><?php endforeach; endif; ?>
			</tbody>
		</table>
	</div>
	<div id="page"></div>
	<script type="text/javascript" src="/Public/admin/layui/layui.js"></script>
	<script type="text/javascript">
		layui.config({
			base : "js/"
		}).use(['form','layer','jquery','laypage'],function(){
			var form = layui.form(),
				layer = parent.layer === undefined ? layui.layer : parent.layer,
				laypage = layui.laypage,
				$ = layui.jquery;

			//是否展示
			form.on('switch(isShow)', function(data){
				var listId=$(this).attr('listId');
				var index = layer.msg('修改中，请稍候',{icon: 16,time:false,shade:0.8});
				data.elem.checked==true ? status = 1 : status = 0 ;
				setTimeout(function(){
					$.post("<?php echo U('Switch/edit');?>",{id:listId,status:status},function(data){
						top.layer.close(index);
						top.layer.msg(data);
					})
					layer.close(index);
				},1000);
			})

		})
	</script>
</body>
</html>