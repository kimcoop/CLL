<?

include('../include/header.php');

?>

<script>

$(function() {
	$('#nav_kids').activate();
	$('#about').fetch('PAWS - About');
	$('#when').fetch('PAWS - When');
	$('#where').fetch('PAWS - Where');
	$('#cost').fetch('PAWS - Cost');
});

</script>

<div id="title_container">

		<img src="../images/kids_sports.png" height="150" />
		<h1 id="title">PAWS</h1>

</div> <!-- end /#title_container -->
</div> <!-- /#header -->

<div id="container">

<div class="breadcrumb">
	<a href="kids_programs.php">Kids</a> &raquo; PAWS
</div>

	<div class="text">
		<div class="bubble"><h2>About</h2></div>
		<div id="about" class="with_img"></div>
		<img src="../images/kids11.png" width="250" class="kids_img"/>
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