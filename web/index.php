<?php
require_once 'connection.php';


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
	width:150px;
	
}
#detail{
	margin-left:300px;
	margin-top:200px;
	width:500px;
	height:400px;
	
}
#links{
	float:left;
	margin-top:100px;
	
}
#dp{
	
	width:80px;
	height:50px;
}
</style>
<body>
<div id="header">
<span id="dp">
<img src="<?php echo $detail[6]?>" alt="<?php echo $detail[4]?>" ></span>
<span id="logo"></span>
</div>

<div id="content">
<span id="links">
<a href="#">About</a><br>
<a href="#">Research</a><br>
<a href="#">Posts</a><br>
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
</div>
</body>

</html>