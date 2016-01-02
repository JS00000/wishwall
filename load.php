<?php
	header("Content-Type:text/html;Charset=UTF-8");
	if(isset($_GET['pageN']))
	require("MySQLAccount.php");
	$pageN=mysql_real_escape_string($_GET['pageN']);
	$num = $pageN*34 ;
	$sql = "SELECT ID, fromWho, toWho, content, time, color FROM wishwall_love ORDER BY ID DESC LIMIT $num,34;";
	$retval = mysql_query( $sql, $conn );
	if(! $retval ){
		die('Could not get data: ' . mysql_error());
	}
	$text = '{page:[';
	$j=1;
	while($row = mysql_fetch_assoc($retval)){
		if ($j==1) {
			$text = $text . '{';
			$j=0;
		}
		else {
			$text = $text . ',{';
		}
		$text = 
				"$text  'ID':".'"'."$row[ID]".'"'.", 
						'fromWho':".'"'."From: $row[fromWho]".'"'.", 
						'toWho':".'"'."To: $row[toWho]".'"'.",
						'content':".'"'."$row[content]".'"'.",
						'time':".'"'."$row[time]".'"'.",
						'color':".'"'."$row[color]".'"'."
						}";
	}
	$text = $text . ']}';
	echo $text;
?>