<?php

	include "../web/connection.php";
	
	$tag = $_POST['tag'];	
	$response = array('tag' => $tag, 'success' => 0, 'error' => 0);
	$error = 0;
	
	if($tag == "profile") {
		
		$role = $_POST['role'];
		$username = $_POST['username'];
		
		if($role == 0) {
			
			$year = $_POST['year'];
			
			//First add all user details
			
			$query = "SELECT * FROM user_student WHERE s_user_name='$username' AND class='$year'";
			$result = mysql_query($query, $con) or die(mysql_error());
			
			if(mysql_num_rows($result) == 1) {
			
				$response['success'] = 1;
				$response['user']['name'] = mysql_result($result, 0, "name");
				$response['user']['gender'] = mysql_result($result, 0, "sex");
				$response['user']['email'] = mysql_result($result, 0, "email");
				$response['user']['username'] = $username;
				$response['user']['dob'] = mysql_result($result, 0, "dob");
				$response['user']['picture'] = mysql_result($result, 0, "pic");
				$response['user']['year'] = $year;
			
			} else 
				$error = 0;
			
			//Next, we add all classmates of the same year
			
			$query = "SELECT u_id, name FROM user_student WHERE class='$year' AND s_user_name <> '$username' ORDER BY name ASC";
			$result = mysql_query($query, $con) or die(mysql_error());
			
			if(mysql_num_rows($result) > 0) {
				
				for($i = 0; $i < mysql_num_rows($result); $i ++) {
					$response['classmates'][$i]['u_id'] = mysql_result($result, $i, "u_id");
					$response['classmates'][$i]['name'] = mysql_result($result, $i, "name");
				}
				
			} else
				$error = 1;
			
			//Next, we add all faculty
			
			$query = "SELECT u_id, name, designation FROM user_fac ORDER BY name ASC";
			$result = mysql_query($query, $con) or die(mysql_error());
			
			if(mysql_num_rows($result) > 0) {
				
				for($i = 0; $i < mysql_num_rows($result); $i ++) {
					$response['faculty'][$i]['u_id'] = mysql_result($result, $i, "u_id");
					$response['faculty'][$i]['name'] = mysql_result($result, $i, "name");
					$response['faculty'][$i]['designation'] = mysql_result($result, $i, "designation");
				}
				
			} else
				$error = 1;
			
			//Finally, we add all posts
			
			$query = "SELECT post_id, posted_by, post_title, date, time FROM posts WHERE class LIKE '%$year%' ORDER BY post_id DESC";
			$result = mysql_query($query, $con) or die(mysql_error());
			
			if(mysql_num_rows($result) > 0) {
				
				for($i = 0; $i < mysql_num_rows($result); $i ++) {
					$response['posts'][$i]['post_id'] = mysql_result($result, $i, "post_id");
					$response['posts'][$i]['post_title'] = mysql_result($result, $i, "post_title");
					$response['posts'][$i]['posted_by'] = mysql_result($result, $i, "posted_by");
					$response['posts'][$i]['date'] = mysql_result($result, $i, "date");
					$response['posts'][$i]['time'] = mysql_result($result, $i, "time");
				}
				
			} else
				$error = 1;
			
		} else {
			
			//First add user details
			$query = "SELECT * FROM user_fac WHERE t_user_name='$username'";
			$result = mysql_query($query, $con) or die(mysql_error());
			
			if(mysql_num_rows($result) == 1) {
				
				$response['success'] = 1;
				$response['user']['name'] = mysql_result($result, 0, "name");
				$response['user']['gender'] = mysql_result($result, 0, "sex");
				$response['user']['dob'] = mysql_result($result, 0, "dob");
				$response['user']['email'] = mysql_result($result, 0, "email");
				$response['user']['username'] = $username;
				$response['user']['picture'] = mysql_result($result, 0, "pic");
				$response['user']['designation'] = mysql_result($result, 0, "designation");
				$response['user']['qualification'] = mysql_result($result, 0, "qualification");
			
			} else 
				$error == 1;
			
			//Next, we add all faculty
			
			$query = "SELECT u_id, name, designation FROM user_fac WHERE t_user_name <> '$username' ORDER BY name ASC";
			$result = mysql_query($query, $con) or die(mysql_error());
			
			if(mysql_num_rows($result) > 0) {
				
				for($i = 0; $i < mysql_num_rows($result); $i ++) {
					$response['faculty'][$i]['u_id'] = mysql_result($result, $i, "u_id");
					$response['faculty'][$i]['name'] = mysql_result($result, $i, "name");
					$response['faculty'][$i]['designation'] = mysql_result($result, $i, "designation");
				}
				
			} else
				$error = 1;
			
			//Next, we add research
			$query = "SELECT r_id, title, abstract, keyword, link FROM research WHERE user_name = '$username' ORDER BY r_id ASC";
			$result = mysql_query($query, $con) or die(mysql_error());
			
			if(mysql_num_rows($result) > 0) {
				
				for($i = 0; $i < mysql_num_rows($result); $i ++) {
					$response['research'][$i]['r_id'] = mysql_result($result, $i, "r_id");
					$response['research'][$i]['title'] = mysql_result($result, $i, "title");
					$response['research'][$i]['abstract'] = mysql_result($result, $i, "abstract");
					$response['research'][$i]['keywords'] = mysql_result($result, $i, "keyword");
					$response['research'][$i]['link'] = mysql_result($result, $i, "link");
				}
				
			} else
				$error = 1;
			
			
			//Finally, we add all posts
			
			$query = "SELECT post_id, posted_by, post_title, date, time, class FROM posts WHERE class = '1' ORDER BY post_id DESC";
			$result = mysql_query($query, $con) or die(mysql_error());
			
			if(mysql_num_rows($result) > 0) {
				
				for($i = 0; $i < mysql_num_rows($result); $i ++) {
					$response['posts'][1][$i]['post_id'] = mysql_result($result, $i, "post_id");
					$response['posts'][1][$i]['post_title'] = mysql_result($result, $i, "post_title");
					$response['posts'][1][$i]['posted_by'] = mysql_result($result, $i, "posted_by");
					$response['posts'][1][$i]['date'] = mysql_result($result, $i, "date");
					$response['posts'][1][$i]['time'] = mysql_result($result, $i, "time");
				}
				
			} else
				$error = 1;
			
			$query = "SELECT post_id, posted_by, post_title, date, time, class FROM posts WHERE class = '2' ORDER BY post_id DESC";
			$result = mysql_query($query, $con) or die(mysql_error());
			
			if(mysql_num_rows($result) > 0) {
				
				for($i = 0; $i < mysql_num_rows($result); $i ++) {
					$response['posts'][2][$i]['post_id'] = mysql_result($result, $i, "post_id");
					$response['posts'][2][$i]['post_title'] = mysql_result($result, $i, "post_title");
					$response['posts'][2][$i]['posted_by'] = mysql_result($result, $i, "posted_by");
					$response['posts'][2][$i]['date'] = mysql_result($result, $i, "date");
					$response['posts'][2][$i]['time'] = mysql_result($result, $i, "time");
				}
				
			} else
				$error = 1;
			
			$query = "SELECT post_id, posted_by, post_title, date, time, class FROM posts WHERE class = '3' ORDER BY post_id DESC";
			$result = mysql_query($query, $con) or die(mysql_error());
			
			if(mysql_num_rows($result) > 0) {
				
				for($i = 0; $i < mysql_num_rows($result); $i ++) {
					$response['posts'][3][$i]['post_id'] = mysql_result($result, $i, "post_id");
					$response['posts'][3][$i]['post_title'] = mysql_result($result, $i, "post_title");
					$response['posts'][3][$i]['posted_by'] = mysql_result($result, $i, "posted_by");
					$response['posts'][3][$i]['date'] = mysql_result($result, $i, "date");
					$response['posts'][3][$i]['time'] = mysql_result($result, $i, "time");
				}
				
			} else
				$error = 1;
			
			$query = "SELECT post_id, posted_by, post_title, date, time, class FROM posts WHERE class = '4' ORDER BY post_id DESC";
			$result = mysql_query($query, $con) or die(mysql_error());
			
			if(mysql_num_rows($result) > 0) {
				
				for($i = 0; $i < mysql_num_rows($result); $i ++) {
					$response['posts'][4][$i]['post_id'] = mysql_result($result, $i, "post_id");
					$response['posts'][4][$i]['post_title'] = mysql_result($result, $i, "post_title");
					$response['posts'][4][$i]['posted_by'] = mysql_result($result, $i, "posted_by");
					$response['posts'][4][$i]['date'] = mysql_result($result, $i, "date");
					$response['posts'][4][$i]['time'] = mysql_result($result, $i, "time");
				}
				
			} else
				$error = 1;
			
			$query = "SELECT post_id, posted_by, post_title, date, time, class FROM posts WHERE class LIKE '%5%' ORDER BY post_id DESC";
			$result = mysql_query($query, $con) or die(mysql_error());
			
			if(mysql_num_rows($result) > 0) {
				
				for($i = 0; $i < mysql_num_rows($result); $i ++) {
					$response['posts'][5][$i]['post_id'] = mysql_result($result, $i, "post_id");
					$response['posts'][5][$i]['post_title'] = mysql_result($result, $i, "post_title");
					$response['posts'][5][$i]['posted_by'] = mysql_result($result, $i, "posted_by");
					$response['posts'][5][$i]['date'] = mysql_result($result, $i, "date");
					$response['posts'][5][$i]['time'] = mysql_result($result, $i, "time");
				}
				
			} else
				$error = 1;
			
		}
		
	} else {
		
		die("Access Denied");
		
	}
	
	if($error == 1) {
		
		$response['error'] = 1;
		$response['error_message'] = "Could Not Connect to Server.";
		
	}
	
	mysql_close($con);
	
	echo json_encode($response);

?>