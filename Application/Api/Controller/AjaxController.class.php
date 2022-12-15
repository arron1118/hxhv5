<?php
namespace Api\Controller;
use Think\Controller;
class AjaxController extends Controller{

	public function check_phone(){
		if(IS_POST){
			$users = M('users');
			$map = array(
				'phone' => I('phone'),
			);
			if(!is_phone(I('phone'))){
				$this->ajaxReturn('<font style="color:red;">请正确输入手机号码</font>');
			}
			$one = $users->where($map)->field('phone')->find();
			if($one){
				$this->ajaxReturn('<font style="color:red;">该号码已存在，请换号码注册</font>');
			}else{
				$this->ajaxReturn('可以注册。');
			}
		}
    }
	
	// 检测兼职简历库里面的手机号码
	public function check_jzjlk_phone(){
		if(IS_POST){
			$jzjlk = M('jzjlk');
			$map = array(
				'phone' => I('phone'),
			);
			if(!is_phone(I('phone'))){
				$this->ajaxReturn('<font style="color:red;">请正确输入手机号码</font>');
			}
			$one = $jzjlk->where($map)->field('phone')->find();
			if($one){
				$this->ajaxReturn('<font style="color:red;">该号码已存在，请换号码上传简历</font>');
			}else{
				$this->ajaxReturn('该号码可以上传简历库。');
			}
		}
    }
	
	// 根据省份，获取城市
	public function ajax_city(){
		if(IS_POST){
			$diqu = M('diqu');
			$map = array(
				'parentid' => I('province'),
			);
			if(I('province',0,'intval')>0){
				$city = $diqu->where($map)->order('id asc')->select();
				$str = '';
				foreach($city as $key => $v){
					$str .="<option  value=".$v["id"] .">".$v["city"] ."</option>";
				}
				$this->ajaxReturn($str);
			}else{
				$this->ajaxReturn('<option selected="selected" value="">请选择城市</option>');
			}
		}
	}

	// 根据省份，获取城市   社保地区
	public function ajax_citys(){
		if(IS_POST){
			$diqu = M('diqu');
			$map = array(
				'parentid' => I('province'),
			);
			if(I('province',0,'intval')>0){
				$city = $diqu->where($map)->order('id asc')->select();
				$str = '';
				foreach($city as $key => $v){
					$str .="<option  value=".$v["id"] .">".$v["city"] ."</option>";
				}
				$this->ajaxReturn($str);
			}else{
				$this->ajaxReturn('<option selected="selected" value="0" disabled>无</option>');
			}
		}
	}
	
	// 选择专业
	public function ajax_professional(){
		if(IS_POST){
			$major = M('major');
			$map = array(
				'parentid' => I('parentid'),
				'range' => I('range'),
			);
			if(I('parentid',0,'intval')>0){
				$cate = $major->where($map)->order('id asc')->select();
				$str = '';
				foreach($cate as $key => $v){
					$str .="<option  value=".$v["id"] .">".$v["title"]."</option>";
				}
				// print_r($map);  
				$this->ajaxReturn($str);
			}else{
				$this->ajaxReturn('<option selected="selected" value="0">请选择专业</option>');
			}
		}
		
	}
	// 资质 选择专业
	public function ajax_zizhi(){
		if(IS_POST){
			$zizhi_menu = M('zizhi_menu');
			$map = array(
				'parent_id' => I('parentid'),
				'show' => 0,
			);
			if(I('parentid',0,'intval')>0){
				$cate = $zizhi_menu->where($map)->order('id asc')->select();
				if($cate){
					$str = '<option selected="selected" value="">资质专业</option>';
					foreach($cate as $key => $v){
						$str .="<option  value=".$v["id"] .">".$v["name"]."</option>";
					}
				}else{
					$this->ajaxReturn('<option selected="selected" value="0">无</option>');
				}

				// print_r($map);  
				$this->ajaxReturn($str);
			}else{
				$this->ajaxReturn('<option selected="selected" value="">资质序列类型</option>');
			}
		}
	}
	public function ajax_zizhi_dj(){
		if(IS_POST){
			$zizhi_menu = M('zizhi_menu');
			$map = array(
				'parent_id' => I('parentid'),
				'show' => 0,
			);
			if(I('parentid',0,'intval')>0){
				$cate = $zizhi_menu->where($map)->order('id asc')->select();
				if($cate){
					$str = '';
					foreach($cate as $key => $v){
						$str .="<option  value=".$v["id"] .">".$v["name"]."</option>";
					}
				}else{
					$this->ajaxReturn('<option selected="selected" value="0">无</option>');
				}

				// print_r($map);  
				$this->ajaxReturn($str);
			}else{
				$this->ajaxReturn('<option selected="selected" value="">资质专业</option>');
			}
		}
	}

	
	/**
	* ajax  判断文本中是否存在关键词
	*/
	function ajax_text(){
		// 关键词
		$infor = I('infor');
		$text = str_replace(C('GJC_TEXT')['del'],"",$infor);  
		$filter = explode('|',systemCache('web_info.gjc_text'));
			foreach ($filter as $key) {
				if(strpos($text, $key) !== false){
					$this->ajaxReturn($key);
				// return true;
				}
			}
		return false;	
	}

}