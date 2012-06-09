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
};

function fetch(pageName) {
	
		var str = '';
		var pageToFetch = Parse.Object.extend("page");
		var query = new Parse.Query(pageToFetch);
		
		query.equalTo("name", pageName);
		query.find({
			success: function(result) {
				str = result[0].get("content");
				alert(str);
				return str;
			},
			error: function(error) {
				console.log("Error: " + error.code + " " + error.message);
				str = 'Error';
				return str;
			}
		});
	
	};