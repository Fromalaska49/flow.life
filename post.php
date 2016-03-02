<?php
require "get-user-data.php";
$pid = (int)$_GET['id'];
$sql2a = "SELECT * FROM `posts` WHERE pid='$pid' LIMIT 1";
$result2a = mysql_query($sql2a);
$myrow = mysql_fetch_array($result2a);
$profileduser=(int)$myrow["fid"];
$permission=0;
if(($uid==$profileduser)||(mysql_num_rows(mysql_query("SELECT * FROM `friends` WHERE `uid`='$uid' AND `fid`='$profileduser'"))>0)||(mysql_num_rows(mysql_query("SELECT * FROM `prefriends` WHERE `senderid`='$profileduser' AND `recipientid`='$uid'")))){
	//has permission
	$permission=1;
}
else{
	//no permission
}
?>
<html>
	<head>
		<?php require "meta-etceteras.php"; ?>
		<?php require "post-box-script.php"; ?>
		<?php require "like-javascript.php"; ?>
		<script type="text/javascript">
		function erase() {
			document.getElementById('commenttext').value='';
		}
		</script>
		<script type="text/javascript">
		function commentbutton() {
			if (window.XMLHttpRequest) {
				xmlhttp=new XMLHttpRequest();
			}
			else {
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange=function() {
				//
			}
			var txt = document.getElementById('commenttext').value;
			var parameters = "id=<?php echo($_GET['id']) ?>&text="+encodeURIComponent(txt);
			xmlhttp.open("POST","script-post-comment.php",true);
			xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			xmlhttp.send(parameters);
			//window.setTimeout(writeup, 0);
			window.setTimeout(erase, 200);
			window.setTimeout(appendComment, 0);
		}
		</script>
		<script>
		function appendComment()
		{
		<?php
		$precrow = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE id='$uid'"));
		$precname=htmlentities($precrow["fname"]).' '.htmlentities($precrow["lname"]);
		$precppimgurl = $precrow["ppimgurl"];
		?>
		var newCommentHeader=document.createElement("div");
		var commenthead=document.createAttribute("class");
		commenthead.value="commenthead";
		newCommentHeader.setAttributeNode(commenthead);
		
		var pimga=document.createElement("a");
		var pimgaatt1=document.createAttribute("href");
		pimgaatt1.value="profile.php?id=<?php echo($uid); ?>";
		pimga.setAttributeNode(pimgaatt1);
		
		var pimg=document.createElement("img");
		var pimgatt1=document.createAttribute("style");
		pimgatt1.value="height:40px;float:left;";
		pimg.setAttributeNode(pimgatt1);
		var pimgatt2=document.createAttribute("src");
		pimgatt2.value="images/upload/users/p/<?php echo($ppimgurl); ?>";
		pimg.setAttributeNode(pimgatt2);
		
		var hfour=document.createElement("h4");
		var hfouratt1=document.createAttribute("class");
		hfouratt1.value="ttl";
		hfour.setAttributeNode(hfouratt1);
		
		var namea=document.createElement("a");
		var nameaatt1=document.createAttribute("href");
		nameaatt1.value="profile.php?id=<?php echo($uid); ?>";
		namea.setAttributeNode(nameaatt1);
		
		var namediv=document.createElement("div");
		var namedivatt1=document.createAttribute("class");
		namedivatt1.value="pcheader";
		namediv.setAttributeNode(namedivatt1);
		
		var name=document.createTextNode("<?php echo($precname); ?>");
		
		
		pimga.appendChild(pimg);
		newCommentHeader.appendChild(pimga);
		
		namediv.appendChild(name);
		namea.appendChild(namediv);
		hfour.appendChild(namea);
		newCommentHeader.appendChild(hfour);
		
		
		var cdiv=document.createElement("div");
		var cdivatt1=document.createAttribute("class");
		cdivatt1.value="ctextcontainer";
		cdiv.setAttributeNode(cdivatt1);
		var c=document.createTextNode(document.getElementById('commenttext').value);
		cdiv.appendChild(c);
		
		var list=document.getElementById("postblock")
		var n = list.children.length - 2;
		list.insertBefore(newCommentHeader,list.childNodes[n]);
		
		var list=document.getElementById("postblock")
		var n = list.children.length - 2;
		list.insertBefore(cdiv,list.childNodes[n]);
		}
		</script>
	</head>
	<body style="padding:0px;margin:0px;overflow:hidden;" onload="widthcalc()">
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
				<div style="position:relative;top:0px;z-index:5;">
					<?php
				if($permission==1){
					$sql2a = "SELECT * FROM posts
					WHERE pid = '$pid'";
					$result2a = mysql_query($sql2a);
					while($myrow = mysql_fetch_array($result2a)){
						$fid = $myrow["fid"];
						$pid = $myrow["pid"];
						if(($myrow["annotation"]!==0) && ($myrow["annotation"]!=='') && ($myrow["annotation"]!=='0')){
							$annotation = $myrow["annotation"];
						}
						else{
							$annotation='';
						}
						if(($myrow["post"]!==0) && ($myrow["post"]!=='') && ($myrow["post"]!=='0')){
							$post = htmlentities($myrow["post"]) . '<br />';
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
						WHERE id='$fid'";
						$uresult = mysql_query($usql);
						$uinfo = mysql_fetch_array($uresult);
						$fname = htmlentities($uinfo["fname"]);
						$lname = htmlentities($uinfo["lname"]);
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
						echo ('<div id="postblock" class="container"><div class="containerhead" style=""><a href="profile.php?id=' . $fid . '"><img style="height:40px;float:left;" src="' . $pimgurl . '" /></a><h4 class="ttl" style=""><a href="profile.php?id=' . $fid . '"><div class="pcheader">' . $fname . ' ' . $lname . '</div></a><div class="pcheader" style="float:right;">' . '</div></h4></div><div class="ptextcontainer">' . $annotation . $post . $media . '</div><div class="containerfoot"><div style="display:inline;padding:5px;float:left;color:#AAAAAA;font-size:15px;padding:0px;margin:2px;">' . $time . '</div><div style="display:inline;padding:5px;color:#AAAAAA;font-size:20px;padding:0px;margin:2px;" id="like' . $pid . '">' . $printnumber . '</div><div style="display:inline;padding:5px;" onclick="like(' . $pid . ')" title="Thumbs-Up"><img class="thumbsup" src="thumbs-up-' . $thumbcolor . '.png" id="' . $pid . '" />' . '</div><div style="display:inline;padding:5px;"></div></div>');
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
							echo ('<div class="commenthead"><a href="profile.php?id=' . $cfid . '"><img style="height:40px;float:left;" src="' . $cpimgurl . '" /></a><h4 class="ttl" style=""><a href="profile.php?id=' . $cfid . '"><div class="pcheader" style="float:left;">' . $cfname . ' ' . $clname . '</div></a><div class="pcheader" style="float:right;"></div><div class="pcheader" style="float:right;">' . $ctime . '</div></h4></div><div class="ctextcontainer">' . $comment . '</div>');
						}
						
						$sql = "SELECT * FROM users WHERE id='$uid'";
						$result = mysql_query($sql);
						$row = mysql_fetch_array($result);
						$fname = $row["fname"];
						$lname = $row["lname"];
						$ppimgurl = $row["ppimgurl"];
						
						echo ('<div class="commenthead"><a href="profile.php?id=' . $uid . '"><img style="height:40px;float:left;" src="images/upload/users/p/' . $ppimgurl . '" /></a><h4 class="ttl" style=""><a href="profile.php?id=' . $uid . '"><div class="pcheader" style="float:left;">' . $fname . ' ' . $lname . '</div></a><div class="npcheader" style="float:right;" onclick="commentbutton()">Post</div></h4></div><div class="ctextcontainer"><textarea id="commenttext" style="width:100%;min-height:100px;"></textarea></div>');
						echo ('</div><br />');
					}
				}
				else{
					$uinfo = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE id='$profileduser'"));
					$fname = htmlspecialchars($uinfo["fname"]);
					$lname = htmlspecialchars($uinfo["lname"]);
					$sex = $uinfo["sex"];
					if($sex==1){
						$their="his";
					}
					elseif($sex==0){
						$their="her";
					}
					else{
						$their="their";
					}
					echo("<p style=\"color:#888888;\">You don't have permission to view ".$fname." ".$lname."'s posts yet.</p><br />");
				}
								?>
				</div>
			</center>
		</div>
	</body>
</html>