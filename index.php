<? include('include/home_header.php'); ?>

<div id="container" style="overflow:hidden">
		
			<div class="text" style="width: 600px">
					<div class="bubble" id="about_bubble"><h2>About</h2></div>
					<?= grab('index_about'); ?>
			</div>
			
			<div class="text" style="width: 600px">
					<div class="bubble" id="updates_bubble"><h2>Events</h2></div>
					<?= grab('index_events'); ?>
			</div>

<? include('include/footer.php'); ?>