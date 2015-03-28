<?php 
session_start();
include('connection.php');
$user=$_SESSION['t_user_name'];
$query="SELECT * FROM posts";
mysql_query($query);
?>
<html>
<link rel="stylesheet" type="text/css" href="css/style.css	"/>
<script src="js/style.js" type="text/javascript"></script>
<body>
<style>
.ff{
	background-color:#231;
	float:right;
	margin-right:3px;
	padding:7;
	border:none;
	width:70px;
}
.classtab{
	background-color:55550;
	padding:2px;
	border-radius:6px;
margin-left:30px;
margin-right:30px;
}
</style>
<div>
<span class="classtab"><a href="javascript:void(0);" onclick="loadclass(this.id)" id="2" >Second Year</a></span>
<span class="classtab"><a href="javascript:void(0);" onclick="loadclass(this.id)" id="3" >Third Year</a></span>
<span class="classtab"><a href="javascript:void(0);" onclick="loadclass(this.id)" id="4" >Fourth Year</a></span>
<!-- div for new post-->
<div id="newpost">
<textarea id="" cols="80" rows="7" style="resize:none"></textarea>
  <input type="button" value="Post" class="ff"/>

<select class="ff" title="Select Class">
  <option value="1234">All</option>
  <option value="2">Second</option>
  <option value="3">Third</option>
  <option value="4">Fourth</option>
</select>
</div>
<!--Displays all the posts of classroom-->
<div id="posts">
</div>
</div>
</body>
</html>