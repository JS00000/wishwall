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
<!-- 百度统计 -->
<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "//hm.baidu.com/hm.js?c2d63b69f02bbdef3d037237bedefa26";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>
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
					<input type="text" name="searchbox" id="searchbox" placeholder="搜索ta的心愿" onfocus="document.body.style.marginTop='2.5em';"  onblur="document.body.style.marginTop='0em';">
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
			<div><span>To:</span><input type="text" name="to" id="to" placeholder="小塔"></div>
			<div><span>From:</span><input type="text" name="from" id="from" placeholder="记得截图哦～"></div>
			<textarea name="content" id="content" placeholder="写下你的心愿，记得截图给小塔（双击弹窗角落可以换颜色哦～）"></textarea>
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
		<p>Copyright BitworkShop</p>
	</div>
	<script type="text/javascript">
		var isWindowsMobile = 
			<?php 
				/** 
				* 判断是否是通过手机访问 
				* @return bool 是否是移动设备     
				*/  
				function isMobile() {  
				  //判断手机发送的客户端标志  
				  if(isset($_SERVER['HTTP_USER_AGENT'])) {  
				    $userAgent = strtolower($_SERVER['HTTP_USER_AGENT']);  
				    $clientkeywords = array(  
				      'nokia',  'windowsce'
				      // ,'sony', 'ericsson', 'mot', 'samsung', 'htc', 'sgh', 'lg', 'sharp', 'sie-'  ,
				      // 'philips', 'panasonic', 'alcatel', 'lenovo', 'iphone', 'ipod', 'blackberry', 'meizu',  
			    	  // 'android', 'netfront', 'symbian', 'ucweb', 'palm', 'operamini',  
			    	  // 'operamobi', 'opera mobi', 'openwave', 'nexusone', 'cldc', 'midp', 'wap', 'mobile'  
			    	);  
			    	// 从HTTP_USER_AGENT中查找手机浏览器的关键字  
				    	if(preg_match("/(".implode('|',$clientkeywords).")/i",$userAgent)&&strpos($userAgent,'ipad') === false)  
				    {  
				      return 1;  
				    }  
				  }  
				  return 0;
				}  
				echo isMobile();
			?>;
	</script>
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


		colornum = Math.floor(Math.random()*4);
		document.getElementById('wish').style.backgroundImage=colorurl[colornum];
		document.getElementById('color').value=colornum;
		function change(){
			for (var i = 1; i <= 3; i++) {
				colornum++;
				if (colornum == 4) colornum = 0;
				document.getElementById('lazyDiv'+i).style.backgroundImage=colorurl[colornum];
			};
			colornum++;
		}
		setTimeout(change,1000);
	</script>
</body>
</html>