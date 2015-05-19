<?php
session_start();
include('connection.php');
if(!isset($_SESSION['t_user_name']))
{
	header('location:login.php');
}

$user=($_SESSION['t_user_name']);
$_SESSION['user']=$user;
$query="SELECT * FROM user_fac WHERE t_user_name='$user'";
$res=mysql_query($query,$con);
$detail= mysql_fetch_array($res,0);

$students=mysql_query("SELECT name, s_user_name, pic FROM user_student");
$student_count=mysql_num_rows($students);

$faculty=mysql_query("SELECT name, t_user_name, pic FROM user_fac");
$faculty_count=mysql_num_rows($faculty);

$posts=mysql_query("SELECT * FROM posts ORDER BY post_id DESC");
$posts_by=mysql_query("SELECT * FROM posts WHERE posted_by='$user'");
$research=mysql_query("SELECT * FROM research");

//NO. OF UNREAD MESSAGES

$msg_sender=mysql_query("SELECT DISTINCT sent_by FROM messages WHERE received_by='$user' AND read_='0'")or die(mysql_error());
$sender_count=mysql_num_rows($msg_sender);
$msg_=mysql_query("SELECT sent_by FROM messages WHERE received_by='$user' AND read_='0'")or die(mysql_error());
$unread_count=mysql_num_rows($msg_);
//converting digit to word
$word_num=array("Zero", "First", "Second", "Third", "Fourth");

?>

<html>
<title>The Network|MCE</title>

<head>
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/contact.css">
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/contact.js"></script>
<script type="text/javascript" src="js/jquery.simplemodal.js"></script>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>


<style>
textarea{
	width:500px;
	height:100px;
	resize:none;
}
#pub{
	height:20px;
	background-color:#000;
	margin-top:2px;	
}
.foot{
	margin-bottom:1%;
	padding-right:50px;
	margin-left:50px;
	margin-top:20px;
}
#notice{
	width:580px;
	height:600px;
	z-index:100;
	position:fixed;
	top:450px;
	left:1100px;
}

#notice_text {
	
		z-index:101;
		position:fixed;
		top:470px;
		width:120px;
		color:#000;
		height:120px;
		overflow:hidden;
		left:1120px;
		-webkit-transform: rotate(340deg);
		transform: rotate(350deg);
	
}
body{
		background-image:url('images/background.jpg');

}
#box{
	width:150px;
	height:150px;
	margin:1%;
	float:left;
}

#msg_count{
		background-color:red;
		border-radius:400px;
		margin-left:5px;
		color:white;
		padding:8px;
		
}
#msg_count_{
		background-color:red;
		border-radius:400px;
		margin-left:-1px;
		color:white;
		padding:5px;
		float:top;
		
}
</style>

</head>
<script type="text/javascript">
function message(e){
	alert(e);
}


	$(function() {
		//Sending request to vnb for latest notice
		$.ajax({
			type:"POST",
			url:'http://www.vnb.dcetech.com/android/get_data.php',
			data:'year=',
		    dataType: 'json',
			success:function(e){
				$('#notice_text').html(e.data[1].subject);
			}
		});
		$(".aa").fadeOut();
//$(".aa").css("display","block");
$("#about_").fadeIn();
	});


function myfun(res){
	if(res=="about"){
		$(".aa").fadeOut();
		$("#about_").delay(500).fadeIn();
	}
	
	if(res=="research"){		
		$(".aa").fadeOut();
		$("#research_").delay(500).fadeIn();
	}
	if(res=="post"){		
		$(".aa").fadeOut();
		$("#post_").delay(500).fadeIn();
	}
if(res=="classroom"){
		$(".aa").fadeOut();	
		$("#classroom_").delay(500).fadeIn();

	}


if(res=="faculty"){
		$(".aa").fadeOut();
		$("#faculty_").delay(500).fadeIn();
	}

if(res=="students"){
		$(".aa").fadeOut();
		$("#students_").delay(500).fadeIn();
	}
if(res=="message"){
		$(".aa").fadeOut();
		$("#messages").delay(500).fadeIn();
	}

}
</script>
<body >
<a href="http://vnb.dcetech.com/" target="_blank"><div id="notice" title="Virtual Notice Board"><img src="sticky.png" width="30%"></div></a>
<a href="http://vnb.dcetech.com/" target="_blank"><div id="notice_text" title="Latest Notice"><i>Industrial Training Viva</i></div>
</a><div id="page-header">
<span id="dp">
<img src="<?php echo $detail[5]?>" title="<?php echo $detail[3]?>" onerror="this.src='images/anonymous.jpg'" style="margin-top:5px;"height="100" width="100"/>
</span>
<span id="title">
<h1>Department of Applied Mathematics</h1>
<h4>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Delhi Technological University</h4>
</span>
<span id="logo">
<img src="http://www.troika.dcetech.com/img/hover/dce_logo.svg" title="DTU" height="100" width="100"/>
</span>
</div>
<div id="container">
<span id="links">
<div class="nav nav-pills nav-stacked">

<li><a href="javascript:void(0);" onclick="myfun(this.id)" id="about" class="links">About</a></li>
<li><a href="javascript:void(0);" onclick="myfun(this.id)" id="research" class="links">Research</a></li>
<li><a href="javascript:void(0);" onclick="myfun(this.id)" id="post" class="links">Posts</a></li>
<li><a href="javascript:void(0);" onclick="myfun(this.id)" id="classroom" class="links">Classroom</a></li>
<li><a href="javascript:void(0);" onclick="myfun(this.id)" id="faculty" class="links">Faculty</a></li>
<li><a href="javascript:void(0);" onclick="myfun(this.id)" id="students" class="links">Students</a></li>
<li><a href="javascript:void(0);" onclick="myfun(this.id)" id="message" class="links">Messages<?php if($unread_count){echo "<span id=\"msg_count\"><b>".$unread_count."</b></span>";} ?></a></li>
<li><a href="logout.php"class="links">Logout</a></li>
</div>
</span>
<span id="detail">
<div  id="about_" class="aa">
	<center><u><h2>Profile</h2></u></center>

<table class="table">
<tr>
<th>Name: </th>
<td><?php
echo $detail[3];
?></td>
</tr>
<tr>
<th>Designation :</th>
<td><?php
echo $detail[6];
?></td>
</tr>
<tr>
<th>Gender:</th>
<td><?php
echo $detail[4]=='m'?"Male":"Female";
?></td>
</tr>
<tr>
<th>Qualification:</th>
<td><?php
echo $detail[7];
?></td>
</tr><tr>
<th>Email :</th>
<td><a href="mailto:<?php
echo $detail[9];
?>" target="_blank" title="mail to">
<?php
echo $detail[9];
?></a></td>
</tr>
</table>
</div >
<div id="research_" class="aa">
<div>
<form>
<table>
<tr><td>Title:</td><td><input type="text"></input></td></tr>
<tr><td>Abstract:</td><td><textarea></textarea></td>
<td><input type="button" value="Post"></input></td>
</tr>
</table>
</form>
</div>
<div>
<?php 
$count_res = mysql_num_rows($research);
for($i=0;$i<$count_res;$i++){ ?>
	<div id="pub"> <?php
		echo mysql_result($research,$i,0);
		echo mysql_result($research,$i,1);
		echo mysql_result($research,$i,2);
?>
	</div><?php
}
?>
</div>
</div>
<div id="post_" class="aa">
<center><h2><u>Your Posts</u></h2></center>
<div id="content1">
	<?php 
	$count_post=mysql_num_rows($posts_by);
	for( $i=0;$i<$count_post;$i++){
	$post_id= mysql_result($posts_by,$i,0);
	$posted_by= mysql_result($posts_by,$i,1);
	$post_title= mysql_result($posts_by,$i,3);
	$post_text=mysql_result($posts_by,$i,4);
	$post_time=mysql_result($posts_by,$i,5);
	$post_date=mysql_result($posts_by,$i,6);
	?>
	
	<div class="post" >
	<a  href="comments.php?id=<?php echo $post_id ?>" target="_blank" title="Click for comments on this post">
	<table class="table">
	<tbody>
		
			<th><?php echo mysql_result($posts_by,$i,3);?></th>
			<th/>
			<th/>
		
		<tr>
			<td><?php echo mysql_result($posts_by,$i,4);?></td>
			<td/>
			<td/>
		</tr>
		<tr>
			<label id="text-muted"><td>posted by:<?php echo mysql_result($posts_by,$i,1);?></td>
			<td class="text-muted"><?php echo mysql_result($posts_by,$i,5);?></td>
			<td class="text-muted"><?php echo mysql_result($posts_by,$i,6);?></td></label>
		</tr>
	</tbody>
	</table>
	</a>
	</div>
	<?php }
	?>
</div>

</div>
<div id="classroom_" class="aa">
	<center><u><h2>Classroom</h2></u></center>
	<input type="button" value="New Post "  class="btn btn-primary btn-xs" id="newpost" ></input>
	<div id="content1">
	<?php 
	$count_post=mysql_num_rows($posts);
	for( $i=0;$i<$count_post;$i++){
	$post_id= mysql_result($posts,$i,0);
	$posted_by= mysql_result($posts,$i,1);
	$post_title= mysql_result($posts,$i,3);
	$post_text=mysql_result($posts,$i,4);
	$post_time=mysql_result($posts,$i,5);
	$post_date=mysql_result($posts,$i,6);
	?>
	
	<div class="post" >
	<a  href="comments.php?id=<?php echo $post_id ?>" target="_blank">
	<table class="table">
	<tbody>
		
			<th><?php echo mysql_result($posts,$i,3);?></th>
			<th/>
			<th/>
		
		<tr>
			<td><?php echo mysql_result($posts,$i,4);?></td>
			<td/>
			<td/>
		</tr>
		<tr>
			<label id="text-muted"><td>posted by:<?php echo mysql_result($posts,$i,1);?></td>
			<td class="text-muted"><?php echo mysql_result($posts,$i,5);?></td>
			<td class="text-muted"><?php echo mysql_result($posts,$i,6);?></td></label>
		</tr>
	</tbody>
	</table>
	</a>
	</div>
	<?php }
	?>
</div>
</div>
<div id="faculty_" class="aa">
<center><h3><u>List of Faculty</u></h3></center>
<div class="scroll">

<?php
for($i=0;$i<$faculty_count;$i++){
	$receiver=mysql_result($faculty,$i,"t_user_name");
	//Check on if user it itself
	if($_SESSION['user']==$receiver ) {$i=$i+1; 	$receiver=mysql_result($faculty,$i,"t_user_name");
if($i>=$faculty_count) break;}?>
	
<a href="chat/index.php?id=<?php echo $receiver?>" target="_blank">
<!--Function to call messaging -->

<div id="box">
<div><img src="upload/<?php echo mysql_result($faculty,$i,"pic"); ?>"  onerror ="this.src='images/anonymous.jpg'" width="100px" height="100px" title="Click to see complete profile"></img></div>
<div style="margin-left:5px;"><?php echo mysql_result($faculty,$i,"name"); ?></div>
</div>
</a>
<?php
}
?>
</div >
</div>
<div id="students_" class="aa">
<center><h3><u>List of Students</u></h3></center>
<div class="scroll">

<?php
for($i=0;$i<$student_count;$i++){
	$receiver=mysql_result($students,$i,"s_user_name");
	?>
<a href="chat/index.php?id=<?php echo $receiver?>" target="_blank">
<!--Function to call messaging -->

<div id="box">
<div><img src="students/upload/<?php echo mysql_result($students,$i,"pic"); ?>"  onerror ="this.src='images/anonymous.jpg'" width="100px" height="100px" title="Click to see complete profile"></img></div>
<div style="margin-left:25px;"><?php echo explode(" ", mysql_result($students,$i,"name"))[0]; ?></div>
</div>
</a>
<?php
}
?>
</div >
</div>
<div id="messages" class="aa">
<center><h3><?php if($sender_count){echo "Messages from ".$sender_count." people";} else {echo"No new message";}?> </h3></center>
<div class="scroll">

<?php
for($i=0;$i<$sender_count;$i++){
	$receiver=mysql_result($msg_sender,$i,"sent_by");
	?>
<a href="chat/index.php?id=<?php echo $receiver?>" target="_blank">
<!--Function to call messaging -->

<div id="box">
<?php 
$rec=mysql_query("SELECT name, pic FROM user_student WHERE s_user_name='$receiver'")or die(mysql_error());
if(mysql_num_rows($rec)==0){
	$rec=mysql_query("SELECT name, pic FROM user_fac WHERE t_user_name='$receiver'")or die(mysql_error());

}
// count messages from each sender
$count_each=mysql_query("SELECT * FROM messages WHERE received_by='$user' and sent_by='$receiver' and read_='0'")or die(mysql_error());
$count_=mysql_num_rows($count_each);
?>
<div><span><img src="upload/<?php echo mysql_result($rec,0,"pic"); ?>"  onerror ="this.src='images/anonymous.jpg'" width="100px" height="100px" title="Click to start chatting"></img></span>
<span id="msg_count_"><?php echo $count_ ?></span>
</div>
<div style="margin-left:10px;"><?php echo mysql_result($rec,0,"name"); ?></div>
</div>
</a>
<?php
}
?>
</div >

</div>
</span>
<span  id="clock">
<div><iframe src="http://free.timeanddate.com/clock/i4nschah/n176/fn6/tc0ff/pc99f/fti/tt0/tw0/tm1/ts1/tb1" frameborder="0" width="260" height="25"></iframe></div>

<div><a href="images/anonymous.jpg" download="app.jpg" title="Click to download android app"><img src="images/download.png"></img></a></div>
<div><a href="https://play.google.com/store/apps/details?id=scarecrow.beta.vnb" target="_blank" title="Find our apps on Play store"><img src="images/googleplaylogo.png" width="220px" height="50px"></img></a></div>

</span>
</div>

<div id="footer" >
<div style="margin-top:-1em">
<span class="foot" style="margin-left:350px"><a  href="#">About Us</a></span>
<span class="foot"><a href="#" >Team</a></span>
<span class="foot"><a href="#" >Contact us</a></span>
</div>
<div>
</body>

</html>