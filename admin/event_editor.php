<style>
.event {
	margin: 5px 10px;
}

#event_table {
	margin: 0px auto;
	margin-bottom: 10px;
	margin-left: 0;
}

#event_table td, #event_table th {
	text-align: center;
	min-width: 200px;
	width: 200px;
	height: 2em;
}

#event_table td input {
	width: 200px;
	max-width: 200px;
	word-wrap: break-word;
	height: 2em;
}

#event_able .actions {
	width: 280px;
}

.actions div {
	display: inline;
	margin: 0 6px;
}

.success {
	color: #005F3B;
}

textarea {
	width: 200px;
	max-width: 200px;
	word-wrap: break-word;
}

.date {
	width: 140px;
}

.small {
	width: 20px;
}


</style>
<script type="text/javascript">

$(function() {
	  
  $('#new_event').click(function() {
  
  	var table = $("#event_table");
  	var el = "<tr class='event_row'>";
  	el += "<td class='name'><input type='text' placeholder='Event title'/></td>";
  	el += "<td class='start'><input class='date' type='text' placeholder='Event start'/></td>";
  	el += "<td class='end'><input class='date' type='text' placeholder='Event end'/></td>";
  	el += "<td class='details'><textarea placeholder='Event details'></textarea></td>" +
						 "<td class='actions'><div class='create_event submit'>Create Event</div>" +
						 "<div class='success' style='opacity:0'>Created.</div>" +
						 "</td></tr>";
  	table.append(el);

	$('.date').datetimepicker({
		ampm: true
	}); // reset so it works
  	
  }); // new_event click

	$('.date').datetimepicker({
		ampm: true
	});
	
	$('.delete').live('click', function() {
		var id = $(this).parent().parent('tr').attr('id');
		var t = confirm('Delete this event?');
		if (t) {
			var deleteStr = 'event/'+id;
			alert(deleteStr);
			$.parse.delete(deleteStr, function() {
				alert('Event deleted.');
				el.fadeOut('slow', function() {
					el.detach();
				}); // fail handler unspecified
			});
		}
	
	}); // delete click
	
	var list = $('#event_list');
	var eventsGroup = Parse.Collection.extend({
		model: 'event'
	});
	
	var collection = new eventsGroup;
	collection.fetch({
		success: function(collection) {
			collection.each(function(object) { // iterate
			
				list.append(
					"<tr id='"+object.id+"'>" +
							 "<td class='name'><input type='text' value='"+object.get("name")+"'/></td>" +
							 "<td class='start'><input class='date' type='text' value='"+object.get("start")+"'/></td>" +
							 "<td class='end'><input class='date' type='text' value='"+object.get("end")+"'/></td>" +
							 "<td class='details'><textarea>"+object.get("details")+"</textarea></td>" +
							 "<td class='actions'><div class='delete submit'>Delete</div>"+
							 "<div class='update submit'>Save</div>" +
							 "<div class='success' style='opacity:0'>Updated.</div>" +
							 "</td>" +
					"</tr>"
				);				
				
			})// each		
	
			$('.date').datetimepicker({
				ampm: true
			}); // reset so it works
			
		},
		error: function(collection, error) {
				alert('The collection could not be retrieved. ' + error);
			}
		});
		
		
	$('.update').live('click', function() {
		var row = $(this).parent().parent('tr');
		var id = row.attr('id');
		var details = row.children('.details').children('textarea').text().trim();
		var name = row.children('.name').children('input').attr('value');
		var start = row.children('.start').children('input').attr('value');
		var end = row.children('.end').children('input').attr('value');
		$.parse.post('event/'+id, ({
			details : details,
			name: name
			}), function(json){
			row.event_notify();
		}, function() {
			console.log("Error updating event.");
		});
	
	}); // update
	
	$('.create_event').live('click', function() {
		var row = $(this).parent().parent('tr');
		var details = row.children('.details').children('textarea').text().trim();
		var name = row.children('.name').children('input').attr('value');
		var start = row.children('.start').children('input').attr('value');
		var end = row.children('.end').children('input').attr('value');
		$.parse.put('event', {
			details : details,
			}, function(json){
			row.event_notify();
		}, function() {
			console.log("Error updating event.");
		});	
	}); // create
	
});

$.fn.event_notify = function() {
	var el = $(this).children().children().last();
	el.fadeTo('slow', 1).delay(1800).fadeTo('slow', 0);
};

</script>

<table id="event_table">
	<thead>
		<th>Title</th>
		<th>Starting Time</th>
		<th>Ending Time</th>
		<th>Details</th>
		<th class="small"></th>
	</thead>
	
	<tbody id="event_list">	
	</tbody>
	
	</table>
	
	<a class='submit' id='new_event'>New Event</a>
