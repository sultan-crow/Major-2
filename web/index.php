<?php
session_start();
require_once 'connection.php';
if(!isset($_SESSION['t_user_name']))
{
	header('location:login.php');
}

require_once('connection.php');
//$user=$list["user"];
$user='rsrivastava';
$query="SELECT * FROM user_fac WHERE t_user_name='$user'";
$res=mysql_query($query,$con);
$detail= mysql_fetch_array($res,0);
//echo $detail[0];
?>

<html>
<title>The Network|MCE</title>
<style>
#header{
	margin-top:0px;
	height:100px;
	background:#fffccc;

	
}
#detail{
	
	
	background-color: #E4E2E2;
	border: solid 3px #aba;
	box-shadow: 0px 0px 50px #888888;
	display:block;
	margin-left: 15%;
	margin-top: 2%;
	width: 800px;
	height: 400px;
	padding: 20px;
	position:absolute;
	
}
#links{
	float:left;
	background-color: #E00002;
	border: solid 3px #aba;
	box-shadow: 0px 0px 50px #888888;
	display:block;
	margin-left: 1%;
	margin-top: 2%;
	width: 600px;
	height: 400px;
	padding: 20px;
	
}
#dp{
	
	
	margin-left:20px;
}
#title{
	
	position:absolute;
	margin-left:250px;
	
}
#logo{
	
	float:right;
	}
	
#footer{
	clear: both;
    position: relative;
    z-index: 10;
    height: 3em;
    margin-top: -3em;
	background-color:red;
	}
	a{
		color:666666;
		
	}
	a:link {
    text-decoration: none;
}

a:visited {
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
}

a:active {
    text-decoration: underline;
}
body{
	background:#CCCCB2;
	
}

</style>
<body>
<div id="header">
<span id="dp">
<img src="<?php echo $detail[6]?>" title="<?php echo $detail[4]?>" height="100" width="100"/>
</span>
<span id="title">
<h1>Department of Applied Mathematics</h1>
<h4>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Delhi Technological University</h4>
</span>
<span id="logo">
<img src="images/logo.jpg" title="DTU" height="100" width="100"/>
</span>
</div>


<div id="content">
<span id="links">
<a href="#">About</a><br>
<a href="#">Research</a><br>
<a href="#">Posts</a><br>
<a href="logout.php">Logout</a><br>
</span>
<span id="detail">
<table>
<tr>
<td>Name: </td>
<td><?php
echo $detail[4];
?></td>
</tr>
<tr>
<td>Designation :</td>
<td><?php
echo $detail[7];
?></td>
</tr>
<tr>
<td>Sex:</td>
<td><?php
echo $detail[5];
?></td>
</tr>
<tr>
<td>Qualification:</td>
<td><?php
echo $detail[8];
?></td>
</tr><tr>
<td>Date of Birth:</td>
<td><?php
echo $detail[9];
?></td>
</tr><tr>
<td>Email :</td>
<td><?php
echo $detail[10];
?></td>
</tr>
</table>
</span>
</div>
<div id="footer">
<a  href="#" style="padding-right:50px; padding-left:300px;">About Us</a>
<a href="#" style="padding-right:50px; padding-left:50px;">Team</a>
<a href="#" style="padding-right:50px; padding-left:50px;">Contact us</a>
</div>


</body>

</html>