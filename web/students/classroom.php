<?php 
session_start();
include('../connection.php');
$user=$_SESSION['s_user_name'];
//Query for finding the class of logged in studnet
$class=mysql_result(mysql_query("SELECT class FROM user_student WHERE s_user_name='$user'"),0,0);
$query="SELECT * FROM posts WHERE class='$class'";
$result=mysql_query($query) or die( mysql_error());

?>
<html>
<link rel="stylesheet" type="text/css" href="../css/style.css	"/>
<script src="../js/style.js" type="text/javascript"></script>
<body>

<!--Displays all the posts of classroom-->
<div id="content1">
<?php 
$count=mysql_num_rows($result);
for( $i=0;$i<$count;$i++){
echo mysql_result($result,$i,4);
echo mysql_result($result,$i,5);
echo mysql_result($result,$i,6);
}
?>

</div>

</body>
</html>