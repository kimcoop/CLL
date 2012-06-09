<?

include('../include/header.php');

?>

<script>

$(function() {
	$('#nav_kids').activate();
	$('#sat_kids').fetch('Sat Kids');
	$('#paws').fetch('PAWS');
	$('#pack').fetch('PACK');
});

</script>

<div id="title_container">

		<img src="../images/kids_jumping.png" height="150" />
		<h1 id="title">Programs for Kids</h1>


</div> <!-- end /#title_container -->
</div> <!-- /#header -->

<div id="container">

<div class="breadcrumb">
	<a href="kids_programs.php">Kids</a> &raquo; Programs for Kids
</div>

	<div class="text">
		<h3><a href="saturdays_kids.php">Saturday's Kids</a><div class="go">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div></h3>
		<div id="sat_kids"></div>
</div>	
	
	<div class="text">
		<h3><a href="paws.php">PAWS</a><div class="go">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div></h3>
		<div id="paws"></div>
	</div>
	
	<div class="text">
		<h3><a href="pack.php">PACK</a><div class="go">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div></h3>	
		<div id="pack"></div>
	</div>



<?

include('../include/footer.php');

?>