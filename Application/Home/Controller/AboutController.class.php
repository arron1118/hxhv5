<?php
namespace Home\Controller;
use Common\Controller\HomeBaseController;

class AboutController extends HomeBaseController{

	public function info_show(){
		$about_id = I('get.id');
		$map = array(
			'show'=>1,// 展示
			'url'=>$about_id,
		);
		$about = M('about');
		$one = $about->field('type,title,content')->where($map)->find();
		if($one){
			$select = get_select($about,array('type'=>$one['type'],'show'=>1),'about_id asc',10,'about_id,title,url');
			$this->assign('select',$select);
			$about_news = about_news(6);//新闻动态

			$assign=array(
				'one'=>$one,
				'about_id'=>$about_id,
				'about_news'=>$about_news,
				'menu'=>'about_info_show',
				);
			$this->assign($assign);
			$this->display();
		}else{
			die(layer_msg('您浏览的信息不存在','/index/index.html',5,6));
		}

	}

}
