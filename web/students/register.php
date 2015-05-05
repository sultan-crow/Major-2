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
mysql_query($query)or die(mysql_error());
$user=mysql_query("SELECT * FROM user_student WHERE s_user_name='$username' and password='$password'")or die(mysql_error());
	if(mysql_num_rows( $user)==1){
	session_start();
	$_SESSION['s_user_name']=$username;
	$_SESSION['class']=$year;
	echo "Logged in";
	}
	else echo "failed"
?>