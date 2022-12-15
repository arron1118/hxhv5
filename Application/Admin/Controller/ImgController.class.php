<?php
namespace Admin\Controller;
use Think\Controller;
class ImgController extends Controller{

	public function _initialize(){
		if (empty($_SESSION['admin_user']['id']) && !isset($_SESSION['admin_user']['id'])){
			if (IS_AJAX) {
				$this->ajaxReturn('未登录或者您没有权限！');
			}else{
				die(layer_msg('未登录或者您没有权限！','javascript:;',5,3));
			}
		}
	}

	public function about_img(){
		if(IS_POST){
			$msg = ajax_upload('/Upload/about_img/','photo','307200');//限制只有图片格式('jpg', 'jpeg', 'png')可以上传，大小 307200 B  300K
			if($msg['status']==1){
				$data = array(
					'status'=>true,
					'src'=>$msg['name'],
					'msg'=>'上传成功'
				);
			}else{
				$data = array(
					'status'=>false,
					'error_info'=>$msg['error_info']
				);
			}
			$this->ajaxReturn($data);
		}
	}
	
	public function news_img(){
		if(IS_POST){
			$msg = ajax_upload('/Upload/news_img/','photo','307200');//限制只有图片格式('jpg', 'jpeg', 'png')可以上传，大小 307200 B  300K
			if($msg['status']==1){
				S('index_menu',null);
				M('index_menu')->where(array('id'=>I('menu_name')))->save(array('pic'=>$msg['name']));
				$data = array(
					'status'=>true,
					'src'=>$msg['name'],
					'msg'=>'上传成功',
					'menu_name'=>I('menu_name'),
				);
			}else{
				$data = array(
					'status'=>false,
					'msg'=>$msg['error_info']
				);
			}
			$this->ajaxReturn($data);
		}
	}

}