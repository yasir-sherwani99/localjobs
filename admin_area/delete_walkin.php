<?php
	include("includes/connection.php");
	
	$jobid = $_GET['job_id'];
	
	$get_image = "SELECT * FROM walk_interview WHERE wjob_id = '$jobid'";
	$run_image = mysqli_query($connection, $get_image);
	$row_image = mysqli_fetch_array($run_image);
		$ad = $row_image['walk_ad_image'];
	
	$delete_query = "DELETE FROM walk_interview WHERE wjob_id = '$jobid'";
	$run_query = mysqli_query($connection, $delete_query);
	
	unlink("walkin_ads/$ad");
	
	if($run_query){
	echo "<script>window.open('jobs.php?deleted=A Job has been deleted successfully...', '_self')</script>";
	}else{
		die("Database query has failed" . mysqli_error());
	}
?>