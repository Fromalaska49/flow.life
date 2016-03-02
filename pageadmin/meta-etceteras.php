<title>
	flow.life
</title>
<link rel="stylesheet" type="text/css" href="network.css" />
<script type="text/javascript">
function layoutcalc() {
	var offset = document.getElementById('cancelbutton').offsetWidth;
	var offset = offset+10;
	var offset = offset+"px";
	document.getElementById('writebutton').style.right=offset;
	window.setInterval(function(){
		var win = window.innerWidth;
		var news = win-200;
		var feed = document.getElementById('feed');
		feed.style.width=news;
		var postsw = news-160;
		var postsf = postsw+"px";
		var winh = window.innerHeight;
		var newsh = winh;
		feed.style.height=newsh;
	}, 100);
}
</script>