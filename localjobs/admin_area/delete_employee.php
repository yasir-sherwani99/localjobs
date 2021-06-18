<?php
	include("includes/connection.php");
	
	$memid = $_GET['mem_id'];
	
	$delete_query = "DELETE FROM members WHERE mem_id = '$memid'";
	$run_query = mysqli_query($connection, $delete_query);
	
	if($run_query){
	echo "<script>window.open('employees.php?deleted=An employee has been deleted successfully...', '_self')</script>";
	}else{
		die("Database query has failed" . mysqli_error());
	}
?>