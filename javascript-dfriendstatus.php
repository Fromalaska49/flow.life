<script type="text/javascript">
function acceptrequest(id) {
	if (window.XMLHttpRequest) {
		xmlhttp=new XMLHttpRequest();
	}
	else {
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function() {
		//
	}
	var param = "fid="+id;
	xmlhttp.open("POST","script-friendaccept.php",true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.setRequestHeader("Content-length", param.length);
	xmlhttp.setRequestHeader("Connection", "close");
	xmlhttp.send(param);
	var fid = "friendrequest"+id;
	document.getElementById(fid).style.display='none';
}
</script>
<script type="text/javascript">
function declinerequest(id) {
	if (window.XMLHttpRequest) {
		xmlhttp=new XMLHttpRequest();
	}
	else {
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function() {
		//
	}
	var param = "fid="+id;
	xmlhttp.open("POST","script-frienddecline.php",true);
	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.setRequestHeader("Content-length", param.length);
	xmlhttp.setRequestHeader("Connection", "close");
	xmlhttp.send(param);
	var fid = "friendrequest"+id;
	document.getElementById(fid).style.display='none';
}
</script>