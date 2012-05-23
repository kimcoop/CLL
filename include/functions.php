<?

	
if (isset($_POST['action']) && $_POST['action']=='getEvents') {
	getEvents();
}	
	
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


function getEvents() {
	$lines = explode('%%', grab('events'));
	$events = array();
	
	foreach ($lines as $line) {
		$e = explode('##', $line);
		$title = $e[0];
		$date = $e[1];
		$details = $e[2];
		
		if (!empty($title) && !empty($date) && !empty($details)) {
			$event = array("title"=>$title, "date"=>$date, "details"=>$details,
				"year"=>"2012", "month"=>"05", "day"=>"23");
			$events[] = $event;
		}
	}

	echo json_encode(array('response'=>$events));

}

?>
