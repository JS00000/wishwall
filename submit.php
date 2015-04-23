<?php  
	header("Content-Type:text/html;Charset=UTF-8");
    header("location: index.php");
	date_default_timezone_set('prc');
	$content= Htmlspecialchars($_GET['content']);
	$from 	= Htmlspecialchars($_GET['from']);
	$to 	= Htmlspecialchars($_GET['to']);
	$color 	= $_GET['color'];
	if ($from=='') $from="Space";
	if($content!=""){
		// $dbhost = 'localhost'; 
		// $dbuser = 'root';    
		// $dbpass = 'MyHair';  
		$dbhost = 'qdm116724331.my3w.com'; 
		$dbuser = 'qdm116724331';   
		$dbpass = 'WWyyx5734';  
		$conn = mysql_connect($dbhost, $dbuser,$dbpass);
		mysql_set_charset('utf8',$conn);
        $sql=   "INSERT INTO wishwall_love ".
                "(content,fromWho,toWho,color) ".
                "VALUES ".
                "('$content','$from','$to','$color')"; 
        // mysql_select_db('wishwall');
		mysql_select_db('qdm116724331_db');
        $result=mysql_query($sql,$conn);  
    }
?>