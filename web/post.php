<?php
include('connection.php');
session_start();
if(!isset($_SESSION['t_user_name'])){
echo "Your session has expired!!!"?>
<br>
<a href="">click here to login</a><?php
$_SESSION['t_user_name'];
}
?>
<html>
<body>
<table>
<?php 
$user=$_SESSION['t_user_name'];
$query="SELECT * FROM posts WHERE t_user_name='$user'";
$rows=mysql_query($query)or  die('Could not connect: ' . mysql_error());;
$count=mysql_num_rows($rows);
for($i=0;$i<$count;$i++)
{?>
	<tr>
	<?php echo mysql_result($rows,$i,"post_text") ?><br/>
	</tr>
<?php
}
?>
<tr>
<input type="textarea" id="comment"></input>
<input  type="submit" value="comment" onclick="csubmit()"></input>
</tr>

</table>
</body>
<script>
function csubmit(res){
	var comment=$('#comment').val();
$.ajax({
	url:'post_action.php',
	type:'POST',
	data: 'comment='+ comment,
	success:function(){
		$("#detail").load("post.php");
		//location.reload();
	}
});
}
</script>
</html>
