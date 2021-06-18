<?php
		include("includes/connection.php");
		
		$upload_dir = "./company_logo";
		$edit_record = $_GET['edit_form'];
		$logo_name = $_FILES['company_logo']['name'];
		$logo_tmp_name = $_FILES['company_logo']['tmp_name'];
		$logo_size = $_FILES['company_logo']['size'];
		$logo_type = $_FILES['company_logo']['type'];
		
		$get_comp = "SELECT * FROM employers WHERE comp_id = '$edit_record'";
		$run_comp = mysqli_query($connection, $get_comp);
		$row_comp = mysqli_fetch_array($run_comp);
		
			$comp_old_logo = $row_comp['comp_logo'];

		$allowedExts = array(
  			"gif", 
  			"jpg", 
  			"jpeg",
			"png"
		); 

		$allowedMimeTypes = array( 
  			'image/gif',
  			'image/jpeg',
			'image/png'
		);

		$extension = end(explode(".", $logo_name));
		
		if($logo_size <= 0){
			echo "<script>window.open('employer_logo.php?logo=Can not upload empty file', '_self')</script>";
			exit();
		}
		
		if ( 512000 < $logo_size ) {
  			echo "<script>window.open('employer_logo.php?logo=Image size should be less than 500KB', '_self')</script>";
			exit();
		}
		
		if ( ! ( in_array($extension, $allowedExts ) ) ) {
  			echo "<script>window.open('employer_logo.php?logo=File type should be .gif, .jpg or .png', '_self')</script>";
			exit();
		}
		
        	else
        	{

		$randString = md5(time());
		$splitName = explode(".", $logo_name);
		$fileExt = end($splitName);
		$newLOGOname  = strtolower($randString.'.'.$fileExt);
		
		unlink("company_logo/$comp_old_logo");
	
		is_uploaded_file($_FILES['company_logo']['tmp_name']);
			$query = "UPDATE employers SET comp_logo = '$newLOGOname' WHERE comp_id = '$edit_record'";
			$run = mysqli_query($connection, $query);
			move_uploaded_file($logo_tmp_name, "$upload_dir/$newLOGOname");
			
			echo "<script>window.open('employer_profile.php?updated=Logo has been successfully uploaded.', '_self')</script>";
		}
		
	?>