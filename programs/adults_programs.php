<?

include('../include/header.php');


?>

<script>

$(function() {
	$('#nav_adults').activate();
});

</script>

<div id="container">

<div id="title_container">

		<img src="../images/adults.png" height="150" />
		<h1 id="title">Programs for Adults</h1>

</div>

<div class="breadcrumb">
	<a href="adults_programs.php">Adults</a> &raquo; Programs for Adults
</div>

	<div class="text">
		<h3><a href="parent_fitness.php">Parent Fitness 101</a></h3>
		<?= $parent_fitness_about; ?>
	</div>	
	<div class="text">
		<h3><a href="guest_pass.php">Guest Pass</a></h3>
		<?= $guest_pass_about; ?>
	</div>

</div>

<?

include('../include/footer.php');

?>