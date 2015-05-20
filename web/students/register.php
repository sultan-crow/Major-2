<?php
include('../connection.php');
	$name=$_POST['name_'];
	$username=$_POST['username'];
	$password=md5($_POST['password']);
	$gender=$_POST['sex'];
	$dob=$_POST['date'];
	$year=$_POST['year'];
	$email=$_POST['email'];
	$group=$_POST['group'];
	$pic='';
	
	if(isset($_FILES["pic"]["type"]))
	{
		$validextensions = array("jpeg", "jpg", "png");
		$temporary = explode(".", $_FILES["pic"]["name"]);
		$file_extension = end($temporary);
		if ((($_FILES["pic"]["type"] == "image/png") || ($_FILES["pic"]["type"] == "image/jpg") || ($_FILES["pic"]["type"] == "image/jpeg")) && ($_FILES["pic"]["size"] < 1000000)&& in_array($file_extension, $validextensions)) 
		{
			if ($_FILES["pic"]["error"] > 0)
			{
				echo "Return Code: " . $_FILES["pic"]["error"] . "<br/><br/>";
			}
			else
			{
				if (file_exists("upload/" . $_FILES["pic"]["name"])) {
					echo $_FILES["pic"]["name"] . " <span id='invalid'><b>already exists.</b></span> ";
				}
				else{
					$sourcePath = $_FILES['pic']['tmp_name']; // Storing source path of the file in a variable
					$targetPath = "upload/".$_FILES['pic']['name']; // Target path where file is to be stored
					move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file
							$pic=$_FILES['pic']['name'];
							//echo $pic;

				}
			}
		}
		
	}
	else echo "Not supported";
	$usernamemd5=md5($username);
 $query="INSERT INTO user_student(s_user_name,password,name,sex,pic,class,dob,email,group_,verified) VALUES ('$username','$password','$name','$gender','$pic','$year','$dob','$email','$group','$usernamemd5')";
 mysql_query($query)or die(mysql_error());
$user=mysql_query("SELECT * FROM user_student WHERE s_user_name='$username' and password='$password'")or die(mysql_error());
	if(mysql_num_rows( $user)==1){
	session_start();
	$_SESSION['s_user_name']=$username;
	$_SESSION['class']=$year;
	
	
	//Mail Verification
	$to='ketank90@gmail.com';
	
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

	$headers .= 'To: <ketank90@gmail.com>' . "\r\n";
	$headers .= 'From: <no-reply@mce_network.dcetech.com>' . "\r\n";
	
	$sub='Email Verification';
	
	$Url='http://'.$_SERVER['HTTP_HOST'] ;//. $_SERVER['REQUEST_URI'];
	
	$get_msg=md5($username.$name.$dob);
	$verification_link=$Url.'/sagnik/social_network/web/students/verifymail.php?tempcode='.$usernamemd5;
	$msg=	'
	Welcome to MCE-NETWORK
	Connect with your Friends and Faculty	
	Click on the link for your email verification
	
	'.$verification_link.'
	
	
	Thank You for registering on network
	';
	
	$headers="From:no-reply@mce_network.dcetech.com";

	mail($to,$sub,$msg,$headers);
	
//
	
	echo "Logged in";
	}
	else echo "failed";
	
?>