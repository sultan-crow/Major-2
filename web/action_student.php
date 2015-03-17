<?php

	session_start();
	
	include "connection.php";
	
	$user_name = $_POST['t_user_name'];
	$password = ($_POST['password']);
	
	$query = "SELECT * FROM user_fac WHERE t_user_name = '$user_name' AND Password = '$password'";
	$result = mysql_query($query, $con) or die(mysql_error());
	$num_rows = mysql_num_rows($result);
	
	mysql_close($con);
	
	if($num_rows == 1) {
	
		$_SESSION['t_user_name'] = $user_name;
		$_SESSION['year'] = mysql_result($result, 0, "Year");
		$_SESSION['role'] = "student";
		
		header('location:index.php');
	
	} else {
	
		session_destroy();
		echo "Invalid Email/Password.";
	
	}
	
	

?>