layui.config({
  base: '/Public/home/layui/lay/modules/'
}).use('index');


$(document).ready(function(){
//顶上下拉
  $(".T_navs .lis").hover(function(){
		$(this).find("ul").slideDown(200);
		$(this).addClass("on")
  },function(){
		$(this).find("ul").slideUp(200);
		$(this).removeClass("on")
  });
  //地区选择
  $(".T_navs .city").click(function(){
			$(this).find("div").slideDown(200);
  });
  $(".T_navs .city .dqss").hover(function(){
		  },function(){
			$(this).slideUp(200);
  });
  //首页头条旁边小图标添加动画
  $(".T_tts .right ul li").hover(function(){
	$(this).find("img").addClass("layui-anim-rotate")
  },function(){
	$(this).find("img").removeClass("layui-anim-rotate")
  });
  //首页类别添加推荐信息浮窗
  $(".in_type .right .dist ul li").hover(function(){
	$(this).find("div").show();
	$(this).find("a:first").addClass("on")
  },function(){
	$(this).find("div").hide();
	$(this).find("a:first").removeClass("on")
  });
  //内页导航
  $(".ny_navt .w12 .nav a").hover(function(){
		// $(this).addClass("on").siblings("a").removeClass("on");
  });

  
  
  //内容页分享
	$("#nrfxff").click(function(){
		$("#nrfxffa").slideDown("fast");
		})
	$("#nrfxff").mouseleave(function(){
		$("#nrfxffa").slideUp("fast");
		})
   
});

//注册协议弹窗
  $('.userxy').on('click', function(){
layer.open({
  type: 1,
  skin: 'layui-layer-demo', //样式类名
  closeBtn: 0, //不显示关闭按钮
  anim:2,title:'35建筑网注册协议书',closeBtn:1,
  shadeClose: true, //开启遮罩关闭
  area: ['750px', '600px'],
  content:'<div style="padding:15px;line-height:30px;">　　欢迎光临35建筑网网站。35建筑网致力于为您提供最优质、最便捷的服务。在访问35建筑网的同时，也请您仔细阅读我们的协议条款。您需要同意该条款才能注册成为我们的用户。一经注册，将视为接受并遵守该条款的所有约定。<br>　　1．用户应按照35建筑网的注册、登陆程序和相应规则进行注册、登陆，注册信息应真实可靠，信息内容如有变动应及时更新。<br>　　2．用户应在适当的栏目或地区发布信息，所发布信息内容必须真实可靠，不得违反35建筑网对发布信息的禁止性规定。用户对其自行发表、上传或传送的内容负全部责任。<br>　　3．遵守中华人民共和国相关法律法规，包括但不限于《中华人民共和国计算机信息系统安全保护条例》、《计算机软件保护条例》、《最高人民法院关于审理涉及计算机网络著作权纠纷案件适用法律若干问题的解释(法释[2004]1号)》、《互联网电子公告服务管理规定》、《互联网新闻信息服务管理规定》、《互联网著作权行政保护办法》和《信息网络传播权保护条例》等有关计算机互联网规定和知识产权的法律和法规、实施办法。<br>　　4．所有用户不得在35建筑网任何版块发布、转载、传送含有下列内容之一的信息，否则35建筑网有权自行处理并不通知用户：(1)违反宪法确定的基本原则的； (2)危害国家安全，泄漏国家机密，颠覆国家政权，破坏国家统一的； (3)损害国家荣誉和利益的； (4)煽动民族仇恨、民族歧视，破坏民族团结的； (5)破坏国家宗教政策，宣扬邪教和封建迷信的； (6)散布淫秽、色情、赌博、暴力、恐怖或者教唆犯罪的； (7)侮辱或者诽谤他人，侵害他人合法权益的； (8)含有法律、行政法规禁止的其他内容的。5．本网站为交流平台，所有信息均来自互联网，请谨慎使用，避免风险，若有损失，本网站不承担任何问题！</div>'
	});
  });

//自定义百度分享
window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"1","bdMiniList":["qzone","tsina","weixin","tqq","douban","ty"],"bdPic":"","bdStyle":"0","bdSize":"16"},"share":{}};
with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?cdnversion='+~(-new Date()/36e5)];