<?php
	$connection = mysqli_connect("localhost","root","","jobsite");
	if(!$connection){
		die("Database connection has failed" . mysqli_error());
	}
	
	$user_name = $_POST['email'];
	$user_pass = $_POST['pass'];
	
	$query = "SELECT * FROM members
			  WHERE mem_email = '$user_name' && mem_pass = '$user_pass'";
	
	$run = mysqli_query($connection, $query);
	
	$check = mysqli_num_rows($run);
	
	if($check > 0){
		
	//	header("location: index.php");
	
	}else{
		echo "<script>document.getElementById('error').innerHTML='Username or Password is Incorrect!'</script>";
		exit();
	
	}


?>