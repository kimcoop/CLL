<style>
.event {
	margin: 5px 10px;
}

table {
	margin: 0px auto;
	margin-bottom: 10px;
}

td, th {
	text-align: center;
}

td input {
	width: 200px;
	max-width: 200px;
	word-wrap: break-word;
}

textarea {
	width: 200px;
	max-width: 200px;
	word-wrap: break-word;
}

.date {
	width: 140px;
}

.small {
	width: 20px;
}

#event_table {
	margin-left: 0px;
}


</style>

<table id="event_table">
	<thead>
		<th>Title</th>
		<th>Starting Time</th>
		<th>Ending Time</th>
		<th>Details</th>
		<th class="small"></th>
	</thead>
	<tbody>
		

<?

	$lines = explode('%%', $page_content);
	$count = 0;
	foreach ($lines as $line) {
	
		if (!empty($line)) {
	
			$event = explode('##', $line);
			
			$title = escape($event[0]);
			$date = $event[1];
			$end_date = $event[2];
			$details = escape($event[3]);
			
			?>
			<tr class='event_row'>
				<td><input class='event' type='text' value="<?= $title ?>"/></td>
				<td><input class='event date' type='text' value="<?= $date ?>"/></td>
				<td><input class='event date' type='text' value="<?= $end_date ?>"/></td>
				<td><textarea class='event' type='textarea'><?= $details ?></textarea></td>
				<td><span class='delete'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></td>
			</tr>
			<?
			$count++;
		}
	} // foreach	
	
	?>
	
	</tbody>
	</table>
	
	<a class='submit' id='new_event'>New Event</a>
	
	<?
	
	function escape($str) {
		return stripslashes($str);
		//return str_replace('\"', "''", $str);
	}


?>