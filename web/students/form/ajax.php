<?php

//sleep(2);
include('../../connection.php');
$i=0;
$users=array();

$query="SELECT t_user_name FROM user_fac";
$result = mysql_query($query);
if($result){
	while($name = mysql_fetch_array($result)){
		$users[$i]=$name['t_user_name'];
		$i++;
	}
}
$query="SELECT s_user_name FROM user_student";
$result = mysql_query($query);

if($result){
	while($name = mysql_fetch_array($result)){
		$users[$i]=$name['s_user_name'];
		$i++;
	}
}

echo json_encode(! in_array($_POST['username'], $users));

exit;
