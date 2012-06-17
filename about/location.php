<?

include('../include/header.php');

?>

<script type="text/javascript">
$(function() {
	$('#location').fetch('Location');
});
</script>


<div id="title_container">

		<img src="../images/location.png" height="150" />
		<h1 id="title">Location</h1>

</div> <!-- end /#title_container -->
</div> <!-- /#header -->

<div id="container">

<div class="breadcrumb">
	About &raquo; Location
</div>

	<div class="text" style="overflow: hidden">
		<h3>Trees Hall</h3>	
		
		<div style="float: left; width: 200px; padding: 30px 4px">
			<div id="location"></div>
			<a target="_blank" href="http://maps.google.com/maps?hl=en&amp;ie=UTF8&amp;q=trees+hall,+pittsburgh+pa&amp;fb=1&amp;gl=us&amp;hq=trees+hall,+pittsburgh+pa&amp;hnear=trees+hall,+pittsburgh+pa&amp;cid=0,0,1415057620280571578&amp;ll=40.443254,-79.965189&amp;spn=0.006295,0.006295&amp;t=m&amp;iwloc=A&amp;source=embed" style="color:#0000FF;text-align:left">Click to view a larger map</a>	
		</div>

		<div style="float:right;">
			<iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?hl=en&amp;ie=UTF8&amp;q=trees+hall,+pittsburgh+pa&amp;fb=1&amp;gl=us&amp;hq=trees+hall,+pittsburgh+pa&amp;hnear=trees+hall,+pittsburgh+pa&amp;cid=0,0,1415057620280571578&amp;ll=40.443254,-79.965189&amp;spn=0.006295,0.006295&amp;t=m&amp;iwloc=A&amp;output=embed">
			</iframe>
			<br>
		</div>
		
		<img src="../images/trees-gym.gif" />
		
	</div>

<?

include('../include/footer.php');

?>