<?php
session_start();
include('connection.php');
$user=$_SESSION['user'];
$text=$_POST['text'];
$id=$_POST['id'];
date_default_timezone_set('Asia/Calcutta');
	
	$date = date('Y-m-d', time());
	$time = date('H:i:s', time());
	
$query="INSERT INTO comments (post_id,user_id,comments,date,time) VALUES('$id','$user','$text','$date','$time')";
echo mysql_query($query)or die (mysql_error());
?>