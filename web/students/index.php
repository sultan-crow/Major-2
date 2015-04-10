<?php
session_start();
require_once '../connection.php';
if(!isset($_SESSION['s_user_name']))
{
	header('location:login.php');
}

$user=($_SESSION['s_user_name']);
$query="SELECT * FROM user_student WHERE s_user_name='$user'";
$res=mysql_query($query,$con);
$detail= mysql_fetch_array($res,0);
//echo $detail[0];
?>

<html>
<title>The Network|MCE</title>
<link rel="stylesheet" type="text/css" href="../css/style.css">

<head>
<script type="text/javascript" src="../js/jquery.js"></script>
<script src="../js/style.js" type="text/javascript"></script>

</head>
<body>
<script>
$(".aa").fadeOut();
$(".aa").css("display","block");
$("#classroom_").fadeIn();


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
		<?php
		$class=$_SESSION['class'];
//Details of all classmates
$classmates=mysql_query("SELECT * FROM user_student WHERE class='$class'");
//No. of classmates
$count=mysql_num_rows($classmates);
?>
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

<div id="content1">
<?php 
$count_post=mysql_num_rows($classroom);
for( $i=0;$i<$count;$i++){
echo mysql_result($classroom,$i,4);
echo mysql_result($classroom,$i,5);
echo mysql_result($classroom,$i,6);
}
?>

</div>

</div >
<div  id="about_" class="aa">
helloa
</div >
<div  id="classmates_"class="aa">
<center><h3>Students of <?php echo $class ?> Year</h3></center>

<?php
for($i=0;$i<$count;$i++){
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
hellof
</div >
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
<script>
//$(".aa").css("display","block");
$("#classroom_").fadeIn();
</script>
</body>


</html>