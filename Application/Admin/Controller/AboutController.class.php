<?php
namespace Admin\Controller;
use Common\Controller\AdminBaseController;

class AboutController extends AdminBaseController{

    /**
     * 分类列表
     */
    public function About_list(){
		$type = I('get.type');
		if($type>0){
			$map['type'] = $type;
		}
		if(IS_POST && I('id',0,'intval')>0){
			$map['about_id'] = I('id',0,'intval');
		}
		$data=getPage(M('about'),$map,'about_id asc',10,'');
        $this->assign($data);
        $this->display();
		
    }
	
    /**
     * 添加
     */
    public function About_add(){
		if(IS_POST){
			$data=I('post.');
			$data['content'] = $_POST['content'];
			ajax_text($data['title']) ? $this->ajaxReturn('标题不通过的词组有：【'.ajax_text($data['title']).'】') :'';
			ajax_text($data['shortcontent']) ? $this->ajaxReturn('简略内容不通过的词组有：【'.ajax_text($data['shortcontent']).'】') :'';
			ajax_text($data['content']) ? $this->ajaxReturn('内容不通过的词组有：【'.ajax_text($data['content']).'】') :'';
			$result=D('About')->addData($data);
			if ($result) {
				S('homeHelp_'.$data['type'],null);
				if($data['type']==4){
					S('home_index_fwly',null);
				}
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
    public function About_edit(){
		if(IS_POST){
			$data=I('post.');
			$data['content'] = $_POST['content'];
			ajax_text($data['title']) ? $this->ajaxReturn('标题不通过的词组有：【'.ajax_text($data['title']).'】') :'';
			ajax_text($data['shortcontent']) ? $this->ajaxReturn('简略内容不通过的词组有：【'.ajax_text($data['shortcontent']).'】') :'';
			ajax_text($data['content']) ? $this->ajaxReturn('内容不通过的词组有：【'.ajax_text($data['content']).'】') :'';
			$map=array(
				'about_id'=>$data['about_id']
				);
			$result=D('About')->editData($map,$data);
			if ($result) {
				S('homeHelp_'.$data['type'],null);
				if($data['type']==4){
					S('home_index_fwly',null);
				}
				$this->ajaxReturn('修改成功');
			}else{
				$this->ajaxReturn('修改失败');
			}
		}else{
			$id=I('get.id');
			$one = M('About')->where('about_id=%d',$id)->find();
			$this->assign('one',$one);
			$this->display();
		}
    }
	
	/**
	 *	预览
	 */
	public function preview(){
		$id=I('get.id');
		$one = M('about')->where('about_id=%d',$id)->find();
		$this->assign('one',$one);
		$this->display();
	}
	
    /**
     * 修改 状态status
     */
    public function edit_about_status(){
		if(IS_POST){
            $data=I('post.');
            // 组合where数组条件
            $id=$data['id'];
            $map=array(
                'about_id'=>$id,
                );
			// 登录状态
			$data['show']=I('status',0,'intval');
            // p($data);die;
			$result=D('About')->editData($map,$data);
            if($result){
                // 操作成功
				$one = D('About')->field('type')->where($map)->find();
				S('homeHelp_'.$one['type'],null);
				S('home_index_fwly',null);
				$this->ajaxReturn('修改成功');
            }else{
				$this->ajaxReturn('修改失败');
			}
		}
	}
	
    /**
     * 删除单条 或 批量删除
     */
    public function delete(){
        $id=I('post.id');
		if(is_array($id)){
			$map = 'about_id in('.implode(',',$id).')';  
		}else{
			$map=array(
				'about_id'=>$id
				);
		}
        $result=D('About')->deleteData($map);
        if ($result) {
			if(is_array($id)){
				$this->ajaxReturn('删除成功'.$result.'条');
			}else{
				$this->ajaxReturn('删除成功');
			}
        }else{
			$this->ajaxReturn('删除失败');
        }
    }
}