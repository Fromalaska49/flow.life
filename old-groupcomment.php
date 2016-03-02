<?php
$connect = mysql_connect('localhost', 'root', 'bitnami');
if (!$connect){
//echo('cannot connect<br />');
}

mysql_select_db("socialnetwork");
session_start();
if (!isset($_SESSION['uid'])) {
header("Location: login.html");
}

$comment = mysql_real_escape_string($_POST['comment']);
$pid = mysql_real_escape_string($_POST['id']);
$uid = mysql_real_escape_string($_SESSION['uid']);

$day = date('l');

$sql = "INSERT INTO grouppostc (pid, f2id, comment, day)
VALUES ('$pid', '$uid', '$comment', '$day')";
mysql_query($sql);


$sql = "SELECT * FROM groupposts WHERE pid='$pid'";
$result = mysql_query($sql);
$row = mysql_fetch_array($result);
$groupid = $row["groupid"];

$redirect = "Location: group.php?id=" . $groupid;
header($redirect);
?>
<html>
<head>
<script type="text/javascript">
function f() {
window.location='group.php?id=<?php $sql = "SELECT * FROM groupposts WHERE pid='$pid'"; $result = mysql_query($sql); $row = mysql_fetch_array($result); $groupid = $row["groupid"]; echo ($groupid);?>';
}
</script>
</head>
<body onload="f()">
</body>
</html>