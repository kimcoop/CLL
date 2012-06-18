var events = new Array();

$(function() {
		getEvents();
});

function getEvents() {

	var calEvents = new Array();
	var eventsGroup = Parse.Collection.extend({
		model: 'event'
	});
	
	var collection = new eventsGroup;
	collection.fetch({
		success: function(collection) {
			collection.each(function(object) { // iterate
			
				calEvents.push({
					title: object.get("name"),
					start: object.get("start"),
					end: object.get("end"),
					id : object.id					
				});
				
				events[object.id] = object;
				
			}); //each
			
			renderCal(calEvents);
			
		},
		error: function(collection, error) {
				alert('The collection could not be retrieved. ' + error);
			}
		});
}; // getEvents

function renderCal(calEvents) {		
				
	$('#calendar').fullCalendar({
		editable: true,
		events: calEvents,
		eventClick: function(calEvent, jsEvent, view) {
			display(calEvent.id);
		} // eventClick
	}); // fullCal
	
}; // renderCal


function display(eventId) {

	var event = events[eventId];
	var el = $('#displayEvent');
	var title = event.get('title');
	$('#displayEventTitle').text(title);
	
	var start = event.get('start') + ' at ' + event.get('startTime');
	var end = event.get('end') + ' at ' + event.get('endTime');
	$('#displayEventDate').text(start + ' - ' + end);
	$('#displayEventDetails').text(event.get('details'));
	el.dialog({ 
		buttons: { "Ok": function() { $(this).dialog("close"); }},
		modal: false,
		zIndex: 999999999999,
	 	title: 'Event Details',
	 	maxWidth: 400,
	 	minWidth: 400,
	 	width: 400
	 });

};// displayEvent

