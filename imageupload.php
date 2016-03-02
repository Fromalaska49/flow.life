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

$a = rand();
$b = rand();
$c = rand();

$x = $a*$b*$c;


$uid = $_SESSION['uid'];
$name = $_FILES["file"]["name"];

$allowedExts = array("jpg", "jpeg", "JPG", "JPEG", "Jpg", "Jpeg", "GIF", "PNG", "Gif", "Png", "gif", "png");
$extension = end(explode(".", $_FILES["file"]["name"]));
$location = "imageupload/" . $x . "." . $extension;//$name;


header ( 'Location: photos.php' );


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


$sql = "INSERT INTO imgurls (uid, url)
VALUES ('$uid', '$location')";
mysql_query($sql);


$picture = $location;//$_FILES['file']['name'];

/*original file location*/                  
$file = $location;//'imageupload/'.$name;
move_uploaded_file($_FILES["file"]["tmp_name"], $picture);

/*save thumbnail location*/
$save = 'imgthumb/'.$picture;

// Magic Begins Here ......

require "WideImage.php";

$image = WideImage::load($file);
$thumb = $image->resizeDown(200, 40, 'inside');

$thumb->saveToFile($save);
$day = date('l');

$sqlre = "SELECT * FROM imgurls WHERE url='$location'";
$resultre = mysql_query($sqlre);
$rowre = mysql_fetch_array($resultre);
$imgid = $rowre["iid"];

$sqlpost = "INSERT INTO imgposts (fid, imgid, location, day)
VALUES ('$uid', '$imgid', '$location', '$day')";
$resultpost = mysql_query($sqlpost);
?>