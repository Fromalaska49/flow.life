<?php
require "get-user-data.php";
$uid = $_SESSION["uid"];
$pageid = $_POST["pageid"];

$sql = "SELECT * FROM pageusers WHERE uid = '$uid' AND pageid = '$pageid'";
$result = mysql_query($sql);
$num = mysql_num_rows($result);
if ($num==0){
	$sql2a = "INSERT INTO pageusers
	VALUES ('$uid', '$pageid')";
	mysql_query($sql2a);
}
else{
	$sql2c = "DELETE FROM pageusers WHERE uid = '$uid' AND pageid = '$pageid'";
	$result2a = mysql_query($sql2c);
}
?>