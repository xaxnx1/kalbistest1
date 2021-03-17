<?php
session_start();
if(empty($_SESSION['sadmin_username'])) {
header('Location: login.php ');
}
?>
<?php
if(isset($_POST['btnUpdate']))
{
include ("config.php");
$name=trim($_POST['tname']);
$email=trim($_POST['temail']);
$content=trim($_POST['tcontent']);
$query = "UPDATE visitors SET name='$name',email='$email',comment='$content' WHERE id='$id'";
mysql_query($query,$conn) or die('Error, query failed. ' . mysql_error());
header("Location: admin.php");
exit;
}
?>
<p>
<?php
include 'config.php';
$id = $_GET['updt'];
$query = "SELECT * FROM visitors WHERE id = '$id'";
$result = mysql_query($query) or die('Error, query failed. ' . mysql_error());
$row = mysql_fetch_array($result);
list($id, $name, $email, $content, $date, $ip) = $row;
?>
<form method="post" name="updateform" id="updateform">
<table width="100%" border="0" align="center" cellpadding="2" cellspacing="2" class="content">
<tr bgcolor="#FFDFAA">
<td colspan="3"><div align="center"><strong>Update Guestbook </strong></div></td>
</tr>
<tr>
<td width="27%" align="left" valign="top">Nama</td>
<td width="2%" align="center" valign="top">:</td>
<td width="71%" valign="top"><input name="tname" type="text" id="tname" size="50" maxlength="100" value="<?=$name;?>">
<input name="id" type="hidden" id="id" value="<?=$id;?>"></td>
</tr>
<tr>
<td align="left" valign="top">Email</td>
<td align="center" valign="top">:</td>
<td valign="top"><input name="temail" type="text" id="temail" size="50" maxlength="50" value="<?=$email;?>"></td>
</tr>
<tr>
<td align="left" valign="top">Comment</td>
<td align="center" valign="top">:</td>
<td valign="top">&nbsp;</td>
</tr>
<tr>
<td colspan="3" align="left" valign="top"><textarea name="tcontent" cols="60" rows="15" id="tcontent"><?=$content;?>
</textarea></td>
</tr>
<tr>
<td align="left" valign="top">&nbsp;</td>
<td align="center" valign="top">&nbsp;</td>
<td valign="top"><input name="btnUpdate" type="submit" class="box" id="btnUpdate" value="Update"></td>
</tr>
</table>
</form>
<p></p>