<?php
	include("includes/connection.php");
	
	$applyid = $_GET['apply_id'];
	
	$get_cv = "SELECT * FROM quick_apply WHERE apply_id = '$applyid'";
	$run_cv = mysqli_query($connection, $get_cv);
	$row_cv = mysqli_fetch_array($run_cv);
		$cv = $row_cv['cv'];
		
	$delete_query = "DELETE FROM quick_apply WHERE apply_id = '$applyid'";
	$run_query = mysqli_query($connection, $delete_query);
	unlink("../members/member_cvs/$cv");
	
	if($run_query){
	echo "<script>window.open('quick_applications.php?deleted=An appplication has been deleted successfully...', '_self')</script>";
	}else{
		die("Database query has failed" . mysqli_error());
	}
?>