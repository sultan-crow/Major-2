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
$students=mysql_query("SELECT * FROM user_student");
$faculty=mysql_query("SELECT * FROM user_fac");
$posts=mysql_query("SELECT * FROM posts");
$posts_by=mysql_query("SELECT * FROM posts WHERE posted_by='$user'");
$research=mysql_query("SELECT * FROM research");
//echo $detail[0];
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
body{
	background-image:url('images/background.jpg');
}
.foot{
	margin-bottom:1%;
	padding-right:50px;
	margin-left:50px;
	margin-top:20px;
}
</style>

</head>
<script type="text/javascript">
function message(e){
	alert(e);
}


	$(function() {
		$(".aa").fadeOut();
//$(".aa").css("display","block");
$("#about_").fadeIn();
	});


function myfun(res){
	if(res=="about"){
		$(".aa").fadeOut();
		$("#about_").fadeIn();
	}
	
	if(res=="research"){		
		$(".aa").fadeOut();

		$("#research_").fadeIn();
	}
	if(res=="post"){		
		$(".aa").fadeOut();

		$("#post_").fadeIn();
	}
if(res=="classroom"){
		$(".aa").fadeOut();	<?php
		$user=$_SESSION['t_user_name'];
		//Query for finding the class of logged in student
		$query="SELECT * FROM posts";// WHERE class='$class'"; Add conditions
		$classroom=mysql_query($query) or die( mysql_error());

?>
		$("#classroom_").fadeIn();

	}


if(res=="faculty"){
		$(".aa").fadeOut();
		$("#faculty_").fadeIn();
	}

	if(res=="students"){
		$(".aa").fadeOut();
		<?php
//Details of all classmates
$students=mysql_query("SELECT * FROM user_student");
//No. of classmates
$count=mysql_num_rows($students);
	

?>
	
	$("#students_").fadeIn();
	}

}
</script>
<body >
<div style="position:fixed;top:80%;right:10%;background-color:#000;width:50px;height:50px;z-index:100px"></div>
<div id="page-header">
<span id="dp">
<img src="<?php echo $detail[5]?>" title="<?php echo $detail[3]?>" height="100" width="100"/>
</span>
<span id="title">
<h1>Department of Applied Mathematics</h1>
<h4>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Delhi Technological University</h4>
</span>
<span id="logo">
<img src="images/logo.jpg" title="DTU" height="100" width="100"/>
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
<tr><td>Detail:</td><td><textarea></textarea></td></tr>
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
<center><h3>List of Faculty</h3></center>
<div  class="scroll">
<?php
$fac_count=mysql_num_rows($faculty);
for($i=0;$i<$fac_count;$i++){
	$receiver=mysql_result($faculty,$i,"t_user_name");?>
<a href="javascript:void(0)" >
<!--Function to call messaging -->
<div class="user_detail" id="<?php echo $receiver ?>"onclick="message(this.id)">
<span style="float:left;">
<!--table for printing detail of classmates-->
<table class="table" class="table table-bordered">
<tr>
<td>Name:</td>
<td><?php echo mysql_result($faculty,$i,"name");?></td><td/>
<td>Designation:</td>
<td><?php echo mysql_result($faculty,$i,"designation");?></td>
		
</tr>
<tr>
<td>Qualification:</td>
<td><?php echo mysql_result($faculty,$i,"qualification");?></td>

<td>Email-id:</td>
<td><?php echo mysql_result($faculty,$i,"email");?></td>
</tr>
</table>
</span>
<span style="float:right;">
<img src="../images/passport.jpg" width="80px" height="80px"/>
</span>
</div>
</a>
<?php
}
?>
</div>
</div>
<div id="students_" class="aa">
<center><h3><u>Students</u></h3></center>
<div class="scroll">
<?php
$students_count=mysql_num_rows($students);
for($i=0;$i<$students_count;$i++){
	$receiver=mysql_result($students,$i,"s_user_name");?>
<a href="javascript:void(0)" >
<!--Function to call messaging -->
<div class="user_detail" id="<?php echo $receiver ?>"onclick="message(this.id)">
<span style="float:left;">
<!--table for printing detail of classmates-->
<table class="table" class="table table-bordered">
<tr>
<td>Name:</td>
<td><?php echo mysql_result($students,$i,"name");?></td><td/><td/><td/><td/>
</tr>
<tr>
<td>Year:</td>
<td><?php echo mysql_result($students,$i,"class");?></td>
<td>Group:</td>
<td><?php echo mysql_result($students,$i,"group_");?></td>

<td>Email-id:</td>
<td><?php echo mysql_result($students,$i,"email");?></td>
</tr>
</table>
</span>
<span style="float:right;">
<img src="../images/passport.jpg" width="90px" height="90px"/>
</span>
</div>
</a>
<?php
}
?>
</div >
</div>
</span>
<span id="clock"><iframe src="http://free.timeanddate.com/clock/i4nschah/n176/fn6/tc0ff/pc99f/fti/tt0/tw0/tm1/ts1/tb1" frameborder="0" width="260" height="25"></iframe>
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