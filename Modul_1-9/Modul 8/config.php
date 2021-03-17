<?php
// config.php
$dbhost = 'localhost';
$dbuser = 'user';
$dbpass = 'password';
$dbname = 'guestbook';
$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql');
mysql_select_db($dbname);
?>