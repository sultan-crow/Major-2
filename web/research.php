<?php
include('connection.php');
session_start();
if(!isset($_SESSION['t_user_name']))
{
	header('location:login.php');
}
$user = $_SESSION['t_user_name'];

$query="SELECT * FROM research WHERE t_user_name='$user'";
$result=mysql_query($query,$con);
$count= mysql_num_rows($result);


?>
<html>
<style>
#title1{
	font-size:30px;
}
#content1{
	background-color:white;
	text-color:blue;
	font-color:red;
	overflow-y:scroll;
	
}
#cc{
	background-color:green;
	padding:3%;
	margin-bottom:1%;
	border-radius:3px;
	font-size:50px;
	font-color:white;
	
	
}a{
		color:blue;
		
	}
	a:link {
    text-decoration: none;
}

a:visited {
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
}

a:active {
    text-decoration: underline;
}
#delete{
	float:right;
	float:top;
	
}
#popup{
	
	z-index: 1000;
	position: absolute;
	background-color: #effcc;
	margin-left:40%;
	border: 1px solid black;
	width: 250px;
	height: 150px;
	display:none;
	
}
</style>
<body>
<div id="popup" >
<label>Enter your password</label>
<input type="password" >
</div>

<div id="title1">
<center>Research Papers Published</center>
</div>
<div id="content1">
<?php
for($i=0;$i<$count;$i++){?>
<a href="<?php	echo mysql_result($result,$i,3);?>">
<div id="cc">
<?php echo mysql_result($result,$i,1);
?></a>

<span id="delete">
<input type="button" value="delete" onclick="action('<?php echo mysql_result($result,$i,0); ?>',this.id)">
<span id="edit">
<input type="button" value="edit" onclick="action('<?php echo mysql_result($result,$i,0); ?>',this.id)">
</div>
<?php
}?>
</div>
</body>

<script>
user= <?php echo $user?>

function action(r_id,type){
			$("#popup").css("display","block");

	$.ajax({
		url:'research_action.php',
		type:'POST',
		data:'r_id='+r_id+'&type='+type,// + '&user='+user,
		success: function(rr){alert(rr);}
	});
	
}
</script>
</html>
