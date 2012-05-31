<?

	if ($_POST['action'] == 'edit') {
	
		$output_file = '../content/text/' . $_POST['file'];
		$saved_file = file_put_contents($output_file, $_POST['content']);
	
	}








?>
