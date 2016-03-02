<?php
$connect = mysql_connect('localhost', 'root', 'bitnami');
if (!$connect){
	echo('cannot connect');
}
else if ($connect){
	//echo('connected');
}
else{
	echo ('Unknown error!');
}
mysql_select_db("socialnetwork");
if(!empty($_POST["email"])&&!empty($_POST["emailcheck"])&&!empty($_POST["fname"])&&!empty($_POST["lname"])&&!empty($_POST["sex"])&&!empty($_POST["password"])&&!empty($_POST["d"])&&!empty($_POST["m"])&&!empty($_POST["y"])){
	//echo('form filled<br />');
	$sanitizedemail = mysql_real_escape_string($_POST["email"]);
	$emailcheck = mysql_real_escape_string($_POST["emailcheck"]);
	if($sanitizedemail==$emailcheck){
		if(mysql_num_rows(mysql_query("SELECT * FROM users WHERE email='$sanitizedemail'"))==0){
			if($_POST["sex"]=='M'){
				$sex=1;
			}
			else{
				$sex=0;
			}
			$fname = $_POST["fname"];
			$lname = $_POST["lname"];
			$d = (int)$_POST["d"];
			$m = (int)$_POST["m"];
			$y = (int)$_POST["y"];
			$birthstamp = gmmktime(0,0,0,$m,$d,$y);
			$password = $_POST["password"];
			$cryptedpassword=mysql_real_escape_string(md5($password));
			$hash = $password;//password_hash($password, PASSWORD_BCRYPT, 10);
			//echo('post data collected<br />');
			$byear=$y;
			if ($byear==0) {
				$byear = $otherbyear;
			}
			if ($m == 1) {
			$bmonth = "January";
			}
			else if ($m == 2) {
			$bmonth = "February";
			}
			else if ($m == 3) {
			$bmonth = "March";
			}
			else if ($m == 4) {
			$bmonth = "April";
			}
			else if ($m == 5) {
			$bmonth = "May";
			}
			else if ($m == 6) {
			$bmonth = "June";
			}
			else if ($m == 7) {
			$bmonth = "July";
			}
			else if ($m == 8) {
			$bmonth = "August";
			}
			else if ($m == 9) {
			$bmonth = "September";
			}
			else if ($m == 10) {
			$bmonth = "October";
			}
			else if ($m == 11) {
			$bmonth = "November";
			}
			else if ($m == 12) {
			$bmonth = "December";
			}
			else {
			$bmonth = "";
			}
				//echo('sql precheck good<br />');
				$sqlcheck = "SELECT * FROM users WHERE email = '$sanitizedemail' AND password = '$cryptedpassword'";
				$result = mysql_query($sqlcheck);
				//echo('sql postcheck good<br />');
				if (mysql_num_rows($result) === 0) {
					$sql = "INSERT INTO `users` (`id`, `fname`, `lname`, `sex`, `password`, `email`, `birthstamp`, `ppimgurl`)
					VALUES ('','$fname','$lname','$sex','$cryptedpassword','$sanitizedemail','$birthstamp','default-pimg.jpg')";
					mysql_query($sql);
					sleep(0.1);
					$sqlgetuid = "SELECT * FROM users WHERE email = '$sanitizedemail' AND password = '$cryptedpassword'";
					$resultgetuid = mysql_query($sqlgetuid);
					$rowgetuid = mysql_fetch_array($resultgetuid);
					$uid = $rowgetuid["id"];
					mysql_query("INSERT INTO `altemails` (`uid`,`altemail`) VALUES ('$uid','$sanitizedemail')");
					$sqlpimg = "INSERT INTO `pimgurl`(`uid`, `url`)
					VALUES ('$uid', 'default-pimg.jpg')";
					mysql_query($sqlpimg);
					$sqlbimg = "INSERT INTO `backgroundimgurl`(`uid`, `url`)
					VALUES ('$uid', 'default-bimg.jpg')";
					mysql_query($sqlbimg);
					//echo('success');
					
					$time = (int)$_POST['t'];
					$churches="Find churches";
					$pages="Find pages";
					$friends="Find friends";
					session_start();
					$_SESSION['toff'] = $time*(0-60);
					$_SESSION['fname'] = $fname;
					$_SESSION['lname'] = $lname;
					$_SESSION['name'] = $fname . ' ' . $lname;
					$_SESSION['uid'] = $uid;
					$_SESSION['sex'] = $sex;
					$_SESSION['email'] = $_POST['email'];
					$_SESSION['ppimgurl'] = 'default-pimg.jpg';
					$_SESSION['churches'] = $churches;
					$_SESSION['pages'] = $pages;
					$_SESSION['friends'] = $friends;
					
					$nuevofriendos=mysql_query("SELECT * FROM `emailfriends` WHERE `femail`='$sanitizedemail'");
					while($newfriends=mysql_fetch_array($nuevofriendos)){
						(int)$fid=$newfriends['uid'];
						mysql_query("INSERT INTO `prefriends`(`senderid`, `recipientid`) VALUES ('$fid', '$uid')");
					}
					
					echo('true');
				}
				else if (mysql_num_rows($result) > 0) {
					echo ('It seems like you are already registered.');
			//		header("Location: login.html"); mk password reset
				}
				else {
					echo ('Unknown error!');
				}
			//$redirect = 'newusergreet.php';
			//header('Location: ' . $redirect);
		}
		else{
			//not a unique email
			echo('This email is already associated with an account. <a href="loginretry.php?email='.$_POST["email"].'">Click here</a> to reset the password.');
		}
	}
	else{
		//emails don't match (javascript disabled or form unfilled)
		echo('The emails you entered don\'t match.');
	}
}
else{
	//form unfilled (javascript disabled)
	echo('The form wasn\'t filled out entirely.');
}
?>