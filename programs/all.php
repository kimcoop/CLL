<?

include('../include/header.php');

?>

<script>

$(function() {
	$('#nav_home').activate();
});

</script>

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
		
			<h3><a href="saturdays_kids.php">Saturday's Kids&nbsp;<div class="go">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div></a></h3>
			<p><?= $saturdays_kids_about; ?></p>
	
			<h3><a href="paws.php">PAWS&nbsp;<div class="go">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div></a></h3>
			<p><?= $paws_about; ?></p>
			
			<h3><a href="pack.php">PACK&nbsp;<div class="go">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div></a></h3>	
			<p><?= $pack_about; ?></p>
			
	</div>
	
	<div class="text">
	
		<div class="bubble linked">
			<a href="adults_programs.php"><h2>Adult</h2></a>
		</div>
			
			<h3><a href="parent_fitness.php">Parent Fitness 101&nbsp;<div class="go">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div></a></h3>
			<p><?= $parent_fitness_about; ?></p>
			
			<h3><a href="guest_pass.php">Guest Pass&nbsp;<div class="go">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div></a></h3>
			<p><?= $guest_pass_about; ?></p>
	</div>

	<div class="text">
		
			<div class="bubble linked">
				<a href="community_programs.php"><h2 class="small">Community Events&nbsp;</h2></a>
			</div>
			
			<h3>asdf</h3>
			<p>adsf</p>
			
			<h3>asdf</h3>
			<p>asdf</p>
			
	</div>


</div>

<?

include('../include/footer.php');

?>