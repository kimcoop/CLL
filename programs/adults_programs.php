<?

include('../include/header.php');


?>

<script>

$(function() {
	$('#nav_adults').activate();
	$('#pf').fetch('Parent Fitness');
	$('#gp').fetch('Guess Pass');
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
		<h3><a href="parent_fitness.php">Parent Fitness 101</a><div class="go">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div></h3>
		<div id="pf"></div>
	</div>	
	<div class="text">
		<h3><a href="guest_pass.php">Guest Pass</a><div class="go">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div></h3>
		<div id="gp"></div>
	</div>
	

<?

include('../include/footer.php');

?>