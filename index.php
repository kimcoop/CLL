<?

include('include/home_header.php');
include_once('content/functions.php');

?>

<div id="container">


	<div class="text">
			<div class="bubble" id="about_bubble"><h2>About</h2></div>
			<p><?= $index_about; ?></p>
	</div>
	
	<div class="text">
			<div class="bubble" id="updates_bubble"><h2>Events</h2></div>
			<p><?= grab('index_events'); ?></p>
	</div>

</div>

<?

include('include/footer.php');

?>