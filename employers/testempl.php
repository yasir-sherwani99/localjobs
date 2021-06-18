<?php
	
	$connection = mysqli_connect("localhost","localjob_admin","HongKong99localjobs","localjob_db");
	if(!$connection){
		die("Database connection has failed" . mysqli_error());
	}
	
	$user_name = $_POST['email'];
		
	$query = "SELECT * FROM employers
			  WHERE comp_email = '$user_name'";
	
	$run = mysqli_query($connection, $query);
	
	$check = mysqli_num_rows($run);
	
	if($user_name == ""){
		echo "<span class='glyphicon glyphicon-alert'></span>&nbsp;Email id is required";
		exit();
	}
	
	if($check == 1){
		echo "<span class='glyphicon glyphicon-alert'></span>&nbsp;Email is already registered";
		exit();
	
	}
	
	if(preg_match("/^[^@ ]+@[^@ ]+\.[^@\. ]+$/", $user_name)){
		
		echo "<img src='images/checkmark2.png' style='width: 15px; height:15px;'>";  
		exit();
	}
	
	else{
		
		echo "<span class='glyphicon glyphicon-alert'></span>&nbsp;Invalid e-mail address";
	
	}
	


?>