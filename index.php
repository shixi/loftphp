<?php
/**
 * @author Shixi
 * 首页入口文件
 */

require ('./core/core.php');

require $S_CONFIG['Dir']['TemplatesLib'];

Templates::HeaderCharset();
$Templates =  new Templates();
$Templates -> SetValue("dir", __FILE__);
$Templates -> ShowTemplates("index.php");

?>