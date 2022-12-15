<?php
namespace Home\Controller;
use Common\Controller\HomeBaseController;
/**
 * 简历库 Controller
 */
class ResumeController extends HomeBaseController{
	/**
	 * 首页
	 */
	public function index(){

		$range = I('get.range',0,'intval');
		$tid = I('get.tid',0,'intval');
		$city = I('get.city',0,'intval');

		if($tid>0){
			$major = M('major');
			$major_parentid = $major->where('id=%d',$tid)->field('id,parentid')->find();
			if($major_parentid['parentid']==0){
				$map['jl.classid'] = $tid;
				$one_map['classid'] = $tid;
				$title_classid = get_major_name($tid);
			}else{
				$map['jl.classid'] = $major_parentid['parentid'];
				$map['jl.cid'] = $tid;
				
				$one_map['classid'] = $major_parentid['parentid'];
				$one_map['cid'] = $tid;
				$title_classid = get_major_name($major_parentid['parentid']);
				$title_cid = get_major_name($tid);
			}
		}
		if($city>0){
			$diqu = M('diqu');
			$diqu_parentid = $diqu->where('id=%d',I('get.city'))->field('id,parentid')->find();
			if($diqu_parentid['parentid']==0){
				$map['jl.province'] = $city;
				$one_map['province'] = $city;
				$city_name = get_diqu_name($city);
				$title_city = $city_name;
				$title_one_city = $city_name;
			}else{
				$map['jl.province'] = $diqu_parentid['parentid'];
				$map['jl.city'] = $city;
				
				$one_map['province'] = $diqu_parentid['parentid'];
				$one_map['city'] = $city;
				$city_name = get_diqu_name($city);
				$title_city = get_diqu_name($diqu_parentid['parentid']).$city_name;
				$title_one_city = $city_name;
			}
		}
		// 搜索条件
		I('get.wd')!=''?$map['us.person'] = array('like',I('get.wd').'%'):false;
		I('get.wd')!=''?$one_map['person'] = array('like',I('get.wd').'%'):false;

		// I('get.wd')!=''?$map['jl.person'] = array('like','%'.I('get.wd').'%'):false;
		$map['jl.examine'] = 1;
		$map['jl.show'] = 0;
		$map['jl.type'] = 1;
		
		$one_map['examine'] = 1;
		$one_map['show'] = 0;
		$one_map['type'] = 1;
		
		$ad = M('ad');
		$ad_field = 'ad_link,ad_code,target';
		//顶部轮播广告
		$ad_top_map['pid'] = 15;
		$ad_top_map['show'] = 1;
		$top_ad = get_select($ad,$ad_top_map,'ad_id desc',C('AD_POSITION')[15][1],$ad_field);

			$url = 'resume/r'.$range.'t'.$tid.'c'.$city;
			
		$jzjlk = M('jzjlk');
		$data = getpage(M('jzjlk'),$one_map,'addtime desc',C('HOME_LIMIT_COUNT')['resume'],'',$url);
		$about_news = about_news(6);//新闻动态
        $assign=array(
			'menu'=>'resume_index',
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
	
	/**
	 * 慎用。 对导入的简历  随机更新id 和时间
	 **/
	public function jianliDaoru(){
		// for($add=8;$add<=1008;$add++){
			// $id = substr(md5(uniqid(md5(microtime(true)),true)), 1, 8).get_rand_str(2,0,1);
			// $jzjlk = M('jzjlk');
			// $data['id'] = $id;
			// $data['addtime'] = time()-rand(86400,3888000);
			// $edit = $jzjlk->where(array('id'=>$add))->save($data);
			// echo $add.'=><br/>';
		// }
	}
	
	public function info_show(){
		$id = I('get.id');
		$map = array(
			'id'=>idDecode($id),
			'show'=>0,
		);
		$jzjlk = M('jzjlk');
		$one = $jzjlk->where($map)->find();
		if(check_home_login()==true){
			if($one['examine']==0){
				$one['user_id'] == $_SESSION['home_user']['user_id'] ? $is_own = true:$is_own = false;
			}else{
				$is_own = true;
			}
		}else{
			$one['examine'] == 1 ? $is_own = true:$is_own = false;
		}
		if($one && $is_own){
			$jzjlk->where($map)->setInc('browser');
			
			// 广告
			$ad_field = 'ad_link,ad_code,target';
			$pid = 16;
			$tiezi_ad = M('ad')->where(array('pid'=>$pid,'show'=>1))->field($ad_field)->find();

			// 您可能感兴趣的简历  专业一样的
			$jzjlk_gxq_jzjlk = get_select(M('jzjlk'),array('examine'=>1,'show'=>0,'type'=>1,'id'=>array('neq',$one['id']),'classid'=>$one['classid'],'cid'=>$one['cid']),'id desc',6,'id,classid,cid,person');
			
			//职位类型
			$name_classid = get_major_name($one['classid']);
			$name_cid = get_major_name($one['cid']);
			
			//兼职地区
			$name_province = get_diqu_name($one['province']);
			$name_city = get_diqu_name($one['city']);

			$assign=array(
				'menu'=>'resume_index',
				'tiezi_ad'=>$tiezi_ad,
				'one'=>$one,

				'jzjlk_gxq_jzjlk'=>$jzjlk_gxq_jzjlk,
				'name_classid'=>$name_classid,
				'name_cid'=>$name_cid,
				'name_province'=>$name_province,
				'name_city'=>$name_city,
				);
					
			$this->assign($assign);
			$this->display();
		}else{
			die(layer_msg('您浏览的信息不存在',U('resume/index'),5,6));
		}
		
	}

}

