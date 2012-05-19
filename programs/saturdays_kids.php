<?

$p = '../include/header.php';
include($p);

?>

<script>

$(function() {
	$('#nav_kids').activate();
	document.title = 'Community Leisure-Learn | Saturday\'s Kids';
});

</script>

<div id="container">
<div id="title_container">

		<img src="../images/kids_dance.png" height="150" />
		<h1 id="title">Saturday's Kids</h1>

</div>

<div class="breadcrumb">
	<a href="kids_programs.php">Kids</a> &raquo; Saturday's Kids
</div>

	<div class="text">
		<div class="bubble"><h2>About</h2></div>	
		<?= $saturdays_kids; ?>
	</div>
	
	<div class="text">
		<div class="bubble"><h2>When</h2></div>	
		<?= $saturdays_kids_when; ?>
	</div>
	
	<div class="text">
		<div class="bubble"><h2>Where</h2></div>	
		<?= $saturdays_kids_where; ?>
	</div>

	<div class="text">
		<div class="bubble"><h2>Cost</h2></div>	
		<?= $saturdays_kids_cost; ?>
	</div>

</div>

<?

include('../include/footer.php');

?>