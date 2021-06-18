<?php
	$connection = mysqli_connect("localhost","root","","jobsite");
	if(!$connection){
		die("Database connection has failed" . mysqli_error());
	}
	
	$user_name = $_POST['username'];
	$user_pass = $_POST['userpass'];
		
	$query = "SELECT * FROM members
			  WHERE mem_email = '$user_name' && mem_pass = '$user_pass'";
	
	$run = mysqli_query($connection, $query);
	
	$check = mysqli_num_rows($run);
	
	if($user_name == "" || $user_pass == ""){
		echo "<script>document.getElementById('error').innerHTML='Email/Password required'</script>";
		exit();
	}
		
	if($check == 0){
		echo "<script>document.getElementById('error').innerHTML='Email/Password Invalid'</script>";
		exit();
	
	}
/*	
	if(preg_match("/^[^@ ]+@[^@ ]+\.[^@\. ]+$/", $user_name)){
		
		echo "<img src='images/icons2/checkmark2.png' style='width: 20px; height:18px;'>";
		exit();
	}
	
	else{
		
		echo "<script>document.getElementById('error').innerHTML='Invalid e-mail address'</script>";
	
	}
	
*/

?>