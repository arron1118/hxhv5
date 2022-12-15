<?php
// namespace Admin\Controller;
// use Think\Controller;
// class SystemController extends Controller {
namespace Admin\Controller;
use Common\Controller\AdminBaseController;
/**
 * 系统基本参数
 */
class SystemController extends AdminBaseController{
    public function index(){
        $this->display();
    }
	
	public function email(){
		if(IS_POST){
		$post = I('post.');
		$vowels = array(" ","'");
		$data = str_replace($vowels,"",$post);
        $str=<<<php
<?php
return array(
	//'配置项'=>'配置值'
//***********************************邮件服务器**********************************
	//邮件配置  qq 邮箱
    'EMAIL_FROM_NAME'        => '{$data['EMAIL_FROM_NAME']}',   // 发件人名称
    'EMAIL_SMTP'             => '{$data['EMAIL_SMTP']}',   // smtp
    'EMAIL_USERNAME'         => '{$data['EMAIL_USERNAME']}',   // 账号
    'EMAIL_PASSWORD'         => '{$data['EMAIL_PASSWORD']}',   // 密码  注意: 163和QQ邮箱是授权码；不是登录的密码
    'EMAIL_SMTP_SECURE'      => '{$data['EMAIL_SMTP_SECURE']}',   // 链接方式 如果使用QQ邮箱；需要把此项改为  ssl
    'EMAIL_PORT'             => '{$data['EMAIL_PORT']}', // 端口 如果使用QQ邮箱；需要把此项改为  465
	
);
php;
		// 检测写入
		if(!is_writable(APP_PATH.'Common/Conf/')){
			$this->ajaxReturn('权限不足，写入失败');
		}
        // 创建写入配置文件
		$url = file_put_contents(APP_PATH.'Common/Conf/email.php', $str);
			if($url){
				$this->ajaxReturn('修改成功');
			}else{
				$this->ajaxReturn('修改失败');
			}
		}
        $this->display();
    }
	
	public function db(){
		if(IS_POST){
		$post = I('post.');
		$vowels = array(" ","'");
		$data = str_replace($vowels,"",$post);
        $str=<<<php
<?php
return array(
//'配置项'=>'配置值'
	'DB_TYPE'   => '{$data['DB_TYPE']}', // 数据库类型
	'DB_HOST'   => '{$data['DB_HOST']}', // 服务器地址
	'DB_NAME'   => '{$data['DB_NAME']}', // 数据库名
	'DB_USER'   => '{$data['DB_USER']}', // 用户名
	'DB_PWD'    => '{$data['DB_PWD']}', // 密码
	'DB_PORT'   => {$data['DB_PORT']}, // 端口
	'DB_PREFIX' => '{$data['DB_PREFIX']}', // 数据库表前缀 
	
	// 数据库2    = M('xxx','hbv5_',C('DB_CONFIG_2'));
	'DB_CONFIG_2' => array(
		'DB_TYPE'   => '{$data['DB_TYPE']}', // 数据库类型
		'DB_HOST'   => '{$data['DB_HOST']}', // 服务器地址
		'DB_NAME'   => '{$data['DB_NAME']}', // 数据库名
		'DB_USER'   => '{$data['DB_USER']}', // 用户名
		'DB_PWD'    => '{$data['DB_PWD']}', // 密码
		'DB_PORT'   => {$data['DB_PORT']}, // 端口
		'DB_PREFIX' => '{$data['DB_PREFIX']}', // 数据库表前缀 
	),
);

php;
		// 检测写入
		if(!is_writable(APP_PATH.'Common/Conf/')){
			$this->ajaxReturn('权限不足，写入失败');
		}
        // 创建写入配置文件
        $url = file_put_contents(APP_PATH.'Common/Conf/db.php', $str);
			if($url){
				$this->ajaxReturn('修改成功');
			}else{
				$this->ajaxReturn('修改失败');
			}
		}
        $this->display();
    }
	
	public function web_info(){
		/*配置列表*/
		$group_list = array(
            'web_info' => '网站信息',
            // 'contact' => '联系方式',
            // 'smtp'      => '邮件设置',
            // 'limit_count'      => '网站前台每页行数',
            'color'      => '自定义颜色',
		);
		if(IS_POST){
			$param = I('post.');
			$inc_type = $param['inc_type'];
			unset($param['inc_type']);
			systemCache($inc_type,$param);
			$array = array(
				'status'=>true,
				'msg'=>'操作成功',
			);
			$this->ajaxReturn($array);
		}else{
			$inc_type =  I('get.inc_type','web_info');
			$this->assign('inc_type',$inc_type);
			$config = systemCache($inc_type);
			$assign = array(
				'config'=>$config,
				'group_list'=>$group_list,
			);
			$this->assign($assign);
			$this->display();
		}

	}
	public function gjc_text(){
		if(IS_POST){
			// $param = I('post.');
			$inc_type = 'web_info';
			$param['gjc_text'] = I('post.gjc_text');
			systemCache($inc_type,$param);
			$array = array(
				'status'=>true,
				'msg'=>'操作成功',
			);
			$this->ajaxReturn($array);
		}
		$config = systemCache('web_info');
		$assign = array(
			'config'=>$config,
		);
		$this->assign($assign);
		$this->display();
	}
	
	public function store_logo(){
		if(IS_POST){
			// /Public/Upload/logo/logo_top.png
			$msg = ajax_upload('/Upload/logo/','photo','307200');//限制只有图片格式('jpg', 'jpeg', 'png')可以上传，大小 307200 B  300K
			if($msg['status']==1){
				$param['store_logo'] = $msg['name'];
				$inc_type = 'web_info';
				systemCache($inc_type,$param);
				$data = array(
					'status'=>true,
					'src'=>$msg['name'],
					'msg'=>'上传成功'
				);
			}else{
				$data = array(
					'status'=>false,
					'msg'=>$msg['error_info']
				);
			}
			$this->ajaxReturn($data);
		}
	}
	
	
	
}