<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>文章添加--后台管理</title>
	<meta name="renderer" content="webkit">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="format-detection" content="telephone=no">
	<script src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
	<link rel="stylesheet" href="/Public/admin/layui/css/layui.css" media="all" />
</head>
<body class="childrenBody">
		<form class="layui-form" action="<?php echo U('Users/publish');?>" method="post">
        	<div class="layui-form-item">
                <label class="layui-form-label">发布类型：</label>
				<?php
 $type = I('get.type',0,'intval'); ?>
                <div class="layui-input-block">
					<a href="<?php echo U('Users/publish',array('type'=>2));?>"><input type="radio" name="type" <?php if(($type) == "2"): ?>checked<?php endif; ?> value="2" title="招聘"></a>
					<a href="<?php echo U('Users/publish',array('type'=>5));?>"><input type="radio" name="type" <?php if(($type) == "5"): ?>checked<?php endif; ?> value="5" title="求职"></a>
					<a href="<?php echo U('Users/publish',array('type'=>6));?>"><input type="radio" name="type" <?php if(($type) == "6"): ?>checked<?php endif; ?> value="6" title="资质"></a>
					<a href="<?php echo U('Users/publish',array('type'=>1));?>"><input type="radio" name="type" <?php if(($type) == "1"): ?>checked<?php endif; ?> value="1" title="简历"></a>
                </div>
            </div>
			<?php if(($type == 1)): ?><hr/>
            <div class="layui-form-item">
                <div class="layui-inline">
                  <label class="layui-form-label"><span style="color:red;">*</span>简历姓名：</label>
                  <div class="layui-input-inline">
                    <input type="text" name="person" id="person" lay-verify="required" autocomplete="off" maxlength="5" placeholder="请输入简历姓名" class="layui-input" />
                  </div>
                </div>
                <div class="layui-inline">
                  <label class="layui-form-label">简历号码：</label>
                  <div class="layui-input-inline">
                    <input type="text" name="phone" id="phone" maxlength="11" onblur="jiance_phone(this)" lay-verify="required|phone" autocomplete="off" maxlength="25" placeholder="请输入简历手机号码" class="layui-input" />
                  </div>
				  <span id="tips"><span>
                </div>
            </div>
			<div class="layui-form-item">
                <div class="layui-inline">
                  <label class="layui-form-label">简历QQ：</label>
                  <div class="layui-input-inline">
                    <input type="text" name="qq" id="qq" autocomplete="off" maxlength="13" placeholder="请输入简历QQ" class="layui-input" />
                  </div>
                </div>
                <div class="layui-inline">
                  <label class="layui-form-label">简历邮箱：</label>
                  <div class="layui-input-inline">
                    <input type="text" name="email" id="email" autocomplete="off" maxlength="25" placeholder="请输入简历邮箱" class="layui-input" />
                  </div>
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">出生年月：</label>
                <div class="layui-input-inline">
                  <input type="text" name="birthday" id="birthday" placeholder="yyyy-MM-dd" value="<?php echo ($one['birthday']); ?>" class="layui-input" >
                </div>
                <label class="layui-form-label">性别：</label>
                <div class="layui-input-inline">
                  <input type="radio" name="sex" value="1" title="男" checked="">
      			  <input type="radio" name="sex" value="2" title="女">
                </div>
            </div>
			<hr/><?php endif; ?>
			<?php if(($type < 6) or ($type == 7)): ?><div class="layui-form-item ">
                <label class="layui-form-label"><span style="color:red;">*</span>选择专业：</label>
                <div class="layui-input-inline">
					<select lay-filter="zhuanye" lay-verify="required" lay-search="" name="classid" id="classid">
                      <option selected="selected" value="">请选择</option>
						<?php $map_major=array('parentid'=>0,'range'=>0); if(S('major_classid_select')){ $major_classid_select = S('major_classid_select'); }else{ $major_classid_select = M("major") ->where($map_major)->field("id,title,parentid")->order("showorder asc")->select(); S('major_classid_select',$major_classid_select,array('type'=>'file','expire'=>18000)); }; ?>
                        <?php if(is_array($major_classid_select)): foreach($major_classid_select as $key=>$vo): ?><option  value="<?php echo ($vo['id']); ?>"><?php echo ($vo['title']); ?></option><?php endforeach; endif; ?>
                    </select>
                </div>
                <div class="layui-input-inline">
                    <select id="cid" name="cid" lay-verify="required" lay-search="">
                      <option selected="selected" value="">请选择</option>
                    </select>
                </div>
            </div>
			<?php elseif($type == 6): ?>
            <div class="layui-form-item ">
                <label class="layui-form-label"><span style="color:red;">*</span>选择专业：</label>
                <div class="layui-input-inline">
					<select lay-filter="zizhi_zhuanye" lay-verify="required" lay-search="" name="classid" id="classid">
                      <option selected="selected" value="">资质序列类型</option>
						<?php $map_zizhi_menu=array('parent_id'=>0,'show'=>0); if(S('zizhi_menu_classid_select')){ $zizhi_menu_classid_select = S('zizhi_menu_classid_select'); }else{ $zizhi_menu_classid_select = M("zizhi_menu") ->where($map_zizhi_menu)->field("id,name,parent_id")->order("id")->select(); S('zizhi_menu_classid_select',$zizhi_menu_classid_select,array('type'=>'file','expire'=>18000)); }; ?>
                        <?php if(is_array($zizhi_menu_classid_select)): foreach($zizhi_menu_classid_select as $key=>$vo): ?><option  value="<?php echo ($vo['id']); ?>"><?php echo ($vo['name']); ?></option><?php endforeach; endif; ?>
                    </select>
                </div>
                <div class="layui-input-inline">
                    <select id="cid" name="cid" lay-filter="cid" lay-verify="required" lay-search="">
                      <option selected="selected" value="">资质专业</option>
                    </select>
                </div>
				<div class="layui-input-inline">
                    <select id="cid_dj" name="cid_dj"  lay-search="">
                      <option selected="selected" value="">资质等级</option>
                    </select>
                </div>
            </div><?php endif; ?>
			<?php if(($type) != "1"): ?><div class="layui-form-item">
                <label class="layui-form-label"><span style="color:red;">*</span>信息标题：</label>
                <div class="layui-input-block">
				  <input type="text" name="title" id="title" onblur="jiance(this)" lay-verify="required|title" autocomplete="off" maxlength="25" placeholder="标题限制（8-25字）之间哦" class="layui-input" />
                </div>
			</div><?php endif; ?>
			<?php if(in_array(($type), explode(',',"2,5"))): ?><div class="layui-form-item">
                <label class="layui-form-label"><?php if(($type) == "2"): ?>招聘职位<?php else: ?>意向职位<?php endif; ?>：</label>
                <div class="layui-input-inline">
				  <input type="text" name="job" id="job" autocomplete="off" maxlength="15" placeholder="<?php if(($type) == "2"): ?>请输入您招聘的岗位名称<?php else: ?>请输入您意向职位的名称<?php endif; ?>" class="layui-input" />				  
                </div>
			</div><?php endif; ?>
            <div class="layui-form-item layui-form">
                <div class="layui-inline">
					<label class="layui-form-label"><span style="color:red;">*</span>
					<?php switch($type): case "2": case "5": ?>薪资范围<?php break;?>
						<?php default: ?>价格范围<?php endswitch;?>：
				</label>
					<div class="layui-input-inline">
					  <div class="layui-input-inline">
						<select id="price" name="price" lay-verify="required" lay-search="">
							<?php $__FOR_START_10604__=0;$__FOR_END_10604__=C('PRICE_TYPE')[count];for($i=$__FOR_START_10604__;$i < $__FOR_END_10604__;$i+=1){ ?><option value="<?php echo ($i); ?>"><?php echo C('PRICE_TYPE')[$i];?></option><?php } ?>
						</select>
					  </div>
					</div>
					  <div class="layui-form-mid">（合理选择价格区间，更有效哦）</div>
                </div>
			</div>
            <div class="layui-form-item">
				<label class="layui-form-label"><span style="color:red;">*</span>
				<?php switch($type): case "1": ?>证书地区<?php break;?>
					<?php case "2": ?>工作地区<?php break;?>
					<?php case "6": ?>代办地区<?php break;?>
					<?php case "5": ?>求职地区<?php break;?>
					<?php default: ?>选择地区<?php endswitch;?>：
				</label>
                <div class="layui-input-inline">
					<select lay-filter="province" lay-verify="required" lay-search="" name="province" id="province">
						<option selected="selected" value="">请选择省</option>
						<?php if(S('diqu_classid_select')){ $diqu_classid_select = S('diqu_classid_select'); }else{ $diqu_classid_select = M("diqu") ->where("parentid=0")->field("id,city,parentid")->order("id asc")->select(); S('diqu_classid_select',$diqu_classid_select,array('type'=>'file','expire'=>18000)); }; ?>
						<?php if(is_array($diqu_classid_select)): foreach($diqu_classid_select as $key=>$vo): ?><option  value="<?php echo ($vo['id']); ?>"><?php echo ($vo["city"]); ?></option><?php endforeach; endif; ?>							
					</select>
                </div>
                <div class="layui-input-inline">
                    <select lay-filter="city" lay-verify="required" lay-search="" name="city" id="city">
                        <option></option>
                    </select>
                </div>
            </div>
			<?php if(in_array(($type), explode(',',"1,5"))): ?><div class="layui-form-item">
				<label class="layui-form-label"><span style="color:red;">*</span>社保地区：</label>
                <div class="layui-input-inline">
					<select lay-filter="sprovince" lay-verify="required" lay-search="" name="sprovince" id="sprovince">
						<option selected="selected" value="">请选择省</option>
						<option value="0">无社保</option>
						<?php if(is_array($diqu_classid_select)): foreach($diqu_classid_select as $key=>$vo): ?><option  value="<?php echo ($vo['id']); ?>"><?php echo ($vo["city"]); ?></option><?php endforeach; endif; ?>							
					</select>
                </div>
                <div class="layui-input-inline">
                    <select lay-filter="scity" lay-verify="required" lay-search="" name="scity" id="scity">
                        <option></option>
                    </select>
                </div>
            </div><?php endif; ?>
			<?php if(($type) != "6"): ?><div class="layui-form-item layui-form">
                <label class="layui-form-label">注册情况：</label>
                <div class="layui-input-block">
                    <input type="radio" name="regtype" value="1" title="<?php echo C('REGTYPE')[1];?>" checked="">
                    <input type="radio" name="regtype" value="2" title="<?php echo C('REGTYPE')[2];?>">
                    <input type="radio" name="regtype" value="3" title="<?php echo C('REGTYPE')[3];?>">
                </div>
            </div>
			<?php if(($type) == "1"): ?><div class="layui-form-item layui-form">
                <label class="layui-form-label">证书状态：</label>
                <div class="layui-input-block">
                    <input type="radio" name="cerstatus" value="1" title="<?php echo C('ZZZT_TYPE')[1];?>" checked="">
                    <input type="radio" name="cerstatus" value="2" title="<?php echo C('ZZZT_TYPE')[2];?>">
                    <input type="radio" name="cerstatus" value="3" title="<?php echo C('ZZZT_TYPE')[3];?>">
                </div>
            </div><?php endif; ?>
			<?php if(($type) == "2"): ?><div class="layui-form-item layui-form">
                <label class="layui-form-label">证书用途：</label>
                <div class="layui-input-block">
                    <input type="radio" name="purpose" value="1" title="<?php echo C('ZSYT_TYPE')[1];?>" checked="">
                    <input type="radio" name="purpose" value="2" title="<?php echo C('ZSYT_TYPE')[2];?>">
					<input type="radio" name="purpose" value="3" title="<?php echo C('ZSYT_TYPE')[3];?>">
                </div>
            </div><?php endif; ?>
			<?php if(in_array(($type), explode(',',"1,2,5"))): ?><div class="layui-form-item layui-form">
                <label class="layui-form-label"><?php if(($type) == "2"): ?>聘证用途<?php else: ?>证书适用<?php endif; ?>：</label>
                <div class="layui-input-block">
                    <input type="radio" name="zssy" value="1" title="<?php echo C('ZSSY_TYPE')[1];?>" checked="">
                    <input type="radio" name="zssy" value="2" title="<?php echo C('ZSSY_TYPE')[2];?>">
                    <input type="radio" name="zssy" value="3" title="<?php echo C('ZSSY_TYPE')[3];?>">
                </div>
            </div><?php endif; ?>
            <div class="layui-form-item">
                <label class="layui-form-label"><?php if(in_array(($type), explode(',',"1,5"))): ?>持有职称<?php else: ?>职称要求<?php endif; ?>：</label>
                <div class="layui-input-inline">
                    <select name="academic_title" id="academic_title" lay-filter="academic_title" lay-verify="required">
                        <option value="0"><?php echo C('ZCYQ_TYPE')[0];?></option>
                        <option value="136"><?php echo C('ZCYQ_TYPE')[136];?></option>
                        <option value="5"><?php echo C('ZCYQ_TYPE')[5];?></option>
                        <option value="158"><?php echo C('ZCYQ_TYPE')[158];?></option>
                    </select>
                </div>
                <div class="layui-input-inline">
                    <select name="specialty" id="specialty" lay-filter="specialty" lay-verify="required" lay-search="">
                        <option value="0">无</option>
                    </select>
                </div>
            </div>
            <div class="layui-form-item">
                <div class="layui-inline">
                  <label class="layui-form-label">工作年限：</label>
                  <div class="layui-input-inline">
                    <select name="experience" lay-verify="required" lay-search="">
						<?php $__FOR_START_27500__=0;$__FOR_END_27500__=C('EXPERIENCE_TYPE')[count];for($i=$__FOR_START_27500__;$i < $__FOR_END_27500__;$i+=1){ ?><option value="<?php echo ($i); ?>"><?php echo C('EXPERIENCE_TYPE')[$i];?></option><?php } ?>
                    </select>
                  </div>
                </div>
                <div class="layui-inline">
                  <label class="layui-form-label">学历要求：</label>
                  <div class="layui-input-inline">
                    <select name="degree" lay-verify="required" lay-search="">
						<?php $__FOR_START_2516__=0;$__FOR_END_2516__=C('DEGREE_TYPE')[count];for($i=$__FOR_START_2516__;$i < $__FOR_END_2516__;$i+=1){ ?><option value="<?php echo ($i); ?>"><?php echo C('DEGREE_TYPE')[$i];?></option><?php } ?>
                    </select>
                  </div>
                </div>
            </div><?php endif; ?>
            <div class="layui-form-item layui-form-text layui-form">
                <label class="layui-form-label"><span style="color:red;">*</span>内容详情：</label>
                <div class="layui-input-block">
                  <textarea placeholder="请输入内容" lay-verify="required" name="content" id="content" onblur="jiance(this)" class="layui-textarea"></textarea>
                </div>
			</div>
			<div class="layui-form-item layui-form-text layui-form">
                <label class="layui-form-label"></label>
                <div class="layui-input-block" id="text">
                </div>
			</div>
			  <div class="layui-form-item layui-form">
				<label class="layui-form-label">验证码：</label>
				<div class="layui-input-inline" style="width:150px;">
				  <input type="text" name="code" id="code" lay-verify="required" maxlength="4" placeholder="请输入图片验证码" autocomplete="off" class="layui-input">
				</div>
				<img src="<?php echo U('login/verify');?>" id="yzm" alt="验证码,看不清楚?请点击刷新验证码" align="absmiddle" onclick="javascript:this.src='<?php echo U('login/verify');?>?'+Math.random();" style="cursor:pointer;" />
			  </div>
			<div class="layui-form-item">
                <div class="layui-input-block">
                  <button class="layui-btn" lay-submit="" lay-filter="submit">立即提交</button>
                  <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                </div>
            </div>
        </form>
	<script src="/Public/home/layui/layui.js"></script>
<script>
layui.use(['layer', 'form' ,'jquery','laydate'], function(){
  var layer = parent.layer === undefined ? layui.layer : parent.layer
  ,$ = layui.jquery
  ,laydate = layui.laydate
  ,form = layui.form;
	laydate.render({
		elem: '#birthday'
		,calendar: true
		,showBottom: false
		,max:0
	});
	form.verify({
		title: function(value){  
		  if(value.length < 8 || value.length > 25){  
			return '标题限制（8-25字）之间哦';  
		  }  
		},
	});
	form.on("submit(submit)",function(data){
		var index = top.layer.msg('数据提交中，请稍候',{icon: 16,time:false,shade:0.8});
		setTimeout(function(){
			$.post("<?php echo U('Users/publish');?>",data.field,function(data){
				if(data.success==true){
					layer.close(index);
					layer.msg(data.msg);
					var type = <?php echo I('get.type');?>;
					if(type==1){
						window.location.href = "<?php echo U('Jzjlk/my_jlk_list');?>";
					}else if(type==6){
						window.location.href = "<?php echo U('Zizhi/my_zz_list');?>";
					}else if(type==2){
						window.location.href = "<?php echo U('Recruitment/my_rt_list');?>?type_show=1";
					}else if(type==5){
						window.location.href = "<?php echo U('Recruitment/my_rt_list');?>?type_show=2";
					}
				}else{
					$('#code').val('');
					$('#yzm').attr('src',"<?php echo U('login/verify');?>?"+Math.random());
					layer.close(index);
					layer.msg(data);
				}
			})
		},1000);
		return false;
	});
	form.on('select(zhuanye)', function(aa){
		var a=aa.value;
		$.ajax({
			type:"Post",
			url:"<?php echo U('Api/Ajax/ajax_professional');?>",
			data:{parentid:aa.value,range:0},
			cache:false,
			success:function(msg){
				$("#cid").html(msg)
				form.render('select');
			}
		})
		if(a==136 || a==5 || a==158){
			$('#specialty').attr('disabled',"true");
			$('#academic_title').attr('disabled',"true");
			$('#specialty').html('<option value="0">无</option>')
			$('#academic_title').html('<option value="0">无</option><option value="136">初级职称</option><option value="5">中级职称</option><option value="158">高级职称</option>')
		}else{
			$('#specialty').removeAttr("disabled");
			$('#academic_title').removeAttr("disabled");
		}

	});
	form.on('select(zizhi_zhuanye)', function(aa){
		var a=aa.value;
		if(a == ''){
			$('#cid').html('<option value="">资质专业</option>');
			form.render('select');
		}else{
			$.ajax({
				type:"Post",
				url:"<?php echo U('Api/Ajax/ajax_zizhi');?>",
				data:{parentid:aa.value},
				cache:false,
				success:function(msg){
					
					$("#cid").html(msg)
					$('#cid_dj').html('<option value="">资质等级</option>')
					form.render('select');
				}
			})
		}
	});
	form.on('select(cid)', function(aa){
		var a=aa.value;
		if(a == ''){
			$('#cid_dj').html('<option value="">资质等级</option>');
			form.render('select');
		}else{
			$.ajax({
				type:"Post",
				url:"<?php echo U('Api/Ajax/ajax_zizhi_dj');?>",
				data:{parentid:aa.value},
				cache:false,
				success:function(msg){
					
					$("#cid_dj").html(msg)
					form.render('select');
				}
			})
		}
	});
	form.on('select(academic_title)', function(aa){
		var a=aa.value;
		if(a == 0){
			$('#specialty').html('<option value="0">无</option>');
			form.render('select');
		}else{
			$.ajax({
				type:"Post",
				url:"<?php echo U('Api/Ajax/ajax_professional');?>",
				data:{parentid:aa.value,range:0},
				cache:false,
				success:function(msg){
					
					$("#specialty").html(msg)
					form.render('select');
				}
			})
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
	form.on('select(sprovince)', function(aa){
		var a=aa.value;
		if(a==''){
			$('#scity').html('<option selected="selected" value="">请选择城市</option>');
			form.render('select');
		}else{
			$.ajax({
				type:"Post",
				url:"<?php echo U('Api/Ajax/ajax_citys');?>",
				data:{province:a},
				cache:false,
				success:function(msg){
					$("#scity").html(msg)
					form.render('select');
				}
			})
		}

	});
	
});
function jiance(text){
	var infor = text.value;
	if(infor!=''){
		$.ajax({
		   type: "POST",
		   url: "<?php echo U('Api/Ajax/ajax_text');?>",
		   data: {infor:infor},
		   success: function(msg){
				if(msg!=''){
					$('#text').html('‘信息标题’或‘内容详情’不通过的词组有：【'+msg+'】');
					$('#text').css({'color':'red'});
				}else{
					$('#text').html('通过检测');
					$('#text').css({'color':'#000'});
				}
				
		   }
		});
	}else if(infor==''){
		$('#text').html('');
	}
}
function jiance_phone(obj)
{
	phone = $("#phone").val()
	if(phone==''){
		$('#tips').html('');
		return;
	}
	$.ajax({
	   type: "POST",
	   url: "<?php echo U('Api/Ajax/check_jzjlk_phone');?>",
	   data: "phone="+phone,
	   success: function(msg){
			$('#tips').html(msg);
	   }
	});
}
</script>
</body>
</html>