<?

$p = '../include/header.php';
include($p);

?>

<script>

$(function() {
	$('#nav_kids').activate();
	document.title = 'Community Leisure-Learn | Saturday\'s Kids';
	$('#about').fetch('Sat Kids - About');
	$('#when').fetch('Sat Kids - When');
	$('#where').fetch('Sat Kids - Where');
	$('#cost').fetch('Sat Kids - Cost');
});

</script>

<div id="title_container">

		<img src="../images/kids_dance.png" height="150" />
		<h1 id="title">Saturday's Kids</h1>


</div> <!-- end /#title_container -->
</div> <!-- /#header -->

<div id="container">

<div class="breadcrumb">
	<a href="kids_programs.php">Kids</a> &raquo; Saturday's Kids
</div>

	<div class="text">
		<div class="bubble"><h2>About</h2></div>	
		<div id="about"></div>
	</div>
	
	<div class="text">
		<div class="bubble"><h2>When</h2></div>	
		<div id="when"></div>
	</div>
	
	<div class="text">
		<div class="bubble"><h2>Where</h2></div>	
		<div id="where"></div>
	</div>

	<div class="text">
		<div class="bubble"><h2>Cost</h2></div>	
		<div id="cost"></div>
	</div>
	

<?

include('../include/footer.php');

?>