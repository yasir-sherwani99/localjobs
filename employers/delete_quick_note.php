<?php
	session_start();
	include("includes/connection.php");
	
	if(isset($_GET['apply_id'])){
		
		$apply_id = $_GET['apply_id'];
		
		$update_query = "UPDATE quick_apply 
						 SET notes = '' 
						 WHERE apply_id = '$apply_id'";
		
		$update_run = mysqli_query($connection, $update_query);
		
		if($update_run){
			echo "<script>window.open('employer_quick_apps.php?updated=A Notes has been deleted successfully...', '_self')</script>";
		}else{
			
			die("Database query has failed" . mysqli_error());
		}
	
	}
?>