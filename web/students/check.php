<?php
include('../connection.php');
$username="ketan";
$password="kumar";
$query="SELECT * FROM user_student WHERE s_user_name='$username' and password='$password'";
$user=mysql_query($query)or die(mysql_error());
$count=mysql_num_rows($user);
	echo $count;
	?>