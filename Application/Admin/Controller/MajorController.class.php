<?php
namespace Admin\Controller;
use Common\Controller\AdminBaseController;
/**
 * 专业分类目录
 */
class MajorController extends AdminBaseController{

    /**
     * 分类列表  证书专业分类 'range'=>0  资质类别 'range'=>1
     */
    public function major_list(){
		$range = I('get.range');
        $map=array(
            'range'=>$range,
            'parentid'=>0,
            );
        $data=D('Major')->where($map)->order('id')->select();
        $assign=array(
            'data'=>$data
            );
        $this->assign($assign);
        $this->display();
    }

    /**
     * 添加专业菜单
     */
    public function add(){
		if(IS_POST){
			$data=I('post.');
			if($data['parentid']==0){
				$data['level'] = 1;
			}else{
				$data['level'] = 2;
			}
			$data['range'] = $data['range'];
			$result=D('Major')->addData($data);
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
				'id'=>$data['id']
				);
			$result=D('Major')->editData($map,$data);
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
        $result=D('Major')->deleteData($map);
        if ($result) {
			$this->ajaxReturn('删除成功');
        }else{
			$this->ajaxReturn('请先删除子菜单');
        }
    }
}