<?php
date_default_timezone_set('Asia/Calcutta');

$action = isset($_POST["action"]) ? $_POST["action"] : "";
if (empty($action)) {
	// Send back the contact form HTML
	$output = "<div style='display:none'>
	<div class='contact-top'></div>
	<div class='contact-content'>
		<h1 class='contact-title'>Post a new thread:</h1>
		<div class='contact-loading' style='display:none'></div>
		<div class='contact-message' style='display:none'></div>
		<form action='#' style='display:none'>
			<label for='contact-title'>*Title:</label>
			<input type='text' id='contact-title' style='color:#000;' class='contact-input' name='title' tabindex='1001' />
			<label>Year</label>
			<select style='color:#000;' id='contact-year' class='contact-input' name='year' tabindex='1002'>
				<option value=\"1\">First</option>
				<option value=\"2\">Second</option>
				<option value=\"3\">Third</option>
				<option value=\"4\">Fourth</option>
				<option value=\"1234\">All</option>
				<option value=\"5\">Faculty</option>
			</select>"
			;
	

	$output .= "
			<label for='contact-text'>*Text:</label>
			<textarea id='contact-text' style='color:#000;' class='contact-input' name='text' cols='40' rows='4' tabindex='1004'></textarea>
			<br/>";

	

	$output .= "
			<label>&nbsp;</label>
			<button type='submit' class='contact-send contact-button' tabindex='1006'>Send</button>
			<button type='submit' class='contact-cancel contact-button simplemodal-close' tabindex='1007'>Cancel</button>
			<br/>
					</form>
</div>";
	echo $output;
}
else if ($action == "send") {

	include "connection.php";
	session_start();
	$user=$_SESSION['user'];
	// Send the email
	$title = isset($_POST["title"]) ? $_POST["title"] : "";
	$text = isset($_POST["text"]) ? $_POST["text"] : "";
	$class = isset($_POST["year"]) ? $_POST["year"] : "";
		
	$date = date('Y-m-d', time());
	$time = date('H:i:s', time());
	
	//TODO: Insert to database
	
	$query = "INSERT INTO posts (posted_by,class,post_title,post_text,time,date) VALUES ('$user','$class','$title','$text','$time','$date')";
	$res=mysql_query($query, $con) or die (mysql_error());
	if($res){
		require_once('../../android/gcm.php');

		$gcm_ids = array();

		if($year == "5")
		$query = "SELECT gcm_id FROM user_fac WHERE t_user_name <> '$username' AND gcm_id <> ''";
		else if($year == "12345")
		$query = "SELECT gcm_id FROM user_student WHERE gcm_id <> ''";
		else
		$query = "SELECT gcm_id FROM user_student WHERE s_user_name <> '$username' AND class = '$year' AND gcm_id <> ''";

		$result = mysql_query($query);

		for($i = 0; $i < mysql_num_rows($result); $i++)
		$gcm_ids[] = mysql_result($result, $i, "gcm_id");

		$message = array("tag" => "post", "content" => $title);

		$pushStatus = sendPushNotificationToGCM($gcm_ids, $message);
			}
	mysql_close($con);
}


?>
