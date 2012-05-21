<?

include('../include/header.php');

?>

<script>

$(function() {
	$('#nav_kids').activate();
});

</script>

<div id="title_container">

		<img src="../images/kids_pool.png" height="150" />
		<h1 id="title">PACK</h1>


</div> <!-- end /#title_container -->
</div> <!-- /#header -->

<div id="container">

<div class="breadcrumb">
	<a href="kids_programs.php">Kids</a> &raquo; PACK
</div>

	<div class="text">
		<div class="bubble"><h2>About</h2></div>
		<?= grab('pack'); ?>
	</div>

	<div class="text">
		<div class="bubble"><h2>When</h2></div>
		<?= grab('pack_when'); ?>
	</div>
	
	<div class="text">
		<div class="bubble"><h2>Cost</h2></div>
		<?= grab('pack_cost'); ?>
	</div>
	
	<div class="text">
		<div class="bubble"><h2>Apply</h2></div>
		
		<p><a href="">Application</a></p>
		<p><a href="">Physical Exam Form (required)</a></p>
		
	</div>



<?

include('../include/footer.php');

?>