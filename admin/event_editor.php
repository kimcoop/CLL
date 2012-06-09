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
	min-width: 250px;
	width: 250px;
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

	//get events
	// put them in event_list
	
	var list = $('#event_list');
	var eventsGroup = Parse.Collection.extend({
		model: 'event'
	});
	
	var collection = new eventsGroup;
	collection.fetch({
		success: function(collection) {
			collection.each(function(object) { // iterate
				
				list.append(
				
					"<tr>" +
							 "<td>"+object.get("name")+"</td>" +
							 "<td>"+object.get("start")+"</td>" +
							 "<td>"+object.get("end")+"</td>" +
							 "<td>"+object.get("details")+"</td>" +
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
