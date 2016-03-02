<?php ?>
<!--This is the header-->
<div class="head">
	<a href="newsfeed.php">
		<h1 style="float:left;color:white;position:relative;top:-13px;display:inline;">
			Flowlife
		</h1>
	</a>
	<ul style="list-style-type:none;display:inline;position:absolute;top:0px;right:15px;bottom:0px;">
		<!--
		<li class="opt" style="position:relative;top:5px;">
			<input type="text" class="searchinput" style="width:600px;" id="q" name="q" placeholder="Search" />
		</li>
		<li class="opt">
			<div class="button" style="margin-right:5px;margin-left:5px;" onmousedown="this.className='buttonactive'" onmouseup="this.className='button'" onmouseout="this.className='button'" onclick="this.className='button';var q=document.getElementById('q').value;window.location='search.php?q='+q;" title="Write a post">
				Search
			</div>
		</li>
		-->
		<li class="opt">
			<div class="button" style="margin-right:5px;margin-left:5px;" onmousedown="this.className='buttonactive'" onmouseup="this.className='button'" onmouseout="this.className='button'" onclick="this.className='button';writedown();" title="Write a post">
				Write
			</div>
		</li>
		<li class="opt">
			<div class="button" style="margin-right:5px;margin-left:5px;" onmousedown="this.className='buttonactive'" onmouseup="this.className='button'" onmouseout="this.className='button'" onclick="this.className='button';mediadown();" title="Upload a photo">
				Add Photo
			</div>
		</li>
		<li class="opt">
			<a href="logout.php" style="margin-left:5px;" class="button" onmousedown="this.className='buttonactive'" onmouseup="this.className='button'" onmouseout="this.className='button'" onclick="this.className='button'">
				Log Out
			</a>
		</li>
	</ul>
</div>