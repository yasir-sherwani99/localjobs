<?php
	include("includes/connection.php");
	
	$adminid = $_GET['admin_id'];
	
	$delete_query = "DELETE FROM admin_login WHERE admin_id = '$adminid'";
	$run_query = mysqli_query($connection, $delete_query);
	
	if($run_query){
	echo "<script>window.open('users.php?deleted=A User has been deleted successfully...', '_self')</script>";
	}else{
		die("Database query has failed" . mysqli_error());
	}
?>