<?php
include('../connection.php');
	
	$query = "SELECT * FROM messages ORDER BY message_id DESC";
	$result = mysql_query($query, $con);
	
	while($extract = mysql_fetch_array($result)) {
		echo "<span class=\"uname\">" . $extract['sent_by'] . ":</span> <span class=\"msg\">" . $extract['message'] . "</span><br/>";
	}
	
?>