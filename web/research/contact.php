<?php
// Processe
$action = isset($_POST["action"]) ? $_POST["action"] : "";
if (empty($action)) {
	// Send back the contact form HTML
	$output = "<div style='display:none'>
	<div class='contact-top'></div>
	<div class='contact-content'>
		<div class='contact-loading' style='display:none'></div>
		<div class='contact-message' style='display:none'></div>
		<form action='#' style='display:none' method='POST'>
		
			<label for='contact-name'>*Title:</label>
			<input type='text' id='contact-name' class='contact-input' name='title' tabindex='1001' />
			
			<label for='contact-abstract'>*Abstract:</label>
			<textarea id='contact-abstract' class='contact-input' name='abstract' tabindex='1002' />
			
			<label for='contact-keywords'>*Keywords:</label>
			<input type='text' id='contact-keywords' class='contact-input' name='keyword' tabindex='1003' />
			
			<label for='contact-pdf'>*PDF Upload:</label>
			<input type='file' id='contact-pdf' class='contact-input' name='pdf' tabindex='1004' />";

	

	$output .= "
			<label>&nbsp;</label>
			<button type='submit' class='contact-send contact-button' tabindex='1006'>Send</button>
			<button type='submit' class='contact-cancel contact-button simplemodal-close' tabindex='1007'>Cancel</button>
			<br/>
		</form>
	</div>
</div>";

	echo $output;
}
else if ($action == "send") {
	// Send the email
	$title = isset($_POST["title"]) ? $_POST["title"] : "";
	$abstract = isset($_POST["abstract"]) ? $_POST["abstract"] : "";
	$keyword = isset($_POST["keyword"]) ? $_POST["keyword"] : "";
	$pdf= isset($_POST["pdf"]) ? $_POST["pdf"] : "";
	
	include('../connection.php');
	session_start();
	$user=$_SESSION['t_user_name'];
	$query = "INSERT INTO research(user_name, title, abstract, keyword, link) values('$user', '$title', '$abstract', '$keyword', '$pdf')";
	mysql_query($query)or die(mysql_error());
}

	
?>