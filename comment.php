<?php
require "get-user-data.php";

$comment = mysql_real_escape_string($_POST['comment']);
$pid = mysql_real_escape_string($_POST['id']);

$uid = $_SESSION['uid'];

$day = date('l');

$time = time();

$sql = "INSERT INTO 'comments' ('pid', 'f2id', 'comment', 'day', 'time')
VALUES ('$pid', '$uid', '$comment', '$day', '$time')";
mysql_query($sql);
?>