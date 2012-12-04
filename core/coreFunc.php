<?php
/**
 * 自动加载类函数
 * @param $classname 类名称
 */
function LoadClass ($classname)
{
	global $S_CONFIG;
	$classnameLow = $classname;
	$dir1=$S_CONFIG['Dir']['Lib'].$classnameLow.".class.php";
	$dir2=$S_CONFIG['Dir']['Lib'].$classnameLow.".php";
	if ( is_file ( $dir1 ) ):
		require $dir1;
	elseif ( is_file( $dir2 ) ):
		require $dir2;
	endif;
}
spl_autoload_register ( 'LoadClass' );//设置自动加载类函数

/**
 * sError 抛出错误
 * @param $errormsg   错误信息
 * @param $stop       是否终止程序 (默认不终止)
 * @param $showerror  是否显示错误 (默认显示)
 */
function sError($errormsg='',$stop=false,$showerror=true)
{
	$traces = debug_backtrace();
	if ($showerror&&$stop):
		$bufferabove = ob_get_clean();
		$traces=debug_backtrace();
		require($GLOBALS['S_CONFIG']['Dir']['Templates'].'error2.php');
	endif;
	if ($stop==false&&$showerror):
		foreach ($traces as $trace):
			echo '<div class="error"><div>',$errormsg,'   在 ',str_ireplace(getcwd(), '', $trace ['file']),'  第',$trace["line"],'行</div></div>';
		endforeach;
	endif;
}

/**
 * sImport 导入文件
 * @param $sfile       导入文件路径
 * @param $auto_search 是否自动搜索$S_CONFIG['INCLUDE_PATH']
 */
function sImport ($sfile,$auto_search=true)
{
	if (isset($GLOBALS['S_CONFIG']['import'][md5($sfile)])):
		return true;
	else:
		if (@is_readable($sfile)):
			require $sfile;
			$GLOBALS['S_CONFIG']['import'][md5($sfile)]=true;
			return true;
		else:
			if ($auto_search==true):
			foreach($GLOBALS['S_CONFIG']['INCLUDE_PATH'] as $include_path){
				// 检查当前搜索路径中，该文件是否已经载入
				if( file_exists($include_path.$sfile)&&isset($GLOBALS['S_CONFIG']['import'][md5($include_path.$sfile)]))
				return true;
				if( is_file($include_path.$sfile)&&is_readable( $include_path.$sfile ) ):
					require($include_path.$sfile);// 载入文件
					$GLOBALS['S_CONFIG']['import'][md5($include_path.$sfile)] = true;// 对该文件进行标识为已载入
					return true;
				endif;
			}
			endif;
		endif;
	endif;
	return false;
}
/**
 * sClass 类实例化函数
 * @param $class_name  类名称
 * @param $args        实例化类参数
 * @param $sclassDir   指定目录/文件
 * @param $force_inst  强制重新实例化
 */
function sClass($class_name,$args=NULL,$sclassDir=NULL,$force_inst=false)
{
	if ($force_inst!=true):
		if (isset($GLOBALS['S_CONFIG']['inst_class'][$classname])):
			return $GLOBALS['S_CONFIG']['inst_class'][$classname];//不强制初始化时如已实例化，直接返回实例化对象
		endif;
	endif;
	if (is_dir($sclassDir)):
		//$sclassDir 为目录时判断
		if (is_file($sclassDir.'/'.$classname.'.class.php')):
			sImport ($sclassDir.'/'.$classname.'.class.php');//类名.class.php文件存在,则载入类文件
		elseif (is_file($sclassDir.'/'.$classname.'.php')):
			sImport ($sclassDir.'/'.$classname.'.php');//类名.php文件存在,则载入类文件
		endif;
	elseif(is_file($sclassDir)):
		sImport($sclassDir);//$sclassDir 为文件且存在时,载入类文件
	else:
		if (!sImport($class_name.'.class.php',true))return false;//以上判断都不成立时,返回假
	endif;
	if (class_exists($class_name)):
		$argString = '';//初始化参数存储变量
		$comma = '';//逗号 
		if(null != $args):
			foreach ($args as $value):
				$argString .= $comma . "\$args['$value']";
				$comma = ', ';
			endforeach;
		endif;
		eval("\$GLOBALS['S_CONFIG']['inst_class'][\$class_name]= new \$class_name($argString);");
		return $GLOBALS['S_CONFIG']['inst_class'][$class_name];
	endif;
}
?>