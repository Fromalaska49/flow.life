<?php
require "get-user-data.php";
$uid = (int) $_SESSION["uid"];
$pid = (int) $_POST["id"];
$sql = "SELECT * FROM likes WHERE id = '$uid' AND pid = '$pid'";
$result = mysql_query($sql);
$num = mysql_num_rows($result);
if ($num==0) {
	$sql1 = "INSERT INTO likes (id, pid)
	VALUES ('$uid', '$pid')";
	$result1 = mysql_query($sql1);
}
else{
	$sql2a = "DELETE FROM likes WHERE id = '$uid' AND pid = '$pid'";
	$result2a = mysql_query($sql2a);
}
?>