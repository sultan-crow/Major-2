<?php

	session_start();
	
	include "connection.php";
	
	$user_name = $_POST['t_user_name'];
	$user_name = mysql_real_escape_string($user_name);
	$password = ($_POST['password']);
	$password = mysql_real_escape_string($password);
	
	$query = "SELECT * FROM user_fac WHERE t_user_name = '$user_name' AND Password = '$password'";
	$result = mysql_query($query, $con) or die(mysql_error());
	$num_rows = mysql_num_rows($result);
	
	mysql_close($con);
	
	if($num_rows == 1) {
	
		$_SESSION['t_user_name'] = $user_name;
		$_SESSION['user'] = $user_name;
		
		
		header('location:index.php');
	
	} else {
	
		session_destroy();
		echo "Invalid Email/Password.";
	
	}
	
	

?>