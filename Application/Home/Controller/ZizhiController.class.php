<?php
namespace Home\Controller;
use Common\Controller\HomeBaseController;
/**
 * 资质 Controller
 */
class ZizhiController extends HomeBaseController{
	/**
	 * 首页
	 */
	public function index(){
		$range = I('get.range',0,'intval');
		$tid = I('get.tid',0,'intval');
		$city = I('get.city',0,'intval');
		if($range==0){
			$map['type'] = array('eq',6);
			$dyd_map['rt.type'] = array('eq',6);
		}elseif($range==1){
			$map['type'] = array('in','5,7');
			$dyd_map['rt.type'] = array('in','5,7');
		}
		$map['show'] = 0;
		$title_classid = '';
		$title_cid = '';
		if($tid>0){
			$zizhi_menu = M('zizhi_menu');
			$zizhi_menu_parentid = $zizhi_menu->where('id=%d',$tid)->field('id,parent_id')->find();
			if($zizhi_menu_parentid['parent_id']==0){
				$map['classid'] = $tid;
				$title_classid = get_zizhi_menu_name($tid);
			}else{
				$map['classid'] = $zizhi_menu_parentid['parent_id'];
				$map['cid'] = $tid;
				$title_classid = get_zizhi_menu_name($zizhi_menu_parentid['parent_id']);
				$title_cid = get_zizhi_menu_name($tid);
			}
		}
		$title_city = '';
		$title_one_city = '';
		if($city>0){
			$diqu = M('diqu');
			$diqu_parentid = $diqu->where('id=%d',I('get.city'))->field('id,parentid')->find();
			if($diqu_parentid['parentid']==0){
				$map['province'] = $city;
				$city_name = get_diqu_name($city);
				$title_city = $city_name;
				$title_one_city = $city_name;
			}else{
				$map['province'] = $diqu_parentid['parentid'];
				$map['city'] = $city;
				$city_name = get_diqu_name($city);
				$title_city = get_diqu_name($diqu_parentid['parentid']).$city_name;
				$title_one_city = $city_name;
			}
		}
		
		$ad = M('ad');
		$ad_field = 'ad_link,ad_code,target';
		//顶部轮播广告
		$ad_top_map['pid'] = 13;
		$ad_top_map['show'] = 1;
		$top_ad = get_select($ad,$ad_top_map,'ad_id desc',C('AD_POSITION')[13][1],$ad_field);
		// 搜索条件
		if(I('get.wd')!=''){
			// $mktime = mktime(0, 0 , 0,date("m")-1,1,date("Y"));
			// $map['addtime'] = array('gt',$mktime);
			$map['title'] = array('like','%'.I('get.wd').'%');
		}
		
		$url = 'zizhi/r'.$range.'t'.$tid.'c'.$city;

		$zizhi = M('zizhi');


		$data = getpage($zizhi,$map,$order='addtime desc',C('HOME_LIMIT_COUNT')['zizhi'],'user_id,id,title,province,city,price,addtime,dyd_endtime,nzd_endtime',$url);

		$about_news = about_news(6);//新闻动态
        $assign=array(
			'menu'=>'zizhi_index',
			'top_ad'=>$top_ad,
			'about_news'=>$about_news,
			'title_classid'=>$title_classid,
			'title_cid'=>$title_cid,
			'title_city'=>$title_city,
			'title_one_city'=>$title_one_city,
			'range'=>$range,
			'tid'=>$tid,
			'city'=>$city,
            );
        $this->assign($assign);
        $this->assign($data);
        $this->display();
	}

	public function info_show(){
		$id = I('get.id');
		$map = array(
			'id'=>idDecode($id),
			'show'=>0,
		);
		$zizhi = M('zizhi');
		$one = $zizhi->where($map)->find();
		if($one){
			$zizhi->where($map)->setInc('browser');

			$user = M('admin_users')->where(array('id'=>$one['user_id']))->field()->find();

			
			// 相关专业的推荐
			// if(S('zz_xgzytj')){
				// $zz_xgzytj = S('zz_xgzytj');
			// }else{
				$zz_xgzytj = get_select($zizhi,array('id'=>array('neq',$one['id']),'classid'=>$one['classid'],'province'=>$one['province']),'addtime desc',6,'id,title');
				// S('zz_xgzytj',$zz_xgzytj,300);
			// }
			
			
			//职位类型
			$name_classid = get_zizhi_menu_name($one['classid']);
			$name_cid = get_zizhi_menu_name($one['cid']);
			
			//兼职地区
			$name_province = get_diqu_name($one['province']);
			$name_city = get_diqu_name($one['city']);
			
			// 广告
			$ad_field = 'ad_link,ad_code,target';
			$pid = 14;
			$tiezi_ad = M('ad')->where(array('pid'=>$pid,'show'=>1))->field($ad_field)->find();

			$assign=array(
				'menu'=>'zizhi_index',
				'tiezi_ad'=>$tiezi_ad,
				'one'=>$one,
				'user'=>$user,
				'zz_xgzytj'=>$zz_xgzytj,
				'zizhi_xgzytj'=>$zizhi_xgzytj,
				'name_classid'=>$name_classid,
				'name_cid'=>$name_cid,
				'name_province'=>$name_province,
				'name_city'=>$name_city,

				);
				
			$this->assign($assign);
			$this->display();
		}else{
			die(layer_msg('您浏览的信息不存在','/zizhi/r0t0c0.html',5,6));
		}
		
	}


}

