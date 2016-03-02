<?php 
require "get-page-data.php";
$sanitizedpageid=(int) $_SESSION["pageid"];
$result = mysql_query("SELECT * FROM `pages` WHERE `id`='$sanitizedpageid'");
$row = mysql_fetch_array($result);
$email = $row["email"];
$name = $row["name"];
$ppimgurl = $row["ppimgurl"];
header("Location: page.php?id=".$pageid);
?>
<html>
	<head>
		<?php require "meta-etceteras.php"; ?>
		<?php require "post-box-script.php"; ?>
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
	</head>
	<body style="padding:0px;margin:0px;overflow:hidden;" onload="">
		<?php require "header-logged-in.php"; ?>
		<?php require "sidebar.php"; ?>
		<?php require "post-box.php"; ?>
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
					$result2a=mysql_query("SELECT * FROM `pageposts` WHERE `pageid`='$sanitizedpageid' ORDER BY `time` DESC LIMIT 30");
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
							$post = htmlentities(mysql_real_escape_string($myrow["post"])) . '<br />';
						}
						else{
							$post='';
						}
						if(($myrow["media"]!==0) && ($myrow["media"]!=='') && ($myrow["media"]!=='0')){
							$media = $myrow["media"];
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
						$usql = "SELECT * FROM `pages` WHERE `id`='$sanitizedpageid'";
						$uresult = mysql_query($usql);
						$uinfo = mysql_fetch_array($uresult);
						$name = htmlspecialchars($uinfo["name"]);
						$pimgurl = "images/upload/pages/p/" . $uinfo["ppimgurl"];
						if (!$uinfo["ppimgurl"]) {
							$pimgurl = "ppdefault.jpg";
						}
						/*
						$sql = "SELECT * FROM pagepostl
						WHERE pid = '$pid'";
						$result = mysql_query($sql);
						$liked = mysql_num_rows($result);
						*/
						$n = mysql_num_rows(mysql_query("SELECT * FROM `pagepostl` WHERE `pid`='$pid'"));
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
						/*
						if ($liked == 0) {
							$thumbcolor = "gray";
$num = "";
						}
						else if ($liked==1) {
							$thumbcolor = "green";
						}
						else {

						}
						*/
						$thumbcolor = "gray";
						echo ('<div class="container"><div class="containerhead" style=""><a href="profile.php?id=' . $pageid . '"><img style="height:40px;float:left;" src="' . $pimgurl . '" /></a><h4 class="ttl" style=""><a href="profile.php?id=' . $pageid . '"><div class="pcheader">' . $name . '</div></a><div class="pcheader" style="float:right;">' . '</div></h4></div><div class="ptextcontainer">' . $annotation . $post . $media . '</div><div class="containerfoot"><div style="display:inline;padding:5px;float:left;color:#AAAAAA;font-size:15px;padding:0px;margin:2px;">' . $time . '</div><div style="display:inline;padding:5px;color:#AAAAAA;font-size:20px;padding:0px;margin:2px;" id="like' . $pid . '">' . $printnumber . '</div><div style="display:inline;padding:5px;" onclick="like(' . $pid . ')" title="Thumbs-Up"><img class="thumbsup" src="thumbs-up-' . $thumbcolor . '.png" id="' . $pid . '" />' . '</div><div style="display:inline;padding:5px;"><a href="post.php?id=' . $pid . '" title="Comment"><img style="width:20px;height:20px;" src="comment.png" /></a></div></div>');
						$precsql = "SELECT * FROM pagepostc INNER JOIN users ON pagepostc.f2id=users.id WHERE pid = '$pid'";
						$precresult = mysql_query($precsql);
						$precnum = mysql_num_rows($precresult);
						$lim = $precnum-4;
						if ($lim<0){
						$lim=0;
						}
						$csql = "SELECT * FROM comments
						INNER JOIN pages
						ON comments.f2id=pages.id
						WHERE pid = '$pid'
						ORDER BY time ASC
						LIMIT $lim, 4";
						$cresult = mysql_query($csql);
						while ($crow = mysql_fetch_array($cresult)) {
							$cfid = $crow["f2id"];
							$cfname = $crow["fname"];
							$clname = $crow["lname"];
							$comment = htmlentities(mysql_real_escape_string($crow["comment"]));
							$cpimgurl = "images/upload/pages/p/" . $crow["ppimgurl"];
							if (! $crow["ppimgurl"]) {
								$cpimgurl = "ppdefault.jpg";
							}
							$ctime = $crow["day"];
//echo ('<!--');
//$ct = getdate($ctime);
//echo ('-->');
//$cweekday = $ct['weekday'];
							echo ('<a href="profile.php?id=' . $cfid . '"><div class="commenthead"><img style="height:40px;float:left;" src="' . $cpimgurl . '" /><h4 class="ttl" style=""><div class="pcheader" style="float:left;">' . $cfname . ' ' . $clname . '</div><div class="pcheader" style="float:right;"></div><div class="pcheader" style="float:right;">' . $ctime . '</div></h4></div></a><div class="ctextcontainer">' . $comment . '</div>');
						}
						echo ('</div><br />');
					}
					$postquantity=mysql_num_rows(mysql_query("SELECT * FROM pageposts WHERE pageid = '$sanitizedpageid' LIMIT 31"));
					if($postquantity>30){
						echo("<p style=\"color:#888888;\">Older posts cannot be displayed.</p>");
					}
					else if($postquantity!=0){
						echo("<p style=\"color:#888888;\">That's all folks!</p><br />");
					}
					else{
						echo("<p style=\"color:#888888;\">No posts.</p><br />");
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
		$dfvalue = "Edit";
		$clickevent = "window.location='settings.php'";
		
		$sql = "SELECT * FROM pages WHERE id = '$sanitizedpageid'";
		$result = mysql_query($sql);
		$row = mysql_fetch_array($result);
		$name = htmlentities($row["name"]);
		$pimgurl = $row["ppimgurl"];
		//$birthday = $row["birthstamp"])
		//$birthday = date("F jS",$birthstamp);
		echo ("<a href=\"images/upload/pages/l/".$pimgurl."\"><img src=\"images/upload/pages/m/".$pimgurl."\" style=\"width:250px;\" /></a><br /><center><h3>" . $name."</h3></center><div id=\"dfbutton\" class=\"button\" style=\"position:absolute;top:210px;left:0px;\"  onmousedown=\"this.className='buttonactive'\" onmouseup=\"this.className='button'\" onmouseout=\"this.className='button'\" onclick=\"this.className='button';".$clickevent.";\">".$dfvalue."</div><p class=\"profileduserdata\">Birthday: " . $birthday . "</p><p class=\"profileduserdata\">" . $email . "</p>");
		?>
		</div>
	</body>
</html>