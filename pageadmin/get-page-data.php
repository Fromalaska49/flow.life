<?php
$connect = mysql_connect('localhost', 'root', 'bitnami');
if (!$connect){
	echo('cannot connect\n');
}
mysql_select_db("socialnetwork");
session_start();
if (!isset($_SESSION['pageid'])) {
header("Location: index.php");
}
$pageid = $_SESSION['pageid'];
//$tzone = $_SESSION['tzone'];
$toff = $_SESSION['toff'];
$ppimgurl = $_SESSION['ppimgurl'];
//$churches = $_SESSION['churches'];
//$pages = $_SESSION['pages'];
//$friends = $_SESSION['friends'];
date_default_timezone_set('UTC');
?>