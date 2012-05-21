
</div><!-- end container -->
	
		<div id="footer">
			&#169;&nbsp;2012 University of Pittsburgh&nbsp;|
			
			<? if ($_SESSION['admin'] == 'admin') { ?>
		
				<a href="<?= $GLOBALS['root'] ?>/admin/editor.php">Logged in as Admin</a>
		
			<? } else { ?>
			
			<a href="<?= $GLOBALS['root'] ?>/admin/editor.php?do=login">Login</a>
			
			<? } ?>
		</div><!-- end footer -->
</div><!-- end cover -->

</body>
</html>