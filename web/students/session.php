<?php
include('../connection.php');
if(!isset($_SESSION['s_user_name']))
	echo "Your Session has expired!!!";
	
?>