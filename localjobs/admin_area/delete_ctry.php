<?php
	include("includes/connection.php");
	
	$ctryid = $_GET['ctry_id'];
	
	$delete_query = "DELETE FROM countries WHERE ctry_id = '$ctryid'";
	$run_query = mysqli_query($connection, $delete_query);
	
	if($run_query){
	echo "<script>window.open('opt_ctry.php?deleted=A Country has been deleted successfully...', '_self')</script>";
	}else{
		die("Database query has failed" . mysqli_error());
	}
?>