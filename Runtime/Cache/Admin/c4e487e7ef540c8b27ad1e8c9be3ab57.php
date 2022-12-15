<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>菜单管理列表--后台管理</title>
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
			<a class="layui-btn layui-btn-normal Add_btn">添加菜单</a>
		</div>
		<div class="layui-inline">
			<div class="layui-form-mid layui-word-aux">本页面刷新后除新添加的文章外所有操作无效，关闭页面所有数据重置</div>
		</div>
	</blockquote>
	<div class="layui-form news_list">
	<form class="" action="" method="post">
	  	<table class="layui-table">
		    <colgroup>
				<col width="3%">
				<col width="9%">
				<col width="9%">
				<col width="15%">
		    </colgroup>
		    <thead>
				<tr>
					<th>排序</th>
					<th style="text-align:left;">菜单名</th>
					<th style="text-align:left;">连接</th>
					<th>操作</th>
				</tr> 
		    </thead>
			<tbody class="news_content">
			<?php if(is_array($data)): foreach($data as $key=>$v): ?><tr>
					<td align="center"><input class="layui-input search_input" style="width:40px;height:25px;" type="text" name="<?php echo ($v['id']); ?>" value="<?php echo ($v['order_number']); ?>"></td>
					<td align="left"><?php echo ($v['_name']); ?></td>
					<td align="left"><?php echo ($v['mca']); ?></td>
					<td>
					<a class="layui-btn layui-btn-normal layui-btn-mini add_child" href="javascript:;" navId="<?php echo ($v['id']); ?>"><i class="layui-icon">&#xe608;</i>添加子菜单</a>
					<a class="layui-btn layui-btn-mini edit" navId="<?php echo ($v['id']); ?>" navName="<?php echo ($v['name']); ?>"><i class="iconfont icon-edit"></i> 编辑</a>
					<a class="layui-btn layui-btn-danger layui-btn-mini del"  navId="<?php echo ($v['id']); ?>" ><i class="layui-icon"></i> 删除</a>
					</td>
				</tr><?php endforeach; endif; ?>
				<tr>
					<td><button class="layui-btn" lay-submit="" lay-filter="submit">排序</button></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
			</tbody>
		</table>
	</form>
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


	//添加菜单
	//改变窗口大小时，重置弹窗的高度，防止超出可视区域（如F12调出debug的操作）
	$(window).one("resize",function(){
		$(".Add_btn").click(function(){
			var index = layui.layer.open({
				title : "添加菜单",
				type : 2,
				content : "<?php echo U('Admin/Nav/add');?>",
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

	//添加子菜单
	//改变窗口大小时，重置弹窗的高度，防止超出可视区域（如F12调出debug的操作）
	$(window).one("resize",function(){
		$(".add_child").click(function(){
			var navId=$(this).attr('navId');
			var index = layui.layer.open({
				title : "添加子菜单",
				type : 2,
				content : "<?php echo U('Admin/Nav/add');?>?id="+navId,
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

	// 编辑 操作
	$(window).one("resize",function(){
		$(".edit").click(function(){
			var navId=$(this).attr('navId');
			var navName=$(this).attr('navName');
			var index = layui.layer.open({
				title : "编辑",
				type : 2,
				content : "<?php echo U('Nav/edit');?>?id="+navId+"&name="+navName,
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
		var _this = $(this);
		var navId=$(this).attr('navId');
		layer.confirm('确定删除此信息？',{icon:3, title:'提示信息'},function(data){
				var index = top.layer.msg('数据提交中，请稍候',{icon: 16,time:false,shade:0.8});
				setTimeout(function(){
					$.get("<?php echo U('Admin/Nav/delete');?>?id="+navId,function(data){
						top.layer.close(index);
						top.layer.msg(data);
						//刷新当前页面
						window.location.reload();
					})
				},1000);
			for(var i=0;i<newsData.length;i++){
				if(newsData[i].newsId == _this.attr("data-id")){
					newsData.splice(i,1);
					newsList(newsData);
				}
			}
			layer.close(index);
		});
	})
	
	form.on("submit(submit)",function(data){
		var index = top.layer.msg('数据提交中，请稍候',{icon: 16,time:false,shade:0.8});
		setTimeout(function(){
			$.post("<?php echo U('Admin/Nav/order');?>",data.field,function(data){
				top.layer.close(index);
				top.layer.msg(data);
				//刷新当前页面
				window.location.reload();
			})
		},1000);
		return false;
	})
	
	
})
	</script>
</body>

</html>