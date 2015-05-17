<?php

	session_start();
	include('../connection.php');

	$sender = $_GET['id'];
	$receiver = $_SESSION['user'];
	
	$query = "SELECT * FROM messages WHERE sent_by IN ('$sender', '$receiver') AND received_by IN ('$sender', '$receiver') ORDER BY message_id ASC";
	$result = mysql_query($query, $con) or die(mysql_error());
	
	
	while($extract = mysql_fetch_array($result)) {
				//echo "<br/>";
			$user=$extract['sent_by'];
			$res=mysql_query("SELECT name FROM user_student WHERE s_user_name = '$user'");
			$name = mysql_result($res,0,"name");
			if($user==$_SESSION['user']){
					echo "<div class=\"sender\"><span class=\"uname\">" . explode(" ", $name)[0]. ":</span> <span class=\"msg\">" . $extract['message'] . "</span></div>";

			}
			else{
					echo "<div class=\"receiver\"><span class=\"uname\">" . explode(" ", $name)[0]. ":</span> <span class=\"msg\">" . $extract['message'] . "</span></div>";
			}
	}
	
?>
<html>
<head>
<style>
.sender{
	text-align:left;
	padding:1px;
	display:block;
}

.receiver{
	text-align:right;
	padding:1px;

}
</style>
</head>
</html>