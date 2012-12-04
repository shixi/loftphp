<?php
/**
 * 变量操作库
 */

/**
 * 设置变量
 * @param $var   变量名称
 * @param $type  变量类型
 * @param $clean 强制清除
 */
function SetVar(&$var,$type="NULL",$clean=false)
{	
	if (!isset($var)||$clean):
	$lowtype=strtolower($type);
		switch ($lowtype)
		{
			case "null":
				$var=NULL;
			break;
			case "string":
				$var="";
			break;
			case "int":
				$var=0;
			break;
			case "bool":
				$var=false;
			break;
			case "array":
				$var=array();
			break;
		}
	elseif (isset($var)&&$clean==false):
		trigger_error("注意，试图清空已设置变量。");
	endif;
}