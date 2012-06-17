<?

include('../include/header.php');

?>

<script>

$(function() {
	$('#nav_home').activate();
	$('#sat_kids').fetch('Sat Kids');
	$('#paws').fetch('PAWS');
	$('#pack').fetch('PACK');
	$('#pf').fetch('Parent Fitness');
	$('#gp').fetch('Guest Pass');
});

</script>

<style>
.img_container {
	width: 600px;
	margin: 10px auto;
}

.img_container img {
	border: 2px solid #ccc;
	float: left;
	margin: 10px;
}

</style>

<div id="title_container">

		<img src="../images/programs_img.png" height="150" />
		<h1 id="title">All Programs</h1>

</div> <!-- end /#title_container -->
</div> <!-- /#header -->

<div id="container">

<div class="breadcrumb">
	About &raquo; All Programs
</div>

	<div class="text">

		<div class="bubble linked">
			<a href="kids_programs.php"><h2>Youth</h2></a>
		</div>
		
			<h3><a href="saturdays_kids.php">Saturday's Kids</a><div class="go">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div></h3>
			<div id="sat_kids"></div>
	
			<h3><a href="paws.php">PAWS</a><div class="go">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div></h3>
			<div id="paws"></div>
			
			<h3><a href="pack.php">PACK</a><div class="go">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div></h3>	
			<div id="pack"></div>
			
			<div class="img_container">
				<img src="../images/kids1.png" width="250"/>
				<img src="../images/kids9.png" width="250"/>
			</div>
			
	</div>
	
	<div class="text">
	
		<div class="bubble linked">
			<a href="adults_programs.php"><h2>Adult</h2></a>
		</div>
			
			<h3><a href="parent_fitness.php">Parent Fitness 101</a><div class="go">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div></h3>
			<div id="pf"></div>
			
			<h3><a href="guest_pass.php">Guest Pass</a><div class="go">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div></h3>
			<div id="gp"></div>
	</div>

<?

include('../include/footer.php');

?>