<?php
require("get-user-data.php");
$altemail = $_POST["altemail"];
$sanitizedemail = mysql_real_escape_string($_POST["altemail"]);
$userdata=mysql_query("SELECT * FROM `users` WHERE `email`='$sanitizedemail'");
if (mysql_num_rows($userdata)==0){
	//not main email
	$altemail=mysql_query("SELECT * FROM `altemails` WHERE `altemail`='$sanitizedemail'");
	if(mysql_num_rows($altemail)==0){
		//not alternate email
		mysql_query("INSERT INTO `altemails` (`uid`,`altemail`) VALUES ('$uid','$sanitizedemail')");
		
		$nuevofriendos=mysql_query("SELECT * FROM `emailfriends` WHERE `femail`='$sanitizedemail'");
		while($newfriends=mysql_fetch_array($nuevofriendos)){
			//previous email friends
			(int)$fid=$newfriends['uid'];
			if(mysql_num_rows(mysql_query("SELECT * FROM `friends` WHERE `uid`='$uid' AND `fid`='$fid')"))==0){
				//aren't friends
				if(mysql_num_rows(mysql_query("SELECT * FROM `prefriends` WHERE `senderid`='$uid' AND `recipientid`='$fid')"))==0){
					//has sent friend request
					//make friend
					mysql_query("INSERT INTO `friends` VALUES ('$uid', '$fid')");
					mysql_query("INSERT INTO `friends` VALUES ('$fid', '$uid')");
					mysql_query("DELETE FROM `prefriends` WHERE `senderid`='$uid' AND `recipientid`='$fid'");
				}
				else if(mysql_num_rows(mysql_query("SELECT * FROM `prefriends` WHERE `senderid`='$fid' AND `recipientid`='$uid')"))==0){
					//has recieved friend request
					//do nothing
				}
				else{
					//automatically sends friend request
					mysql_query("INSERT INTO `prefriends` (`senderid`, `recipientid`) VALUES ('$fid', '$uid')");
				}
			}
			else{
				//are friends already
			}
			mysql_query("DELETE FROM `emailfreinds` WHERE `uid`='$fid' AND `recipientid`='$sanitizedemail'");
		}
	}
	else{
		//is an alternate email
	}
}
else{
	//is a main email
}
header("Location: settings.php");
?>