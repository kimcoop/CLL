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
		$title = stripslashes($e[0]);
		$date = $e[1];
		$end = $e[2];
		$details = stripslashes($e[3]);
		$month = date('M', strtotime($date));
		$day = date('d', strtotime($date));
		$year = date('Y', strtotime($date));
		$time = date('h:i a', strtotime($date));
		/*
			$article['month'] = date('M', strtotime($date));
			$article['day'] = date('d', strtotime($date));
			$article['timestamp'] = date('h:i a', strtotime($date));*/
            //start  : '2010-01-09 12:30:00',
            //allDay : false // will make the time show
		
		if (!empty($title) && !empty($date) && !empty($details)) {
			$event = array("title"=>$title, "date"=>$date, "details"=>$details,
				"year"=>$year, "month"=>$month, "day"=>$day, "time"=>$time);
			$events[] = $event;
		}
	}

	echo json_encode(array('response'=>$events));

}

?>
