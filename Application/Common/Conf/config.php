<?php
return array(
	//'配置项'=>'配置值'
	'LOAD_EXT_CONFIG' => 'user,db,email,yzm,type,gjc_text,taocan,diqu,major,cloud_major,cloud_diqu', // 加载扩展配置文件
    'SHOW_PAGE_TRACE'        => APP_DEBUG ? true : false,                           // 是否显示调试面板
    'URL_CASE_INSENSITIVE'   => false,                           // url区分大小写
	'TAGLIB_BUILD_IN'        => 'Cx,Common\Tag\My',              // 加载自定义标签
//--------------------域名部署--------------------------------
	'APP_SUB_DOMAIN_DEPLOY'   =>    1, // 开启子域名配置
	'APP_SUB_DOMAIN_RULES'    =>    array(
		'api'         => 'Api',  // mm子域名指向Api模块
	),


//--------------------SQL解析缓存-----------------------------
	//开启缓存

	// 'DB_SQL_BUILD_CACHE' => true,

	//缓存方式

	// 'DB_SQL_BUILD_QUEUE' => 'file',

	// SQL缓存的队列长度

	// 'DB_SQL_BUILD_LENGTH' => 500,



//***********************************云端共享使用db里面的哪个数据库配置。**************************************
	'CLOUD_USE_DB'			 => 'DB_CONFIG_CLOUD',


//***********************************URL设置**************************************
    'MODULE_ALLOW_LIST'      => array('Home','Admin','Api','Hbv5'), //允许访问列表
    'URL_HTML_SUFFIX'        => '',  // URL伪静态后缀设置
    'URL_MODEL'              => 1,  //启用rewrite
//***********************************SESSION设置**********************************
    'SESSION_OPTIONS'        => array(
        'name'               => 'QYK',//设置session名
        'expire'             => 24*3600*3, //SESSION保存3天
        'use_trans_sid'      => 1,//跨页传递
        'use_only_cookies'   => 0,//是否只开启基于cookies的session的会话方式
    ),
//***********************************页面设置**************************************
    'TMPL_EXCEPTION_FILE'    => APP_DEBUG ? THINK_PATH.'Tpl/think_exception.tpl' : './Public/Template/default/error/404/404.html',
    'TMPL_ACTION_ERROR'      => 'Public/dispatch_jump.tpl', // 默认错误跳转对应的模板文件
    'TMPL_ACTION_SUCCESS'    => 'Public/dispatch_jump.tpl', // 默认成功跳转对应的模板文件
//***********************************auth设置**********************************
    'AUTH_CONFIG'            => array(
            'AUTH_USER'      => 'admin_users'                         //用户信息表
    ),
//***********************************其他设置**********************************


);






