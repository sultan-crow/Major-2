<?php

//sleep(2);
include('../../connection.php');
$query="SELECT s_user_name FROM user_student";
$result = mysql_query($query);
$users=array();
if($result){
	while($name = mysql_fetch_array($result)){
		$users[]=$name['s_user_name'];
	}
}
echo json_encode(! in_array($_POST['username'], $users));

exit;
