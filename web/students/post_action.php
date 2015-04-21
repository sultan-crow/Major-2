<?php

include('../connection.php');
$posted_by= $_POST['posted_by'];
$class=$_POST['class'];
$post_title= $_POST['post_title'];
$post_text= $_POST['post_text'];


date_default_timezone_set('Asia/Calcutta');
	
	$date = date('Y-m-d', time());
	$time = date('H:i:s', time());
	
$query="INSERT INTO posts(posted_by,class,post_title,post_text,time,date) VALUES ('$posted_by','$class','$post_title','$post_text','$time','$date')";

echo mysql_query($query)or  die('Could not connect: ' . mysql_error());;
?>