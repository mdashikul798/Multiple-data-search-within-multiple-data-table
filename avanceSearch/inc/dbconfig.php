<?php

	$conn = new mysqli('localhost', 'root', '', 'advancesearch');
	if($conn->connect_error){
		die("Error occar to connecting database ") . $conn->connect_error;
	} 