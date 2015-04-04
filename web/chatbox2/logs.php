<?php
include('connections.php');
	
	$query = "SELECT * FROM logs ORDER BY id DESC";
	$result = mysql_query($query, $con);
	
	while($extract = mysql_fetch_array($result)) {
		echo "<span class=\"uname\">" . $extract['username'] . ":</span> <span class=\"msg\">" . $extract['msg'] . "</span><br/>";
	}
	
?>