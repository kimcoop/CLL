$.fn.fetch = function(pageName) {
		var el = $(this);
		var str = '';
		var pageToFetch = Parse.Object.extend("page");
		var query = new Parse.Query(pageToFetch);
		
		query.equalTo("name", pageName);
		query.find({
			success: function(result) {
				str = result[0].get("content");
				el.html(str);
			},
			error: function(error) {
				console.log("Error: " + error.code + " " + error.message);
			}
		});
}; // $.fetch

function getEvents() {
	var eventsGroup = Parse.Collection.extend({
		model: 'event'
	});
	
	var page_list = $('#page_list');
	var collection = new pagesGroup;
	collection.fetch({
		success: function(collection) {
			collection.each(function(object) {
				page_list.append('<li class="page_link"><a href="#">'+ object.get("name") +'</a></li>&nbsp;');
			});
		},
		error: function(collection, error) {
			alert('The collection could not be retrieved. ' + error);
		}
	});
	
};