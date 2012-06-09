<?

include('../include/header.php');

?>

<script>

$(function() {
	$('#nav_community').activate();
	$('#comm').fetch('Community Programs');
});

</script>

<div id="title_container">

		<img src="../images/comm_scene.png" height="110" />
		<br><br>
		<h1 id="title">Community Events</h1>


</div> <!-- end /#title_container -->
</div> <!-- /#header -->

<div id="container">

<div class="breadcrumb">
	<a href="community_programs.php">Community</a> &raquo; Community Events
</div>

	<div class="text">
		<h3>Community Events</h3>
		<div id="comm"></div>
	</div>


<?

include('../include/footer.php');

?>