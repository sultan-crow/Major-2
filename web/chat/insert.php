<?php
	session_start();
	if(isset($_SESSION['s_user_name'])){//if student is logged in
	$sent_by=$_SESSION['s_user_name'];
	}
	if(isset($_SESSION['t_user_name'])){//if teacher is logged in
	$sent_by=$_SESSION['t_user_name'];
	}
	else {
		//header('location:../students/login.php');//if no one is logged in
	}
	
	$uname = $_REQUEST['receiver'];
	$msg = $_REQUEST['message'];
	$msg_clean = filter_string($msg);
	
	include('../connection.php');
	date_default_timezone_set('Asia/Calcutta');
	
	$date = date('Y-m-d', time());
	$time = date('H:i:s', time());
	
	
	function filter_string($str) {
		$str = str_replace("'", "\\'", $str);
		return preg_replace('/\s+/', ' ', $str);
}
	
	
	$query = "INSERT INTO messages (sent_by, received_by ,message, time, date, read_) VALUES ('$sent_by','$uname', '$msg_clean','$time','$date', '0')";
	mysql_query($query, $con) or die(mysql_error());

	require_once('../../android/gcm.php');

	$gcm_ids = array();

	$query = "SELECT * FROM messages WHERE sent_by IN ('$sent_by', '$uname') AND received_by IN ('$uname', '$sent_by') ORDER BY message_id ASC";
	$result = mysql_query($query, $con) or die(mysql_error());
	
	while($extract = mysql_fetch_array($result)) {
		$user=$extract['sent_by'];
		$res=mysql_query("SELECT name FROM user_student WHERE s_user_name = '$user'");
		if(mysql_num_rows($res)==0){
				$res=mysql_query("SELECT name FROM user_fac WHERE t_user_name='$user'" );
		}

		$name = mysql_result($res,0,"name");

		if($user==$_SESSION['user']){
					echo "<div class=\"sender\"><span class=\"uname\">" .  $name. ":</span> <span class=\"msg\">" . $extract['message'] . "</span></div>";

			}
			else{
					echo "<div class=\"receiver\"><span class=\"uname\">" .$name. ":</span> <span class=\"msg\">" . $extract['message'] . "</span></div>";
			}
	}

	$query = "SELECT gcm_id FROM user_student WHERE s_user_name = '$uname' AND gcm_id <> ''";
	$result = mysql_query($query);

	if(mysql_num_rows($result) > 0) {
		for($i = 0; $i < mysql_num_rows($result); $i++)
			$gcm_ids[] = mysql_result($result, $i, "gcm_id");

		$message = array("tag" => "message", "content" => $msg, "name" => $name, "sender" => $sent_by, "date" => $date, "time" => $time);

		$pushStatus = sendPushNotificationToGCM($gcm_ids, $message);
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