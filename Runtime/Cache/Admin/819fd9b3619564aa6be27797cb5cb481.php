<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>分配权限--后台管理</title>
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
	<h1 style="text-left: center;font-size: 22px;"><a href="<?php echo U('Admin/Rule/group');?>">返回</a></h1>
	<h1 style="text-align: center;font-size: 22px;">为<span style="color:red"><?php echo ($group_data['title']); ?></span>分配权限</h1>
	<div class="layui-form news_list">
	<form class="layui-form" method="post">
	  	<table class="layui-table">
		    <colgroup>
				<col width="12%">
				<col>
		    </colgroup>
		    <thead>
				<tr>
					<th><input type="checkbox" name="" lay-skin="primary" lay-filter="allChoose" id="allChoose"></th>
					<th>操作</th>
				</tr> 
		    </thead>
			<input type="hidden" name="id" value="<?php echo ($group_data['id']); ?>">
			<tbody class="news_content">
				<?php if(is_array($rule_data)): foreach($rule_data as $key=>$v): if(empty($v['_data'])): ?><tr class="b-group">
							<td>
								<?php echo ($v['title']); ?>
								<input type="checkbox" name="rule_ids[]" value="<?php echo ($v['id']); ?>" lay-skin="primary" <?php if(in_array($v['id'],$group_data['rules'])): ?>checked="checked"<?php endif; ?>>
								<div class="layui-unselect layui-form-checkbox" lay-skin="primary" onclick="checkAll(this)"><i class="layui-icon"></i>
								</div>
							</td>
							<td></td>
						</tr>
						<?php else: ?>
						<tr class="b-group">
							<td>
								<?php echo ($v['title']); ?>
								<input type="checkbox" name="rule_ids[]" value="<?php echo ($v['id']); ?>" lay-skin="primary" lay-filter="choose" <?php if(in_array($v['id'],$group_data['rules'])): ?>checked="checked"<?php endif; ?>>
								<div class="layui-unselect layui-form-checkbox" lay-skin="primary"><i class="layui-icon"></i>
								</div>
							</td>
							<td>
								<?php if(is_array($v['_data'])): foreach($v['_data'] as $key=>$n): ?><table class="layui-table">
										<colgroup>
											<col width="15%">
											<col>
										</colgroup>
										<tr class="b-group">
											<td>
												<?php echo ($n['title']); ?>
												<input type="checkbox" name="rule_ids[]" value="<?php echo ($n['id']); ?>" lay-skin="primary" lay-filter="choose" <?php if(in_array($n['id'],$group_data['rules'])): ?>checked="checked"<?php endif; ?>>
												<div class="layui-unselect layui-form-checkbox" lay-skin="primary"><i class="layui-icon"></i>
												</div>
											</td>
											<td style="text-align:left;">
												<?php if(!empty($n['_data'])): if(is_array($n['_data'])): $i = 0; $__LIST__ = $n['_data'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$c): $mod = ($i % 2 );++$i; echo ($c['title']); ?>
														<input type="checkbox" name="rule_ids[]" value="<?php echo ($c['id']); ?>" lay-skin="primary" lay-filter="choose" <?php if(in_array($c['id'],$group_data['rules'])): ?>checked="checked"<?php endif; ?>>&nbsp;&nbsp;&nbsp;&nbsp;
														<div class="layui-unselect layui-form-checkbox" lay-skin="primary"><i class="layui-icon"></i>
														</div><?php endforeach; endif; else: echo "" ;endif; endif; ?>
											</td>
										</tr>
									</table><?php endforeach; endif; ?>
							</td>
						</tr><?php endif; endforeach; endif; ?>
				<tr>
					<td>
					</td>
					<td style="text-align:left;">
					<button class="layui-btn" lay-submit="">立即提交</button>
					</td>
				</tr>
			</tbody>
		</table>
	</form>
	</div>
	<div id="page"></div>
	<script type="text/javascript" src="/Public/admin/layui/layui.js"></script>
	<script>
		function checkAll(obj){
			$(obj).parents('.b-group').eq(0).find('tbody input[type="checkbox"]:not([name="show"])').prop('checked', $(obj).prop('checked'));
		}
	</script>
	<script type="text/javascript">
		layui.config({
			base : "/Public/admin/js/"
		}).use(['form','layer','jquery'],function(){
			var form = layui.form(),
				layer = parent.layer === undefined ? layui.layer : parent.layer,
				laypage = layui.laypage,
				$ = layui.jquery;
				
			//全选
			form.on('checkbox(allChoose)', function(data){
			console.log(data.elem.checked);
				var child = $(data.elem).parents('table').find('tbody input[type="checkbox"]:not([name="show"])');
				child.each(function(index, item){
					item.checked = data.elem.checked;
				});
				form.render('checkbox');
			});
			
			//通过判断文章是否全部选中来确定全选按钮是否选中
			form.on("checkbox(choose)",function(data){
				var child = $(data.elem).parents('table').find('tbody input[type="checkbox"]:not([name="show"])');
				var childChecked = $(data.elem).parents('table').find('tbody input[type="checkbox"]:not([name="show"]):checked')
				if(childChecked.length == child.length){
					$(data.elem).parents('table').find('thead input#allChoose').get(0).checked = true;
				}else{
					$(data.elem).parents('table').find('thead input#allChoose').get(0).checked = false;
				}
				form.render('checkbox');
			})
		})
	</script>
</body>

</html>