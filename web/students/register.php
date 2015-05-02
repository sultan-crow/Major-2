<?php
include('../connection.php');
	$name=$_POST['name'];
	$username=$_POST['username'];
	$password=$_POST['password'];
	$gender=$_POST['gender'];
	$dob=$_POST['dob'];
	$year=$_POST['year'];
	$email=$_POST['email'];
	$group=$_POST['group'];
	$pic=$_POST['pic'];
$query="INSERT INTO user_student(s_user_name,password,name,sex,pic,class,dob,email,group_) VALUES ('$username','$password','$name','$gender','$pic','$year','$dob','$email','$group')";
	 echo mysql_query($query)or die(mysql_error());
?>