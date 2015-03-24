<?php
include('connection.php');

$comment= $_POST['comment'];
$user = $_SESSION['t_user_name'];

date_default_timezone_set('Asia/Calcutta');
	
	$date = date('Y-m-d', time());
	$time = date('H:i:s', time());
	
$query="INSERT INTO posts(comment_id,t_user_name,comment_text,time,date) VALUES ('dd','$user','$comment','$time','$date')";

mysql_query($query);
?>