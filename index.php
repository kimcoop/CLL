<? include('include/home_header.php'); ?>

<div id="container">
		
			<div class="text" style="margin-left: 240px">
					<div class="bubble" id="about_bubble"><h2>About</h2></div>
					<?= grab('index_about'); ?>
			</div>
			
			<div class="text" style="margin-left: 240px">
					<div class="bubble" id="updates_bubble"><h2>Events</h2></div>
					<?= grab('index_events'); ?>
					<div style="float:right"><a href="about/events.php">View More&nbsp;&raquo;</a></div>
			</div>

<? include('include/footer.php'); ?>