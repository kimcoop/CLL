
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

<a href="<?= $GLOBALS['root'] ?>"/>
	<img id="logo" src="<?= $GLOBALS['root'] ?>/images/logo.png"/>
</a>

<div class="clearfix"></div>

<div id="nav">

	<div class="link" id="nav_home">
		<h2>About</h2>
		<div class="menu">
				<ul>
					<li>
						<a href="<?= $GLOBALS['root'] ?>/programs/all.php">Our Programs</a><br>
						See what's available				
					</li>
					<li>
						<a href="<?= $GLOBALS['root'] ?>/about/events.php">Events</a><br>
						Calendar & upcoming
					</li>
					<li>
						<a href="<?= $GLOBALS['root'] ?>/about/location.php">Location</a><br>
						Trees Hall info
					</li>
					<li>
						<a href="<?= $GLOBALS['root'] ?>/about/contact.php">Contact</a><br>
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
					<a href="<?= $GLOBALS['root'] ?>/programs/pack.php">PACK</a><br>
					Summer, grades 5 - 8					
				</li>
				<li>
					<a href="<?= $GLOBALS['root'] ?>/programs/saturdays_kids.php">Saturday's Kids</a><br>
					Fall & Spring, grades pre-K - 8
				</li>
				<li>
					<a href=<?= $GLOBALS['root'] ?>./programs/paws.php">PAWS</a><br>
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
					<a href="<?= $GLOBALS['root'] ?>/programs/parent_fitness.php">Parent Fitness</a><br>
					Fall & Spring					
				</li>
				<li>
					<a href="<?= $GLOBALS['root'] ?>/programs/guest_pass.php">Guest Pass</a><br>
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
					<a href="<?= $GLOBALS['root'] ?>/programs/parent_fitness.php">Stuff 1</a><br>
					aaa					
				</li>
				<li>
					<a href="<?= $GLOBALS['root'] ?>/programs/guest_pass.php">Stuff 2</a><br>
					aaa
				</li>
			</ul>
		</div>	
	</div> <!-- /#nav_community -->
</div> <!-- /#nav -->