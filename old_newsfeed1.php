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
$uid = $_SESSION['uid'];
?>
<html>
	<head>
		<title>
			Radford Network
		</title>
		<link rel="stylesheet" type="text/css" href="network.css" />
		<script type="text/javascript">
		function widthcalc() {
			window.setInterval(function(){
				var win = window.innerWidth;
				var news = win-200;
				var feed = document.getElementById('feed');
				feed.style.width=news;
				var postsw = news-160;
				var postsf = postsw+"px";
				var winh = window.innerHeight;
				var newsh = winh-88;
				feed.style.height=newsh;
			}, 100);
		}
		</script>
		<script type="text/javascript">
		function heightcalc() {
			var winh = window.innerHeight;
			var newsh = winh-100;
			var feedh = document.getElementById("feed");
			feed.style.height=newsh;
		}
		</script>
		<script type="text/javascript">
		function down() {
			var h = -200;
			var x;
			var x = window.setInterval(myf, 2);
			document.getElementById('userwrapper').style.display='none';
			function myf() {
				if (h<100) {
					var mydiv = document.getElementById("textarea");
					h = h+5;
					var height = h+"px";
					mydiv.style.top=height;
				}
				else {
					window.setTimeout(stopdown, 0);
				}
			}
			function stopdown() {
				window.clearInterval(x)
			}
		}
		</script>
		<script type="text/javascript">
		function writedown() {
			var h = -200;
			var x;
			var x = window.setInterval(myf, 2);
			document.getElementById('userwrapper').style.display='none';
			document.getElementById('sendbutton').style.display='none';
			document.getElementById('postbutton').style.display='none';
			document.getElementById('writebutton').style.display='';
			function myf() {
				if (h<100) {
						var mydiv = document.getElementById("textarea");
					h = h+5;
					var height = h+"px";
					mydiv.style.top=height;
				}
				else {
					window.setTimeout(stopdown, 0);
				}
			}
			function stopdown() {
				window.clearInterval(x)
			}
		}
		function writebutton() {
			if (window.XMLHttpRequest) {
				xmlhttp=new XMLHttpRequest();
			}
			else {
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange=function() {
				//
			}
			var tx = document.getElementById('posttext').value;
			function htmlspecialchars(str) {
				 if (typeof(str) == "string") {
				 	str = str.replace(/&/g, "&amp"); // must do &amp; first
				 	str = str.replace(/"/g, "&quot");
				 	str = str.replace(/'/g, "&#039");
				 	str = str.replace(/</g, "&lt");
				 	str = str.replace(/>/g, "&gt");
				 	str = str.replace(/ /g, "%20");
				 }
				 return str;
			}
			var txt = htmlspecialchars(tx);
			t = "?t="+txt;
			address = "post.php?t="+txt;
			xmlhttp.open("GET","write.php"+t,true);
			xmlhttp.send();
			window.setTimeout(hide, 0);
		}
		</script>
		<script type="text/javascript">
		function postdown() {
			var h = -200;
			var x;
			var x = window.setInterval(myf, 2);
			document.getElementById('userwrapper').style.display='none';
			document.getElementById('sendbutton').style.display='none';
			document.getElementById('postbutton').style.display='';
			document.getElementById('writebutton').style.display='none';
			function myf() {
				if (h<100) {
					var mydiv = document.getElementById("textarea");
					h = h+5;
					var height = h+"px";
					mydiv.style.top=height;
				}
				else {
					window.setTimeout(stopdown, 0);
				}
			}
			function stopdown() {
					window.clearInterval(x)
			}
		}
		function postbutton() {
			if (window.XMLHttpRequest) {
				xmlhttp=new XMLHttpRequest();
			}
			else {
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange=function() {
				//
			}
			var tx = document.getElementById('posttext').value;
			function htmlspecialchars(str) {
				if (typeof(str) == "string") {
					str = str.replace(/&/g, "&amp"); // must do &amp; first
					str = str.replace(/"/g, "&quot");
					str = str.replace(/'/g, "&#039");
					str = str.replace(/</g, "&lt");
					str = str.replace(/>/g, "&gt");
					str = str.replace(/ /g, "%20");
				}
				return str;
			}
			var txt = htmlspecialchars(tx);
			y = "&id="+<?php echo($profiledclass); ?>;
			t = "?t="+txt;
			ty = t+y;
			xmlhttp.open("GET","classpost.php"+ty,true);
			xmlhttp.send();
			window.setTimeout(hide, 0);
		}
		</script>
		<script tpe="text/javascript">
		function hide() {
			var h = 100;
			var a = 0;
			var x;
			var x = window.setInterval(myf, 2);
			function myf() {
				if (h>-200) {
					var mydiv = document.getElementById("textarea");
					h = h-5;
					var height = h+"px";
					mydiv.style.top=height;
				}
				else if (h==-200) {
					window.setTimeout(stopup, 1000);
					document.getElementById('userwrapper').style.display='';
				}
				else {
					window.setTimeout(stopup, 1000);
				}
			}
			function stopup() {
				window.clearInterval(x)
			}
			window.setTimeout(erase, 1000)
			function erase() {
				document.getElementById('posttext').value='';
			}
		}
		</script>
		<script type="text/javascript">
		function like(id) {
			if (window.XMLHttpRequest) {
				xmlhttp=new XMLHttpRequest();
			}
			else {
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange=function() {
				//
			}
			var param = "id="+id;
			xmlhttp.open("POST","plike.php",true);

			xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xmlhttp.setRequestHeader("Content-length", param.length);
			xmlhttp.setRequestHeader("Connection", "close");
			xmlhttp.send(param);
			document.getElementById(id).innerHTML='Liked';
		}
		</script>
		<script type="text/javascript">
		function acceptf(id) {
			if (window.XMLHttpRequest) {
				xmlhttp=new XMLHttpRequest();
			}
			else {
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange=function() {
				//
			}
			var param = "fid="+id;
			xmlhttp.open("POST","friend1.php",true);
			xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xmlhttp.setRequestHeader("Content-length", param.length);
			xmlhttp.setRequestHeader("Connection", "close");
			xmlhttp.send(param);
			var fid = "f"+id;
			document.getElementById(fid).style.display='none';
		}
		</script>
		<script type="text/javascript">
		function declinef(id) {
			if (window.XMLHttpRequest) {
				xmlhttp=new XMLHttpRequest();
			}
			else {
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange=function() {
				//
			}
			var param = "fid="+id;
			xmlhttp.open("POST","frienddecline.php",true);
			xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xmlhttp.setRequestHeader("Content-length", param.length);
			xmlhttp.setRequestHeader("Connection", "close");
			xmlhttp.send(param);
			var fid = "f"+id;
			document.getElementById(fid).style.display='none';
		}
		</script>
	</head>
	<body style="padding:0px;margin:0px;overflow:hidden;" onload="widthcalc()">
		<!--This is the header-->
		<div class="head">
			<a href="newsfeed.php">
				<h1 style="float:left;color:white;position:relative;top:-13px;display:inline;">
					Radford Network
				</h1>
			</a>
			<ul style="list-style-type:none;display:inline;position:relative;top:12px;left:-15px;float:right;">
				<li class="opt">
					<div style="display:inline;" onclick="writedown()">
						Write
					</div>
				</li>
				<li class="opt">
					<a href="logout.php">
						Log Out
					</a>
				</li>
			</ul>
		</div>
		<!--This is the friends box-->
		<div class="friends">
			<div style="margin:5px;padding:5px;border-style:solid;border-color:#888888;background-color:#444444;">
				<ul style="list-style-type:none;">
					<li>
						<form action="search.php" method="get">
							<input type="text" class="searchinput" name="q" value="Search" onclick="this.value='';this.style.color='black';" />
							<img src="search.png" style="width:25px;height:25px;display:inline;float:right;" onclick="submit()" />
						</form>
					</li>
					<br />
					<br />
					<a href="newsfeed.php">
						<li class="fmenuli">
							<img src="newsfeed.png" style="height:20px;position:relative;left:-20px;top:5px;" />
							newsfeed
						</li>
					</a>
					<a href="profile.php?id=<?php echo($uid) ?>">
						<li class="fmenuli">
							<img src="ppdefault.jpg" style="height:20px;position:relative;left:-20px;top:5px;" />
							profile
						</li>
					</a>
					<a href="photos.php?id=<?php echo($uid) ?>">
						<li class="fmenuli">
							<img src="photos.png" style="height:20px;position:relative;left:-20px;top:5px;" />
							photos
						</li>
					</a>
					<a href="groups.php?id=<?php echo($uid) ?>">
						<li class="fmenuli">
							<img src="groups.png" style="height:20px;position:relative;left:-20px;top:5px;" />
							groups
						</li>
					</a>
					<a href="classes.php?id=<?php echo($uid) ?>">
						<li class="fmenuli">
							<img src="classes.png" style="height:20px;position:relative;left:-20px;top:5px;" />
							classes
						</li>
					</a>
					<a href="settings.php?id=<?php echo($uid) ?>">
						<li class="fmenuli">
							<img src="settings.png" style="height:20px;position:relative;left:-20px;top:5px;" />
							settings
						</li>
					</a>
				</ul>
			</div>
			<h2 class="flabel">
				Friends
			</h2>
			<ul style="list-style-type:none;">
				<a href="inviteuser.php"><li class="fli" style="position:relative;left:-12px;text-size:15px;">+ Invite Friends</li></a>
				<?php
				$uid;
				$sql2a = "SELECT * FROM friends 
				INNER JOIN users
				ON friends.fid = users.id
				WHERE uid = '$uid'";
				$result2a = mysql_query($sql2a);
				if (mysql_num_rows($result2a)==0) {
				echo('<a href="search.php?q="><li style="padding:3px;">Find Friends</li></a>');
				}
				while($rowa = mysql_fetch_array($result2a)){
					$name = htmlspecialchars($rowa["fname"]) . ' ' . htmlspecialchars($rowa["lname"]);
					$id = htmlspecialchars($rowa["id"]);
					echo ('<a href="profile.php?id=' . $id . '"><li class="fli">' . $name . '</li></a>');
				}
				?>
			</ul>
		</div>
		<!--This is the posting box-->
		<center>
			<div style="z-index:6;background-color:#DDDDDD;width:90%;height:200px;box-shadow:0px 5px 20px black;border-style:solid;border-color:#990000;border-width:10px;position:absolute;top:-200px;left:50px;" id="textarea">
				<div style="width:100%;height:75%;box-shadow:inset 5px 5px 15px black;">
					<textarea style="width:100%;height:100%;resize:none;font-family:arial;padding:10px;" id="posttext"></textarea>
				</div>
				<div style="height:25%;width:100%;background-color:;">
					<div class="postbutton" id="writeb" onclick="writebutton()" onmousedown="this.className='postbuttonactive'" onmouseup="this.className='postbutton'" onmouseout="this.className='postbutton'">
						Write
					</div>
					<div class="postbutton" style="display:none;" id="postb" onclick="postbutton()" onmousedown="this.className='postbuttonactive'" onmouseup="this.className='postbutton'" onmouseout="this.className='postbutton'">
						Post
					</div>
					<div class="postbutton" style="display:none;" id="sendb" onclick="sendbutton()" onmousedown="this.className='postbuttonactive'" onmouseup="this.className='postbutton'" onmouseout="this.className='postbutton'">
						Send
					</div>
					<div class="postbutton" onclick="hide()"  onmousedown="this.className='postbuttonactive'" onmouseup="this.className='postbutton'" onmouseout="this.className='postbutton'" style="">
						Cancel
					</div>
				</div>
			</div>
		</center>
		<!--This is the news feed-->
		<div class="feed" id="feed" style="overflow-x:hidden;">
			<center>
				<br />
				<div style="position:relative;top:0px;z-index:5;">
					<?php
					$sql = "SELECT * FROM prefriends
					INNER JOIN users
					ON prefriends.senderid=users.id
					WHERE recipientid='$uid'
					LIMIT 50";
					$result = mysql_query($sql);
					while($myrow = mysql_fetch_array($result)){
						$fid = htmlspecialchars($myrow["senderid"]);
						$fname = htmlspecialchars($myrow["fname"]);
						$lname = htmlspecialchars($myrow["lname"]);
						$name = $fname . ' ' . $lname;
						$picurl = $myrow["picurl"];
						$pimgurl = "imgthumb/" . $picurl;
						if (!$myrow["picurl"]) {
							$pimgurl = "ppdefault.jpg";
						}
						echo ('<div id="f' . $fid . '"><div class="cntnr"><div class="contnr" style=""><a href="profile.php?id=' . $fid . '"><img style="height:40px;float:left;" src="' . $pimgurl . '" /></a><h4 class="ttl" style=""><a href="profile.php?id=' . $fid . '"><div class="pcheader" style="float:left;">' . $fname . ' ' . $lname . '</a> <div style="display:inline;font-size:14px;">wants to be friends</div></div><div style="position:relative;top:2px;margin:7px;display:inline;float:right;" onclick="declinef(' . $fid . ')">Deny</div><div style="position:relative;top:2px;margin:7px;display:inline;float:right;" onclick="acceptf(' . $fid . ')">Accept</div></h4></div></div><br /></div>');
					}


					$uid;
					$sql2a = "SELECT * FROM friends
					INNER JOIN posts
					ON friends.fid = posts.fid
					WHERE uid = '$uid'
					ORDER BY time DESC
					LIMIT 20";
					$result2a = mysql_query($sql2a);
					while($myrow = mysql_fetch_array($result2a)){
						$fid = htmlspecialchars($myrow["fid"]);
						$pid = htmlspecialchars($myrow["pid"]);
						$post = htmlspecialchars($myrow["post"]);
						$time = htmlspecialchars($myrow["day"]);
//echo ('<!--');
//$t = getdate($time);
//echo ('-->');
//$weekday = date('w', $time);
						$usql = "SELECT * FROM users
						WHERE id='$fid'";
						$uresult = mysql_query($usql);
						$uinfo = mysql_fetch_array($uresult);
						$fname = htmlspecialchars($uinfo["fname"]);
						$lname = htmlspecialchars($uinfo["lname"]);
						$pimgurl = "imgthumb/" . $uinfo["picurl"];
						if (!$uinfo["picurl"]) {
							$pimgurl = "ppdefault.jpg";
						}
						$sql = "SELECT * FROM likes
						WHERE id = '$uid' AND pid = '$pid'";
						$result = mysql_query($sql);
						$num = mysql_num_rows($result);
						if ($num == 0) {
							$likable = "Like";
$num = "";
						}
						else if ($num==1) {
							$likable = "Liked";
						}
						else {

						}
						echo ('<div class="cntnr" style=""><a href="profile.php?id=' . $fid . '"><div class="contnr" style=""><img style="height:40px;float:left;" src="' . $pimgurl . '" /><h4 class="ttl" style=""><div class="pcheader" style="float:left;">' . $fname . ' ' . $lname . '</div><div class="pcheader" style="float:right;">' . $time . '</div></h4></div></a><div class="contner">' . $post . '<div style="text-align:right;"><div style="display:inline;padding:5px;"><a href="comments.php?id=' . $pid . '" style="color:black;">Comment</a></div><div style="display:inline;padding:5px;" onclick="like(' . $pid . ')" id="' . $pid . '">' . $likable . '</div>' . $num . '</div></div>');
						$precsql = "SELECT * FROM comments
						INNER JOIN users
						ON comments.f2id=users.id
						WHERE pid = '$pid'";
						$precresult = mysql_query($csql);
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
							$cfid = htmlspecialchars($crow["f2id"]);
							$cfname = htmlspecialchars($crow["fname"]);
							$clname = htmlspecialchars($crow["lname"]);
							$comment = htmlspecialchars($crow["comment"]);
							$cpimgurl = "imgthumb/" . $crow["picurl"];
							if (! $crow["picurl"]) {
								$cpimgurl = "ppdefault.jpg";
							}
							$ctime = htmlspecialchars($crow["day"]);
//echo ('<!--');
//$ct = getdate($ctime);
//echo ('-->');
//$cweekday = $ct['weekday'];
							echo ('<a href="profile.php?id=' . $cfid . '"><div class="ccontnr"><img style="height:40px;float:left;" src="' . $cpimgurl . '" /><h4 class="ttl" style=""><div class="pcheader" style="float:left;">' . $cfname . ' ' . $clname . '</div><div class="pcheader" style="float:right;"></div><div class="pcheader" style="float:right;">' . $ctime . '</div></h4></div></a><div class="ccontner">' . $comment . '</div>');
						}
						echo ('</div><br />');
					}
					?>
				</div>
			</center>
		</div>
	</body>
</html>