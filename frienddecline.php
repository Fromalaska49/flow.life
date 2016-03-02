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
$fid = $_POST["fid"];
if ($uid==$fid) {
	//do nothing
}
else {
	$sql2 = "DELETE FROM prefriends WHERE senderid='$fid' AND recipientid='$uid'";
	$result2 = mysql_query($sql2);
}
?>