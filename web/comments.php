<?php
include('connection.php');
session_start();
$post_id=$_GET['id'];
$post=mysql_query("SELECT * FROM posts WHERE post_id=$post_id");
$user_class=$_SESSION['class'];
$post_class=mysql_result($post,0,"class");
/*if(!isset($_SESSION['t_user_name'])){
if($post_class!=$user_class){
	
	header('location:login.php');
}
}
*/

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
	width:70%;
	height:450px;
	overflow-y:scroll;
	background-color:#abc329;

}
#post_text{
	font-size:80px;
}
.name{
	background-color:#aa1023;
	margin:1px;
	padding:1px;
	font-size:30px;
	margin-right:15px;
	margin-left:15px;
}
.text{
	font-size:25px;
		font-family: sans-serif;



}
.time{
	font-size:8px;
		background-color:#E6E6E6;
		float:right;
		float:bottom;
		font-family: sans-serif;


}
.date{
	font-size:12px;
		background-color:#E6E6E6;
		float:right;
		font-family: sans-serif;
		float:bottom;

}
.row{
	margin:2px;
		background-color:#aa1023;
		

}
#page-header{}	
</style>
<body>
<script src="js/jquery.min.js"></script>
<link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>

<div id="page-header">
<h1>
<center>
<?php echo mysql_result($post,0,"post_title");?>
</center>
</h1>
</div>
<div>
<h3>
<center>
<?php echo mysql_result($post,0,"post_text");?>
</center>
</h3>
</div>
<div id="comments">
<div id="text">

</div>
<form name="comm">
<input type="text" name="comment" id="comment" style="width:300px; height:30px; resize:none"></textarea>
<input type="button" value="Comment" class="btn btn-info active" onclick="post_comment('<?php echo $post_id?>')" id="button"></input>
</div>
</form>
</body>


<script>
$(document).ready(function(){
	load_comments();
	$('form').submit(function(){
		post_comment('<?php echo $post_id?>');
		return false;
	});
	var h=$('#comments').prop('scrollHeight');
	$('#comments').scrollTop(h+5);
	
});
function load_comments(){

	var id= "<?php echo $post_id ?>";

	$.ajax({
		type:"GET",
		url:"comment_logs.php",
		data:"id="+id,
		success:function(e){
			json = JSON.parse(e);
			var num = json.num;
			$('#text').html('');

			for(var i=0;i<num;i+=1){
				name=json[i].name;
				text=json[i].comments;
				date=json[i].date;
				time=json[i].time;
				var com='<div class=\"row\"><span class=\"name\">'+name+'</span><span class=\"text\">'+text+'</span><spanc class=\"date\">'+date+'</span><span class=\"time\">'+time+'</span></div>';
				$('#text').append(com);
				
			}
		}
	});
	$('#comments').scrollTop(h+25);

var h=$('#comments').prop('scrollHeight');

	}
function post_comment(id){
	var text=$('#comment').val();
	$.ajax({
		type:"POST",
		url:"comment_action.php",
		data:"text="+text+"&id="+id,
		success:function(e){
		load_comments();		}
		
	});
	var h=$('#comments').prop('scrollHeight');
	$('#comments').scrollTop(h+25);
	
}
</script>
</html>