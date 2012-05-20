<?

define("SITE_ROOT", "http://localhost:8888/");

	$url = 'content/content.php';
	$url_up = '/content/content.php';
	
	if (file_exists($url)) {
		include_once($url);
	} else if (file_exists($url_up)) {
		include_once($url_up);
	} else {
		include_once('../'.$url);
	}



?>