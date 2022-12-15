layui.define(['layer','form','carousel','element','table','laypage','layer'], function(exports){
  var layer = layui.layer
  ,form = layui.form
  ,carousel = layui.carousel
  ,element = layui.element
  ,table = layui.table
  ,laypage = layui.laypage
  ,layer = layui.layer;
  
  //轮播模块
  carousel.render({
  	//顶部广告位1200*60
    elem: '#top_ad',width:'100%',height:'60px',arrow: 'hover',indicator:'none',anim:'default',interval:5000
  });
  carousel.render({
  	//顶部广告位1200*60
    elem: '#inc_ad',width:'100%',height:'60px',arrow: 'hover',indicator:'none',anim:'default',interval:5000
  });
	carousel.render({
	//新闻列表*60
	elem: '#news_tad',width:'715px',height:'220px',arrow: 'always',indicator:'inside',anim:'default',interval:5000
	  });
	carousel.render({
	elem: '#comp_ad',width:'360px',height:'240px',arrow: 'always',indicator:'inside',anim:'default',interval:5000
	  });
  //列表页分页
  // laypage.render({
    // elem: 'ny_listpage'
    // ,count: 100
    // ,theme: '#3fba37'
    // ,layout: ['count', 'prev', 'page', 'next', 'limit', 'skip']
    // ,jump: function(obj){
      // console.log(obj)
    // }
  // });
  //新闻分页
  // laypage.render({
    // elem: 'ny_newspage'
    // ,count: 100
    // ,theme: '#3fba37'
    // ,layout: ['count', 'prev', 'page', 'next']
  // });
  
  //全选
  form.on('checkbox(allChoose)', function(data){
    var child = $(data.elem).parents('table').find('tbody input[type="checkbox"]');
    child.each(function(index, item){
      item.checked = data.elem.checked;
    });
    form.render('checkbox');
  });
    
  //网站图标显示tips
   $(".tu_icon,.lietou_zsm").mouseover(function(){
   	var that = this;
	  var ttext = $(this).attr("wtt")
	  layer.tips(ttext, that, {
		  tips:[3, '#3fba37'],anim: 5,time: 2000
		});		
   });
    
  
  $("#sy_sms_btn").click(function(){
   	layer.open({
		  type: 1,
		  title: '发送私信', 
		  content: $('.lis_s_sms'),
		  area: ['400px', '235px']
		});
   });
  
  
  exports('index', {});
});  