<?php  
	header("Content-Type:text/html;Charset=UTF-8");
	header("location: index.php");
	date_default_timezone_set('prc');
	$content= Htmlspecialchars($_GET['content']);
	$from 	= Htmlspecialchars($_GET['from']);
	$to 	= Htmlspecialchars($_GET['to']);
	$color 	= $_GET['color'];
	if ($to=='') $to="ta";
	if ($from=='') $from="me";
	if($content!=""){
		$dbhost = 'localhost'; 
		$dbuser = 'root';
		$dbpass = '';  
		$conn = mysql_connect($dbhost, $dbuser,$dbpass);
		mysql_set_charset('utf8',$conn);
		$sql=   "INSERT INTO wishwall_love ".
				"(content,fromWho,toWho,color) ".
			"VALUES ".
			"('$content','$from','$to','$color')"; 

		mysql_select_db('wishwall');

		$result=mysql_query($sql,$conn);  
	}
?>