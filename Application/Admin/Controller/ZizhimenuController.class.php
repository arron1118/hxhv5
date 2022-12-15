<?php
namespace Admin\Controller;
use Common\Controller\AdminBaseController;
/**
 * 资质分类目录
 */
class ZizhimenuController extends AdminBaseController{

    /**
     * 分类列表
     */
    public function Zizhimenu_list(){
		$range = I('get.range');
        $map=array(
            'range'=>$range,
            'parent_id'=>0,
            );
        $data=D('ZizhiMenu')->where($map)->order('id')->select();
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
			$data['parent_id'] = $data['parentid'];
			$result=D('ZizhiMenu')->addData($data);
			if ($result) {
				$this->ajaxReturn('添加成功');
			}else{
				$this->ajaxReturn('添加失败');
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
				'id'=>$data['id'],
				);
			$result=D('ZizhiMenu')->editData($map,$data);
			if ($result) {
				$this->ajaxReturn('修改成功');
			}else{
				$this->ajaxReturn('修改失败');
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
        $result=D('ZizhiMenu')->deleteData($map);
        if ($result) {
			$this->ajaxReturn('删除成功');
        }else{
			$this->ajaxReturn('请先删除子菜单');
        }
    }
}