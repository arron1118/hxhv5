<?php
namespace Admin\Controller;
use Common\Controller\AdminBaseController;
/**
 * 后台首页控制器
 */
class IndexController extends AdminBaseController{
	/**
	 * 首页
	 */
	public function index(){
		$this->display();
	}
	/**
	 * elements
	 */
	public function elements(){

		$this->display();
	}
	
	/**
	 * welcome
	 */
	public function welcome(){
	    $this->display();
	}

	function information(){
		$ip = get_client_ip();
        $server_info = array(
            '操作系统' => PHP_OS,
            '运行环境' => $_SERVER["SERVER_SOFTWARE"],
            'PHP运行方式' => php_sapi_name(),
            '上传附件限制' => ini_get('upload_max_filesize'),
            '执行时间限制' => ini_get('max_execution_time') . '秒',
            'Socket支持情况' => 'fsockopen:' . (function_exists('fsockopen') ? '<span style="color:green;">√</span>' : '×') . ' &nbsp; &nbsp;' .
                'pfsockopen:' . (function_exists('pfsockopen') ? '<span style="color:green;">√</span>' : '×') . ' &nbsp; &nbsp;' .
                'stream_socket_client:' . (function_exists('stream_socket_client') ? '<span style="color:green;">√</span>' : '×') . ' &nbsp; &nbsp;' .
                'curl_init:' . (function_exists('curl_init') ? '<span style="color:green;">√</span>' : '×') . ' &nbsp; &nbsp;',
            '服务器时间' => date("Y年n月j日 H:i:s"),
            '北京时间' => gmdate("Y年n月j日 H:i:s", time() + 8 * 3600),
            '域名/IP' => $_SERVER['SERVER_NAME'] . ' [ ' . gethostbyname($_SERVER['SERVER_NAME']) . ' ]',
			'浏览当前页面的IP' => $ip,
            // '剩余空间' => round((@disk_free_space(".") / (1024 * 1024)), 2) . 'M',
        );
        $this->assign('server_info', $server_info);
        $this->display();
    }

}
