<?php 
	header('Content-Type:text/html;Charset=UTF-8');
	date_default_timezone_set('Asia/Shanghai');
		require("MySQLAccount.php");
		// judge repeat
		$i = 0;
		$sql = "SELECT ID, fromWho, toWho, content, time FROM wishwall_love ORDER BY time";
		$result = mysql_query( $sql, $conn );
			$ID = -1;
			$content = '';
			$from = '';
			$to = '';
			$time = '';
		while($row = mysql_fetch_assoc($result)){
			if ( ($row['content'] == $content) && ($row['fromWho'] == $from) && ($row['toWho'] == $to)) {
				$sql = "DELETE FROM wishwall_love WHERE ID=$ID;";
				echo $ID."<br/>";
				$i++;
				$retval = mysql_query( $sql, $conn );
			}
			$ID = $row['ID'];
			$content = $row['content'];
			$from = $row['fromWho'];
			$to = $row['toWho'];
			$time = $row['time'];
		}
		echo "已成功清除 $i 个重复数据！"
?>