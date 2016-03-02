<?php require "get-user-data.php"; ?>
<html>
	<head>
		<?php require "meta-etceteras.php"; ?>
		<?php require "post-box-script.php"; ?>
		<?php require "like-javascript.php"; ?>
		<?php require "javascript-page-post-like.php"; ?>
		<?php require "friend-request-response-javascript.php"; ?>
		<script type="text/javascript">
		//if(document.getElementById('imgupload').files[0]){document.getElementById('imguploadtext').innerHTML='';}else{document.getElementById('imguploadtext').innerHTML='';}
		</script>
	</head>
	<body style="padding:0px;margin:0px;overflow:hidden;" onload="layoutcalc();">
		<?php require("header-logged-in.php"); ?>
		<?php require("sidebar.php"); ?>
		<?php require("post-box.php"); ?>
		<?php require("post-media-box.php"); ?>
		<!--This is the news feed-->
		<div class="feed" id="feed" style="overflow-x:hidden;">
			<center>
				<br />
				<br />
				<br />
				<br />
				<div style="z-index:5;" id="posts">
					<?php
					$sql = "SELECT * FROM prefriends
					INNER JOIN users
					ON prefriends.senderid=users.id
					WHERE recipientid='$uid'
					LIMIT 50";
					$result = mysql_query($sql);
					while($myrow = mysql_fetch_array($result)){
						$fid = (int)$myrow["senderid"];
						$fname = htmlspecialchars($myrow["fname"]);
						$lname = htmlspecialchars($myrow["lname"]);
						$name = $fname . ' ' . $lname;
						$picurl = $myrow["ppimgurl"];
						$pimgurl = "images/upload/users/p/" . $picurl;
						if (!$myrow["ppimgurl"]) {
							$pimgurl = "ppdefault.jpg";
						}
						echo ('<div id="friendrequest' . $fid . '" class="container"><div class="containerhead" style=""><a href="profile.php?id=' . $fid . '"><img style="height:40px;float:left;" src="' . $pimgurl . '" /></a><h4 class="ttl" style=""><a href="profile.php?id=' . $fid . '"><div class="pcheader">' . $fname . ' ' . $lname . '</div></a><div class="pcheader" style="float:right;">' . '</div></h4></div><div class="ptextcontainer">You have a friend request from <a href="profile.php?id='.$fid.'">' . $fname . ' ' . $lname . '</a></div><div class="containerfoot" style="text-align:right;height:30px;"><div style="" class="button" onmousedown="this.className=\'buttonactive\'" onmouseup="this.className=\'button\'" onmouseout="this.className=\'button\'" onclick="this.className=\'button\';acceptrequest('.$fid.');">Accept</div><div style="" class="button" onmousedown="this.className=\'buttonactive\'" onmouseup="this.className=\'button\'" onmouseout="this.className=\'button\'" onclick="this.className=\'button\';declinerequest('.$fid.');">Decline</div></div></div><br />');
						
					//	'<div id="friendrequest' . $fid . '"><div class="cntnr"><div class="contnr" style=""><a href="profile.php?id=' . $fid . '"><img style="height:40px;float:left;" src="' . $pimgurl . '" /></a><h4 class="ttl" style=""><a href="profile.php?id=' . $fid . '"><div class="pcheader" style="float:left;">' . $fname . ' ' . $lname . '</a> <div style="display:inline;font-size:14px;">wants to be friends</div></div><div style="position:relative;top:2px;margin:7px;display:inline;float:right;" onclick="declinerequest(' . $fid . ')">Deny</div><div style="position:relative;top:2px;margin:7px;display:inline;float:right;" onclick="acceptrequest(' . $fid . ')">Accept</div></h4></div></div><br /></div>');
					}


					$uid;
					$sql2a = "SELECT * FROM friends
					INNER JOIN posts
					ON friends.fid = posts.fid
					WHERE uid = '$uid'
					UNION
					SELECT * FROM pageusers
					INNER JOIN pageposts
					ON pageusers.pageid = pageposts.pageid
					WHERE uid = '$uid'
					ORDER BY time DESC
					LIMIT 50";
					/*
					"SELECT * FROM friends, pageusers
					INNER JOIN posts
					ON friends.fid = posts.fid
					INNER JOIN pageposts
					ON pageusers.pageid = pageposts.pageid
					WHERE uid = '$uid'
					ORDER BY time DESC
					LIMIT 50";
					*/
					/*
					$sql2a = "SELECT * FROM friends
					INNER JOIN posts
					ON friends.fid = posts.fid
					WHERE uid = '$uid'
					UNION
					SELECT * FROM pageusers
					INNER JOIN pageposts
					ON pageusers.pageid = pageposts.pageid
					WHERE uid = '$uid'
					ORDER BY time DESC
					LIMIT 50";
					*/
					$result2a = mysql_query($sql2a);
					while($myrow = mysql_fetch_array($result2a)){
						if($myrow["fid"]>0){
							$fid = $myrow["fid"];
							$pid = $myrow["pid"];
							if(($myrow["annotation"]!==0) && ($myrow["annotation"]!=='') && ($myrow["annotation"]!=='0')){
								$annotation = $myrow["annotation"];
							}
							else{
								$annotation='';
							}
							if(($myrow["post"]!==0) && ($myrow["post"]!=='') && ($myrow["post"]!=='0')){
								$post = htmlentities($myrow["post"]);
								if(strlen($post)>500){
									$post=substr($post,0,350).'<div style="display:inline;color:rgb(0,119,0);cursor:pointer;" onmouseover="this.style.textDecoration=\'underline\';" onmouseout="this.style.textDecoration=\'none\'" onclick="this.innerHTML=\''.substr($post,350).'\';this.style.color=\'inherit\';this.style.cusor=\'inherit\';this.onmouseover=\'\';this.style.textDecoration=\'none\'">...show more</div>';
								}
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
							$usql = "SELECT * FROM users
							WHERE id='$fid'";
							$uresult = mysql_query($usql);
							$uinfo = mysql_fetch_array($uresult);
							$fname = htmlspecialchars($uinfo["fname"]);
							$lname = htmlspecialchars($uinfo["lname"]);
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
								$thumbcolor = "gray";
							}
							echo ('<div class="container"><div class="containerhead" style=""><a href="profile.php?id=' . $fid . '"><img style="height:40px;float:left;" src="' . $pimgurl . '" /></a><h4 class="ttl" style=""><a href="profile.php?id=' . $fid . '"><div class="pcheader">' . $fname . ' ' . $lname . '</div></a><div class="pcheader" style="float:right;">' . '</div></h4></div><div class="ptextcontainer">' . $annotation . $post . '<br />' . $media . '</div><div class="containerfoot"><div style="display:inline;padding:5px;float:left;color:#AAAAAA;font-size:15px;padding:0px;margin:2px;">' . $time . '</div><div style="display:inline;padding:5px;color:#AAAAAA;font-size:20px;padding:0px;margin:2px;" id="like' . $pid . '">' . $printnumber . '</div><div style="display:inline;padding:5px;" onclick="like(' . $pid . ')" title="Thumbs-Up"><img class="thumbsup" src="thumbs-up-' . $thumbcolor . '.png" id="' . $pid . '" />' . '</div><div style="display:inline;padding:5px;"><a href="post.php?id=' . $pid . '" title="Comment"><img style="width:20px;height:20px;" src="comment.png" /></a></div></div>');
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
								echo ('<a href="profile.php?id=' . $cfid . '"><div class="commenthead"><img style="height:40px;float:left;" src="' . $cpimgurl . '" /><h4 class="ttl" style=""><div class="pcheader" style="float:left;">' . $cfname . ' ' . $clname . '</div><div class="pcheader" style="float:right;"></div><div class="pcheader" style="float:right;">' . $ctime . '</div></h4></div></a><div class="ctextcontainer">' . $comment . '</div>');
							}
							echo ('</div><br />');
						}
						else if($myrow["pageid"]>0){
							$pageid = $myrow["pageid"];
							$pid = $myrow["pid"];
							if(($myrow["annotation"]!==0) && ($myrow["annotation"]!=='') && ($myrow["annotation"]!=='0')){
								$annotation = $myrow["annotation"];
							}
							else{
								$annotation='';
							}
							if(($myrow["post"]!==0) && ($myrow["post"]!=='') && ($myrow["post"]!=='0')){
								$post = htmlentities($myrow["post"]);
								if(strlen($post)>500){
									$post=substr($post,0,350).'<div style="display:inline;color:rgb(0,119,0);cursor:pointer;" onmouseover="this.style.textDecoration=\'underline\';" onmouseout="this.style.textDecoration=\'none\'" onclick="this.innerHTML=\''.substr($post,350).'\';this.style.color=\'inherit\';this.style.cusor=\'inherit\';this.onmouseover=\'\';this.style.textDecoration=\'none\'">...show more</div>';
								}
							}
							else{
								$post='';
							}
							if(($myrow["media"]!==0) && ($myrow["media"]!=='') && ($myrow["media"]!=='0')){
								$media = '<a href="images/upload/pages/l/'.$myrow["media"].'"><img style="max-width:300px;" src="images/upload/pages/m/'.$myrow["media"].'" /></a>';
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
							$usql = "SELECT * FROM pages
							WHERE id='$pageid'";
							$uresult = mysql_query($usql);
							$uinfo = mysql_fetch_array($uresult);
							$name = htmlspecialchars($uinfo["name"]);
							$pimgurl = "images/upload/pages/p/" . $uinfo["ppimgurl"];
							if (!$uinfo["ppimgurl"]) {
								$pimgurl = "ppdefault.jpg";
							}
							$liked = mysql_num_rows(mysql_query("SELECT * FROM pagepostl WHERE uid='$uid' AND pid ='$pid'"));
							$n = mysql_num_rows(mysql_query("SELECT * FROM pagepostl WHERE pid = '$pid'"));
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
							else {//if ($liked==1) {
								$thumbcolor = "green";
							}
						echo ('<div class="container"><div class="containerhead" style=""><a href="page.php?id=' . $pageid . '"><img style="height:40px;float:left;" src="' . $pimgurl . '" /></a><h4 class="ttl" style=""><a href="page.php?id=' . $pageid . '"><div class="pcheader">' . $name . '</div></a><div class="pcheader" style="float:right;">' . '</div></h4></div><div class="ptextcontainer">' . $annotation . $post . '<br />' . $media . '</div><div class="containerfoot"><div style="display:inline;padding:5px;float:left;color:#AAAAAA;font-size:15px;padding:0px;margin:2px;">' . $time . '</div><div style="display:inline;padding:5px;color:#AAAAAA;font-size:20px;padding:0px;margin:2px;" id="pagepostlike' . $pid . '">' . $printnumber . '</div><div style="display:inline;padding:5px;" onclick="pagepostlike(' . $pid . ')" title="Thumbs-Up"><img class="thumbsup" src="thumbs-up-' . $thumbcolor . '.png" id="' . $pid . '" />' . '</div><div style="display:inline;padding:5px;"><a href="page-post.php?id=' . $pid . '" title="Comment"><img style="width:20px;height:20px;" src="comment.png" /></a></div></div>');
						$precsql = "SELECT * FROM pagepostc
						INNER JOIN users
						ON pagepostc.f2id=users.id
						WHERE pid = '$pid'";
						$precresult = mysql_query($precsql);
						$precnum = mysql_num_rows($precresult);
						$lim = $precnum-4;
						if ($lim<0){
						$lim=0;
						}
						$csql = "SELECT * FROM pagepostc
						INNER JOIN users
						ON pagepostc.f2id=users.id
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
							echo ('<a href="profile.php?id=' . $cfid . '"><div class="commenthead"><img style="height:40px;float:left;" src="' . $cpimgurl . '" /><h4 class="ttl" style=""><div class="pcheader" style="float:left;">' . $cfname . ' ' . $clname . '</div><div class="pcheader" style="float:right;"></div><div class="pcheader" style="float:right;">' . $ctime . '</div></h4></div></a><div class="ctextcontainer">' . $comment . '</div>');
						}
						echo ('</div><br />');
						}
						else{
							//error
						}
					}
					if(mysql_num_rows(mysql_query("SELECT * FROM friends INNER JOIN posts ON friends.fid = posts.fid WHERE uid = '$uid' UNION SELECT * FROM pageusers INNER JOIN pageposts ON pageusers.pageid = pageposts.pageid WHERE uid = '$uid' ORDER BY time DESC LIMIT 51"))>50){
						echo("<p style=\"color:#888888;\">Older posts cannot be displayed</p><br />");
					}
					else{
						//echo("<p style=\"color:#888888;\">That's all folks!</p><br />");
					}
					?>
				</div>
			</center>
		</div>
	</body>
</html>