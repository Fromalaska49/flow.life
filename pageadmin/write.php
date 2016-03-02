<?php

require "get-page-data.php";

$post = mysql_real_escape_string(rawurldecode($_POST["text"]));

$pageid = mysql_real_escape_string($_SESSION['pageid']);

$day = date('l');

$time = time();

$sql = "INSERT INTO `pageposts` (`pageid`, `annotation`, `post`, `media`, `day`, `time`)
VALUES ('$pageid', '0', '$post', '0', '$day', '$time')";
mysql_query($sql);

$pidarray = mysql_fetch_array(mysql_query("SELECT `pid` FROM `posts` WHERE `pageid`='$pageid' ORDER BY DESC LIMIT 1"));
$pid = $pidarray['pid'];
?>
<script type="text/javascript">
if (window.XMLHttpRequest) {
	xmlhttp=new XMLHttpRequest();
}
else {
	xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
}
var param = "pid="+<?php echo($pid) ?>;
xmlhttp.open("POST","script-broadcast-post.php",true);
xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xmlhttp.setRequestHeader("Content-length", param.length);
xmlhttp.setRequestHeader("Connection", "close");
xmlhttp.send(param);
</script>