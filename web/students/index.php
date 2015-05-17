<?php
session_start();
require_once '../connection.php';
if(!isset($_SESSION['s_user_name']))
{
	header('location:login.php');
}

$user=($_SESSION['s_user_name']);
$_SESSION['user']=$user;
$class=($_SESSION['class']);

//Query for finding the class of logged in student
//$query="SELECT a.post_title,a.post_text,a.time,a.date, b.name FROM posts AS a, user_student AS b WHERE (a.posted_by = s_user_name) AND a.class='Second' ORDER BY a.post_id DESC";
$query="SELECT * FROM posts WHERE class LIKE '$class' ORDER BY post_id DESC";
$posts=mysql_query($query) or die( mysql_error());

$query="SELECT * FROM user_student WHERE s_user_name='$user'";
$class=mysql_result(mysql_query("SELECT class FROM user_student WHERE s_user_name='$user'"),0,0);

$faculty=mysql_query("SELECT * FROM user_fac");
$fac_count=mysql_num_rows($faculty);

$res=mysql_query($query,$con);
$detail= mysql_fetch_array($res,0);

$classmates=mysql_query("SELECT * FROM user_student WHERE class = '$class'");
//No. of classmates
$classmate_count=mysql_num_rows($classmates);
?>

<html>
<title>The Network|MCE</title>
<link rel="stylesheet" type="text/css" href="../css/style.css">
<link rel="stylesheet" type="text/css" href="../css/contact.css">


<head>
<style>
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
		background-image:url('../images/background.jpg');

}
</style>
<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/contact.js"></script>
<script type="text/javascript" src="../js/jquery.simplemodal.js"></script>
<!--For feedback
!-->
	
<script type="text/javascript">

	$(function() {
		$.ajax({
			type:"POST",
			url:'http://www.vnb.dcetech.com/android/get_data.php',
			data:'year='+<?php echo $class; ?>,
		    dataType: 'json',
			success:function(e){
				$('#notice_text').html(e.data[1].subject);
			}
		});
		$('.aa').fadeOut();
		//$('.aa').css('display', 'block');
		$('#classroom_').fadeIn();
	});

</script>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

<script >

	function myfun(res){
	
		if(res=="classroom"){
				$(".aa").fadeOut();
				$("#classroom_").delay(500).fadeIn(500);

			}
		if(res=="about"){
				$(".aa").fadeOut();
				$("#about_").delay(500).fadeIn(500);
			}
		if(res=="classmates"){
				$(".aa").fadeOut();
				$("#classmates_").delay(500).fadeIn(500);
			}
		if(res=="faculty"){
				$(".aa").fadeOut();
				$("#faculty_").delay(500).fadeIn(500);
			}
		if(res=="timetable"){		
				$(".aa").fadeOut();
				$("#time_table").delay(500).fadeIn(500);
		}

	}


</script>

</head>
<body>
<a href="http://vnb.dcetech.com/" target="_blank"><div id="notice" title="Virtual Notice Board" ><img src="sticky.png" width="30%"></div></a>
<a href="http://vnb.dcetech.com/" target="_blank"><div id="notice_text" title="Latest Notice"><i>Industrial Training Viva</i></div>
</a>
<div id="page-header">
<span id="dp">
<img src="<?php echo "upload/".$detail[5]?>" title="<?php echo $detail[3]?>" height="100" width="100"/>
</span>
<span id="title">
<h1>Department of Applied Mathematics</h1>
<h4><center>Delhi Technological University</center></h4>
</span>
<span id="logo">
<img src="http://www.troika.dcetech.com/img/hover/dce_logo.svg" title="DTU" height="100" width="100"/>
</span>
</div>

<div id="container">
<span id="links">
<div class="nav nav-pills nav-stacked">
<li><a href="javascript:void(0);" onclick="myfun(this.id)" id="classroom" class="links">Classroom</a></li>
<li><a href="javascript:void(0);" onclick="myfun(this.id)" id="about" class="links">Profile</a></li>
<li><a href="javascript:void(0);" onclick="myfun(this.id)" id="classmates" class="links">Classmates</a></li>
<li><a href="javascript:void(0);" onclick="myfun(this.id)" id="faculty" class="links">Faculty</a></li>
<li><a href="javascript:void(0);" onclick="myfun(this.id)" id="timetable" class="links">Time Table</a></li>
<li><a href="logout.php"class="links">Logout</a></li>
</div>
</span>
<span id="detail">
<div id="classroom_" class="aa">
<div>	
	<center><h2><u>Classroom</u></h2></center>
	<input type="button" value="New Post "  class="btn btn-primary btn-xs" id="newpost" ></input>
</div>
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
	<a  href="../comments.php?id=<?php echo $post_id ?>" target="_blank">
	<table class="table">
	
		
			<th><?php echo mysql_result($posts,$i,3);?></th>
			
		
		<tr>
			<td><?php echo mysql_result($posts,$i,4);?></td>
			
		</tr>
		<tr>
			<label id="text-muted"><td>posted by:<?php echo mysql_result($posts,$i,1);?></td>
			<td class="text-muted"><?php echo mysql_result($posts,$i,5);?></td>
			<td class="text-muted"><?php echo mysql_result($posts,$i,6);?></td></label>
		</tr>
	</table>
	</a>
	</div>
	<?php }
	?>
</div>
	
	</div>
<div  id="about_" class="aa">
	<center><label>Profile</label></center>

<table class="table">
<tr>
<th>Name: </th>
<td><?php
echo $detail[3];
?></td>
</tr>
<tr>
<th>Year :</th>
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
<th>Group:</th>
<td><?php
echo $detail[7];
?></td>
</tr><tr>
<th>Date of Birth:</th>
<td><?php
echo $detail[8];
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
<div  id="classmates_"class="aa">

<center><h3>Students of <?php echo $class ?> Year</h3></center>
<div class="scroll">

<?php
for($i=0;$i<$classmate_count;$i++){
	$receiver=mysql_result($classmates,$i,"s_user_name");?>
<a href="../chat/index.php?id=<?php echo $receiver?>" target="_blank">
<!--Function to call messaging -->
<div class="user_detail" >
<span style="float:left;">
<!--table for printing detail of classmates-->
<table class="table" class="table table-bordered" width="200px">
<tr>
<td>Name:</td>
<td><?php echo mysql_result($classmates,$i,"name");?></td>
</tr>
<tr>
<td>Year:</td>
<td><?php echo mysql_result($classmates,$i,"class");?></td>
<td>Group:</td>
<td><?php echo mysql_result($classmates,$i,"group_");?></td>

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
</div>
<div  id="faculty_" class="aa" >
<center><h3>List of Faculty</h3></center>
<div  class="scroll">

<?php
for($i=0;$i<$fac_count;$i++){
	$receiver=mysql_result($faculty,$i,"t_user_name");?>
<a href="javascript:void(0)" >
<!--Function to call messaging -->
<div class="user_detail" style="width:750px"id="<?php echo $receiver ?>"onclick="message(this.id)">
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
<!--img src="images/passport.jpg" width="90px" height="90px"/!-->
</span>
</div>
</a>
<?php
}
?>
</div>
</div >
<div  id="time_table" class="aa">
	<center><label>Time Table</label></center>
</div >
</span>
<span id="clock"><iframe src="http://free.timeanddate.com/clock/i4nschah/n176/fn6/tc0ff/pc99f/fti/tt0/tw0/tm1/ts1/tb1" frameborder="0" width="260" height="25"></iframe>

	</span>
</div>
	

<div id="footer" style="padding-top:10px">
<a  href="#" style="padding-right:50px; padding-left:300px;">About Us</a>
<a href="#" style="padding-right:50px; padding-left:50px;">Team</a>
<a href="#" style="padding-right:50px; padding-left:50px;">Contact us</a>
</div>
</body>
</html>