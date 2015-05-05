<?php

	session_start();
	
	if(isset($_SESSION['s_user_name']) ) {
		
		header('location: index.php');
		die();
		
	}

?>

<html>

<head>

<title>The Network|MCE</title>

<link rel="stylesheet" type="text/css" href="../css/student.css">
<link rel="shortcut icon" href="images/favicon.ico" />
<link href="//fonts.googleapis.com/css?family=Convergence&subset=latin" rel="stylesheet" type="text/css">
<script type="text/javascript" src="../js/jquery.js"></script>

</head>

<body>
<div id="fb-root"></div>
<script>/*
      window.fbAsyncInit = function() {
        FB.init({
          appId      : '1035140129833047',
          xfbml      : true,
          version    : 'v2.3'
        });
      };

      (function(d, s, id){
         var js, fjs = d.getElementsByTagName(s)[0];
         if (d.getElementById(id)) {return;}
         js = d.createElement(s); js.id = id;
         js.src = "//connect.facebook.net/en_US/sdk.js";
         fjs.parentNode.insertBefore(js, fjs);
       }(document, 'script', 'facebook-jssdk'));*/
    </script>
	
	<script src="../js/md5.js">//Script file for password hashing</script>

<script>
function login(){
	var username=$('#username').val();
	var password=$('#password').val();
	password=hex_md5(password);
	$.ajax({
		url:'action_student.php',
		type:'post',
		data:'s_user_name='+username+'&password='+password,
		success:function(e){
			if(e=="Success"){
				location.reload();
			}else
			alert(e);
		}
	});
	
}
</script>
<center><p id="main_heading">The Network|MCE</p></center>

<div class = "login_box">

<h2 id="heading">Students Login</h2>

<form>

<table border="0" id="details" cellspacing="2" cellpadding="2">

<tr align="center">
<td>User Name:</td><td> <input type="text" name="s_user_name" id="username"></td>
</tr>
<tr align="center">
<td>Password:</td><td> <input type="password" name="password" id="password"></td>
</tr>

</table>

<input type="submit" value="Submit" id="button" onclick="login()">
</form>
<div class="sign-up">
<a href="form">Register</a>
</div>
</div>
  
</body>

</html>