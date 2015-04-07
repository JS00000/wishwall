<?php
  header("Content-Type:text/html;Charset=UTF-8");
  $pageN=$_GET['pageN'];
  $dbhost = 'localhost'; 
  $dbuser = 'root';   
  $dbpass = 'MyHair';  
    // $dbhost = 'qdm116724331.my3w.com'; 
    // $dbuser = 'qdm116724331';   
    // $dbpass = 'WWyyx5734';  
  $conn = mysql_connect($dbhost, $dbuser,$dbpass);
  mysql_set_charset('utf8',$conn);
if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}
$sql = 'SELECT name, content, time, page, choose
        FROM wishwall';
    mysql_select_db('wishwall');
    // mysql_select_db('qdm116724331_db');
    $retval = mysql_query( $sql, $conn );
    if(! $retval ){
      die('Could not get data: ' . mysql_error());
    }
    $text = '{page:[';
    $j=1;
    $maxpage=0;
    while($row = mysql_fetch_assoc($retval)){
      if ($row['page']>$maxpage) $maxpage=$row['page'];
      if ($row['page']!=$pageN) continue;
      if ($j==1) {
        $text = $text . '{';
        $j=0;
      }else {
        $text = $text . ',{';
      }
      $text = $text . '"name":"' . $row['name']
              . '","content":"' . $row['content']
              . '","time":"' . $row['time']
              . '","page":"' . $row['page']
              . '","choose":"' . $row['choose'] 
              // . '","color":"' . $row['color'] 
              .  '"}';
    }
    if ($maxpage>46) $maxpage=46;
    $text = $text . '],'.'maxpage:'.$maxpage.'}';
    echo $text;
?>
