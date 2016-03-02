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
$profiledgroup = $_GET["id"];
$uid = $_SESSION["uid"];

$sql = "SELECT * FROM groups
WHERE groupid='$profiledgroup'";
$result = mysql_query($sql);
$row = mysql_fetch_array($result);
$gpimgurl = $row["picurl"];
?>
<html>
	<head>
		<title>
		Radford Network
		</title>
		<link rel="stylesheet" type="text/css" href="network.css" />
		<style type="text/css">
		td
		{
		border-color:black;
		border-style:none;
		border-width:1px;
		padding:5px;
		}
		.tdp
		{
		display:inline;
		margin:0px;
		padding:0px;
		}
		html, body
		{
		padding:0px;
		margin:0px;
		border-style:none;
		}
		</style>
		<script type="text/javascript">
		function widthcalc() {
			window.setInterval(function(){
			var win = window.innerWidth;
			var news = win-200;
			var feed = document.getElementById('feed');
			feed.style.width=news;
			var postsw = news-160;
			var postsf = postsw+"px";
			var posts = document.getElementById('userposts');
			posts.style.width=postsf;
			var winh = window.innerHeight;
			var newsh = winh-91;
			var feedh = document.getElementById('feed');
			feed.style.height=newsh;
			//var friendbox = document.getElementById('friendbox');
			//friendbox.style.height=newsh;
			}, 100);
		}
		</script>
		<script type="text/javascript">
		function heightcalc() {
			var winh = window.innerHeight;
			var newsh = winh-50;
			var feedh = newsh+"px";
			var feed = document.getElementById('feed');
			feed.style.height=feedh;
		}
		</script>
		<script type="text/javascript">
		function layout() {
			//window.setTimeout(heightcalc, 0);
			//window.setTimeout(widthcalc, 0);
			var winh = window.innerHeight;
			var newsh = winh-50hk;
			var feedh = newsh+"px";
			var feed = document.getElementById('feed');
			feed.style.height=feedh;
		}
		</script>
		<script type="text/javascript">
		function h1a() {
			var h = -250;
			var x;
			var x = window.setInterval(myf, 20);
			window.setTimeout(stopdown, 1000);
			function myf() {
				if (h<0) {
					var mydiv = document.getElementById("friendlist");
					h = h+10;
					var height = h+"px";
					mydiv.style.right=height;
				}
				else {				
				}
			}
			document.getElementById('hideside').style.display='';
			document.getElementById('showside').style.display='none';
			function upp() {
				var x = window.setInterval(myf, 20);
			}
			function stopdown() {
				window.clearInterval(x)
			}
		}
		</script>
		<script type="text/javascript">
		function h2a() {
			var h = 0;
			var x;
			var x = window.setInterval(myf, 20);
			window.setTimeout(stopup, 1000);
			function myf() {
				if (h>-250) {
				var mydiv = document.getElementById("friendlist");
				h = h-10;
				var height = h+"px";
				mydiv.style.right=height;
				}
				else {	
				}
			}
			document.getElementById('showside').style.display='';
			document.getElementById('hideside').style.display='none';
			function upp() {
				var x = window.setInterval(myf, 20);
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
			y = "&id="+<?php echo($profiledgroup); ?>;
			t = "?t="+txt;
			ty = t+y;
			xmlhttp.open("GET","grouppost.php"+ty,true);
			xmlhttp.send();
	
			window.setTimeout(hide, 0);
		}
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
		function deltagroup() {
			var uid = <?php echo($_SESSION["uid"]) ?>;
			var gid = <?php echo($profiledgroup) ?>;
			if (window.XMLHttpRequest) {
				xmlhttp=new XMLHttpRequest();
			}
			else {
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
	
			var val = document.getElementById('gbutton');
			var valu = document.getElementById('tvar1').innerHTML;
			var varvalu = document.getElementById('tvar1');
			//var valu="Join";
			if (valu==0) {
				val.innerHTML='Leave';
				varvalu.innerHTML='1';
			}
			else if (valu==1) {
				val.innerHTML='Join';
				varvalu.innerHTML='0';
			}
			else {
				val.innerHTML='error'+valu;
			}
			xmlhttp.onreadystatechange=function() {
				//
			}
			xmlhttp.open("GET","deltagroup.php?id="+<?php echo($profiledgroup); ?>,true);
			xmlhttp.send();
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
			xmlhttp.open("POST","groupplike.php",true);

			xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xmlhttp.setRequestHeader("Content-length", param.length);
			xmlhttp.setRequestHeader("Connection", "close");
			xmlhttp.send(param);
			document.getElementById(id).innerHTML='Liked';
		}
		</script>
	</head>
	<body style="" onload="widthcalc()">
		<div id="tvar1" style="display:none;">
		<?php
		$id = htmlspecialchars($_GET["id"]);
		$myid = $_SESSION["uid"];
		
		$sql2a = "SELECT * FROM groupmembers WHERE groupid='$profiledgroup' AND uid='$myid'";
		$result2a = mysql_query($sql2a);
		$num = mysql_num_rows($result2a);

		if ($num==0) {
			echo ('0');
		}
		else if ($num==1) {
			echo ('1');
		}
		else {
			echo ('error');
		}
		?>
		</div>

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
					<a href="logout.php" style="">
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
						<li>
							newsfeed
						</li>
					</a>
					<a href="profile.php?id=<?php echo($uid) ?>">
						<li>
							profile
						</li>
					</a>
					<a href="photos.php?id=<?php echo($uid) ?>">
						<li>
							photos
						</li>
					</a>
					<a href="groups.php?id=<?php echo($uid) ?>">
						<li>
							groups
						</li>
					</a>
					<a href="classes.php?id=<?php echo($uid) ?>">
						<li>
							classes
						</li>
					</a>
					<a href="settings.php?id=<?php echo($uid) ?>">
						<li>
							settings
						</li>
					</a>
				</ul>
			</div>
			<h2 class="flabel">
				Friends
			</h2>
			<ul style="list-style-type:none;">
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
					echo ('<a href="profile.php?id=' . $id . '"><li style="padding:3px;font-size:14px;">' . $name . '</li></a>');
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
					<div class="postbutton" id="writebutton" onclick="writebutton()" onmousedown="this.className='postbuttonactive'" onmouseup="this.className='postbutton'" onmouseout="this.className='postbutton'">
						Write
					</div>
					<div class="postbutton" style="display:none;" id="postbutton" onclick="postbutton()" onmousedown="this.className='postbuttonactive'" onmouseup="this.className='postbutton'" onmouseout="this.className='postbutton'">
						Post
					</div>
					<div class="postbutton" style="display:none;" id="sendbutton" onclick="sendbutton()" onmousedown="this.className='postbuttonactive'" onmouseup="this.className='postbutton'" onmouseout="this.className='postbutton'">
						Send
					</div>
					<div class="postbutton" onclick="hide()"  onmousedown="this.className='postbuttonactive'" onmouseup="this.className='postbutton'" onmouseout="this.className='postbutton'" style="">
						Cancel
					</div>
				</div>
			</div>
		</center>
		<!--This is the news feed-->
		<div class="feed" id="feed" style="">
			<center>
				<br />
				<div id="userwrapper" class="infowrapper" style="text-shadow:0px 1px #CDCDCD;">
					<div id="left" class="infowrapperl" style="">
						<h1 style="margin:0px;padding:2px;float:left;margin-left:15px;margin:10px;">
							<?php
							$sql = "SELECT * FROM groups WHERE groupid = '$profiledgroup'";
							$result = mysql_query($sql);
							$row = mysql_fetch_array($result);
							$gname = htmlspecialchars($row["gname"]);
							echo ($gname);
							?>
						</h1>
						<img src="<?php echo($gpimgurl); ?>" style="height:200px;max-width:400px;border-style:solid;border-color:white;border-width:10px;box-shadow:0px 2px 9px black;float:left;margin:5px;margin-left:25px;display:block;" />
					</div>
					<div id="right" style="width:32%;height:300px;float:right;background-color:;padding-right:20px;">
						<p style="margin:2px;text-align:center;padding:5px;display:block;height:100px;overflow:hidden;">
							<?php
							$sql = "SELECT * FROM groups WHERE groupid = '$profiledgroup'";
							$result = mysql_query($sql);
							$row = mysql_fetch_array($result);
							$about = htmlspecialchars($row["about"]);
							echo ('<i>' . $about . '</i>');
							?>
						</p>
						<table>
							<tr style="text-shadow:0px -1px #770000;">
								<td>
									<div class="infowrapperbutton" onmousedown="this.className='infowrapperbuttonactive'" onmouseout="this.className='infowrapperbutton'" onmouseup="this.className='infowrapperbutton'" onclick="postdown()" >
										Post
									</div>
								</td>
								<td colspan="1">
									<div style="" id="gbutton" class="infowrapperbutton" onmousedown="this.className='infowrapperbuttonactive'" onmouseout="this.className='infowrapperbutton'" onmouseup="this.className='infowrapperbutton'" onclick="deltagroup()">
										<?php
										$myid = $_SESSION["uid"];
										$sql2a = "SELECT * FROM groupmembers WHERE groupid='$profiledgroup' AND uid='$myid'";
										$result2a = mysql_query($sql2a);
											$num = mysql_num_rows($result2a);
										if ($num==0) {
											echo ('Join');
										}
										else if ($num==1) {
											echo ('Leave');
										}
										else {
											echo ('error');
										}
										?>
									</div>
								</td>
							</tr>
						</table>
					</div>
				</div>
				<br />
				<div id="feedbody">
					<div id="userposts" class="mainuserposts" style="">
						<div style="width:296px;height:22px;border-radius:100px;background-color:;box-shadow:0px 2px 6px 0px black">
							<div class="mupswitchactive" onclick="window.location='group.php?id=<?php echo($_GET["id"])?>';" style="border-radius:100px 0px 0px 100px;">
								Forum
							</div>
							<div class="mupswitch" onmousedown="this.className='mupswitchactive'" onmouseout="this.className='mupswitch'" onmouseup="this.className='mupswitch'" onclick="window.location='groupannouncements.php?id=<?php echo($_GET["id"])?>';" style="border-radius:0px 100px 100px 0px;">
								Announcements
							</div>
						</div>
					<br />
					<?php
					$uid;
					$sql2a = "SELECT * FROM groupposts
					INNER JOIN users
					ON groupposts.fid=users.id
					WHERE groupid='$profiledgroup'
					ORDER BY time DESC
					LIMIT 20";
					$result2a = mysql_query($sql2a);
					while($myrow = mysql_fetch_array($result2a)){
						$pid = htmlspecialchars($myrow["pid"]);
						$uid = htmlspecialchars($myrow["fid"]);
						$fname = htmlspecialchars($myrow["fname"]);
						$lname = htmlspecialchars($myrow["lname"]);
						$pimgurl = $myrow["picurl"];
						$post = htmlspecialchars($myrow["post"]);
						$time = htmlspecialchars($myrow["day"]);
$picurl = "imgthumb/" . $myrow["picurl"];
							if (!$myrow["picurl"]) {
								$picurl = "ppdefault.jpg";
							}
						$sql = "SELECT * FROM grouppostl WHERE id = '$uid' AND pid = '$pid'";
						$result = mysql_query($sql);
						$num = mysql_num_rows($result);
						if ($num == 0) {
							$likable = "Like";
							$sql = "SELECT * FROM grouppostl WHERE pid = '$pid'";
							$result = mysql_query($sql);
							$num = mysql_num_rows($result);
							if ($num == 0) {
								$num = "";
							}
						}
						else if ($num==1) {
							$likable = "Liked";
							$sql = "SELECT * FROM grouppostl WHERE pid = '$pid'";
							$result = mysql_query($sql);
							$num = mysql_num_rows($result);
						}
						else {

						}
						echo ('<div class="cntnr" style=""><div class="contnr" style=""><a href="profile.php?id=' . $uid . '"><img style="height:40px;float:left;" src="' . $picurl . '" /><h4 class="ttl" style=""><div class="pcheader" style="float:left;">' . $fname . ' ' . $lname . '</div><div class="pcheader" style="float:right;">' . $time . '</div></h4></a></div><div class="contner">' . $post . '<div style="text-align:right;"><div style="display:inline;padding:5px;"><a href="groupcomments.php?id=' . $pid . '" style="color:black;">Comment</a></div><div style="display:inline;padding:5px;" onclick="like(' . $pid . ')" id="' . $pid . '">' . $likable . ' ' . $num . '</div></div></div>');
						$precsql = "SELECT * FROM grouppostc
						INNER JOIN users
						ON grouppostc.f2id=users.id
						WHERE pid = '$pid'";
						$precresult = mysql_query($precsql);
						$precnum = mysql_num_rows($precresult);
						$lim = $precnum-4;
						if ($lim<0){
						$lim = 0;
						}
						$csql = "SELECT * FROM grouppostc
						INNER JOIN users
						ON grouppostc.f2id=users.id
						WHERE pid = '$pid'
						ORDER BY time ASC
						LIMIT $lim,4";
						$cresult = mysql_query($csql);
						while ($crow = mysql_fetch_array($cresult)) {
							$cuid = htmlspecialchars($crow["id"]);
							$cfname = htmlspecialchars($crow["fname"]);
							$clname = htmlspecialchars($crow["lname"]);
							$cpimgurl = $crow["picurl"];
							$comment = htmlspecialchars($crow["comment"]);
							$ctime = htmlspecialchars($crow["day"]);
$cpicurl = "imgthumb/" . $cpimgurl;
							if (!$crow["day"]) {
								$cpicurl = "ppdefault.jpg";
							}
							echo ('<div class="ccontnr"><a href="profile.php?id=' . $cuid . '"><img style="height:40px;float:left;" src="' . $cpicurl . '" /><h4 class="ttl" style=""><div class="pcheader" style="float:left;">' . $cfname . ' ' . $clname . '</div><div class="pcheader" style="float:right;"></div><div class="pcheader" style="float:right;">' . $ctime . '</div></h4></a></div><div class="ccontner">' . $comment . '</div>');
						}
						echo ('</div><br />');
					};
					?>
					</div>
					<!--sidebar-->
					<div id="sidebar" class="mainsidebar" style="">
						<!--Members-->
						<div id="members" class="msbl" style="">
							<div id="showside" class="fsidelabel" onclick="h1a()" onmousedown="this.className='fsidelabelactive'" onmouseup="this.className='fsidelabel'" style="">
								Members &lt
							</div>
							<div id="hideside" class="fsidelabel" onclick="h2a()" onmousedown="this.className='fsidelabelactive'" onmouseup="this.className='fsidelabel'" style="display:none;">
								Members &gt
							</div>
							<ul style="z-index:0;list-style-type:none;height:100%;width:150px;overflow:hidden;background-color:#444444;color:white;text-shadow:0px 1px #666666;background-image:url('iosfolderbackground.jpg');background-repeat:repeat;position:fixed;right:-250px;top:50px;" id="friendlist">
							<br />
								<li>
									<h3>
										Members
									</h3>
								</li>
								<?php
								$id = $_GET["id"];
								$sql2a = "SELECT * FROM groupmembers WHERE groupid = '$profiledgroup'";
								$result2a = mysql_query($sql2a);
								while($rowa = mysql_fetch_array($result2a)) {
									$ida = htmlspecialchars($rowa["uid"]);
									$sql3a = "SELECT * FROM users WHERE id = '$ida'";
									$result3a = mysql_query($sql3a);
									while($rowaa = mysql_fetch_array($result3a)){
										$name = htmlspecialchars($rowaa["fname"]) . ' ' . htmlspecialchars($rowaa["lname"]);
										echo ('<li><a style="" href="profile.php?id=' . $ida . '">' . $name . '</a></li>');
									}
								}
								?>
							</ul>
						</div>
					</div>
				</div>
				<br />
			</center>
		</div>
	</body>
</html>