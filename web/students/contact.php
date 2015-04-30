<?php

date_default_timezone_set('Asia/Calcutta');



// Include extra form fields and/or submitter data?
// false = do not include
$extra = array(
	"form_subject"	=> true,
	"form_cc"		=> true,
	"ip"			=> true,
	"user_agent"	=> true
);

// Process
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
			<input type='text' id='contact-title' class='contact-input' name='title' tabindex='1001' />"
			;
	

	$output .= "
			<label for='contact-text'>*Text:</label>
			<textarea id='contact-text' class='contact-input' name='text' cols='40' rows='4' tabindex='1004'></textarea>
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
	
	include "../connection.php";
	session_start();
	$user=$_SESSION['user'];
	$class=$_SESSION['class'];
	// Send the email
	$title = isset($_POST["title"]) ? $_POST["title"] : "";
	$text = isset($_POST["text"]) ? $_POST["text"] : "";
		
	$date = date('Y-m-d', time());
	$time = date('H:i:s', time());
	
	//TODO: Insert to database
	
	$query = "INSERT INTO posts (posted_by,class,post_title,post_text,time,date) VALUES ('$user','$class','$title','$text','$time','$date')";
	mysql_query($query, $con) or die (mysql_error());
	mysql_close($con);
}


?>
