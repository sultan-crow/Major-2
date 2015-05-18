<?php

	if(!isset($_POST['tag']) || $_POST['tag'] == '') {
		die("Access Denied");
	}
	
	include '../web/connection.php';
	
	$tag = $_POST['tag'];
	$response = array('tag' => $tag, 'success' => 0, 'error' => 0);
	
	if($tag == "post") {
		
		$id = $_POST['id'];
		
		$query = "SELECT * FROM posts WHERE post_id = '$id'";
		$result = mysql_query($query, $con);
		
		if(mysql_num_rows($result) == 1) {
		
			$response['success'] = 1;
			$response['post']['title'] = mysql_result($result, 0, "post_title");
			$response['post']['author'] =  getNameFromUsername(mysql_result($result, 0, "posted_by"));
			$response['post']['text'] = mysql_result($result, 0, "post_text");
			$response['post']['time'] = mysql_result($result, 0, "time");
			$response['post']['date'] = mysql_result($result, 0, "date");
			
		}
		
		$query = "SELECT * FROM comments WHERE post_id='$id'";
		$result = mysql_query($query, $con);
		
		if(mysql_num_rows($result) > 0) {
		
			for($i = 0; $i < mysql_num_rows($result); $i ++) {
				
				$response['comment'][$i]['id'] = mysql_result($result, $i, "comment_id");
				$response['comment'][$i]['user'] = mysql_result($result, $i, "user_id");
				$response['comment'][$i]['comment_text'] = mysql_result($result, $i, "comments");
				$response['comment'][$i]['time'] = mysql_result($result, $i, "time");
				$response['comment'][$i]['date'] = mysql_result($result, $i, "date");
				
			}
			
		}
		
	} else if($tag == "profile") {
		
		$id = $_POST['id'];
		$role = $_POST['role'];
		
		if($role == 0) {
			
			$query = "SELECT * FROM user_student WHERE u_id = '$id'";
			$result = mysql_query($query, $con) or die(mysql_error());
			
			if(mysql_num_rows($result) == 1) {
				
				$response['success'] = 1;
				$response['profile']['name'] = mysql_result($result, 0, "name");
				$response['profile']['gender'] = mysql_result($result, 0, "sex");
				$response['profile']['dob'] = mysql_result($result, 0, "dob");
				$response['profile']['pic'] = mysql_result($result, 0, "pic");
				$response['profile']['group'] = mysql_result($result, 0, "group_");
				$response['profile']['year'] = mysql_result($result, 0, "class");
				$response['profile']['email'] = mysql_result($result, 0, "email");
				
			} else {
				
				$response['error'] = 1;
				$response['error_message'] = "Invalid Request";
				
			}
			
		} else {
			
			$query = "SELECT * FROM user_fac WHERE u_id='$id'";
			$result = mysql_query($query, $con);
			
			if(mysql_num_rows($result) == 1) {
				
				$response['success'] = 1;
				$response['profile']['name'] = mysql_result($result, 0, "name");
				$response['profile']['gender'] = mysql_result($result, 0, "sex");
				$response['profile']['dob'] = mysql_result($result, 0, "dob");
				$response['profile']['pic'] = mysql_result($result, 0, "pic");
				$response['profile']['designation'] = mysql_result($result, 0, "designation");
				$response['profile']['qualification'] = mysql_result($result, 0, "qualification");
				$response['profile']['email'] = mysql_result($result, 0, "email");
				
			} else {
				
				$response['error'] = 1;
				$response['error_message'] = "Invalid Request";
				
			}
			
		}
		
	} else if($tag == "add_post") {
		
		$title = $_POST['title'];
		$body = $_POST['body'];
		$username = $_POST['username'];
		$year = $_POST['year'];
		
		date_default_timezone_set('Asia/Kolkata');
		$date = date('Y-m-d', time());
		$time = date('H:i:s', time());
		
		$query = "INSERT INTO posts (posted_by, class, post_title, post_text, time, date)
					VALUES ('$username', '$year', '$title', '$body', '$time', '$date')";
		
		$result = mysql_query($query, $con);
		
		if($result) {
			$response['success'] = 1;
		} else {
			$response['error'] = 1;
			$response['error_message'] = "Could not submit post due to some internal error.";
		}
		
	} else {
	
		$response['error'] = 1;
		$response['error_message'] = "Invalid Request";
		
	}
	
	echo json_encode($response);
	
	function getNameFromUsername($username) {
		
		global $con;
		
		$query1 = "SELECT name FROM user_student WHERE s_user_name='$username'";
		$query2 = "SELECT name FROM user_fac WHERE t_user_name='$username'";
		$result1 = mysql_query($query1, $con);
		$result2 = mysql_query($query2, $con);
		
		return mysql_num_rows($result1) == 1 ? mysql_result($result1, 0, "name") : mysql_result($result2, 0, "name");
		
	}
	
	mysql_close($con);

?>