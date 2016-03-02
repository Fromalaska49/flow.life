<script type="text/javascript">
function writedown() {
	var box = document.getElementById('textarea');
	var y = 0;
	var x = window.setInterval(sine, 30);
	function sine(){
		if (y<1){
			box.style.top = 350 * Math.sin(y) - 200 + 'px';
			y += 0.05;
		}
		else{
			window.setTimeout(stopWriteDownMotion, 0);
		}
	}
	function stopWriteDownMotion(){
		window.clearInterval(x)
	}
}
</script>
<script type="text/javascript">
function erase() {
	document.getElementById('posttext').value='';
	document.getElementById("imgupload").remove(0.selectedIndex);
	document.getElementById('imguploadtext').innerHTML='Add Picture';
}
</script>
<script type="text/javascript">
function writeup() {
	var box = document.getElementById('textarea');
	var y = 1;
	var x = window.setInterval(sine, 30);
	function sine(){
		if (y>0){
			box.style.top = 450 * Math.sin(y) - 300 + 'px';
			y -= 0.05;
		}
		else{
			window.setTimeout(stopWriteUpMotion, 0);
		}
	}
	function stopWriteUpMotion(){
		window.clearInterval(x)
	}
	window.setTimeout(erase, 400);
}
</script>
<script type="text/javascript">
function writebutton() {
	if (window.XMLHttpRequest) {
		xmlhttp=new XMLHttpRequest();
	}
	else {
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function() {
		//
	}
	var txt = document.getElementById('posttext').value;
	var parameters = "text="+encodeURIComponent(txt);
	xmlhttp.open("POST","write.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send(parameters);
	window.setTimeout(writeup, 0);
	window.setTimeout(erase, 1200);
}
</script>





<script type="text/javascript">
function mediadown() {
	var box = document.getElementById('mediatextarea');
	var y = 0;
	var x = window.setInterval(sine, 30);
	function sine(){
		if (y<1){
			box.style.top = 350 * Math.sin(y) - 200 + 'px';
			y += 0.05;
		}
		else{
			window.setTimeout(stopMediaDownMotion, 0);
		}
	}
	function stopMediaDownMotion(){
		window.clearInterval(x)
	}
}
</script>
<script type="text/javascript">
function mediaerase() {
	document.getElementById('mediaposttext').value='';
	document.getElementById('mediauploadtext').innerHTML='Add Photo';
	document.getElementById('mediabutton').style.right='165px';
	document.getElementById("mediaupload").reset();
}
</script>
<script type="text/javascript">
function mediaup() {
	var box = document.getElementById('mediatextarea');
	var y = 1;
	var x = window.setInterval(sine, 30);
	function sine(){
		if (y>0){
			box.style.top = 450 * Math.sin(y) - 300 + 'px';
			y -= 0.05;
		}
		else{
			window.setTimeout(stopMediaUpMotion, 0);
		}
	}
	function stopMediaUpMotion(){
		window.clearInterval(x)
	}
	window.setTimeout(mediaerase, 400);
}
</script>
<script type="text/javascript">
function mediabutton() {
	if (window.XMLHttpRequest) {
		xmlhttp=new XMLHttpRequest();
	}
	else {
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function() {
		//
	}
	var txt = document.getElementById('mediaposttext').value;
	var parameters = "text="+encodeURIComponent(txt);
	//xmlhttp.open("POST","script-upload-image.php",true);
	//xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	//xmlhttp.send(parameters);
	window.setTimeout(mediaup, 0);
	window.setTimeout(mediaerase, 1200);
}
</script>