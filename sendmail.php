<?php

$message = $_GET['message'];
$fname = $_SESSION['fname'];//$_GET['fname'];
$lname = $_SESSION['lname'];//$_GET['lname'];
$to = $_GET['to'];
$subject = "Radford Network Mail";
 $body = "This is a new message from " . $name . " via the Radford Network.\n\n" . $message . "\n\nYou can reply to them at " . $email;
 if (mail($to, $subject, $body)) {
   echo("<p>Message successfully sent!</p>");
  } else {
   echo("<p>Message delivery failed...</p>");
  }

$sql = "SELECT * FROM users
WHERE email='$to'";
$result = mysql_query($sql);
$row = mysql_fetch_array($result);
$id = $row["id"];
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
	window.location='profile.php?id=<?php echo($id); ?>';
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