<?

include('../include/header.php');

?>

<script>

$(function() {
	$('#nav_kids').activate();
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
		<p><?= grab('paws'); ?></p>
		</div>
	
	<div class="text">
		<div class="bubble"><h2>When</h2></div>
		<p><?= grab('paws_when'); ?></p>
	</div>
	
	<div class="text">
		<div class="bubble"><h2>Where</h2></div>
		<p><?= grab('paws_where'); ?></p>
	</div>
	
	<div class="text">
		<div class="bubble"><h2>Cost</h2></div>
		<p><?= grab('paws_cost'); ?></p>
	</div>

</div>

<?

include('../include/footer.php');

?>