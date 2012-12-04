<?php
/**
 * @version V1.0.0.8
 * @copyright Shixi
 */
$S_CONFIG['Version']            = 'V1.0.0.8';
$S_CONFIG['ADMIN']              = '冰梦';
$S_CONFIG['ADMINPW']            = 'bingmeng';
$S_CONFIG['charest']            = 'UTF-8';
$S_CONFIG['Dir']['Base']        = dirname(dirname(__FILE__))."/";
$S_CONFIG['Dir']['Core']        = dirname(__FILE__)."/";
$S_CONFIG['Dir']['File']        = $S_CONFIG['Dir']['Base']."file/";
$S_CONFIG['Dir']['Templates']   = $S_CONFIG['Dir']['File']."templates/";
$S_CONFIG['Dir']['Lib']         = $S_CONFIG['Dir']['Core']."lib/";
$S_CONFIG['Dir']['TemplatesLib']= $S_CONFIG['Dir']['Lib']."templates.class.php";
$S_CONFIG['Dir']['XPATH']       = "/";
$S_CONFIG['Dir']['Broswer']     = $S_CONFIG['Dir']['XPATH'];
$S_CONFIG['SiteTitle']          = '冰梦';
$S_CONFIG['MYSQL']              = array (
		'Host'		=> 'localhost',
		'User'		=> 'root',
		'Password'	=> 'a00000',
		'DBName'	=> 'wp',
		'DBHead'	=> 'BX_'
);
$S_CONFIG['DEBUG'] = true;
$S_CONFIG['AUTO_SESSION']=true;
$S_CONFIG['INCLUDE_PATH']=array(
		'BASE_PATH'=>$S_CONFIG['Dir']['Base'],
		'CORE_PATH'=>$S_CONFIG['Dir']['Core'],
		'LIB_PATH' =>$S_CONFIG['Dir']['Lib']
);
require ($S_CONFIG['Dir']['Core'].'app.config.php');

return true;
//配置结束
?>