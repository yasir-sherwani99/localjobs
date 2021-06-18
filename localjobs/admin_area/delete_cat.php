<?php
	include("includes/connection.php");
	
	$catid = $_GET['cat_id'];
	
	$delete_query = "DELETE FROM categories WHERE cat_id = '$catid'";
	$run_query = mysqli_query($connection, $delete_query);
	
	if($run_query){
	echo "<script>window.open('opt_cat.php?deleted=A Category has been deleted successfully...', '_self')</script>";
	}else{
		die("Database query has failed" . mysqli_error());
	}
?>