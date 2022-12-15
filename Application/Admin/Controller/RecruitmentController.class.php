<?php
namespace Admin\Controller;
use Common\Controller\AdminBaseController;
class RecruitmentController extends AdminBaseController{

	public function rt_list(){
		$Recruitment = M('recruitment');
		$map = array();
		$id = idDecode(I('id'));
		$type_show = I('type_show');
		$examine = I('examine');
		$id ? $map['id'] = $id : false;
		$type_show ? $map['type_show'] = $type_show : false;
		$examine!='' and $examine==0 ? $map['examine'] = $examine : false;
		$data = getpage($Recruitment,$map,$order='id desc',10,$one_field,$url);
		$this->assign($data);
		$this->display();
	}

	public function my_rt_list(){
		$Recruitment = M('recruitment');
		$map = array();
		$map['user_id'] = getUserid();
		$id = idDecode(I('id'));
		$type_show = I('type_show');
		$examine = I('examine');
		$id ? $map['id'] = $id : false;
		$type_show ? $map['type_show'] = $type_show : false;
		$examine!='' and $examine==0 ? $map['examine'] = $examine : false;
		$data = getpage($Recruitment,$map,$order='id desc',10,$one_field,$url);
		$this->assign($data);
		$this->display('rt_list');
	}
	
	/**
	 *	预览
	 */
	public function preview(){
		$id=I('get.id');
		$one = M('recruitment')->where('id=%d',$id)->find();
		$user = M('admin_users')->where(array('id'=>$one['user_id']))->find();
			//职位类型
			$name_classid = get_major_name($one['classid']);
			$name_cid = get_major_name($one['cid']);
			
			//兼职地区
			$name_province = get_diqu_name($one['province']);
			$name_city = get_diqu_name($one['city']);
			$assign = array(
				'name_classid'=>$name_classid,
				'name_cid'=>$name_cid,
				'name_province'=>$name_province,
				'name_city'=>$name_city,
			);
			$this->assign($assign);
		$this->assign('one',$one);
		$this->assign('user',$user);
		$this->display();
	}
	
    /**
     * 修改 状态status
     */
    public function edit_rt_status(){
		if(IS_POST){
            $data=I('post.');
            $id=$data['id'];
            $map=array(
                'id'=>$id,
                );
			$data['show']=I('status',0,'intval');
			$result=D('Recruitment')->editData($map,$data);
            if($result){
                // 操作成功
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
			$map=array(
				'id'=>array('in',implode(',',$id)),
				);
		}else{
			$map=array(
				'id'=>$id
				);
		}
        $result=D('Recruitment')->deleteData($map);
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
