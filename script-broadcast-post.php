<?php
require('get-user-data.php');
$uid = (int)$_SESSION['uid'];
$myrow=mysql_query("SELECT * FROM `posts` WHERE `uid`='$uid' ORDER BY `time` DESC LIMIT 1");

$fid = (int)$myrow["fid"];
$pid = (int)$myrow["id"];
if(($myrow["annotation"]!==0) && ($myrow["annotation"]!=='') && ($myrow["annotation"]!=='0')){
	$annotation = $myrow["annotation"];
}
else{
	$annotation='';
}
if(($myrow["post"]!==0) && ($myrow["post"]!=='') && ($myrow["post"]!=='0')){
	$post = htmlentities($myrow["post"]);
}
else{
	$post='';
}
if(($myrow["media"]!==0) && ($myrow["media"]!=='') && ($myrow["media"]!=='0')){
	$media = "<a href=\"images/upload/users/l/" . $myrow["media"] . "\"><img style=\"max-width:300px;\" src=\"images/upload/users/m/" . $myrow["media"] . "\" /></a>";
}
else{
	$media='';
}
$usql = "SELECT * FROM `users` WHERE `id`='$fid'";
$uresult = mysql_query($usql);
$uinfo = mysql_fetch_array($uresult);
$fname = htmlentities($uinfo["fname"]);
$lname = htmlentities($uinfo["lname"]);
$pimgurl = "images/upload/users/p/" . $uinfo["ppimgurl"];
if (!$uinfo["ppimgurl"]) {
	$pimgurl = "ppdefault.jpg";
}
$posthtml='<div style="max-width:500px;box-shadow:0px 2px 10px -2px black;border-radius:5px;overflow:hidden;"><div style="background-color:#007700;padding:0px;margin:0px;height:40px;color:white;text-shadow:0px -1px #330000;"><a href="http://flow.life/profile.php?id=' . $fid . '"><img style="height:40px;float:left;" src="http://flow.life/' . $pimgurl . '" /></a><h4 style="display:inline;margin:0px;margin:0px;padding:10px;"><a href="profile.php?id=' . $fid . '"><div style="padding:0px;margin:10px;float:left;color:white;">' . $fname . ' ' . $lname . '</div></a><div style="padding:0px;margin:10px;float:left;color:white;">' . '</div></h4></div><div style="background-color:#FEFEFE;padding:10px;min-height:10px;text-align:left;text-shadow:0px 1px #FFFFFF;border-style:none none solid none;border-color:#888888;border-width:1px;">' . $annotation . $post . '<br />' . $media . '</div></div></div>';
$result=mysql_query("SELECT * FROM `emailfriends` WHERE `uid`='$fid'");
while($friend=mysql_fetch_array($result)){

$from = 'noreply@flow.life';
$subject = 'Post from '.$fname.' '.$lname;

$body = '<body style="font-family:arial;"><center>';
$body .=$fname.' '.$lname.' posted this on <a href="http://flow.life">Flow.Life</a><br /><br />';
$body .=$posthtml;
$body .='<br /><br /><br /><p>If you would like to comment, give a thumbs-up, or make your own posts, register at <a href="http://flow.life">http://flow.life</a></p><br /></center></body>';

//$headers = "From: " . strip_tags($_POST['req-email']) . "\r\n";
//$headers .= "Reply-To: ". strip_tags($_POST['req-email']) . "\r\n";
//$headers .= "CC: susan@example.com\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= "From: " . $from . "\r\n";

$to=$friend['email'];
mail($to, $subject, $body, $headers);
}
?>