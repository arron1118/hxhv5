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
  	//顶部新闻
    elem: '#topnews',width:'300px',height:'35px',arrow: 'none',indicator:'none',anim:'updown',interval:5000
  });

   carousel.render({
  	//首页banner
    elem: '#inbanner',width:'100%',height:'450px',arrow: 'always',indicator:'inside',anim:'default',interval:5000
  });

  
  
  exports('index', {});
});  