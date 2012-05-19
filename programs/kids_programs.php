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

		<img src="../images/kids_jumping.png" height="150" />
		<h1 id="title">Programs for Kids</h1>

</div>

<div class="breadcrumb">
	<a href="kids_programs.php">Kids</a> &raquo; Programs for Kids
</div>

	<div class="text">
		<h3><a href="saturdays_kids.php">Saturday's Kids</a></h3>
		<p><?= $saturdays_kids_about; ?></p>
	</div>	
	
	<div class="text">
		<h3><a href="paws.php">PAWS</a></h3>
		<p><?= $paws_about; ?></p>
	</div>
	
	<div class="text">
		<h3><a href="pack.php">PACK</a></h3>	
		<p><?= $pack_about; ?></p>
	</div>


</div>

<?

include('../include/footer.php');

?>