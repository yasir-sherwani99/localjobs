<?php
	include("includes/connection.php");
	
	$jobid = $_GET['job_id'];
	
	$delete_query = "DELETE FROM foreign_jobs WHERE for_job_id = '$jobid'";
	$run_query = mysqli_query($connection, $delete_query);
	
	if($run_query){
	echo "<script>window.open('foreign.php?deleted=A Job has been deleted successfully...', '_self')</script>";
	}else{
		die("Database query has failed" . mysqli_error());
	}
?>