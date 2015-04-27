<?php
include('connection.php');
session_start();
$post_id=$_GET['id'];
$post=mysql_query("SELECT * FROM posts WHERE post_id=$post_id");
$user_class=$_SESSION['class'];
$post_class=mysql_result($post,0,"class");
if($post_class!=$user_class){
	
	header('location:login.php');
}
$query="SELECT * FROM comments where post_id=$post_id";
$comments=mysql_query($query);
$no_of_comments=mysql_num_rows($comments);
if($no_of_comments==0){
	echo "No comments on this post";
}else{
	for($i=0;$i<$no_of_comments;$i++){
mysql_result( $comments,$i,"comments");
	}
}
?>

<html>
<title>
Comments
</title>
<style>
#comments{
	display:block;
	margin-left:20%;
	margin-top:100px;
	width:60%;
	height:500px;
	overflow-y:scroll;
	z-index:20;
	background-color:#abc329;

}
#post_text{
	font-size:80px;
}
</style>
<body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<div id="page-header"><h1>
<center>
<?php echo mysql_result($post,0,"post_title");?>
</center>
</h1>
</div>

<div id="comments">
<?php
for($i=0;$i<$no_of_comments;$i++){
echo mysql_result( $comments,$i,"comments");?><br><?php
}
?>
<input type="text" name="comment" id="comment"></input>
<input type="submit" value="Comment" onclick="post_comment('<?php echo $post_id?>')"></input>
</div>
</body>


<script>
function post_comment(id){
	var text=$('#comment').val();
	//alert(id);
	$.ajax({
		type:"POST",
		url:"action.php",
		data:"text="+text+"&id="+id,
		success:function(e){
			location.reload();		}
		
	});
	
}
</script>
</html>