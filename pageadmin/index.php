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
		<?php require("header-logged-out.php"); ?>
		<center>
		<?php require("form-register-page.php"); ?>
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