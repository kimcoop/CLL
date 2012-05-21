<?

include('../include/header.php');


?>

<script>

$(function() {
	$('#nav_adults').activate();
});

</script>

<div id="title_container">

		<img src="../images/adults.png" height="150" />
		<h1 id="title">Programs for Adults</h1>

</div> <!-- end /#title_container -->
</div> <!-- /#header -->

<div id="container">

<div class="breadcrumb">
	<a href="adults_programs.php">Adults</a> &raquo; Programs for Adults
</div>

	<div class="text">
		<h3><a href="parent_fitness.php">Parent Fitness 101<div class="go">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div></a></h3>
		<p><?= grab('parent_fitness_about'); ?></p>
	</div>	
	<div class="text">
		<h3><a href="guest_pass.php">Guest Pass<div class="go">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div></a></h3>
		<p><?= grab('guest_pass_about'); ?></p>
	</div>

</div>

<?

include('../include/footer.php');

?>