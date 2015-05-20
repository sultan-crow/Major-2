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
				$response['profile']['username'] = mysql_result($result, 0, "s_user_name");
				
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
				$response['profile']['username'] = mysql_result($result, 0, "t_user_name");
				
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

		require_once('gcm.php');

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
		
	} else if($tag == "chat") {

		$sender = $_POST['sender'];
		$receiver = $_POST['receiver'];

		$query = "SELECT * FROM messages WHERE sent_by IN ('$sender', '$receiver')
					AND received_by IN ('$sender', '$receiver')
					ORDER BY message_id DESC LIMIT 100";

		$result = mysql_query($query, $con);

		if($result) {

			$response['success'] = 1;
			$response['num'] = mysql_num_rows($result);
			$response['chats'] = array();
			
			for ($i = 0; $i < mysql_num_rows($result); $i ++) {

				$response['chats'][$i]['sender'] = mysql_result($result, $i, "sent_by");
				$response['chats'][$i]['receiver'] = mysql_result($result, $i, "received_by");
				$response['chats'][$i]['message'] = mysql_result($result, $i, "message");
				$response['chats'][$i]['date'] = mysql_result($result, $i, "date");
				$response['chats'][$i]['time'] = mysql_result($result, $i, "time");

			}

			$query = "UPDATE messages SET read_ = '1' WHERE received_by = '$receiver' AND sent_by = '$sender'";
			mysql_query($query) or die(mysql_error());

		} else {

			$response['error'] = 1;
			$response['error_message'] = "Could Not Fetch Chats";

		}

	} else if($tag == "chat_send") {

		$sender = $_POST['sender'];
		$receiver = $_POST['receiver'];
		$message = $_POST['message'];
		$message_clean = filter_string($message);
		date_default_timezone_set('Asia/Kolkata');
		$date = date('Y-m-d', time());
		$time = date('H:i:s', time());
		$name = getNameFromUsername($sender);

		$query = "INSERT INTO messages (sent_by, received_by, message, date, time, read_)
					VALUES ('$sender', '$receiver', '$message_clean', '$date', '$time', '0');";

		$result = mysql_query($query, $con) or die(mysql_error());

		if($result) {

			$response["success"] = 1;
			$response["chat"]["message"] = $message;
			$response["chat"]["sender"] = $sender;
			$response["chat"]["date"] = $date;
			$response["chat"]["time"] = $time;

			require_once("gcm.php");

			$query = "SELECT gcm_id FROM user_student WHERE s_user_name = '$receiver' AND gcm_id <> ''";
			$result = mysql_query($query);

			if(mysql_num_rows($result) > 0) {
				for($i = 0; $i < mysql_num_rows($result); $i++)
					$gcm_ids[] = mysql_result($result, $i, "gcm_id");

				$message = array("tag" => "message", "content" => $message, "name" => $name, "sender" => $sender, "date" => $date, "time" => $time);

				$pushStatus = sendPushNotificationToGCM($gcm_ids, $message);
			}

		} else {
			$response['error'] = 1;
			$response['error_message'] = "Could not send message due to connectivity issues. Please try again.";
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

	function filter_string($str) {
		$str = str_replace("'", "\'", $str);
		return preg_replace('/\s+/', ' ', $str);
	}
	
	mysql_close($con);

?>