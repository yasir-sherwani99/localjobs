<?php
	$connection = mysqli_connect("localhost", "root", "", "localjob_db");
	if(!$connection){
		die("Database connection has failed" . mysqli_error());
	}
?>