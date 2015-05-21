<?php
	include '../web/connection.php';
	
	$subject = $_POST['title'];
	$message = $_POST['message'];
	$posted_by = $_POST['admin'];
	$year_temp = $_POST['year'];
	
	if($year_temp[0] == "1")
		$year = 1;
	else if($year_temp[0] == "2")
		$year = 2;
	else if($year_temp[0] == "3")
		$year = 3;
	else if($year_temp[0] == "4")
		$year = 4;
	else if($year_temp == "Faculty")
		$year = 5;
	else
		$year = 12345;
		
	date_default_timezone_set('Asia/Calcutta');
	
	$date = date('Y-m-d', time());
	$time = date('H:i:s', time());
	
	$query = "INSERT INTO posts (posted_by, class, post_title, post_text, date, time) VALUES ('$posted_by', '$year', '$subject', '$message', '$date', '$time')";
	mysql_query($query, $con) or die(mysql_error());
	
	if($year == "12345")		
		$query = "SELECT gcm_id FROM user_student WHERE gcm_id IS NOT NULL";
	else if($year == "5")
		$query = "SELECT gcm_id FROM user_fac WHERE t_user_name <> '$posted_by' AND gcm_id <> ''";
	else	
		$query = "SELECT gcm_id FROM user_student WHERE class = '$year' AND gcm_id IS NOT NULL";
		
	$result = mysql_query($query, $con);
	
	require_once('../android/gcm.php');
	
	$gcm_ids = array();
	
	for($i = 0; $i < mysql_num_rows($result); $i++) {
	
		$gcm_ids[] = mysql_result($result, $i, "gcm_id");
	
	}
	
	$message = array("tag" => "post", "content" => $subject);	
	
	$pushStatus = sendPushNotificationToGCM($gcm_ids, $message);
	
	mysql_close($con);
	
	if ($result) {
		echo "Your notice has been posted successfully.".mysql_error();
	}
	else {
		echo "Unfortunately, your notice could not be posted.";
	}
	
?>