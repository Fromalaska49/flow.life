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

$id = mysql_real_escape_string($_GET["id"]);
$post = mysql_real_escape_string($_GET["t"]);

$uid = mysql_real_escape_string($_SESSION['uid']);

$day = date('l');

$sql = "INSERT INTO classposts (classid, fid, post, day)
VALUES ('$id', '$uid', '$post', '$day')";
mysql_query($sql);

$sql = "SELECT * FROM classposts WHERE pid='$id'";
$result = mysql_query($sql);
$row = mysql_fetch_array($result);
$classid = $row["classid"];

$redirect = "Location: class.php?id=" . $classid;
header($redirect);
?>