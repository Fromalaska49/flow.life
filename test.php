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
		$email="barak_obama@whitehouse.gov";
		function rand_string( $length ) {
			$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";	
		
			$size = strlen( $chars );
			for( $i = 0; $i < $length; $i++ ) {
				$str .= $chars[ rand( 0, $size - 1 ) ];
			}
		
			return $str;
		}
		$key = rand_string(5);
		echo("The key is " . $key . "<br />");//rand(1,10000)^(rand(1, 10000)/1000);
		$time=17;
		$sqlinsert = "INSERT INTO passwordresettime (key, email, time)
		VALUES ('$key', '$email', '$time')";
		$sql="INSERT INTO passwordresettime (key, email, time) VALUES ('$key', '$email', '$time')";
		if(mysql_query($sql)){
			echo('SQL enacted on db<br />');
		}
		else{
			echo('could not access db<br />');
			mysql_query($sql);
			echo(mysql_error() . "<br />");
			echo('executed<br />');
		}
?>