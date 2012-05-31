
<link rel='stylesheet' type='text/css' href='../js/fullcalendar/fullcalendar.css' />
<link rel='stylesheet' type='text/css' href='../js/fullcalendar/fullcalendar.print.css' media='print' />

<script type='text/javascript' src='../js/jquery/jquery-1.7.1.min.js'></script>
<script type='text/javascript' src='../js/jquery/jquery-ui-1.8.17.custom.min.js'></script>
<script type='text/javascript' src='../js/fullcalendar/fullcalendar.min.js'></script>
<script type='text/javascript'>

$(function() {
		getEvents();
		
		$('.fc-header').live('click',function() {
			$('#details').fadeOut('fast');
		});
	
		$('#close_details').live('click',function() {
			$('#details').fadeOut();
		});
		
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
			 			'id': val.details // sneak the details in here for onclick events
			 		});
			 		
			 	}); // end each
				
				$('#calendar').fullCalendar({
					editable: true,
					events: events_arr,
					eventClick: function(calEvent, jsEvent, view) {
						details = calEvent.id;
						var x = jsEvent.pageX;
						var y = jsEvent.pageY;
						
						$('#details').fadeIn().css({
							'top':y+6,
							'left':x-3
						}).html("<h2>"+calEvent.title+"</h2><p>"+details+"</p><span class='close' id='close_details'></span>");
						
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

#details {
	word-wrap: break-word;
	position: absolute;
	z-index: 999;
	width: 170px;
	min-height: 150px;
	padding: 10px 15px;
	background: #FFED00;
-moz-box-shadow: 3px 3px 0 #000;
-webkit-box-shadow: 3px 3px 0 #000;
box-shadow: 3px 3px 0 #000;
	display: none;
}

#details h2 {
	text-shadow: none;
}

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

<div id="details"></div>

<div id="raw_events">

<?
	$raw_events = grab('events');
	echo $raw_events;
	
	getEvents();
					
?>
	
</div>

<div id='calendar'></div>
