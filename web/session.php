<?php
include('connection.php');
if(!isset($_SESSION['t_user_name']))
	echo "Your Session has expired!!!";
	
?>