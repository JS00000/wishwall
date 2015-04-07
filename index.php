<html>
<head>
	<title>许愿墙</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" media="screen" href="css/reset.css" /> 
	<link rel="stylesheet" type="text/css" media="screen and (min-device-width: 450px)" href="css/cp.css" /> 
	<link rel="stylesheet" type="text/css" media="screen and (max-device-width: 450px)" href="css/ph.css" /> 
	<link rel="stylesheet" href="../font-awesome-4.3.0/css/font-awesome.min.css">
	<script src="js/jquery-1.6.2.min.js" type="text/javascript"></script>
	<meta name="viewport" content="width=device-width, 
                                     initial-scale=1.0, 
                                     maximum-scale=1.0, 
                                     user-scalable=no">
</head>
<body>
	<a href="index.php"><h1><img src="img/title.png"></br>Best wishes for you.</h1></a>
	<div id="search">
		<input type="text" name="searchbox" id="searchbox" placeholder="搜索ta的心愿" onkeydown="ifEnter()" onkeypress="ifEnter(event)">
		<i class="fa fa-search" id="searchicon" onclick="myFunction2()"></i>
	</div>
	<!-- <div id="nav"></div> -->
	<div id="main">
		<div id="backwords">I like making great ideas happen.</div>
		<!-- <div class="fa fa-chevron-circle-left fa-4x"  id="pageleft" ></div> -->
		<!-- <div class="fa fa-chevron-circle-right fa-4x" id="pageright"></div> -->
		<img src="img/left.png" id="pageleft">
		<img src="img/right.png" id="pageright">
		<div class="wishbox" id="wishbox1" ><p class="content"></p><p class="name"></p><p class="time"></p></div>
		<div class="wishbox" id="wishbox2" ><p class="content"></p><p class="name"></p><p class="time"></p></div>
		<div class="wishbox" id="wishbox3" ><p class="content"></p><p class="name"></p><p class="time"></p></div>
		<div class="wishbox" id="wishbox4" ><p class="content"></p><p class="name"></p><p class="time"></p></div>
		<div class="wishbox" id="wishbox5" ><p class="content"></p><p class="name"></p><p class="time"></p></div>
		<div class="wishbox" id="wishbox6" ><p class="content"></p><p class="name"></p><p class="time"></p></div>
		<div class="wishbox" id="wishbox7" ><p class="content"></p><p class="name"></p><p class="time"></p></div>
		<div class="wishbox" id="wishbox8" ><p class="content"></p><p class="name"></p><p class="time"></p></div>
		<div class="wishbox" id="wishbox9" ><p class="content"></p><p class="name"></p><p class="time"></p></div>
		<div class="wishbox" id="wishbox10"><p class="content"></p><p class="name"></p><p class="time"></p></div>
		<div class="wishbox" id="wishbox11"><p class="content"></p><p class="name"></p><p class="time"></p></div>
		<div class="wishbox" id="wishbox12"><p class="content"></p><p class="name"></p><p class="time"></p></div>
		<div class="wishbox" id="wishbox13"><p class="content"></p><p class="name"></p><p class="time"></p></div>
		<div class="wishbox" id="wishbox14"><p class="content"></p><p class="name"></p><p class="time"></p></div>
		<div class="wishbox" id="wishbox15"><p class="content"></p><p class="name"></p><p class="time"></p></div>
		<div class="wishbox" id="wishbox16"><p class="content"></p><p class="name"></p><p class="time"></p></div>
		<div class="wishbox" id="wishbox17"><p class="content"></p><p class="name"></p><p class="time"></p></div>
		<div class="wishbox" id="wishbox18"><p class="content"></p><p class="name"></p><p class="time"></p></div>
		<div class="wishbox" id="wishbox19"><p class="content"></p><p class="name"></p><p class="time"></p></div>
		<div class="wishbox" id="wishbox20"><p class="content"></p><p class="name"></p><p class="time"></p></div>
		<div class="wishbox" id="wishbox21"><p class="content"></p><p class="name"></p><p class="time"></p></div>
		<div class="wishbox" id="wishbox22"><p class="content"></p><p class="name"></p><p class="time"></p></div>
		<div class="wishbox" id="wishbox23"><p class="content"></p><p class="name"></p><p class="time"></p></div>
		<div class="wishbox" id="wishbox24"><p class="content"></p><p class="name"></p><p class="time"></p></div>
		<div class="wishbox" id="wishbox25"><p class="content"></p><p class="name"></p><p class="time"></p></div>
		<div class="wishbox" id="wishbox26"><p class="content"></p><p class="name"></p><p class="time"></p></div>
		<div class="wishbox" id="wishbox27"><p class="content"></p><p class="name"></p><p class="time"></p></div>
		<div class="wishbox" id="wishbox28"><p class="content"></p><p class="name"></p><p class="time"></p></div>
		<div class="wishbox" id="wishbox29"><p class="content"></p><p class="name"></p><p class="time"></p></div>
		<div class="wishbox" id="wishbox30"><p class="content"></p><p class="name"></p><p class="time"></p></div>
		<div class="wishbox" id="wishbox31"><p class="content"></p><p class="name"></p><p class="time"></p></div>
		<div class="wishbox" id="wishbox32"><p class="content"></p><p class="name"></p><p class="time"></p></div>
		<div class="wishbox" id="wishbox33"><p class="content"></p><p class="name"></p><p class="time"></p></div>
		<div class="wishbox" id="wishbox34"><p class="content"></p><p class="name"></p><p class="time"></p></div>
<!-- 		<div class="icon" id="makewish">
			<i id="makewishC1"></i>
			<i id="makewishC2"></i>
			<i id="makewishC3"></i>
			<img src="img/makewish.png">
		</div> -->
	</div>
	<div id="wishwin"></div>
	<div id="wish">
		<form method="get" action="submit.php" id="form1">
			<i class="fa fa-times-circle" id="closewish"></i>
			<h2><span>M</span>ake a wish</h2>
			<textarea name="content" id="content"></textarea>
			<h3 id="tname"><span>F</span>rom:</h3>
			<input type="text" name="name" id="name" onkeydown="ifName()" onkeypress="ifName(event)">
			<!-- <h3 id="tcolor"><span>C</span>olor:</h3> -->
			<!-- <div id="choice">
				<div class="exambox" id="exambox1"></div>
				<div class="exambox" id="exambox2"></div>
				<div class="exambox" id="exambox3"></div>
				<div class="exambox" id="exambox4"></div>
				<div class="exambox" id="exambox5"></div>
				<div class="exambox" id="exambox6"></div>
				<div class="exambox" id="exambox7"></div>
				<div class="exambox" id="exambox8"></div>
				<div class="exambox" id="exambox9"></div>
				<div class="exambox" id="exambox10"></div>
				<div class="exambox" id="exambox11"></div>
				<div class="exambox" id="exambox12"></div>
			</div> -->
			<!-- <input type="text" name="color" id="color" value="0"> -->
			<input type="text" name="choose" id="choose" value="#">
			<input type="text" name="page" id="page" value="#">
			<div class="icon" id="submit" onclick="document.getElementById('form1').submit()">
				<i id="makewishC1"></i>
				<i id="makewishC2"></i>
				<i id="makewishC3"></i>
				<img src="img/submit.png">
			</div>
			<!-- <div id="whichcolor1"></div> -->
			<!-- <div id="whichcolor2"></div> -->
		</form>
	</div>
	<div id="show">
		<i class="fa fa-times-circle" id="closeshow"></i>
		<p id="fcont"></p>
		<span id="lai">来</span><span id="zi">自：</span>
		<span id="fname"></span>
		<span id="ftime"></span>
	</div>
	<div id="myDiv"></div>
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