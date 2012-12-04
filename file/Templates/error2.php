<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta name="robots" content="noindex, nofollow, noarchive" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>服务器错误 - <?php echo $GLOBALS['S_CONFIG']['SiteTitle'];?></title>
	<style>
		body{padding:0;margin:0;font-family:"微软雅黑", Helvetica, sans-serif;background:#EBF8FF;color:#5E5E5E;}
		div, h1, h2, h3, h4, p, form, label, input, textarea, img, span{margin:0; padding:0;}
		ul{margin:0; padding:0; list-style-type:none;font-size:0;line-height:0;}
		#body{width:918px;margin:0 auto;}
		#main{width:918px;margin:13px auto 0 auto;padding:0 0 35px 0;}
		#contents{width:918px;float:left;margin:13px auto 0 auto;background:#FFF;padding:8px 0 0 9px;}
		#contents h2{display:block;background:#CFF0F3;font:bold 18px;padding:12px 0 12px 30px;margin:0 10px 22px 1px;}
		#contents ul{padding:0 0 0 18px;font-size:0;line-height:0;}
		#contents ul li{display:block;padding:0;color:#8F8F8F;background-color:inherit;font:normal 14px;margin:0;}
		#contents ul li span{display:block;color:#408BAA;background-color:inherit;font:bold 14px "微软雅黑";padding:0 0 10px 0;margin:0;}
		#oneborder{width:800px;font:normal 14px "微软雅黑";border:#EBF3F5 solid 4px;margin:0 30px 20px 30px;padding:10px 20px;line-height:23px;}
		#oneborder span{padding:0;margin:0;}
		#oneborder #current{background:#CFF0F3;}
		.site{ float:right; font-size:12px; padding:0 10px 5px 0;}
	</style>	
</head>
<body>
<div id="main">
	<div id="contents">
		<h2><?php echo '服务器错误';?></h2>
		<ul>
<?php foreach ($traces as $trace): ?>
			<li>
				<span>错误发生在 <?php echo (str_ireplace(getcwd(), '', $trace ['file'])); ?> 第 <?php echo $trace["line"];?> 行</span>
			</li>
<?php endforeach; ?>
		</ul>
		<div id="oneborder"><?php echo $errormsg?></div>
		<div class="site">Powered by <?php echo $GLOBALS['S_CONFIG']['SiteTitle'] ?></div>
	</div>
</div>
</body>
</html>
