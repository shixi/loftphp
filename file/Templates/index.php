
<!DOCTYPE HTML>
<html lang="zh-CN">
<head>
	<meta charset="UTF-8">
	<title>首页 - <?php echo $S_CONFIG['SiteTitle']?></title>
	<?php echo Templates::ShowHeader (array ("style.css","jquery.js","jquery.countdown.min.js"))?>
	<script type="text/javascript">
	$(function () {
		var liftoffTime = new Date(2012, 25 - 12, 14, 13, 00);
		$('#counter').countdown({until: liftoffTime,
	    layout: '{dn} {dl}, {hn} {hl}, {mnn} {ml}, {snn} {sl}'});
});
	function loadAD()
	{
		document.getElementById('ADHead').src='http://j.union.ijinshan.com/c.js';
	}
	</script>
</head>

<body onload="loadAD()">
<?php $TPL_Handle->TemplatesInclude('head.php');?>
	<div class="main">
		<div class="main_border">
		<script>u_key='140375'</script>
		<script  id="ADHead"></script>
		<div class="countdown">
			<h1 align="middle">预计正式建成还有:</h1>
			<div id="counter" align="middle" style="font-size:30px;font-family:Georgia, sans-serif;"></div>
		</div>
<?php $TPL_Handle->TemplatesInclude('index2.php');?>
		</div>
	</div>

<?php $TPL_Handle->TemplatesInclude('footer.php');?>
</body>
</html>