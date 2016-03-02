<?php require "get-user-data.php"; ?>
<html>
	<head>
		<?php require "meta-etceteras.php"; ?>
		<?php require "post-box-script.php"; ?>
		<?php require "like-javascript.php"; ?>
		<script type="text/javascript">
		function acceptrequest(id) {
			if (window.XMLHttpRequest) {
				xmlhttp=new XMLHttpRequest();
			}
			else {
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange=function() {
				//
			}
			var elementid="fid"+id+"response";
			document.getElementById(elementid).style.display="none";
			var param = "fid="+id;
			xmlhttp.open("POST","script-friendaccept.php",true);
			xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xmlhttp.setRequestHeader("Content-length", param.length);
			xmlhttp.setRequestHeader("Connection", "close");
			xmlhttp.send(param);
		}
		</script>
		<script type="text/javascript">
		function declinerequest(id) {
			if (window.XMLHttpRequest) {
				xmlhttp=new XMLHttpRequest();
			}
			else {
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange=function() {
				//
			}
			var elementid="fid"+id;
			document.getElementById(elementid).style.display='none';
			var param = "fid="+id;
			xmlhttp.open("POST","script-frienddecline.php",true);
			xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xmlhttp.setRequestHeader("Content-length", param.length);
			xmlhttp.setRequestHeader("Connection", "close");
			xmlhttp.send(param);
		}
		</script>
	</head>
	<body style="padding:0px;margin:0px;overflow:hidden;" onload="layoutcalc();">
		<?php require "header-logged-in.php"; ?>
		<?php require "sidebar.php"; ?>
		<?php require "post-box.php"; ?>
		<?php require("post-media-box.php"); ?>
		<!--This is the news feed-->
		<div class="feed" id="feed" style="overflow-x:hidden;">
			<center>
				<br />
				<br />
				<br />
				<br />
				<div style="height:50px;" id="">
					<h3 style="display:inline;float:left;margin:10px;">
						Friends
					</h3>
				</div>
				<div style="height:150px;float:left;display:inline;padding:10px;">
					<a href="add-friend.php"><img src="add-box.png" style="float:left;border-color:white;border-style:solid;border-width:5px;margin:10px;box-shadow:0px 3px 14px -2px black;width:120px;height:120px;" />
					<p style="text-shadow:0px 1px 0px white;">
						Add Friend
					</p>
					</a>
				</div>
				<?php
				$sql = "SELECT * FROM `prefriends` WHERE `recipientid`='$uid' OR `senderid`='$uid'";
				$result = mysql_query($sql);
				while ($row = mysql_fetch_array($result)) {
					if($row['recipientid']==$uid){
						$fid=$row['senderid'];
						$user=mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id`='$fid'"));
						$picurl = $user["ppimgurl"];
						$fname = $user["fname"];
						$lname = $user["lname"];
						$name = $fname . ' ' . $lname;
						echo('<div style="height:160px;float:left;display:inline;padding:10px;" title="'.$name.'" id="fid'.$fid.'">');
						echo('<div style="height:120px;width:120px;background-image:url(\'images/upload/users/s/' . $picurl . '\');border-color:white;border-style:solid;border-width:5px;margin:10px;box-shadow:0px 3px 14px -2px black;"><div style="background-color:black;opacity:0.7;color:white;padding:2px;" id="fid'.$fid.'response"><div style="float:left;cursor:pointer;" onclick="acceptrequest('.$fid.')">Accept</div><div style="cursor:pointer;" style="float:right;" onclick="declinerequest('.$fid.')">Decline</div></div></div>');
						echo('<p style="text-shadow:0px 1px 0px white;cursor:pointer;color:rgb(0,119,0);" onclick="window.location=\'profile.php?id=' . $fid . '\'">' . $name . '</p></div>');
					}
					else{
						$fid=$row['recipientid'];
						$user=mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id`='$fid'"));
						$picurl = $user["ppimgurl"];
						$fname = $user["fname"];
						$lname = $user["lname"];
						$name = $fname . ' ' . $lname;
						echo('<div style="height:160px;float:left;display:inline;padding:10px;" title="'.$name.'" id="fid'.$fid.'">');
						echo('<div style="height:120px;width:120px;background-image:url(\'images/upload/users/s/' . $picurl . '\');border-color:white;border-style:solid;border-width:5px;margin:10px;box-shadow:0px 3px 14px -2px black;"><div style="background-color:black;opacity:0.7;color:white;padding:2px;" \><div style="cursor:pointer;">Waiting</div></div></div>');
						echo('<p style="text-shadow:0px 1px 0px white;cursor:pointer;color:rgb(0,119,0);" onclick="window.location=\'profile.php?id=' . $fid . '\'">' . $name . '</p></div>');
					}
				}
				?>
				<?php
				$sql = "SELECT * FROM friends
				INNER JOIN users
				ON friends.fid=users.id
				WHERE uid='$uid'
				ORDER BY lname";
				$result = mysql_query($sql);
				while ($row = mysql_fetch_array($result)) {
					$picurl = $row["ppimgurl"];
					$fname = $row["fname"];
					$lname = $row["lname"];
					$name = $fname . ' ' . $lname;
					$fid = $row["id"];
					echo('<div style="height:160px;float:left;display:inline;padding:10px;" title="'.$name.'">');
					echo('<a href="profile.php?id=' . $fid . '"><img src="images/upload/users/s/' . $picurl . '" style="float:left;border-color:white;border-style:solid;border-width:5px;margin:10px;box-shadow:0px 3px 14px -2px black;" />');
					echo('<p style="text-shadow:0px 1px 0px white;">' . $name . '</p></a></div>');
				}
				$sql = "SELECT * FROM `emailfriends` WHERE `uid`='$uid'";
				$result = mysql_query($sql);
				while ($row = mysql_fetch_array($result)) {
					$picurl = 'pimg-default.jpg';
					$email = $row['femail'];
					$name=$row['femail'];
					if(strlen($name)>20){
						$name=htmlentities(substr($name,0,16)).'...';
					}
					else{
						$name=htmlentities($name);
					}
					echo('<div style="height:160px;float:left;display:inline;padding:10px;" title="'.$email.'">');
					echo('<a href="mailto:'.$email.'"><img src="images/upload/users/s/default-pimg.jpg" style="float:left;border-color:white;border-style:solid;border-width:5px;margin:10px;box-shadow:0px 3px 14px -2px black;" />');
					echo('<p style="text-shadow:0px 1px 0px white;">' . $name . '</p></a></div>');
				}
				?>
				</div>
			</center>
		</div>
	</body>
</html>