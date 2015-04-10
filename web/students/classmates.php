<?php
include('../connection.php');
session_start();
if(!isset($_SESSION['s_user_name'])){
	header('location:login.php');
}
$class=$_SESSION['class'];
//Details of all classmates
$res=mysql_query("SELECT * FROM user_student WHERE class='$class'");
//No. of classmates
$count=mysql_num_rows($res);
?>
<html>

<body>
<style>
.user_detail{
	background-color: #123456;
	width: 750px;
	height: 70px;
	margin-top:1%;}
td{
	color:300456;
}
</style>
<div>
<center><h3>Students of <?php echo $class ?> Year</h3></center>
</div>
<?php
for($i=0;$i<$count;$i++){
	$receiver=mysql_result($res,$i,"s_user_name");?>
<a href="javascript:void(0)" >
<!--Function to call messaging -->
<div class="user_detail" id="<?php echo $receiver ?>"onclick="message(this.id)">
<span style="float:left;">
<!--table for printing detail of classmates-->
<table cellspacing="4" cellpadding="2">
<tr>
<td>Name:
<td><?php echo mysql_result($res,$i,"name");?>
</tr>
<tr>
<td>Year:
<td><?php echo mysql_result($res,$i,"class");?>
<td>Group:
<td><?php echo mysql_result($res,$i,"group");?>

<td>Email-id:
<td><?php echo mysql_result($res,$i,"email");?>
</tr>
</table>
</span>
<span style="float:right;">
<img src="../images/passport.jpg" width="70px" height="70px">
</span>
</div>
</a>
<?php
}
?>
<script type="text/javascript" src="../js/jquery.js"></script>

<script>
function message(receiver){
	$("#chat").load("../chatbox2");
	alert(receiver);
}
</script>
</body>
</html>