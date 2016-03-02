<?php 
require "get-page-data.php";
$profiledpage=$_GET["id"];
$result = mysql_query("SELECT * FROM pages WHERE id = '$profiledpage'");
$row = mysql_fetch_array($result);
$email = $row["email"];
$name = $row["name"];
$ppimgurl = $row["ppimgurl"];
?>
<html>
	<head>
		<?php require "meta-etceteras.php"; ?>
		<?php require "post-box-script.php"; ?>
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
		.profileduserdata
		{
		margin-left:5px;
		overflow:scroll;
		}
		</style>
	</head>
	<body style="padding:0px;margin:0px;overflow:hidden;" onload="">
		<?php require "header-logged-in.php"; ?>
		<?php require "sidebar.php"; ?>
		<?php require "post-box.php"; ?>
		<?php require("post-media-box.php"); ?>
		<!--This is the news feed-->
		<div class="feed" id="feed" style="overflow-x:hidden;right:;">
			
				<br />
				<br />
				<br />
				<br />
				<div id="feedbody">
				<div style="height:50px;" id="">
					<h3 style="display:block;float:left;margin:10px;">
						Analytics
					</h3>
					<br />
					<br />
					<div id="userposts" style="">
					<?php
					$pageid=mysql_real_escape_string($_SESSION['pageid']);
					echo('Followers: '.mysql_num_rows(mysql_query("SELECT * FROM `pageposts` WHERE `pageid`='$pageid'")).'<br />');
					?>
					<br />
					More coming soon!
					</div>
				</div>
				<br />
			
		</div>
	</body>
</html>