<?php
require("get-user-data.php");
$fid = $_POST["fid"];
if ($uid==$fid) {
	//do nothing
}
else {
	$sql2 = "DELETE FROM prefriends WHERE senderid='$fid' AND recipientid='$uid'";
	$result2 = mysql_query($sql2);
}
?>