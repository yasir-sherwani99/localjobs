<?php
	include("includes/connection.php");
	
	$compid = $_GET['comp_id'];
	
	$delete_query = "DELETE FROM employers WHERE comp_id = '$compid'";
	$run_query = mysqli_query($connection, $delete_query);
	
	if($run_query){
	echo "<script>window.open('employers.php?deleted=An emplpoyer has been deleted successfully...', '_self')</script>";
	}else{
		die("Database query has failed" . mysqli_error());
	}
?>