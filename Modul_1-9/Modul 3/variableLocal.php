<html>
<body>
<?php 
$x=50; // global scope 
function myTest(){	
echo $x; // local scope 
} 
myTest(); 
?>
<p>Variable tidak terdefinisi, makanya hasil tidak muncul</p>
</body>
</html>