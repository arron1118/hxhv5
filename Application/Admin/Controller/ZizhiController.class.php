<?php
namespace Admin\Controller;
use Common\Controller\AdminBaseController;
class ZizhiController extends AdminBaseController{

	public function zz_list(){
		$zizhi = M('zizhi');
		$map = array();
		$id = idDecode(I('id'));
		$id ? $map['id'] = $id : false;
		$data = getpage($zizhi,$map,$order='id desc',10,$one_field,$url);
		$this->assign($data);
		$this->display();
	}
	
	public function my_zz_list(){
		$zizhi = M('zizhi');
		$map = array();
		$map['user_id'] = getUserid();
		$id = idDecode(I('id'));
		$id ? $map['id'] = $id : false;
		$data = getpage($zizhi,$map,$order='id desc',10,$one_field,$url);
		$this->assign($data);
		$this->display('zz_list');
	}
	/**
	 *	预览
	 */
	public function preview(){
		$id=I('get.id');
		$one = M('zizhi')->where('id=%d',$id)->find();
		$user = M('admin_users')->where(array('id'=>$one['user_id']))->find();
			//职位类型
			$name_classid = get_zizhi_menu_name($one['classid']);
			$name_cid = get_zizhi_menu_name($one['cid']);
			
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
    public function edit_zz_status(){
		if(IS_POST){
            $data=I('post.');
            $id=$data['id'];
            $map=array(
                'id'=>$id,
                );
			$data['examine']=I('status',0,'intval');
			$result=D('Zizhi')->editData($map,$data);
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
        $result=D('Zizhi')->deleteData($map);
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
