<?php
$connect = mysql_connect('localhost', 'root', 'bitnami');
if (!$connect){
	echo('cannot connect\n');
}
mysql_select_db("socialnetwork");
session_start();
if (!isset($_SESSION['uid'])) {
header("Location: index.html");
}
$text = mysql_real_escape_string($_POST["text"]);


$uid = mysql_real_escape_string($_SESSION['uid']);

$day = date('l');

$time = time();

$sql = "INSERT INTO `posts` (`fid`, `post`, `day`, `time`)
VALUES ('$uid', '$post', '$day', '$time')";
mysql_query($sql);
?>