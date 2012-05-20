<!DOCTYPE html
PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 

<?php
	$editable_pages = array(
	'home' => 'indexx.html',
	'about' => 'temp_about.php',
	'services' => 'services.html',
	'contact' => 'contact.html'
);
?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"> 
<head>
	<title>Webitect jQuery/PHP Editor Demo</title>
	<link rel="stylesheet" type="text/css" href="style.css"/>
	<script type='text/javascript' src='jquery.min.js'></script>
	<script type='text/javascript' src='wymeditor/jquery.wymeditor.pack.js'></script>
	<script type='text/javascript'>
	$(function() { 
	
	  $("#page-code").wymeditor({
			skin: "minimal",
			skinPath: 'wymeditor/skins/minimal/',
			toolsHtml: '',
			classesHtml: ''
	  });
	  
	  $("#page-code-save").hide().after("<a class='submit' id='pseudo-submit'>save</a>");
	  
	  $("#pseudo-submit").click(function() {
			var before = $("#page-code").text().split("<body>")[0] + "<body>";
			var after = "</body>" + $("#page-code").text().split("</body>")[1];
			var code = jQuery.wymeditors(0).xhtml();
			$("#page-code").text(before + code + after);
			$("#editor").submit();
			return false;
	  });
	  
	});
	</script>
</head>

<body>

	<form id="editor" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
		<h2>Site Editor</h2>
		<?php

		echo "<ul class='controls'>";
		foreach ($editable_pages as $handle => $filename) {
			echo "<li><a href='?page=" .$handle. "'>" .$handle. "</a></li>\n";
		}
		echo "</ul>";

		/*if a page was saved*/
		if (!empty($_POST['page-code'])) {

			/*fix any textarea tags, strip slashes and attempt to save file*/
			$saved_file = file_put_contents($editable_pages[$_GET['page']], stripslashes(str_replace("</*textarea*>","</textarea>",$_POST['page-code'])));
			if ($saved_file) {
				echo "<h3 class='centered'>Your page was updated successfully!</h3>";
			} else {
				echo "<h3 class='centered'>Uh-oh, your changes were unable to be saved.</h3>";
			}
		}

	/*If a page is specified and it's in our array of editable pages*/
	if (isset($_GET['page']) && isset($editable_pages[$_GET['page']])) {

		/*Get the filename from $editable_pages and the content from that file*/
		$page_content = file_get_contents($editable_pages[$_GET['page']]);

		/*If it worked*/
		if ($page_content) {
			/*obfuscate any textarea tags that would mess up the display and print content inside a textarea*/
			echo "<textarea name='page-code' id='page-code'>" .str_replace("</textarea>","</*textarea*>", $page_content). "</textarea><br />";

			/*Now create a save button*/
			echo "<input type='submit' class='submit' id='page-code-save' name='page-code-save' value='save'/>";
		} else {
			/*If it didn't work, display an error message*/
			echo "<p>Uh-oh - that page was unable to be accessed. Please try again.</p>";
		}
	} else {
		/*If no page has been specified, the user probably just landed here so we'll welcome them and explain how it works*/
		echo "<p>Welcome to your site editor! This tool will allow you to edit the text on your pages without ever having to look at the code, like a word processor. Editable elements will turn blue when your cursor passes over them. Click on one of the links above to get started!</p>";
	}
	?>
	</form>


</body>
</html>

