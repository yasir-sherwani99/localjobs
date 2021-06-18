<?php
	session_start();
	include("includes/connection.php");
	
	if(isset($_GET['job_id'])){
		
		$job_id = $_GET['job_id'];
		
/*		$email = $_SESSION['comp_user'];
		$get_mem = "SELECT * FROM employers WHERE comp_email = '$email'";
		$run_mem = mysqli_query($connection, $get_mem);
		$row_mem = mysqli_fetch_array($run_mem);
			$comp_id = $row_mem['comp_id'];
*/		
		$delete_query = "DELETE FROM company_jobs WHERE job_id = '$job_id'";
		
		$delete_run = mysqli_query($connection, $delete_query);
		
		if($delete_run){
			echo "<script>window.open('employer_jobs.php?deleted=A Job has been deleted successfully...', '_self')</script>";
		}else{
			
			die("Database query has failed" . mysqli_error());
		}
	
	}
?>