
<div id="footer">
	Copyright 2012 University of Pittsburgh&nbsp;|
	
	<? if ($_SESSION['admin'] == 'admin') { ?>

		<a href="<?= $GLOBALS['root'] ?>/admin/editor.php">Logged in as Admin</a>

	<? } else { ?>
	
	<a href="<?= $GLOBALS['root'] ?>/admin/editor.php?do=login">Login</a>
	
	<? } ?>
</div>

</body>
</html>