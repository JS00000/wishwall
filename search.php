<?php  
	header("Content-Type:text/html;Charset=UTF-8");
	date_default_timezone_set('prc');
	$searchbox = $_GET['searchbox'];
	if($searchbox!=""){		
		require("MySQLAccount.php");
		$searchbox=mysql_real_escape_string($_GET['searchbox']);
		$page=mysql_real_escape_string($_GET['pageN']);
		$sql = "SELECT toWho,fromWho,content,time,color FROM wishwall_love WHERE toWho='$searchbox';";
		$retval=mysql_query($sql,$conn);  
		if(!$retval ){
			die('Could not get data: ' . mysql_error());
		}
		$text = '{page:[';
		$i=35;
		$j=1;
		$maxpage=0;

		while($row = mysql_fetch_assoc($retval)){
			$i-=1;
			if ($i==0) {
				$i=34;
				$maxpage+=1;
			}
			if ($page==$maxpage) {
			if ($j==1) {
				$text = $text . '{';
				$j=0;
			}else {
				$text = $text . ',{';
			}
			$text = $text	. '"toWho":"To : ' . $row['toWho']
							. '","fromWho":"From : ' . $row['fromWho']
							. '","content":"' . $row['content']
							. '","time":"' . $row['time']
							. '","page":"' . $maxpage
							// . '","choose":"' . $i
							. '","color":"' . $row['color']
							.  '"}';
			}
		}
		if ($maxpage>46) $maxpage=46;
		$text = $text . '],'.'maxpage:'.$maxpage.'}';
		echo $text;
	}
?>