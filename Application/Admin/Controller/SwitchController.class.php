<?php
namespace Admin\Controller;
use Common\Controller\AdminBaseController;
/**
 * 功能开关
 */
class SwitchController extends AdminBaseController{

    public function switch_list(){
		// M , $map    where条件,  $order  排序规则,  $limit  每页数量,  $field  $field
        // $data=get_page_data(M('Link'),$map,'link_id',5,'link_id');
		//getPage($model,$map,$order='',$limit=10,$field='')
		$data=D('Switch')->getPage(D('Switch'),$map,'id',10,'');
        $this->assign($data);
        $this->display();
    }
	
	public function edit(){
		if(IS_POST){
			$data=I('post.');
			$map=array(
				'id'=>$data['id']
				);
			$result=D('Switch')->editData($map,$data);
			if ($result) {
				S('get_switch_status_id_'.$data['id'],null);
				$this->ajaxReturn('修改成功');
			}else{
				$this->ajaxReturn('修改失败');
			}
		}else{
			$one = M('switch')->where(array('id'=>I('get.id')))->find();
			$this->assign('one',$one);
			$this->display();
		}
	}

}