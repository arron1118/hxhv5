<?php
namespace Home\Controller;
use Common\Controller\HomeBaseController;
/**
 * 新闻，资讯Controller
 */
class NewsController extends HomeBaseController{
	/**
	 * 首页
	 */
	public function index(){
		$type = I('get.type');
		$type_n = C('GET_NEWS_TYPE')[$type][1];
		if($type_n>0){
			$map['type'] = $type_n;
		}else{
			$map['type'] = array('gt',0);
		}
		// 搜索条件
		I('get.wd')!=''?$map['title'] = array('like','%'.I('get.wd').'%'):false;
		$map['show'] = 1;
		$p = I('get.p');
		$url = '';
		if($type_n==''){
			$url = 'news';
		}elseif($type_n>0){ 
			// $url = 'news/index/type/'.$type.'/p';
			$url = 'news/'.$type.'';
		}
		
		$ad = M('ad');
		$ad_field = 'ad_link,ad_code,target';
		//顶部轮播广告
		$ad_top_map['pid'] = 17;
		$ad_top_map['show'] = 1;
		$top_ad = get_select($ad,$ad_top_map,'ad_id desc',C('AD_POSITION')[17][1],$ad_field);

		$data = getpage(M('news'),$map,'news_id desc',C('HOME_LIMIT_COUNT')['news'],'',$url);

		$about_news = about_news(6);//新闻动态
        $assign=array(
			'menu'=>'news_index',
			'about_news'=>$about_news,
			'top_ad'=>$top_ad,

            );
        $this->assign($assign);
        $this->assign($data);
        $this->display();
	}
	
	public function info_show(){
		$id = I('get.id');
		$map = array(
			'news_id'=>idDecode($id),
			'show'=>1,
		);
		$news = M('news');
		$one = $news->where($map)->find();
		if($one){
			$news->where($map)->setInc('browser');
			$about_news = about_news(6);//新闻动态
			$prev_map = array('news_id'=>array('lt',$one['news_id']),'show'=>1,'type'=>$one['type']);
			$next_map = array('news_id'=>array('gt',$one['news_id']),'show'=>1,'type'=>$one['type']);
			$prev = $news ->where($prev_map)->field("news_id,title")->order("news_id desc")->limit('1')->find(); 
			$next = $news ->where($next_map)->field("news_id,title")->order("news_id asc")->limit('1')->find();
			$assign=array(
				'menu'=>'news_index',
				'about_news'=>$about_news,
				'one'=>$one,
				'prev'=>$prev,
				'next'=>$next,
				);
				
			$this->assign($assign);
			$this->display();
		}else{
			die(layer_msg('您浏览的信息不存在',U('news/index'),5,6));
		}
		
	}


}

