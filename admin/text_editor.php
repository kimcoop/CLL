
			<form id="editor" method="post" action="<? $_SERVER['PHP_SELF']; ?>">

<?
	$files = array();
	foreach ($editable_pages as $handle => $filename) {
		$files[] = $filename;
	}
		
				echo "<ul class='controls'>";
				foreach ($editable_pages as $handle => $filename) {
					$pagelink = str_replace(" ", "_", $handle);
					echo "<li><a href='?page=" .$filename. "'>" .$handle. "</a></li>\n";
				}
				echo "</ul>";
				
				if (!empty($_POST['page-code'])) { //if a page was saved
		
					$output_file = '../content/text/' . $_GET['page'] . '.txt'; //fix any textarea tags, strip slashes and attempt to save file
					$saved_file = file_put_contents($output_file, stripslashes(str_replace("</*textarea*>", "</textarea>", $_POST['page-code'])));
					if ($saved_file) {
						echo "<h3 class='success centered'>Your page was updated successfully!</h3>";
					} else {
						echo "<h3 class='error centered'>Uh-oh, your changes were unable to be saved.</h3>";
					}
				}
		
			if (isset($_GET['page']) && in_array($_GET['page'], $files)) { //If a page is specified and it's in our array of editable pages
			
				$input_file = '../content/text/' . $_GET['page'] . '.txt'; //Get the filename from $editable_pages and the content from that file
				$page_content = file_get_contents($input_file);
		
				if ($page_content) {// if get page worked, obfuscate any textarea tags that would mess up the display and print content inside a textarea
					echo "<textarea name='page-code' id='page-code'>" . str_replace("</textarea>","</*textarea*>", $page_content). "</textarea><br />";
					echo "<input type='submit' class='submit' id='page-code-save' name='page-code-save' value='save'/>";
				} else { // *If it didn't work, display an error message
					echo "<p>Uh-oh - that page was unable to be accessed. Please try again.</p>";
				}
			} else {//If no page has been specified, the user probably just landed here
			}
			
			?>
			</form>