<?php
/**
 * @version V1.0.0.8
 * @copyright Shixi
 */
//定义版本信息
define ('SX_version','V1.2.9.1');
//导入核心配置
require ('config.php');
//导入核心函数文件
require ('coreFunc.php');


//开启错误报告
if ($S_CONFIG['DEBUG']):
	error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
endif;

//开启SESSION
if ($S_CONFIG['AUTO_SESSION']):
	session_start();
endif;


?>