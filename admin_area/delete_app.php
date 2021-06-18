<?php
	include("includes/connection.php");
	
	$applyid = $_GET['apply_id'];
	
	$delete_query = "DELETE FROM jobs_apply WHERE apply_id = '$applyid'";
	$run_query = mysqli_query($connection, $delete_query);
	
	if($run_query){
	echo "<script>window.open('applications.php?deleted=An appplication has been deleted successfully...', '_self')</script>";
	}else{
		die("Database query has failed" . mysqli_error());
	}
?>