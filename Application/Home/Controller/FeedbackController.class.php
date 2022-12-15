<?php
namespace Home\Controller;
use Common\Controller\HomeBaseController;

class FeedbackController extends HomeBaseController{

	public function add(){
		$post_data=I('post.');
		if(empty($post_data['content'])||empty($post_data['username'])||empty($post_data['mobile'])||empty($post_data['cate_name'])){
			$this->error('缺少信息，请重新检查后提交');
		}
		$post_data['add_time']=time();
		$result=D('Feedback')->addData($post_data);
		if ($result) {
			$this->success('提交成功');
		}else{
			$this->error('提交失败');
		}
	}

}
