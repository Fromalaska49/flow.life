<?php
require("get-user-data.php");
$email = $_POST["email"];
$shouldemail=0;
if($email==$_SESSION['email']){

}
else{
	$sanitizedemail = mysql_real_escape_string($_POST["email"]);
	$userdata=mysql_query("SELECT * FROM users WHERE email='$sanitizedemail'");
	if (mysql_num_rows($userdata)==0){
		$altemail=mysql_query("SELECT * FROM `altemails` WHERE `altemail`='$sanitizedemail'");
		if(mysql_num_rows($altemail)==0){
			//echo"hasn't got an account";
			if(mysql_num_rows(mysql_query("SELECT * FROM emailfriends WHERE femail='$sanitizedemail'"))==0){
				//echo"not yet added as email friend";
				mysql_query("INSERT INTO `emailfriends` (`uid`,`femail`) VALUES ('$uid','$sanitizedemail')");
				$shouldemail=1;
			}
			else{
				//already added as email friend
				//do nothing
			}
		}
		else{
			$udata=mysql_fetch_array($altemail);
			$fid=(int) $udata['uid'];
			//echo($fid);
			if(mysql_num_rows(mysql_query("SELECT * FROM `friends` WHERE `uid`='$uid' AND `fid`='$fid'"))==0){
				//echo"not yet friends";
				if(mysql_num_rows(mysql_query("SELECT * FROM `prefriends` WHERE `senderid`='$fid' AND `recipientid`='$uid'"))<1){
					if(mysql_num_rows(mysql_query("SELECT * FROM `prefriends` WHERE `senderid`='$uid' AND `recipientid`='$fid'"))<1){
						//echo"has not sent friend request";
						mysql_query("INSERT INTO `prefriends` (`senderid`, `recipientid`) VALUES ('$uid','$fid')");
						$shouldemail=1;
					}
					else{
						echo"has sent friend request";
						//do nothing
					}
				}
				else{
					//echo"has recieved friend request";
					mysql_query("INSERT INTO `friends` VALUES ('$uid', '$fid')");
					mysql_query("INSERT INTO `friends` VALUES ('$fid', '$uid')");
					mysql_query("DELETE FROM `prefriends` WHERE `senderid`='$fid' AND `recipientid`='$uid'");
					$shouldemail=2;
				}
			}
			else{
				echo"already friends";
				//do nothing
			}
		}
	}
	else{
		echo"has got an account";
		$udata=mysql_fetch_array($userdata);
		$fid=(int) $udata['id'];
		//echo($fid);
		if(mysql_num_rows(mysql_query("SELECT * FROM `friends` WHERE `uid`='$uid' AND `fid`='$fid'"))==0){
			//echo"not yet friends";
			if(mysql_num_rows(mysql_query("SELECT * FROM `prefriends` WHERE `senderid`='$fid' AND `recipientid`='$uid'"))<1){
				if(mysql_num_rows(mysql_query("SELECT * FROM `prefriends` WHERE `senderid`='$uid' AND `recipientid`='$fid'"))<1){
					//echo"has not sent friend request";
					mysql_query("INSERT INTO `prefriends` (`senderid`, `recipientid`) VALUES ('$uid','$fid')");
					$shouldemail=1;
				}
				else{
					echo"has sent friend request";
					//do nothing
				}
			}
			else{
				//echo"has recieved friend request";
				mysql_query("INSERT INTO `friends` VALUES ('$uid', '$fid')");
				mysql_query("INSERT INTO `friends` VALUES ('$fid', '$uid')");
				mysql_query("DELETE FROM `prefriends` WHERE `senderid`='$fid' AND `recipientid`='$uid'");
				$shouldemail=1;
			}
		}
		else{
			echo"already friends";
			//do nothing
		}
	}
}
if($shouldemail>0){
$from = 'noreply@flow.life';
$subject = $_SESSION['fname'].' '.$_SESSION['lname'].' Added You';

$body = '<body style="font-family:arial;padding:10px;">';
$body .= htmlentities($_SESSION['fname']).' '.htmlentities($_SESSION['lname']).' added you as a friend on the new social network <i><a href="http://flow.life">Flow.Life</a></i>!';
$body .='</body>';
//$body .='<br /><br /><br /><p>If you would like to comment, give a thumbs-up, or make your own posts, register at <a href="http://flow.life">http://flow.life</a></p><br /></center></body>';

//$headers = "From: " . strip_tags($_POST['req-email']) . "\r\n";
//$headers .= "Reply-To: ". strip_tags($_POST['req-email']) . "\r\n";
//$headers .= "CC: susan@example.com\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= "From: " . $from . "\r\n";

$to=$email;
mail($to, $subject, $body, $headers);
}
//else if($shoulemail==2){

//}
else{
//nada
}  
header("Location: friends.php");
?>






