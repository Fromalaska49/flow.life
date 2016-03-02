<?php
$connect = mysql_connect('localhost', 'root', 'bitnami');
if (!$connect){
	echo('cannot connect<br />');
}
else if ($connect){
	echo('connected<br />');
}
else{
	echo ('error');
}
mysql_select_db("socialnetwork");
if(!empty($_POST["pagename"])){
	echo('form filled<br />');
	$name = mysql_real_escape_string($_POST["pagename"]);
	$church = mysql_real_escape_string($_POST["church"]);
	if(1>0||!empty($_POST["streetaddress"])&&!empty($_POST["state"])&&!empty($_POST["zipcode"])){
		$streetaddress = $_POST["streetaddress"];
		$city = mysql_real_escape_string($_POST["city"]);
		$state = mysql_real_escape_string($_POST["state"]);
		$zipcode = mysql_real_escape_string($_POST["zipcode"]);
		echo('post data collected<br />');
	}
	else{
		$city="";
		$streetaddress="";
		$state="";
		$zipcode="";
	}
	echo('sql precheck good<br />');
	$sqlcheck = "SELECT * FROM pages WHERE name = '$name'";
	$result = mysql_query($sqlcheck);
	echo('sql postcheck good<br />');
	if (mysql_num_rows($result) == 0) {
		$sql = "INSERT INTO `pages`(`id`, `name`, `church`, `address`, `city`, `state`, `zipcode`)
		VALUES ('','$name','$church','$streetaddress','$city','$state','$zipcode')";
		mysql_query($sql);
		$idsql="SELECT * FROM pages WHERE name = '$name'";
		$idresult=mysql_query($idsql);
		$idarray=mysql_fetch_array($idresult);
		$id=$idarray["id"];
		echo('success');
		$redirect = 'page.php?id=' . $id;
		header('Location: ' . $redirect);
	}
	else if (mysql_num_rows($result) > 0) {
		echo ('<script type="text/javascript">alert("A page has already been registered under this name");</script>');
//		header("Location: login.html"); mk password reset
	}
	else {
		echo ('<script type="text/javascript">alert("<p style=\"font-size:50px;color:white;\"><b>Uh-oh! Something is wrong!</b></p>");</script>');
	}
}
else{
	//form unfilled (javascript disabled)
	echo('form has blank fields');
}
?>
<html>
	<head>
		<script type="text/javascript">
		function f1() {
			window.location.assign('newusergreet.php');
		};
		function f2(){
			window.setTimeout(f1, 2700)
		};
		</script>
	</head>
	<body onload="" style="font-family:arial;background-color:black;">
	</body>
</html>