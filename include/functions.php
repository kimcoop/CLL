<?
	
function grab($name) {

		$file = 'content/text/' .$name. '.txt';
		$upfile = '../content/text/' .$name. '.txt';
		if (file_exists($file)) {
			$out = file_get_contents($file);
		} else {
			$out = file_get_contents($upfile);
		}
		
		return $out;
		
}

?>
