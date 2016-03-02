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

$uid = mysql_real_escape_string($_SESSION["uid"]);
$gtype = mysql_real_escape_string($_POST["gtype"]);
$gname = mysql_real_escape_string($_POST["gname"]);
$period = mysql_real_escape_string($_POST["period"]);
$gabout = mysql_real_escape_string($_POST["gabout"]);





$a = rand();
$b = rand();
$c = rand();

$x = $a*$b*$c;

$uid = $_SESSION['uid'];
$name = $_FILES["file"]["name"];

$allowedExts = array("jpg", "jpeg", "JPG", "JPEG", "Jpg", "Jpeg", "GIF", "PNG", "Gif", "Png", "gif", "png");
$extension = end(explode(".", $_FILES["file"]["name"]));
$location = "imageupload/" . $x . "." . $extension;//$name;

if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/png")
|| ($_FILES["file"]["type"] == "image/pjpeg"))
&& in_array($extension, $allowedExts)) {
		if ($_FILES["file"]["error"] > 0) {
			echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
		}
		else {
			echo "Upload: " . $_FILES["file"]["name"] . "<br>";
			echo "Type: " . $_FILES["file"]["type"] . "<br>";
			echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
			//echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";
			if (file_exists("imageupload/" . $_FILES["file"]["name"])) {
				echo $_FILES["file"]["name"] . " already exists. ";
			}
			else {
				move_uploaded_file($_FILES["file"]["tmp_name"],
				$location);//"imageupload/" . $_FILES["file"]["name"]);
			}
		}
	}
	else {
		echo "Invalid file";
	}





if (!empty($gtype) && !empty($gname)){
	if ($gtype == "group") {
		$sql = "INSERT INTO groups (tid, gname, about, picurl)
		VALUES ('$uid', '$gname', '$gabout', '$location')";
		$result = mysql_query($sql);
		$fsql = "SELECT * FROM groups WHERE tid='$uid' AND gname='$gname'";
		$fresult = mysql_query($fsql);
		$frow = mysql_fetch_array($fresult);
		$id = $frow["groupid"];
		$redirect = 'group.php?id=' . $id;
		header ('Location: ' . $redirect);
	}
	else if ($gtype == "class") {
		$sex = $_SESSION["sex"];
		if ($sex == "M") {
			$tsex = 1;
		}
		else {
			$tsex = 0;
		}
		$tfname = $_SESSION["fname"];
		$tlname = $_SESSION["lname"];
		$sql = "INSERT INTO classes (tid, tfname, tlname, tsex, cname, period, about, picurl)
		VALUES ('$uid', '$tfname', '$tlname', '$tsex', '$gname', '$period', '$gabout', '$location')";
		$result = mysql_query($sql);
		$fsql = "SELECT * FROM classes WHERE tid='$uid' AND period='$period'";
		$fresult = mysql_query($fsql);
		$frow = mysql_fetch_array($fresult);
		$id = $frow["classid"];
		$redirect = 'class.php?id=' . $id;
		header ('Location: ' . $redirect);
	}
	else {
		echo ('<script type="text/javascript">alert("<p style="font-size:50px;color:white;"><b>Error! Something is wrong!</b></p>");</script>');
	}
}
else{
	echo('<p style="font-size:50px;color:white;"><b>Please fill out the form</b></p>');
}

?>
<html>
	<head>
		<script type="text/javascript">
		function f1() {
			window.location.assign('settings.php');
		};
		function f2(){
			window.setTimeout(f1, 2700)
		};
		</script>
	</head>
	<body onload="f2()" style="font-family:arial;background-color:black;">
	</body>
</html>









