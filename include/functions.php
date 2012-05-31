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
		
} // grab

function getEvents() {
	$lines = explode('%%', grab('events'));
	$events = array();
	
	foreach ($lines as $line) {
		$e = explode('##', $line);
		$title = stripslashes($e[0]);
		$date = $e[1];
		$end_date = $e[2];
		$details = stripslashes($e[3]);
		$month = date('M', strtotime($date)); $month = "5";
		$day = date('d', strtotime($date)); $day = "31";
		$year = date('Y', strtotime($date)); $year = "2012";
		$time = date('h:i a', strtotime($date));
		$timestamp = str_replace('\\', '-', $date);
		$end = str_replace('\\', '-', $end_date);
		
		if (!empty($title) && !empty($date) && !empty($details)) {
			$event = array("title"=>$title, "date"=>$date, "details"=>$details,
				"year"=>"2012", "month"=>"05", "day"=>"23", "time"=>$time);
			$event = array("title"=>$title, "timestamp"=>$timestamp, "end"=>$end, "details"=>$details);
			$events[] = $event;
		}
	}

	echo json_encode(array('response'=>$events));

} // getEvents

?>
