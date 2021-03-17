<?php
if($_GET[del])
{
$id=(int)$_GET[del];
include ("config.php");
$queri="delete from visitors where id=$id";
mysql_query($queri,$conn);
header("Location:index.php");
exit;
}
?>