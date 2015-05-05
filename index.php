<html>
<head>
	<title>表白墙</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" media="screen" href="css/reset.css" /> 
	<link rel="stylesheet" type="text/css" media="screen" href="css/ph.css" /> 
	<link href="//netdna.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
	<meta name="viewport" content="width=device-width,
									initial-scale=1.0,
									maximum-scale=1.0">

</head>
<body>
	<nav>
		<div class="navbar-header">
			<a href="index.php"><img src="img/logo.png" id="logo"></a>
   		</div>
   		<div class="navbar-content">
       		<form id="search" >
       			<div id="searchblock">
					<i class="fa fa-search" id="searchicon"></i>
					<input type="text" name="searchbox" id="searchbox" placeholder="搜索有没有被表白" onfocus="document.body.style.marginTop='2.5em';"  onblur="document.body.style.marginTop='0em';">
				</div>
				<div id="searchword" onclick="getSearchBox()">
					<span>搜索</span>
				</div>
			</form>
   		</div>
	</nav>
	<div id="main">
	</div>
	<div class="icon" id="makewish">
		<i class="fa fa-circle" id="makewishC1"></i>
		<i class="fa fa-circle" id="makewishC2"></i>
		<i class="fa fa-circle" id="makewishC3"></i>
		<i class="fa fa-circle" id="makewishC4"></i>
		<img src="img/iwanttodeclare.png">
	</div>
	<div id="wishwin"></div>
	<div id="wish">
		<form method="get" action="submit.php" id="form1">
			<i class="fa fa-times-circle" id="closewish"></i>
			<div><span>To:</span><input type="text" name="to" id="to" placeholder="ta"></div>
			<div><span>From:</span><input type="text" name="from" id="from" placeholder="me"></div>
			<textarea name="content" id="content" placeholder="写下你想对ta说的话（双击角落可以换颜色哦～）"></textarea>
			<div><input type="submit" id="submit" value="发布"></div>
			<input type="text" name="color" id="color" value="0">
		</form>
		<touch id="doubleClickArea1" onselectstart="return false;"></touch>
		<touch id="doubleClickArea2" onselectstart="return false;"></touch>
		<touch id="doubleClickArea3" onselectstart="return false;"></touch>
	</div>
	<div id="myDiv"></div>
	<div id="lazyDiv1"></div>
	<div id="lazyDiv2"></div>
	<div id="lazyDiv3"></div>
	<div id="foot">
		<p>Design by Apero.||Code by JS00000</p>
		<p>@BitworkShop</p>
	</div>
	<script src="js/wishwall.js" type="text/javascript"></script>
	<script type="text/javascript">
		var searchbox = <?php echo empty($_GET['searchbox'])?'""':'"'.$_GET['searchbox'].'"'; ?>;
		if (searchmode==1 || searchbox!="") {
			loadSearch(searchbox);
		}else{

			var pageN = <?php echo empty($_GET['pageN'])?0:$_GET['pageN']; ?>;
			document.getElementById('main').setAttribute('page',pageN);
			loadPage(pageN);
		}

		document.getElementById('wish').style.backgroundImage="url('img/bg_blue.png')";
		function change(){
			document.getElementById('lazyDiv1').style.backgroundImage='url(img/bg_green.png)';
			document.getElementById('lazyDiv2').style.backgroundImage='url(img/bg_yellow.png)';
			document.getElementById('lazyDiv3').style.backgroundImage='url(img/bg_pink.png)';
		}
		setTimeout(change,1000);
	</script>
</body>
</html>