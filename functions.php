<?php
// get the year for copyright line; 5/2/2019
function get_the_year() {
    return date( 'Y' );
}

// process inputs from form
function process_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}