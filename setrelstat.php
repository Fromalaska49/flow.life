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
if (mysql_real_escape_string($_POST['relstat']) == "yes") {
	$relstat = 1;
	$partnername = mysql_real_escape_string($_POST["partner"]);
}
else {
	$relstat = 0;
}
echo ("varset");
if ($relstat == 1) {
	$sql = "UPDATE users
	SET relstat='1', relpartnername='$partnername'
	WHERE id='$uid'";
	$result = mysql_query($sql);
}
else {
	$sql = "UPDATE users
	SET relstat='0'
	WHERE id='$uid'";
	$result = mysql_query($sql);
}
header( 'Location: settings.php' ) ;
?>
<html>
<head>
<script type="text/javascript">
function f() {
window.location='settings.php';
}
</script>
</head>
<body onload="f()">

</body>
</html>