<?

include('../include/header.php');

?>

<script type="text/javascript">
$(function() {
	$('#contact').fetch('Contact');
});
</script>

<div id="title_container">

		<img src="../images/contact.png" height="150" />
		<h1 id="title">Contact</h1>

</div> <!-- end /#title_container -->
</div> <!-- /#header -->

<div id="container">

	<div class="breadcrumb">
		About &raquo; Contact
	</div>

	<div id="contact" class="text"></div>

<?

include('../include/footer.php');

?>