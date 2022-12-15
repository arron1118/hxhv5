<?php
namespace Home\Controller;
use Common\Controller\HomeBaseController;
class IndexController extends HomeBaseController{
    public function index(){
		trace(systemCache('web_info'),'lala');

		//  资质代办
		if(S('home_index_zizhi')){
			$home_index_zizhi = S('home_index_zizhi');
		}else{
			$home_index_zizhi = get_select(M('zizhi'),array(),'id desc',15,'id,title,addtime');
			S('home_index_zizhi',$home_index_zizhi,300);
		}

		//  人才证书库
		if(S('home_index_jzjlk')){
			$home_index_jzjlk = S('home_index_jzjlk');
		}else{
			$home_index_jzjlk = get_select(M('jzjlk'),array('examine'=>1),'id desc',15,'id,person,classid,cid,province,addtime');
			S('home_index_jzjlk',$home_index_jzjlk,200);
		}

		//  服务领域
		if(S('home_index_fwly')){
			$home_index_fwly = S('home_index_fwly');
		}else{
			$home_index_fwly = get_select(M('about'),array('type'=>4,'show'=>1),'about_id desc',15,'');
			S('home_index_fwly',$home_index_fwly,200);
		}


		//  最新招聘
		if(S('home_index_recruitment_zp')){
			$home_index_recruitment_zp = S('home_index_recruitment_zp');
		}else{
			$home_index_recruitment_zp = get_select(M('recruitment'),array('type_show'=>1,'examine'=>1),'id desc',15,'id,title,addtime');
			S('home_index_recruitment_zp',$home_index_recruitment_zp,260);
		}

		//  人才求职
		if(S('home_index_recruitment_qz')){
			$home_index_recruitment_qz = S('home_index_recruitment_qz');
		}else{
			$home_index_recruitment_qz = get_select(M('recruitment'),array('type_show'=>2,'examine'=>1),'id desc',15,'id,title,addtime');
			S('home_index_recruitment_qz',$home_index_recruitment_qz,270);
		}


		if(S('index_menu')){
			$index_menu = S('index_menu');
		}else{
			$index_menu = M('index_menu')->select();
			S('index_menu',$index_menu,360);
		}

		//  挂靠资讯
		if(S('home_index_news_1')){
			$home_index_news_1 = S('home_index_news_1');
		}else{
			$home_index_news_1 = get_select(M('news'),array('type'=>$index_menu['0']['menu_name'],'show'=>1),'news_id desc',6,'news_id,title,addtime');
			S('home_index_news_1',$home_index_news_1,310);
		}

		if(S('home_index_news_2')){
			$home_index_news_2 = S('home_index_news_2');
		}else{
			$home_index_news_2 = get_select(M('news'),array('type'=>$index_menu['1']['menu_name'],'show'=>1),'news_id desc',6,'news_id,title,addtime');
			S('home_index_news_2',$home_index_news_2,320);
		}

		if(S('home_index_news_3')){
			$home_index_news_3 = S('home_index_news_3');
		}else{
			$home_index_news_3 = get_select(M('news'),array('type'=>$index_menu['2']['menu_name'],'show'=>1),'news_id desc',6,'news_id,title,addtime');
			S('home_index_news_3',$home_index_news_3,330);
		}

		if(S('home_index_news_4')){
			$home_index_news_4 = S('home_index_news_4');
		}else{
			$home_index_news_4 = get_select(M('news'),array('type'=>$index_menu['3']['menu_name'],'show'=>1),'news_id desc',6,'news_id,title,addtime');
			S('home_index_news_4',$home_index_news_4,340);
		}

		if(S('home_index_top_ad')){
			$home_index_top_ad = S('home_index_top_ad');
		}else{
			$ad = M('ad');
			$ad_field = 'ad_link,ad_code,target';
			//首页顶部轮播广告
			$ad_top_map['pid'] = 1;
			$ad_top_map['show'] = 1;
			$home_index_top_ad = get_select($ad,$ad_top_map,'ad_id',C('AD_POSITION')[1][1],$ad_field);
			S('home_index_top_ad',$home_index_top_ad,60);
		}

		$assign = array(
			'home_index_zizhi'=>$home_index_zizhi,
			'home_index_jzjlk'=>$home_index_jzjlk,
			'home_index_fwly'=>$home_index_fwly,
			'home_index_recruitment_zp'=>$home_index_recruitment_zp,
			'home_index_recruitment_qz'=>$home_index_recruitment_qz,
			'home_index_news_1'=>$home_index_news_1,
			'home_index_news_2'=>$home_index_news_2,
			'home_index_news_3'=>$home_index_news_3,
			'home_index_news_4'=>$home_index_news_4,
			'index_menu'=>$index_menu,
			'home_index_top_ad'=>$home_index_top_ad,
		);
		$this->assign($assign);
        $this->display();
    }


	/**
	 * 搜索
	*/
	public function search(){
		$type = I('get.type');
		$word = I('word');
		$r = I('get.r',0,'intval');
		if(IS_POST){
			if($type=='zp'){
				redirect('/zp/r'.$r.'t0c0.html?wd='.$word);
			}elseif($type=='zizhi'){
				redirect('/zizhi/r'.$r.'t0c0.html?wd='.$word);
			}elseif($type=='resume'){
				redirect('/resume/r'.$r.'t0c0.html?wd='.$word);
			}elseif($type=='news'){
				redirect('/news.html?wd='.$word);
			}else{
				redirect('/zp/r0t0c0.html?wd='.$word);
			}
		}

	}

}