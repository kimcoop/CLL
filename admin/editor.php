<? include('../include/config.php'); 
	session_start();

$homepage = $GLOBALS['site'] . '/index.php';

if (!isset($_SESSION['admin']) && !isset($_GET['do'])) {
	header("location:" .$homepage);
	exit;
} else if (isset($_GET['do']) && $_GET['do'] == 'logout') {
	session_destroy();
	header("location:" .$homepage);
	exit;
}

?>

<!DOCTYPE html> 

<?

	$files = array();
	foreach ($editable_pages as $handle => $filename) {
		$files[] = $filename;
	}

?>

<html> 
<head>
	<title>CLL Admin</title>
	<link type="text/css" rel="stylesheet" href="../style/admin.css"/>
	<link type="text/css" rel="stylesheet" href="../style/base.css"/>
	<link href='http://fonts.googleapis.com/css?family=Permanent+Marker' rel='stylesheet' type='text/css'>

	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
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
	
<style>

body {
	//background: #1B7;
	//background: #ddd;
}

#cover {
	background: transparent;
}

#container {
	width: auto;
	min-width: 500px;
	max-width: 1200px;
	min-height: 420px;
	border: 6px solid #000;
	background: #fafafa;
	color: #333;
	border-radius: 10px;
	-moz-border-radius: 10px;
	margin: 10px auto;
}

h2 {
	font-size: 2em;
}

h3 {
	text-shadow: none;
}

</style>
	
</head>

<body>
<div id="cover">
		<div id="container">
		
			<div id="back" class="link"><h2><a href="<?= $homepage ?>">&laquo;&nbsp;CLL Home</a></h2></div>
		
		<?
			if ($_SESSION['admin'] != 'admin' && isset($_GET['do']) && $_GET['do'] == 'login') { // if not yet logged in and wanting to
		?>
			
		<form id="pw_form" action="<? $_SERVER['PHP_SELF']; ?>" method="post" enctype="application/x-www-form-urlencoded" target="_self">
			<h2>Welcome to CLL Site Admin.</h2>
		
			<p>Please enter the admin password.</p>
			
			<label>Password:&nbsp;</label>
			<input name="password" type="password" size="50" maxlength="50" required autofocus>
			<br><br>
			
			<input name="go" type="submit" value="Login">
		</form>
			
		<? }
		
		$pass = 'c6b6e01fa9e25f7a126ab76b1bcb53cc';
		if (isset($_POST['password']) && md5($_POST['password']) != $pass) {
				echo 'Incorrect pass';
		} else if (isset($_POST['password']) && md5($_POST['password']) == $pass) { // passwords match
				$_SESSION['admin'] = 'admin';
		}
		
		if ($_SESSION['admin'] == 'admin') {
		?>
			<style>
			#pw_form { display:none; }
			</style>
			<div id="logout" class="link"><h2><a href="?do=logout">Logout&nbsp;&raquo;</a></h2></div>
		
			<form id="editor" method="post" action="<? $_SERVER['PHP_SELF']; ?>">
				<h2>CLL Admin</h2>
				<p>Welcome to your site editor! This tool will allow you to edit the text on your pages without ever having to look at the code, like a word processor. 
				Simply click on one of the links to view its current contents, then make your edits and hit the "Save" button at the bottom. (Save button will appear once a link is clicked.)</p>
		
				<?
		
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
			
		<? } ?>
			
		</div><!-- end container -->
</div><!-- end cover -->
</body>
</html>

