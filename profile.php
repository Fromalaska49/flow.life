
<?php 
require("get-user-data.php");
if((!isset($_GET["id"]))||($_GET["id"]=="")){
	header("Location: profile.php?id=".$uid);
}
$profileduser=(int)$_GET["id"];
$permission=0;
if(($uid==$profileduser)||(mysql_num_rows(mysql_query("SELECT * FROM `friends` WHERE `uid`='$uid' AND `fid`='$profileduser'"))>0)||(mysql_num_rows(mysql_query("SELECT * FROM `prefriends` WHERE `senderid`='$profileduser' AND `recipientid`='$uid'")))){
	//has permission
	$permission=1;
}
else{
	//no permission
}
$sql = "SELECT * FROM users WHERE id = '$profileduser'";
$result = mysql_query($sql);
$row = mysql_fetch_array($result);
$email = $row["email"];
$fname = $row["fname"];
$lname = $row["lname"];
$sex = $row["sex"];
$birthstamp = $row["birthstamp"];
$ppimgurl = $row["ppimgurl"];
?>
<html>
	<head>
		<?php
		require "meta-etceteras.php";
		require "post-box-script.php";
		require "like-javascript.php"; 
		if($permission==1){
			include("javascript-append-post.php");
		}
		?>
		<style type="text/css">
		td
		{
		padding:5px;
		}
		.tdp
		{
		display:inline;
		margin:0px;
		padding:0px;
		}
		.p{background-color:green;}
		html, body
		{
		padding:0px;
		margin:0px;
		border-style:none;
		}
		.profileduserdata
		{
		margin-left:5px;
		overflow:scroll;
		}
		</style>
		<?php //require "friend-request-response-javascript.php"; ?>
		<script type="text/javascript">
			function dfstatus(){
				var dfbutton=document.getElementById('dfbutton').innerHTML;
				if(dfbutton=="Add Friend"){
					document.getElementById('dfbutton').innerHTML='Waiting';
				}
				else if(dfbutton=="Accept"){
					document.getElementById('dfbutton').innerHTML='Unfriend';
				}
				else if(dfbutton=="Unfriend"){
					document.getElementById('dfbutton').innerHTML='Add Friend';
				}
				else{
					//user is waiting i.e. do nothing
				}
				if (window.XMLHttpRequest) {
					xmlhttp=new XMLHttpRequest();
				}
				else {
					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				}
				xmlhttp.onreadystatechange=function() {
					//
				}
				var param = "fid="+<?php echo($profileduser); ?>;
				xmlhttp.open("POST","script-friendaccept.php",true);
				xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				xmlhttp.setRequestHeader("Content-length", param.length);
				xmlhttp.setRequestHeader("Connection", "close");
				xmlhttp.send(param);
				var fid = "friendrequest"+id;
				document.getElementById(fid).style.display='none';
			}
		</script>
	</head>
	<body style="padding:0px;margin:0px;overflow:hidden;" onload="">
		<?php require "header-logged-in.php"; ?>
		<?php require "sidebar.php"; ?>
		<?php require "post-box.php"; ?>
		<?php require("post-media-box.php"); ?>
		<!--This is the news feed-->
		<div class="feed" id="feed" style="overflow-x:hidden;right:250px;">
			<center>
				<br />
				<br />
				<br />
				<br />
				<div id="feedbody">
					<div id="userposts" style="">
					<?php
					if($permission==1){
						$sql2a = "SELECT * FROM posts
						WHERE fid = '$profileduser'
						ORDER BY time DESC
						LIMIT 50";
						$result2a = mysql_query($sql2a);
						while($myrow = mysql_fetch_array($result2a)){
							$fid = htmlspecialchars($myrow["fid"]);
							$pid = htmlspecialchars($myrow["pid"]);
							if(($myrow["annotation"]!==0) && ($myrow["annotation"]!=='') && ($myrow["annotation"]!=='0')){
								$annotation = $myrow["annotation"];
							}
							else{
								$annotation='';
							}
							if(($myrow["post"]!==0) && ($myrow["post"]!=='') && ($myrow["post"]!=='0')){
								$post = htmlentities($myrow["post"]).'<br />';
								if(strlen($post)>500){
									$post=substr($post,0,350).'<div style="display:inline;color:rgb(0,119,0);cursor:pointer;" onmouseover="this.style.textDecoration=\'underline\';" onmouseout="this.style.textDecoration=\'none\'" onclick="this.innerHTML=\''.substr($post,350).'\';this.style.color=\'inherit\';this.style.cusor=\'inherit\';this.onmouseover=\'\';this.style.textDecoration=\'none\'">...show more</div><br />';
								}
							}
							else{
								$post='';
							}
							if(($myrow["media"]!==0) && ($myrow["media"]!=='') && ($myrow["media"]!=='0')){
								$media = '<a href="images/upload/users/l/'.$myrow["media"].'"><img style="max-width:300px;" src="images/upload/users/m/'.$myrow["media"].'" /></a>';
							}
							else{
								$media='';
							}
							$deltatime=time()-$myrow["time"];
							if($deltatime<604800){
								if($deltatime<172800){
									if($deltatime<86400){
									
									}
								}
								else{
								
								}
							}
							$date = $myrow["time"];
							$t = $date+$toff;
							$week=time()-604800;
							if($date>$week){
								$time = date("D", $t) . " at " . date("g:i a", $t);
							}
							else{
								$time = date("M jS", $t);
							}
							
	//echo ('<!--');
	//$t = getdate($time);
	//echo ('-->');
	//$weekday = date('w', $time);
							$usql = "SELECT * FROM users
							WHERE id='$profileduser'";
							$uresult = mysql_query($usql);
							$uinfo = mysql_fetch_array($uresult);
							$fname = htmlspecialchars($uinfo["fname"]);
							$lname = htmlspecialchars($uinfo["lname"]);
							$sex = htmlspecialchars($uinfo["sex"]);
							$pimgurl = "images/upload/users/p/" . $uinfo["ppimgurl"];
							if (!$uinfo["ppimgurl"]) {
								$pimgurl = "ppdefault.jpg";
							}
							$liked = mysql_num_rows(mysql_query("SELECT * FROM `likes` WHERE `id`='$uid' AND `pid`='$pid'"));
							$n = mysql_num_rows(mysql_query("SELECT * FROM `likes` WHERE `pid`='$pid'"));
							if($n>0){
								if($n>999){
									if($n>999999){
										$n/1000000;
										$printnumber=round($n,1) . "M";
									}
									else{
										$n/1000;
										$printnumber=round($n,1) . "k";
									}
								}
								else{
									$printnumber=$n;
								}
							}
							else{
								$printnumber="";
							}
							if ($liked == 0) {
								$thumbcolor = "gray";
	$num = "";
							}
							else if ($liked==1) {
								$thumbcolor = "green";
							}
							else {
	
							}
							echo ('<div class="container"><div class="containerhead" style=""><a href="profile.php?id=' . $fid . '"><img style="height:40px;float:left;" src="' . $pimgurl . '" /></a><h4 class="ttl" style=""><a href="profile.php?id=' . $fid . '"><div class="pcheader">' . $fname . ' ' . $lname . '</div></a><div class="pcheader" style="float:right;">' . '</div></h4></div><div class="ptextcontainer">' . $annotation . $post . $media . '</div><div class="containerfoot"><div style="display:inline;padding:5px;float:left;color:#AAAAAA;font-size:15px;padding:0px;margin:2px;">' . $time . '</div><div style="display:inline;padding:5px;color:#AAAAAA;font-size:20px;padding:0px;margin:2px;" id="like' . $pid . '">' . $printnumber . '</div><div style="display:inline;padding:5px;" onclick="like(' . $pid . ')" title="Thumbs-Up"><img class="thumbsup" src="thumbs-up-' . $thumbcolor . '.png" id="' . $pid . '" />' . '</div><div style="display:inline;padding:5px;"><a href="post.php?id=' . $pid . '" title="Comment"><img style="width:20px;height:20px;" src="comment.png" /></a></div></div>');
							$precsql = "SELECT * FROM comments
							INNER JOIN users
							ON comments.f2id=users.id
							WHERE pid = '$pid'";
							$precresult = mysql_query($precsql);
							$precnum = mysql_num_rows($precresult);
							$lim = $precnum-4;
							if ($lim<0){
							$lim=0;
							}
							$csql = "SELECT * FROM comments
							INNER JOIN users
							ON comments.f2id=users.id
							WHERE pid = '$pid'
							ORDER BY time ASC
							LIMIT $lim, 4";
							$cresult = mysql_query($csql);
							while ($crow = mysql_fetch_array($cresult)) {
								$cfid = $crow["f2id"];
								$cfname = $crow["fname"];
								$clname = $crow["lname"];
								$comment = htmlentities($crow["comment"]);
								$cpimgurl = "images/upload/users/p/" . $crow["ppimgurl"];
								if (! $crow["ppimgurl"]) {
									$cpimgurl = "ppdefault.jpg";
								}
								$cdate = $crow["time"];
								$ct = $cdate+$toff;
								$cweek=time()-604800;
								if($cdate>$cweek){
									$ctime = date("D", $ct) . " at " . date("g:i a", $ct);
								}
								else{
									$ctime = date("M jS", $ct);
								}
	//echo ('<!--');
	//$ct = getdate($ctime);
	//echo ('-->');
	//$cweekday = $ct['weekday'];
								echo ('<a href="profile.php?id=' . $cfid . '"><div class="commenthead"><img style="height:40px;float:left;" src="' . $cpimgurl . '" /><h4 class="ttl" style=""><div class="pcheader" style="float:left;">' . $cfname . ' ' . $clname . '</div><div class="pcheader" style="float:right;"></div><div class="pcheader" style="float:right;">' . $ctime . '</div></h4></div></a><div class="ctextcontainer">' . $comment . '</div>');
							}
							echo ('</div><br />');
						}
						$postquantity=mysql_num_rows(mysql_query("SELECT * FROM posts WHERE fid = '$profileduser' LIMIT 21"));
						if($postquantity>20){
							echo("<p style=\"color:#888888;\">Older posts cannot be displayed.</p>");
						}
						else if($postquantity!=0){
							echo("<p style=\"color:#888888;\">That's all folks!</p><br />");
						}
						else{
							echo("<p style=\"color:#888888;\">No posts.</p><br />");
						}
					}
					else{
						if($sex==1){
							$their="his";
						}
						elseif($sex==0){
							$their="her";
						}
						else{
							$their="their";
						}
						echo("<p style=\"color:#888888;\">".$fname." ".$lname." must add you as a friend before you can view ".$their." profile and see ".$their." posts.</p><br />");
					}
								?>
								<br />
							</div>
						</div>
					</div>
				</div>
				<br />
			</center>
		</div>
		<!--This is the profile section-->
		<div style="position:fixed;top:70px; bottom:0px;left:;width:250px;right:0px;background-color:#555555;color:white;box-shadow:inset 0px 1px 10px -1px #333333;">
		<div id="friendvar" style="display:none;">
		</div>
		
		<?php
		if($uid==$profileduser){
			$dfvalue = "Edit";
			$clickevent = "window.location='settings.php'";
		}
		else{
			$sql = "SELECT * FROM friends WHERE uid='$uid' AND fid='$profileduser'";
			$result = mysql_query($sql);
			$num = mysql_num_rows($result);
	
			if ($num==0) {
				$sql3a = "SELECT * FROM prefriends WHERE senderid='$uid' AND recipientid='$profileduser'";
				$result3a = mysql_query($sql3a);
				$num3a = mysql_num_rows($result3a);
				
				$sql3b = "SELECT * FROM prefriends WHERE senderid='$profileduser' AND recipientid='$uid'";
				$result3b = mysql_query($sql3b);
				$num3b = mysql_num_rows($result3b);
				
				if ($num3a>0) {
					//$dfid=2;
					$dfvalue = "Waiting";
				}
				else if ($num3b>0) {	
					//$dfid=3;
					$dfvalue = "Accept";
				}
				else {
					//$dfid=0;
					$dfvalue = "Add Friend";
				}
			}
			else if ($num==1) {
				//$dfid=1;
				$dfvalue = "Unfriend";
			}
			else {
				$dfvalue = "Error";
			}
			$clickevent = "dfstatus()";
		}
		
		$sql = "SELECT * FROM users WHERE id = '$profileduser'";
		$result = mysql_query($sql);
		$row = mysql_fetch_array($result);
		$fname = $row["fname"];
		$lname = $row["lname"];
		$pimgurl = $row["ppimgurl"];
		//$birthday = $row["birthstamp"])
		$birthday = date("F jS",$birthstamp);
		if($permission==1){
			echo ("<a href=\"images/upload/users/l/".$pimgurl."\"><img src=\"images/upload/users/m/".$pimgurl."\" style=\"width:250px;\" /></a><br /><center><h3>" . $fname . " " . $lname."</h3></center><div id=\"dfbutton\" class=\"button\" style=\"position:absolute;top:210px;left:0px;\"  onmousedown=\"this.className='buttonactive'\" onmouseup=\"this.className='button'\" onmouseout=\"this.className='button'\" onclick=\"this.className='button';".$clickevent.";\">".$dfvalue."</div><p class=\"profileduserdata\">Birthday: " . $birthday . "</p><p class=\"profileduserdata\"><a href=\"mailto:".$email."\" style=\"color:white;\">" . $email . "</a></p>");
		}
		else{
		echo("<a href=\"images/upload/users/l/".$pimgurl."\"><img src=\"images/upload/users/m/".$pimgurl."\" style=\"width:250px;\" /></a><br /><center><h3>" . $fname . " " . $lname."</h3></center><div id=\"dfbutton\" class=\"button\" style=\"position:absolute;top:210px;left:0px;\"  onmousedown=\"this.className='buttonactive'\" onmouseup=\"this.className='button'\" onmouseout=\"this.className='button'\" onclick=\"this.className='button';".$clickevent.";\">".$dfvalue."</div>");
		}
		?>
		</div>
	</body>
</html>