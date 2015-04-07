<?php  
	header("Content-Type:text/html;Charset=UTF-8");
	date_default_timezone_set('prc');
	// $name=mysql_real_escape_string($_GET['name']); 
	$name=Htmlspecialchars($_GET['name']);
	$page=$_GET['page']; 
    header("location: index.php?pageN=".$page);
	$choose=$_GET['choose']; 
	// $color=$_GET['color']; 
	if ($name=='') $name="Space";
	// $content=mysql_real_escape_string($_GET['content']);
	$content=Htmlspecialchars($_GET['content']);
	if($content!=""){
		$dbhost = 'localhost'; 
		$dbuser = 'root';    
		$dbpass = 'MyHair';  
		$conn = mysql_connect($dbhost, $dbuser,$dbpass);
		mysql_set_charset('utf8',$conn);
        $sql=   "INSERT INTO wishwall ".
                "(content,name,page,choose) ".
                "VALUES ".
                "('$content','$name','$page','$choose')"; 
        mysql_select_db('wishwall');
		// mysql_select_db('qdm116724331_db');
        $result=mysql_query($sql,$conn);  
        // if(!$result)  
        // {  
            // echo"不小心失败拉";  
            // echo"<a href='index.php'>返回</a>";  
        // }; 
    }
?>
