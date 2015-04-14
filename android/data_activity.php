<?php

	include "../web/connection.php";
	
	$tag = $_POST['tag'];	
	$response = array('tag' => $tag, 'success' => 0, 'error' => 0);
	$error = 0;
	
	if($tag == "profile") {
		
		$role = $_POST['role'];
		$email = $_POST['email'];
		
		if($role == 0) {
			
			$year = $_POST['year'];
			
			$query = "SELECT * FROM user_student WHERE email='$email' AND year='$year'";
			$result = mysql_query($query, $con) or die(mysql_error());
			
			if(mysql_num_rows($result) == 1) {
			
				$response['success'] = 1;
				$response['user']['name'] = mysql_result($result, 0, "name");
				$response['user']['gender'] = mysql_result($result, 0, "sex");
				$response['user']['email'] = mysql_result($result, 0, "email");
				$response['user']['dob'] = mysql_result($result, 0, "dob");
				$response['user']['picture'] = mysql_result($result, 0, "pic");
				$response['user']['year'] = $year;
			
			} else 
				$error = 1;
			
		} else {
			
			$query = "SELECT * FROM user_fac WHERE email='$email'";
			$result = mysql_query($query, $con);
			
			if(mysql_num_rows($result) == 1) {
				
				$response['success'] = 1;
				$response['user']['name'] = mysql_result($result, 0, "name");
				$response['user']['gender'] = mysql_result($result, 0, "sex");
				$response['user']['dob'] = mysql_result($result, 0, "dob");
				$response['user']['email'] = mysql_result($result, 0, "email");
				$response['user']['picture'] = mysql_result($result, 0, "pic");
				$response['user']['designation'] = mysql_result($result, 0, "designation");
				$response['user']['qualification'] = mysql_result($result, 0, "qualification");
			
			} else 
				$error == 1;
			
		}
		
	} else if($tag == "faculty") {
		
		
		
	} else if($tag == "students") {
		
		
		
	} else if($tag == "research") {
		
		
		
	} else if($tag == "posts") {
		
		
		
	} else {
		
		die("Access Denied");
		
	}
	
	if($error == 1) {
		
		$response['error'] = 1;
		$response['error_message'] = "Invalid Email or Password";
		
	}
	
	echo json_encode($response);

?>