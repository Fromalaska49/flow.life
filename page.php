<?php
require "get-user-data.php";
$profiledpage=(int) $_GET["id"];
$sql = "SELECT * FROM `pages` WHERE `id`='$profiledpage'";
$result = mysql_query($sql);
$row = mysql_fetch_array($result);
$email = $row["email"];
$name = $row["name"];
$church = $row["church"];
$phone = $row["tel"];
$address = $row["address"];
$zipcode = $row["zipcode"];
$city = $row["city"];
$state = $row["state"];
$ppimgurl = $row["ppimgurl"];
?>
<html>
	<head>
		<?php require "meta-etceteras.php"; ?>
		<?php require "post-box-script.php"; ?>
		<?php require "javascript-page-post-like.php"; ?>
		<style type="text/css">
		td
		{
		padding:5px;
		}
		.tdp
		{
		display:inline;
		margin:0px;
		padding:0px;
		}
		.p{background-color:green;}
		html, body
		{
		padding:0px;
		margin:0px;
		border-style:none;
		}
		.profileduserdata
		{
		margin-left:5px;
		overflow:scroll;
		}
		</style>
		<?php //require "friend-request-response-javascript.php"; ?>
		<script type="text/javascript">
			function dpagefollowstatus(){
				var dfbutton=document.getElementById('dfbutton').innerHTML;
				if(dfbutton=="Follow"){
					document.getElementById('dfbutton').innerHTML='Unfollow';
				}
				else if(dfbutton=="Unfollow"){
					document.getElementById('dfbutton').innerHTML='Follow';
				}
				else{
					document.getElementById('dfbutton').innerHTML='Error';
				}
				if (window.XMLHttpRequest) {
					xmlhttp=new XMLHttpRequest();
				}
				else {
					xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
				}
				xmlhttp.onreadystatechange=function() {
					//
				}
				var param = "pageid="+<?php echo($profiledpage); ?>;
				xmlhttp.open("POST","script-dpagefollow.php",true);
				xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				xmlhttp.setRequestHeader("Content-length", param.length);
				xmlhttp.setRequestHeader("Connection", "close");
				xmlhttp.send(param);
			}
		</script>
	</head>
	<body style="padding:0px;margin:0px;overflow:hidden;" onload="">
		<?php require "header-logged-in.php"; ?>
		<?php require "sidebar.php"; ?>
		<?php require "post-box.php"; ?>
		<?php require("post-media-box.php"); ?>
		<!--This is the news feed-->
		<div class="feed" id="feed" style="overflow-x:hidden;right:250px;">
			<center>
				<br />
				<br />
				<br />
				<br />
				<div id="feedbody">
					<div id="userposts" style="">
					<?php
					//$sql2a = "SELECT * FROM pageposts WHERE pageid = '$profiledpage' ORDER BY time DESC LIMIT 30";
					$result2a = mysql_query("SELECT * FROM pageposts WHERE pageid = '$profiledpage' ORDER BY time DESC LIMIT 30");
					while($myrow = mysql_fetch_array($result2a)){
						$pageid = $myrow["pageid"];
						$pid = $myrow["pid"];
						if(($myrow["annotation"]!==0) && ($myrow["annotation"]!=='') && ($myrow["annotation"]!=='0')){
							$annotation = $myrow["annotation"];
						}
						else{
							$annotation='';
						}
						if(($myrow["post"]!==0) && ($myrow["post"]!=='') && ($myrow["post"]!=='0')){
							$post = htmlentities($myrow["post"]);
							if(strlen($post)>500){
								$post=substr($post,0,350).'<div style="display:inline;color:rgb(0,119,0);cursor:pointer;" onmouseover="this.style.textDecoration=\'underline\';" onmouseout="this.style.textDecoration=\'none\'" onclick="this.innerHTML=\''.substr($post,350).'\';this.style.color=\'inherit\';this.style.cusor=\'inherit\';this.onmouseover=\'\';this.style.textDecoration=\'none\'">...show more</div>';
							}
						}
						else{
							$post='';
						}
						if(($myrow["media"]!==0) && ($myrow["media"]!=='') && ($myrow["media"]!=='0')){
							$media = '<br /><a href="http://flow.life/images/upload/pages/l/'.$myrow["media"].'"><img style="max-width:300px;" src="http://flow.life/images/upload/pages/m/'.$myrow["media"].'" /></a>';
						}
						else{
							$media='';
						}
						$deltatime=time()-$myrow["time"];
						if($deltatime<604800){
							if($deltatime<172800){
								if($deltatime<86400){
								
								}
							}
							else{
							
							}
						}
						$date = $myrow["time"];
						$t = $date+$toff;
						$week=time()-604800;
						if($date>$week){
							$time = date("D", $t) . " at " . date("g:i a", $t);
						}
						else{
							$time = date("M jS", $t);
						}
						
//echo ('<!--');
//$t = getdate($time);
//echo ('-->');
//$weekday = date('w', $time);
						$usql = "SELECT * FROM pages
						WHERE id='$profiledpage'";
						$uresult = mysql_query($usql);
						$uinfo = mysql_fetch_array($uresult);
						$name = $uinfo["name"];
						$pimgurl = "images/upload/pages/p/" . $uinfo["ppimgurl"];
						if (!$uinfo["ppimgurl"]) {
							$pimgurl = "default-pimg.jpg";
						}
							$liked = mysql_num_rows(mysql_query("SELECT * FROM pagepostl WHERE uid='$uid' AND pid ='$pid'"));
							$n = mysql_num_rows(mysql_query("SELECT * FROM pagepostl WHERE pid = '$pid'"));
						if($n>0){
							if($n>999){
								if($n>999999){
									$n/1000000;
									$printnumber=round($n,1) . "M";
								}
								else{
									$n/1000;
									$printnumber=round($n,1) . "k";
								}
							}
							else{
								$printnumber=$n;
							}
						}
						else{
							$printnumber="";
						}
						if ($liked==0) {
							$thumbcolor = "gray";
$num = "";
						}
						else if ($liked==1) {
							$thumbcolor = "green";
						}
						else {
							
						}
						echo ('<div class="container"><div class="containerhead" style=""><a href="page.php?id=' . $pageid . '"><img style="height:40px;float:left;" src="' . $pimgurl . '" /></a><h4 class="ttl" style=""><a href="page.php?id=' . $pageid . '"><div class="pcheader">' . $name . '</div></a><div class="pcheader" style="float:right;">' . '</div></h4></div><div class="ptextcontainer">' . $annotation . $post . $media . '</div><div class="containerfoot"><div style="display:inline;padding:5px;float:left;color:#AAAAAA;font-size:15px;padding:0px;margin:2px;">' . $time . '</div><div style="display:inline;padding:5px;color:#AAAAAA;font-size:20px;padding:0px;margin:2px;" id="pagepostlike' . $pid . '">' . $printnumber . '</div><div style="display:inline;padding:5px;" onclick="pagepostlike(' . $pid . ')" title="Thumbs-Up"><img class="thumbsup" src="thumbs-up-' . $thumbcolor . '.png" id="' . $pid . '" />' . '</div><div style="display:inline;padding:5px;"><a href="page-post.php?id=' . $pid . '" title="Comment"><img style="width:20px;height:20px;" src="comment.png" /></a></div></div>');
						$precnum = mysql_num_rows(mysql_query("SELECT * FROM `pagepostc` INNER JOIN `users` ON pagepostc.f2id=users.id WHERE `pid`='$pid'"));
						$lim = $precnum-4;
						if ($lim<0){
						$lim=0;
						}
						$cresult = mysql_query("SELECT * FROM `pagepostc` INNER JOIN `users` ON pagepostc.f2id=users.id WHERE `pid`='$pid' ORDER BY `time` ASC LIMIT $lim, 4");
						while ($crow = mysql_fetch_array($cresult)) {
							$cfid = $crow["f2id"];
							$cfname = $crow["fname"];
							$clname = $crow["lname"];
							$comment = $crow["comment"];
							$cpimgurl = "images/upload/users/p/" . $crow["ppimgurl"];
							if (! $crow["ppimgurl"]) {
								$cpimgurl = "ppdefault.jpg";
							}
							$cdate = $crow["time"];
							$ct = $cdate+$toff;
							$cweek=time()-604800;
							if($cdate>$cweek){
								$ctime = date("D", $ct) . " at " . date("g:i a", $ct);
							}
							else{
								$ctime = date("M jS", $ct);
							}
//echo ('<!--');
//$ct = getdate($ctime);
//echo ('-->');
//$cweekday = $ct['weekday'];
							echo ('<a href="profile.php?id=' . $cfid . '"><div class="commenthead"><img style="height:40px;float:left;" src="' . $cpimgurl . '" /><h4 class="ttl" style=""><div class="pcheader" style="float:left;">' . $cfname . ' ' . $clname . '</div><div class="pcheader" style="float:right;"></div><div class="pcheader" style="float:right;">' . $ctime . '</div></h4></div></a><div class="ctextcontainer">' . $comment . '</div>');
						}
						echo ('</div><br />');
					}
					$postquantity=mysql_num_rows(mysql_query("SELECT * FROM pageposts WHERE pageid = '$profiledpage' LIMIT 31"));
					if($postquantity>30){
						echo("<p style=\"color:#888888;\">Older posts cannot be displayed.</p>");
					}
					else if($postquantity!=0){
						echo("<p style=\"color:#888888;\">That's all folks!</p><br />");
					}
					else{
						echo("<p style=\"color:#888888;\">No posts yet.</p><br />");
					}
								?>
								<br />
							</div>
						</div>
					</div>
				</div>
				<br />
			</center>
		</div>
		<!--This is the profile section-->
		<div style="position:fixed;top:70px; bottom:0px;left:;width:250px;right:0px;background-color:#555555;color:white;box-shadow:inset 0px 1px 10px -1px #333333;-webkit-touch-callout: none;
-webkit-user-select: none;
-khtml-user-select: none;
-moz-user-select: none;
-ms-user-select: none;
user-select: none;">
		<div id="friendvar" style="display:none;">
		</div>
		
		<?php
		if($uid==$profiledpage){
			$dfvalue = "Edit";
			$clickevent = "window.location='settings.php'";
		}
		else{
			$sql = "SELECT * FROM pageusers WHERE uid='$uid' AND pageid='$profiledpage'";
			$result = mysql_query($sql);
			$num = mysql_num_rows($result);
	
			if ($num==0) {
				$dfvalue = "Follow";
			}
			else if ($num==1) {
				$dfvalue = "Unfollow";
			}
			else {
				$dfvalue = "Error";
			}
			$clickevent = "dpagefollowstatus()";
		}
		
		$sql = "SELECT * FROM pages WHERE id = '$profiledpage'";
		$result = mysql_query($sql);
		$row = mysql_fetch_array($result);
		$name = $row["name"];
		$pimgurl = $row["ppimgurl"];
		$email = $row["email"];
		if(isset($row["tel"])&&$row["tel"]!=null&&$row["tel"]!=0){
			$teldigits = $row["tel"];
			$tel="(".substr($teldigits,0,3).")-".substr($teldigits,4,3)."-".substr($teldigits,6,4);
		}
		else{
			$tel="";
		}
		//$birthday = date("F jS",$birthstamp);
		if(isset($row["address"])&&$row["address"]!=""&&$row["address"]!=null&&$row["address"]!=0&&$row["address"]!='0'){
			$streetaddress=$row["address"];
			$city=$row["city"];
			$statecode=$row["state"];
			$zipcode=$row["zipcode"];
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
			$address = "<p class=\"profileduserdata\">".$streetaddress."<br />".$city.", ".$state." ".$zipcode."</p>";
		}
		else{
			$address="";
		}
		
		echo ("<a href=\"images/upload/pages/l/".$pimgurl."\"><img src=\"images/upload/pages/m/".$pimgurl."\" style=\"width:250px;\" /></a><br /><center><h3>".$name."</h3></center><div id=\"dfbutton\" class=\"button\" style=\"position:absolute;top:210px;left:0px;\"  onmousedown=\"this.className='buttonactive'\" onmouseup=\"this.className='button'\" onmouseout=\"this.className='button'\" onclick=\"this.className='button';dpagefollowstatus();\">".$dfvalue."</div><p class=\"profileduserdata\">" . $email . "</p><p class=\"profileduserdata\">" . $tel . "</p>".$address);
		?>
		</div>
	</body>
</html>

<?php
/*
$sql="SELECT * FROM pages WHERE id='$pageid'";
$result=mysql_query($sql);
$row=mysql_fetch_array($result);
$pagename=$row["name"];
if(isset($row["address"])){
	$streetaddress=$row["address"];
	$city=$row["city"];
	$statecode=$row["state"];
	$zipcode=$row["zipcode"];
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
}
else{
	$noaddress=1;
}
*/