<style>
.event {
	margin: 5px 10px;
}

#event_table {
	margin: 0px auto;
	margin-bottom: 10px;
	margin-left: 0;
	width: 100%;
}

#event_table td, #event_table th {
	text-align: center;
	min-width: 90px;
	max-width: 200px;
	word-wrap: break-word;
	min-height: 2em;
}

#event_table .actions {
	width: 280px;
	margin:0px auto;
}

.actions div {
	display: inline;
	margin: 0 6px;
}

.success {
	color: #005F3B;
}

#edit_event, #new_event {
	display: none;
	width: 250px;
}

#edit_event_table td, #edit_event_table th {
	text-align: left;
	margin: 5px 0;
	font-family: 'helvetica neue';
	font-weight: 'light'
}

#edit_event_table td, #edit_event_table input, #edit_event_table textarea {
	width: 250px;
	margin: .4em 0 .4em .1em;
}

.date {
	width: 140px;
}

.small {
	width: 20px;
}


</style>
<script type="text/javascript">

var events = new Array();

$(function() {
	  
  $('#new_event').click(function() {
  
  	var table = $("#event_table");
  	var el = "<tr class='event_row'>";
  	el += "<td class='name'><input type='text' placeholder='Event title'/></td>";
  	el += "<td class='start'><input class='date' type='text' placeholder='Event start'/></td>";
  	el += "<td class='end'><input class='date' type='text' placeholder='Event end'/></td>";
  	el += "<td class='details'><textarea placeholder='Event details'></textarea></td>" +
						 "<td class='actions'><div class='create_event submit'>Create Event</div></td></tr>";
  	table.append(el);

	$('.date').datetimepicker({
		ampm: true
	}); // reset so it works
  	
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
		
		var el = $('#edit_event');
		$('#edit_title').attr('value', event.get('name'));
		$('#edit_start').attr('value', event.get('start'));
		$('#edit_start_time').attr('value', event.get('startTime'));
		$('#edit_end_time').attr('value', event.get('endTime'));		
		$('#edit_end').attr('value', event.get('end'));
		$('#edit_details').attr('value', event.get('details'));
		
		el.dialog({ 
			modal: false,
			zIndex: 999999999999,
			width: 400,
			buttons: { 
				"Save": function() { $(this).dialog("close"); updateEvent(eventId, event); },
				"Cancel": function() { $(this).dialog("close"); }
			},
			title: "Editing Event"
		 });			
	}); // update
	
});

function updateEvent(eventId, event) {

	event.set('name', $('#edit_title').attr('value'));
	event.set('start', $('#edit_start').attr('value'));
	event.set('startTime', $('#edit_start_time').attr('value'));
	event.set('end', $('#edit_end').attr('value'));
	event.set('endTime', $('#edit_end_time').attr('value'));
	event.set('details', $('#edit_details').attr('value'));
	event.save(null, {
	  success: function(eventObj) {
		getEvents();
		if (eventId) {
			events[eventId] = eventObj;
			message('Event updated.');
		} else {
			events[eventObj.id] = eventObj; // new creation
			message('Event created');
		}
		getEvents(true);
	  },
	  error: function(eventObj, error) {
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
				str +=
					"<tr id='"+object.id+"'>" +
							 "<td class='name'>"+object.get("name")+"</td>" +
							 "<td class='start'>"+starting+"</td>" +
							 "<td class='end'>"+ending+"</td>" +
							 "<td class='details'>"+object.get("details")+"</td>" +
							 "<td class='actions'><div class='delete submit' id='deleteEvent_"+object.id+"'>Delete</div>"+
							 "<div class='editEvent submit' id='editEvent_"+object.id+"'>Edit</div>" +
							 "<div class='success' style='opacity:0'>Updated.</div>" +
							 "</td>" +
					"</tr>";
			})// each
			
			if (!animate) el.html(str);
			else {
				el.fadeOut().html(str).fadeIn();
			}
			
			if (str == '') {
				el.text('No events at this time.');
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

</script>

<div id="edit_event">
	<table id="edit_event_table">
		<tr><th>Title</th>
			<td><input id="edit_title" type="text" /></td></tr>
		<tr><th>Start</th>
			<td><input id="edit_start" type="text" /></td></tr>
		<tr><th>Start Time</th>
			<td><input id="edit_start_time" type="text"/></td></tr>
		<tr><th>End</th>
			<td><input id="edit_end" type="text"/></td></tr>
		<tr><th>End Time</th>
			<td><input id="edit_end_time" type="text" /></td></tr>
		<tr><th>Details</th>
			<td><textarea id="edit_details" type="text"></textarea></td></tr>	
	</table>	
</div>

<div id="new_event">
	<table>
		<tr><th>Title</th>
			<td><input id=new_title" type="text" /></td></tr>
		<tr><th>Start</th>
			<td><input id="new_start" type="text" class="date" /></td></tr>
		<tr><th>End</th>
			<td><input id="new_end" type="text" class="date"/></td></tr>
		<tr><th>Start</th>
			<td><textarea id="new_details" type="text"></textarea></td></tr>	
	</table>	
</div>

<table id="event_table">
	<thead>
		<th>Title</th>
		<th>Start</th>
		<th>End</th>
		<th>Details</th>
		<th class="small"></th>
	</thead>
	
	<tbody id="event_list">	
	</tbody>
	
	</table>
	
	<a class='submit' id='new_event'>New Event</a>
