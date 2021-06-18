<?php
	include("includes/connection.php");
	
	$cityid = $_GET['city_id'];
	
	$delete_query = "DELETE FROM city WHERE city_id = '$cityid'";
	$run_query = mysqli_query($connection, $delete_query);
	
	if($run_query){
	echo "<script>window.open('opt_city.php?deleted=A City has been deleted successfully...', '_self')</script>";
	}else{
		die("Database query has failed" . mysqli_error());
	}
?>