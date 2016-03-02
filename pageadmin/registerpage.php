<html>
	<head>
		<?php require"meta-etceteras.php"; ?>
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
					alert("You must provide a contact email address");
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
			<br />
			<br />
			<br />
			<br />
			<div style="z-index:5;">
				<form action="script-register-page.php" method="post" name="signup" onsubmit="return send()">
				<br />
						<div style="width:380px;height:;background-color:;" id="form">
							<h1>
								Register Page
							</h1>
							<div class="inputcontainer">
								<input type="text" name="pagename" id="pagename" class="registertextinput" placeholder="Page Name" />
							</div>
							<div class="inputcontainer">
								<input type="text" name="email" id="pageemail" class="registertextinput" placeholder="Email" />
							</div>
							<div class="inputcontainer">
								<input type="password" name="password" id="pagepassword" class="registertextinput" placeholder="Password" />
							</div>
							<div class="inputcontainer">
								<p style="margin:0px;height:30px;font-size:20px;padding:5px;position:relative;top:-2px;">The rest is optional</p>
								<input type="text" name="tel" id="" class="registertextinput" placeholder="Phone Number" />
							</div>
							<div class="inputcontainer">
								<input type="text" name="streetaddress" id="streetaddress" class="registertextinput" placeholder="Street Address" />
							</div>
							<div class="inputcontainer">
								<input type="text" name="city" id="city" class="registertextinput" style="width:175px;font-size:20px;height:40px;" placeholder="City" />
								<select name="state" id="state" class="registertextinput" style="width:75px;font-size:20px;height:40px;" placeholder="State">
									<option value="1">
										AL
									</option>
									<option value="2">
										AK
									</option>
									<option value="3">
										AZ
									</option>
									<option value="4">
										AR
									</option>
									<option value="5">
										CA
									</option>
									<option value="6">
										CO
									</option>
									<option value="7">
										CT
									</option>
									<option value="8">
										DE
									</option>
									<option value="9">
										FL
									</option>
									<option value="10">
										GA
									</option>
									<option value="11">
										HI
									</option>
									<option value="12">
										ID
									</option>
									<option value="13">
										IL
									</option>
									<option value="14">
										IN
									</option>
									<option value="15">
										IA
									</option>
									<option value="16">
										KS
									</option>
									<option value="17">
										KY
									</option>
									<option value="18">
										LA
									</option>
									<option value="19">
										ME
									</option>
									<option value="20">
										MD
									</option>
									<option value="21">
										MA
									</option>
									<option value="22">
										MI
									</option>
									<option value="23">
										MN
									</option>
									<option value="24">
										MS
									</option>
									<option value="25">
										MO
									</option>
									<option value="26">
										MT
									</option>
									<option value="27">
										NE
									</option>
									<option value="28">
										NV
									</option>
									<option value="29">
										NH
									</option>
									<option value="30">
										NJ
									</option>
									<option value="31">
										NM
									</option>
									<option value="32">
										NY
									</option>
									<option value="33">
										NC
									</option>
									<option value="34">
										ND
									</option>
									<option value="35">
										OH
									</option>
									<option value="36">
										OK
									</option>
									<option value="37">
										OR
									</option>
									<option value="38">
										PA
									</option>
									<option value="39">
										RI
									</option>
									<option value="40">
										SC
									</option>
									<option value="41">
										SD
									</option>
									<option value="42">
										TN
									</option>
									<option value="43">
										TX
									</option>
									<option value="44">
										UT
									</option>
									<option value="45">
										VT
									</option>
									<option value="46">
										VA
									</option>
									<option value="47">
										WA
									</option>
									<option value="48">
										WV
									</option>
									<option value="49">
										WI
									</option>
									<option value="50">
										WY
									</option>
								</select>
								<input type="text" name="zipcode" id="zipcode" class="registertextinput" style="width:100px;font-size:20px;height:40px;" placeholder="Zip" />
							</div>
							<div class="inputcontainer">
								<div style="height:40px;width:360px;padding:10px;font-size:20px;">
										<input type="checkbox" name="church" value="1" style="margin:0px;padding:0px;" /><p style="display:inline;position:relative;top:2px;margin-left:5px;margin-right:10px;">This page is for a church</p>
										<input type="submit" value="Register" style="float:right;height:30px;font-size:20px;padding:5px;position:relative;right:10px;border-radius:100px;border-style:none;padding:2px 6px;text-shadow:0px 1px #CCCCCC;
										/* gradients */
										background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #FFFFFF), color-stop(15%, #EEEEEE), color-stop(100%, #888888));
										background: -moz-linear-gradient(top, #FFFFFF 0%, #EEEEEE 55%, �#888888 130%);
										" onmousedown="this.style.boxShadow='inset 0px 1px 3px black';this.style.background='-webkit-gradient(linear, left top, left bottom, color-stop(0%, #777777), color-stop(15%, #999999), color-stop(100%, #DDDDDD))';this.style.background='-moz-linear-gradient(top, #777777 0%, #999999 55%, �#DDDDDD 130%);'"
										onmouseout="this.style.boxShadow='none';this.style.background='-webkit-gradient(linear, left top, left bottom, color-stop(0%, #FFFFFF), color-stop(15%, #EEEEEE), color-stop(100%, #888888))';this.style.background='-moz-linear-gradient(top, #FFFFFF 0%, #EEEEEE 55%, �#888888 130%);'" />
								</div>
							</div>
							<input type="hidden" name="time" id="time" />
							<p>
							<a href="index.php" style="color:white;" onmouseover="this.style.textDecoration='underline'" onmouseout="this.style.textDecoration='none'">Want to make a user account?</a>
							</p>
						</div>
					
				</form>
			</div>
		</center>
	</body>
</html>







<!--
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
				alert('end');
			}
		</script>
		-->