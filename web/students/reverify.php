<?php
$email=$_GET['id'];
session_start();
$user=$_SESSION['s_user_name'];
$usernamemd5=md5($user);
include('../connection.php');
mysql_query("UPDATE user_student SET verified='$usernamemd5' WHERE s_user_name='$user'")or die (mysql_query());
$usernamemd5=md5($user);
$to=$email;
	
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

	$headers .= 'To: <'.$email.'>' . "\r\n";
	$headers .= 'From: <no-reply@mce.dcetech.com>' . "\r\n";
	
	$sub='Email Verification';
	
	$Url='http://'.$_SERVER['HTTP_HOST'] ;//. $_SERVER['REQUEST_URI'];
	
	$get_msg=md5($username.$name.$dob);
	$verification_link=$Url.'/sagnik/social_network/web/students/verifymail.php?tempcode='.$usernamemd5;
	$msg=	'Welcome to MCE-NETWORK
	Connect with your Friends and Faculty	
	Click on the link for your email verification
	Your user-id is :'.$user.'
	Your password is :**********'."\n\n"
	
	.$verification_link."\n".'

Thank You for registering on network.';
	
	$headers="From:no-reply@mce.dcetech.com";

	mail($to,$sub,$msg,$headers);
	
//
header('location:login.php');
	
?>