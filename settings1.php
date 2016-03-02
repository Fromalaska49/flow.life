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

$sql = "SELECT * FROM users
WHERE id='$uid'";
$result = mysql_query($sql);
$row = mysql_fetch_array($result);
$email = $row["email"];
$protopimgurl = $row["picurl"];
if($row["picurl"]) {
$picurl = $row["picurl"];
}
else{
$picurl = "ppdefault.jpg";
}
$protoquote = $row["quote"];
if($row["quote"]) {
$quote = $protoquote;
}
else{
$quote = "No quote set";
}
$protorelstat = htmlspecialchars($row["relstat"]);
$relname = htmlspecialchars($row["relpartnername"]);
if ($protorelstat==0){
	$relstat = "Single";
}
else if($protorelstat==1){
	$relstat = "with " . $relname;
}
else if ($protorelstat==2){
	$relstat = "Married";
}
else {
	$relstat = "error";
}
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
		padding:10px;
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
		img
		{
		float:right;
		height:100px;
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
				var winh = window.innerHeight;
				var newsh = winh-50;
				var neswhs = newsh+"px"
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
function h1a() {
	var h = 0;
	var x;
	var x = window.setInterval(myf, 20);
	window.setTimeout(stopdown, 1000);
	function myf() {
		if (h<200) {
			var mydiv = document.getElementById("friendlist");
			h = h+10;
			var height = h+"px";
			mydiv.style.height=height;
			}
			else {
				
			}
		}
		document.getElementById('friendhide').style.display='';
		document.getElementById('friendshow').style.display='none';
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
	var h = 200;
	var x;
	var x = window.setInterval(myf, 20);
	window.setTimeout(stopup, 1000);
	function myf() {
		if (h>0) {
			var mydiv = document.getElementById("friendlist");
			h = h-10;
			var height = h+"px";
			mydiv.style.height=height;
		}
		else {
			
		}
	}
	document.getElementById('friendshow').style.display='';
	document.getElementById('friendhide').style.display='none';
	function upp() {
		var x = window.setInterval(myf, 20);
	}
	function stopup() {
		window.clearInterval(x)
	}
}
</script>

<script type="text/javascript">
function h1b() {
	var h = 0;
	var x;
	var x = window.setInterval(myf, 20);
	window.setTimeout(stopdown, 1000);
	function myf() {
		if (h<200) {
			var mydiv = document.getElementById("classlist");
			h = h+10;
			var height = h+"px";
			mydiv.style.height=height;
			}
			else {
				
			}
		}
		document.getElementById('classhide').style.display='';
		document.getElementById('classshow').style.display='none';
		function upp() {
			var x = window.setInterval(myf, 20);
		}
		function stopdown() {
				window.clearInterval(x)
		}
	}
</script>
<script type="text/javascript">
function h2b() {
	var h = 200;
	var x;
	var x = window.setInterval(myf, 20);
	window.setTimeout(stopup, 1000);
	function myf() {
		if (h>0) {
			var mydiv = document.getElementById("classlist");
			h = h-10;
			var height = h+"px";
			mydiv.style.height=height;
		}
		else {
			
		}
	}
	document.getElementById('classshow').style.display='';
	document.getElementById('classhide').style.display='none';
	function upp() {
		var x = window.setInterval(myf, 20);
	}
	function stopup() {
		window.clearInterval(x)
	}
}
</script>

<script type="text/javascript">
function h1c() {
	var h = 0;
	var x;
	var x = window.setInterval(myf, 20);
	window.setTimeout(stopdown, 1000);
	function myf() {
		if (h<200) {
			var mydiv = document.getElementById("grouplist");
			h = h+10;
			var height = h+"px";
			mydiv.style.height=height;
			}
			else {
				
			}
		}
		document.getElementById('grouphide').style.display='';
		document.getElementById('groupshow').style.display='none';
		function upp() {
			var x = window.setInterval(myf, 20);
		}
		function stopdown() {
				window.clearInterval(x)
		}
	}
</script>
<script type="text/javascript">
function h2c() {
	var h = 200;
	var x;
	var x = window.setInterval(myf, 20);
	window.setTimeout(stopup, 1000);
	function myf() {
		if (h>0) {
			var mydiv = document.getElementById("grouplist");
			h = h-10;
			var height = h+"px";
			mydiv.style.height=height;
		}
		else {
			
		}
	}
	document.getElementById('groupshow').style.display='';
	document.getElementById('grouphide').style.display='none';
	function upp() {
		var x = window.setInterval(myf, 20);
	}
	function stopup() {
		window.clearInterval(x)
	}
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
		<div class="feed" id="feed" style="overflow-x:hidden;position:relative;top:30px;text-shadow:0px 1px #EFEFEF;">
			<center>
				<br />
				<br />
				<br />
				<div style="height:50px;" id="">
					<h3 style="display:block;float:left;margin:10px;">
						Settings
					</h3>
<br />
<br />




<table style="border-style:none;float:left;">
	<tr>
		<td>
			Change profile picture
		</td>
		<td>
			<form action="ppictureupload.php" method="post" enctype="multipart/form-data">
				<input type="file" name="file" id="file" />
				<br />
				<input type="submit" value="Upload" style="border-radius:100px;border-style:none;padding:2px 6px;
						/* gradients */
						background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #FFFFFF), color-stop(15%, #EEEEEE), color-stop(100%, #888888));
						background: -moz-linear-gradient(top, #FFFFFF 0%, #EEEEEE 55%, �#888888 130%);
						" onmousedown="this.style.boxShadow='inset 0px 1px 3px black';this.style.background='-webkit-gradient(linear, left top, left bottom, color-stop(0%, #777777), color-stop(15%, #999999), color-stop(100%, #DDDDDD))';this.style.background='-moz-linear-gradient(top, #777777 0%, #999999 55%, �#DDDDDD 130%);'"
						onmouseout="this.style.boxShadow='none';this.style.background='-webkit-gradient(linear, left top, left bottom, color-stop(0%, #FFFFFF), color-stop(15%, #EEEEEE), color-stop(100%, #888888))';this.style.background='-moz-linear-gradient(top, #FFFFFF 0%, #EEEEEE 55%, �#888888 130%);'" />
			</form>
		</td>
		<td style="text-align:right;float:right;">
			<?php echo('<img src="' . $picurl . '" style="height:80px;" />'); ?>
		</td>
	</tr>
	<tr>
		<td>
			Change Email
		</td>
		<td>
			<form action="setemail.php" method="post">
				<input type="text" name="email" style="border-color:#CDCDCD #FFFFFF #FFFFFF #FFFFFF;border-style:solid;border-width:2px;border-radius:1px;box-shadow:inset 0px 1px 10px -2px black;padding:3px;width:200px;" />
				<br />
				<input type="submit" value="Set" style="border-radius:100px;border-style:none;padding:2px 6px;
						/* gradients */
						background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #FFFFFF), color-stop(15%, #EEEEEE), color-stop(100%, #888888));
						background: -moz-linear-gradient(top, #FFFFFF 0%, #EEEEEE 55%, �#888888 130%);
						" onmousedown="this.style.boxShadow='inset 0px 1px 3px black';this.style.background='-webkit-gradient(linear, left top, left bottom, color-stop(0%, #777777), color-stop(15%, #999999), color-stop(100%, #DDDDDD))';this.style.background='-moz-linear-gradient(top, #777777 0%, #999999 55%, �#DDDDDD 130%);'"
						onmouseout="this.style.boxShadow='none';this.style.background='-webkit-gradient(linear, left top, left bottom, color-stop(0%, #FFFFFF), color-stop(15%, #EEEEEE), color-stop(100%, #888888))';this.style.background='-moz-linear-gradient(top, #FFFFFF 0%, #EEEEEE 55%, �#888888 130%);'" />
			</form>
		</td>
		<td style="text-align:right;float:right;">
			<?php echo($email); ?>
		</td>
	</tr>
	<tr>
		<td>
			Favorite Quote
		</td>
		<td>
			<form action="setquote.php" method="post">
				<textarea class="textinput" id="quote" size="128" maxlength="128" style="resize:none;height:100px;width:200px;padding:7px;box-shadow:inset 0px 1px 20px -3px black;border-radius:1px;border-color:#CDCDCD #FFFFFF #FFFFFF #FFFFFF;border-style:solid;border-width:2px;font-family:arial;overflow:hidden;" name="quote"></textarea>
				<br />
				<input type="submit" value="Set" style="border-radius:100px;border-style:none;padding:2px 6px;
						/* gradients */
						background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #FFFFFF), color-stop(15%, #EEEEEE), color-stop(100%, #888888));
						background: -moz-linear-gradient(top, #FFFFFF 0%, #EEEEEE 55%, �#888888 130%);
						" onmousedown="this.style.boxShadow='inset 0px 1px 3px black';this.style.background='-webkit-gradient(linear, left top, left bottom, color-stop(0%, #777777), color-stop(15%, #999999), color-stop(100%, #DDDDDD))';this.style.background='-moz-linear-gradient(top, #777777 0%, #999999 55%, �#DDDDDD 130%);'"
						onmouseout="this.style.boxShadow='none';this.style.background='-webkit-gradient(linear, left top, left bottom, color-stop(0%, #FFFFFF), color-stop(15%, #EEEEEE), color-stop(100%, #888888))';this.style.background='-moz-linear-gradient(top, #FFFFFF 0%, #EEEEEE 55%, �#888888 130%);'" />
			</form>
		</td>
		<td style="text-align:right;float:right;">
			<div style="max-width:250px;margin-left:50px;">
			<?php echo($quote); ?>
			</div>
		</td>
	</tr>
	<tr>
		<td>
			Relationship Status
		</td>
		<td>
			<form action="setrelstat.php" method="post">
				<input type="radio" name="relstat" value="yes" onclick="document.getElementById('partnername').style.display=''" />In Relationship
				<div id="partnername" style="display:none;">
				<br />
				Name <input type="text" name="partner" />
				</div>
				<br />
				<input type="radio" name="relstat" value="no" onclick="document.getElementById('partnername').style.display='none'" />Single
				<br />
				<input type="submit" value="Change" style="border-radius:100px;border-style:none;padding:2px 6px;
						/* gradients */
						background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #FFFFFF), color-stop(15%, #EEEEEE), color-stop(100%, #888888));
						background: -moz-linear-gradient(top, #FFFFFF 0%, #EEEEEE 55%, �#888888 130%);
						" onmousedown="this.style.boxShadow='inset 0px 1px 3px black';this.style.background='-webkit-gradient(linear, left top, left bottom, color-stop(0%, #777777), color-stop(15%, #999999), color-stop(100%, #DDDDDD))';this.style.background='-moz-linear-gradient(top, #777777 0%, #999999 55%, �#DDDDDD 130%);'"
						onmouseout="this.style.boxShadow='none';this.style.background='-webkit-gradient(linear, left top, left bottom, color-stop(0%, #FFFFFF), color-stop(15%, #EEEEEE), color-stop(100%, #888888))';this.style.background='-moz-linear-gradient(top, #FFFFFF 0%, #EEEEEE 55%, �#888888 130%);'" />
			</form>
		</td>
		<td style="text-align:right;float:right;">
			<?php echo($relstat); ?>
		</td>
	</tr>
	<tr>
		<td>
			Add Photos
		</td>
		<td>
			<form action="imageupload.php" method="post" enctype="multipart/form-data">
				<input type="file" name="file" id="file" />
				<br />
				<input type="submit" value="Upload" style="border-radius:100px;border-style:none;padding:2px 6px;
						/* gradients */
						background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #FFFFFF), color-stop(15%, #EEEEEE), color-stop(100%, #888888));
						background: -moz-linear-gradient(top, #FFFFFF 0%, #EEEEEE 55%, �#888888 130%);
						" onmousedown="this.style.boxShadow='inset 0px 1px 3px black';this.style.background='-webkit-gradient(linear, left top, left bottom, color-stop(0%, #777777), color-stop(15%, #999999), color-stop(100%, #DDDDDD))';this.style.background='-moz-linear-gradient(top, #777777 0%, #999999 55%, �#DDDDDD 130%);'"
						onmouseout="this.style.boxShadow='none';this.style.background='-webkit-gradient(linear, left top, left bottom, color-stop(0%, #FFFFFF), color-stop(15%, #EEEEEE), color-stop(100%, #888888))';this.style.background='-moz-linear-gradient(top, #FFFFFF 0%, #EEEEEE 55%, �#888888 130%);'" />
			</form>
		</td>
		<td style="text-align:right;float:right;">
			
		</td>
	</tr>
	<tr>
		<td>
			<a style="color:black;" href="groupregistration.php">Register Group or Class</a>
		</td>
		<td>
			<input type="button" value="Register" onclick="window.location='groupregistration.php'" style="border-radius:100px;border-style:none;padding:2px 6px;
						/* gradients */
						background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #FFFFFF), color-stop(15%, #EEEEEE), color-stop(100%, #888888));
						background: -moz-linear-gradient(top, #FFFFFF 0%, #EEEEEE 55%, �#888888 130%);
						" onmousedown="this.style.boxShadow='inset 0px 1px 3px black';this.style.background='-webkit-gradient(linear, left top, left bottom, color-stop(0%, #777777), color-stop(15%, #999999), color-stop(100%, #DDDDDD))';this.style.background='-moz-linear-gradient(top, #777777 0%, #999999 55%, �#DDDDDD 130%);'"
						onmouseout="this.style.boxShadow='none';this.style.background='-webkit-gradient(linear, left top, left bottom, color-stop(0%, #FFFFFF), color-stop(15%, #EEEEEE), color-stop(100%, #888888))';this.style.background='-moz-linear-gradient(top, #FFFFFF 0%, #EEEEEE 55%, �#888888 130%);'" />
		</td>
	</tr>
		<td style="text-align:right;float:right;">
			
		</td>

<!--

	<tr>
		<td>
			
		</td>
		<td>
			<form action="" method="post">
				<input type="" name="" id="" />
				<br />
				<input type="submit" value="" style="border-radius:100px;border-style:none;padding:2px 6px;
						/* gradients */
						background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #FFFFFF), color-stop(15%, #EEEEEE), color-stop(100%, #888888));
						background: -moz-linear-gradient(top, #FFFFFF 0%, #EEEEEE 55%, �#888888 130%);
						" onmousedown="this.style.boxShadow='inset 0px 1px 3px black';this.style.background='-webkit-gradient(linear, left top, left bottom, color-stop(0%, #777777), color-stop(15%, #999999), color-stop(100%, #DDDDDD))';this.style.background='-moz-linear-gradient(top, #777777 0%, #999999 55%, �#DDDDDD 130%);'"
						onmouseout="this.style.boxShadow='none';this.style.background='-webkit-gradient(linear, left top, left bottom, color-stop(0%, #FFFFFF), color-stop(15%, #EEEEEE), color-stop(100%, #888888))';this.style.background='-moz-linear-gradient(top, #FFFFFF 0%, #EEEEEE 55%, �#888888 130%);'" />
			</form>
		</td>
	</tr>

-->

</table>

				</div>
				<br />
				<div>
					<?php
					
					?>
				</div>
			</center>
		</div>
	</body>
</html>