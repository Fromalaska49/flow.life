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




$deletesql = "DELETE FROM rank";
$deleteresult = mysql_query($deletesql);




$csql = "SELECT * FROM pages";
$cresult = mysql_query($csql);
while($crow = mysql_fetch_array($cresult)) {
	$cid = $crow["pageid"];
	$cname = $crow["cname"];
	
	$psql = "SELECT * FROM pagemembers
	WHERE pageid='$cid'";
	$presult = mysql_query($psql);
	$rank = mysql_num_rows($presult);
	
	$sql = "INSERT INTO rank (name, rank, cid)
	VALUES ('$cname', '$rank', '$cid')";
	$result = mysql_query($sql);
echo("classes".$cname."<br />");
}
echo ('done');

?>