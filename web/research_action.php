<?php
include('connection.php');
session_start();
$r_id = $_POST['r_id'];
$type= $_POST['type'];
$user = $_SESSION['t_user_name'];

if($pass=$passs){
$query="DELETE FROM research where t_user_name='$user' && r_id='$r_id'";
}
$result=mysql_query($query);
//echo mysql_result($result,0,"link");
?>