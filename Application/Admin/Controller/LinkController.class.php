<?php
namespace Admin\Controller;
use Common\Controller\AdminBaseController;

class LinkController extends AdminBaseController{

    /**
     * 分类列表
     */
    public function Link_list(){
		$type = I('get.type');
		// M , $map    where条件,  $order  排序规则,  $limit  每页数量,  $field  $field
        // $data=get_page_data(M('Link'),$map,'link_id',5,'link_id');
		//getPage($model,$map,$order='',$limit=10,$field='')
		$data=D('Link')->getPage(D('Link'),$map,'showorder,link_id desc',10,'');
        $this->assign($data);
        $this->display();
		
    }
	
    /**
     * 添加
     */
    public function Link_add(){
		if(IS_POST){
			$data=I('post.');
			ajax_text($data['title']) ? $this->ajaxReturn('标题不通过的词组有：【'.ajax_text($data['title']).'】') :'';
			$result=D('Link')->addData($data);
			if ($result) {
				S('link_select',null);
				$this->ajaxReturn('添加成功');
			}else{
				$this->ajaxReturn('添加失败');
			}
		}else{
			$this->display();
		}
    }

    /**
     * 修改
     */
    public function Link_edit(){
		if(IS_POST){
			$data=I('post.');
			$map=array(
				'link_id'=>$data['link_id']
				);
			$result=D('Link')->editData($map,$data);
			if ($result) {
				S('link_select',null);
				$this->ajaxReturn('修改成功');
			}else{
				$this->ajaxReturn('修改失败');
			}
		}else{
			$id=I('get.id');
			$one = M('Link')->where('link_id=%d',$id)->find();
			$this->assign('one',$one);
			$this->display();
		}
    }

	/**
	 * 链接排序
	 */
	public function order(){
		$data=I('post.');
		$result=D('Link')->orderData($data);
		if ($result) {
			S('link_select',null);
			$this->ajaxReturn('排序成功');
		}else{
			$this->ajaxReturn('排序失败');
		}
	}
	
    /**
     * 删除单条
     */
    public function delete(){
        $id=I('id');
		$map=array(
			'link_id'=>$id
			);
        $result=D('Link')->deleteData($map);
        if ($result) {
			S('link_select',null);
			$this->ajaxReturn('删除成功');
        }else{
			$this->ajaxReturn('删除失败');
        }
    }
}