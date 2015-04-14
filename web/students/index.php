<?php
session_start();
require_once '../connection.php';
if(!isset($_SESSION['s_user_name']))
{
	header('location:login.php');
}

$user=($_SESSION['s_user_name']);
$class=($_SESSION['class']);

//Query for finding the class of logged in student
$query="SELECT * FROM posts WHERE class='$class'";
$classroom=mysql_query($query) or die( mysql_error());

$query="SELECT * FROM user_student WHERE s_user_name='$user'";
$class=mysql_result(mysql_query("SELECT class FROM user_student WHERE s_user_name='$user'"),0,0);

$faculty=mysql_query("SELECT * FROM user_fac");
$fac_count=mysql_num_rows($faculty);

$res=mysql_query($query,$con);
$detail= mysql_fetch_array($res,0);

$classmates=mysql_query("SELECT * FROM user_student WHERE class='$class'");
//No. of classmates
$classmate_count=mysql_num_rows($classmates);
?>

<html>
<title>The Network|MCE</title>
<link rel="stylesheet" type="text/css" href="../css/style.css">

<head>
<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript">

	$(function() {
		
		$('.aa').fadeOut();
		//$('.aa').css('display', 'block');
		$('#classroom_').fadeIn();
	});

</script>
<script src="../js/style.js" type="text/javascript"></script>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

<script >

	function myfun(res){
	
		if(res=="classroom"){
				$(".aa").fadeOut();
				$("#classroom_").fadeIn();

			}
		if(res=="about"){
				$(".aa").fadeOut();
				$("#about_").fadeIn();
			}
		if(res=="classmates"){
				$(".aa").fadeOut();
				$("#classmates_").fadeIn();
			}
		if(res=="faculty"){
				$(".aa").fadeOut();
				$("#faculty_").fadeIn();
			}
		if(res=="timetable"){		
				$(".aa").fadeOut();
				$("#time_table").fadeIn();
		}

	}


</script>
<style>

</style>
</head>
<body>

<div id="header">
<span id="dp">
<img src="<?php echo $detail[5]?>" title="<?php echo $detail[3]?>" height="100" width="100"/>
</span>
<span id="title">
<h1>Department of Applied Mathematics</h1>
<h4><center>Delhi Technological University</center></h4>
</span>
<span id="logo">
<img src="../images/logo.jpg" title="DTU" height="100" width="100"/>
</span>
</div>
<style>

</style>

<div id="content">
<span id="links">
<a href="javascript:void(0);" onclick="myfun(this.id)" id="classroom" class="links">Classroom</a><br>
<a href="javascript:void(0);" onclick="myfun(this.id)" id="about" class="links">Profile</a><br>
<a href="javascript:void(0);" onclick="myfun(this.id)" id="classmates" class="links">Classmates</a><br>
<a href="javascript:void(0);" onclick="myfun(this.id)" id="faculty" class="links">Faculty</a><br>
<a href="javascript:void(0);" onclick="myfun(this.id)" id="timetable" class="links">Time Table</a><br>
<a href="logout.php"class="links">Logout</a><br>
</span>
<span id="detail">
<div id="classroom_" class="aa">
<div id="newpost">
<input type="text" id="post_title"></input>
<textarea id="post_text" cols="80" rows="7" style="resize:none"></textarea>
  <input type="button" value="Post" class="ff" onclick="post('<?php
  echo $class?>')"/>
</div>

<div id="content1" >
<?php 
$count_post=mysql_num_rows($classroom);
for( $i=0;$i<$count_post;$i++){
echo mysql_result($classroom,$i,4);
echo mysql_result($classroom,$i,5);
echo mysql_result($classroom,$i,6);
}
?>

</div>
<script>
function post(posted_by,classid){
var classroom='classrooms/'+classid+'.php';
var post_title=$("#post_title").val();
var post_text= $("#post_text").val();
	$.ajax({
		url:'post_action.php',
		type:'post',
		data:'posted_by='+ '&class='+classid+'&post_title='+post_title'&post_text='+post_text,
		success:function(ss){
				$('#content1').load('classroom_posts.php');
		}
	});
	
}
</script>
</div >




<div  id="about_" class="aa">
<table>
<tr>
<td>Name: </td>
<td><?php
echo $detail[3];
?></td>
</tr>
<tr>
<td>Year :</td>
<td><?php
echo $detail[6];
?></td>
</tr>
<tr>
<td>Gender:</td>
<td><?php
echo $detail[4]=='m'?"Male":"Female";
?></td>
</tr>
<tr>
<td>Group:</td>
<td><?php
echo $detail[7];
?></td>
</tr><tr>
<td>Date of Birth:</td>
<td><?php
echo $detail[8];
?></td>
</tr><tr>
<td>Email :</td>
<td><?php
echo $detail[9];
?></td>
</tr>
</table>
</span></div >
<div  id="classmates_"class="aa">
<center><h3>Students of <?php echo $class ?> Year</h3></center>

<?php
for($i=0;$i<$classmate_count;$i++){
	$receiver=mysql_result($classmates,$i,"s_user_name");?>
<a href="javascript:void(0)" >
<!--Function to call messaging -->
<div class="user_detail" id="<?php echo $receiver ?>"onclick="message(this.id)">
<span style="float:left;">
<!--table for printing detail of classmates-->
<table cellspacing="4" cellpadding="2">
<tr>
<td>Name:</td>
<td><?php echo mysql_result($classmates,$i,"name");?></td>
</tr>
<tr>
<td>Year:</td>
<td><?php echo mysql_result($classmates,$i,"class");?></td>
<td>Group:</td>
<td><?php echo mysql_result($classmates,$i,"group");?></td>

<td>Email-id:</td>
<td><?php echo mysql_result($classmates,$i,"email");?></td>
</tr>
</table>
</span>
<span style="float:right;">
<img src="../images/passport.jpg" width="70px" height="70px"/>
</span>
</div>
</a>
<?php
}
?>
</div >
<div  id="faculty_" class="aa" >
<center><h3>List of Faculty</h3></center>

<?php
for($i=0;$i<$fac_count;$i++){
	$receiver=mysql_result($faculty,$i,"t_user_name");?>
<a href="javascript:void(0)" >
<!--Function to call messaging -->
<div class="user_detail" id="<?php echo $receiver ?>"onclick="message(this.id)">
<span style="float:left;">
<!--table for printing detail of classmates-->
<table cellspacing="4" cellpadding="2">
<tr>
<td>Name:</td>
<td><?php echo mysql_result($faculty,$i,"name");?></td>
</tr>
<tr>
<td>Qualification:</td>
<td><?php echo mysql_result($faculty,$i,"qualification");?></td>
<td>Designation:</td>
<td><?php echo mysql_result($faculty,$i,"designation");?></td>

<td>Email-id:</td>
<td><?php echo mysql_result($faculty,$i,"email");?></td>
</tr>
</table>
</span>
<span style="float:right;">
<img src="../images/passport.jpg" width="70px" height="70px"/>
</span>
</div>
</a>
<?php
}
?></div >
<div  id="time_table" class="aa">
hello
</div >
</span>


</div>
<div id="footer">
<a  href="#" style="padding-right:50px; padding-left:300px;">About Us</a>
<a href="#" style="padding-right:50px; padding-left:50px;">Team</a>
<a href="#" style="padding-right:50px; padding-left:50px;">Contact us</a>
</div>
</body>


</html>