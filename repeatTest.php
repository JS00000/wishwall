<?php  
	header('Content-Type:text/html;Charset=UTF-8');
	date_default_timezone_set('Asia/Shanghai');
	$content = "这是为什么?";
	$from 	 = "T";
	$to 	 = "A";
	$color 	 = "1";
	require("MySQLAccount.php");
	$sql = "SELECT fromWho, toWho, content, color FROM wishwall_love ORDER BY ID DESC LIMIT 0,100;";
	$result = mysql_query( $sql, $conn );
	$j = 10;
	while($j--)
	{
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
