<?php
	session_start();
	include("includes/connection.php");
	
	if(isset($_GET['apply_id'])){
		
		$apply_id = $_GET['apply_id'];
		
		$email = $_SESSION['username'];
		$get_mem = "SELECT * FROM members WHERE mem_email = '$email'";
		$run_mem = mysqli_query($connection, $get_mem);
		$row_mem = mysqli_fetch_array($run_mem);
			$mem_id = $row_mem['mem_id'];
		
		$withdraw_query = "DELETE FROM jobs_apply WHERE apply_id = '$apply_id'";
		
		$withdraw_run = mysqli_query($connection, $withdraw_query);
		
		if($withdraw_run){
			echo "<script>window.open('my_applications.php?mem_id=$mem_id&deleted=You have successfuly withdraw your application for this job...', '_self')</script>";
		}else{
			
			die("Database query has failed" . mysqli_error());
		}
	
	}
?>