<?php
		include("includes/connection.php");
		
		$upload_dir = "./company_logo";
		$edit_record = $_GET['edit_form'];
		$logo_name = $_FILES['company_logo']['name'];
		$logo_tmp_name = $_FILES['company_logo']['tmp_name'];
		$logo_size = $_FILES['company_logo']['size'];
		$logo_type = $_FILES['company_logo']['type'];
	
		if($logo_size <= 0){
			echo "<script>window.open('employer_logo.php?logo=Can not upload empty file', '_self')</script>";
		}
		if(is_uploaded_file($_FILES['company_logo']['tmp_name'])){
			$query = "UPDATE employers SET comp_logo = '$logo_name' WHERE comp_id = '$edit_record'";
			$run = mysqli_query($connection, $query);
			move_uploaded_file($logo_tmp_name, "$upload_dir/$logo_name");
			
			echo "<script>window.open('employer_profile.php?updated=Logo has been successfully uploaded.', '_self')</script>";
		}else{
			die("possible file upload attack");
		}
		
	?>
