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

$fname = $_SESSION['fname'];
$lname = $_SESSION['lname'];
$name = $fname . ' ' . $lname;
 $to = $_GET['email'];
 $subject = "Social Network Invite";
$body = "<!DOCTYPE html>";
$body .= "<html>";
$body .= "<body style=\"background-image:url('http://radfordnetwork.com/iosfolderbackground.jpg');background-color:#333333;color:white;\">";
$body .= "<h1 style=\"background-color:#990000;width:100%;padding:10px;float:left;color:white;\"><a href=\"http://radfordnetwork.com\" style=\"text-decoration:none;color:white;\">Radford Network</a></h1>";
$body .= $name . " has invited you to join <a href=\"http://radfordnetwork.com\" style=\"color:white;\">radfordnetwork.com</a>, a new social network.";
$body .= "<br />";
$body .= "<br />";
$body .= "<a href=\"http://radfordnetwork.com/register.html\" style=\"color:white;\">Click here to join.</a>";
$body .= "</body>";
$body .= "</html>";

$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= "From: noreply@radfordnetwork.com\r\n"."X-Mailer: php";


 if (mail($to, $subject, $body, $headers)) {
   echo("<p>Message successfully sent!</p>");
  } else {
   echo("<p>Message delivery failed...</p>");
  }

?>
<html>
<head>
<title>News Feed</title>
<link rel="stylesheet" type="text/css" href="network.css" />
<script type="text/javascript">
function widthcalc() {
	window.setInterval(function(){
	var win = window.innerWidth;
	var news = win-200;
	var feed = document.getElementById('feed');
	feed.style.width=news;
	var winh = window.innerHeight;
	var newsh = winh-100;
	var feedh = document.getElementById('feed');
	feed.style.height=newsh;
	}, 20);
}
</script>
<script type="text/javascript">
window.setInterval(redirect, 1000);
function redirect() {
var div = document.getElementById('num');
var num = div.innerHTML;
var n = num-1;
div.innerHTML=n;
if (n<1) {
	window.location='newsfeed.php';
}
}
</script>
</head>
<body style="background-color:#333333;background-image:url('iosfolderbackground.jpg');background-repeat:repeat;">

<!--This is the header-->
<div class="head">
<a href="newsfeed.html"><h1 style="float:left;color:white;position:relative;top:-13px;display:inline;text-shadow:-1px -1px #550000;">Radford Network</h1></a>
</div>

<center>
<br />
<br />
<br />
<br />
<div class="cntnr">
<div class="contnr" style="
/* gradients */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #BB0000), color-stop(15%, #AA0000), color-stop(100%, #660000));
background: -moz-linear-gradient(top, #BB0000 0%, #AA0000 55%, �#660000 130%);">
<h4 class="ttl" style="position:relative;top:10px;">Thanks</h4>
</div>
<div class="contner">
<p>Your message has been sent<br />You will be redirected in <div style="display:inline;" id="num">5</div> seconds</p>
</div>
</div>
<br />
</center>
</body>
</html>











<div class="head" id="head" style="box-shadow:0px 0px 10px #440000;">
<h1 style="float:left;color:white;position:relative;top:-13px;display:inline;">RadfordNetwork</h1>
</div>