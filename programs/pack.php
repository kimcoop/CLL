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
		<p><?= $pack; ?></p>
	</div>

	<div class="text">
		<div class="bubble"><h2>When</h2></div>
		<p><?= $pack_when; ?></p>
	</div>
	
	<div class="text">
		<div class="bubble"><h2>Cost</h2></div>
		<p><?= $pack_cost; ?></p>
	</div>
	
	<div class="text">
		<div class="bubble"><h2>Apply</h2></div>
		
		<p><a href="">Application</a></p>
		<p><a href="">Physical Exam Form (required)</a></p>
		
	</div>

</div>

<?

include('../include/footer.php');

?>