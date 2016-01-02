<!DOCTYPE html>
<html>
<head>
	<title>delete</title>
	<style type="text/css">
		#sure {
			font-size: 5em;
		}
	</style>
</head>
<body>
<center id='sure'>


<?php 
	include_once 'MySQLAccount.php';
	if(isset($_GET['key'])){
		$key= Htmlspecialchars($_GET['key']);
	}
	if(isset($_GET['id'])){
		$id= Htmlspecialchars($_GET['id']);
	}
	if(isset($_GET['sure'])){
		$sure= Htmlspecialchars($_GET['sure']);
	}

	$id = mysql_real_escape_string($id);

	if (!empty($sure)) {
		if ($key=="qwerpoiuasdf;lkj") {
			$sql = "DELETE FROM wishwall_love WHERE ID=$id;";
			$result = mysql_query( $sql, $conn );
			header('Location: index_delete.php?key=qwerpoiuasdf;lkj');
		}
		else{
			echo "Please carry the right key!!";
		}
	}
	else {
		echo "<a href='".'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'].'&sure=1'."'>Click to delete!</a>";
	}

?>



</center>
</body>
</html>