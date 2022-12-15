<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>修改--后台管理</title>
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
			<label class="layui-form-label">用户头像：</label>
			<div class="tux">
				<img src="<?php echo ($user_data['avatar']); ?>">
			</div>	
		</div>
		<div class="layui-form-item" id="baocun">
			<label class="layui-form-label"></label>
				<button type="button" class="layui-btn" id="tux">
				  <i class="layui-icon">&#xe67c;</i>选择图片
				</button>
				<button class="layui-btn" id="upload">保存上传</button>
		</div>
	<form class="layui-form" method="post">
		<input type="hidden" name="avatar" id="ad_code" value="<?php echo ($user_data['avatar']); ?>">
		<div class="layui-form-item">
			<div class="layui-inline">		
				<label class="layui-form-label">用户帐号</label>
				<div class="layui-input-inline">
					<input class="layui-input newsAuthor" lay-verify="required" type="text" name="username" placeholder="登录后台的帐号哦" value="<?php echo ($user_data['username']); ?>">
				</div>
			</div>
		</div>
		<hr/>
            <div class="layui-form-item">
                <label class="layui-form-label">联系人：</label>
                <div class="layui-input-inline">
                  <input type="text" name="person" id="person" value="<?php echo ($user_data['person']); ?>" lay-verify="required" autocomplete="off" placeholder="请输入联系人称呼" class="layui-input">
                </div>
            </div>
			<div class="layui-form-item">
                <label class="layui-form-label">手机号码：</label>
                <div class="layui-input-inline">
                  <input type="text" name="phone" id="phone" value="<?php echo ($user_data['phone']); ?>" lay-verify="phone" placeholder="请输入手机号码" autocomplete="off" class="layui-input">
                </div>
                <label class="layui-form-label">微信：</label>
                <div class="layui-input-inline">
                  <input type="text" name="weixin" value="<?php echo ($user_data['weixin']); ?>" autocomplete="off" placeholder="请输入微信" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">QQ：</label>
                <div class="layui-input-inline">
                  <input type="text" name="qq" value="<?php echo ($user_data['qq']); ?>" autocomplete="off" placeholder="请输入QQ" class="layui-input">
                </div>
                <label class="layui-form-label">电子邮箱：</label>
                <div class="layui-input-inline">
                  <input type="text" name="email" value="<?php echo ($user_data['email']); ?>" lay-verify="email" autocomplete="off" placeholder="请输入电话号码" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">联系地址：</label>
                <div class="layui-input-inline">
					<select lay-filter="province" lay-verify="required" lay-search="" name="province" id="province">
						<option selected="selected" value="">请选择省</option>
						<?php if(S('diqu_classid_select')){ $diqu_classid_select = S('diqu_classid_select'); }else{ $diqu_classid_select = M("diqu") ->where("parentid=0")->field("id,city,parentid")->order("id asc")->select(); S('diqu_classid_select',$diqu_classid_select,array('type'=>'file','expire'=>18000)); }; ?>
						<?php if(is_array($diqu_classid_select)): foreach($diqu_classid_select as $key=>$vo): ?><option value="<?php echo ($vo['id']); ?>" <?php if(($user_data['province']) == $vo['id']): ?>selected<?php endif; ?>><?php echo ($vo["city"]); ?></option><?php endforeach; endif; ?>							
					</select>
                </div>
                <div class="layui-input-inline">
                    <select lay-filter="city" lay-verify="required" lay-search="" name="city" id="city">
					  <?php if(($user_data['city']) > "0"): $city_list = get_province_list($user_data['province']);?>
						<?php if(is_array($city_list)): foreach($city_list as $key=>$vo): ?><option value="<?php echo ($vo['id']); ?>" <?php if($user_data['city'] == $vo['id']): ?>selected="selected"<?php endif; ?> ><?php echo ($vo["city"]); ?></option><?php endforeach; endif; ?>
					  <?php else: ?>
					  <option selected="selected" value="">请选择</option><?php endif; ?>
                    </select>
                </div>
					<div class="layui-input-inline">
					  <input type="text" name="address" id="address" value="<?php echo ($user_data['address']); ?>" lay-verify="required" autocomplete="off" placeholder="请输入详细地址" class="layui-input">
					</div>
            </div>
		<hr/>
		<div class="layui-form-item">
		<input type="hidden" name="id" value="<?php echo ($user_data['id']); ?>">
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
			,url: "<?php echo U('Rule/userinfo');?>"
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
				if(res.status==true){
					$("#upload").attr("class",'layui-btn layui-btn-disabled');
					$("#ad_code").val(res.src);
					$("#avatar").val(res.src);
					$("#upload").remove();
					layer.msg(res.msg);
				}else{
					layer.msg(res.error_info);
				}
			}
			,error: function(){
				layer.msg('请求异常，请稍后再试');
			}
		});
		form.on('select(province)', function(aa){
			$.ajax({
				type:"Post",
				url:"<?php echo U('Api/Ajax/ajax_city');?>",
				data:{province:aa.value},
				cache:false,
				success:function(msg){
					$("#city").html(msg)
					form.render('select');
				}
			})
		});
		form.on("submit(submit)",function(data){
				var username = $(" input[ name='username' ] ").val();
				var phone = $(" input[ name='phone' ] ").val();
				var email = $(" input[ name='email' ] ").val();
				var password = $(" input[ name='password' ] ").val();
				var status = $("input[name='status']:checked").val();
				var id = $(" input[ name='id' ] ").val();
				var avatar = $(" input[ name='avatar' ] ").val();
				
				var person = $(" input[ name='person' ] ").val();
				var weixin = $(" input[ name='weixin' ] ").val();
				var qq = $(" input[ name='qq' ] ").val();
				var province = $("select[name='province']").val();
				var city = $("#city option:selected ").val();
				var address = $(" input[ name='address' ]").val();
				var _list = {};
				$('input[type="checkbox"][name="group_ids[]"]:checked').each(
				function (i) {
					_list["selectedIDs[" + i + "]"] = $(this).val();
				});
			var index = top.layer.msg('数据提交中，请稍候',{icon: 16,time:false,shade:0.8});
			setTimeout(function(){
				$.post("<?php echo U('Rule/userinfo');?>",{group_ids:_list,username:username,phone:phone,email:email,password:password,status:status,id:id,avatar:avatar,person:person,weixin:weixin,qq:qq,province:province,city:city,address:address},function(data){
					top.layer.close(index);
					top.layer.msg(data.msg);
					layer.closeAll("iframe");
				})
			},1000);
			return false;
		});
		
	});
	</script>
</body>

</html>