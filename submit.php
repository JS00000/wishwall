<?php  
	header('Content-Type:text/html;Charset=UTF-8');
	date_default_timezone_set('prc');
	if(isset($_GET['content']) || isset($_GET['from']) || isset($_GET['to'])){
		if (strpos($_GET['content'], '\\') || strpos($_GET['from'], '\\') || strpos($_GET['to'], '\\') || strpos($_GET['content'], '\\'))
		{
			header('location: index.php');
			exit(-2);
		}
		$content= Htmlspecialchars(strip_tags($_GET['content']));
		$from 	= Htmlspecialchars(strip_tags($_GET['from']));
		$to 	= Htmlspecialchars(strip_tags($_GET['to']));
		$color 	= Htmlspecialchars(strip_tags($_GET['color']));
	}
	if ($to=='') $to='小塔';
	if ($from=='') $from='小塔粉丝';
	$to = substr($to,0,20);
	$from = substr($from,0,12);
	if($content!=""){
		require("MySQLAccount.php");
		$content = mysql_real_escape_string($content);
		$from = mysql_real_escape_string($from);
		$to = mysql_real_escape_string($to);

		// judge repeat
		$sql = "SELECT fromWho, toWho, content, color FROM wishwall_love ORDER BY ID DESC LIMIT 0,10;";
		$result = mysql_query( $sql, $conn );
		$p = true;
		while ($row = mysql_fetch_assoc($result))
			if ( ($row['content'] == $content) && ($row['fromWho'] == $from) && ($row['toWho'] == $to) && ($row['color'] == $color) ) $p = false;
		if ($p)
		{
			$time = date('Y-m-d', time());
			$sql = "INSERT INTO wishwall_love (content,fromWho,toWho,color,time) VALUES ('$content','$from','$to','$color','$time');";
			$result = mysql_query( $sql, $conn );
		}
	}

	header('location: index.php');
?>
