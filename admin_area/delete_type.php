<?php
	include("includes/connection.php");
	
	$typeid = $_GET['type_id'];
	
	$delete_query = "DELETE FROM types WHERE type_id = '$typeid'";
	$run_query = mysqli_query($connection, $delete_query);
	
	if($run_query){
	echo "<script>window.open('options.php?deleted=A Job Type has been deleted successfully...', '_self')</script>";
	}else{
		die("Database query has failed" . mysqli_error());
	}
?>