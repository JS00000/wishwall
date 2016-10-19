<?php  
	header('Content-Type:text/html;Charset=UTF-8');
	date_default_timezone_set('prc');

	// judge repeat
	if(!(isset($_GET['key']) && Htmlspecialchars($_GET['key']) == "qwerpoiuasdf;lkj")){
		echo "what fuxx??";
		exit();
	}
	require("MySQLAccount.php");
	$sql = "SELECT ID, fromWho, toWho, content, color FROM wishwall_love ORDER BY ID DESC;";
	$result = mysql_query( $sql, $conn );
	for ($i=0; $i < 10; $i++) { 
		$row[$i]['content'] = "";
		$row[$i]['fromWho'] = "";
		$row[$i]['toWho'] = "";
		$row[$i]['color'] = "0";
	}
	$j = 0;
	while($now = mysql_fetch_assoc($result))
	{
		$repeat = false;
		for ($i=0; $i < 10; $i++)
			if ( ($now['content'] == $row[$i]['content']) && ($now['fromWho'] == $row[$i]['fromWho']) && ($now['toWho'] == $row[$i]['toWho']) && ($now['color'] == $row[$i]['color']) ) {
				$repeat = true;
				break;
			}
		if ($repeat) {
			$id = $now['ID'];
			$sql = "DELETE FROM wishwall_love WHERE ID = $id;";
			mysql_query( $sql, $conn );
			echo "delete success! ID=$id";
		}
		else {
			$row[$j]['content'] = $now['content'];
			$row[$j]['fromWho'] = $now['fromWho'];
			$row[$j]['toWho'] = $now['toWho'];
			$row[$j]['color'] = $now['color'];
			$j = ($j + 1) % 10;
		}
	}
?>
