<?php 
	$dbhost = 'localhost';
	$dbuser = 'root';
	$dbpass = 'MyHair';
	$conn = mysql_connect($dbhost, $dbuser,$dbpass);
	mysql_select_db('wishwall');
	mysql_set_charset('utf8',$conn);
?>