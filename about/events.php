<?

include('../include/header.php');

?>
<link rel='stylesheet' type='text/css' href='../js/fullcalendar/fullcalendar.css' />
<link rel='stylesheet' type='text/css' href='../style/jquery-ui.css' />
<link rel='stylesheet' type='text/css' href='../js/fullcalendar/fullcalendar.print.css' media='print' />

<script type='text/javascript' src='../js/jquery/jquery-1.7.1.min.js'></script>
<script type='text/javascript' src='../js/jquery/jquery-ui-1.8.17.custom.min.js'></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>
<script type='text/javascript' src='../js/fullcalendar/fullcalendar.min.js'></script>
<script type='text/javascript' src='../js/main.js'></script>
<script type='text/javascript' src='../js/calendar_functions.js'></script>

<script type="text/javascript">
$(function() {
	$('#upc_events').fetch('Homepage - Events');
});
</script>
<style>

#calendar {
	width: 95%;
	margin: 10px auto;
	font-family: "Helvetica Neue", arial;
}

#calendar h2 {
	color: #003FCF;
	font-weight: bold;
	font-size: 1.2em;
	font-family: "Helvetica Neue", arial;
}
</style>

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

		<div id="displayEvent">
			<h2 id="displayEventTitle"></h2>
			<div id="displayEventDate"></div>
			<br>
			<div id="displayEventDetails"></div>
		</div>
		
		<div id='calendar'></div>
		
	</div>

<?

include('../include/footer.php');

?>