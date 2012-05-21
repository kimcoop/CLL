<?

include('../include/header.php');

?>

<script>

$(function() {
	$('#nav_adults').activate();
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
		<?= grab('guest_pass_about'); ?>
	</div>
	
	<div class="text">
		<div class="bubble"><h2>When</h2></div>
		<?= grab('guest_pass_when'); ?>
	</div>



<?

include('../include/footer.php');

?>