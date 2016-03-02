<?php 
require("get-user-data.php");
$sanitizedchurch=mysql_real_escape_string($_GET["church"]);
?>
<html>
	<head>
		<?php require "meta-etceteras.php"; ?>
		<?php require "post-box-script.php"; ?>
		<?php require "like-javascript.php"; ?>
		<?php require "friend-request-response-javascript.php"; ?>
	</head>
	<body style="padding:0px;margin:0px;overflow:hidden;" onload="layoutcalc();">
		<?php require "header-logged-in.php"; ?>
		<?php require "sidebar.php"; ?>
		<?php require "post-box.php"; ?>
		<?php require("post-media-box.php"); ?>
		<!--This is the news feed-->
		<div class="feed" id="feed" style="overflow-x:hidden;">
			<center>
				<br />
				<br />
				<br />
				<br />
				<div style="height:50px;" id="">
					<h3 style="display:inline;float:left;margin:10px;">
						<?php 
if($_GET['church']==1){
	echo('Churches');
}
else{
	echo('Pages');
} ?>
					</h3>
				</div>
				<div>
					<div style="height:150px;float:left;display:inline;padding:10px;">
						<a href="search.php?q="><img src="find-box.png" style="float:left;border-color:white;border-style:solid;border-width:5px;margin:10px;box-shadow:0px 3px 14px -2px black;width:120px;height:120px;" /></a>
						<p style="text-shadow:0px 1px 0px white;">
							Find <?php 
if($_GET['church']==1){
	echo('Churches');
}
else{
	echo('Pages');
}
 ?>
						</p>
					</div>
					<?php
					$sql = "SELECT * FROM pageusers
					INNER JOIN pages
					ON pageusers.pageid=pages.id
					WHERE uid='$uid'AND church='$sanitizedchurch'
					ORDER BY name";
					$result = mysql_query($sql);
					while ($row = mysql_fetch_array($result)) {
						$picurl = $row["ppimgurl"];
						$name = $row["name"];
						$pageid = $row["pageid"];
						echo('<div style="height:150px;float:left;display:inline;padding:10px;" title="'.$name.'">');
						echo('<a href="page.php?id=' . $pageid . '"><img src="images/upload/pages/s/' . $picurl . '" style="float:left;border-color:white;border-style:solid;border-width:5px;margin:10px;box-shadow:0px 3px 14px -2px black;width:120px;height:120px;" /></a>');
						echo('<p style="text-shadow:0px 1px 0px white;">' . $name . '</p></div>');
					}
					?>
			</center>
		</div>
	</body>
</html>