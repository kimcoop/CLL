<?

include('../include/header.php');

?>

<script>

$(function() {
	$('#nav_home').activate();
});

</script>

<div id="container">

<div id="title_container">

		<img src="../images/programs_img.png" height="150" />
		<h1 id="title">All Programs</h1>

</div>

<div class="breadcrumb">
	About &raquo; All Programs
</div>

	<div class="text">

		<div class="bubble linked">
			<a href="kids_programs.php"><h2>Youth</h2></a>
		</div>
		
			<h3><a href="saturdays_kids.php">Saturday's Kids</a></h3>
			<?= $saturdays_kids_about; ?>
	
			<h3><a href="paws.php">PAWS</a></h3>
			<?= $paws_about; ?>
			
			<h3><a href="pack.php">PACK</a></h3>	
			<?= $pack_about; ?>
			
	</div>
	
	<div class="text">
	
		<div class="bubble linked">
			<a href="adults_programs.php"><h2>Adult</h2></a>
		</div>
			
			<h3><a href="parent_fitness.php">Parent Fitness 101</a></h3>
			<?= $parent_fitness_about; ?>
			
			<h3><a href="guest_pass.php">Guest Pass</a></h3>
			<?= $guest_pass_about; ?>			
	</div>

	<div class="text">
		
			<div class="bubble linked">
				<a href="community_programs.php"><h2 class="small">Community</h2></a>
			</div>
			
			<h3>asdf</h3>
			
			<h3>asdf</h3>
			
	</div>


</div>

<?

include('../include/footer.php');

?>