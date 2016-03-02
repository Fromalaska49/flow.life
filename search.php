<?php require "get-user-data.php"; ?>
<html>
	<head>
		<?php require "meta-etceteras.php"; ?>
		<?php require "post-box-script.php"; ?>
		<?php require "like-javascript.php"; ?>
		<?php require "friend-request-response-javascript.php"; ?>
		<?php require("post-media-box.php"); ?>
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
		height:100px;
		}
		</style>
	</head>
	<body style="padding:0px;margin:0px;overflow:hidden;" onload="layoutcalc();">
		<?php require "header-logged-in.php"; ?>
		<?php require "sidebar.php"; ?>
		<?php require "post-box.php"; ?>
		<!--This is the news feed-->
		<div class="feed" id="feed" style="overflow-x:hidden;">
			<center>
				<br />
				<br />
				<br />
				<div style="z-index:5;">

<div style="background-color:;padding:20px;">
<form action="search.php" method="get">
<br />
	<div>
		<input type="text" value="<?php echo($_GET["q"]); ?>" style="min-width:400px;width:600px;border-radius:5px 0px 0px 5px;margin-right:-3px;" onclick="this.value='';" class="searchinput" name="q" placeholder="Search Pages and Churches" />
		<input type="submit" value="Search" style="border-radius:0px 5px 5px 0px;margin-left:-3px;position:relative;top:-1px;" class="button" onmousedown="this.className='buttonactive'" onmouseout="this.className='button'" onmouseup="this.className='button'" />
	</div>
</form>
<?php
if(!isset($_GET['q'])||$_GET['q']==''){
	
}
else{
	$q = mysql_real_escape_string($_GET["q"]);
	$query = '%' . $q . '%';
	$sql = "SELECT * FROM rank WHERE name LIKE '$query' ORDER BY rank DESC";
	$result = mysql_query($sql);
	$num = mysql_num_rows($result);
	if ($num > 0){
		echo ('<ul>');
		while($row = mysql_fetch_array($result)) {
			$name = htmlentities($row['name']);
			$pageid = $row['pageid'];
			$ppimgurl = 'http://flow.life/images/upload/pages/s/'.$row['ppimgurl'];
			$type;
			if($row['church']==1){
				$type="Church";
			}
			else{
				$type="Page";
			}
			echo ('<li style="list-style-type:none;text-align:left;min-height:80px;"><a style="" href="page.php?id=' . $pageid . '"><img src="'.$ppimgurl.'" style="float:left;height:80px;width:80px;margin-right:10px;" /><p style="color:;" onmouseover="this.style.textDecoration=\'underline\';" onmouseout="this.style.textDecoration=\'none\';">' . $name . '</p><p style="color:black;">'.$type.'</p></a></li>');
		}
		echo ('</ul>');
	}
	else {
		echo('<li style="list-style-type:none;color:;"><b>No Results</b> for '.$_GET["q"].'</li>');
	}
}
?>
</div>
				</div>
			</center>
		</div>
	</body>
</html>

<!--

I am the lord your god.
You hear my voice.
Everything that your hand touches prospers.
You have wisdom beyond your years.
The Lord your God shall have justice.
The Lord your God shall have mercy.
Others live a lifetime without discerning wisdom as well as you. Read proverbs so that you may grow faster like fertilizer, not in the ground, but in a fire. Fertilizer is normally put into the ground but for you fertilizer is placed into the fire and it burns with an exceedingly great intesity.
Listen to my voice, for I am God.



-->