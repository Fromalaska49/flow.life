<?php
$time = (int) $_POST['t'];
$connect = mysql_connect('localhost', 'root', 'bitnami');
if (!$connect){
	echo('cannot connect\n');
}
mysql_select_db("socialnetwork");
$email = mysql_real_escape_string($_POST['email']);
$password = mysql_real_escape_string($_POST['password']);
$pageresult = mysql_query("SELECT * FROM pages WHERE email='$email' AND password='$password'");
if(mysql_num_rows($pageresult)>0){
	$pagedata=mysql_fetch_array($pageresult);
	$pageid=$pagedata['id'];
	$church=$pagedata['church'];
	$name=$pagedata['name'];
	$email=$pagedata['email'];
	$tel=$pagedata['tel'];
	$address=$pagedata['address'];
	$city=$pagedata['city'];
	$statecode=$pagedata['state'];
	$zipcode=$pagedata['zipcode'];
	$ppimgurl=$pagedata['ppimgurl'];
	if($statecode<26){
		if($statecode<13){
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
			else{
				$state="Error";
			}
		}
		else{
			if($statecode==13){
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
		}
	}
	else{
		if($statecode<38){
			if($statecode==26){
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
		}
		else{
			if($statecode==38){
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
		}
	}
	session_start();
	$_SESSION['toff'] = $time*(0-60);
	$_SESSION['pageid'] = $pageid;
	$_SESSION['name'] = $name;
	$_SESSION['church'] = $church;
	$_SESSION['email'] = $email;
	$_SESSION['tel'] = $tel;
	$_SESSION['address'] = $address;
	$_SESSION['city'] = $city;
	$_SESSION['statecode'] = $statecode;
	$_SESSION['state'] = $state;
	$_SESSION['zipcode'] = $zipcode;
	$_SESSION['ppimgurl'] = $ppimgurl;
	header('Location: page-profile.php');
}
else {
	header('Location: loginretry.php');
}
?>