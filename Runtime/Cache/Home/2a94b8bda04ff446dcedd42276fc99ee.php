<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title><?php echo systemCache('web_info.store_name');?> - 首页</title>
		<!-- <title>首页 - <?php echo systemCache('web_info.store_name');?></title> -->
		<meta name="keywords" content="<?php echo systemCache('web_info.store_keyword');?>">
		<meta name="description" content="<?php echo systemCache('web_info.store_desc');?>">
		<link href="/Public/layui/css/layui.css" rel="stylesheet" />
		<link rel="stylesheet" href="/Public/css/public.css" />
		<script type="text/javascript" src="/Public/layui/layui.js" ></script>
		<script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
		<script type="text/javascript" src="/Public/js/jquery.SuperSlide.2.1.1.js"></script>
		
		<?php if(systemCache('color.color_switch') == 'on'): ?><style type="text/css">
	.Nnav{background-color: #<?php echo systemCache('color.color_subject');?>;}
	
	
	.T_nav .search .a1{border:2px solid #<?php echo systemCache('color.color_subject');?>;}
	.T_nav .search .a2{background-color: #<?php echo systemCache('color.color_subject');?>;}
	.T_nav .btn02{background-color: #<?php echo systemCache('color.color_subject');?>;}
	
	.ny_cen .left .a1tit{background-color: #<?php echo systemCache('color.color_subject');?>;}
	.ny_cen .left .a1tit p{color: #ffffff;}
	.ny_cen .left .type a.on{background-color:#<?php echo systemCache('color.color_subject');?>;border-bottom: 1px solid #<?php echo systemCache('color.color_subject');?>;}
	.ny_cen .left .type a:hover{background-color:#<?php echo systemCache('color.color_ny_hover_on');?>;border-bottom: 1px solid #<?php echo systemCache('color.color_ny_hover_on');?>;}
	.ny_cen .left .news h3{color: #<?php echo systemCache('color.color_subject');?>;}
	
	
	.ny_cen .left .cont h3{color: #<?php echo systemCache('color.color_subject');?>;}
	.ny_cen .left .cont .tel{background: no-repeat 35px center #<?php echo systemCache('color.color_subject');?>;}
	
	.in_a5 .w12 .layui-tab .layui-tab-title .layui-this:after{border-top:2px solid #<?php echo systemCache('color.color_subject');?>;}
	
	
	.layui-bg-blue {
		background-color: #<?php echo systemCache('color.color_subject');?>!important;
	}
	.layui-nav .layui-nav-child dd.layui-this a,.layui-nav-child dd.layui-this {
		background-color: #<?php echo systemCache('color.color_ny_hover_on');?>;
	}
	.layui-bg-blue .layui-nav-bar,.layui-bg-blue .layui-nav-itemed:after,.layui-bg-blue .layui-this:after {
		background-color: #<?php echo systemCache('color.color_ny_hover_on');?>;
	}
	.layui-laypage a:hover {
		color: #<?php echo systemCache('color.color_subject');?>
	}
	.layui-laypage .layui-laypage-curr .layui-laypage-em {
		background-color: #<?php echo systemCache('color.color_ny_hover_on');?>;
	}
	.layui-breadcrumb a:hover {
		color: #<?php echo systemCache('color.color_ny_hover_on');?>!important
	}

	</style><?php endif; ?>
		<style type="text/css">
			.apply{display:none;color:#fff;background-color:#1f9ef2;font-size:12px;width:60px;height:60px;line-height:60px;text-align:center;position: fixed;top: 400px;right: 5px;border-radius: 50px;}
			.feedback{color:#fff;background-color:#f49c11;font-size:12px;width:60px;height:60px;line-height:60px;text-align:center;position: fixed;bottom:10px;right: 5px;border-radius: 50px;}
			.apply a,.feedback a{color:#fff;}
			.show_apply{width: 220px;border-radius: 15px;background-color: #1f9ef2;text-align: center;position: fixed;top: 100px;right: 0;}
			.show_apply p{color:#fff;text-align: center;font-size: 18px;margin: 10px;}
			.show_apply input{padding-left: 10px;width:87%;border-radius: 20px;outline:none;border:0px;line-height: 30px;margin-bottom: 10px;}
			.show_apply select{width:90%;border-radius: 20px;outline:none;border:0px;height: 30px;margin-bottom: 10px;padding-left: 10px;}
			.show_feedback{background-color: #ededed;width: 220px;border-radius: 5px;text-align: center;position: fixed;bottom: 0;right: 0;padding-top: 0}
			.show_feedback div {background-color:#f49c11;border-radius: 5px 5px 0 0;padding:5px;margin-bottom: 10px;}
			.show_feedback div p{font-size: 14px;color: #fff;text-align: left;margin-left: 10px;}
			.show_feedback textarea{width: 88%;outline:none;resize:none;border: none;height: 70px;margin-bottom: 5px;padding: 5px;}
			.show_feedback input{padding-left: 10px;width:87%;outline:none;border:0px;line-height: 30px;margin-bottom: 10px;}
		</style>
	</head>
		<?php
 if(S('about_select_type_1')){ $about_select_type_1 = S('about_select_type_1'); }else{ $about_select_type_1 = get_select(M('about'),array('type'=>1,'show'=>1),'about_id asc',10,'about_id,title,url'); S('about_select_type_1',$about_select_type_1,270); } if(S('about_select_type_3')){ $about_select_type_3 = S('about_select_type_3'); }else{ $about_select_type_3 = get_select(M('about'),array('type'=>3,'show'=>1),'about_id asc',10,'about_id,title,url'); S('about_select_type_3',$about_select_type_3,270); } if(S('news_type_1')){ $news_type_1 = S('news_type_1'); }else{ $news_type_1 = get_select(M('news'),array('type'=>1,'show'=>1),'news_id desc',3,'news_id,title'); S('news_type_1',$news_type_1,120); } if(S('Other_top_ad')){ $Other_top_ad = S('Other_top_ad'); }else{ $ad = M('ad'); $ad_field = 'ad_link,ad_code,target'; $ad_top_map['pid'] = 2; $ad_top_map['show'] = 1; $Other_top_ad = get_select($ad,$ad_top_map,'ad_id',C('AD_POSITION')[1][1],$ad_field); S('Other_top_ad',$Other_top_ad,300); } ?>
	<body>
		<div class="toptt">
			<div class="w12">
			<?php if($news_type_1 == true): ?><div class="layui-carousel" id="topnews">
				  <div carousel-item>
					<?php if(is_array($news_type_1)): foreach($news_type_1 as $key=>$v): ?><div><a href="/info/<?php echo idEncode($v['news_id']);?>.html" target="_blank"><?php echo getSubstr($v['title'],0,18);?></a></div><?php endforeach; endif; ?>
				  </div>
				</div><?php endif; ?>
				<div class="wright">
					<?php echo systemCache('web_info.store_name');?>客服QQ：<a href="tencent://message/?uin=<?php echo systemCache('web_info.top_qq');?>" style="color: #b7b9bd;"><?php echo systemCache('web_info.top_qq');?></a>
					  <?php if(systemCache('web_info.top_qq_group') != 'top_qq_group' and systemCache('web_info.top_qq_group') != null): ?>官方QQ群：<?php echo systemCache('web_info.top_qq_group'); endif; ?>
				</div>
			</div>
		</div>
		<div class="T_nav">
			<div class="logo"><a href="/"><img src="<?php echo systemCache('web_info.store_logo');?>" alt="<?php echo systemCache('web_info.store_name');?>" style="width: 225px;height: 100px;"/></a></div>
		    <!-- <div class="search">
				<form id="search" class="fl" method="post" action="<?php echo U('index/search');?>?type=<?php switch(CONTROLLER_NAME): case "Zhaopin": ?>zp<?php break; case "Zizhi": ?>zizhi<?php break; case "Resume": ?>resume<?php break; case "Index": ?>corporation<?php break; case "News": ?>news<?php break; endswitch;?>&r=<?php echo I('get.range');?>" target="_blank">
					<input name="word" value="<?php echo I('get.wd');?>" type="text" class="a1" placeholder="请输入类别名称或关键字"/>
					<input name="" type="submit" class="a2" value="提交" />
				</form>
		        <span class="layui-breadcrumb" lay-separator="|">
		          <a href="/zp/r0t1c0.html">一级建造师</a>
		          <a href="/zp/r0t4c0.html">注册咨询师</a>
		          <a href="/zp/r0t2c0.html">二级建造师</a>
		          <a href="/zp/r0t11c0.html">公用设备工程师</a>
		          <a href="/resume/r0t0c0.html">简历</a>
		        </span>
		    </div>
		    <a href="/zp/r0t0c0.html" target="" class="btn01"><i class="layui-icon">&#xe705;</i> 我要找证</a>
		    <a href="/zizhi/r0t0c0.html" target="" class="btn02"><i class="layui-icon">&#xe642;</i> 我要办资质</a> -->
		</div>
		<div class="Nnav">
			<div class="w12">
				<ul class="layui-nav layui-bg-blue">
				<?php if(empty($nav_data)): ?><li class="layui-nav-item"><a href="/">首页</a></li>
				  <li class="layui-nav-item"><a href="/zp/r0t0c0.html">招聘信息</a></li>
				  <li class="layui-nav-item"><a href="/zp/r1t0c0.html">求职信息</a></li>
				  <li class="layui-nav-item"><a href="/zizhi/r0t0c0.html">资质需求</a></li>
				  <li class="layui-nav-item"><a href="/resume/r0t0c0.html">优质简历</a></li>
				  <li class="layui-nav-item"><a href="/news/hyxw.html">行业新闻</a></li>
				  <li class="layui-nav-item"><a href="/news/gkxd.html">招聘心得</a></li>
				  <li class="layui-nav-item">
				    <a href="javascript:;"><?php echo C('HOME_HELP')[1];?></a>
				    <dl class="layui-nav-child">
					<?php if(is_array($about_select_type_1)): foreach($about_select_type_1 as $key=>$vo): ?><dd><a href="/help/<?php echo ($vo['url']); ?>.html"><?php echo ($vo['title']); ?></a></dd><?php endforeach; endif; ?>
				    </dl>
				  </li>
				  <!-- <li class="layui-nav-item layui-this"> -->
				  <li class="layui-nav-item">
				    <a href="javascript:;"><?php echo C('HOME_HELP')[3];?></a>
				    <dl class="layui-nav-child">
					<?php if(is_array($about_select_type_3)): foreach($about_select_type_3 as $key=>$vo): ?><dd><a href="/help/<?php echo ($vo['url']); ?>.html"><?php echo ($vo['title']); ?></a></dd><?php endforeach; endif; ?>
				    </dl>
				  </li>
				  <li class="layui-nav-item"><a href="/help/contactus.html">联系我们</a></li>
				<?php else: ?>
				<li class="layui-nav-item"><a href="/">首页</a></li>
				<?php if(is_array($nav_data)): $i = 0; $__LIST__ = $nav_data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if(empty($vo["sub_nav"])): ?><li class="layui-nav-item"><a href="<?php echo ($vo["mca"]); ?>"><?php echo ($vo["name"]); ?></a></li>
					<?php else: ?>
					<li class="layui-nav-item">
					    <a href="javascript:;"><?php echo ($vo["name"]); ?></a>
					    <dl class="layui-nav-child">
						<?php if(is_array($vo["sub_nav"])): $i = 0; $__LIST__ = $vo["sub_nav"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$po): $mod = ($i % 2 );++$i;?><dd><a href="<?php echo ($po["mca"]); ?>"><?php echo ($po["name"]); ?></a></dd><?php endforeach; endif; else: echo "" ;endif; ?>
					    </dl>
					</li><?php endif; endforeach; endif; else: echo "" ;endif; endif; ?>

				  <li class="layui-nav-item" style="float:right;">
				    <a href="javascript:;"><img src="/Public/img/kf.png" class="layui-nav-img">值班客服</a>
				    <dl class="layui-nav-child">
				      <dd><a href="javascript:;">名称：<?php echo systemCache('web_info.service_call');?></a></dd>
				      <dd><a href="tencent://message/?uin=<?php echo systemCache('web_info.service_qq');?>">QQ： <?php echo systemCache('web_info.service_qq');?></a></dd>
				      <dd><a href="javascript:;">电话：<?php echo systemCache('web_info.service_phone');?></a></dd>
				    </dl>
				  </li>
				</ul>
			</div>
		</div>
		
		<?php if($home_index_top_ad == true): ?><div class="layui-carousel" id="inbanner">
			<div carousel-item>
			<?php if(is_array($home_index_top_ad)): foreach($home_index_top_ad as $key=>$v): ?><div style="background: url(<?php echo ($v['ad_code']); ?>) no-repeat center top;" <?php if(($key) == "0"): ?>class="layui-this"<?php endif; ?>></div><?php endforeach; endif; ?>
			</div>
		</div><?php endif; ?>
		<?php if($home_index_fwly == true): ?><div class="in_A1">
			<p class="t1">服务领域</p>
		    <p class="t2"><?php echo systemCache('web_info.store_name');?>是一支懂专业、懂服务、懂企业的优秀团队</p>
		    <div class="clearfloat"></div>
		    <div class="xm_box">
		        <ul>
				<?php if(is_array($home_index_fwly)): foreach($home_index_fwly as $key=>$v): ?><li>
		                <a href="/help/<?php echo ($v['url']); ?>.html"><img src="<?php if($v['picname'] != null): echo ($v['picname']); else: ?>/Public/img/in_a1_tu4.jpg<?php endif; ?>"/></a>
		                <h3><?php echo ($v['title']); ?></h3>
		                <p style="overflow: hidden;text-overflow: ellipsis;"><?php echo ($v['shortcontent']); ?></p>
		            </li><?php endforeach; endif; ?>
		        </ul>
		        <a href="javascript:void(0)" class="prev"></a>
		        <a href="javascript:void(0)" class="next"></a>
		    </div>
		    <div class="clearfloat"></div>
		</div><?php endif; ?>
		<div class="in_A2">
			<div class="tit">最新招聘<span><a href="/zp/r0t0c0.html" target="_blank">更看更多>></a></span></div>
			<ul class="list">
			<?php if(is_array($home_index_recruitment_zp)): foreach($home_index_recruitment_zp as $key=>$v): ?><li><a href="/zp/<?php echo idEncode($v['id']);?>.html" target="_blank"><i class="layui-icon">&#xe623;</i><?php echo getSubstr($v['title'],0,18);?><span><?php echo (date("Y-m-d",$v['addtime'])); ?></span></a></li><?php endforeach; endif; ?>
			</ul>
			<div class="tit">人才证书库<span><a href="/resume/r0t0c0.html" target="_blank">更看更多>></a></span></div>
			<ul class="list">
			<?php if(is_array($home_index_jzjlk)): foreach($home_index_jzjlk as $key=>$v): ?><li><a href="/resume/<?php echo idEncode($v['id']);?>.html"><font>【<?php echo ($v['person']); ?>】</font><?php echo get_major_name($v['classid']);?> - <?php echo get_major_name($v['cid']);?> / <?php echo get_diqu_name($v['province']);?><span><?php echo (date("Y-m-d",$v['addtime'])); ?></span></a></li><?php endforeach; endif; ?>
			</ul>
			<div class="tit">人才求职<span><a href="/zp/r1t0c0.html" target="_blank">更看更多>></a></span></div>
			<ul class="list">
			<?php if(is_array($home_index_recruitment_qz)): foreach($home_index_recruitment_qz as $key=>$v): ?><li><a href="/zp/<?php echo idEncode($v['id']);?>.html" target="_blank"><i class="layui-icon">&#xe623;</i><?php echo getSubstr($v['title'],0,18);?><span><?php echo (date("Y-m-d",$v['addtime'])); ?></span></a></li><?php endforeach; endif; ?>
			</ul>
			<div class="tit">资质代办<span><a href="/zizhi/r0t0c0.html" target="_blank">更看更多>></a></span></div>
			<ul class="list">
			<?php if(is_array($home_index_zizhi)): foreach($home_index_zizhi as $key=>$v): ?><li><a href="/zizhi/<?php echo idEncode($v['id']);?>.html" target="_blank"><i class="layui-icon">&#xe623;</i><?php echo getSubstr($v['title'],0,18);?><span><?php echo (date("Y-m-d",$v['addtime'])); ?></span></a></li><?php endforeach; endif; ?>
			</ul>
			<div class="clearfloat"></div>
		</div>
		<?php if($index_menu['0']['show'] != 0 or $index_menu['1']['show'] != 0 or $index_menu['2']['show'] != 0 or $index_menu['3']['show'] != 0): ?><div class="in_a4_t">招聘资讯<span>/ 让您对招聘行业更了解</span></div>
		<div class="in_a4">
			<div class="w12">
			<?php if(($index_menu['0']['show']) == "1"): ?><div class="list">
					<h3><?php echo C('NEWS_TYPE')[$index_menu['0']['menu_name']][0];?></h3>
					<div class="tu"><a href="<?php echo ($index_menu['0']['url']); ?>"><img src="<?php echo ($index_menu['0']['pic']); ?>"></a></div>
					<ul>
					<?php if(is_array($home_index_news_1)): foreach($home_index_news_1 as $key=>$v): ?><li><a href="/info/<?php echo idEncode($v['news_id']);?>.html" target="_blank"><?php echo getSubstr($v['title'],0,18);?></a></li><?php endforeach; endif; ?>
					</ul>
				</div><?php endif; ?>
			<?php if(($index_menu['1']['show']) == "1"): ?><div class="list">
					<h3><?php echo C('NEWS_TYPE')[$index_menu['1']['menu_name']][0];?></h3>
					<div class="tu"><a href="<?php echo ($index_menu['1']['url']); ?>"><img src="<?php echo ($index_menu['1']['pic']); ?>"></a></div>
					<ul>
					<?php if(is_array($home_index_news_2)): foreach($home_index_news_2 as $key=>$v): ?><li><a href="/info/<?php echo idEncode($v['news_id']);?>.html" target="_blank"><?php echo getSubstr($v['title'],0,18);?></a></li><?php endforeach; endif; ?>
					</ul>
				</div><?php endif; ?>
			<?php if(($index_menu['2']['show']) == "1"): ?><div class="list">
					<h3><?php echo C('NEWS_TYPE')[$index_menu['2']['menu_name']][0];?></h3>
					<div class="tu"><a href="<?php echo ($index_menu['2']['url']); ?>"><img src="<?php echo ($index_menu['2']['pic']); ?>"></a></div>
					<ul>
					<?php if(is_array($home_index_news_3)): foreach($home_index_news_3 as $key=>$v): ?><li><a href="/info/<?php echo idEncode($v['news_id']);?>.html" target="_blank"><?php echo getSubstr($v['title'],0,18);?></a></li><?php endforeach; endif; ?>
					</ul>
				</div><?php endif; ?>
			<?php if(($index_menu['3']['show']) == "1"): ?><div class="list" style="margin-right: 0;">
					<h3><?php echo C('NEWS_TYPE')[$index_menu['3']['menu_name']][0];?></h3>
					<div class="tu"><a href="<?php echo ($index_menu['3']['url']); ?>"><img src="<?php echo ($index_menu['3']['pic']); ?>"></a></div>
					<ul>
					<?php if(is_array($home_index_news_4)): foreach($home_index_news_4 as $key=>$v): ?><li><a href="/info/<?php echo idEncode($v['news_id']);?>.html" target="_blank"><?php echo getSubstr($v['title'],0,18);?></a></li><?php endforeach; endif; ?>
					</ul>
				</div><?php endif; ?>
			</div>
		</div><?php endif; ?>

		<?php if(S('link_select')){ $link_select = S('link_select'); }else{ $link_select = M('link')->order('showorder,link_id desc')->select(); S('link_select',$link_select,array('type'=>'file','expire'=>600)); }; ?>
		<div class="in_a5">
			<div class="line"></div>
			<div class="w12">
				<div class="layui-tab">
				  <ul class="layui-tab-title">
				    <li class="layui-this">友情链接</li>
				    <li>热门搜索</li>
				  </ul>
				  <div class="layui-tab-content">
				    <div class="layui-tab-item layui-show">
				        <span class="layui-breadcrumb" lay-separator="|">
						<?php if(is_array($link_select)): foreach($link_select as $key=>$v): ?><a href="<?php echo ($v['links']); ?>" target="<?php echo C('LINK_TYPE')[$v['target']][1];?>"><?php echo ($v['title']); ?></a><?php endforeach; endif; ?>
						</span>
				    </div>
				    <div class="layui-tab-item">
				    	<span class="layui-breadcrumb" lay-separator="|">
						  <a href="/zp/r0t31c0.html">一级建筑师</a>
						  <a href="/zp/r0t32c0.html">二级建筑师</a>
						  <a href="/zp/r0t2c289.html">广东二建</a>
						  <a href="/zp/r0t11c0.html">公用设备工程师</a>
						  <a href="/zp/r0t10c0.html">土木工程师</a>
						  <a href="/zizhi/r0t0c0.html">资质办理</a>
						  <a href="/zp/r0t9c0.html">电气工程师</a>
						</span>
				    </div>
				  </div>
				</div>
			</div>
		</div>
		<div class="foot">
			<div class="w12">
				<div class="nav">
					<span class="layui-breadcrumb" lay-separator="|">
					  <a href="/help/about.html">关于我们</a>
					  <a href="/zp/r0t0c0.html">招聘信息</a>
					  <a href="/zp/r1t0c0.html">人才求职</a>
					  <a href="/zizhi/r0t0c0.html">资质信息</a>
					  <a href="/resume/r0t0c0.html">人才证书</a>
					  <a href="/help/contactus.html">联系我们</a>
					</span>
				</div>
				<div class="nav">
					Copyright © <?php echo date('Y');?>  <?php echo $_SERVER['HTTP_HOST'];?>版权所有 | <a href="http://www.miitbeian.gov.cn/" style="color:#777;" target="_blank"><?php echo systemCache('web_info.record_no');?></a>
	&nbsp;<?php if(systemCache('web_info.beian_recordQuery') != null and systemCache('web_info.beian_recordQuery_number') != null): ?><a target="_blank" style="color:#777;" href="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=<?php echo systemCache('web_info.beian_recordQuery_number');?>">
        <img src="data:image/png;base64,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0p8zAAA7SGlUWHRYTUw6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4KPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1QIENvcmUgNS41LWMwMjEgNzkuMTU1NzcyLCAyMDE0LzAxLzEzLTE5OjQ0OjAwICAgICAgICAiPgogICA8cmRmOlJERiB4bWxuczpyZGY9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiPgogICAgICA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIgogICAgICAgICAgICB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iCiAgICAgICAgICAgIHhtbG5zOnhtcE1NPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvbW0vIgogICAgICAgICAgICB4bWxuczpzdEV2dD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL3NUeXBlL1Jlc291cmNlRXZlbnQjIgogICAgICAgICAgICB4bWxuczpwaG90b3Nob3A9Imh0dHA6Ly9ucy5hZG9iZS5jb20vcGhvdG9zaG9wLzEuMC8iCiAgICAgICAgICAgIHhtbG5zOmRjPSJodHRwOi8vcHVybC5vcmcvZGMvZWxlbWVudHMvMS4xLyIKICAgICAgICAgICAgeG1sbnM6dGlmZj0iaHR0cDovL25zLmFkb2JlLmNvbS90aWZmLzEuMC8iCiAgICAgICAgICAgIHhtbG5zOmV4aWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20vZXhpZi8xLjAvIj4KICAgICAgICAgPHhtcDpDcmVhdG9yVG9vbD5BZG9iZSBQaG90b3Nob3AgQ0MgMjAxNCAoV2luZG93cyk8L3htcDpDcmVhdG9yVG9vbD4KICAgICAgICAgPHhtcDpDcmVhdGVEYXRlPjIwMTUtMTEtMTBUMTQ6MDQ6NTArMDg6MDA8L3htcDpDcmVhdGVEYXRlPgogICAgICAgICA8eG1wOk1ldGFkYXRhRGF0ZT4yMDE1LTExLTEwVDE0OjA0OjUwKzA4OjAwPC94bXA6TWV0YWRhdGFEYXRlPgogICAgICAgICA8eG1wOk1vZGlmeURhdGU+MjAxNS0xMS0xMFQxNDowNDo1MCswODowMDwveG1wOk1vZGlmeURhdGU+CiAgICAgICAgIDx4bXBNTTpJbnN0YW5jZUlEPnhtcC5paWQ6ODBiY2E5ODUtNGY5Yi02ZTRkLTlmYzktZThmNDkyNjdkZjRlPC94bXBNTTpJbnN0YW5jZUlEPgogICAgICAgICA8eG1wTU06RG9jdW1lbnRJRD5hZG9iZTpkb2NpZDpwaG90b3Nob3A6ZWRkYWU4MGMtODc3MC0xMWU1LTg0OWEtYmNmZGE2MDI4ZjJlPC94bXBNTTpEb2N1bWVudElEPgogICAgICAgICA8eG1wTU06T3JpZ2luYWxEb2N1bWVudElEPnhtcC5kaWQ6ZDAxN2I5NGUtOTRiZC0yNjQxLThmZjktYmY3YTBhMzY3N2IxPC94bXBNTTpPcmlnaW5hbERvY3VtZW50SUQ+CiAgICAgICAgIDx4bXBNTTpIaXN0b3J5PgogICAgICAgICAgICA8cmRmOlNlcT4KICAgICAgICAgICAgICAgPHJkZjpsaSByZGY6cGFyc2VUeXBlPSJSZXNvdXJjZSI+CiAgICAgICAgICAgICAgICAgIDxzdEV2dDphY3Rpb24+Y3JlYXRlZDwvc3RFdnQ6YWN0aW9uPgogICAgICAgICAgICAgICAgICA8c3RFdnQ6aW5zdGFuY2VJRD54bXAuaWlkOmQwMTdiOTRlLTk0YmQtMjY0MS04ZmY5LWJmN2EwYTM2NzdiMTwvc3RFdnQ6aW5zdGFuY2VJRD4KICAgICAgICAgICAgICAgICAgPHN0RXZ0OndoZW4+MjAxNS0xMS0xMFQxNDowNDo1MCswODowMDwvc3RFdnQ6d2hlbj4KICAgICAgICAgICAgICAgICAgPHN0RXZ0OnNvZnR3YXJlQWdlbnQ+QWRvYmUgUGhvdG9zaG9wIENDIDIwMTQgKFdpbmRvd3MpPC9zdEV2dDpzb2Z0d2FyZUFnZW50PgogICAgICAgICAgICAgICA8L3JkZjpsaT4KICAgICAgICAgICAgICAgPHJkZjpsaSByZGY6cGFyc2VUeXBlPSJSZXNvdXJjZSI+CiAgICAgICAgICAgICAgICAgIDxzdEV2dDphY3Rpb24+c2F2ZWQ8L3N0RXZ0OmFjdGlvbj4KICAgICAgICAgICAgICAgICAgPHN0RXZ0Omluc3RhbmNlSUQ+eG1wLmlpZDo4MGJjYTk4NS00ZjliLTZlNGQtOWZjOS1lOGY0OTI2N2RmNGU8L3N0RXZ0Omluc3RhbmNlSUQ+CiAgICAgICAgICAgICAgICAgIDxzdEV2dDp3aGVuPjIwMTUtMTEtMTBUMTQ6MDQ6NTArMDg6MDA8L3N0RXZ0OndoZW4+CiAgICAgICAgICAgICAgICAgIDxzdEV2dDpzb2Z0d2FyZUFnZW50PkFkb2JlIFBob3Rvc2hvcCBDQyAyMDE0IChXaW5kb3dzKTwvc3RFdnQ6c29mdHdhcmVBZ2VudD4KICAgICAgICAgICAgICAgICAgPHN0RXZ0OmNoYW5nZWQ+Lzwvc3RFdnQ6Y2hhbmdlZD4KICAgICAgICAgICAgICAgPC9yZGY6bGk+CiAgICAgICAgICAgIDwvcmRmOlNlcT4KICAgICAgICAgPC94bXBNTTpIaXN0b3J5PgogICAgICAgICA8cGhvdG9zaG9wOkRvY3VtZW50QW5jZXN0b3JzPgogICAgICAgICAgICA8cmRmOkJhZz4KICAgICAgICAgICAgICAgPHJkZjpsaT4zQ0I4RkVFOEMyRUJFNkU1QTREQTk3MzI4MzU0MTI0RTwvcmRmOmxpPgogICAgICAgICAgICAgICA8cmRmOmxpPmFkb2JlOmRvY2lkOnBob3Rvc2hvcDpiZGRmY2Y2Zi04NzcwLTExZTUtODQ5YS1iY2ZkYTYwMjhmMmU8L3JkZjpsaT4KICAgICAgICAgICAgPC9yZGY6QmFnPgogICAgICAgICA8L3Bob3Rvc2hvcDpEb2N1bWVudEFuY2VzdG9ycz4KICAgICAgICAgPHBob3Rvc2hvcDpDb2xvck1vZGU+MzwvcGhvdG9zaG9wOkNvbG9yTW9kZT4KICAgICAgICAgPHBob3Rvc2hvcDpJQ0NQcm9maWxlPnNSR0IgSUVDNjE5NjYtMi4xPC9waG90b3Nob3A6SUNDUHJvZmlsZT4KICAgICAgICAgPGRjOmZvcm1hdD5pbWFnZS9wbmc8L2RjOmZvcm1hdD4KICAgICAgICAgPHRpZmY6T3JpZW50YXRpb24+MTwvdGlmZjpPcmllbnRhdGlvbj4KICAgICAgICAgPHRpZmY6WFJlc29sdXRpb24+NzIwMDAwLzEwMDAwPC90aWZmOlhSZXNvbHV0aW9uPgogICAgICAgICA8dGlmZjpZUmVzb2x1dGlvbj43MjAwMDAvMTAwMDA8L3RpZmY6WVJlc29sdXRpb24+CiAgICAgICAgIDx0aWZmOlJlc29sdXRpb25Vbml0PjI8L3RpZmY6UmVzb2x1dGlvblVuaXQ+CiAgICAgICAgIDxleGlmOkNvbG9yU3BhY2U+MTwvZXhpZjpDb2xvclNwYWNlPgogICAgICAgICA8ZXhpZjpQaXhlbFhEaW1lbnNpb24+MjA8L2V4aWY6UGl4ZWxYRGltZW5zaW9uPgogICAgICAgICA8ZXhpZjpQaXhlbFlEaW1lbnNpb24+MjA8L2V4aWY6UGl4ZWxZRGltZW5zaW9uPgogICAgICA8L3JkZjpEZXNjcmlwdGlvbj4KICAgPC9yZGY6UkRGPgo8L3g6eG1wbWV0YT4KICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAKICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIAogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgCiAgICAgICAgICAgICAgICAgICAgICAgICAgICAKPD94cGFja2V0IGVuZD0idyI/Pu6JurQAAAAgY0hSTQAAeiUAAICDAAD5/wAAgOkAAHUwAADqYAAAOpgAABdvkl/FRgAABRFJREFUeNpE1OtvW/Udx/H3ufj4+Ph2nDh2vLgrTSPaFNqGtd0Gy9LRTVymNoNM6ihCaEwdQ5sYAo0HTOwBYg/Yk0pDiG3qmLSiPtjGJERbdZSQaUArykXt1la9hDRNY6dpYsexj30uPj7ntwcVyT/w0ucrfT5fSQgBdguAEBlZhDhaiVikF2j22lfPjP77+Kc/9ZyO9p37th7s2rLlbegveZ4g6jggS4AMAKkkkhAC366DJJADgaJlgA/unTx+4qmT/7oyKpxJfdYzUDIma7M6TsXoDH+3/8jgnrG/iOC2o8JrIiQJECjpvlt0Q7JoimWEkQHN1Sf+8MbE40+O7226M/rtCYX9+k2e0me55+48XXfn1f1PvvfwiVdfOSLFlKitSbh8hq9+DitZFRlZSaHK1aJ35uV3f3+4zr79/fy42CD9pwtULwdUpwLqu//ID4JzPHPoEQ7+00dc/vM/Eoary3oCPR5dBROeRTxaH7x+9MWpkd3nRsyBPL/InmP6cAN5jUlgtcELkXpMTj19kr3GGfLfuovv7T62Z/GjN67aM2c3XHz/nVUw6jmo7ruJI5eT2idz23lwu0XzbAP5eh3JjBJdCnBP3iSyrhu96VD562nG7m8z8cUm3vwwKCSkVgx5aBWsL1aK4cfvHwilGKg2KWuOxjxEAh+WXKT1Bto2E/lGC42QyrRDX5cHkkStKRPtUQ9sHB5btwLOXHrvh+1yeTiT0KATRRQKZId7aSKw7ukm2Fck8dIQxjNbkHsMctuytOw2CEEhZ0Dp7L1Ls6d+sgIaicxgw/Lp73FB7+bEaQN1V4rqnrUEZQvpfy3sYzfxp5fRnh+m69mtvHWoBsQZ2qzSmlrALU0VV8BwaW5Po6ZyZ9Gi+HWN19+M859XSgztKJA2ktgXaoQLHu65GsnyMudfvsKrh6Lkh0w299WplD38pUvDK6CstkyrIZNavMLe+wM6fgL/6Dzdf/scuS9Cu0chzKlkdxUoTFylcvA8rbbC2GiEZHUSq6GiJuUIgAoQM746Lm+4Nhrk+3jiGxYH+np4vTyIP3uB7uokcjqGc6GGNZCjnCnwdzkGKZMnvrlAJ1nEvEPCyKw5tgKCnBMNwdyUxZ2D0/z2V9t48fkRjlqboeEzalfpMmXeOpakiQFkeO7nOjsGJpmbBFybsGNtXQFVs729k8zjz/uUFi7yy+EoY+NxJo7bXJK38MCmLyjEKnSO9NGuOazZaPDrB65x89Q1bF9Hz2qoprYRuPUcvOYnj1ZP/+6wM9/Gq/hQmmH9Q0NE8zoEVYKqSnPBIb2uC9Z2Q6nC9NuXcZJZEv0JYr0G6YF9O7XM9z+QhBAAdFr/fWzp/IHXAtdJVz6cR40LencOEiw5+HYL2dDRu+JIWoTqqSk6gUp6+3p8l2p6w8gjcTM1Lmn33TrZd2ZwFp2yOx9z9HyYzu8aIKi3CKwGGBqKZqLFoL3cpFWqoa/tRi/m8ZZt3LIlYmuaKKkUsS9rI9pXUfjohdzXkr2RTAGvHhIGKmGg4C5aIELa1TrNyUUkJQKShHujQiQmk/92IasZ1s9Ch9Uta0qKaPeOhyw7/ZpdKrU0ZZlUrkNEstEkH8VbRjgOyY1ZUgMpZK2JmtaQMr3XO+pdv1GN23+kaIus1kb4SBHVblTjTzsX8y859cUHPX9251c29WwKLSmhm3KXGkti3eB6rMe01dzI2aWphXFnpnaib2culBQFEbgA/H8ALiI3EysggNoAAAAASUVORK5CYII=" style="width:16px;vertical-align: sub;">
        <?php echo systemCache('web_info.beian_recordQuery');?>
    </a><?php endif; ?>
				</div>



			</div>
		</div>
		<div class="apply"><a>申请合作</a></div>
		<div class="feedback"><a>我要留言</a></div>
		<div class="show_apply" style="display: none;">
			<form  action="<?php echo U('Feedback/add');?>" method="post">
				<p>咨询办理 最快7天下证</p>
				<input type="text" name="username" placeholder="请输入您的姓名">
				<input type="text" name="mobile" placeholder="请输入手机号码">
				<input type="hidden" name="cate_name" value="申请合作">
				<select name="type">
					<option value="资质办理">资质办理</option>
				</select>
				<input type="submit" value="申请合作">
			</form>
		</div>
		<div class="show_feedback">
			<form  action="<?php echo U('Feedback/add');?>" method="post">
				<div><p>请您留言<span style="color:#fff;font-weight: bold;position: absolute;right: 20px;" id="feedback_hide">一</span></p></div>
				<textarea name="content" placeholder="请在此输入留言内容，我们会尽快与您联系。"></textarea>
				<input type="text" name="username" placeholder="请输入您的姓名">
				<input type="text" name="mobile" placeholder="请输入手机号码">
				<input type="hidden" name="cate_name" value="留言">
				<input type="submit" style="background-color:#e8a114;color:#fff;border-radius: 0;width: 40%;padding: 0;" value="发送">
			</form>
		</div>
	<script type="text/javascript" src="/Public/js/public.js" ></script>
	<script type="text/javascript">
		$('.feedback').click(function(){
			$('.show_feedback').css('display','block');
			$(this).css('display','none');
		});
		$('#feedback_hide').click(function(){
			$('.show_feedback').css('display','none');
			$('.feedback').css('display','block');
		})
	</script>
	</body>
	<?php echo htmlspecialchars_decode(systemCache('web_info.style_js'));?>
	
</html>