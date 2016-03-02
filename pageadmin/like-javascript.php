<script type="text/javascript">
function like(id) {
	if (window.XMLHttpRequest) {
		xmlhttp=new XMLHttpRequest();
	}
	else {
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function() {
		//
	}
	var param = "id="+id;
	xmlhttp.open("POST","script-post-like.php",true);

	xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.setRequestHeader("Content-length", param.length);
	xmlhttp.setRequestHeader("Connection", "close");
	xmlhttp.send(param);
	var source=document.getElementById(id).src.replace(/^.*[\\\/]/, '');
	var n=document.getElementById("like"+id);
	var num=Number(n.innerHTML);
	if(source=='thumbs-up-gray.png'){
		document.getElementById(id).src='thumbs-up-green.png';
		num=num+1;
		n.innerHTML=num;
	}
	else{
		document.getElementById(id).src='thumbs-up-gray.png';
		num=num-1;
		if(num>0){
			n.innerHTML=num;
		}
		else{
			n.innerHTML="";
		}
	}
}
</script>