<?php
	$connection = mysqli_connect("localhost","root","","jobsite");
	if(!$connection){
		die("Database connection has failed" . mysqli_error());
	}
	
	$user_name = $_POST['email'];
		
	$query = "SELECT * FROM members
			  WHERE mem_email = '$user_name'";
	
	$run = mysqli_query($connection, $query);
	
	$check = mysqli_num_rows($run);
	
	if($user_name == ""){
		echo "<script>document.getElementById('error').innerHTML='Email Id is required'</script>";
		exit();
	}
	
	if($check == 1){
		echo "<script>document.getElementById('error').innerHTML='Email is already registered'</script>";
		exit();
	
	}else{
		
		echo "<img src='images/checkmark2.png' style='width: 20px; height:18px;'>";
	
	}
	


?>