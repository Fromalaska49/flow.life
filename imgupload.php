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
$name = $_SESSION['name'];
$filename = $_FILES["file"]["name"];
$x = $uid . "-" . time();

$allowedExts = array("jpg", "jpeg", "JPG", "JPEG", "Jpg", "Jpeg", "PNG", "Png", "png");
$extension = end(explode(".", $_FILES["file"]["name"]));
$location = "imageupload/" . $x . "." . $extension;//$name;

//($_FILES["file"]["type"] == "image/gif")||

if ((($_FILES["file"]["type"] == "image/jpeg")
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


$sql = "INSERT INTO `imgurls` (`uid`, `url`)
VALUES ('$uid', '$location')";
mysql_query($sql);


$picture = $location;//$_FILES['file']['name'];
echo("location set<br />");
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

$post = "<a href=\"profile.php?id=" . $uid . "\">" . $name . "</a> uploaded a picture.<br /><img style=\"max-width:100%;\" src=\"" . $location . "\" \>"

$day = date('l');

$time = time();

$sqlb = "INSERT INTO `posts` (`fid`, `post`, `day`, `time`)
VALUES ('$uid', '$post', '$day', '$time')";
mysql_query($sqlb);



echo("done");
header( 'Location: settings.php' ) ;
?>