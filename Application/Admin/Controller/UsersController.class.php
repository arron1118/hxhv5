<?php
namespace Admin\Controller;
use Common\Controller\AdminBaseController;

class UsersController extends AdminBaseController{

	//  发布帖子信息 
	public function publish(){
		if(IS_POST){
			$type = I('type',0,'intval');
			// 过滤非正常发布的类型
			if($type==0 || $type>7){
				$this->ajaxReturn('请选择发布的类型。');
			}
			$post = I('post.');
			if($post['price']>=C('PRICE_TYPE')[count]){
				$this->ajaxReturn('请正确选择价格范围');
			}
			if($post['regtype']>3){
				$this->ajaxReturn('请正确选择注册情况');
			}
			if($post['experience']>=C('EXPERIENCE_TYPE')[count]){
				$this->ajaxReturn('请正确选择工作年限');
			}
			if($post['degree']>=C('DEGREE_TYPE')[count]){
				$this->ajaxReturn('请正确选择学历要求');
			}
			ajax_text($post['title']) ? $this->ajaxReturn('标题不通过的词组有：【'.ajax_text($post['title']).'】') :'';
			ajax_text($post['content']) ? $this->ajaxReturn('内容不通过的词组有：【'.ajax_text($post['content']).'】') :'';
			// 验证码
			if(!check_verify(I('code'))){
				$this->ajaxReturn('验证码错误');
			}
			if($type==6){
			$zizhi_menu = M("zizhi_menu") ->where(array('parentid'=>$post['classid'],'id'=>$post['cid']))->field("id")->find();
			$zizhi_menu ? '':$this->ajaxReturn('请正确选择资质专业');
			}else{
			$major = M("major") ->where(array('parentid'=>$post['classid'],'id'=>$post['cid']))->field("id")->find();
			$major ? '':$this->ajaxReturn('请正确选择专业');
			}
			$diqu = M("diqu") ->where(array('parentid'=>$post['province'],'id'=>$post['city']))->field("id")->find();
			$diqu ? '':$this->ajaxReturn('请正确选择地区');
			
			if($type==1){
				$post['person']==''?$this->ajaxReturn('请输入简历姓名'):$post['person'] = $post['person'];
			}
			//如果是type=1 and 是内部员工 and 允许上传简历
			if($type==1){
				if(!is_phone($post['phone'])){
					$this->ajaxReturn('请正确输入手机号码');
				}
				$one = M('jzjlk')->where(array('phone' => $post['phone']))->field('phone')->find();
				if($one){
					$this->ajaxReturn('该号码已存在，请换号码上传简历');
				}
				$post['phone'] = $post['phone'];
				$post['qq'] = $post['qq'];
				$post['email'] = $post['email'];
				$post['status'] = 1; //是内部员工上传的
			}
			$post['user_id'] = getUserid();
			$post['type'] = $type;
			
			$time = NOW_TIME;
			
			$post['addtime'] = $time;
			$post['yxt_addtime'] = $time;
			$post['yxt_endtime'] = $time;
			$post['dyd_addtime'] = $time;
			$post['dyd_endtime'] = $time;
			$post['szd_addtime'] = $time;
			$post['szd_endtime'] = $time;
			$post['nzd_addtime'] = $time;
			$post['nzd_endtime'] = $time;
			$post['post_ip'] = get_client_ip();

			
			if($type==1){
				if($_SESSION['home_user']['nbyg']==0){// 不是内部员工
					$post['examine'] = 0;
				}else{
					$post['examine'] = 1;
				}

				$result=D('Jzjlk')->addData($post);
			}elseif($type==6){

				$result=D('Zizhi')->addData($post);
			}else{
				if($type==5){
					$post['type_show'] = 2;
				}else{
					$post['type_show'] = 1;
				}
				$result=D('Recruitment')->addData($post);
			}
			
			if ($result) {
				$array = array(
					'success'=>true,
					'msg'=>'发布成功',
				);
				$this->ajaxReturn($array);
			}else{
				$this->ajaxReturn('添加失败');
			}
		}
		if(I('get.type',0,'intval')==0){
			redirect(U('Users/publish',array('type'=>2)));
		}
		$this->display();
	}
	
	public function publish_edit(){
		$id = I('id',0,'intval');
		$type = I('type',0,'intval');
		if($type==1){
			$table = D('Jzjlk');
		}else if($type==6){
			$table = D('Zizhi');
		}else{
			$table = D('Recruitment');
		}
		$map = array(
			'id'=>$id,
			'user_id'=>getUserid(),
		);
		$one = $table->where($map)->find();
		if(IS_POST){
			$post = I('post.');
			ajax_text($post['title']) ? $this->ajaxReturn('标题不通过的词组有：【'.ajax_text($post['title']).'】') :'';
			ajax_text($post['content']) ? $this->ajaxReturn('内容不通过的词组有：【'.ajax_text($post['content']).'】') :'';
			// 验证码
			if(!check_verify(I('code'))){
				$this->ajaxReturn('验证码错误');
			}
			if($type==1){
				if(!is_phone($post['phone'])){
					$this->ajaxReturn('请正确输入手机号码');
				}
				$one_jzjlk = M('jzjlk')->where(array('phone'=>array(array('eq',$post['phone']),array('neq',$one['phone']))))->field('phone')->find();
				if($one_jzjlk){
					$this->ajaxReturn('该号码已存在，请换号码上传简历');
				}
			}
			$result=$table->editData($map,$post);
			if ($result) {
				$array = array(
					'success'=>true,
					'msg'=>'编辑成功',
				);
				$this->ajaxReturn($array);
			}else{
				$this->ajaxReturn('编辑失败');
			}
		}

		
		$assign = array(
			'one'=>$one,
			'type'=>$type,
		);
		$this->assign($assign);
		$this->display();
	}

}