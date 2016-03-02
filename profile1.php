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
$profileduser = $_GET['id'];

$sql = "SELECT * FROM users WHERE id = '$profileduser'";
$result = mysql_query($sql);
$row = mysql_fetch_array($result);
$email = $row["email"];
?>
<html>
	<head>
		<title>
			News Feed
		</title>
		<link rel="stylesheet" type="text/css" href="network.css" />
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
				var newsh = winh-88;
				feed.style.height=newsh;
var posts = document.getElementById('userposts');
var postw = win-350;
posts.style.width=postsf;
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
		function maildown() {
			var h = -200;
			var x;
			var x = window.setInterval(myf, 2);
			document.getElementById('userwrapper').style.display='none';
			document.getElementById('sendbutton').style.display='';
			document.getElementById('postbutton').style.display='none';
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
		function mailbutton() {
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
			t = "?t="+txt+"&id=<?php echo ($profileduser); ?>";
			address = "post.php?t="+txt;
			xmlhttp.open("GET","mail.php"+t,true);
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
function h1d() {
	var h = 0;
	var x;
	var x = window.setInterval(myf, 20);
	window.setTimeout(stopdown, 1000);
	function myf() {
		if (h<200) {
			var mydiv = document.getElementById("photolist");
			h = h+10;
			var height = h+"px";
			mydiv.style.height=height;
			}
			else {
				
			}
		}
		document.getElementById('photohide').style.display='';
		document.getElementById('photoshow').style.display='none';
		function upp() {
			var x = window.setInterval(myf, 20);
		}
		function stopdown() {
				window.clearInterval(x)
		}
	}
</script>
<script type="text/javascript">
function h2d() {
	var h = 200;
	var x;
	var x = window.setInterval(myf, 20);
	window.setTimeout(stopup, 1000);
	function myf() {
		if (h>0) {
			var mydiv = document.getElementById("photolist");
			h = h-10;
			var height = h+"px";
			mydiv.style.height=height;
		}
		else {
			
		}
	}
	document.getElementById('photoshow').style.display='';
	document.getElementById('photohide').style.display='none';
	function upp() {
		var x = window.setInterval(myf, 20);
	}
	function stopup() {
		window.clearInterval(x)
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
		function deltaf() {
			var uid = <?php echo($_SESSION["uid"]) ?>;
			var fid = <?php echo($profileduser) ?>;
			if (window.XMLHttpRequest) {
				xmlhttp=new XMLHttpRequest();
			}
			else {
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
	
			var val = document.getElementById('fbutton');
			var valu = document.getElementById('tvar1').innerHTML;
			var varvalu = document.getElementById('tvar1');
			//var valu="Friend";
			if (valu==0) {
				val.innerHTML='Waiting';
				varvalu.innerHTML='2';
			}
			else if (valu==1) {
				val.innerHTML='Add Friend';
				varvalu.innerHTML='0';
			}
			else if (valu==2) {
				val.innerHTML='Waiting';
				varvalu.innerHTML='2';
			}
			else if (valu==3) {
				val.innerHTML='Unfriend';
				varvalu.innerHTML='1 ';
			}
			else {
				val.innerHTML='error'+valu;
			}
			xmlhttp.onreadystatechange=function() {
				//
			}
			var param = "fid="+<?php echo($profileduser); ?>;
			xmlhttp.open("POST", "friend1.php", true);
			xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xmlhttp.setRequestHeader("Content-length", param.length);
			xmlhttp.setRequestHeader("Connection", "close");
			xmlhttp.send(param);
		}
		</script>

	</head>
	<body style="padding:0px;margin:0px;overflow:hidden;" onload="widthcalc()">

		<div id="tvar1" style="display:none;">
		<?php		
		$sql2a = "SELECT * FROM friends WHERE uid='$uid' AND fid='$profileduser'";
		$result2a = mysql_query($sql2a);
		$num = mysql_num_rows($result2a);

		if ($num==0) {
			$sql3a = "SELECT * FROM prefriends WHERE senderid='$uid' AND recipientid='$profileduser'";
			$result3a = mysql_query($sql3a);
			$num3a = mysql_num_rows($result3a);
			
			$sql3b = "SELECT * FROM prefriends WHERE senderid='$profileduser' AND recipientid='$uid'";
			$result3b = mysql_query($sql3b);
			$num3b = mysql_num_rows($result3b);
			
			if ($num3a>0) {
				echo ('2');
				$dfvalue = "Waiting";
			}
			else if ($num3b>0) {
				echo ('3');
				$dfvalue = "Accept";
			}
			else {
				echo ('0');
				$dfvalue = "Add Friend";		
			}
		}
		else if ($num==1) {
			echo ('1');
			$dfvalue = "Unfriend";
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
<form action="mail.php" method="get">
			<div style="z-index:6;background-color:#DDDDDD;width:90%;height:200px;box-shadow:0px 5px 20px black;border-style:solid;border-color:#990000;border-width:10px;position:absolute;top:-200px;left:50px;" id="textarea">
				<div style="width:100%;height:75%;box-shadow:inset 5px 5px 15px black;">
					<textarea style="width:100%;height:100%;resize:none;font-family:arial;padding:10px;" id="posttext" name="t"></textarea>
				</div>
<input type="text" style="display:none;" name="id" value="<?php echo($profileduser); ?>" />
<input type="text" style="display:none;" name="to" value="<?php echo($email); ?>" />
				<div style="height:25%;width:100%;background-color:;">
					<div class="postbutton" id="writebutton" onclick="writebutton()" onmousedown="this.className='postbuttonactive'" onmouseup="this.className='postbutton'" onmouseout="this.className='postbutton'">
						Write
					</div>
					<div class="postbutton" style="display:none;" id="postbutton" onclick="postbutton()" onmousedown="this.className='postbuttonactive'" onmouseup="this.className='postbutton'" onmouseout="this.className='postbutton'">
						Post
					</div>
					<div class="postbutton" style="display:none;" id="sendbutton" onclick="submit()" onmousedown="this.className='postbuttonactive'" onmouseup="this.className='postbutton'" onmouseout="this.className='postbutton'">
						Send
					</div>
					<div class="postbutton" onclick="hide()"  onmousedown="this.className='postbuttonactive'" onmouseup="this.className='postbutton'" onmouseout="this.className='postbutton'" style="">
						Cancel
					</div>
				</div>
			</div>
</form>
		</center>
		<!--This is the news feed-->
		<div class="feed" id="feed" style="overflow-x:hidden;">
			<center>
				<br />
				<div id="userwrapper" style="height:300px;background-color:#AAAAAA;width:98%;padding:25px;box-shadow:inset 0px 1px 15px #222222;border-style:solid;border-width:2px;border-top-color:#555555;border-bottom-color:#EEEEEE;overflow:hidden;background-image:url('noooooooowood.jpeg');background-repeat:repeat;background-size:;text-shadow:0px 1px #CDCDCD;position:relative;left:-5px;">
					<div id="left" style="width:64%;float:left;height:300px;background-color:;max-width:400px;">
						<h1 style="margin:0px;padding:2px;float:left;margin-left:15px;margin:10px;">
							<?php
							$sql = "SELECT * FROM users WHERE id = '$profileduser'";
							$result = mysql_query($sql);
							$row = mysql_fetch_array($result);
							$fname = htmlspecialchars($row["fname"]);
							$lname = htmlspecialchars($row["lname"]);
							echo ($fname . " " . $lname);
							?>
						</h1>
							<?php
							$sql = "SELECT * FROM users WHERE id = '$profileduser'";
							$result = mysql_query($sql);
							$row = mysql_fetch_array($result);
							$pimgurl = $row["picurl"];
							if (!$row["picurl"]) {
							$picurl = "ppdefault.jpg";
							}
							else {
							$picurl = $pimgurl;
							}
							echo ('<img src="' . $picurl .'" style="height:200px;max-width:400px;border-style:solid;border-color:white;border-width:10px;box-shadow:0px 2px 9px black;float:left;margin:5px;margin-left:20px;display:block;" />');
							?>
					</div>
					<div id="right" style="width:32%;height:300px;float:right;background-color:;padding-right:20px;">
						<h3 style="margin:2px;">
							<?php
							$sql = "SELECT * FROM users WHERE id = '$profileduser'";
							$result = mysql_query($sql);
							$row = mysql_fetch_array($result);
							$year = htmlspecialchars($row["year"]);
							if ($year == 1) {
								echo('Freshman');
							}
							else if ($year == 2) {
								echo('Sophomore');
							}
							else if ($year == 3) {
								echo('Junior');
							}
							else if ($year == 4) {
								echo('Senior');
							}
							else if ($year == 5) {
								echo('Teacher');
							}
							else {
								echo('error');
							}
							?>
						</h3>
						<p style="margin:2px;text-align:center;padding:5px;display:block;height:100px;overflow:hidden;">
							<?php
							$sql = "SELECT * FROM users WHERE id = '$profileduser'";
							$result = mysql_query($sql);
							$row = mysql_fetch_array($result);
							$quote = htmlspecialchars($row["quote"]);
							echo ('<i>' . $quote . '</i>');
							?>
						</p>
						<table>
							<tr>
								<td>
									<p style="float:right;" class="tdp">
										Relationship:
									</p>
								</td>
								<td>
									<p id="relstatus" style="float:left;" class="tdp">
										<?php
										$sql = "SELECT * FROM users WHERE id = '$profileduser'";
										$result = mysql_query($sql);
										$row = mysql_fetch_array($result);
										$relstat = htmlspecialchars($row["relstat"]);
										$relname = htmlspecialchars($row["relpartnername"]);
										if ($relstat==0){
											echo ("Single");
										}
										else if($relstat==1){
											echo ("with " . $relname);
										}
										else if ($relstat==2){
											echo ("Married");
										}
										else {
											echo ("error");
										}
										?>
									</p>
								</td>
							</tr>
							<tr>
								<td>
									<p style="float:right;" class="tdp">
										Birthday:
									</p>
								</td>
								<td>
									<p id="birthday" style="float:left;" class="tdp">
										<?php
										$sql = "SELECT * FROM users WHERE id = '$profileduser'";
										$result = mysql_query($sql);
										$row = mysql_fetch_array($result);
										$month = htmlspecialchars($row["bmonth"]);
										$day = htmlspecialchars($row["bday"]);
										echo ($month . " " . $day);
										?>
									</p>
								</td>
							</tr>
							<tr>
								<td>
									<p style="float:right;" class="tdp">
										Age:
									</p>
								</td>
								<td>
									<p class="tdp">
										<?php
										$sql = "SELECT * FROM users WHERE id = '$profileduser'";
										$result = mysql_query($sql);
										$row = mysql_fetch_array($result);
										$year = htmlspecialchars($row["byear"]);
										$month = htmlspecialchars($row["bmonthid"]);
										$day = htmlspecialchars($row["bday"]);
										$bdate = $day . "-" . $month . "-" . $year;
										
										$birthday = $bdate;
										$today = date('d-m-Y');
										
										$a_birthday = explode('-', $birthday);
										$a_today = explode('-', $today);
										
										$day_birthday = $a_birthday[0];
										$month_birthday = $a_birthday[1];
										$year_birthday = $a_birthday[2];
										$day_today = $a_today[0];
										$month_today = $a_today[1];
										$year_today = $a_today[2];
										
										$age = $year_today - $year_birthday;
										
										if (($month_today < $month_birthday) || ($month_today == $month_birthday && $day_today < $day_birthday))
										{
											$age--;
										}
										echo ($age);
										?>
									</p>
								</td>
							</tr>
							<tr style="text-shadow:0px -1px #770000;">
								<td>
									<p  class="infowrapperbutton" onclick="maildown()" onmousedown="this.className='infowrapperbuttonactive'" onmouseout="this.className='infowrapperbutton'" onmouseup="this.className='infowrapperbutton'">
										Mail
									</p>
								</td>
								<td>
									<div onclick="deltaf()" id="fbutton" class="infowrapperbutton" onmousedown="this.className='infowrapperbuttonactive'" onmouseout="this.className='infowrapperbutton'" onmouseup="this.className='infowrapperbutton'">
		<?php
echo($dfvalue);
		?>
									</div>
								</td>
							</tr>
						</table>
					</div>
				</div>
				<br />
				<div id="feedbody">
					<div id="userposts" style="float:left;">
					<?php
					$uid;
					$sql2a = "SELECT * FROM posts
					INNER JOIN users
					ON posts.fid=users.id
					WHERE fid = '$profileduser'
					ORDER BY time DESC";
					$result2a = mysql_query($sql2a);
					while($myrow = mysql_fetch_array($result2a)){
						$pid = htmlspecialchars($myrow["pid"]);
						$fid = htmlspecialchars($myrow["fid"]);
						$fname = htmlspecialchars($myrow["fname"]);
						$lname = htmlspecialchars($myrow["lname"]);
						$post = htmlspecialchars($myrow["post"]);
						//$t = $myrow["time"];
						$time = htmlspecialchars(date('Y-m-d', $time()));
//echo ('<!--');
//$t = getdate($time);
//echo ('-->');
//$weekday = $t['weekday'];
						$pimgurl = $myrow["picurl"];
						if (!$myrow["picurl"]) {
							$picurl = "ppdefault.jpg";
						}
						else {
							$picurl ="imgthumb/" . $pimgurl;
						}
						$sql = "SELECT * FROM likes WHERE id = '$fid' AND pid = '$pid'";
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
							$likable = "Error";
						}
						echo ('<div class="cntnr" style=""><div class="contnr" style=""><a href="profile.php?id=' . $fid . '"><img style="height:40px;float:left;" src="' . $picurl . '" /><h4 class="ttl" style=""><div class="pcheader" style="float:left;">' . $fname . ' ' . $lname . '</div><div class="pcheader" style="float:right;">' . $time . '</div></h4></a></div><div class="contner">' . $post . '<div style="text-align:right;"><div style="display:inline;padding:5px;"><a href="comments.php?id=' . $pid . '" style="color:black;">Comment</a></div><div style="display:inline;padding:5px;" onclick="like(' . $pid . ')" id="' . $pid . '">' . $likable . ' ' . $num . '</div></div></div>');
						$precsql = "SELECT * FROM comments
						INNER JOIN users
						ON comments.f2id=users.id
						WHERE pid = '$pid'";
						$precresult = mysql_query($precsql);
						$precnum = mysql_num_rows($precresult);
						$lim = $precnum-4;
						if ($lim<0) {
						$lim = 0;
						}
						$csql = "SELECT * FROM comments
						INNER JOIN users
						ON comments.f2id=users.id
						WHERE pid = '$pid'
						ORDER BY time ASC
						LIMIT $lim,4";
						$cresult = mysql_query($csql);
						while ($crow = mysql_fetch_array($cresult)) {
							$cuid = htmlspecialchars($crow["f2id"]);
							$cfname = htmlspecialchars($crow["fname"]);
							$clname = htmlspecialchars($crow["lname"]);
							$comment = htmlspecialchars($crow["comment"]);
							$ctime = htmlspecialchars($crow["day"]);
//$cd = date('Y-d-m H:i:s',strtotime($ctime));
//$ct = getdate(strtotime($cd));
//$cweekday = date('weekday', strtotime($ctime));//$ct['seconds'];
							$cpimgurl = $crow["picurl"];
							if (!$crow["picurl"]) {
							$cpicurl = "ppdefault.jpg";
							}
							else {
							$cpicurl = "imgthumb/" . $cpimgurl;
							}
							echo ('<div class="ccontnr"><a href="profile.php?id=' . $cuid . '"><img style="height:40px;float:left;" src="' . $cpicurl . '" /><h4 class="ttl" style=""><div class="pcheader" style="float:left;">' . $cfname . ' ' . $clname . '</div><div class="pcheader" style="float:right;"></div><div class="pcheader" style="float:right;">' . $ctime . '</div></h4></a></div><div class="ccontner">' . $comment . '</div>');
						}
						echo ('</div><br />');
					};
					?>
					</div>
					<!--sidebar-->
					<div id="sidebar" style="width:140px;height:125%;background-color:;float:right;overflow:hidden;text-shadow:0px 1px #EFEFEF;">
						<!--Friends-->
						<div id="friends" style="box-shadow:0px 5px 7px -7px black;">
							<h3>
								<a href="friends.php?id=<?php echo($profileduser); ?>" style="color:black;">
									Friends
								</a>
								<img src="show.png" onclick="h1a()" id="friendshow" style="width:21px;height:14px;position:relative;left:12px;" />
								<img src="hide.png" onclick="h2a()" id="friendhide" style="display:none;width:21px;height:14px;position:relative;left:12px;" />
							</h3>
							<ul style="list-style-type:none;height:0px;overflow:hidden;" id="friendlist">
								<?php
								$sql2a = "SELECT * FROM friends 
								INNER JOIN users
								ON friends.fid = users.id
								WHERE uid = '$profileduser'";
								$result2a = mysql_query($sql2a);
								while($rowa = mysql_fetch_array($result2a)){
									$name = htmlspecialchars($rowa["fname"]);
									$id = htmlspecialchars($rowa["id"]);
									echo ('<li><a href="profile.php?id=' . $id . '" style="color:black;">' . $name . '</a></li>');
								}
								if (mysql_num_rows($result2a)==0){
									echo('<li>none</li>');
								}
								?>
							</ul>
						</div>
						<!--Classes-->
						<div id="classes" style="box-shadow:0px 5px 7px -7px black;position:relative;top:-0px;">
							<h3>
								<a href="classes.php?id=<?php echo($profileduser); ?>" style="color:black;">
									Classes
								</a>
								<img src="show.png" onclick="h1b()" id="classshow" style="width:21px;height:14px;position:relative;left:12px;" />
								<img src="hide.png" onclick="h2b()" id="classhide" style="display:none;width:21px;height:14px;position:relative;left:12px;" />
							</h3>
							<ul style="list-style-type:none;height:0px;overflow:hidden;" id="classlist">
								<?php
								$sql2a = "SELECT * FROM classmembers 
								INNER JOIN classes
								ON classmembers.classid = classes.classid
								WHERE uid = '$profileduser'";
								$result2a = mysql_query($sql2a);
								while($rowa = mysql_fetch_array($result2a)){
									$name = htmlspecialchars($rowa["cname"]);
									$id = htmlspecialchars($rowa["classid"]);
									echo ('<a href="class.php?id=' . $id . '" style="color:black;"><li>' . $name . '</li></a>');
								}
								if (mysql_num_rows($result2a)==0){
									echo('<li>none</li>');
								}
								?>
							</ul>
						</div>
						<!--Groups-->
						<div id="groups" style="box-shadow:0px 5px 7px -7px black;position:relative;top:-0px;">
							<h3>
								<a href="groups.php?id=<?php echo($profileduser); ?>" style="color:black;">
									Groups
								</a>
								<img src="show.png" onclick="h1c()" id="groupshow" style="width:21px;height:14px;position:relative;left:12px;" />
								<img src="hide.png" onclick="h2c()" id="grouphide" style="display:none;width:21px;height:14px;position:relative;left:12px;" />
							</h3>
							<ul style="list-style-type:none;height:0px;overflow:hidden;" id="grouplist">
								<?php
								$sql2a = "SELECT * FROM groupmembers 
								INNER JOIN groups
								ON groupmembers.groupid = groups.groupid
								WHERE uid = '$profileduser'";
								$result2a = mysql_query($sql2a);
								while($rowa = mysql_fetch_array($result2a)){
									$name = htmlspecialchars($rowa["gname"]);
									$id = htmlspecialchars($rowa["groupid"]);
									echo ('<a href="class.php?id=' . $id . '" style="color:black;"><li>' . $name . '</li></a>');
								}
								if (mysql_num_rows($result2a)==0){
									echo('<li>none</li>');
								}
								?>
							</ul>
						</div>
						<!--Photos-->
						<div id="photos" style="box-shadow:0px 5px 7px -7px black;position:relative;top:-0px;">
							<h3 style="bottom-margin:10px;">
								<a href="photos.php?id=<?php echo($profileduser); ?>" style="color:black;">
									Photos
								</a>
								<img src="show.png" onclick="h1d()" id="photoshow" style="width:21px;height:14px;position:relative;left:12px;" />
								<img src="hide.png" onclick="h2d()" id="photohide" style="display:none;width:21px;height:14px;position:relative;left:12px;" />
							</h3>
							<div style="list-style-type:none;height:0px;overflow:hidden;" id="photolist">
								<?php
								$sql2a = "SELECT * FROM imgurls
								WHERE uid = '$profileduser'";
								$result2a = mysql_query($sql2a);
								while($rowa = mysql_fetch_array($result2a)){
									$url = $rowa["url"];
									$turl = "imgthumb/" . $url;
									echo ('<a href="' . $url . '"><img style="float:right;height:40px;margin:0px;" src="' . $turl . '" /></a>');
								}
								if (mysql_num_rows($result2a)==0){
									echo('<div>none</div>');
								}
								echo('<br />');
								?>
							</div>
						</div>
					</div>
				</div>
				<br />
			</center>
		</div>
	</body>
</html>