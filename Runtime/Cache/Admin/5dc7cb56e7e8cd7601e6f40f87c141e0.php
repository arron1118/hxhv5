<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>编辑资讯--后台管理</title>
	<meta name="renderer" content="webkit">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="format-detection" content="telephone=no">
	<link rel="stylesheet" href="/Public/admin/layui/css/layui.css" media="all" />
	
	<link rel="stylesheet" href="//at.alicdn.com/t/font_tnyc012u2rlwstt9.css" media="all" />
	<link rel="stylesheet" href="/Public/home/layui/css/layui.css">
	<script src="http://cdn.bootcss.com/blueimp-md5/1.1.0/js/md5.min.js"></script>

</head>

<body class="childrenBody">
	<blockquote class="layui-elem-quote layui-quote-nm">
		栏目筛选：
		<span class="layui-breadcrumb" lay-separator="|">
		  <a href="<?php echo U('News/news_list');?>"><font <?php if(($menu_name) == "0"): ?>style="color:red;"<?php endif; ?>>资讯</font></a></a>
		  <a href="<?php echo U('News/news_list',array('menu_name'=>1));?>"><font <?php if(($menu_name) > "0"): ?>style="color:red;"<?php endif; ?>>前台首页资讯设置</font></a></a>
		</span>
	</blockquote>
	<?php if(($menu_name) == "0"): ?><blockquote class="layui-elem-quote layui-quote-nm">
		栏目筛选：
		<span class="layui-breadcrumb" lay-separator="|">
		  <a href="<?php echo U('News/news_list');?>"><font <?php if(in_array(($_GET['type']), explode(',',",0"))): ?>style="color:red;"<?php endif; ?>>全部</font></a></a>
		  <?php $__FOR_START_8921__=1;$__FOR_END_8921__=C('NEWS_TYPE')[count];for($i=$__FOR_START_8921__;$i < $__FOR_END_8921__;$i+=1){ ?><a href="<?php echo U('News/news_list',array('type'=>$i));?>"><font <?php if(($_GET['type']) == $i): ?>style="color:red;"<?php endif; ?>><?php echo C('NEWS_TYPE')[$i][0];?></font></a><?php } ?>
		</span>
	</blockquote>
	<blockquote class="layui-elem-quote news_search">
		<form class="layui-form" id="form" method="post" action="<?php echo U('News/news_list',array('type'=>I('type',0,'intval')));?>">
			<div class="layui-inline">
				<div class="layui-input-inline">
					<input type="text" value="<?php echo I('id');?>" name="id" placeholder="请输入ID" class="layui-input search_input">
				</div>
				<button class="layui-btn search_btn" lay-submit="">立即提交</button>
			</div>
			<div class="layui-inline">
				<a class="layui-btn layui-btn-normal news_add">添加文章</a>
			</div>
			<div class="layui-inline">
				<a class="layui-btn layui-btn-danger batchDel">批量删除</a>
			</div>
			<div class="layui-inline">
				<div class="layui-form-mid layui-word-aux">需要审核之后，才能展示在前台</div>
			</div>
		</form>
	</blockquote>
	<div class="layui-form news_list">
	  	<table class="layui-table">
		    <colgroup>
				<col width="50">
				<col width="150">
				<col>
				<col width="9%">
				<col width="9%">
				<col width="9%">
				<col width="200">
				<col width="15%">
		    </colgroup>
		    <thead>
				<tr>
					<th><input type="checkbox" name="" lay-skin="primary" lay-filter="allChoose" id="allChoose"></th>
					<th>ID</th>
					<th style="text-align:left;">文章标题</th>
					<th>所属栏目</th>
					<th>发布人</th>
					<th>审核状态</th>
					<th>发布时间</th>
					<th>操作</th>
				</tr> 
		    </thead>
			<tbody class="news_content">
			<?php if(is_array($data)): foreach($data as $key=>$v): $admin_users = M('admin_users')->where('id=%d',$v['author'])->field('username')->find(); ?>
				<tr>
					<td>
						<input type="checkbox" name="id[]" value="<?php echo ($v['news_id']); ?>" lay-skin="primary" lay-filter="choose">
						<div class="layui-unselect layui-form-checkbox" lay-skin="primary"><i class="layui-icon"></i>
						</div>
					</td>
					<th><?php echo idEncode($v['news_id']);?></th>
					<td align="left"><a href="/info/<?php echo idEncode($v['news_id']);?>.html" target="_blank"><?php echo ($v['title']); ?></a></td>
					<th><a href="<?php echo U('News/news_list',array('type'=>$v['type']));?>"><?php echo C('NEWS_TYPE')[$v['type']][0];?></a></th>
					<td><?php echo ($admin_users['username']); ?></td>
					<td>
						<input type="checkbox" name="show" listId="<?php echo ($v['news_id']); ?>" lay-skin="switch" lay-text="是|否" lay-filter="isShow" <?php if(($v['show']) == "1"): ?>checked=""<?php endif; ?>>
						<div class="layui-unselect layui-form-switch" lay-skin="_switch"><em><?php if(($v['show']) == "1"): ?>是<?php else: ?>否<?php endif; ?></em><i></i>
						</div>
					</td>
					<td><?php echo ($v['addtime']); ?></td>
					<td>
					<a class="layui-btn layui-btn-xs" href="<?php echo U('News/preview');?>?id=<?php echo ($v['news_id']); ?>" target="_blank"><i class="layui-icon">&#xe615;</i> 预览</a>
					<a class="layui-btn layui-btn-xs news_edit" listId="<?php echo ($v['news_id']); ?>"><i class="iconfont icon-edit"></i> 编辑</a>
					<?php if(authOne('Admin/News/delete') == true): ?><a class="layui-btn layui-btn-danger layui-btn-xs news_del" listId="<?php echo ($v['news_id']); ?>"><i class="layui-icon">&#xe640;</i> 删除</a><?php endif; ?>
					</td>
				</tr><?php endforeach; endif; ?>
			</tbody>
		</table>
	</div>
	<div id="page"><?php echo ($page); ?></div>
	<?php else: ?>
	<blockquote class="layui-elem-quote layui-quote-nm">
		栏目筛选：
		<span class="layui-breadcrumb" lay-separator="|">
		  <a href="<?php echo U('News/news_list',array('menu_name'=>1));?>"><font <?php if(($menu_name) == "1"): ?>style="color:red;"<?php endif; ?>>第一个栏目</font></a></a>
		  <a href="<?php echo U('News/news_list',array('menu_name'=>2));?>"><font <?php if(($menu_name) == "2"): ?>style="color:red;"<?php endif; ?>>第二个栏目</font></a></a>
		  <a href="<?php echo U('News/news_list',array('menu_name'=>3));?>"><font <?php if(($menu_name) == "3"): ?>style="color:red;"<?php endif; ?>>第三个栏目</font></a></a>
		  <a href="<?php echo U('News/news_list',array('menu_name'=>4));?>"><font <?php if(($menu_name) == "4"): ?>style="color:red;"<?php endif; ?>>第四个栏目</font></a></a>
		</span>
	</blockquote>
	<blockquote class="layui-elem-quote">缩略图尺寸最佳建议（275*130），如果需要在这个缩略图上加热点链接，把需要添加的链接复制到跳转链接这里修改保存提交即可，如果不需要跳转链接，就删除链接为空就自动填上默认的（javascript:;）这个。<br/>
	如果展示为否，那这一块内容将隐藏起来，如果四个栏目都隐藏，那么，首页将不显示这四个栏目内容。
	</blockquote>
	<table class="layui-table">
		<colgroup>
			<col width="20%">
			<col width="50%">
			<col>
		</colgroup>
		    <thead>
		    	<tr>
		    		<th>参数说明</th>
		    		<th>参数值</th>
		    	</tr>
		    </thead>
		<tbody>
			<tr>
				<td>缩略图<br/>最佳尺寸建议（275*130）</td>
				<td>
					<div class="tux">
						<img src="<?php echo ($one['pic']); ?>" style="max-width:275px;width:275px;height:130px;float:left;margin-left: 111px;" /><br/>
						<div class="layui-form-item" style="float:left;" id="baocun">
							<label class="layui-form-label"></label>
								<button type="button" class="layui-btn" id="tux">
								  <i class="layui-icon">&#xe67c;</i>选择图片
								</button>
								<button class="layui-btn" id="upload">保存上传</button>
						</div>
					</div>
				</td>
			</tr>
		</tbody>
	</table>
	<form class="layui-form">
		<table class="layui-table">
			<colgroup>
				<col width="20%">
				<col width="50%">
				<col>
		    </colgroup>

		    <tbody>
		    	<tr>
		    		<td>栏目名称</td>
		    		<td>
						<div class="layui-input-block" style="margin-left: 0px;">
							<select name="menu_name" lay-verify="required">
							  <?php $__FOR_START_22892__=1;$__FOR_END_22892__=C('NEWS_TYPE')[count];for($i=$__FOR_START_22892__;$i < $__FOR_END_22892__;$i+=1){ ?><option value="<?php echo ($i); ?>" <?php if(($i) == $one['menu_name']): ?>selected<?php endif; ?>><?php echo C('NEWS_TYPE')[$i][0];?></option><?php } ?>
							</select>
						</div>
					</td>
		    	</tr>
		    	<tr>
		    		<td>跳转链接</td>
		    		<td><input type="text" class="layui-input" value="<?php echo ($one['url']); ?>" name="url"></td>
		    	</tr>
		    	<tr>
		    		<td>展示</td>
					<td>
						<input type="checkbox" name="show" listId="<?php echo ($one['show']); ?>" lay-skin="switch" lay-text="是|否"  <?php if(($one['show']) == "1"): ?>checked=""<?php endif; ?>>
						<div class="layui-unselect layui-form-switch" lay-skin="_switch"><em><?php if(($one['show']) == "1"): ?>是<?php else: ?>否<?php endif; ?></em><i></i>
						</div>
					</td>
		    	</tr>
		    </tbody>
		</table>
		<div class="layui-form-item" style="text-align: right;">
			<div class="layui-input-block">
				<input type="hidden" class="layui-input record" value="<?php echo ($menu_name); ?>" name="id">
				<button class="layui-btn" lay-submit="" lay-filter="submit">立即提交</button>
				<button type="reset" class="layui-btn layui-btn-primary">重置</button>
		    </div>
		</div>
	</form><?php endif; ?>
	<script src="/Public/home/layui/layui.js"></script>
	<script type="text/javascript">
		layui.use(['layer', 'form' ,'jquery','upload','element'], function(){
		  var layer = parent.layer === undefined ? layui.layer : parent.layer
		  ,upload = layui.upload
		  ,$ = layui.jquery
		  ,element = layui.element
		  ,form = layui.form;
			upload.render({
				elem: '#tux'
				,url: "<?php echo U('Img/news_img');?>"
				,auto: false //选择文件后不自动上传
				,method:'post' //上传接口的 HTTP 类型
				,bindAction: '#upload' //指向一个按钮触发上传
				,accept: 'images' //允许上传的文件类型
				,data: {menu_name: '<?php echo ($menu_name); ?>'} //请求上传接口的额外参数
				,choose: function(obj){
				obj.preview(function(index, file, result){
				  $(".tux img").attr("src",result);
				});
				}
				,done: function(res){
					console.log(res);
					if(res.status==true){
						$("#upload").attr("class",'layui-btn layui-btn-disabled');
						$("#upload").remove();
						$('#baocun').append('<button class="layui-btn layui-btn-disabled">您上传的缩略图已保存。</button>');
						layer.msg(res.msg);
					}else{
						layer.msg(res.msg);
					}
				}
				,error: function(){
					layer.msg('请求异常，请稍后再试');
				}
			});
			form.on("submit(submit)",function(data){
				//弹出loading
				var index = top.layer.msg('数据提交中，请稍候',{icon: 16,time:false,shade:0.8});
				console.log(data.field);
				setTimeout(function(){
					$.post("<?php echo U('News/news_list');?>",data.field,function(data){
					
						layer.close(index);
						layer.msg(data.msg);
					})
				},1000);
				return false;
			});
					$("body").on("click",".news_edit",function(){  //编辑
						var listId = $(this).attr("listId");
						var index = layui.layer.open({
							title : "编辑信息",
							type : 2,
							content : "/index.php/Admin/News/news_edit/id/"+listId,
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
				$(".news_add").click(function(){
					var index = layui.layer.open({
						title : "添加文章",
						type : 2,
						content : "<?php echo U('Admin/News/news_add',array('type'=>I('type',0,'intval')));?>",
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

			//全选
			form.on('checkbox(allChoose)', function(data){
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
			
			//是否展示
			form.on('switch(isShow)', function(data){
				var listId=$(this).attr('listId');
				var index = layer.msg('修改中，请稍候',{icon: 16,time:false,shade:0.8});
				data.elem.checked==true ? status = 1 : status = 0 ;
				setTimeout(function(){
					$.post("<?php echo U('News/edit_news_status');?>",{id:listId,status:status},function(data){
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
							$.post("<?php echo U('News/delete');?>",{id:listId},function(data){
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
				var $checkbox = $('.news_list tbody input[type="checkbox"][name="id[]"]');
				var $checked = $('.news_list tbody input[type="checkbox"][name="id[]"]:checked');
				if($checkbox.is(":checked")){
					// 异步提交多选数组
					var _list = {};
					$('.news_list tbody input[type="checkbox"][name="id[]"]:checked').each(
					function (i) {
						_list["selectedIDs[" + i + "]"] = $(this).val();
					});
					//  end
					<!-- console.log(_list); -->
					layer.confirm('确定删除选中的信息？',{icon:3, title:'提示信息'},function(index){
						var index = layer.msg('删除中，请稍候',{icon: 16,time:false,shade:0.8});
						setTimeout(function(){
							$.post("<?php echo U('News/delete');?>",{id:_list},function(data){
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