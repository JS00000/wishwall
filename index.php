<html>
<head>
	<title>许愿墙</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" media="screen" href="css/reset.css" /> 
	<link rel="stylesheet" type="text/css" media="screen and (min-width: 767px)" href="css/cp.css" /> 
	<link rel="stylesheet" type="text/css" media="screen and (max-width: 767px)" href="css/ph.css" /> 
	<link rel="stylesheet" type="text/css" media="screen and (max-width: 300px)" href="css/mini.css" /> 
	<link rel="stylesheet" type="text/css" media="screen" href="css/dynamic.css" /> 
	<link href="//netdna.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
	<script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
	<meta name="viewport" content="width=device-width, 
									initial-scale=1.0,
									maximum-scale=1.0">
</head>
<body>
	<nav>
		<div class="navbar-header">
			<a href="index.php"><img src="img/heart.png" id="heart"><img src="img/declare.png" id="declare"><h2>Maybe,I want you.</h2></a>
   		</div>
   		<div class="navbar-content">
       		<form id="search">
       			<div id="searchblock">
					<i class="fa fa-search" id="searchicon"></i>
					<input type="text" name="searchbox" id="searchbox" placeholder="搜索有没有被表白">
				</div>
				<div id="searchword" onclick="myFunction2()">
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
			<div><span>To:</span><input type="text" name="to" id="to" ></div>
			<div><span>From:</span><input type="text" name="from" id="from" ></div>
			<textarea name="content" id="content" onfocus="if(this.value=='写下你想对ta说的话（双击角落可以换颜色哦～）'){this.value='';}"  onblur="if(this.value==''){this.value='写下你想对ta说的话（双击角落可以换颜色哦～）';}">写下你想对ta说的话（双击角落可以换颜色哦～）</textarea>
			<div><input type="submit" id="submit" value="发布"></div>
			<input type="text" name="color" id="color" value="0">
		</form>
		<touch id="doubleClickArea1"></touch>
		<touch id="doubleClickArea2"></touch>
		<touch id="doubleClickArea3"></touch>
	</div>
	<!-- <div id="myDiv"></div> -->
	<div id="foot">
		<p>Design by Apero.||Code by JS00000</p>
		<p>@BitworkShop</p>
	</div>
	<script src="js/wishwall.js" type="text/javascript"></script>
	<script type="text/javascript">
		var pageN = <?php if (empty($_GET['pageN'])) echo 0; else echo $_GET['pageN']; ?>;
		document.getElementById('main').setAttribute('page',pageN);
		myFunction('load.php',pageN);
	</script>
</body>
</html>