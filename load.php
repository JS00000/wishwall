<?php
  header("Content-Type:text/html;Charset=UTF-8");
  $pageN=$_GET['pageN'];
  // $dbhost = 'localhost'; 
  // $dbuser = 'root';   
  // $dbpass = 'MyHair';  
    $dbhost = 'qdm116724331.my3w.com'; 
    $dbuser = 'qdm116724331';   
    $dbpass = 'WWyyx5734';  
  $conn = mysql_connect($dbhost, $dbuser,$dbpass);
  mysql_set_charset('utf8',$conn);
if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}
$num = $pageN*34 ;
$sql = 'SELECT fromWho, toWho, content, time, color
        FROM wishwall_love
        order by ID desc limit '.$num.',34';
    // mysql_select_db('wishwall');
    mysql_select_db('qdm116724331_db');
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
      }else {
        $text = $text . ',{';
      }
      $text = $text . '"fromWho":"From : ' . $row['fromWho']
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
