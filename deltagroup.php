<?php
$connect = mysql_connect('localhost', 'root', 'bitnami');
if (!$connect){
	echo('cannot connect\n');
}
mysql_select_db("socialnetwork");
session_start();
if (!isset($_SESSION['uid'])) {
header("Location: login.html");
}
$uid = $_SESSION["uid"];
$gid = $_GET["id"];

$connect = mysql_connect('localhost','root','');
if (!$connect){
	echo('cannot connect<br />');
}

mysql_select_db("thesocialnetwork");

$sql2a = "SELECT * FROM groupmembers WHERE groupid='$gid' AND uid='$uid'";
$result2a = mysql_query($sql2a);
$num = mysql_num_rows($result2a);

if ($num==0) {
	$sql = "INSERT INTO groupmembers (groupid, uid)
	VALUES ('$gid', '$uid')";
	mysql_query($sql);
}
	else if ($num==1) {
	$sql2a = "DELETE FROM groupmembers WHERE groupid='$gid' AND uid='$uid'";
	$result2a = mysql_query($sql2a);
}
else {

}
?>