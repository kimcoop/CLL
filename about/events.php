<?

include('../include/header.php');

?>

<script type="text/javascript">
$(function() {
	$('#upc_events').fetch('Homepage - Events');
});
</script>


<div id="title_container">

		<img src="../images/calendar.png" height="150" />
		<h1 id="title">Events</h1>

</div> <!-- /#title_container -->
</div> <!-- /#header -->

<div id="container">

<div class="breadcrumb">
	<a href="index.php">About</a> &raquo; Events
</div>

	<div class="text">

		<div class="bubble">
			<h2 class="small">Upcoming<br>Events</h2>
		</div>
		<div style="width: 98%; margin: 10px auto;">
			<h3>Upcoming Events</h3>
			<div id="upc_events"></div>
		</div>
	</div>
	
	<div class="text">

		<div class="bubble">
			<h2 class="small">Calendar</h2>
		</div>
		<? include('calendar.php'); ?>
	</div>


<?

include('../include/footer.php');

?>