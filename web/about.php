<?php
session_start();
require_once 'connection.php';
if(!isset($_SESSION['t_user_name']))
{
	header('location:login.php');
}

require_once('connection.php');
//$user=$list["user"];
$user=($_SESSION['t_user_name']);
$query="SELECT * FROM user_fac WHERE t_user_name='$user'";
$res=mysql_query($query,$con)or  die('Could not connect: ' . mysql_error());;
$detail= mysql_fetch_array($res,0);
//echo $detail[0];
?>
<html>
<body>
<table>
<tr>
<td>Name: </td>
<td><?php
echo $detail[3];
?></td>
</tr>
<tr>
<td>Designation :</td>
<td><?php
echo $detail[6];
?></td>
</tr>
<tr>
<td>Gender:</td>
<td><?php
echo $detail[4]=='m'?"Male":"Female";
?></td>
</tr>
<tr>
<td>Qualification:</td>
<td><?php
echo $detail[7];
?></td>
</tr><tr>
<td>Date of Birth:</td>
<td><?php
echo $detail[8];
?></td>
</tr><tr>
<td>Email :</td>
<td><?php
echo $detail[9];
?></td>
</tr>
</table>
</span>
</body>
</html>	