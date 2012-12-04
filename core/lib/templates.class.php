<?php

define ("IDREAM_INCLUDE_TLIB",true);
/**
 * @author Shixi
 * @version V1.2.1
 * 模板类
 */
class Templates
{
	var $VarArray=array();
	/**
	 * 载入模板文件
	 * @param $TemplatesDir 模板相对模板目录路径
	 */
	function ShowTemplates($TemplatesDir)
	{
		global $S_CONFIG;//载入配置数组
		$TPL_Handle=$this;
		include ($S_CONFIG['Dir']['Templates'].$TemplatesDir);
		return true;
	}
	/**
	 * header发出UTF-8编码信息
	 * -- 无参数
	 */
	static function HeaderCharset()
	{
		header("Content-type: text/html; charset=utf-8");
	}
	/**
	 * 
	 * 包括模板文件
	 * @param $filename 包含的文件名
	 */
	function TemplatesInclude ($filename)
	{
		global $S_CONFIG;
		$TPL_Handle=$this;
		if (is_file($S_CONFIG['Dir']['Templates'].$filename)):
			include $S_CONFIG['Dir']['Templates'].$filename;
			return true;
		else:
			return false;
		endif;
	}
	/**
	 * 输出头部信息
	 * @param  $head 文件列表
	 */
	static function ShowHeader($head=array())
	{
		global $S_CONFIG;
		$return="";
		if (!empty($head)&&is_array($head)):
			foreach ($head as $value)
			{
				switch (pathinfo($value,PATHINFO_EXTENSION))
				{
					case "css":
						$return.= '<link rel="stylesheet" href="'.$S_CONFIG['Dir']['Broswer'].'file/css/'.$value.'" />'."\n";
					break;
					case "js":
						$return.= '<script type="text/javascript" src="'.$S_CONFIG['Dir']['Broswer']."file/js/".$value.'"></script>'."\n";
					break;
					
				}
			}
		elseif (is_string($head)):
			switch (pathinfo($head,PATHINFO_EXTENSION))
				{
					case "css":
						$return.= '<link rel="stylesheet" href="'.$S_CONFIG['Dir']['Broswer'].'file/css/'.$head.'" />'."\n";
					break;
					case "js":
						$return.= '<script type="text/javascript" src="'.$S_CONFIG['Dir']['Broswer']."file/js/".$head.'"></script>'."\n";
					break;
					
				}
		endif;
		return $return;
	}
	/**
	 * 设置模板变量
	 * @param $var 变量名称
	 * @param $inner 变量内容
	 * @param $input 连接字符串
	 */
	function SetValue($var,$inner,$input=false)
	{
		$input ? $this->VarArray[$var].= "\n".$inner :$this->VarArray[$var] = $inner;
	}
	
	/**
	 * 输出变量
	 * @param $var 变量名称
	 * @param $arrayoutput 数组输出
	 */
	function ShowValue($var,$arrayoutput=false)
	{
		$return="";
		if (is_array($var)&&$arrayoutput):
			foreach ($var as $value)
			{
				if (isset($this->VarArray[$value])&&is_array($this->VarArray[$value])):
					$return=$this->VarArray[$value];
				elseif (isset($this->VarArray[$value])):
					$return.=$this->VarArray[$value]."\n";
				endif;
			}
		elseif (!is_array($var)):
			if (isset ($this->VarArray[$var])):
				$return=$this->VarArray[$var];
			endif;
		else:
			return false;
		endif;
		return $return;
	}

}