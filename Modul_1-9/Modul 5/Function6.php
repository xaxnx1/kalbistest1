<html>
<head>
<title>Dynamic Function Calls</title>
</head>
<body>
<?php
functionsayHello()
{
echo "Hello<br />";
}
$function_holder = "sayHello";
$function_holder();
?>
</body>
</html>