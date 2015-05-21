<?php
	include '../web/connection.php';
	
	if(!isset($_POST['tag']) || $_POST['tag'] != "login") {
	
		die("Access Denied");
	
	}
	
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	
	$query = "SELECT name, t_user_name FROM user_fac WHERE (email = '$email' OR t_user_name = '$email') AND password = '$password'";
	$result = mysql_query($query, $con) or die(mysql_error());
	
	$num_rows = mysql_num_rows($result);
	
	$name = mysql_result($result, 0, "name");
	$username = mysql_result($result, 0, "t_user_name");
	
	if($num_rows > 0) {
	
		echo $name.','.$username;
	
	} else {
		
		echo '#false';
		
	}
	
	mysql_close($con);
?>