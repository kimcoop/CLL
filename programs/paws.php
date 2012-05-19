<?

include('../include/header.php');

?>

<script>

$(function() {
	$('#nav_kids').activate();
});

</script>

<div id="container">

<div id="title_container">

		<img src="../images/kids_sports.png" height="150" />
		<h1 id="title">PAWS</h1>

</div>

<div class="breadcrumb">
	<a href="kids_programs.php">Kids</a> &raquo; PAWS
</div>

	<div class="text">
		<div class="bubble"><h2>About</h2></div>
		<?= $paws; ?>	
		</div>
	
	<div class="text">
		<div class="bubble"><h2>When</h2></div>
		<?= $paws_when; ?>
	</div>
	
	<div class="text">
		<div class="bubble"><h2>Where</h2></div>
		<?= $paws_where; ?>
	</div>
	
	<div class="text">
		<div class="bubble"><h2>Cost</h2></div>
		<?= $paws_cost; ?>
	</div>

</div>

<?

include('../include/footer.php');

?>