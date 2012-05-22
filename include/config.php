<?
	session_start();

	$GLOBALS['root'] = 'http://localhost:8888'; // change this when site changes domains/hosts

	$path =  $_SERVER['DOCUMENT_ROOT'];
	$path .= '/include/functions.php';
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
	'Contact' => 'contact',
	'Events' => 'index_events',
	'Location' => 'location'
);

?>