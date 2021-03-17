<?php 
if(isset($_GET['id'])){ 
include 'library/config.php'; 
include 'library/opendb.php'; 
$id = $_GET['id']; 
$query = "SELECT name, type, size, content FROM upload WHERE id = '$id'"; 
$result = mysql_query($query) or die('Error, query failed'); 
list($name, $type, $size, $content) = mysql_fetch_array($result); 
header("Content-Disposition: attachment; 
filename=$name"); 
header("Content-length: $size"); 
header("Content-type: $type"); 
echo $content; include 'library/closedb.php'; exit; 
} 
?> 
<html> 
<head> 
<title>Download File From MySQL</title> 
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"> 
</head> 
<body> 
<?php 
include 'library/config.php'; include 'library/opendb.php'; 
$query = "SELECT id, name FROM upload"; 
$result = mysql_query($query) or die('Error, query failed'); 
if(mysql_num_rows($result) == 0){ 
echo "Database is empty <br>"; 
} else{ while(list($id, $name) = mysql_fetch_array($result)) 
{ 
?> 
<a href="download.php?id=<?=$id;?>"><?=$name;?></a><br> 
<?php } } 
include 'library/closedb.php'; 
?> 
</body> 
</html>
<?php 
error_reporting(E_ALL); 
if(isset($_GET['id'])){ 
include 'library/config.php';
include 'library/opendb.php'; 
$id = $_GET['id']; 
$query = "SELECT name, type, size, path FROM upload2 WHERE id = '$id'"; 
$result = mysql_query($query) or die('Error, query failed'); 
list($name, $type, $size, $filePath) = mysql_fetch_array($result); 
header("Content-Disposition: attachment; filename=$name"); 
header("Content-length: $size"); header("Content-type: $type"); 
readfile($filePath); 
include 'library/closedb.php'; exit;
} 
?>