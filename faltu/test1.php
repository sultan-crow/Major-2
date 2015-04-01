<?php
require_once('web/connection.php');
require_once('web/config.php');
$res=mysql_query('select * from user_fac',$con);
echo mysql_result($res,1,"name");
?>