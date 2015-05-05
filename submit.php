<?php  
	header('Content-Type:text/html;Charset=UTF-8');
	date_default_timezone_set('prc');

	if(isset($_GET['content'] && isset($_GET['from'] && $_GET['to']){
		$content= Htmlspecialchars(mysql_real_escape_string($_GET['content']));
		$from 	= Htmlspecialchars(mysql_real_escape_string($_GET['from']));
		$to 	= Htmlspecialchars(mysql_real_escape_string($_GET['to']));
		$color 	= $_GET['color'];
	}

	if ($to=='') $to='ta';
	if ($from=='') $from='me';
	
	if($content!=""){
		$dbhost = 'localhost'; 
		$dbuser = 'root';
		$dbpass = '';  

		$conn = mysql_connect($dbhost, $dbuser,$dbpass);
		mysql_set_charset('utf8',$conn);
		/**
		  * @param $content 许愿内容
		  * @param $from 许愿的人
		  * @param $to 想对xx说话
		  * @param $color 名片颜色
		  * @return 
		  */
		$sql = "INSERT INTO wishwall_love (content,fromWho,toWho,color) VALUES ('$content','$from','$to','$color');"; 

		mysql_select_db('wishwall');

		$result=mysql_query($sql,$conn);  
	}

	header('location: index.php');
?>