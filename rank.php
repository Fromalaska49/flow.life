<?php
$connect = mysql_connect('localhost', 'root', 'bitnami');
if (!$connect){
	echo('cannot connect\n');
}
mysql_select_db("socialnetwork");
//$numberUpdates = mysql_query("SELECT pageid FROM rank ORDER BY pageid DESC LIMIT 1");
$uresult = mysql_query("SELECT * FROM pages");
mysql_query("DELETE FROM rank");
while($urow = mysql_fetch_array($uresult)) {
	$pageid = (int)$urow['id'];
	$name = mysql_real_escape_string($urow['name']);
	$church = (int)$urow['church'];
	$ppimgurl = mysql_real_escape_string($urow['ppimgurl']);
	
	//echo('<br />'.$pageid);
	
	$rank = mysql_num_rows(mysql_query("SELECT uid FROM pageusers WHERE pageid='$pageid'"));
	
/*	if($numberUpdates>=$pageid){
	mysql_query("UPDATE rank (rank) VALUES ('$rank') WHERE pageid='$pageid'");
	}
	*/
//	else{
	$sql = "INSERT INTO rank (name, rank, pageid, church, ppimgurl)
	VALUES ('$name', '$rank', '$pageid', '$church', '$ppimgurl')";
	$result = mysql_query($sql);
//	}
}
?>