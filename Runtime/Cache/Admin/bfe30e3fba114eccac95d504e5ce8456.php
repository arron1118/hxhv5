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
	
	<link rel="stylesheet" href="//at.alicdn.com/t/font_tnyc012u2rlwstt9.css" media="all" />
	<link rel="stylesheet" href="/Public/admin/css/news.css" media="all" />

</head>

<body class="childrenBody">
	<blockquote class="layui-elem-quote news_search">
		<div class="layui-inline">
			<a href="javascript:;" class="layui-btn layui-btn-normal add_group">添加用户组</a>
		</div>
		<div class="layui-inline">
			<div class="layui-form-mid layui-word-aux">可以添加用户组，分配好权限给相应的人员管理</div>
		</div>
	</blockquote>
	<div class="layui-form news_list">
	  	<table class="layui-table">
		    <colgroup>
				<col width="25%">
				<col width="30%">
		    </colgroup>
		    <thead>
				<tr>
					<th>用户组名</th>
					<th>操作</th>
				</tr>
		    </thead>
			<tbody class="news_content">
				<?php if(is_array($data)): foreach($data as $key=>$v): ?><tr>
						<td><?php echo ($v['title']); ?></td>
						<td>
						<a class="layui-btn layui-btn-mini links_edit" href="javascript:;" ruleId="<?php echo ($v['id']); ?>" ruleTitle="<?php echo ($v['title']); ?>" ><i class="iconfont icon-edit"></i>修改</a>
						<a class="layui-btn layui-btn-danger layui-btn-mini del" href="javascript:;" ruleId="<?php echo ($v['id']); ?>"><i class="layui-icon">&#xe640;</i>删除</a>
						<a class="layui-btn layui-btn-mini " href="<?php echo U('Rule/rule_group');?>?id=<?php echo ($v['id']); ?>" ruleId="<?php echo ($v['id']); ?>"><i class="layui-icon">&#xe620;</i>分配权限</a>
						<a class="layui-btn layui-btn-normal layui-btn-mini add_child" href="javascript:;" ruleId="<?php echo ($v['id']); ?>"><i class="layui-icon">&#xe608;</i>添加成员</a>
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
			$("body").on("click",".links_edit",function(){  //编辑
				var modify_id = $(this).attr("modify_id");
				var ruleId=$(this).attr('ruleId');
				var ruleName=$(this).attr('ruleName');
				var ruleTitle=$(this).attr('ruleTitle');
				var index = layui.layer.open({
					title : "编辑信息",
					type : 2,
					content : "<?php echo U('Rule/edit_group');?>?id="+ruleId+'&title='+ruleTitle,
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
				
				$(".add_group").click(function(){
					var ruleId=$(this).attr('ruleId');
					var index = layui.layer.open({
						title : "添加用户组",
						type : 2,
						content : "/index.php/Admin/Rule/add_group",
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

			//添加成员
			//改变窗口大小时，重置弹窗的高度，防止超出可视区域（如F12调出debug的操作）
			$(window).one("resize",function(){
				$(".add_child").click(function(){
					var ruleId=$(this).attr('ruleId');
					var index = layui.layer.open({
						title : "添加用户组",
						type : 2,
						content : "<?php echo U('Rule/check_user');?>?group_id="+ruleId,
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
							$.get("<?php echo U('Rule/delete_group');?>?id="+ruleId,function(data){
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