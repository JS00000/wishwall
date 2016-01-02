<html>
<head>
	<title>许愿墙</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="css/reset.css" /> 
	<link rel="stylesheet" type="text/css" href="css/ph.css" /> 
	<link href="//cdn.bootcss.com/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet">
	<script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
	<meta name="format-detection" content="telephone=no" />
	<meta name="viewport" content="width=device-width,
									initial-scale=1.0,
									maximum-scale=1.0">

	<script type="text/javascript">
		var key = <?php echo empty($_GET['key'])?'"hahaha"':'"'.$_GET['key'].'"'; ?>;
	</script>
	<style type="text/css">
		.wishbox .avatar .fa-close{
			font-size: 2em;
			position: relative;
			left: 0.1em;
		}
	</style>
</head>
<body>
	<div id="main">	</div>
	<div id="foot">
		<p>Design by Apero.||Code by JS00000</p>
		<p>Copyright BitworkShop</p>
	</div>
	<script src="js/wishwall_delete.js" type="text/javascript"></script>
	<script type="text/javascript">
		var pageN = <?php echo empty($_GET['pageN'])?0:$_GET['pageN']; ?>;
		document.getElementById('main').setAttribute('page',pageN);
		loadPage(pageN);
	</script>
</body>
</html>