<? 
	define('ADMINPASS', 'c6b6e01fa9e25f7a126ab76b1bcb53cc');
	
	include('../include/config.php'); 
	session_start();
	
	$homepage = $GLOBALS['root'] . '/index.php';
	
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

<html> 
<head>
	<title>CLL Admin</title>
	<link type="text/css" rel="stylesheet" href="../style/admin.css"/>
	<link type="text/css" rel="stylesheet" href="../style/base.css"/>
	<link href='http://fonts.googleapis.com/css?family=Permanent+Marker' rel='stylesheet' type='text/css'>
	<link href="http://code.jquery.com/ui/1.8.19/themes/base/jquery-ui.css" rel='stylesheet' type='text/css'>

	<script src="http://www.parsecdn.com/js/parse-1.0.2.min.js"></script>

	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script type="text/javascript" src="http://code.jquery.com/ui/1.8.20/jquery-ui.min.js"></script>
	<script type="text/javascript" src="../js/jquery-ui-timepicker-addon.js"></script>
	<script type='text/javascript' src='wymeditor/jquery.wymeditor.pack.js'></script>
	<script type='text/javascript'>
	$(function() {
		
	/*
					{
						skin: "minimal",
						skinPath: 'wymeditor/skins/minimal/',
						toolsHtml: '',
						classesHtml: ''
					}
	  */

		Parse.initialize("Ji2ce107tebyCJEC31gGvyvZ24YsBVV2m1ES0VHz", "MICUaupejbUuLurojUgkZpyFGQWjLDrtJZAzcqxz");
		
		var pagesGroup = Parse.Collection.extend({
			model: 'page'
		});
		
		var page_list = $('#page_list');
		var collection = new pagesGroup;
		collection.fetch({
			success: function(collection) {
				collection.each(function(object) {
					page_list.append('<li class="page_link"><a href="#">'+ object.get("name") +'</a></li>&nbsp;');
				});
			},
			error: function(collection, error) {
				// The collection could not be retrieved.
			}
		});
	
		$('.page_link').live('click', function() {
			var pageName = $(this).text();
			var pageToFetch = Parse.Object.extend("page");
			var query = new Parse.Query(pageToFetch);
			
			query.equalTo("name", pageName);
			query.find({
				success: function(result) {
					var str = result[0].get("content");
					
					if ($('.wym_skin_default').length > 0) {
						$('.wym_skin_default').remove();
						$('.editor').remove();
					}
					
					$('#page_list').after(
						"<textarea class='editor' name='page_code' id='page_code' style='display:none'></textarea><br>"
					);
					$('#page_code').text(str).wymeditor().show();
					
					$('.editor').hide();
				},
				error: function(error) {
					console.log("Error: " + error.code + " " + error.message);
				}
			});
		
		}); // page_link.click
		
	  $("#page_code_save").hide().after("<a class='submit' id='pseudo_submit'>Save</a>");
	  
	  $("#pseudo_submit").live('click', function() {
	  	var code = '';
	  	if ($("#event_table").length > 0) { // grab the text from the events table rows
				
				$(".event_row").each(function() {
					$(this).children('td').each(function() { // go through the cells, grab proper data
						var el = $(this).children();
						if (el.length > 0) { // if there are children
							var val = el.attr('value');
							if (val != undefined) code += val.trim();
							else code += el.text().trim();
							code += "##";
						}
					});
					if ($(this).text().length > 0) code += "%%";					
				}); // each
				
				$.post('actions.php', { 'action' : 'edit', 'file' : 'events.txt', 'content' : code }, function() {
					//alert('posted: ' + code);
					$('#event_table').before("<h3 id='event_success' class='success centered' style='display:none;margin-bottom:1em'>Event(s) saved!</h3>");
					$('#event_success').fadeIn('slow', function() {
						$(this).delay(1800).fadeOut('slow');
					});
					return false;
				});
				
			} else {
				code = $.wymeditors(0).xhtml();
				$('#page_code').text(code);
				page = $('#page').attr('value');
				
				var pageToSave = Parse.Object.extend("page");
				var pageToSave = new pageToSave();
				pageToSave.set("name", page);
				pageToSave.set("content", code);
				pageToSave.save(null, {
					success: function(pageToSave) {
						alert('Page saved.');
					},
					error: function(pageToSave, error) {
						alert(Parse.Error);
						// error is a Parse.Error with an error code and description.
					}
				});
				
				
	  		return false;	
	  		
	  	}
	  });
	  
	  $('#new_event').click(function() {
	  
	  	var table = $("#event_table");
	  	var el = "<tr class='event_row'>";
	  	el += "<td><input class='event' type='text' placeholder='Event title'/></td>";
	  	el += "<td><input class='event date' type='text' placeholder='Event start'/></td>";
	  	el += "<td><input class='event date' type='text' placeholder='Event end'/></td>";
	  	el += "<td><textarea class='event' type='textarea' placeholder='Event details'></textarea></td>";
	  	el += "</tr>";
	  	table.append(el);
	  	
	  }); // new_event click
	
		$('.date').datetimepicker({
			ampm: true
		});
		
		$('.delete').click(function() {
		
			var t = confirm('Delete this event?');
			if (t) {
				var el = $(this).parent().parent('tr');
				el.fadeOut('slow', function() {
					el.detach();
				});
			}
		
		}); // delete click
	  
	});
	</script>
	
<style>

/* css for timepicker */
.ui-timepicker-div .ui-widget-header { margin-bottom: 8px; }
.ui-timepicker-div dl { text-align: left; }
.ui-timepicker-div dl dt { height: 25px; margin-bottom: -25px; }
.ui-timepicker-div dl dd { margin: 0 10px 10px 65px; }
.ui-timepicker-div td { font-size: 90%; }
.ui-tpicker-grid-label { background: none; border: none; margin: 0; padding: 0; }

body {
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
		
		$pass = ADMINPASS;
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
		
				<ul id='page_list' class='controls'></ul>
				<input type='submit' class='submit' id='page_code_save' name='page_code_save' value='save'/>	
			
			</form>
			
		<? } ?>
			
		</div><!-- end container -->
</div><!-- end cover -->
</body>
</html>

