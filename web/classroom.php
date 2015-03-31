<?php 
session_start();
include('connection.php');
$user=$_SESSION['t_user_name'];
$query="SELECT * FROM posts";
$result=mysql_query($query);
?>
<html>
<link rel="stylesheet" type="text/css" href="css/style.css	"/>
<script src="js/style.js" type="text/javascript"></script>
<body>
<div>
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
function loadclass(classid){
	var classroom='classrooms/'+classid+'.php';
	$('#content1').load(classroom);
	
}
</script>
</body>
</html>