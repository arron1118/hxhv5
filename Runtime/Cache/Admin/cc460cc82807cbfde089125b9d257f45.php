<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>添加广告--后台管理</title>
	<meta name="renderer" content="webkit">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="format-detection" content="telephone=no">
	<link rel="stylesheet" href="/Public/admin/layui/css/layui.css" media="all" />
	
	<link rel="stylesheet" href="/Public/home/layui/css/layui.css">
<style>
.tux img{max-height:60px;min-height:30px;}
</style>

</head>

<body class="childrenBody">
		<div class="layui-form-item">
			<label class="layui-form-label">广告图片：</label>
			<div class="tux">
				<img src="">
			</div>	
		</div>
		<div class="layui-form-item" id="baocun">
			<label class="layui-form-label"></label>
				<button type="button" class="layui-btn" id="tux">
				  <i class="layui-icon">&#xe67c;</i>选择图片
				</button>
				<button class="layui-btn" id="upload">保存上传</button>
		</div>
	<form class="layui-form">
		<input type="hidden" name="ad_code" id="ad_code">
		<div class="layui-form-item">
			<label class="layui-form-label">广告链接</label>
			<div class="layui-input-block">
				<input type="text" class="layui-input newsName" name="ad_link" id="ad_link" value="" lay-verify="required" placeholder="广告链接。如果添加非本站链接，必须在前面加【http://】">
			</div>
		</div>
		<div class="layui-form-item">
			<div class="layui-inline">
				<label class="layui-form-label">广告位置</label>
				<div class="layui-input-inline">
					<select name="pid" id="pid" lay-verify="required" class="newsLook">
				        <option value="">请选择</option>
						<?php $__FOR_START_32709__=1;$__FOR_END_32709__=C('AD_POSITION')[count];for($i=$__FOR_START_32709__;$i < $__FOR_END_32709__;$i+=1){ $ad = M('ad')->where(array('pid'=>$i))->count(); ?>
						<?php if(($ad < C('AD_POSITION')[$i][1])): ?><option value="<?php echo ($i); ?>" <?php if(($_GET['pid']) == $i): ?>selected<?php endif; ?>><?php echo C('AD_POSITION')[$i][0];?></option><?php endif; } ?>
				    </select>
				</div>
			</div>
		</div>
		<div class="layui-form-item">
			<div class="layui-inline">
				<label class="layui-form-label">打开方式</label>
				<div class="layui-input-inline">
					<select name="target" id="target" class="newsLook">
				        <option value="1" ><?php echo C('LINK_TYPE')[1][0];?></option>
				        <option value="2" ><?php echo C('LINK_TYPE')[2][0];?></option>
				    </select>
				</div>
			</div>
		</div>
		<div class="layui-form-item">
			<div class="layui-inline">
				<label class="layui-form-label">是否显示</label>
				<div class="layui-input-inline">
					<select name="show" id="show" class="newsLook">
				        <option value="1" ><?php echo C('YN_TYPE')[0];?></option>
				        <option value="2" ><?php echo C('YN_TYPE')[1];?></option>
				    </select>
				</div>
			</div>
		</div>
		<div class="layui-form-item">
			<div class="layui-input-block">
				<button class="layui-btn" lay-submit="" lay-filter="submit">立即提交</button>
				<button type="reset" class="layui-btn layui-btn-primary">重置</button>
		    </div>
		</div>
	</form>
	<script src="/Public/home/layui/layui.js"></script>
	<script type="text/javascript">
	layui.use(['layer', 'form' ,'jquery','laydate','upload'], function(){
	  var layer = parent.layer === undefined ? layui.layer : parent.layer
	  ,upload = layui.upload
	  ,laydate = layui.laydate
	  
	  ,$ = layui.jquery
	  ,form = layui.form;

		upload.render({
			elem: '#tux'
			,url: "<?php echo U('Ad/add_img');?>"
			,auto: false //选择文件后不自动上传
			,method:'post' //上传接口的 HTTP 类型
			,bindAction: '#upload' //指向一个按钮触发上传
			,accept: 'images' //允许上传的文件类型
			,choose: function(obj){
			obj.preview(function(index, file, result){
			  $(".tux img").attr("src",result);
			});
			}
			,done: function(res){
				console.log(res)
				if(res.status==1){
					$("#upload").attr("class",'layui-btn layui-btn-disabled');
					$("#ad_code").val(res.src);
					$("#upload").remove();
					$('#baocun').append('<button class="layui-btn layui-btn-disabled">已保存，请编辑其他内容完成提交。</button>')
					layer.msg(res.msg);
				}else{
					layer.msg(res.error_info);
				}
			}
			,error: function(){
				layer.msg('请求异常，请稍后再试');
			}
		});
		
		form.on("submit(submit)",function(data){
			var ad_code = $("#ad_code").val();
			if(ad_code==''){
				layer.msg('请选择图片，点击保存上传再提交');
				return false;
			}
			var index = top.layer.msg('数据提交中，请稍候',{icon: 16,time:false,shade:0.8});
			setTimeout(function(){
				$.post("<?php echo U('Ad/Ad_add');?>",data.field,function(data){
				console.log(data)
					if(data.status==1){
						top.layer.close(index);
						top.layer.msg(data.msg);
						layer.closeAll("iframe");
						//刷新父页面
						parent.location.reload();
					}else{
						top.layer.close(index);
						layer.msg(data.msg);
					}
				})
			},1000);
			return false;
		});
		
		
	});
	</script>
</body>

</html>