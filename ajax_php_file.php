<?php

	$connection = mysqli_connect("localhost","root","","jobsite");
	if(!$connection){
		die("Database connection has failed" . mysqli_error());
	}

	$sourcePath = $_FILES['file']['tmp_name'];       // Storing source path of the file in a variable
	$targetPath = "upload/".$_FILES['file']['name']; // Target path where file is to be stored
	move_uploaded_file($sourcePath,$targetPath);
	
?>    
