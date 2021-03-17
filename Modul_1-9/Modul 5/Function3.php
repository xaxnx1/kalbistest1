<html>
<head>
<title>Passing Argument by Reference</title>
</head>
<body>
<?php
functionaddFive($num)
{
$num += 5;
}
functionaddSix(&$num)
{
$num += 6;
}
$orignum = 10;
addFive( &$orignum );
echo "Original Value is $orignum<br />";
addSix( $orignum );
echo "Original Value is $orignum<br />";
?>
</body>
</html>