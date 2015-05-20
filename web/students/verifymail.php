<?php 
$token=$_GET['tempcode'];
include('../connection.php');
$res=mysql_query("UPDATE user_student SET verified='1' WHERE verified='$token'")or die(mysql_error());
if($res){
	echo "Mail verified...!!
	Please wait while we redirect you to our website....";
	
	
	
}
else echo "Couldn't verify..!!
Please wait while we redirect you to our website....";
	
?>
<html>
<head>

</head>
<body>
<script type="text/javascript" src="../js/jquery.js"></script>
<script>
$(document).ready(function(){
	console.log("kk");
	setTimeout(function(){
		console.log("kk");

		window.location.href="http://dcetech.com/sagnik/social_network/web/students";
},2000);
	
	
});
</script>
<a href="http://dcetech.com/sagnik/social_network/web/students/">Click here<a>
</body>
</html>