
		<script type="text/javascript">
		function appendPost()
		{
		<?php
		$prepostrow = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE id='$uid'"));
		$prepostname=htmlentities($prepostrow["fname"]).' '.htmlentities($prepostrow["lname"]);
		$prepostppimgurl = $prepostrow["ppimgurl"];
		?>
		var newCommentHeader=document.createElement("div");
		var commenthead=document.createAttribute("class");
		commenthead.value="containerhead";
		newCommentHeader.setAttributeNode(commenthead);
		
		var pimga=document.createElement("a");
		var pimgaatt1=document.createAttribute("href");
		pimgaatt1.value="profile.php?id=<?php echo($uid); ?>";
		pimga.setAttributeNode(pimgaatt1);
		
		var pimg=document.createElement("img");
		var pimgatt1=document.createAttribute("style");
		pimgatt1.value="height:40px;float:left;";
		pimg.setAttributeNode(pimgatt1);
		var pimgatt2=document.createAttribute("src");
		pimgatt2.value="images/upload/users/p/<?php echo($ppimgurl); ?>";
		pimg.setAttributeNode(pimgatt2);
		
		var hfour=document.createElement("h4");
		var hfouratt1=document.createAttribute("class");
		hfouratt1.value="ttl";
		hfour.setAttributeNode(hfouratt1);
		
		var namea=document.createElement("a");
		var nameaatt1=document.createAttribute("href");
		nameaatt1.value="profile.php?id=<?php echo($uid); ?>";
		namea.setAttributeNode(nameaatt1);
		
		var namediv=document.createElement("div");
		var namedivatt1=document.createAttribute("class");
		namedivatt1.value="pcheader";
		namediv.setAttributeNode(namedivatt1);
		
		var name=document.createTextNode("<?php echo($prepostname); ?>");
		
		
		pimga.appendChild(pimg);
		newCommentHeader.appendChild(pimga);
		
		namediv.appendChild(name);
		namea.appendChild(namediv);
		hfour.appendChild(namea);
		newCommentHeader.appendChild(hfour);
		
		
		var newContainer=document.createElement("div");
		var container=document.createAttribute("class");
		container.value="container";
		newContainer.setAttributeNode(container);
		
		
		var cdiv=document.createElement("div");
		var cdivatt1=document.createAttribute("class");
		cdivatt1.value="ctextcontainer";
		cdiv.setAttributeNode(cdivatt1);
		var c=document.createTextNode(document.getElementById('posttext').value);
		cdiv.appendChild(c);
		
		newContainer.appendChild(newCommentHeader);
		newContainer.appendChild(cdiv);
		
		var br=document.createElement("br");
		
		var list=document.getElementById("userposts")
		var n = 0;//list.children.length - 2;
		list.insertBefore(br,list.childNodes[n]);
		var list=document.getElementById("userposts")
		var n = 0;//list.children.length - 2;
		list.insertBefore(newContainer,list.childNodes[n]);
		
		//var list=document.getElementById("posts")
		//var n = list.children.length - 2;
		//list.insertBefore(cdiv,list.childNodes[n]);
		}
		</script>