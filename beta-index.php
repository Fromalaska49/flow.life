<html>
	<head>
		<title>
			Free Zoe
		</title>
		<meta name="keywords" content="" />
		<meta name="description" content="" />
		<link rel="stylesheet" type="text/css" href="network.css" />
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
			.inputcontainer
			{
			width:600px;
			padding:10px;
			margin:0px;
			background-color:;
			display:block;
			text-align:left;
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
				var fname=document.forms["signup"]["fname"].value;
				if (fname==null || fname==""){
					alert("You must type your first name");
					return false;
				}
				var lname=document.forms["signup"]["lname"].value;
				if (lname==null || lname==""){
					alert("You must type your last name");
					return false;
				}
				var email1=document.forms["signup"]["email1"].value;
				if (email1==null || email1==""){
					alert("You must provide your email address");
					return false;
				}
				var atpos=email1.indexOf("@");
				var dotpos=email1.lastIndexOf(".");
				if (atpos<1 || dotpos<atpos+2 || dotpos+2>=email1.length){
					alert("You must provide a valid email address");
					return false;
				}
				var email2 = document.getElementById('email2').value;
				if (email1!==email2){
					alert("The two emails must match");
				}
				var password=document.forms["signup"]["password"].value;
				if (password==null || password==""){
					alert("You must have a password");
					return false;
				}
				var m=document.forms["signup"]["m"].value;
				if (m==null || m==""){
					alert("You must select your birth month");
					return false;
				}
				var d=document.forms["signup"]["d"].value;
				if (d==null || d==""){
					alert("You must select your birth day");
					return false;
				}
				var y=document.forms["signup"]["y"].value;
				if (y==null || y==""){
					alert("You must select your birth year");
					return false;
				}
				var sex=document.getElementsByName("sex"); 
				if(sex[0].checked||sex[1].checked){
					var t=document.getElementById('time');
					var d= new Date();
					var time=d.getTimezoneOffset();
					t.value=time;
					return true;
				}
				else{
					alert("You must select whether you are male or female");
					return false;
				}
				//return true;
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
	</head>
	<body style="padding:0px;margin:0px;background-color:#333333;" onload="onload();poscalc();">
		<?php require "header-logged-out.php" ?>
		<center>
						<form action="script-register.php" method="post" name="signup" onsubmit="return send()">
			<br />
					<div style="width:380px;height:400px;background-color:;position:absolute;top:0px;left:100px;" id="form">
						<h1>
							<br />
							<br />
							Under Development...
						</h1>
						<div class="inputcontainer" style="width:350px;">
							The site is not yet ready to accept new users. But you can sign up to recieve an email notification when we finish gluing the website together.
						</div>
						<div class="inputcontainer">
							<input type="text" name="email" id="email1" class="registertextinput" placeholder="Your Email" />
						</div>
						<div class="inputcontainer">
							<div style="height:40px;width:360px;padding:10px;font-size:20px;">
									<input type="submit" value="Let me know when it's done!" style="float:left;height:30px;font-size:20px;padding:5px;position:relative;right:10px;border-radius:100px;border-style:none;padding:2px 6px;text-shadow:0px 1px #CCCCCC;
									/* gradients */
									background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #FFFFFF), color-stop(15%, #EEEEEE), color-stop(100%, #888888));
									background: -moz-linear-gradient(top, #FFFFFF 0%, #EEEEEE 55%, �#888888 130%);
									" onmousedown="this.style.boxShadow='inset 0px 1px 3px black';this.style.background='-webkit-gradient(linear, left top, left bottom, color-stop(0%, #777777), color-stop(15%, #999999), color-stop(100%, #DDDDDD))';this.style.background='-moz-linear-gradient(top, #777777 0%, #999999 55%, �#DDDDDD 130%);'"
									onmouseout="this.style.boxShadow='none';this.style.background='-webkit-gradient(linear, left top, left bottom, color-stop(0%, #FFFFFF), color-stop(15%, #EEEEEE), color-stop(100%, #888888))';this.style.background='-moz-linear-gradient(top, #FFFFFF 0%, #EEEEEE 55%, �#888888 130%);'" />
							</div>
						</div>
						<input type="hidden" name="time" id="time" />
					</div>
				
			</form>
		</center>
	</body>
</html>