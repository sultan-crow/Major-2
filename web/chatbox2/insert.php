<?php
	session_start();
	if(isset($_SESSION['s_user_name'])){//if student i logged in
	$sent_by=$_SESSION['s_user_name'];
	}
	if(isset($_SESSION['t_user_name'])){//if teacher is logged in
	$sent_by=$_SESSION['t_user_name'];
	}
	else {
		header('location:login.php');//if no one is logged in
	}
	$uname = $_REQUEST['receiver'];
	$msg = $_REQUEST['message'];

	include('../connections.php');
	date_default_timezone_set('Asia/Calcutta');
	
	$date = date('Y-m-d', time());
	$time = date('H:i:s', time());
	$query = "INSERT INTO messages ('sent_by','received_by' ,'message','time','date') VALUES ('$sent_by','$uname', '$msg','$time','$date')";
	mysql_query($query, $con) or die(mysql_error());
	
	$query = "SELECT * FROM logs ORDER BY id DESC";
	/*$result = mysql_query($query, $con);
	
	while($extract = mysql_fetch_array($result)) {
		echo "<span class=\"uname\">" . $extract['username'] . ":</span> <span class=\"msg\">" . $extract['msg'] . "</span><br/>";
	}
	*/
?>