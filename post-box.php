		<!--This is the posting box-->
		<center>
			<div style="z-index:6;background-color:#DDDDDD;width:;height:200px;box-shadow:0px 5px 20px black;border-style:solid;border-color:#007700;border-width:10px;position:absolute;top:-320px;left:220px;right:20px;" id="textarea">
				<div style="width:100%;height:200px;box-shadow:inset 5px 5px 15px black;">
					<textarea style="width:100%;height:100%;resize:none;font-family:arial;padding:10px;font-size:16px;" id="posttext"></textarea>
				</div>
				<div style="height:0px;width:100%;background-color:;">
					<div class="button" style="position:absolute;bottom:10px;right:70px;" id="writebutton" onclick="appendPost();writebutton()" onmousedown="this.className='buttonactive'" onmouseup="this.className='button'" onmouseout="this.className='button'">
						Post
					</div>
					<div id="cancelbutton" class="button" style="position:absolute;bottom:10px;right:0px;" onclick="writeup()"  onmousedown="this.className='buttonactive'" onmouseup="this.className='button'" onmouseout="this.className='button'">
						Cancel
					</div>
				</div>
			</div>
		</center>