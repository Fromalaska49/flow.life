<?php
require "get-user-data.php";

$comment = mysql_real_escape_string(rawurldecode($_POST['text']));
$pid = (int) $_POST['id'];

$uid = $_SESSION['uid'];

$day = date('l');

$time = time();

mysql_query("INSERT INTO `comments` (`pid`, `f2id`, `comment`, `day`, `time`) VALUES ('$pid', '$uid', '$comment', '$day', '$time')");

?>


