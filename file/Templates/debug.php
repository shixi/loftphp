<?php 
if (!defined ('IDREAM_INCLUDE_TLIB')):
	
	die();//未加载配置文件直接报错退出
endif;?>
<!DOCTYPE HTML>
<html lang="zh-CN">
<head>
	<meta charset="UTF-8">
	<title>调试- <?php echo $S_CONFIG['SiteTitle']?></title>
	<?php echo Templates::ShowHeader (array ("style.css","debug.css"))?>
	
</head>

<body>
	<?php $TPL_Handle->TemplatesInclude ("head.php"); ?>
	<div class="inner">
		<pre><?php print_r ($TPL_Handle->ShowValue("exec",true));?></pre>
		<pre><?php print_r ($TPL_Handle->ShowValue("output",true));?></pre>
		<pre><?php print_r ($TPL_Handle->ShowValue("CONFIG",true));?></pre>
	</div>
	
	<?php $TPL_Handle->TemplatesInclude('footer.php');?>
</body>
</html>