<?php  
	header("Content-Type:text/html;Charset=UTF-8");
	date_default_timezone_set('prc');
	$searchbox=$_GET['searchbox'];
	$page=$_GET['pageN'];
	if($searchbox!=""){
		// $dbhost = 'localhost'; 
		// $dbuser = 'root';    
		// $dbpass = 'MyHair';  
		$dbhost = 'qdm116724331.my3w.com'; 
		$dbuser = 'qdm116724331';   
		$dbpass = 'WWyyx5734';  
		$conn = mysql_connect($dbhost, $dbuser,$dbpass);
		mysql_set_charset('utf8',$conn);
		$searchbox=mysql_real_escape_string($searchbox);
		$sql = "SELECT toWho, fromWho, content, time, color
				FROM wishwall_love
				WHERE toWho=('$searchbox') OR fromWho=('$searchbox')";
		// mysql_select_db('wishwall');
		mysql_select_db('qdm116724331_db');
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