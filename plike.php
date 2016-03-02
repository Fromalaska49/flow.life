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
$pid = $_POST["id"];
	$connect = mysql_connect('localhost','root','');
	if (!$connect){
		echo('cannot connect<br />');
	}
	mysql_select_db("thesocialnetwork");
	$sql = "SELECT * FROM likes WHERE id = '$uid' AND pid = '$pid'";
	$result = mysql_query($sql);
	$num = mysql_num_rows($result);
	if ($num==0) {
		$sql1 = "INSERT INTO likes (id, pid)
		VALUES ('$uid', '$pid')";
		$result1 = mysql_query($sql1);
	}
	else if ($num==1) {
		$sql2a = "DELETE FROM likes WHERE id = '$uid' AND pid = '$pid'";
		$result2a = mysql_query($sql2a);
	}
	else {

	}
?>