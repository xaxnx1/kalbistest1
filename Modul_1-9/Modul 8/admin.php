<?php
session_start();
if(empty($_SESSION['sadmin_username'])) {
header('Location: login.php ');
}
?>
<?php
include 'config.php';
// how many rows to show per page
$rowsPerPage = 5;
// by default we show first page
$pageNum = 1;
// if $_GET['page'] defined, use it as page number
if(isset($_GET['page']))
{
$pageNum = $_GET['page'];
}
// counting the offset
$offset = ($pageNum - 1) * $rowsPerPage;
$query = "SELECT * FROM visitors ORDER BY 'id' DESC LIMIT $offset, $rowsPerPage";
$result = mysql_query($query) or die('Error, query failed');
//jumlah total
$query1 = "SELECT COUNT(id) AS numrows FROM visitors";
$result1 = mysql_query($query1) or die('Error, query failed');
$row1 = mysql_fetch_array($result1, MYSQL_ASSOC);
$numrows = $row1['numrows'];
echo "Total Number GuestBook : $numrows";
?>
</p>
<p align="center">List GuestBook <br>
<a href="logout.php">Logout
</a></p>
<table width="90%" border="1" align="center" cellpadding="2" cellspacing="2" class="content">
<tr valign="top" bgcolor="#FFDFAA">
<td width="8%"><div align="center"><strong>No</strong></div></td>
<td width="56%"><div align="center"><strong>guestbook</strong></div></td>
<td width="9%"><strong>Delete</strong></td>
<td width="9%"><div align="center"><strong>Update</strong></div></td>
</tr>
<?php
$no=1;
while($hasil=mysql_fetch_array($result)) {
?>
<tr valign="top">
<td><? echo $no; ?></td>
<td>From : <? echo $hasil['name']; ?><br>
<?php 
echo $hasil['comment']; 
?>
</td>
<td><a href="delete.php?del=<?=$hasil['id'];?>">Delete</a></td>
<td><a href="update.php?updt=<?=$hasil['id'];?>">Update</a></td>
</tr>
<?php 
$no++; } 
?>
</table>
<?php
// how many rows we have in database
$query = "SELECT COUNT(id) AS numrows FROM visitors";
$result = mysql_query($query) or die('Error, query failed');
$row = mysql_fetch_array($result, MYSQL_ASSOC);
$numrows = $row['numrows'];
// how many pages we have when using paging?
$maxPage = ceil($numrows/$rowsPerPage);
// print the link to access each page
$self = $_SERVER['PHP_SELF'];
$nav = '';
for($page = 1; $page <= $maxPage; $page++)
{
if ($page == $pageNum)
{
$nav .= " $page "; // no need to create a link to current page
}
else
{
$nav .= " <a href=\"$self?page=$page\">$page</a> ";
}
}
// creating previous and next link
// plus the link to go straight to
// the first and last page
if ($pageNum > 1)
{
$page = $pageNum - 1;
$prev = " <a href=\"$self?page=$page\">[Prev]</a> ";
$first = " <a href=\"$self?page=1\">[First Page]</a> ";
}
else
{
$prev = '&nbsp;'; // we're on page one, don't print previous link
$first = '&nbsp;'; // nor the first page link
}
if ($pageNum < $maxPage)
{
$page = $pageNum + 1;
$next = " <a href=\"$self?page=$page\">[Next]</a> ";
$last = " <a href=\"$self?page=$maxPage\">[Last Page]</a> ";
}
else
{
$next = '&nbsp;'; // we're on the last page, don't print next link
$last = '&nbsp;'; // nor the last page link
}
// print the navigation link
echo "<center>$first "." $prev "." $nav "." $next "." $last</center>";
?>
<?php
mysql_close($conn);
?>