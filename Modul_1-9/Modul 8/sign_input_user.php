<?php
if(isset($_POST['upload']))
{
include 'config.php';
$username=trim($_POST['tusername']);
$password=md5(trim($_POST['tpassword']));
if( (empty($username)) || (empty($password)) )
{
$message = "Data Not Valid";
}
else {
$kueri="select * from user where username='$username'";
$hasil= mysql_query($kueri,$conn) or die('Error, query failed usernsme. ' . mysql_error());
$result=mysql_fetch_array($hasil);
//if there is same username
if($result !=0)
{
$message = "There is same username ";
}
else {
$query = "insert into user (username, password)".
"VALUES ('$username','$password')";
mysql_query($query) or die('Error, query failed' . mysql_error());
mysql_close($conn);
echo "Add User Administrator '$username'
SUCCESS";
exit;
}
}
}
?>
<html>
<head>
<title>Input User Admin</title>
</head>
<body>
<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0" class="content">
<tr>
<td><center>
<font color="#FF0000"><? echo $message?></font>
</center></td>
</tr>
</table>
<form action="<?=$PHP_SELF?>" method="post" name="uploadform" id="uploadform">
<table width="90%" border="0" align="center" cellpadding="2" cellspacing="2" class="content">
<tr bgcolor="#FFDFAA">
<td colspan="3"><div align="center"><strong>Add User Administrator </strong></div></td>
</tr>
<tr>
<td width="26%"><strong>Username</strong></td>
<td width="2%">:</td>
<td width="72%"><input name="tusername" type="text" id="tusername" size="20" maxlength="20">
<span class="style2">*</span> </td>
</tr>
<tr>
<td><strong>Password</strong></td>
<td>:</td>
<td><input name="tpassword" type="password" id="tpassword" size="20" maxlength="20">
<span class="style2">*</span> </td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td><input name="upload" type="submit" class="box" id="upload" value=" Submit"></td>
</tr>
</table>
</form>
<p></p>
</body>
</html>