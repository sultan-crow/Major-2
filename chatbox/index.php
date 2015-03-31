<?php
?>

<html>
	<head>
		<title>Chatbox</title>
		
		<link rel="stylesheet" type="text/css" href="chat.css">
		
		<script src = "jquery.js" type = "text/javascript"></script>
		<script type = "text/javascript">
		
			function submitChat() {
				
				if(chat.uname.value == '' || chat.msg.value == '') {
					alert("All fields are mandatory!!");
					return;
				}
				
				chat.uname.readOnly = true;
				chat.uname.style.border = 'none';
				
				$('#imageload').show();
				
				var uname = chat.uname.value;
				var msg = chat.msg.value;
				var xmlhttp = new XMLHttpRequest();
				
				xmlhttp.onreadystatechange = function() {
					if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
						document.getElementById('chatlogs').innerHTML = xmlhttp.responseText;
						$('#imageload').hide();
					}
				}
				xmlhttp.open('GET', 'insert.php?uname=' + uname + '&msg=' + msg, true);
				xmlhttp.send();
				
				chat.msg.value = "";
			}
			
			$(document).ready(function(e) {
				
				$.ajaxSetup({cache:false});
				
				setInterval(function() {
					$('#chatlogs').load('logs.php');
				}, 2000);
				
			});
		
		</script>
		
	</head>
	
	<body>
	
		<form name = "chat">
		
			Enter Your Chatname: <input type = "textbox" name = "uname" style = "width:200px;"/><br/>
			Your Message: <br/>
			<textarea name = "msg" style = "width:200px; height:70px;"></textarea><br/>
			<a href = "#" onclick = "submitChat()" class = "button">Send</a><br/><br/>
		
		</form>
		
		<div id = "imageload" style = "display:none;">
			<image src = "load.gif"/>
		</div>
		
		<div id = "chatlogs">
			LOADING CHATLOGS....... PLEASE WAIT <image src = "load.gif"/>
		</div>
	
	</body>
</html>