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


Parse.initialize("Ji2ce107tebyCJEC31gGvyvZ24YsBVV2m1ES0VHz", "MICUaupejbUuLurojUgkZpyFGQWjLDrtJZAzcqxz");

$(function() {

	var home = 'http://www.cll.pitt.edu/draft';

	$('#nav_home').click(function() {
		window.location = home +='/index.php';
	});

	$('#nav_kids').click(function() {
		window.location = home +='/programs/kids_programs.php';	
	});
	
	$('#nav_adults').click(function() {
		window.location = home +='/programs/adults_programs.php';
	});
	
	$('#nav_community').click(function() {
		window.location = home +='/programs/community_programs.php';
	});

	$('.link').mouseover(function() {
		el = $(this);
		el.siblings('.link').removeClass('hover_link');
		el.active_hover();
		el.children('.menu').show();
	}).mouseout(function() {
		el = $(this);
		el.removeClass('hover_link');
		el.children('.menu').hide();
	});
	
	$('.menu').hover(function() {
		el = $(this);
		el.show();
		parent = el.parent('.link');
		parent.active_hover();
	});

});

$.fn.active_hover = function() {
	$(this).addClass('hover_link');	
	$(this).siblings('.link').removeClass('hover_link');
};

$.fn.activate = function() {
	$('.link h2').removeClass('active');
	$(this).children('h2').addClass('active');
};