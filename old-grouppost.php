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

$sql = "INSERT INTO groupposts (groupid, fid, post, day)
VALUES ('$id', '$uid', '$post', '$day')";
mysql_query($sql);
?>