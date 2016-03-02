<?php
$email = mysql_real_escape_string($_POST['email']);
$password = $_POST['password'];
$cryptedpassword = mysql_real_escape_string(md5($password));
$time = (int) $_POST['t'];
$connect = mysql_connect('localhost', 'root', 'bitnami');
if (!$connect){
	echo('cannot connect\n');
}
mysql_select_db("socialnetwork");
$sql = "SELECT * FROM users WHERE email='$email' AND password='$cryptedpassword'";
$result = mysql_query($sql);
$num = mysql_num_rows($result) ;
if ($num > 0) {
	$res = mysql_fetch_array($result);
	$uid = (int) $res["id"];
	$fname = $res["fname"];
	$lname = $res["lname"];
	$sex = $res["sex"];
	$ppimgurl = $res["ppimgurl"];
	
	$result=mysql_query("SELECT * FROM `pageusers` JOIN `pages` ON pageusers.pageid=pages.id WHERE `uid`='$uid' AND `church`='1'");
	if(mysql_num_rows($result)==0) {
		$churches="Find churches";
	}
	else{
		$churches="Churches";
	}
	$result=mysql_query("SELECT * FROM `pageusers` JOIN `pages` ON pageusers.pageid=pages.id WHERE `uid`='$uid' AND church='1'");
	if(mysql_num_rows($result)==0) {
		$pages="Find pages";
	}
	else{
		$pages="Pages";
	}
	$sql="SELECT * FROM friends WHERE uid='$uid'";
	$result=mysql_query($sql);
	if(mysql_num_rows($result)==0) {
		$friends="Find friends";
	}
	else{
		$friends="Friends";
	}
	
	session_start();
	$_SESSION['toff'] = $time*(0-60);
	$_SESSION['password'] = $password;
	$_SESSION['fname'] = $fname;
	$_SESSION['lname'] = $lname;
	$_SESSION['name'] = $fname . ' ' . $lname;
	$_SESSION['uid'] = $uid;
	$_SESSION['sex'] = $sex;
	$_SESSION['email'] = $email;
	$_SESSION['ppimgurl'] = $ppimgurl;
	$_SESSION['churches'] = $churches;
	$_SESSION['pages'] = $pages;
	$_SESSION['friends'] = $friends;
	
	header('Location: newsfeed.php');
}
else if($pageresult = mysql_query("SELECT * FROM pages WHERE email='$email' AND password='$cryptedpassword'")&&mysql_num_rows($pageresult)>0){
	$pagedata=mysql_fetch_array($pageresult);
	$pageid=$pagedata['id'];
	$church=$pagedata['church'];
	$pagename=$pagedata['name'];
	$pageemail=$pagedata['email'];
	$pagetel=$pagedata['tel'];
	$pageaddress=$pagedata['address'];
	$city=$pagedata['city'];
	$statecode=$pagedata['state'];
	$zipcode=$pagedata['zipcode'];
	$ppimgurl=$pagedata['ppimgurl'];
	if($statecode==1){
		$state="AL";
	}
	elseif($statecode==2){
		$state="AK";
	}
	elseif($statecode==3){
		$state="AZ";
	}
	elseif($statecode==4){
		$state="AR";
	}
	elseif($statecode==5){
		$state="CA";
	}
	elseif($statecode==6){
		$state="CO";
	}
	elseif($statecode==7){
		$state="CT";
	}
	elseif($statecode==8){
		$state="DL";
	}
	elseif($statecode==9){
		$state="FL";
	}
	elseif($statecode==10){
		$state="GA";
	}
	elseif($statecode==11){
		$state="HI";
	}
	elseif($statecode==12){
		$state="ID";
	}
	elseif($statecode==13){
		$state="IL";
	}
	elseif($statecode==14){
		$state="IN";
	}
	elseif($statecode==15){
		$state="IA";
	}
	elseif($statecode==16){
		$state="KS";
	}
	elseif($statecode==17){
		$state="KY";
	}
	elseif($statecode==18){
		$state="LA";
	}
	elseif($statecode==19){
		$state="ME";
	}
	elseif($statecode==20){
		$state="MD";
	}
	elseif($statecode==21){
		$state="MA";
	}
	elseif($statecode==22){
		$state="MI";
	}
	elseif($statecode==23){
		$state="MN";
	}
	elseif($statecode==24){
		$state="MS";
	}
	elseif($statecode==25){
		$state="MO";
	}
	elseif($statecode==26){
		$state="MT";
	}
	elseif($statecode==27){
		$state="NE";
	}
	elseif($statecode==28){
		$state="NV";
	}
	elseif($statecode==29){
		$state="NH";
	}
	elseif($statecode==30){
		$state="NJ";
	}
	elseif($statecode==31){
		$state="NM";
	}
	elseif($statecode==32){
		$state="NY";
	}
	elseif($statecode==33){
		$state="NC";
	}
	elseif($statecode==34){
		$state="ND";
	}
	elseif($statecode==35){
		$state="OH";
	}
	elseif($statecode==36){
		$state="OK";
	}
	elseif($statecode==37){
		$state="OR";
	}
	elseif($statecode==38){
		$state="PA";
	}
	elseif($statecode==39){
		$state="RI";
	}
	elseif($statecode==40){
		$state="SC";
	}
	elseif($statecode==41){
		$state="SD";
	}
	elseif($statecode==42){
		$state="TN";
	}
	elseif($statecode==43){
		$state="TX";
	}
	elseif($statecode==44){
		$state="UT";
	}
	elseif($statecode==45){
		$state="VT";
	}
	elseif($statecode==46){
		$state="VA";
	}
	elseif($statecode==47){
		$state="WA";
	}
	elseif($statecode==48){
		$state="WV";
	}
	elseif($statecode==49){
		$state="WI";
	}
	elseif($statecode==50){
		$state="WY";
	}
	else{
		$state="Error";
	}
	header('Location: page-profile.php');
}
else {
	header('Location: loginretry.php?email='.$_POST['email']);
}
?>