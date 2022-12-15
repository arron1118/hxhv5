<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>权限管理列表--后台管理</title>
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
	<blockquote class="layui-elem-quote news_search">
		<div class="layui-inline">
			<a href="javascript:;" class="layui-btn layui-btn-normal Add_btn">添加权限</a>
		</div>

		<div class="layui-inline">
			<div class="layui-form-mid layui-word-aux">权限，节点控制</div>
		</div>
	</blockquote>
	<div class="layui-form news_list">
	  	<table class="layui-table">
		    <colgroup>
				<col width="35%">
				<col width="15%">
				<col width="20%">
		    </colgroup>
		    <thead>
				<tr>
					<th>权限名</th>
					<th>权限</th>
					<th>操作</th>
				</tr>
		    </thead>
			<tbody class="news_content">
				<?php if(is_array($data)): foreach($data as $key=>$v): ?><tr>
						<td align="left"><?php echo ($v['_name']); ?></td>
						<td><?php echo ($v['name']); ?></td>
						<td>
						<a class="layui-btn layui-btn-normal layui-btn-mini add_child" href="javascript:;" ruleId="<?php echo ($v['id']); ?>"><i class="layui-icon">&#xe608;</i>添加子权限</a>
						<a class="layui-btn layui-btn-mini links_edit" href="javascript:;" ruleId="<?php echo ($v['id']); ?>" ruleName="<?php echo ($v['name']); ?>" ruleTitle="<?php echo ($v['title']); ?>" onclick="edit(this)"><i class="iconfont icon-edit"></i>修改</a>
						<a class="layui-btn layui-btn-danger layui-btn-mini del" href="javascript:;" ruleId="<?php echo ($v['id']); ?>"><i class="layui-icon">&#xe640;</i>删除</a>
						</td>
					</tr><?php endforeach; endif; ?>
			</tbody>
		</table>
	</div>
	<div id="page"></div>
	<script type="text/javascript" src="/Public/admin/layui/layui.js"></script>
	<script type="text/javascript">
layui.config({
	base : "/Public/admin/js/"
}).use(['form','layer','jquery','laypage'],function(){
	var form = layui.form(),
		layer = parent.layer === undefined ? layui.layer : parent.layer,
		laypage = layui.laypage,
		$ = layui.jquery;
			var modify_id = $(this).attr("modify_id");
			$("body").on("click",".links_edit",function(){  //编辑
				var modify_id = $(this).attr("modify_id");
				var ruleId=$(this).attr('ruleId');
				var ruleName=$(this).attr('ruleName');
				var ruleTitle=$(this).attr('ruleTitle');
				var index = layui.layer.open({
					title : "编辑信息",
					type : 2,
					content : "<?php echo U('Rule/edit');?>?id="+ruleId+"&name="+ruleName+"&title="+ruleTitle,
					success : function(layero, index){
						setTimeout(function(){
							layui.layer.tips('点击此处返回列表', '.layui-layer-setwin .layui-layer-close', {
								tips: 3
							});
						},500)
					}
				})
				//改变窗口大小时，重置弹窗的高度，防止超出可视区域（如F12调出debug的操作）
				$(window).resize(function(){
					layui.layer.full(index);
				})
				layui.layer.full(index);
			})
	//添加权限
	//改变窗口大小时，重置弹窗的高度，防止超出可视区域（如F12调出debug的操作）
	$(window).one("resize",function(){
		$(".Add_btn").click(function(){
			var index = layui.layer.open({
				title : "添加权限",
				type : 2,
				content : "<?php echo U('Admin/Rule/add');?>",
				success : function(layero, index){
					setTimeout(function(){
						layui.layer.tips('点击此处返回文章列表', '.layui-layer-setwin .layui-layer-close', {
							tips: 3
						});
					},500)
				}
			})			
			layui.layer.full(index);
		})
	}).resize();
	
	//添加子权限
	//改变窗口大小时，重置弹窗的高度，防止超出可视区域（如F12调出debug的操作）
	$(window).one("resize",function(){
		$(".add_child").click(function(){
			var ruleId=$(this).attr('ruleId');
			var index = layui.layer.open({
				title : "添加子权限",
				type : 2,
				content : "<?php echo U('Rule/add');?>?id="+ruleId,
				success : function(layero, index){
					setTimeout(function(){
						layui.layer.tips('点击此处返回文章列表', '.layui-layer-setwin .layui-layer-close', {
							tips: 3
						});
					},500)
				}
			})			
			layui.layer.full(index);
		})
	}).resize();

	$("body").on("click",".del",function(){  //删除
		var ruleId=$(this).attr('ruleId');
		layer.confirm('确定删除此信息？',{icon:3, title:'提示信息'},function(data){
				var index = top.layer.msg('数据提交中，请稍候',{icon: 16,time:false,shade:0.8});
				setTimeout(function(){
					$.get("<?php echo U('Rule/delete');?>?id="+ruleId,function(data){
						top.layer.close(index);
						top.layer.msg(data);
						//刷新当前页面
						window.location.reload();
					})
				},1000);
		});
	})
})

	</script>
</body>

</html>