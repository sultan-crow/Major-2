<?php
session_start();
require_once '../connection.php';
if(!isset($_SESSION['s_user_name']))
{
	header('location:login.php');
}

$user=($_SESSION['s_user_name']);
$query="SELECT * FROM user_student WHERE s_user_name='$user'";
$res=mysql_query($query,$con);
$detail= mysql_fetch_array($res,0);
//echo $detail[0];
?>

<html>
<title>The Network|MCE</title>
<link rel="stylesheet" type="text/css" href="../css/style.css">

<head>
<script type="text/javascript" src="../js/jquery.js"></script>
<script src="..js/style.js" type="text/javascript"></script>

</head>
<body>
<div id="header">
<span id="dp">
<img src="<?php echo $detail[5]?>" title="<?php echo $detail[3]?>" height="100" width="100"/>
</span>
<span id="title">
<h1>Department of Applied Mathematics</h1>
<h4>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Delhi Technological University</h4>
</span>
<span id="logo">
<img src="images/logo.jpg" title="DTU" height="100" width="100"/>
</span>
</div>
<style>

</style>

<div id="content">
<span id="links">
<a href="javascript:void(0);" onclick="myfun(this.id)" id="classroom" class="links">Classroom</a><br>
<a href="javascript:void(0);" onclick="myfun(this.id)" id="classmates" class="links">Classmates</a><br>
<a href="javascript:void(0);" onclick="myfun(this.id)" id="faculty" class="links">Faculty</a><br>
<a href="javascript:void(0);" onclick="myfun(this.id)" id="profile" class="links">Profile</a><br>
<a href="javascript:void(0);" onclick="myfun(this.id)" id="timetable" class="links">Time Table</a><br>
<a href="logout.php"class="links">Logout</a><br>
</span>
<span id="detail"></span>
<div id="_classroom">

</div>

<span id="chat"></span>

</div>
<div id="footer">
<a  href="#" style="padding-right:50px; padding-left:300px;">About Us</a>
<a href="#" style="padding-right:50px; padding-left:50px;">Team</a>
<a href="#" style="padding-right:50px; padding-left:50px;">Contact us</a>
</div>
<script>
$("#detail").load("about.php");
//$("#chat").load("chatbox2");
function myfun(res){
		//$("#popup").css("display","block");

	var result=res +".php";
	$("#detail").load(result);
	
	
}
</script>
</body>


</html>