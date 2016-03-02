<title>
	flow.life
</title>
<link rel="stylesheet" type="text/css" href="network.css" />
<link rel="icon" type="image" href="icon.png" />
<script type="text/javascript">
function layoutcalc() {
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