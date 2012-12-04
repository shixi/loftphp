<?php
/**
 * 数据库操作类
 * @author Shixi
 * @version V1.0.3.7
 */

/**
 * Mysql 操作类
 * @author Shixi
 */
class Mysqlc
{
	var $connect = NULL; //连接句柄
	var $error=NULL;     //错误信息
	var $execString=NULL;
	/**
	 * 连接数据库
	 */
	function connect()
	{
		global $S_CONFIG;
		$this->connect=mysql_connect($S_CONFIG['MYSQL']['Host'],$S_CONFIG['MYSQL']['User'],$S_CONFIG['MYSQL']['Password']);
		if (!$this->connect):
			return false;
		endif;
		mysql_query('set names utf8',$this->connect);
		$this->SelectDB($S_CONFIG['MYSQL']['DBName']);
		return true;
	}
	/**
	 * 选择数据库
	 * @param $DB	数据库名称
	 */
	function SelectDB($DB)
	{
		if (!$this->connect):
			$this->showerror("未连接数据库");
			return false;
		endif;
		mysql_select_db($DB,$this->connect);
		return true;
	}
	/**
	 * 执行SQL语句
	 * @param $query SQL语句
	 */
	function exec($query)
	{
		if (!$this->connect):
			$this->showerror("未连接数据库");
			return false;
		endif;
		$return = mysql_query($query,$this->connect);
		if ($return):
			return $return;
		else:
			$this->error=mysql_error();
			return(false);
		endif;
			
	}
	
	function exec_find($lie='*',$from,$where='',$limit='')
	{
		$slie="";
		if (is_array($lie)):
			foreach ($lie as $value)
			{
				if (empty($slie)):
					$slie.='`'.$value.'` ';
				else:
				$slie.=',`'.$value.'` ';
				endif;
			}
		else:
			$slie=$lie;
		endif;
		$query= 'SELECT '.$slie." FROM `".$from."`";
		if (is_array($where)):
			foreach ($where as $key=>$value)
			{
				if (empty($swhere)):
					$swhere='`'.$key.'`'."='".$value."'";
				else:
					$swhere.=' and `'.$key."` ='".$value."'";
				endif;
			}
		else:
			$swhere=$where;
		endif;
		if (!empty($swhere)):
			$query.=' WHERE '.$swhere;
		endif;
		if (!empty($limit)):
			$query.=' LIMIT '.$limit;
		endif;
		$return = $this->exec($query);
		$this->execString= $query;
		return $return;
		
	}
	/**
	 * 输出错误信息
	 */
	function geterror ()
	{
		if (!empty($this->error)):
			return $this->error;
		else:
			return false;
		endif;
	}
	
	private function showerror($string)
	{
		if (!empty($string)):
			$this->error=$string;
		endif;
	}
	/**
	 * 关闭MYSQL连接
	 */
	function close()
	{
		if (!$this->connect):
			return false;
		endif;
		mysql_close($this->connect);
		return true;
	}
	function __destruct()
	{
		if ($this->connect):
			mysql_close($this->connect);
		endif;
	}
}
/**
 * SQLITE 数据库操作类
 * @author Shixi
 * @version V1.2.7.1
 */
class sqlite
{
	var $connect=NULL;
	function sqlite ($filename="db.sqlite")
	{
		
			$this->connect= sqlite_open($filename) or (die ("ERROR: Cannot open database"));
	}
	function query($query)
	{
		$result=sqlite_query($this->connect,$query);
		return ($result);
	}
	
}
