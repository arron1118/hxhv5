<?php
namespace Admin\Controller;
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
				$this->ajaxReturn('<option selected="selected" value="0">请选择城市</option>');
			}
		}
	}

	/**
	* ajax  判断文本中是否存在关键词
	*/
	function ajax_text(){
		// 关键词
		$infor = I('infor');
		$vowels = array(" ","*","/","|","·",".","-",",","，","。");
		// $text = str_replace(C('GJC_TEXT')['del'],"",$infor);  
		$text = str_replace($vowels,"",$infor);  
		$filter = explode('|',C('GJC_TEXT')['text']);
			foreach ($filter as $key) {
				if(strpos($text, $key) !== false){
					$this->ajaxReturn($key);
				// return true;
				}
			}
		return false;	
	}

}