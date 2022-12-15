<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>管理员列表--后台管理</title>
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
			<a class="layui-btn layui-btn-normal Add_btn">添加登录帐号</a>
		</div>
		<div class="layui-inline">
			<div class="layui-form-mid layui-word-aux">允许才能登录。。【请谨慎设置  超级管理员（拥有所有权限）  的权限给其他用户】。在这里添加的帐号，以下联系人、手机号码、QQ、微信、电子邮箱、联系地址、将显示在发帖的联系人这里。</div>
		</div>
	</blockquote>
	<div class="layui-form news_list">
	  	<table class="layui-table">
		    <thead>
				<tr>
					<th>ID</th>
					<th style="text-align:left;">用户登录帐号</th>
					<th>联系人</th>
					<th>手机号码</th>
					<th>用户组</th>
					<th>能否登录</th>
					<th>操作</th>
				</tr> 
		    </thead>
			<tbody class="news_content">
				<?php if(is_array($data)): foreach($data as $key=>$v): ?><tr>
					<td><?php echo ($v['id']); ?></td>
					<td align="left"><?php echo ($v['username']); ?></td>
					<td><?php echo ($v['person']); ?></td>
					<td><?php echo ($v['phone']); ?></td>
					<td><?php echo ($v['title']); ?></td>
					<td>
						<input type="checkbox" name="show" lay-skin="switch" lay-text="允许|禁止" lay-filter="isShow" listId="<?php echo ($v['id']); ?>"  <?php if($v['status'] == 1): ?>checked=""<?php endif; ?> >
						<div class="layui-unselect layui-form-switch layui-form-onswitch" lay-skin="_switch"><em>允许</em><i></i>
						</div>
					</td>
					<td>
					<a class="layui-btn layui-btn-mini links_edit" modify_id="<?php echo ($v['id']); ?>"><i class="iconfont icon-edit"></i> 修改权限或密码</a>
					<a class="layui-btn layui-btn-danger layui-btn-mini del_user" del_Id="<?php echo ($v['id']); ?>"><i class="layui-icon"></i> 删除</a>
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
					$("body").on("click",".links_edit",function(){  //编辑
						var modify_id = $(this).attr("modify_id");
						var index = layui.layer.open({
							title : "编辑信息",
							type : 2,
							content : "<?php echo U('Rule/edit_admin');?>?id="+modify_id,
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

			//添加管理员
			//改变窗口大小时，重置弹窗的高度，防止超出可视区域（如F12调出debug的操作）
			$(window).one("resize",function(){
				$(".Add_btn").click(function(){
					var index = layui.layer.open({
						title : "添加管理员",
						type : 2,
						content : "<?php echo U('Admin/Rule/add_admin');?>",
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

			//是否展示
			form.on('switch(isShow)', function(data){
				var listId=$(this).attr('listId');
				var index = layer.msg('修改中，请稍候',{icon: 16,time:false,shade:0.8});
				data.elem.checked==true ? status = 1 : status = 0 ;
				setTimeout(function(){
					$.post("<?php echo U('Rule/edit_admin_status');?>",{id:listId,status:status},function(data){
						top.layer.close(index);
						top.layer.msg(data);
					})
					layer.close(index);
				},1000);
			})

			$("body").on("click",".del_user",function(){  //删除
				var del_Id=$(this).attr('del_Id');
				layer.confirm('确定删除此信息？',{icon:3, title:'提示信息'},function(data){
						var index = top.layer.msg('数据提交中，请稍候',{icon: 16,time:false,shade:0.8});
						setTimeout(function(){
							$.post("<?php echo U('Rule/delete_admin');?>",{id:del_Id},function(data){
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