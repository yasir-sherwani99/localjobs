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
		echo "&nbsp;Email id is required";
		exit();
	}
	
	if($check == 1){
		echo "Email is already registered";
		exit();
	
	}
	
	if(preg_match("/^[^@ ]+@[^@ ]+\.[^@\. ]+$/", $user_name)){
		
		echo "<img src='images/icons2/checkmark2.png' style='width: 20px; height:18px; margin-left: 5px; margin-top: 3px;'>";  
		exit();
	}
	
	else{
		
		echo "&nbsp;Invalid e-mail address";
	
	}
	


?>