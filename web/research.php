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
<body>

<link rel="stylesheet" type="text/css" href="css/style.css">
<div id="popup" >
<label>Enter your password</label>
<input type="password" >
<input type="button" onclick="" >
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
<div id="add_research">
<form action="upload.php" method="post" enctype="multipart/form-data">
<textarea name="" rows="2" cols="50"/>
<span><input type="file" name="researchPdf"></input></span>
<span><input type="submit" value="Add"></span>
</form>
</div>

</body>

<script>
user= <?php echo $user?>

function action(r_id,type){
			//$("#popup").css("display","block");

	$.ajax({
		url:'research_action.php',
		type:'POST',
		data:'r_id='+r_id+'&type='+type,// + '&user='+user,
		success: function(rr){alert(rr);}
	});
	
}
</script>
</html>
