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
}

#event_table td input {
	width: 200px;
	max-width: 200px;
	word-wrap: break-word;
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
	  	el += "<td><input class='event' type='text' placeholder='Event title'/></td>";
	  	el += "<td><input class='event date' type='text' placeholder='Event start'/></td>";
	  	el += "<td><input class='event date' type='text' placeholder='Event end'/></td>";
	  	el += "<td><textarea class='event' type='textarea' placeholder='Event details'></textarea></td>";
	  	el += "</tr>";
	  	table.append(el);
	  	
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
							 "<td>"+object.get("name")+"</td>" +
							 "<td>"+object.get("start")+"</td>" +
							 "<td>"+object.get("end")+"</td>" +
							 "<td>"+object.get("details")+"</td>" +
							 "<td><div class='delete'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div></td>" +
					"</tr>"
				
				);				
				
			})
		},
		error: function(collection, error) {
				alert('The collection could not be retrieved. ' + error);
			}
		});
		


});

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
