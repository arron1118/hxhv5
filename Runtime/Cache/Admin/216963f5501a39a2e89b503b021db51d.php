<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>编辑广告--后台管理</title>
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
	<blockquote class="layui-elem-quote layui-quote-nm">
		栏目筛选：
		<span class="layui-breadcrumb" lay-separator="|">
		  <a href="<?php echo U('Ad/ad_list');?>"><font <?php if(in_array(($_GET['pid']), explode(',',",0"))): ?>style="color:red;"<?php endif; ?>>全部</font></a></a>
		  <?php $__FOR_START_16706__=1;$__FOR_END_16706__=C('AD_POSITION')[count];for($i=$__FOR_START_16706__;$i < $__FOR_END_16706__;$i+=1){ ?><a href="<?php echo U('Ad/ad_list',array('pid'=>$i));?>"><font <?php if(($_GET['pid']) == $i): ?>style="color:red;"<?php endif; ?>><?php echo C('AD_POSITION')[$i][0];?></font></a><?php } ?>
		</span>
	</blockquote>
	<blockquote class="layui-elem-quote news_search">
		<form class="layui-form" id="form" method="post" action="<?php echo U('Ad/ad_list',array('pid'=>I('pid',0,'intval')));?>">
			<div class="layui-inline">
				<div class="layui-input-inline">
					<input type="text" value="<?php echo I('id');?>" name="id" placeholder="请输入ID" class="layui-input search_input">
				</div>
				<button class="layui-btn search_btn" lay-submit="">立即提交</button>
			</div>
			<div class="layui-inline">
				<a class="layui-btn layui-btn-normal Ad_add">添加广告</a>
			</div>
			<div class="layui-inline">
				<div class="layui-form-mid layui-word-aux">为了友好显示，每个广告位置的轮播，最多只能添加三个。。。显示状态为否，就不能在前台展示出来。为了防止出错，不能修改广告位置。</div>
			</div>
		</form>
	</blockquote>
	<div class="layui-form ad_list">
	  	<table class="layui-table">
		    <colgroup>
				<col width="100">
				<col width="20%">
				<col>
				<col width="9%">
				<col width="9%">
				<col width="9%">
				<col width="200">
				<col width="15%">
		    </colgroup>
		    <thead>
				<tr>
					<th>ID</th>
					<th>广告位置</th>
					<th>广告链接</th>
					<th>广告图片</th>
					<th>新窗口打开</th>
					<th>显示</th>
					<th>操作</th>
				</tr> 
		    </thead>
			<tbody class="news_content">
			<?php if(is_array($data)): foreach($data as $key=>$v): ?><tr>
					<th><?php echo ($v['ad_id']); ?></th>
					<th><a href="<?php echo U('Ad/ad_list',array('pid'=>$v['pid']));?>"><?php echo C('AD_POSITION')[$v['pid']][0];?></a></th>
					<th><?php echo ($v['ad_link']); ?></th>
					<th><a href="<?php echo ($v['ad_code']); ?>" target="_blank"><img style="width:100px;max-height:50px;float:right;" src="<?php echo ($v['ad_code']); ?>" /></a></th>
					<td>
						<input type="checkbox" name="target" listId="<?php echo ($v['ad_id']); ?>" lay-skin="switch" lay-text="是|否" lay-filter="target" <?php if(($v['target']) == "1"): ?>checked=""<?php endif; ?>>
						<div class="layui-unselect layui-form-switch" lay-skin="_switch"><em><?php if(($v['target']) == "1"): ?>是<?php else: ?>否<?php endif; ?></em><i></i>
						</div>
					</td>
					<td>
						<input type="checkbox" name="show" listId="<?php echo ($v['ad_id']); ?>" lay-skin="switch" lay-text="是|否" lay-filter="show" <?php if(($v['show']) == "1"): ?>checked=""<?php endif; ?>>
						<div class="layui-unselect layui-form-switch" lay-skin="_switch"><em><?php if(($v['show']) == "1"): ?>是<?php else: ?>否<?php endif; ?></em><i></i>
						</div>
					</td>
					<td><a class="layui-btn layui-btn-mini Ad_edit" listId="<?php echo ($v['ad_id']); ?>"><i class="iconfont icon-edit"></i> 编辑</a><a class="layui-btn layui-btn-danger layui-btn-mini news_del" listId="<?php echo ($v['ad_id']); ?>"><i class="layui-icon">&#xe640;</i> 删除</a>
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

					$("body").on("click",".Ad_edit",function(){  //编辑
						var listId = $(this).attr("listId");
						var index = layui.layer.open({
							title : "编辑信息",
							type : 2,
							content : "/index.php/Admin/Ad/Ad_edit/id/"+listId,
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

			//添加文章
			//改变窗口大小时，重置弹窗的高度，防止超出可视区域（如F12调出debug的操作）
			$(window).one("resize",function(){
				$(".Ad_add").click(function(){
					var index = layui.layer.open({
						title : "添加广告",
						type : 2,
						content : "<?php echo U('Admin/Ad/Ad_add',array('pid'=>I('pid',0,'intval')));?>",
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
			
			//打开方式
			form.on('switch(target)', function(data){
				var listId=$(this).attr('listId');
				var index = layer.msg('修改中，请稍候',{icon: 16,time:false,shade:0.8});
				data.elem.checked==true ? target = 1 : target = 2 ;
				setTimeout(function(){
					$.post("<?php echo U('Ad/edit_Ad_status');?>",{id:listId,target:target},function(data){
						top.layer.close(index);
						top.layer.msg(data);
					})
					layer.close(index);
				},500);
			})
			
			//是否展示
			form.on('switch(show)', function(data){
				var listId=$(this).attr('listId');
				var index = layer.msg('修改中，请稍候',{icon: 16,time:false,shade:0.8});
				data.elem.checked==true ? show = 1 : show = 2 ;
				setTimeout(function(){
					$.post("<?php echo U('Ad/edit_Ad_status');?>",{id:listId,show:show},function(data){
						top.layer.close(index);
						top.layer.msg(data);
					})
					layer.close(index);
				},500);
			})
			
			//删除
			$("body").on("click",".news_del",function(){  
				var listId=$(this).attr('listId');
				layer.confirm('确定删除此信息？',{icon:3, title:'提示信息'},function(data){
						var index = top.layer.msg('数据提交中，请稍候',{icon: 16,time:false,shade:0.8});
						setTimeout(function(){
							$.post("<?php echo U('Ad/delete');?>",{id:listId},function(data){
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