<?php
//session_start();
if (!isset($_SESSION['uid'])) {
header("Location: login.html");
}
$uid = $_SESSION['uid'];
$ppimgurl = $_SESSION['ppimgurl'];
$churches = $_SESSION['churches'];
$pages = $_SESSION['pages'];
$friends = $_SESSION['friends'];
date_default_timezone_set('UTC');
?>
		<!--This is the friends box-->
		<div class="sidebar" style="-webkit-touch-callout: none;
-webkit-user-select: none;
-khtml-user-select: none;
-moz-user-select: none;
-ms-user-select: none;
user-select: none;">
			<a href="profile.php?id=<?php echo($uid); ?>">
				<h2 class="sidebarh2">
					<img src="images/upload/users/p/<?php echo($ppimgurl) ?>" class="sidebarimg" />
					Profile
				</h2>
			</a>
			<a href="newsfeed.php">
				<h2 class="sidebarh2">
					<!--<img src="news.png" class="sidebarimg" />-->
					News
				</h2>
			</a>
			<a href="pages.php?uid=<?php echo($uid); ?>&church=0">
				<h2 class="sidebarh2">
					<!--<img src="pages.png" class="sidebarimg" />-->
					<?php echo($pages); ?>
				</h2>
			</a>
			<a href="pages.php?uid=<?php echo($uid); ?>&church=1">
				<h2 class="sidebarh2">
					<!--<img src="chrches.png" class="sidebarimg" />-->
					<?php echo($churches); ?>
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
					<!--<img src="friends.png" class="sidebarimg" />-->
					<?php echo($friends); ?>
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
					<!--<img src="settings.png" class="sidebarimg" />-->
					Settings
				</h2>
			</a>
			<!--
			<a href="donate.php">
				<h2 class="sidebarh2">
					<img src="donate.png" class="sidebarimg" />
					Donate
				</h2>
			</a>
			-->
		</div>