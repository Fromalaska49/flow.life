<html>
	<head>
		<title>
			flow.life
		</title>
		<?php require("meta-etceteras.php"); ?>
		<style type="text/css">
			body{
			color:white;
			}
			input{
			color:black;
			}
			td{
			padding:0px 25px 10px 5px;
			}
		</style>
		<script type="text/javascript">
			function onload(){
				setInterval(emailcheck, 100);
			}
		</script>
		<script type="text/javascript">
		function poscalc() {
			window.setInterval(function(){
				var win = window.innerHeight;
				var d = win/2-100;
				var header = document.getElementById('');
				header.style.position='relative';
				header.style.top=d;
			}, 20);
		}
		</script>
		<script type="text/javascript">
			function emailcheck(){
				var email1 = document.getElementById('email1').value;
				var email2 = document.getElementById('email2').value;
				if(email2==""){
					document.getElementById('email2indicator').innerHTML='';
				}
				else{
					if (email1!==email2){
						document.getElementById('email2indicator').innerHTML='<img src="x_mark.png" style="width:25px;height:25px;padding:0px;margin:0px;position:relative;top:5px;" alt="not matched" /> Emails don\'t match :(';
					}
					else{
						document.getElementById('email2indicator').innerHTML='<img src="check_mark.png" style="width:25px;height:25px;padding:0px;margin:0px;position:relative;top:5px;" alt="checkmark" /> Emails match :)';
					}
				}
			}
		</script>
		<script type="text/javascript">
			function send(){
				var resetemail=document.forms["reset"]["resetemail"].value;
				if (resetemail==null || resetemail==""){
					alert("You must provide your email address");
					return false;
				}
				var atpos=resetemail.indexOf("@");
				var dotpos=resetemail.lastIndexOf(".");
				if (atpos<1 || dotpos<atpos+2 || dotpos+2>=resetemail.length){
					alert("You must provide a valid email address");
					return false;
				}
				else{
					//var t=document.getElementById('t');
					//var d= new Date();
					//var time=d.getTimezoneOffset();
					//t.value=time;
					if (window.XMLHttpRequest) {
						xmlhttp=new XMLHttpRequest();
					}
					else {
						xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
					}
					xmlhttp.onreadystatechange=function() {
						//
					}
					var param = "email="+resetemail;
					xmlhttp.open("POST","passwordresetemail.php",true);
		
					xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
					xmlhttp.setRequestHeader("Content-length", param.length);
					xmlhttp.setRequestHeader("Connection", "close");
					xmlhttp.send(param);
					
					document.getElementById('boxtitle').innerHTML='<br /><br />Link Sent';
					document.getElementById('boxannotation').innerHTML='A secure link to reset your password has been delivered to your email. You will be redirected in <div style="display:inline;" id="countdown">10</div>';
					document.getElementById('ic2').style.display='none';
					document.getElementById('ic3').style.display='none';
					
					window.setInterval(redirect, 1000);
					function redirect() {
						var x = Number(document.getElementById('countdown').innerHTML);
						if (x>1) {
							x = x-1;
							document.getElementById('countdown').innerHTML=x;
						}
						else {
							window.location='http://flow.life';
						}
							//true but must return false to stay on page
							return false
						}
					}
				}
		</script>
		<script type="text/javascript">
		function login(){
			var t=document.getElementById('t');
			var d= new Date();
			var time=d.getTimezoneOffset();
			t.value=time;
			return true;
		}
		</script>
		<!--
		<script type="text/javascript">
		function requestlink(){
			if (window.XMLHttpRequest) {
				xmlhttp=new XMLHttpRequest();
			}
			else {
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange=function() {
				//
			}
			var email=document.getElementByID('resetemail').value;
			var param = "email="+email;
			xmlhttp.open("POST","passwordresetemail.php",true);

			xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xmlhttp.setRequestHeader("Content-length", param.length);
			xmlhttp.setRequestHeader("Connection", "close");
			xmlhttp.send(param);
			
			//change page
			
			document.getElementByID('boxtitle').innerHTML='<br /><br />Link Sent';
			alert('1 down')
			document.getElementByID('boxannotation').innerHTML='A secure link to reset your password has been delivered to your email. You will be redirected in <div style="display:inline;" id="countdown">10</div>';
			document.getElementByID('ic2').style.display='none';
			document.getElementByID('ic3').style.display='none';
			
			function redirectini() {
				window.setInterval(redirect, 1000);
			}
			function redirect() {
				var x = Number(document.getElementById('countdown').innerHTML);
				if (x>1) {
					x = x-1;
					document.getElementById('countdown').innerHTML=x;
				}
				else {
					window.location='http://faithbook.com';
				}
			}
		</script>
		-->
	</head>
	<body style="padding:0px;margin:0px;background-color:#333333;" onload="onload();poscalc();">
		<?php require "header-logged-out.php" ?>
		<center>
			
			<form action="passwordresetemail.php" method="post" name="reset" onsubmit="return send()">
				
			<br />
					<div style="width:380px;height:400px;background-color:;position:absolute;top:0px;left:100px;" id="form">
						<h1 id="boxtitle">
							<br />
							<br />
							Reset Password
						</h1>
						<div class="inputcontainer">
							<div class="registertextinput" id="boxannotation" style="background-color:inherit;box-shadow:0px 0px #FFF;border-style:none;">
								If you need to reset your password, enter your email below.
							</div>
							<br />
						</div>
						<div class="inputcontainer" id="ic2">
							<input type="text" name="email" id="resetemail" class="registertextinput" placeholder="Your Email" value="<?php echo($_GET['email']); ?>" />
						</div>
						<div class="inputcontainer" id="ic3">
							<div style="height:40px;width:360px;padding:10px;font-size:20px;">
									<input type="button" value="Send" onclick="send()" style="float:right;height:30px;font-size:20px;padding:5px;position:relative;right:10px;border-radius:100px;border-style:none;padding:2px 6px;text-shadow:0px 1px #CCCCCC;
									/* gradients */
									background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #FFFFFF), color-stop(15%, #EEEEEE), color-stop(100%, #888888));
									background: -moz-linear-gradient(top, #FFFFFF 0%, #EEEEEE 55%, �#888888 130%);
									" onmousedown="this.style.boxShadow='inset 0px 1px 3px black';this.style.background='-webkit-gradient(linear, left top, left bottom, color-stop(0%, #777777), color-stop(15%, #999999), color-stop(100%, #DDDDDD))';this.style.background='-moz-linear-gradient(top, #777777 0%, #999999 55%, �#DDDDDD 130%);'"
									onmouseout="this.style.boxShadow='none';this.style.background='-webkit-gradient(linear, left top, left bottom, color-stop(0%, #FFFFFF), color-stop(15%, #EEEEEE), color-stop(100%, #888888))';this.style.background='-moz-linear-gradient(top, #FFFFFF 0%, #EEEEEE 55%, �#888888 130%);'" />
							</div>
						</div>
						<div class="inputcontainer" id="ic2">
							<div class="registertextinput" id="boxannotation" style="background-color:inherit;box-shadow:0px 0px #FFF;border-style:none;">
								<a href="index.php" style="color:inherit;" onmouseover="this.style.textDecoration='underline';" onmouseout="this.style.textDecoration='none';">Click here</a> to create a new account.
						</div>
						<input type="hidden" name="time" id="time" />
					</div>
				
			</form>
		</center>
	</body>
</html>