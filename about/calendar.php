
<link rel='stylesheet' type='text/css' href='../js/fullcalendar/fullcalendar.css' />
<link rel='stylesheet' type='text/css' href='../js/fullcalendar/fullcalendar.print.css' media='print' />

<script type='text/javascript' src='../js/jquery/jquery-1.7.1.min.js'></script>
<script type='text/javascript' src='../js/jquery/jquery-ui-1.8.17.custom.min.js'></script>
<script type='text/javascript' src='../js/fullcalendar/fullcalendar.min.js'></script>
<script type='text/javascript'>

$(document).ready(function() {
	
		var date = new Date();
		var d = date.getDate();
		var m = date.getMonth();
		var y = date.getFullYear();

		$('#calendar').fullCalendar({

			editable: true,

			events: [

				{

					title: 'All Day Event',

					start: new Date(y, m, 1)

				},

				{

					title: 'Long Event',

					start: new Date(y, m, d-5),

					end: new Date(y, m, d-2)

				},

				{

					id: 999,

					title: 'Repeating Event',

					start: new Date(y, m, d-3, 16, 0),

					allDay: false

				},

				{

					id: 999,

					title: 'Repeating Event',

					start: new Date(y, m, d+4, 16, 0),

					allDay: false

				},

				{

					title: 'Meeting',

					start: new Date(y, m, d, 10, 30),

					allDay: false

				},

				{

					title: 'Lunch',

					start: new Date(y, m, d, 12, 0),

					end: new Date(y, m, d, 14, 0),

					allDay: false

				},

				{

					title: 'Birthday Party',

					start: new Date(y, m, d+1, 19, 0),

					end: new Date(y, m, d+1, 22, 30),

					allDay: false

				},

				{

					title: 'Click for Google',

					start: new Date(y, m, 28),

					end: new Date(y, m, 29),

					url: 'http://google.com/'

				}

			]

		});

		

	});



</script>

<style type='text/css'>


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

<div id='calendar'></div>
