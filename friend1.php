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
	$sql = "SELECT * FROM friends WHERE uid = '$uid' AND fid = '$fid'";
	$result = mysql_query($sql);
	$num = mysql_num_rows($result);
	if ($num==0) {
		$sql1a = "SELECT * FROM prefriends WHERE senderid = '$uid' AND recipientid = '$fid'";
		$result1a = mysql_query($sql1a);
		$num1a = mysql_num_rows($result1a);
		if($num1a>0){
			//do nothing
		}
		else {
			$sql1b = "SELECT * FROM prefriends WHERE senderid = '$fid' AND recipientid = '$uid'";
			$result1b = mysql_query($sql1b);
			$num1b = mysql_num_rows($result1b);
			if($num1b==0){
				$sql2a = "INSERT INTO prefriends
				VALUES ('$uid', '$fid')";
				mysql_query($sql2a);		
			}
			if($num1b==1){
				$sql2a = "INSERT INTO friends
				VALUES ('$uid', '$fid')";
				mysql_query($sql2a);

				$sql2b = "INSERT INTO friends
				VALUES ('$fid', '$uid')";
				mysql_query($sql2b);

				$sql2c = "DELETE FROM prefriends WHERE senderid = '$fid' AND recipientid = '$uid'";
				$result2a = mysql_query($sql2c);		
			}
		}
	}
	else if ($num==1) {
		$sql2a = "DELETE FROM friends WHERE uid = '$uid' AND fid = '$fid'";
		$result2a = mysql_query($sql2a);
		$sql2b = "DELETE FROM friends WHERE uid = '$fid' AND fid = '$uid'";
		$result2b = mysql_query($sql2b);
	}
	else {
		//unexpexted argument
	}
}
?>