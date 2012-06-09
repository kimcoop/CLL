<?
	session_start();

	$GLOBALS['root'] = 'http://www.cll.pitt.edu/draft';
	$path = 'functions.php';
	include($path);
	
// editor.php **
// all of the pages for editing go in this array with their respective .txt files
	$editable_pages = array(
	'Homepage - About CLL' => 'index_about',
	'Homepage - Events' => 'index_events',
	'Homepage - PostIt' => 'note',
	'Guest Pass' => 'guest_pass',
	'Guest Pass - About' => 'guest_pass_about',
	'Guest Past - When' => 'guest_pass_when',
	'PACK' => 'pack',
	'PACK - About' => 'pack_about',
	'PACK - Cost' => 'pack_cost',
	'PACK - When' => 'pack_when',
	'Parent Fitness - About' => 'parent_fitness_about',
	'Parent Fitness - When' => 'parent_fitness_when',
	'Parent Fitness' => 'parent_fitness',
	'PAWS' => 'paws',
	'PAWS - About' => 'paws_about',
	'PAWS - Cost' => 'paws_cost',
	'PAWS - Where' => 'paws_where',
	'PAWS - When' => 'paws_when',
	'Saturday\'s Kids' => 'sat_kids',
	'Saturday\'s Kids - About' => 'sat_kids_about',
	'Saturday\'s Kids - Cost' => 'sat_kids_cost',
	'Saturday\'s Kids - Where' => 'sat_kids_where',
	'Saturday\'s Kids - When' => 'sat_kids_when',
	'Community Programs' => 'comm_programs',
	'Contact' => 'contact',
	'Location' => 'location'
);

/* Include when ready
	'Calendar Events' => 'events',
*/

	define("DB_HOST", "localhost");
	define("DB_USER", "pittcll");
	define("DB_PASS", "pittcll");
	define("DB_DATABASE", "pittcll");
	
	define("TABLE_CONTENT", "content");

	function db() { // connect with MySQL
		mysql_connect(DB_HOST, DB_USER, DB_PASS) or die('Error connecting to mysql'.mysql_error());
		mysql_selectdb(DB_DATABASE) or die('Error selecting database'.mysql_error());
	}

?>