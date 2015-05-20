<?php
include('../connection.php');
$name=$_GET['id'];
/*if(!isset($_SESSION['user'])){
		//header('location:../login.php');
	}
	*/
$res=mysql_query("SELECT name FROM user_student WHERE s_user_name='$name'" );
if(mysql_num_rows($res)==0){
	$res=mysql_query("SELECT name FROM user_fac WHERE t_user_name='$name'" );

}
$name = mysql_result($res,0,"name");
?>

<html>
	<head>
		<title>Chatbox</title>
		<style>
		body{
		background-image:url('../images/background.jpg');

}
	#chat1{
		
	background-color:#fff1;
	margin-top:3%;
	margin-left:30%;
	
	}
	#logs{
		overflow-y:scroll;
		width:500px;
		height:80%;
		padding:2px;
		background-color:white;
	}
	.box{
		margin-bottom:1px;
		margin-top:0px;
		position:fixed;
		padding:2px;

	}
	#header{
		font-size:20px;
		background-color:#877;
		width:450px;
		margin-bottom:1%;
	}
	</style>
		<link rel="stylesheet" type="text/css" href="../chat/chat.css">
		
		<script src = "../js/jquery.js" type = "text/javascript"></script>
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
	
	<script>
			$(document).ready(function()
				{
					//$('#logs').scrollTop($('logs').scrollHeight);
				});
	</script>
	</body>
</html>