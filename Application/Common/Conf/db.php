<?php
return array(
//'配置项'=>'配置值'
	'DB_TYPE'   => 'mysql', // 数据库类型
	'DB_HOST'   => '127.0.0.1', // 服务器地址
	'DB_NAME'   => 'www_hengxinghui_com', // 数据库名
	'DB_USER'   => 'wanxin_website', // 用户名
	'DB_PWD'    => 'wanxin_website', // 密码
	'DB_PORT'   => 3306, // 端口
	'DB_PREFIX' => 'hbv5_', // 数据库表前缀

	// 数据库2    = M('xxx','hbv5_',C('DB_CONFIG_2'));
	'DB_CONFIG_2' => array(
		'DB_TYPE'   => 'mysql', // 数据库类型
		'DB_HOST'   => '127.0.0.1', // 服务器地址
		'DB_NAME'   => 'wanxin', // 数据库名
		'DB_USER'   => 'root', // 用户名
		'DB_PWD'    => 'root', // 密码
		'DB_PORT'   => 3306, // 端口
		'DB_PREFIX' => 'hbv5_', // 数据库表前缀
	),
);
