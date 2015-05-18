<?php 
include('connection.php');
$post_id=$_GET['id'];
$query="SELECT * FROM comments where post_id=$post_id";
$comments=mysql_query($query) or die(mysql_error());
$no_of_comments=mysql_num_rows($comments);
$arr=array();
if($no_of_comments==0){
	echo "No comments on this post";
}else{
	$arr["num"] = $no_of_comments;
	for($i=0;$i<$no_of_comments;$i++){
$user=mysql_result( $comments,$i,"user_id");
$name= mysql_query("SELECT name FROM user_student WHERE s_user_name='$user'")or die(mysql_error());

$arr[$i]['name']=explode(" ",mysql_result($name,0,"name"))[0];

$arr[$i]['comments']=mysql_result( $comments,$i,"comments");
$arr[$i]['date']=mysql_result( $comments,$i,"date");
$arr[$i]['time']=mysql_result( $comments,$i,"time");
	}
}
echo json_encode($arr);

?>