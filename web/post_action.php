<?php
session_start();

include('connection.php');
session_start();
$post= $_POST['comment'];
$class="2";// $_POST['comment'];
$title= "3";//$_POST['comment'];

$user = $_SESSION['t_user_name'];

date_default_timezone_set('Asia/Calcutta');
	
	$date = date('Y-m-d', time());
	$time = date('H:i:s', time());
	
$query="INSERT INTO posts(post_id,t_user_name,class,post_title,post_text,time,date) VALUES ('dd','$user','$class','$title','$post','$time','$date')";

mysql_query($query);
?>