<?php
$to='ketank90@gmail.com';
	
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

	$headers .= 'To: <ketank90@gmail.com>' . "\r\n";
	$headers .= 'From: <no-reply@mce_network.dcetech.com>' . "\r\n";
	
	$sub='Email Verification';
	
	$Url='http://'.$_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
	
	$get_msg='gg';//md5($username.$name.$dob);
	$verification_link=$Url.'?verify='.$get_msg;
	$msg=	'
	Welcome to MCE-NETWORK\r\n
	Connect with your Friends and Faculty	
	Click on the link for your email verification
	
	'.$verification_link.'
	
	
	Thank You for registering on network
	';
	
	$headers="From:no-reply@mce_network.dcetech.com";

	mail($to,$sub,$msg,$headers);
	echo "hray";
	echo getcwd() . "\n";

	?>