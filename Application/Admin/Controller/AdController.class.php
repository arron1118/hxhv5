<?php
namespace Admin\Controller;
use Common\Controller\AdminBaseController;

class AdController extends AdminBaseController{

    /**
     * 分类列表
     */
    public function Ad_list(){
		$pid = I('get.pid');
		if($pid>0){
			$map['pid'] = $pid;
		}else{
			$map['pid'] = array('gt',0);
		}
		if(IS_POST && I('id',0,'intval')>0){
			$map['ad_id'] = I('id',0,'intval');
		}
		// M , $map    where条件,  $order  排序规则,  $limit  每页数量,  $field  $field

		$data=D('Ad')->getPage(D('Ad'),$map,'ad_id desc',10,'');
        $this->assign($data);
        $this->display();
		
    }

	public function add_img(){
		if(IS_POST){
			$msg = ajax_upload('/Upload/a_pic/','photo');//限制只有图片格式('jpg', 'jpeg', 'png')可以上传，大小 307200 B  300K
			if($msg['status']==1){
				$data = array(
					'status'=>1,
					'src'=>$msg['name'],
					'msg'=>'上传成功'
				);
			}else{
				$data = array(
					'status'=>0,
					'error_info'=>$msg['error_info']
				);
			}
			$this->ajaxReturn($data);
		}
	}
	
    /**
     * 添加
     */
    public function Ad_add(){
		if(IS_POST){
			$post=I('post.');
				$result=D('Ad')->addData($post);
				if($result){
					S('home_index_top_ad',null);
					S('Other_top_ad',null);
					$data = array(
						'status'=>1,
						'msg'=>'新增广告成功'
					);
				}else{
					$data = array(
						'status'=>0,
						'msg'=>'新增失败',
					);
				}
			$this->ajaxReturn($data);

		}else{
			$this->display();
		}
    }

    /**
     * 修改
     */
    public function Ad_edit(){
		if(IS_POST){
			$data=I('post.');
			$map=array(
				'ad_id'=>$data['ad_id']
				);
			$result=D('Ad')->editData($map,$data);
			if ($result) {
				S('home_index_top_ad',null);
				S('Other_top_ad',null);
				$data = array(
					'status'=>1,
					'msg'=>'修改成功'
				);
			}else{
				$data = array(
					'status'=>0,
					'msg'=>'修改失败'
				);
			}
			$this->ajaxReturn($data);
		}else{
			$id=I('get.id');
			$one = M('Ad')->where('ad_id=%d',$id)->find();
			$this->assign('one',$one);
			$this->display();
		}
    }

    /**
     * 修改 状态status
     */
    public function edit_Ad_status(){
		if(IS_POST){
            $data=I('post.');
            // 组合where数组条件
            $id=$data['id'];
            $map=array(
                'ad_id'=>$id,
                );
			// 是否显示状态
			I('show')>0?$data['show']=I('show'):false;
			
			// 打开方式
			I('target')>0?$data['target']=I('target'):false;
			
			$result=D('Ad')->editData($map,$data);
            if($result){
                // 操作成功
				S('home_index_top_ad',null);
				S('Other_top_ad',null);
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
			$map = 'ad_id in('.implode(',',$id).')';  
		}else{
			$map=array(
				'ad_id'=>$id
				);
		}
        $result=D('Ad')->deleteData($map);
        if ($result) {
			S('home_index_top_ad',null);
			S('Other_top_ad',null);
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