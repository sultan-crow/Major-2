<?php
	
	if(!isset($_POST['tag']) || $_POST['tag'] == '') {
		die("Access Denied");
	}
	
	$tag = $_POST['tag'];
	
	include '../web/connection.php';
	
	$response = array('tag' => $tag, 'success' => 0, 'error' => 0);
	
	if($tag == 'login') {
		
		$email = $_POST['email'];
		$password = md5($_POST['password']);
		$regId = $_POST['regId'];
		
		$query = "SELECT * FROM user_student WHERE (email = '$email' OR s_user_name = '$email') AND password = '$password'";
		$result = mysql_query($query, $con);
		
		$query_admin = "SELECT * FROM user_fac WHERE (email = '$email' OR t_user_name = '$email') AND password = '$password'";
		$result_admin = mysql_query($query_admin, $con);
		
		if(mysql_num_rows($result) == 1) {
		
			$response['success'] = 1;
			$response['user']['name'] = mysql_result($result, 0, "name");
			$response['user']['email'] = mysql_result($result, 0, "email");
			$response['user']['username'] = mysql_result($result, 0, "s_user_name");
			$response['user']['year'] = mysql_result($result, 0, "class");
			$response['user']['role'] = 0;

			$query = "UPDATE user_student SET gcm_id = '$regId' WHERE email = '$email' OR s_user_name = '$email'";
			mysql_query($query, $con);

		} else if(mysql_num_rows($result_admin) == 1) {
			
			$response['success'] = 1;
			$response['user']['name'] = mysql_result($result_admin, 0, "name") or die("Hello:".mysql_error());
			$response['user']['email'] = mysql_result($result_admin, 0, "email");
			$response['user']['username'] = mysql_result($result_admin, 0, "t_user_name");
			$response['user']['year'] = 0;
			$response['user']['role'] = 1;

			$query = "UPDATE user_fac SET gcm_id = '$regId' WHERE email = '$email' OR t_user_name = '$email'";
			mysql_query($query, $con);
			
		} else {
		
			$response['error'] = 1;
			$response['error_message'] = "Incorrect Email or Password";
			
		}
		
		echo json_encode($response);
		
	} 
	
	if($tag == 'register') {
	
		$name = $_POST['name'];
		$email = $_POST['email'];
		$username = $_POST['username'];
		$year_temp = $_POST['year'];
		
		if($year_temp == "First")
			$year = 1;
		else if($year_temp == "Second")
			$year = 2;
		else if($year_temp == "Third")
			$year = 3;
		else if($year_temp == "Fourth")
			$year = 4;
		$password = md5($_POST['password']);
		//this block is to receive the GCM regId from external (mobile apps)
		$gcmRegID  = $_POST["regId"]; 
		
		$query = "SELECT * FROM user_student WHERE email = '$email'";
		$result = mysql_query($query, $con);
		
		$query_2 = "SELECT * FROM user_student WHERE s_user_name = '$username'";
		$result_2 = mysql_query($query_2);
		
		if(mysql_num_rows($result) > 0) {
		
			$response['error'] = 2;
			$response['error_message'] = "The Email ID already exists. Please scroll down to login.";
			echo json_encode($response);
			
		} else if(mysql_num_rows($result_2) > 0) {
			
			$response['error'] = 3;
			$response['error_message'] = "The username is already taken. Please enter another.";
			echo json_encode($response);
			
		} else {
		
			$query = "INSERT INTO user_student (name, email, s_user_name, password, gcm_id, class) VALUES ('$name', '$email', '$username', '$password', '$gcmRegID', '$year')";
			if(mysql_query($query)) {
			
				$response['success'] = 1;
				$response['user']['name'] = $name;
				$response['user']['email'] = $email;
				$response['user']['username'] = $username;
				$response['user']['year'] = $year;
				$response['user']['role'] = 0;
				
				echo json_encode($response);
			
			} else {
				
				$response['error'] = 1;
				$response['error_message'] = "Could not connect to server.";
				
				echo json_encode($response);
				
			}
		
		}
	
	}
	
	mysql_close($con);
?>