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
<?php
$this_list = ACTION_NAME=='my_rt_list' ? U('Recruitment/my_rt_list') : U('Recruitment/rt_list'); ?>
	<blockquote class="layui-elem-quote layui-quote-nm">
		栏目筛选：
		<span class="layui-breadcrumb" lay-separator="|">
		  <a href="<?php echo ($this_list); ?>"><font <?php if(in_array(($_GET['type_show']), explode(',',",0"))): ?>style="color:red;"<?php endif; ?>>全部</font></a></a>
		  <a href="<?php echo ($this_list); ?>?type_show=1"><font <?php if(($_GET['type_show']) == "1"): ?>style="color:red;"<?php endif; ?>>招聘</font></a>
		  <a href="<?php echo ($this_list); ?>?type_show=2"><font <?php if(($_GET['type_show']) == "2"): ?>style="color:red;"<?php endif; ?>>求职</font></a>
		</span>
	</blockquote>
	<blockquote class="layui-elem-quote layui-quote-nm">
		未审核的：
		<span class="layui-breadcrumb" lay-separator="|">
		  <a href="<?php echo ($this_list); ?>?examine=0&type_show=<?php echo I('get.type_show');?>"><font <?php if(($_GET['examine']) == "0"): ?>style="color:red;"<?php endif; ?>>未审核</font></a></a>
		</span>
	</blockquote>
	<blockquote class="layui-elem-quote news_search">
		<form class="layui-form" id="form" method="post" action="<?php echo ($this_list); ?>">
			<div class="layui-inline">
				<div class="layui-input-inline">
					<input type="text" value="<?php echo I('id');?>" name="id" placeholder="请输入ID" class="layui-input search_input">
				</div>
				<button class="layui-btn search_btn" lay-submit="">立即提交</button>
			</div>
			<div class="layui-inline">
				<a href="<?php echo U('Users/publish',array('type'=>2));?>" class="layui-btn layui-btn-normal">发布信息</a>
			</div>
			<?php if(authOne('Admin/Recruitment/delete') == true): ?><div class="layui-inline">
				<a class="layui-btn layui-btn-danger batchDel">批量删除</a>
			</div><?php endif; ?>
			<div class="layui-inline">
				<div class="layui-form-mid layui-word-aux">需要审核之后，才能展示在前台</div>
			</div>
		</form>
	</blockquote>
	<div class="layui-form rt_list">
	  	<table class="layui-table">
		    <thead>
				<tr>
					<th><input type="checkbox" name="" lay-skin="primary" lay-filter="allChoose" id="allChoose"></th>
					<th>ID</th>
					<th style="text-align:left;">信息标题</th>
					<th>发布的联系人</th>
					<th>发布栏目</th>
					<th>专业</th>
					<th>地区</th>
					<th>审核状态</th>
					<th>发布时间</th>
					<th>操作</th>
				</tr> 
		    </thead>
			<tbody class="news_content">
			<?php if(is_array($data)): foreach($data as $key=>$v): $one_user = M('admin_users')->field('person')->where(array('id'=>$v['user_id']))->find(); ?>
				<tr>
					<td>
						<input type="checkbox" name="id[]" value="<?php echo ($v['id']); ?>" lay-skin="primary" lay-filter="choose">
						<div class="layui-unselect layui-form-checkbox" lay-skin="primary"><i class="layui-icon"></i>
						</div>
					</td>
					<th><?php echo idEncode($v['id']);?></th>
					<td align="left"><a href="/zp/<?php echo idEncode($v['id']);?>.html" target="_blank"><?php echo ($v['title']); ?></a></td>
					<td><a href="<?php echo U('Rule/edit_admin');?>?id=<?php echo ($v['user_id']); ?>"><?php echo ($one_user['person']); ?></a></td>
					<th><?php if($v['type_show'] == 1): ?>招聘<?php elseif($v['type_show'] == 2): ?>求职<?php endif; ?></th>
					<td><?php echo get_major_name($v['classid']);?> - <?php echo get_major_name($v['cid']);?></td>
					<td><?php echo get_diqu_name($v['province']);?> - <?php echo get_diqu_name($v['city']);?></td>
					<td>
						<input type="checkbox" name="show" listId="<?php echo ($v['id']); ?>" lay-skin="switch" lay-text="是|否" lay-filter="isShow" <?php if(($v['show']) == "0"): ?>checked=""<?php endif; ?>>
						<div class="layui-unselect layui-form-switch" lay-skin="_switch"><em><?php if(($v['show']) == "0"): ?>是<?php else: ?>否<?php endif; ?></em><i></i>
						</div>
					</td>
					<td><?php echo (date("Y-m-d H:i:s",$v['addtime'])); ?></td>
					<td>
					<a class="layui-btn layui-btn-mini preview" listId="<?php echo ($v['id']); ?>"><i class="layui-icon">&#xe615;</i> 预览</a>
					<a class="layui-btn layui-btn-mini news_edit" listId="<?php echo ($v['id']); ?>" typeid="<?php echo ($v['type']); ?>"><i class="iconfont icon-edit"></i> 编辑</a>
					<?php if(authOne('Admin/Recruitment/delete') == true): ?><a class="layui-btn layui-btn-danger layui-btn-mini delete" listId="<?php echo ($v['id']); ?>"><i class="layui-icon">&#xe640;</i> 删除</a><?php endif; ?>
					</td>
				</tr><?php endforeach; endif; ?>
			</tbody>
		</table>
	</div>
	<div id="page"><?php echo ($page); ?></div>
	
	<script type="text/javascript" src="/Public/admin/layui/layui.js"></script>
	<script type="text/javascript">
		layui.config({
			base : "/Public/admin/js/"
		}).use(['form','layer','jquery','laypage','element'],function(){
			var form = layui.form(),
				layer = parent.layer === undefined ? layui.layer : parent.layer,
				laypage = layui.laypage,
				element = layui.element,
				$ = layui.jquery;
					$("body").on("click",".preview",function(){  //预览
						var listId = $(this).attr("listId");
						var w = null;
						var h = null;
						if (w == null || w == '') {
							w=($(window).width()*0.9);
						};
						if (h == null || h == '') {
							h=($(window).height() - 50);
						};
						var index = layui.layer.open({
							area: [w+'px', h +'px'],
							scrollbar: false,//是否允许浏览器出现滚动条
							shadeClose: true,
							maxmin: true,
							title : "预览信息",
							type : 2,
							content : "<?php echo U('Recruitment/preview');?>?id="+listId,
							success : function(layero, index){
								setTimeout(function(){
									layui.layer.tips('点击此处关闭预览', '.layui-layer-setwin .layui-layer-close', {
										tips: 3
									});
								},500)
							}
						})

					})
					$("body").on("click",".news_edit",function(){  //编辑
						var listId = $(this).attr("listId");
						var typeid = $(this).attr("typeid");
						var index = layui.layer.open({
							title : "编辑信息",
							type : 2,
							content : "<?php echo U('Admin/Users/publish_edit');?>?type="+typeid+"&id="+listId,
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
			//全选
			form.on('checkbox(allChoose)', function(data){
				var child = $(data.elem).parents('table').find('tbody input[type="checkbox"]:not([name="examine"])');
				child.each(function(index, item){
					item.checked = data.elem.checked;
				});
				form.render('checkbox');
			});

			//通过判断文章是否全部选中来确定全选按钮是否选中
			form.on("checkbox(choose)",function(data){
				var child = $(data.elem).parents('table').find('tbody input[type="checkbox"]:not([name="examine"])');
				var childChecked = $(data.elem).parents('table').find('tbody input[type="checkbox"]:not([name="examine"]):checked')
				if(childChecked.length == child.length){
					$(data.elem).parents('table').find('thead input#allChoose').get(0).checked = true;
				}else{
					$(data.elem).parents('table').find('thead input#allChoose').get(0).checked = false;
				}
				form.render('checkbox');
			})
			
			//是否展示
			form.on('switch(isShow)', function(data){
				var listId=$(this).attr('listId');
				data.elem.checked==true ? status = 0 : status = 1 ;
				setTimeout(function(){
					$.post("<?php echo U('Recruitment/edit_rt_status');?>",{id:listId,status:status},function(data){
						top.layer.msg(data);
					})
					layer.close(index);
				},500);
			})

			//删除
			$("body").on("click",".delete",function(){
				var listId=$(this).attr('listId');
				layer.confirm('确定删除此信息？',{icon:3, title:'提示信息'},function(data){
						var index = top.layer.msg('数据提交中，请稍候',{icon: 16,time:false,shade:0.8});
						setTimeout(function(){
							$.post("<?php echo U('Recruitment/delete');?>",{id:listId},function(data){
								top.layer.close(index);
								top.layer.msg(data);
								//刷新当前页面
								window.location.reload();
							})
						},1000);
				});
			})
			
			//批量删除
			$(".batchDel").click(function(){
				var $checkbox = $('.rt_list tbody input[type="checkbox"][name="id[]"]');
				var $checked = $('.rt_list tbody input[type="checkbox"][name="id[]"]:checked');
				if($checkbox.is(":checked")){
					// 异步提交多选数组
					var _list = {};
					$('.rt_list tbody input[type="checkbox"][name="id[]"]:checked').each(
					function (i) {
						_list["selectedIDs[" + i + "]"] = $(this).val();
					});
					//  end
					<!-- console.log(_list); -->
					layer.confirm('确定删除选中的信息？',{icon:3, title:'提示信息'},function(index){
						var index = layer.msg('删除中，请稍候',{icon: 16,time:false,shade:0.8});
						setTimeout(function(){
							$.post("<?php echo U('Recruitment/delete');?>",{id:_list},function(data){
								top.layer.close(index);
								top.layer.msg(data);
								//刷新当前页面
								window.location.reload();
							})
						},2000);
					})
				}else{
					layer.msg("请选择需要删除的文章");
				}
			})
		})
	</script>
</body>
</html>