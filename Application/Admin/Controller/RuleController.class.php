<?php
namespace Admin\Controller;
use Common\Controller\AdminBaseController;
/**
 * 后台权限管理
 */
class RuleController extends AdminBaseController{

//******************权限***********************
    /**
     * 权限列表
     */
    public function index(){
        $data=D('AuthRule')->getTreeData('tree','id','title');
        $assign=array(
            'data'=>$data
            );
        $this->assign($assign);
        $this->display();
    }

    /**
     * 添加权限
     */
    public function add(){
		if(IS_POST){
			$data=I('post.');
			unset($data['id']);
			$result=D('AuthRule')->addData($data);
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
     * 修改权限
     */
    public function edit(){
		if(IS_POST){
			$data=I('post.');
			$map=array(
				'id'=>$data['id']
				);
			$result=D('AuthRule')->editData($map,$data);
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
     * 删除权限
     */
    public function delete(){
        $id=I('get.id');
        $map=array(
            'id'=>$id
            );
        $result=D('AuthRule')->deleteData($map);
        if($result){
			$this->ajaxReturn('删除成功');
        }else{
			$this->ajaxReturn('请先删除子权限');
        }

    }
//*******************用户组**********************
    /**
     * 用户组列表
     */
    public function group(){
        $data=D('AuthGroup')->select();
        $assign=array(
            'data'=>$data
            );
        $this->assign($assign);
        $this->display();
    }

    /**
     * 添加用户组
     */
    public function add_group(){
		if(IS_POST){
			$data=I('post.');
			unset($data['id']);
			$result=D('AuthGroup')->addData($data);
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
     * 修改用户组
     */
    public function edit_group(){
		if(IS_POST){
			$data=I('post.');
			$map=array(
				'id'=>$data['id']
				);
			$result=D('AuthGroup')->editData($map,$data);
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
     * 删除用户组
     */
    public function delete_group(){
        $id=I('get.id');
        $map=array(
            'id'=>$id
            );
        $result=D('AuthGroup')->deleteData($map);
        if ($result) {
			$group_map=array(
				'group_id'=>$id
				);
			// 删除关联表中的组数据
			$AuthGroupAccess=D('AuthGroupAccess')->deleteData($group_map);
			
			$this->ajaxReturn('删除成功');
        }else{
			$this->ajaxReturn('删除失败');
        }
    }

//*****************权限-用户组*****************
    /**
     * 分配权限
     */
    public function rule_group(){
        if(IS_POST){
            $data=I('post.');
            $map=array(
                'id'=>$data['id']
                );
            $data['rules']=implode(',', $data['rule_ids']);
            $result=D('AuthGroup')->editData($map,$data);
            if ($result) {
                $this->success('操作成功',U('Admin/Rule/group'));
            }else{
                $this->error('操作失败',U('Admin/Rule/group'));
            }
        }else{
            $id=I('get.id');
            // 获取用户组数据
            $group_data=M('Auth_group')->where(array('id'=>$id))->find();
            $group_data['rules']=explode(',', $group_data['rules']);
            // 获取规则数据
            $rule_data=D('AuthRule')->getTreeData('level','id','title');
            $assign=array(
                'group_data'=>$group_data,
                'rule_data'=>$rule_data
                );
            $this->assign($assign);
            $this->display();
        }

    }
//******************用户-用户组*******************
    /**
     * 添加成员
     */
    public function check_user(){
        $username=I('get.username','');
        $group_id=I('get.group_id');
        $group_name=M('Auth_group')->getFieldById($group_id,'title');
        $uids=D('AuthGroupAccess')->getUidsByGroupId($group_id);
        // 判断用户名是否为空
        if(empty($username)){
            $user_data='';
        }else{
            $user_data=M('AdminUsers')->where(array('username'=>$username))->select();
        }
        $assign=array(
            'group_name'=>$group_name,
            'uids'=>$uids,
            'user_data'=>$user_data,
            );
        $this->assign($assign);
        $this->display();
    }

    /**
     * 添加用户到用户组
     */
    public function add_user_to_group(){
        $data=I('get.');
        $map=array(
            'uid'=>$data['uid'],
            'group_id'=>$data['group_id']
            );
        $count=M('AuthGroupAccess')->where($map)->count();
        if($count==0){
            D('AuthGroupAccess')->addData($data);
        }
        $this->success('操作成功',U('Admin/Rule/check_user',array('group_id'=>$data['group_id'],'username'=>$data['username'])));
    }

    /**
     * 将用户移除用户组
     */
    public function delete_user_from_group(){
        $map=I('get.');
        $result=D('AuthGroupAccess')->deleteData($map);
        if ($result) {
            $this->success('操作成功',U('Admin/Rule/admin_user_list'));
        }else{
            $this->error('操作失败');
        }
    }
	
    /**
     * 删除用户
     */
    public function delete_admin(){
        $data=I('post.');
        $map=array(
            'id'=>$data['id']
            );
        $map2=array(
            'uid'=>$data['id'],
            );
		$result=D('AdminUsers')->deleteData($map);
        if ($result) {
			D('AuthGroupAccess')->deleteData($map2);
			$this->ajaxReturn('删除成功');
        }else{
			$this->ajaxReturn('删除失败');
        }
    }
	
    /**
     * 管理员列表
     */
    public function admin_user_list(){
        $data=D('AuthGroupAccess')->getAllData();
        $assign=array(
            'data'=>$data
            );
        $this->assign($assign);
        $this->display();
    }

    /**
     * 添加管理员
     */
    public function add_admin(){
        if(IS_POST){
            $data=I('post.');
			$one = M('admin_users')->where(array('username'=>$data['username']))->find();
			$one ? $this->ajaxReturn('此登录帐号已存在，请更换'):false;
            $result=D('AdminUsers')->addData($data);
            if($result){
                if (!empty($data['group_ids'])) {
                    foreach ($data['group_ids'] as $k => $v) {
                        $group=array(
                            'uid'=>$result,
                            'group_id'=>$v
                            );
                        D('AuthGroupAccess')->addData($group);
                    }                   
                }
                // 操作成功
				$this->ajaxReturn('添加成功');
            }else{
                $error_word=D('AdminUsers')->getError();
                // 操作失败
				$this->ajaxReturn($error_word);
            }
        }else{
            $data=D('AuthGroup')->select();
            $assign=array(
                'data'=>$data
                );
            $this->assign($assign);
            $this->display();
        }
    }
	/**
	 * 个人资料
	 **/
	public function userinfo(){
		$admin_users = M('admin_users');
		$map = array(
			'id'=>getUserid(),
		);
		$user_data = $admin_users->where($map)->find();
		if(IS_POST){
			$post = I('post.');
			$one = $admin_users->where(array('username'=>array(array('eq',$post['username']),array('neq',$admin_users->where($map)->getField('username')))))->field('username')->find();
			$one ? $this->ajaxReturn(array('status'=>false,'msg'=>'此登录帐号已存在，请更换')):false;
			
			$msg = ajax_upload('/Upload/admin_img/','photo');//限制只有图片格式('jpg', 'jpeg', 'png')可以上传，大小 307200 B  300K
			if($msg['status']==1){
				$data['avatar'] = $msg['name'];
			}

			$data['username'] = $post['username'];
			$data['phone'] = $post['phone'];
			$data['email'] = $post['email'];
			$data['person'] = $post['person'];
			$data['weixin'] = $post['weixin'];
			$data['qq'] = $post['qq'];
			$data['province'] = $post['province'];
			$data['city'] = $post['city'];
			$data['address'] = $post['address'];
			
			$result=M('admin_users')->where($map)->save($data);
			
			if($result){
				if($msg['status']==1){
					@unlink('.'.$user_data['avatar']);//如果已经判断有上传文件，就删除以前的图片。
					session('admin_user.avatar',$msg['name']);// 修改记录图片的值
				}
				$array = array(
					'status'=>true,
					'msg'=>'修改成功',
					'src'=>$msg['name'],
				);
			}else{
				$array = array(
					'status'=>false,
					'msg'=>'修改失败，请稍后再试。'.$msg['error_info'],
				);
			}
			$this->ajaxReturn($array);
		}
		$assign = array(
			'user_data'=>$user_data,
		);
		$this->assign($assign);
		$this->display();
	}
	 
	// 修改密码
	public function pwd(){
		if(IS_POST){
			$post=I('post.');
			$map=array(
				'id'=>getUserid(),
				);
			if($post['password']!=$post['password2']){
				$this->ajaxReturn(array('status'=>false,'msg'=>'两次输入的密码不一致，请确认重新输入。'));
			}
			$old_password = M('admin_users')->where($map)->getField('password');
			if(md5_16($post['old'])!=$old_password){
				$this->ajaxReturn(array('status'=>false,'msg'=>'原密码不正确，请重新输入'));
			}
			if(md5_16($post['password'])==$old_password){
				$this->ajaxReturn(array('status'=>false,'msg'=>'原密码和新密码一样了哦。请重新输入'));
			}
            $data['password']=md5_16($post['password']);
			$result=M('admin_users')->where($map)->save($data);
			if ($result) {
				session('admin_user',null);
				$array = array(
					'status'=>true,
					'msg'=>'修改成功,请重新登录',
				);
			}else{
				$array = array(
					'status'=>false,
					'msg'=>'没有更变内容，请修改内容再提交。',
				);
			}
			$this->ajaxReturn($array);
		}
        $assign=array(
			'menu'=>'pwd',
            );
        $this->assign($assign);
		$this->display();
	}
	 
    /**
     * 修改管理员 状态status
     */
    public function edit_admin_status(){
		if(IS_POST){
            $data=I('post.');
            // 组合where数组条件
            $uid=$data['id'];
            $map=array(
                'id'=>$uid,
                );
			// 登录状态
			$data['status']=I('status',0,'intval');
            // p($data);die;
			$result=D('AdminUsers')->editData($map,$data);
            if($result){
                // 操作成功
				$this->ajaxReturn('修改成功');
            }else{
				$this->ajaxReturn('修改失败');
			}
		}
	}
    /**
     * 修改管理员
     */
    public function edit_admin(){
        if(IS_POST){
            $data=I('post.');
            // 组合where数组条件
            $uid=$data['id'];
            $map=array(
                'id'=>$uid
                );
			$admin_users = M('admin_users');
			$one = $admin_users->where(array('username'=>array(array('eq',$data['username']),array('neq',$admin_users->where($map)->getField('username')))))->field('username')->find();
			$one ? $this->ajaxReturn('此登录帐号已存在，请更换'):false;
            // 修改权限
            D('AuthGroupAccess')->deleteData(array('uid'=>$uid));
            foreach ($data['group_ids'] as $k => $v) {
                $group=array(
                    'uid'=>$uid,
                    'group_id'=>$v
                    );
                D('AuthGroupAccess')->addData($group);
            }
            $data=array_filter($data);
            // 如果修改密码则md5
            if (!empty($data['password'])) {
                $data['password']=md5_16($data['password']);
            }
			// 登录状态
			$data['status']=I('status',0,'intval');
            // p($data);die;
            $result=D('AdminUsers')->editData($map,$data);
            if($result){
                // 操作成功
				$this->ajaxReturn('编辑成功');
            }else{
                $error_word=D('AdminUsers')->getError();
                if (empty($error_word)) {
					$this->ajaxReturn('编辑成功');
                }else{
                    // 操作失败
					$this->ajaxReturn($error_word);               
                }

            }
        }else{
            $id=I('get.id',0,'intval');
            // 获取用户数据
            $user_data=M('AdminUsers')->find($id);
            // 获取已加入用户组
            $group_data=M('AuthGroupAccess')
                ->where(array('uid'=>$id))
                ->getField('group_id',true);
            // 全部用户组
            $data=D('AuthGroup')->select();
            $assign=array(
                'data'=>$data,
                'user_data'=>$user_data,
                'group_data'=>$group_data
                );
            $this->assign($assign);
            $this->display();
        }
    }
}
