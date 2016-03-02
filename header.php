<?php
//$connect = mysql_connect('localhost', 'root', 'bitnami');
//if (!$connect){
//	echo('cannot connect\n');
//}
//mysql_select_db("socialnetwork");
session_start();
if (!isset($_SESSION['uid'])) {
header("Location: login.html");
}
$uid = $_SESSION['uid'];
$tzone = $_SESSION['tzone'];
$toff = $_SESSION['toff'];
$ppimgurl = $_SESSION['ppimgurl'];
$churches = $_SESSION['churches'];
$pages = $_SESSION['pages'];
$friends = $_SESSION['friends'];
date_default_timezone_set('UTC');
?>
?>
<!--This is the header-->
		<div class="head">
			<a href="newsfeed.php">
				<h1 style="float:left;color:white;position:relative;top:-13px;display:inline;">
					Christian Network
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
		<!--This is the header-->
		<div class="head" id="head" style="">
			<h1 style="float:left;color:white;position:relative;top:-13px;display:inline;">
				Christian Network
			</h1>
			<ul style="list-style-type:none;display:inline;position:relative;top:-5px;left:-15px;float:right;">
				<form action="login.php" method="post" onsubmit="return login()">
					<li class="opt">
						<input type="text" name="email" class="textinput" placeholder="Email" />
					</li>
					<li class="opt">
						<input type="password" name="password" class="textinput" placeholder="Password" />
					</li>
					<input type="text" style="display:none;" name="t" id="t" />
					<li class="opt">
						<input type="submit" value="Log in" style="border-radius:100px;border-style:solid;border-width:1px;border-color:black;height:30px;padding-x:5px;font-size:20px;text-shadow:0px 1px #CCCCCC;
						/* gradients */
						background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #FFFFFF), color-stop(15%, #EEEEEE), color-stop(100%, #888888));
						background: -moz-linear-gradient(top, #FFFFFF 0%, #EEEEEE 55%, �#888888 130%);
						" onmousedown="this.style.boxShadow='inset 0px 1px 3px black';this.style.background='-webkit-gradient(linear, left top, left bottom, color-stop(0%, #777777), color-stop(15%, #999999), color-stop(100%, #DDDDDD))';this.style.background='-moz-linear-gradient(top, #777777 0%, #999999 55%, �#DDDDDD 130%);'"
						onmouseout="this.style.boxShadow='none';this.style.background='-webkit-gradient(linear, left top, left bottom, color-stop(0%, #FFFFFF), color-stop(15%, #EEEEEE), color-stop(100%, #888888))';this.style.background='-moz-linear-gradient(top, #FFFFFF 0%, #EEEEEE 55%, �#888888 130%);'"/>
					</li>
				</form>
			</ul>
		</div>