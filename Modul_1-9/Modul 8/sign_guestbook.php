<?php
if(isset($_POST['upload']))
{
include 'config.php';
$name=htmlentities(trim($_POST['tname']));
$email=htmlentities(trim($_POST['temail']));
$content=nl2br(htmlentities(trim($_POST['tcontent'])));
$date=date("j F Y, g:i a");
$ip1 = $_SERVER["REMOTE_ADDR"];
$ip2 = getenv("HTTP_X_FORWARDED_FOR");
$ip = $ip1 . '-' . $ip2;
if( (empty($name)) || (empty($email)) || (empty($content)) ) {
header('Location: error.php');
exit;
} else {
$query = "insert into visitors (name,email,comment,date,ip)".
"VALUES ('$name','$email','$content','$date','$ip')";
mysql_query($query) or die('Error, query failed' . mysql_error());
mysql_close($conn);
header('Location: index.php');
exit;
}
}
?>
<html>
<head>
<title>Sign Guestbook</title>
</head>
<body>
<p>
<form action="<?=$PHP_SELF?>" method="post" name="uploadform" id="uploadform">
<table width="90%" border="0" align="center" cellpadding="2" cellspacing="2" class="content">
<tr bgcolor="#FFDFAA">
<td colspan="3"><div align="center"><strong>Sign GuestBook </strong></div></td>
</tr>
<tr>
<td colspan="3" valign="top"><div align="center"><a href="index.php">Cancel</a></div></td>
</tr>
<tr>
<td width="26%" valign="top"><strong>Name <span class="style1">*</span></strong></td>
<td width="2%">:</td>
<td width="72%"><input name="tname" type="text" id="tname" size="30" maxlength="30">
<span class="style1"> </span></td>
</tr>
<tr>
<td valign="top"><strong>Email <span class="style1">*</span></strong></td>
<td>:</td>
<td><input name="temail" type="text" id="temail" size="30" maxlength="30">
</td>
</tr>
<tr>
<td valign="middle"><strong>Message <span class="style1">*</span></strong></td>
<td>:</td>
<td valign="top"><textarea name="tcontent" cols="50" rows="5" id="tcontent"></textarea></td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td><input name="upload" type="submit" class="box" id="upload" value=" Submit"></td>
</tr>
<tr>
<td colspan="3"><span class="style1">*</span> : Must Entry Data </td>
</tr>
</table>
</form>
</body>
</html>