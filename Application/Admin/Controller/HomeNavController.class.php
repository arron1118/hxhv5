<?php
namespace Admin\Controller;
use Common\Controller\AdminBaseController;
/**
 * 前台菜单管理
 */
class HomeNavController extends AdminBaseController{
	/**
	 * 菜单列表
	 */
	public function index(){
		$data=D('HomeNav')->getTreeData('tree','order_number,id');
		$assign=array(
			'data'=>$data
			);
		$this->assign($assign);
		$this->display();
	}

	/**
	 * 添加菜单
	 */
	public function add(){
		if(IS_POST){
			$data=I('post.');
			unset($data['id']);
			$result=D('HomeNav')->addData($data);
			if ($result) {
				$this->ajaxReturn('添加成功');
				// $this->success('添加成功',U('Admin/Nav/index'));
			}else{
				$this->ajaxReturn('添加失败');
				// $this->error('添加失败');
			}
		}else{
			$this->display();
		}

	}

	/**
	 * 修改菜单
	 */
	public function edit(){
		if(IS_POST){
			$data=I('post.');
			$map=array(
				'id'=>$data['id']
				);
			$result=D('HomeNav')->editData($map,$data);
			if ($result) {
				$this->ajaxReturn('修改成功');
				// $this->success('修改成功',U('Admin/Nav/index'));
			}else{
				$this->ajaxReturn('修改失败');
				// $this->error('修改失败');
			}
		}else{
			$this->display();
		}
	}

	/**
	 * 删除菜单
	 */
	public function delete(){
		$id=I('get.id');
		$map=array(
			'id'=>$id
			);
		$result=D('HomeNav')->deleteData($map);
		if($result){
			$this->ajaxReturn('删除成功');
			// $this->success('删除成功',U('Admin/Nav/index'));
		}else{
			$this->ajaxReturn('请先删除子菜单');
			// $this->error('请先删除子菜单');
		}
	}

	/**
	 * 菜单排序
	 */
	public function order(){
		$data=I('post.');
		$result=D('HomeNav')->orderData($data);
		if ($result) {
			$this->ajaxReturn('排序成功');
			// $this->success('排序成功',U('Admin/Nav/index'));
		}else{
			$this->ajaxReturn('排序失败');
			// $this->error('排序失败');
		}
	}

}
