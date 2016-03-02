<?php
require("get-page-data.php");
?>
		<!--This is the friends box-->
		<div class="sidebar" style="-webkit-touch-callout: none;
-webkit-user-select: none;
-khtml-user-select: none;
-moz-user-select: none;
-ms-user-select: none;
user-select: none;">
			<a href="page.php?id=<?php echo($pageid) ?>">
				<h2 class="sidebarh2">
					<img src="http://flow.life/images/upload/pages/p/<?php echo($ppimgurl) ?>" class="sidebarimg" />
					Profile
				</h2>
			</a>
			<a href="settings.php">
				<h2 class="sidebarh2">
					<!--<img src="settings.png" class="sidebarimg" />-->
					Settings
				</h2>
			</a>
			<a href="analytics.php">
				<h2 class="sidebarh2">
					<!--<img src="analytics.png" class="sidebarimg" />-->
					Analytics
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