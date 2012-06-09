<?

	include('config.php');

?>

<!DOCTYPE html>
<html>
<head>

<title>Community Leisure-Learn | Home</title>

<link type="text/css" rel="stylesheet" href="style/base.css"/>
<link type="text/css" rel="stylesheet" href="style/nav.css"/>
<link type="text/css" rel="stylesheet" href="style/home_nav.css"/>
<link rel="icon" type="image/png" href="https://my.pitt.edu/imageserver/plumtree/portal/private/img/detailed_seal.png" />
<link href='http://fonts.googleapis.com/css?family=Permanent+Marker|Rock+Salt' rel='stylesheet' type='text/css'>

<script src="http://www.parsecdn.com/js/parse-1.0.2.min.js"></script>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script src="js/main.js" type="text/javascript"></script>

<script>
$(function() {
	$('#note').fetch('Homepage - Note');
	$('#about').fetch('Homepage - About');
	$('#events').fetch('Homepage - Events');
});
</script>

<? include('nav.php'); ?>

<div class="clearfix"></div>

<div id="note">
</div>


</div>