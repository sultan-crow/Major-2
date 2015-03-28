<?php

	$uname = $_REQUEST['uname'];
	$msg = $_REQUEST['msg'];

	$con = mysql_connect('localhost', 'root', '') or die(mysql_error());
	mysql_select_db('chatbox', $con);
	
	$query = "INSERT INTO logs (`username`, `msg`) VALUES ('$uname', '$msg')";
	mysql_query($query, $con) or die(mysql_error());
	
	$query = "SELECT * FROM logs ORDER BY id DESC";
	$result = mysql_query($query, $con);
	
	while($extract = mysql_fetch_array($result)) {
		echo "<span class=\"uname\">" . $extract['username'] . ":</span> <span class=\"msg\">" . $extract['msg'] . "</span><br/>";
	}
	
?>