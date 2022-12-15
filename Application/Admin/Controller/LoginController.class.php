<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller{

    public function index(){
		if(check_login()==true){
			$this->success('您已登录',U('admin/index/index'));
		}else{
			if(IS_POST){
				// 做一个简单的登录 组合where数组条件 
				$map=I('post.');
				//yongkun   admin123456      regionpwd    dfc4a0d334f40c2b
				$map_field['password']=md5_16($map['password']);
				$map_field['username']=$map['username'];
				
				$data=M('admin_users')->where($map_field)->find();
				if(!$this->check_verify(I('code')) && C('YZM_STATUS')['status']==1){
					$this->ajaxReturn(0);
				}
					if (empty($data)) {
						$this->ajaxReturn('账号或密码错误');
					}else{
						if($data['status']!=1){
							$this->ajaxReturn('改帐号暂停使用，请联系通过验证');
						}
						$_SESSION['admin_user']=array(
							'id'=>$data['id'],
							'username'=>$data['username'],
							'avatar'=>$data['avatar']
							);
						$this->ajaxReturn(1);
						//$this->success('登录成功、前往管理后台',U('Admin/Index/index'));
					}
			}else{
				$this->display();
			}
		}
    }

    function verify() {
         $config = array(
            'fontSize' => 12, // 验证码字体大小
            'length' => 4, // 验证码位数
            'useNoise' => FALSE, // 关闭验证码杂点
            'useCurve' => FALSE,
            //'codeSet' => '0123456789',
            'imageW' => 88,
            //'imageH' => 20,
        );
        
        $verify = new \Think\Verify($config);
        $verify->entry();
    }
	
	// 检测输入的验证码是否正确，$code为用户输入的验证码字符串
	function check_verify($code, $id = ''){
		$verify = new \Think\Verify();
		return $verify->check($code, $id);
	}
	
    /**
     * 退出
     */
    public function logout(){
        session('admin_user',null);
        $this->success('退出成功、前往登录页面',U('admin/login/index'));
    }

}