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
$quote = mysql_real_escape_string($_POST["quote"]);

$sql = "UPDATE users
SET quote='$quote'
WHERE id='$uid'";
mysql_query($sql);

header( 'Location: settings.php' ) ;
?>