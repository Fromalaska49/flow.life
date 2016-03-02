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
$cid = $_GET["cid"];


$sql2a = "SELECT * FROM classmembers WHERE classid='$cid' AND uid='$uid'";
$result2a = mysql_query($sql2a);
$num = mysql_num_rows($result2a);


if ($num==0) {
$sql = "INSERT INTO classmembers (classid, uid)
VALUES ('$cid', '$uid')";
mysql_query($sql);
}
else if ($num==1) {
$sql2a = "DELETE FROM classmembers WHERE classid='$cid' AND uid='$uid'";
$result2a = mysql_query($sql2a);
}
?>