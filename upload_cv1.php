<?php
		include("includes/connection.php");
		
		$upload_dir = "./members/member_cvs";
		$edit_record = $_GET['edit_form'];
		$cv_name = $_FILES['mem_cv']['name'];
		$cv_tmp_name = $_FILES['mem_cv']['tmp_name'];
		$cv_size = $_FILES['mem_cv']['size'];
		$cv_type = $_FILES['mem_cv']['type'];
	
		$get_mem = "SELECT * FROM members WHERE mem_id = '$edit_record'";
		$run_mem = mysqli_query($connection, $get_mem);
		$row_mem = mysqli_fetch_array($run_mem);
		
			$mem_f_name = $row_mem['mem_first_name'];
			$mem_l_name = $row_mem['mem_last_name'];
			$mem_old_cv = $row_mem['mem_cv'];
			
			
		$allowedExts = array(
  			"pdf", 
  			"doc", 
  			"docx"
		); 

		$allowedMimeTypes = array( 
  			'application/msword',
  			'application/pdf'
		);

		$extension = end(explode(".", $cv_name));
		
		if($cv_size <= 0){
			echo "<script>window.open('dashboard_upload_cv.php?changed=Can not upload empty file&mem_id=$edit_record', '_self')</script>";
			exit();
		}  
		
		if ( 512000 < $cv_size ) {
  			echo "<script>window.open('dashboard_upload_cv.php?changed=File size should be less than 500KB&mem_id=$edit_record', '_self')</script>";
			exit();
		}  
		
		if ( ! ( in_array($extension, $allowedExts ) ) ) {
  			echo "<script>window.open('dashboard_upload_cv.php?changed=File type should be .doc, .docx and .pdf&mem_id=$edit_record', '_self')</script>";
			exit();
		}
		
        	else
        	{
        	
        		$randString = md5(time());
			$randString1 = substr(str_shuffle($randString), 0, 8);
			$splitName = explode(".", $cv_name);
			$fileExt = end($splitName);
			$newCVname  = strtolower($mem_f_name.$mem_l_name.$randString1.'.'.$fileExt);
		
		unlink("members/member_cvs/$mem_old_cv");

		is_uploaded_file($_FILES['mem_cv']['tmp_name']);
			$query = "UPDATE members SET mem_cv = '$newCVname' WHERE mem_id = '$edit_record'";
			$run = mysqli_query($connection, $query);
			move_uploaded_file($cv_tmp_name, "$upload_dir/$newCVname");
			
			echo "<script>window.open('my_account.php?updated=CV/Resume has been successfully updated...', '_self')</script>";
		}		
	?>