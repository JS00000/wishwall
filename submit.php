<?php  
	header('Content-Type:text/html;Charset=UTF-8');
	date_default_timezone_set('prc');
	if(isset($_GET['content']) || isset($_GET['from']) || isset($_GET['to'])){
		$content= Htmlspecialchars($_GET['content']);
		$from 	= Htmlspecialchars($_GET['from']);
		$to 	= Htmlspecialchars($_GET['to']);
		$color 	= $_GET['color'];
	}
	if ($to=='') $to='小塔';
	if ($from=='') $from='小塔粉丝';
	$to = substr($to,0,20);
	$from = substr($from,0,12);
	if($content!=""){
		$dbhost = 'localhost'; 
		$dbuser = 'root';
		$dbpass = '';

		$conn = mysql_connect($dbhost, $dbuser,$dbpass);
		mysql_select_db('wishwall');
		mysql_set_charset('utf8',$conn);
		/**
		  * @param $content 许愿内容
		  * @param $from 许愿的人
		  * @param $to 想对xx说话
		  * @param $color 名片颜色
		  * @return 
		  */

		$content = mysql_real_escape_string($content);
		$from = mysql_real_escape_string($from);
		$to = mysql_real_escape_string($to);

		// judge repeat
		$sql = "SELECT fromWho, toWho, content FROM wishwall_love ORDER BY ID DESC LIMIT 0,1;";
		$result = mysql_query( $sql, $conn );
		$row = mysql_fetch_assoc($result);
		if ( ($row['content'] != $content) || ($row['fromWho'] != $from) || ($row['toWho'] != $to) ) {
			$time = date('Y-m-d', time());
			$sql = "INSERT INTO wishwall_love (content,fromWho,toWho,color,time) VALUES ('$content','$from','$to','$color','$time');";
			$result = mysql_query( $sql, $conn );
		}
	}

	header('location: index.php');
?>