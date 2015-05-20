<?php
include('../connection.php');
$name=$_GET['id'];
/*if(!isset($_SESSION['user'])){
		//header('location:../login.php');
	}
	*/
$res=mysql_query("SELECT * FROM user_student WHERE s_user_name='$name'" );
	
$role='student';

if(mysql_num_rows($res)==0){
	$role='fac';
	$res=mysql_query("SELECT * FROM user_fac WHERE t_user_name='$name'" );

}
$name = mysql_result($res,0,"name");
$sex=  mysql_result($res,0,"sex");
$pic=  mysql_result($res,0,"pic");
$dob=  mysql_result($res,0,"dob");
$email=  mysql_result($res,0,"email");

if($role=='student'){
	$class=mysql_result($res,0,"class");

	$group=mysql_result($res,0,"group_");

}
else
if($role=='fac'){
	$desig=mysql_result($res,0,"designation");

	$quali=mysql_result($res,0,"qualification");

}
?>

<html>
	<head>
		<title><?php echo $name;?></title>
		<style>
		body{
		background-image:url('../images/background.jpg');

}
	#chat1{
		
	background-color:#fff1;
	margin-top:3%;
	margin-left:40%;
	
	}
	#logs{
		overflow-y:scroll;
		width:500px;
		height:80%;
		padding:2px;
		background-color:#99FF66;
		color:#800000;
		font-weight:12px;
		font-size:20px;
		font-family: arial, sans-serif;
		border: 5px solid #99FF66;	
	}
	.box{
		margin-bottom:1px;
		margin-top:0px;
		position:fixed;
		padding:2px;

	}
	#header{
		font-size:20px;
		background-color:#D6FFC2;
		width:500px;
		display:block;
		border-radius:1px;
		color:#0099CC;
		border: 5px solid #99FF66;	
		font-family:italic bold 12px/30px Georgia, serif;
	}
	.profile{
		float:left;
		display:block;
		width:380px;
		height:400px;
		background-color:#CCCCFF;
		margin-top:100px;
		margin-left:52px;
		color:#B8B894;
		font-family:italic bold 20px/30px Georgia, serif;
	}
	</style>
		<link rel="stylesheet" type="text/css" href="../chat/chat.css">
		
		<script src = "../js/jquery.js" type = "text/javascript"></script>
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

		<script type = "text/javascript">
		
		
			$(document).ready(function(e) {
				$.ajaxSetup({cache:false});
				
				setInterval(function() {
					$('#chatlogs').load('logs.php?id=<?php echo $_GET["id"]; ?>');
					var h=$('#logs').prop('scrollHeight');
					$('#logs').scrollTop(h);
					
				}, 2000);
				
				$('#chat_form').submit(function() { 
				
					
					submit_form(); 
					var h=$('#logs').prop('scrollHeight');
					$('#logs').scrollTop(h);
					return false;
				});
				$('#button').click(function() { 
					
					submit_form(); });
				
				function submit_form() {
									
								

					if(chat.msg.value == '') {
						
						alert("All fields are mandatory!!");
						return;
					
					}
				
				
					$('#imageload').show();
					
					var uname = "<?php echo $_GET['id']; ?>";
					var msg = chat.msg.value;
					var xmlhttp = new XMLHttpRequest();
					
					xmlhttp.onreadystatechange = function() {
						if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
							document.getElementById('chatlogs').innerHTML = xmlhttp.responseText;
							$('#imageload').hide();
						}
					}
					xmlhttp.open('GET', '../chat/insert.php?receiver=' + uname + '&message=' + msg, true);
					xmlhttp.send();
					chat.msg.value = "";
					var h=$('#logs').prop('scrollHeight');
					$('#logs').scrollTop(h);
					
					return false;
					
				}
			});
		</script>
		
	</head>
	
	<body>
	<span class="profile">
		<table class="table">
		<th><img src="../students/upload/<?php echo $pic;?>" onerror="this.src='../images/anonymous.jpg'" width="100px" height="100px" title="<?php echo $name;?>"></img></th>
			<tr>
			<td>Name: </td>
			<td> <?php echo $name;?></td>
			</tr>
			<tr>
			<td>Email-id: </td>
			<td><?php echo $email;?></td>
			</tr>
			<tr>
			<td>Date of Birth: </td>
			<td><?php echo $dob;?></td>
			
			</tr>
			<tr>
			<td>Gender: </td>
			<td><?php echo $sex=='m'?"Male":"Female";?></td>
			</tr>
			<?php if($role=='student'){
				echo '<tr>
					<td>Year: </td>
					<td>'.$class.'</td>
					
				</tr>
				<tr>
				<td>Group: </td>
				<td>'.$group.'</td>
				</tr>';
			}if($role=='fac'){
				echo '
				<tr>
				<td>Designation : </td>
				<td>'.$desig.'</td>
				</tr>
				<tr>
				<td>Qualification : </td>
				<td>'.$quali.'</td>
				</tr>';
			}?>
			<tr>
			</tr>
		</table>
	</span>
	<span>
	<div id="chat1">
		<div id="header">You are in conversation with <?php echo $name; ?></div>
		<div id="logs">
		
		<div id = "chatlogs">
			LOADING CHATLOGS....... PLEASE WAIT <image src = "../chat/load.gif"/>
		</div>
		
		<div id = "imageload" style = "display:none;">
			<image src = "load.gif"/>
		</div>
		</div>
		<form id="chat_form" name = "chat" class="box" method="POST">
		
			<input type="text" name = "msg" style = "width:300px; height:30px; resize:none;" placeholder="Your Message"></input>
			<span><input type="button" id="button" class = "button" value="Send"></input></span>
		
		</form>
		
		
	</div>
	</span>
	<script>
			$(document).ready(function()
				{
					//$('#logs').scrollTop($('logs').scrollHeight);
				});
	</script>
	</body>
</html>