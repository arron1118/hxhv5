<?php
namespace Common\Controller;
use Common\Controller\BaseController;
/**
 * 用户基类控制器
 */
class UserBaseController extends BaseController{
	/**
	 * 初始化方法
	 */
	public function _initialize(){
		parent::_initialize();
		// // die('网站维护中，临时暂停访问。');
        // 添加不需要验证是否登录的连接 全部小写
        $not_need_login=array(
            'home/login/index'
            );
        // 转小写以兼容url大小写不统一的问题
        $action=strtolower(trim(__ACTION__,'/'));
        if (!in_array($action, $not_need_login)) {
            // 检测前台是否登录
            if (!check_home_login()) {
                if (IS_AJAX) {
                    ajax_return('','您需要登录！',1);
                }else{
					die(layer_msg('您需要登录！',U('home/login/index'),5,6));
					// layer_msg('您需要登录！',U('home/login/index'),5,3);die;
                    // $this->error('您需要登录！');
                }
            }            
        }
        
	}



}

