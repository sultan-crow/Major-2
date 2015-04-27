<?php
session_start();
include('connection.php');
if(!isset($_SESSION['t_user_name']))
{
	header('location:login.php');
}

$user=($_SESSION['t_user_name']);
$query="SELECT * FROM user_fac WHERE t_user_name='$user'";
$res=mysql_query($query,$con);
$detail= mysql_fetch_array($res,0);
$students=mysql_query("SELECT * FROM user_student");
$faculty=mysql_query("SELECT * FROM user_fac");
//echo $detail[0];
?>

<html>
<title>The Network|MCE</title>
<link rel="stylesheet" type="text/css" href="css/style.css">

<head>
<script type="text/javascript" src="js/jquery.js"></script>
<script src="js/style.js" type="text/javascript"></script>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

</head>
<script type="text/javascript">

	$(function() {
		$(".aa").fadeOut();
//$(".aa").css("display","block");
$("#about_").fadeIn();
	});

</script>
<script>


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
<style>

</style>

<div id="content">
<span id="links">
<a href="javascript:void(0);" onclick="myfun(this.id)" id="about" class="links">About</a><br>
<a href="javascript:void(0);" onclick="myfun(this.id)" id="research" class="links">Research</a><br>
<a href="javascript:void(0);" onclick="myfun(this.id)" id="post" class="links">Posts</a><br>
<a href="javascript:void(0);" onclick="myfun(this.id)" id="classroom" class="links">Classroom</a><br>
<a href="javascript:void(0);" onclick="myfun(this.id)" id="faculty" class="links">Faculty</a><br>
<a href="javascript:void(0);" onclick="myfun(this.id)" id="students" class="links">Students</a><br>
<a href="logout.php"class="links">Logout</a><br>
</span>
<span id="detail">

<div id="about_" class="aa">
jj
</div>
<div id="research_" class="aa">res
</div>
<div id="post_" class="aa">post
</div>
<div id="classroom_" class="aa">
<span class="classtab"><a href="javascript:void(0);" onclick="loadclass(this.id)" id="2" >Second Year</a></span>
<span class="classtab"><a href="javascript:void(0);" onclick="loadclass(this.id)" id="3" >Third Year</a></span>
<span class="classtab"><a href="javascript:void(0);" onclick="loadclass(this.id)" id="4" >Fourth Year</a></span>
<!-- div for new post-->
<div id="newpost">
<textarea id="" cols="80" rows="7" style="resize:none"></textarea>
  <input type="button" value="Post" class="ff"/>

<select class="ff" title="Select Class" style="{width:20px}">
  <option value="1234">All</option>
  <option value="2">Second</option>
  <option value="3">Third</option>
  <option value="4">Fourth</option>
</select>
</div>
<!--Displays all the posts of classroom-->
<div id="content1">

</div>
</div>

<script>
	$('#content1').load('classroom_posts.php');

function loadclass(classid){
var classroom='classrooms/'+classid+'.php';

	$.ajax({
		url:'classroom_action.php',
		type:'post',
		data:'classs='+classid,
		success:function(ss){
				$('#content1').load('classroom_posts.php');
		}
	});
	
}
</script>
</div>
<div id="faculty_" class="aa">
<center><h3>List of Teachers</h3></center>

<?php
$count=mysql_num_rows($faculty);
for($i=0;$i<$count;$i++){
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
<td>Designation:</td>
<td><?php echo mysql_result($faculty,$i,"designation");?></td>
<td>Qualification:</td>
<td><?php echo mysql_result($faculty,$i,"qualification");?></td>

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
?>
</div>


<div id="students_" class="aa">
<center><h3>List of Students</h3></center>

<?php
$count=mysql_num_rows($students);
for($i=0;$i<$count;$i++){
	$receiver=mysql_result($students,$i,"s_user_name");?>
<a href="javascript:void(0)" >
<!--Function to call messaging -->
<div class="user_detail" id="<?php echo $receiver ?>"onclick="message(this.id)">
<span style="float:left;">
<!--table for printing detail of classmates-->
<table cellspacing="4" cellpadding="2">
<tr>
<td>Name:</td>
<td><?php echo mysql_result($students,$i,"name");?></td>
</tr>
<tr>
<td>Year:</td>
<td><?php echo mysql_result($students,$i,"class");?></td>
<td>Group:</td>
<td><?php echo mysql_result($students,$i,"group");?></td>

<td>Email-id:</td>
<td><?php echo mysql_result($students,$i,"email");?></td>
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
</div>
</span>

<span id="chat"></span>

</div>
<div id="footer">
<a  href="#" style="padding-right:50px; padding-left:300px;">About Us</a>
<a href="#" style="padding-right:50px; padding-left:50px;">Team</a>
<a href="#" style="padding-right:50px; padding-left:50px;">Contact us</a>
</div>

</body>


</html>