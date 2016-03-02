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

$comment = mysql_real_escape_string($_POST['comment']);
$pid = mysql_real_escape_string($_POST['id']);

$uid = mysql_real_escape_string($_SESSION['uid']);

$day = date('l');

$sql = "INSERT INTO classpostc (pid, fid, comment, day)
VALUES ('$pid', '$uid', '$comment', '$day')";
$result = mysql_query($sql);
if(!$result){
echo("no result");
}

$sql = "SELECT * FROM classposts WHERE pid='$pid'";
$result = mysql_query($sql);
$row = mysql_fetch_array($result);
$classid = $row["classid"];

$redirect = "Location: class.php?id=" . $classid;
header($redirect);
?>