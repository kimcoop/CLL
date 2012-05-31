
<link rel='stylesheet' type='text/css' href='../js/fullcalendar/fullcalendar.css' />
<link rel='stylesheet' type='text/css' href='../js/fullcalendar/fullcalendar.print.css' media='print' />

<script type='text/javascript' src='../js/jquery/jquery-1.7.1.min.js'></script>
<script type='text/javascript' src='../js/jquery/jquery-ui-1.8.17.custom.min.js'></script>
<script type='text/javascript' src='../js/fullcalendar/fullcalendar.min.js'></script>
<script type='text/javascript'>

$(function() {
		getEvents();
});

function getEvents() {

	var events_arr = new Array();
	var dataString = 'action=getEvents';
	var file = '../include/functions.php';

	$.ajax({ 
			 type: 'post',
			 dataType: 'json',
			 url: file,
			 data: dataString,
			 success: function(data) {
			 	
			 	$(data.response).each(function(i, val) {
			 		events_arr.push({
			 			'title': val.title,
			 			'start': val.timestamp,
			 			'end' : val.end,
			 			'allDay': false,
			 			'id': val.details
			 		});
			 		
			 	}); // end each
				
				$('#calendar').fullCalendar({
					editable: true,
					events: events_arr,
					eventClick: function(calEvent, jsEvent, view) {
						alert(calEvent.title);
						alert(calEvent.id);
						var x = jsEvent.pageX;
						var y = jsEvent.pageY;
					}
				});
			
			}, // end success
			error: function(xhr, textStatus, errorThrown) {
					console.log(arguments);
					console.log('Request failed. ' +textStatus+ ': ' + errorThrown);
			}
	}); // end ajax
};



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

#raw_events {
	display: none;
}

</style>

<div id="raw_events">

<?
	$raw_events = grab('events');
	echo $raw_events;
	
	getEvents();
					
?>
	
</div>

<div id='calendar'></div>
