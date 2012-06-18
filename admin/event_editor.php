<style>
.event {
	margin: 5px 10px;
}

#event_table {
	margin: 10px auto;
	width: 100%;
}

#event_table td, #event_table th {
	text-align: center;
	min-width: 90px;
	max-width: 200px;
	word-wrap: break-word;
	min-height: 2em;
	padding: .4em 0;
}

#event_table thead {
	background: #bbb;
}

#event_table tr:nth-child(even) {
	background: #efefef;
}

#event_table .actions {
	width: 280px;
	margin:0px auto;
}

.actions div {
	display: inline;
	margin: 0 6px;
}

#edit_event, #new_event {
	display: none;
	width: 250px;
}

#edit_event_table td, #edit_event_table th {
	text-align: left;
	margin: 5px 0;
	font-family: 'Helvetica Neue';
	z-index: 9999;
}

#edit_event_table td, #edit_event_table input, #edit_event_table textarea {
	width: 250px;
	margin: .5em 0;
	font-family: 'Helvetica Neue';
}

.date {
	width: 140px;
}

.small {
	width: 20px;
}

.ui-dialog .ui-dialog-titlebar {
	font-family: 'Helvetica Neue';
}


</style>
<script type="text/javascript">

var events = new Array();

$(function() {
	  
  $('#new_event_button').click(function() {
  
	$('#edit_event').dialog({ 
		modal: false,
		zIndex: 999,
		width: 400,
		buttons: { 
			"Create": function() { $(this).dialog("close"); createEvent(); },
			"Cancel": function() { $(this).dialog("close"); }
		},
		title: "Event Creation"
	 });	
		 
	$('.justDate').datepicker();
  	
  }); // new_event click

	$('.date').datetimepicker({
		ampm: true
	});
	
	$('.delete').live('click', function() {
		var id = $(this).attr('id').split('_').pop();
		var t = confirm('Delete this event?');
		if (t) {
			var deleteStr = 'event/'+id;
			$.parse.delete(deleteStr, function() {
					message('Event deleted.');
					getEvents(true);
				}); // fail handler unspecified
		}
	
	}); // delete click
	
	getEvents();
		
	$('.editEvent').live('click', function() {
		var eventId = $(this).attr('id').split('_').pop();
		var event = events[eventId];
		editEvent(event);
	});// editEvent click
	
});

function editEvent(event) {

	var el = $('#edit_event');
	$('#edit_title').attr('value', event.get('name'));
	$('#edit_start').attr('value', event.get('start'));
	$('#edit_start_time').attr('value', event.get('startTime'));
	$('#edit_end_time').attr('value', event.get('endTime'));		
	$('#edit_end').attr('value', event.get('end'));
	$('#edit_details').attr('value', event.get('details'));
	
	$('.justDate').datepicker();
	
	el.dialog({ 
		modal: false,
		zIndex: 999,
		width: 400,
		buttons: { 
			"Save": function() { $(this).dialog("close"); updateEvent(eventId, event); },
			"Cancel": function() { $(this).dialog("close"); }
		},
		title: "Editing Event"
	 });
	
}; // editEvent

function createEvent() {

	var Event = Parse.Object.extend("event");
	var event = new Event();
	
	event.set("name", $('#edit_title').attr('value'));
	event.set("start", $('#edit_start').attr('value'));
	event.set("startTime", $('#edit_start_time').attr('value'));
	event.set('end', $('#edit_end').attr('value'));
	event.set('endTime', $('#edit_end_time').attr('value'));
	event.set('details', $('#edit_details').attr('value'));

	event.save(null, {
	  success: function(eventObj) {
		
		message('Event created!');
		getEvents(true);
		events[eventObj.id] = eventObj;
		clear();
		
	  },
	  error: function(eventObj, error) {
		
		message('Error with event creation.');
		console.log(error);
		
	  }
	});

}; // createEvent

function updateEvent(eventId, event) {

	event.set('name', $('#edit_title').attr('value'));
	event.set('start', $('#edit_start').attr('value'));
	event.set('startTime', $('#edit_start_time').attr('value'));
	event.set('end', $('#edit_end').attr('value'));
	event.set('endTime', $('#edit_end_time').attr('value'));
	event.set('details', $('#edit_details').attr('value'));
	event.save(null, {
	  success: function(eventObj) {
		events[eventId] = eventObj;
		message('Event updated.');
		getEvents(true);
		clear();
	  },
	  error: function(eventObj, error) {
	  	message('Error updating event.');
		console.log(error);
	  }
	});

}; //updateEvent

function getEvents(animate) {

	var el = $('#event_list');
	var eventsGroup = Parse.Collection.extend({
		model: 'event'
	});
	
	var collection = new eventsGroup;
	var str = '';
	collection.fetch({
		success: function(collection) {
			collection.each(function(object) { // iterate
				events[object.id] = object; //track
				var start = $.datepicker.formatDate('m/dd/y', new Date(object.get('start')));	
				var end = $.datepicker.formatDate('m/dd/y', new Date(object.get('start')));
				var startTime = object.get('startTime');
				var endTime = object.get('endTime');
				var starting = start + ' at ' + startTime;
				var ending = end + ' at ' +endTime;
				var details = object.get('details');
				if (details == null) details = '(None)';
				str +=
					"<tr id='"+object.id+"'>" +
							 "<td class='name'>"+object.get("name")+"</td>" +
							 "<td class='start'>"+starting+"</td>" +
							 "<td class='end'>"+ending+"</td>" +
							 "<td class='details'>"+details+"</td>" +
							 "<td class='actions'><div class='delete submit' id='deleteEvent_"+object.id+"'>Delete</div>"+
							 "<div class='editEvent submit' id='editEvent_"+object.id+"'>Edit</div></td>" +
					"</tr>";
			})// each
			
			if (!animate) el.html(str);
			else {
				el.fadeOut().html(str).fadeIn();
			}	
	
			$('.date').datetimepicker({
				ampm: true
			}); // reset so it works
			
		},
		error: function(collection, error) {
				alert('The collection could not be retrieved. ' + error);
			}
		});

}; // getEvents

function clear() {
	
	$('#edit_title').attr('value', '');
	$('#edit_start').attr('value', '');
	$('#edit_start_time').attr('value', '');
	$('#edit_end_time').attr('value', '');		
	$('#edit_end').attr('value', '');
	$('#edit_details').attr('value', '');

}; // clear

</script>

<div id="edit_event">
	<table id="edit_event_table">
		<tr><th>Title</th>
			<td><input id="edit_title" type="text" /></td></tr>
		<tr><th>Start</th>
			<td><input id="edit_start" type="text" class="justDate" /></td></tr>
		<tr><th>Start Time</th>
			<td><input id="edit_start_time" type="text"/></td></tr>
		<tr><th>End</th>
			<td><input id="edit_end" type="text" class="justDate" /></td></tr>
		<tr><th>End Time</th>
			<td><input id="edit_end_time" type="text" /></td></tr>
		<tr><th>Details</th>
			<td><textarea id="edit_details" placeholder="Additional information"></textarea></td></tr>	
	</table>	
</div>

<table id="event_table">
	<thead>
		<th>Title</th>
		<th>Start</th>
		<th>End</th>
		<th>Details</th>
		<th>Actions</th>
	</thead>
	
	<tbody id="event_list">	
	</tbody>
	
	</table>
	
	<a class='submit' id='new_event_button'>New Event</a>
