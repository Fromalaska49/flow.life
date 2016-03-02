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
if(!empty($_POST["email"])){
	echo('not empty<br />');
	$email = $_POST["email"];
	$sanitizedemail=mysql_real_escape_string($email);
	$sql = "SELECT * FROM users WHERE email='$sanitizedemail'";
	$result = mysql_query($sql);
	$num = mysql_num_rows($result);
	if($num=1){
		echo('result is greater than 1<br />');
		function rand_string( $length ) {
			$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789-_";	
		
			$size = strlen( $chars );
			for( $i = 0; $i < $length; $i++ ) {
				$str .= $chars[ rand( 0, $size - 1 ) ];
			}
			return $str;
		}
		$key = rand_string(512);
		echo("The key is " . $key . "<br />");//rand(1,10000)^(rand(1, 10000)/1000);
		$time=time();
		$sanitizedkey=mysql_real_escape_string($key);
		mysql_query("INSERT INTO `passwordreset` (`key`, `email`, `time`) VALUES ('$sanitizedkey', '$email', '$time')");
		$url='securepasswordreset.php?key='.$key;
		$to = $email;
		$subject = "Password Reset";
		$headers = "From: noreply@flow.life\\r\n";
		$headers .= "Reply-To: noreply@flow.life\r\n";
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
		$body = "<html><body style=\"font-family:arial;padding:15px;\">";
		$body .= "<div>";
		$body .= "To reset the password for your flow.life account, go to <a href=\"" . $url . "\">" . $url . "</a>";
		$body .= "</div>";
		$body .= "</body></html>";
		echo('done');
	}
	else{
		echo('empty');
	}
}
?>