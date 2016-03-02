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


		<script type="text/javascript">
		function invite() {
			if (window.XMLHttpRequest) {
				xmlhttp=new XMLHttpRequest();
			}
			else {
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange=function() {
				//
			}
			var address = document.getElementById('email').value;
			t = "?email="+address;
			xmlhttp.open("GET","invitemail.php"+t,true);
			xmlhttp.send();
			alert('The invitation has been sent');
			document.getElementById('email').value='';
			document.getElementById('reminder').style.display='';
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
		<div class="feed" id="feed" style="overflow-x:hidden;position:relative;top:30px;text-shadow:0px 1px #EFEFEF;">
			<center>
				<br />
				<br />
				<br />
				<div style="height:50px;" id="">
					<h3 style="display:block;float:left;margin:10px;">
						Invite Friends
					</h3>
<br />
<br />

				</div>
				<div>
				To invite a friend to join, enter their email here
				<input type="text" name="email" id="email" style="display:inline;" />
				<input type="button" value="invite" onclick="invite()" />
				<div id="reminder" style="display:none;">Don't forget to bug them in person!</div>
				</div>
			</center>
		</div>
	</body>
</html>