<?php
	header("Content-Type:text/html;Charset=UTF-8");
	if(isset($_GET['pageN']))
		$pageN=mysql_real_escape_string($_GET['pageN']);
	$dbhost = 'localhost'; 
	$dbuser = 'root';
	$dbpass = '';
	$conn = mysql_connect($dbhost, $dbuser,$dbpass);
	mysql_set_charset('utf8',$conn);
	if(!$conn){
		die('Could not connect: ' . mysql_error());
	}
	$num = $pageN*34 ;
	$sql = "SELECT fromWho, toWho, content, time, color FROM wishwall_love ORDER BY ID DESC LIMIT $num,34;";
	mysql_select_db('wishwall');
	
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
		$text = $text	.'"fromWho":"From : ' . $row['fromWho']
						. '","toWho":"To : ' . $row['toWho']
						. '","content":"' . $row['content']
						. '","time":"' . $row['time']
						// . '","page":"' . $row['page']
						// . '","choose":"' . $row['choose'] 
						. '","color":"' . $row['color'] 
						.  '"}';
	}
	$text = $text . ']}';
	echo $text;
?>