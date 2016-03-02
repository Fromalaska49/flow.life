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
$tzone = $_SESSION['tzone'];
$toff = $_SESSION['toff'];
$ppimgurl = $_SESSION['ppimgurl'];
date_default_timezone_set('UTC');
?>
<html>
	<head>
		<title>
			Network
		</title>
		<link rel="stylesheet" type="text/css" href="network.css" />
		<script type="text/javascript">
		function layoutcalc() {
			var offset = document.getElementById('cancelbutton').offsetWidth;
			var offset = offset+10;
			var offset = offset+"px";
			document.getElementById('writebutton').style.right=offset;
			window.setInterval(function(){
				var win = window.innerWidth;
				var news = win-200;
				var feed = document.getElementById('feed');
				feed.style.width=news;
				var postsw = news-160;
				var postsf = postsw+"px";
				var winh = window.innerHeight;
				var newsh = winh;
				feed.style.height=newsh;
			}, 100);
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
	var box = document.getElementById('textarea');
	var y = 0;
	var x = window.setInterval(sine, 30);
	function sine(){
		if (y<1){
			box.style.top = 350 * Math.sin(y) - 200 + 'px';
			y += 0.05;
		}
		else{
			window.setTimeout(stopWriteDownMotion, 0);
		}
	}
	function stopWriteDownMotion(){
		window.clearInterval(x)
	}
}
</script>
<script type="text/javascript">
function writeup() {
	var box = document.getElementById('textarea');
	var y = 1;
	var x = window.setInterval(sine, 30);
	function sine(){
		if (y>0){
			box.style.top = 450 * Math.sin(y) - 300 + 'px';
			y -= 0.05;
		}
		else{
			window.setTimeout(stopWriteUpMotion, 0);
		}
	}
	function stopWriteUpMotion(){
		window.clearInterval(x)
	}
}
</script>
		<script type="text/javascript">
		function erase() {
			document.getElementById('posttext').value='';
		}
		</script>
		<script type="text/javascript">
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
			window.setTimeout(writeup, 0);
			window.setTimeout(erase, 1200);
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
			y = "&id="+<?php echo($profiledclass) ?>;
			t = "?t="+txt;
			ty = t+y;
			xmlhttp.open("GET","classpost.php"+ty,true);
			xmlhttp.send();
			window.setTimeout(hide, 0);
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
			var source=document.getElementById(id).src.replace(/^.*[\\\/]/, '');
			var n=document.getElementById("like"+id);
			var num=Number(n.innerHTML);
			if(source=='thumbs-up-gray.png'){
				document.getElementById(id).src='thumbs-up-green.png';
				num=num+1;
				n.innerHTML=num;
			}
			else{
				document.getElementById(id).src='thumbs-up-gray.png';
				num=num-1;
				if(num>0){
					n.innerHTML=num;
				}
				else{
					n.innerHTML="";
				}
			}
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
	<body style="padding:0px;margin:0px;overflow:hidden;" onload="layoutcalc();">
		<!--This is the header-->
		<div class="head">
			<a href="newsfeed.php">
				<h1 style="float:left;color:white;position:relative;top:-13px;display:inline;">
					Network
				</h1>
			</a>
			<form action="search.php" method="get">
				<input type="text" class="searchinput" style="position:absolute;top:20px;right:160px;left:300px;" name="q" placeholder="Search" />
			</form>
			<ul style="list-style-type:none;display:inline;position:absolute;top:0px;right:15px;bottom:0px;">
				<li class="opt">
					<div class="button" style="margin-right:5px;margin-left:5px;" onmousedown="this.className='buttonactive'" onmouseup="this.className='button'" onmouseout="this.className='button'" onclick="this.className='button';writedown();" title="Write a post">
						Write
					</div>
				</li>
				<li class="opt">
					<a href="logout.php" style="margin-left:5px;" class="button" onmousedown="this.className='buttonactive'" onmouseup="this.className='button'" onmouseout="this.className='button'" onclick="this.className='button'">
						Log Out
					</a>
				</li>
			</ul>
		</div>
		<!--This is the friends box-->
		<div class="sidebar">
			<a href="profile.php?id=<?php echo($uid) ?>">
				<h2 class="sidebarh2">
					<img src="<?php echo($ppimgurl) ?>" class="sidebarimg" />
					Profile
				</h2>
			</a>
			<a href="newsfeed.php">
				<h2 class="sidebarh2">
					<img src="news.png" class="sidebarimg" />
					News
				</h2>
			</a>
			<a href="church.php?id=<?php echo($uid) ?>">
				<h2 class="sidebarh2">
					<img src="chrches.png" class="sidebarimg" />
					Churches
				</h2>
			</a>
			<a href="church.php?id=<?php echo($uid) ?>">
				<h2 class="sidebarh2">
					<img src="pages.png" class="sidebarimg" />
					Pages
				</h2>
			</a>
<!--
			<ul style="list-style-type:none;">
				<?php
				$uid;
				$sql2a = "SELECT * FROM pagefollowers 
				INNER JOIN pages
				ON pagefollowers.pageid = pages.pageid
				WHERE uid = '$uid'";
				$result2a = mysql_query($sql2a);
				if (mysql_num_rows($result2a)==0) {
				echo('<a href="search.php?q="><li style="padding:3px;">Follow Pages</li></a>');
				}
				while($rowa = mysql_fetch_array($result2a)){
					$name = htmlspecialchars($rowa["pagename"]);
					$pageid = htmlspecialchars($rowa["id"]);
					echo ('<a href="page.php?id=' . $pageid . '"><li class="fli">' . $name . '</li></a>');
				}
				?>
			</ul>
-->
			<a href="friends.php?uid=<?php echo($uid) ?>">
				<h2 class="sidebarh2">
					<img src="groups.png" class="sidebarimg" />
					Friends
				</h2>
			</a>
<!--
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
					echo ('<a href="profile.php?id=' . $id . '"><li class="fli">' . $name . '</li></a>');
				}
				?>
			</ul>
-->
			<a href="settings.php">
				<h2 class="sidebarh2">
					<img src="groups.png" class="sidebarimg" />
					Settings
				</h2>
			</a>
			<a href="donate.php">
				<h2 class="sidebarh2">
					<img src="groups.png" class="sidebarimg" />
					Donate
				</h2>
			</a>
		</div>
		<!--This is the posting box-->
		<center>
			<div style="z-index:6;background-color:#DDDDDD;width:;height:200px;box-shadow:0px 5px 20px black;border-style:solid;border-color:#007700;border-width:10px;position:absolute;top:-320px;left:220px;right:20px;" id="textarea">
				<div style="width:100%;height:200px;box-shadow:inset 5px 5px 15px black;">
					<textarea style="width:100%;height:100%;resize:none;font-family:arial;padding:10px;font-size:16px;" id="posttext"></textarea>
				</div>
				<div style="height:0px;width:100%;background-color:;">
					<div class="button" style="position:absolute;bottom:10px;right:70px;" id="writebutton" onclick="writebutton()" onmousedown="this.className='buttonactive'" onmouseup="this.className='button'" onmouseout="this.className='button'">
						Post
					</div>
					<div id="cancelbutton" class="button" style="position:absolute;bottom:10px;right:0px;" onclick="writeup()"  onmousedown="this.className='buttonactive'" onmouseup="this.className='button'" onmouseout="this.className='button'">
						Cancel
					</div>
				</div>
			</div>
		</center>
		<!--This is the news feed-->
		<div class="feed" id="feed" style="overflow-x:hidden;">
			<center>
				<br />
				<br />
				<br />
				<br />
				<div style="z-index:5;">
					
				</div>
			</center>
		</div>
	</body>
</html>