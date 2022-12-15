layui.config({
  base: '/Public/layui/lay/modules/'
}).use('index');


//服务领域滚动
jQuery(".xm_box").slide({ mainCell:"ul", effect:"leftLoop",vis:5, autoPlay:true});