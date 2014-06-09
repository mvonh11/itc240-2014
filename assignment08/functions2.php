<?php

function connect_to_mysql($mysql_password) {	
	$mysql = new mysqli("localhost", "mvonhe01", $mysql_password, "mvonhe01");//mysqli has a return stmt in its definition. if it didn't have a return stmt, then it could not output a value to be assigned to the $mysql variable. 
	
	return $mysql; // returns the value corresponding to the database connection for use in other database functions.
}
	
//this is the definition of log_visit. It timestamps the page when visited.
function log_visit($mysql) {
	$prepared = $mysql->prepare('INSERT INTO visits (timestamp) VALUES (NOW());');
	$prepared->execute();
}	
	
//Counts the number of page visits.	
function get_page_visit_count($mysql) {
	$prepared = $mysql->prepare('SELECT COUNT(*) AS visit_count FROM visits;');
	$prepared->execute();
	$result = $prepared->get_result(); 
	$visit_count = $result->fetch_object()->visit_count;//fetch method on $result

	return $visit_count; //outputs the new page visit number
}

?>

