		<!--This is the posting box-->
		<center>
		<form action="script-upload-image.php" method="post" enctype="multipart/form-data">
			<div style="z-index:6;background-color:#DDDDDD;width:;height:200px;box-shadow:0px 5px 20px black;border-style:solid;border-color:#007700;border-width:10px;position:absolute;top:-320px;left:220px;right:20px;" id="mediatextarea">
				<div style="width:100%;height:200px;box-shadow:inset 5px 5px 15px black;">
					<textarea style="width:100%;height:100%;resize:none;font-family:arial;padding:10px;font-size:16px;" name="post" id="mediaposttext"></textarea>
				</div>
				<div style="height:0px;width:100%;background-color:;">
					<div class="button" style="position:absolute;bottom:10px;right:165px;" id="mediabutton" onclick="submit()" onmousedown="this.className='buttonactive'" onmouseup="this.className='button'" onmouseout="this.className='button'">
						Post
					</div>
					<div style="position:absolute;bottom:10px;right:80px;">
						<div style="position:relative;overflow:hidden;margin:0px;" class="button" onmousedown="this.className='buttonactive'" onmouseout="this.className='button'" onmouseup="this.className='button'">
							<span id="mediauploadtext">Add Photo</span>
							<input type="file" name="file" style="position:absolute;top:0;right:0;margin:0;padding:0;font-size:20px;cursor:pointer;opacity:0;filter:alpha(opacity=0);" id="mediaupload" onchange="if(document.getElementById('mediaupload').files[0]){document.getElementById('mediauploadtext').innerHTML='Photo Added';document.getElementById('mediabutton').style.right='183px';}else{document.getElementById('mediauploadtext').innerHTML='Add Photo';document.getElementById('mediabutton').style.right='165px';}" />
						</div>
					</div>
					<div id="mediacancelbutton" class="button" style="position:absolute;bottom:10px;right:0px;" onclick="mediaup()"  onmousedown="this.className='buttonactive'" onmouseup="this.className='button'" onmouseout="this.className='button'">
						Cancel
					</div>
				</div>
			</div>
		</form>
		</center>