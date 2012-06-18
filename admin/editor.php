<? 
	define('ADMINPASS', 'c6b6e01fa9e25f7a126ab76b1bcb53cc');
	define('INTRO', 'Welcome to your site editor! This tool allows you to edit the text on your pages without looking at the code, like a Word Processor. Click on a page link below to get started.');
	
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
	<link type="text/css" rel="stylesheet" href="../style/jquery-ui.css"/>
	<link href='http://fonts.googleapis.com/css?family=Permanent+Marker' rel='stylesheet' type='text/css'>
	<link href="http://code.jquery.com/ui/1.8.19/themes/base/jquery-ui.css" rel='stylesheet' type='text/css'>
	<meta http-equiv="Access-Control-Allow-Origin" content="*">
	<script src="http://www.parsecdn.com/js/parse-1.0.2.min.js"></script>

	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script type="text/javascript" src="http://code.jquery.com/ui/1.8.20/jquery-ui.min.js"></script>
<!--	<script src="../js/main.js" type="text/javascript"></script>-->
	<script type="text/javascript" src = "../js/jquery.parse.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>
	<script type="text/javascript" src="../js/jquery-ui-timepicker-addon.js"></script>
	<script type='text/javascript' src='wymeditor/jquery.wymeditor.pack.js'></script>
	<script type='text/javascript'>
	
	var pages = new Array();
	
	$(function() {

		Parse.initialize("Ji2ce107tebyCJEC31gGvyvZ24YsBVV2m1ES0VHz", "MICUaupejbUuLurojUgkZpyFGQWjLDrtJZAzcqxz");
		$.parse.init({
				app_id : "Ji2ce107tebyCJEC31gGvyvZ24YsBVV2m1ES0VHz", // <-- enter your Application Id here 
				rest_key : "x8RJurTMtCqeth37bwcCSAQjJLZjmHlEBUZtnEKe" // <--enter your REST API Key here    
		});
		
		var selectedPage = '';
		var pagesGroup = Parse.Collection.extend({
			model: 'page'
		});
		
		var page_list = $('#page_list');
		var collection = new pagesGroup;
		collection.fetch({
			success: function(collection) {
				collection.each(function(object) {
					pages[object.id] = object; // track them
					page_list.append('<li class="page_link" id="'+object.id+'"><a href="#">'+ object.get("name") +'</a></li>&nbsp;');
				});
			},
			error: function(collection, error) {
				console.log('The collection could not be retrieved. ' + error);
			}
		});
	
		$('.page_link').live('click', function() {
			var pageName = $(this).text();
			var pageId = $(this).attr('id');
			selectedPage = pageId;
			
			var content = pages[pageId].get('content');
					
			if ($('.wym_skin_default').length > 0) {
				$('.wym_skin_default').remove();
				$('.editor').remove();
			}
			
			$('#page_list').after(
				"<textarea class='editor' name='page_code' id='page_code' style='display:none'></textarea><br>"
			);
			
			$('#page_code').text(content).wymeditor().show();
			$('#page_code_save').show();
			
			$('.editor').hide();
		
		}); // page_link.click
	  
	  $("#page_code_save").live('click', function() {
	  
	  	var code = $.wymeditors(0).xhtml();
		$('#page_code').text(code);
		
		var page = pages[selectedPage]; // find by id
		page.set('content', code);
		page.save(null, {success: function(obj) {
				message('Page updated.');
			}
			});// save
		}); // click
		
		$('#tabs li h3').click(function() {
			
			var id = this.id;
			$('#tabs li').removeClass('active');
			$(this).parent().addClass('active');
			$('.section').hide();
			$('#section_'+id).show();
		
		}); // tabs click|	
	  
	});
	

function message(str) {
	var el = $('#message');
	el.text(str).fadeIn('slow').delay(2400).fadeOut();
};	
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

#tabs {
	list-style-type: none;
}

#tabs li {
	float: left;
	padding: 5px;
	border: 2px solid #000;
	border-radius: 0;
	-moz-border-radius: 0;
	background: #ccc;
}

#tabs li.active {
	background: transparent;
	border-bottom: 2px solid #FAFAFA;
}

#tabs li h3:hover {
	cursor: pointer;
	color: #003FCF;
}

.section {
	font-family: "Helvetica Neue", arial;
	margin: -8px 0 10px 6px;
	padding: 5px 10px;
	border: 2px solid #000;
}

#message {
	margin: 10px auto;
	width: 100%;
	border: 2px solid #003FCF;
	color: #003FCF;
	background: #efefef;
	font-size: 1.2em;
	padding: 1em 0;
	text-align: center;
	display: none;
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
			<br><h2>Welcome to CLL Site Admin.</h2>
		
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
		
			<div id="editor">
				<h2>CLL Admin</h2>
				<p><?= INTRO ?>
				
				<div id="message"></div>
				
				<ul id="tabs">
					<li class="active"><h3 id="content">Content Manager</h3></li>
					<li><h3 id="cal">Calendar Manager</h3></li>
				</ul>
				
				<div class="clearfix"></div>
				
				<div id="section_content" class="section">
					
					<ul id='page_list' class='controls'></ul>
					<input type='button' class='submit' id='page_code_save' name='page_code_save' value='Save' style='display:none'/>
				
				</div><!-- #section_content -->
				
				<div id="section_cal" class="section" style="display:none">
					<? include('event_editor.php'); ?>
				</div><!-- #section_cal -->
				
			</div><!-- editor -->
			
		<? } ?>
			
		</div><!-- end container -->
</div><!-- end cover -->
</body>
</html>

