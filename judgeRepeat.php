<?php 
	header('Content-Type:text/html;Charset=UTF-8');
	date_default_timezone_set('prc');
		$dbhost = 'localhost'; 
		$dbuser = 'root';
		$dbpass = '';
		$conn = mysql_connect($dbhost, $dbuser,$dbpass);
		mysql_select_db('wishwall');
		mysql_set_charset('utf8',$conn);
		// judge repeat
		$sql = "SELECT ID, fromWho, toWho, content, time FROM wishwall_love";
		$result = mysql_query( $sql, $conn );
			$ID = -1;
			$content = '';
			$from = '';
			$to = '';
			$time = '';
		while($row = mysql_fetch_assoc($result)){
			if ( ($row['content'] == $content) && ($row['fromWho'] == $from) && ($row['toWho'] == $to)) {
				$sql = "DELETE FROM wishwall_love WHERE ID=$ID;";
				echo $ID;
				$retval = mysql_query( $sql, $conn );
			}
			$ID = $row['ID'];
			$content = $row['content'];
			$from = $row['fromWho'];
			$to = $row['toWho'];
			$time = $row['time'];
		}
?>