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
$email = mysql_real_escape_string($_POST["email"]);

$sql = "UPDATE users
SET email='$email'
WHERE id='$uid'";
mysql_query($sql);

/*
$sql = "SELECT * FROM users
WHERE id='$uid'";
$result = mysql_query($sql);
$check = mysql_fetch_array($result);
if ($check['email'] != 0) {

}
else {
	$sql = "INSERT INTO users
}
*/
header( 'Location: settings.php' ) ;
?>