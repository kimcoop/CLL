<?

	include('config.php');

?>

<!DOCTYPE html>
<html>
<head>

<title>Community Leisure-Learn | Home</title>

<link type="text/css" rel="stylesheet" href="../style/base.css"/>
<link type="text/css" rel="stylesheet" href="../style/nav.css"/>
<link type="text/css" rel="stylesheet" href="../style/inside.css"/>
<link href='http://fonts.googleapis.com/css?family=Permanent+Marker|Rock+Salt' rel='stylesheet' type='text/css'>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript" src="../jquery.min.js"></script>

<script type="text/javascript">

$(function() {

	$('#nav_home').click(function() {
		window.location = '../index.php';
	});

	$('#nav_kids').click(function() {
		window.location = 'kids_programs.php';	
	});
	
	$('#nav_adults').click(function() {
		window.location = 'adults_programs.php';
	});
	
	$('#nav_community').click(function() {
		window.location = 'community_programs.php';
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
	
	//$('.link').css('top', '+=170px');

});

$.fn.active_hover = function() {
	$(this).addClass('hover_link');	
	$(this).siblings('.link').removeClass('hover_link');
};

$.fn.activate = function() {
	$('.link h2').removeClass('active');
	$(this).children('h2').addClass('active');
};

</script>


</head>
<body>

<div id="header">

<div id="pitt_links" class="small_text">
	<a href="http://www.pitt.edu" id="pitt_home">Pitt Home</a>&nbsp;|&nbsp;
	<a href="http://find.pitt.edu/" id="find_people">Find People</a>	
</div>

<a href="<? echo SITE_ROOT ?>"/>
	<img id="logo" src="../images/logo.png"/>
</a>

<div class="clearfix"></div>

<div id="nav">

	<div class="link" id="nav_home">
		<h2>About</h2>
		<div class="menu">
				<ul>
					<li>
						<a href="../programs/all.php">Our Programs</a><br>
						See what's available				
					</li>
					<li>
						<a href="../about/events.php">Events</a><br>
						Calendar & upcoming
					</li>
					<li>
						<a href="../about/location.php">Location</a><br>
						Trees Hall info
					</li>
					<li>
						<a href="../about/contact.php">Contact</a><br>
						Get in touch with us
					</li>
				</ul>	
		</div>
	</div> <!-- /#nav_home -->
	
	<div class="link" id="nav_kids">
		<h2>Kids</h2>
		<div id="nav_kids_menu" class="menu">
			<ul>
				<li>
					<a href="../programs/pack.php">PACK</a><br>
					Summer, grades 5 - 8					
				</li>
				<li>
					<a href="../programs/saturdays_kids.php">Saturday's Kids</a><br>
					Fall & Spring, grades pre-K - 8
				</li>
				<li>
					<a href="../programs/paws.php">PAWS</a><br>
					Spring, grades 5 - 8
				</li>
			</ul>
		
		</div>	
	</div> <!-- /#nav_kids -->
	
	<div class="link" id="nav_adults">
		<h2>Adults</h2>
		<div id="nav_adults_menu" class="menu">
			<ul>
				<li>
					<a href="../programs/parent_fitness.php">Parent Fitness</a><br>
					Fall & Spring					
				</li>
				<li>
					<a href="../programs/guest_pass.php">Guest Pass</a><br>
					Ongoing, age 18+
				</li>
			</ul>
		</div>		
	</div> <!-- /#nav_adults -->
	
	<div class="link" id="nav_community">
		<h2>Community</h2>
		<div id="nav_comm_menu" class="menu">
			<ul>
				<li>
					<a href="../programs/parent_fitness.php">Stuff 1</a><br>
					aaa					
				</li>
				<li>
					<a href="../programs/guest_pass.php">Stuff 2</a><br>
					aaa
				</li>
			</ul>
		</div>	
	</div> <!-- /#nav_community -->
</div> <!-- /#nav 
	
<img src="../images/header_underline.png" id="header_underline"/>-->

</div>









