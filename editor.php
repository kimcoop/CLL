<!--<!DOCTYPE html> 

<?php
	$editable_pages = array(
	'CLL - About' => 'index_about',
	'CLL - Events' => 'index_events',
	'Guest Pass' => 'guest_pass',
	'Guest Pass - About' => 'guest_pass_about',
	'Guest Past - When' => 'guest_pass_when',
	'PACK' => 'pack',
	'PACK - About' => 'pack_about',
	'PACK - Cost' => 'pack_cost',
	'PACK - When' => 'pack_when',
	'Parent Fitness - About' => 'parent_fitness_about',
	'Parent Fitness - When' => 'parent_fitness_when',
	'Parent Fitness' => 'parent_fitness',
	'PAWS' => 'paws',
	'PAWS - About' => 'paws_about',
	'PAWS - Cost' => 'paws_cost',
	'PAWS - Where' => 'paws_where',
	'PAWS - When' => 'paws_when',
	'Saturday\'s Kids' => 'sat_kids',
	'Saturday\'s Kids - About' => 'sat_kids_about',
	'Saturday\'s Kids - Cost' => 'sat_kids_cost',
	'Saturday\'s Kids - Where' => 'sat_kids_where',
	'Saturday\'s Kids - When' => 'sat_kids_when'
);

	$files = array();
	foreach ($editable_pages as $handle => $filename) {
		$files[] = $filename;
	}

?>

<html> 
<head>
	<title>CLL Admin</title>
	<link rel="stylesheet" type="text/css" href="style/admin.css"/>
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
	  
	  $("#page-code-save").hide().after("<a class='submit' id='pseudo-submit'>Save</a>");
	  
	  $("#pseudo-submit").click(function() {
			/*var before = $("#page-code").text().split("<body>")[0] + "<body>";
			var after = "</body>" + $("#page-code").text().split("</body>")[1];*/
			var code = jQuery.wymeditors(0).xhtml();
			//$("#page-code").text(before + code + after);
			$('#page-code').text(code);
			$("#editor").submit();
			return false;
	  });
	  
	});
	</script>
</head>

<body>

	<form id="editor" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
		<h2>CLL Content Manager</h2>
		<?

		echo "<ul class='controls'>";
		foreach ($editable_pages as $handle => $filename) {
			$pagelink = str_replace(" ", "_", $handle);
			echo "<li><a href='?page=" .$filename. "'>" .$handle. "</a></li>\n";
		}
		echo "</ul>";
		
		/*if a page was saved*/
		if (!empty($_POST['page-code'])) {

			/*fix any textarea tags, strip slashes and attempt to save file*/
			$output_file = 'content/text/' . $_GET['page'] . '.txt';
			$saved_file = file_put_contents($output_file, stripslashes(str_replace("</*textarea*>", "</textarea>", $_POST['page-code'])));
			if ($saved_file) {
				echo "<h3 class='centered'>Your page was updated successfully!</h3>";
			} else {
				echo "<h3 class='centered'>Uh-oh, your changes were unable to be saved.</h3>";
			}
		}

	/*If a page is specified and it's in our array of editable pages*/
	if (isset($_GET['page']) && in_array($_GET['page'], $files)) {
	
		/*Get the filename from $editable_pages and the content from that file*/
		$input_file = 'content/text/' . $_GET['page'] . '.txt';
		//$page_name = str_replace("_", " ", $_GET['handle']);
		$page_content = file_get_contents($input_file);

		/*If it worked*/
		if ($page_content) {
			/*obfuscate any textarea tags that would mess up the display and print content inside a textarea*/
			//echo "<p>Editing contents of " .$page_name. "</p>";
			echo "<textarea name='page-code' id='page-code'>" . str_replace("</textarea>","</*textarea*>", $page_content). "</textarea><br />";

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

-->