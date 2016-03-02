<?php require "get-page-data.php"; ?>
<html>
	<head>
		<?php require "meta-etceteras.php"; ?>
		<?php require "post-box-script.php"; ?>
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
				<div style="z-index:5;">
					
				<div style="height:50px;" id="">
					<h3 style="display:block;float:left;margin:10px;">
						Settings
					</h3>
<br />
<br />
<br />
<center>
<div style="overflow:auto;width:800px;text-align:left;">
	<div style="overflow:auto;">
		<div style="font-size:20px;">
			Profile Picture
			<br />
			<br />
		</div>
		<div>
			<div style="float:left;">
				<form action="pimgupload.php" method="POST" enctype="multipart/form-data">
					<div style="position:relative;overflow:hidden;margin:0px;" class="button" onmousedown="this.className='buttonactive'" onmouseout="this.className='button'" onmouseup="this.className='button'">
						<span>Select Picture</span>
						<input type="file" style="position:absolute;top:0;right:0;margin:0;padding:0;font-size:20px;cursor:pointer;opacity:0;filter:alpha(opacity=0);" name="file" id="file" />
					</div>
					<br />
					<br />
					<textarea name="post" class="textinput" style="width:300px;height:50px;font-size:12px;" placeholder="Write about your upload"></textarea>
					<br />
					<br />
					<input type="submit" value="Upload" style="margin:0px;" class="button" onmousedown="this.className='buttonactive'" onmouseout="this.className='button'" onmouseup="this.className='button'" />
				</form>
			</div>
			<div style="float:right;">
				<?php echo('<img src="http://flow.life/images/upload/pages/s/' . $ppimgurl . '" style="height:80px;" />'); ?>
			</div>
		</div>
	</div>
	<hr />
	<br />
	More coming soon!
<!--
	<hr />
	<br />
	<div style="overflow:auto;">
		<div style="font-size:20px;">
			Add Emails
			<br />
			<br />
		</div>
		<div>
			<div style="float:left;">
				<form action="script-set-alt-email.php" method="POST">
					<input type="text" class="textinput" placeholder="Email" name="altemail" id="email" />
					<br />
					<br />
					<input type="submit" value="Add Email" style="margin:0px;" class="button" onmousedown="this.className='buttonactive'" onmouseout="this.className='button'" onmouseup="this.className='button'" />
				</form>
			</div>
			<div style="float:right;">
				<?php $result=mysql_query("SELECT * FROM `altemails` WHERE `uid`='$uid'");while($emails=mysql_fetch_array($result)){echo(htmlentities($emails['altemail']).'<br />');} ?>
			</div>
		</div>
	</div>
-->
</center>
				</div>
				<br />
				<div>
					<?php
					
					?>
				</div>
				</div>
			</center>
		</div>
	</body>
</html>