<?

define("SITE_ROOT", "http://localhost:8888/");

$url = "content/content.php";

if (file_exists($url)) {
	include_once($url);
} else {
	include_once('../'.$url);
}




?>