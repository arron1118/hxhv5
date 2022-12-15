<?php
namespace Home\Controller;
use Common\Controller\HomeBaseController;
/**
 * 招聘 Controller
 */
class ZhaopinController extends HomeBaseController{
	/**
	 * 首页
	 */
	public function index(){
		$range = I('get.range',0,'intval');
		$tid = I('get.tid',0,'intval');
		$city = I('get.city',0,'intval');

		$dyd_map['rt.examine'] = 1;
		$one_map['examine'] = 1;

		$one_map['show'] = 0;
		$dyd_map['rt.show'] = 0;
		if($range==0){
			$dyd_map['rt.type_show'] = 1;
			$one_map['type_show'] = 1;
		}elseif($range==1){
			$dyd_map['rt.type_show'] = 2;
			$one_map['type_show'] = 2;
		}
		$title_classid = '';
		$title_cid = '';
		if($tid>0){
			$major = M('major');
			$major_parentid = $major->where('id=%d',$tid)->field('id,parentid')->find();
			if($major_parentid['parentid']==0){
				$one_map['classid'] = $tid;
				$title_classid = get_major_name($tid);
			}else{
				$one_map['classid'] = $major_parentid['parentid'];
				$one_map['cid'] = $tid;
				$title_classid = get_major_name($major_parentid['parentid']);
				$title_cid = get_major_name($tid);
			}
		}
		$title_city = '';
		$title_one_city = '';
		if($city>0){
			$diqu = M('diqu');
			$diqu_parentid = $diqu->where('id=%d',$city)->field('id,parentid')->find();
			if($diqu_parentid['parentid']==0){
				$one_map['province'] = $city;
				$city_name = get_diqu_name($city);
				$title_city = $city_name;
				$title_one_city = $city_name;
			}else{
				$one_map['province'] = $diqu_parentid['parentid'];
				$one_map['city'] = $city;
				$city_name = get_diqu_name($city);
				$title_city = get_diqu_name($diqu_parentid['parentid']).$city_name;
				$title_one_city = $city_name;
			}
		}
		// 搜索条件
		// I('get.wd')!=''?$one_map['title'] = array('like','%'.I('get.wd').'%'):false;
		
		if(I('get.wd')!=''){
			// $mktime = mktime(0, 0 , 0,date("m")-1,1,date("Y"));
			// $one_map['addtime'] = array('gt',$mktime);
			$one_map['title'] = array('like','%'.I('get.wd').'%');
			
		}

		$url = 'zp/r'.$range.'t'.$tid.'c'.$city;
		
		$Recruitment = M('recruitment');
		$one_field = 'id,user_id,title,province,city,addtime,dyd_endtime,nzd_endtime';

		$data = getpage($Recruitment,$one_map,$order='addtime desc',C('HOME_LIMIT_COUNT')['zp'],$one_field,$url);
		$about_news = about_news(6);//新闻动态
		
		$ad = M('ad');
		$ad_field = 'ad_link,ad_code,target';
		//顶部轮播广告
		$range==1?$pid = 11:$pid = 9;
		$ad_top_map['pid'] = $pid;
		$ad_top_map['show'] = 1;
		$top_ad = get_select($ad,$ad_top_map,'ad_id',C('AD_POSITION')[$pid][1],$ad_field);

        $assign=array(
			'menu'=>'zhaopin_index',
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
		$Recruitment = M('recruitment');
		$zp_one = $Recruitment->where($map)->find();
		if($zp_one){

			$Recruitment->where($map)->setInc('browser');
			
			$user = M('admin_users')->where(array('id'=>$zp_one['user_id']))->field()->find();

			// 相关专业的推荐
			// if(S('zp_xgzytj')){
				// $zp_xgzytj = S('zp_xgzytj');
			// }else{
				$zp_xgzytj = get_select($Recruitment,array('id'=>array('neq',$zp_one['id']),'examine'=>1,'classid'=>$zp_one['classid'],'province'=>$zp_one['province']),'addtime desc',6,'id,title');
				// S('zp_xgzytj',$zp_xgzytj,300);
			// }
			
			//职位类型
			$name_classid = get_major_name($zp_one['classid']);
			$name_cid = get_major_name($zp_one['cid']);
			
			//兼职地区
			$name_province = get_diqu_name($zp_one['province']);
			$name_city = get_diqu_name($zp_one['city']);
			
			
			// 广告
			$ad_field = 'ad_link,ad_code,target';
			if($zp_one['type']==5 || $zp_one['type']==7){ //10 = 招聘 12 = 求职
				$pid = 12;
			}else{
				$pid = 10;
			}
			$tiezi_ad = M('ad')->where(array('pid'=>$pid,'show'=>1))->field($ad_field)->find();

			$assign=array(
				'menu'=>'zhaopin_index',
				'tiezi_ad'=>$tiezi_ad,
				'zp_one'=>$zp_one,
				'user'=>$user,

				'zp_xgzytj'=>$zp_xgzytj,
				'name_classid'=>$name_classid,
				'name_cid'=>$name_cid,
				'name_province'=>$name_province,
				'name_city'=>$name_city,

				);
				
			$this->assign($assign);
			$this->display();
		}else{
			die(layer_msg('您浏览的信息不存在','/zp/r0t0c0.html',5,6));
		}
		
	}


}

