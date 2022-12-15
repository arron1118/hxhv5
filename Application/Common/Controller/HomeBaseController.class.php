<?php
namespace Common\Controller;
use Common\Controller\BaseController;
/**
 * Home基类控制器
 */
class HomeBaseController extends BaseController{
	/**
	 * 初始化方法
	 */
	public function _initialize(){
		parent::_initialize();
		// die('网站维护中，临时暂停访问。');
		//获取前端菜单
		$nav_data=D('HomeNav')->getSubData(0);
		$this->assign('nav_data',$nav_data);
	}

}

