<?php

	session_start();
	
	if(isset($_SESSION['t_user_name']) ) {
		
		header('location: index.php');
		die();
		
	}

?>

<html>

<head>

<title>The Network|MCE</title>

<link rel="stylesheet" type="text/css" href="css/student.css">
<link rel="shortcut icon" href="images/favicon.ico" />
<link href="//fonts.googleapis.com/css?family=Convergence&subset=latin" rel="stylesheet" type="text/css">

</head>

<body>

<center><p id="main_heading">The Network|MCE</p></center>

<div class = "login_box">

<h2 id="heading">Faculty Login</h2>

<form action="action_student.php" method="post">

<table border="0" id="details" cellspacing="2" cellpadding="2">

<tr align="center">
<td>User Name:</td><td> <input type="text" name="t_user_name"></td>
</tr>
<tr align="center">
<td>Password:</td><td> <input type="password" name="password"></td>
</tr>

</table>

<input type="submit" value="Submit" id="button">

</form>

</div>

</body>

</html>