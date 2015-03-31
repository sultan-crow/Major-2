<?php
session_start();
if(isset($_SESSION['t_user_name'])){
$user=$_SESSION['t_user_name'];
}else

if(isset($_SESSION['s_user_name'])){
$user=$_SESSION['s_user_name'];

}
else {
	header('location:../logout.php');
}

include('../connection.php');
$query="SELECT * FROM posts WHERE  class='3'";
$result=mysql_query($query,$con)or  die('Could not connect: ' . mysql_error());
;

$count=mysql_num_rows($result);
for($i=0;$i<$count;$i++){?>
	<div id="ccc"><?php
	echo mysql_result($result,$i,4);
	echo mysql_result($result,$i,5);
	echo mysql_result($result,$i,6);
	?></div><?php
}
?>
