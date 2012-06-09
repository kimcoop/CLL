<?

include('../include/header.php');

?>

<script>

$(function() {
	$('#nav_adults').activate();
	$('#about').fetch('Guest Pass - About');
	$('#when').fetch('Guest Pass - When');
});

</script>

<div id="title_container">

		<img src="../images/dumbbells.png" height="150" />
		<h1 id="title">Guest Pass</h1>


</div> <!-- end /#title_container -->
</div> <!-- /#header -->

<div id="container">

<div class="breadcrumb">
	<a href="adults_programs.php">Adults</a> &raquo; Guest Pass
</div>

	<div class="text">
		<div class="bubble"><h2>About</h2></div>
		<div id="about"></div>
	</div>
	
	<div class="text">
		<div class="bubble"><h2>When</h2></div>
		<div id="when"></div>
	</div>



<?

include('../include/footer.php');

?>