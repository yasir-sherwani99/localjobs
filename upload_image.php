<?php
		include("includes/connection.php");
		
		$upload_dir = "./members/member_photos";
		$edit_record = $_GET['edit_form'];
		$img_name = $_FILES['mem_image']['name'];
		$img_tmp_name = $_FILES['mem_image']['tmp_name'];
		$img_size = $_FILES['mem_image']['size'];
		$img_type = $_FILES['mem_image']['type'];
		
		$get_mem = "SELECT * FROM members WHERE mem_id = '$edit_record'";
		$run_mem = mysqli_query($connection, $get_mem);
		$row_mem = mysqli_fetch_array($run_mem);
		
			$mem_old_image = $row_mem['mem_image'];
		
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

		$extension = end(explode(".", $img_name));


		if($img_size <= 0){
			echo "<script>window.open('dashboard_upload_image.php?mem_id=$edit_record&changed=Can not upload empty file', '_self')</script>";
			exit();
		}
		
		if ( 512000 < $img_size ) {
  			echo "<script>window.open('dashboard_upload_image.php?mem_id=$edit_record&changed=Image size should be less than 500KB', '_self')</script>";
			exit();
		}  
		
		if ( ! ( in_array($extension, $allowedExts ) ) ) {
  			echo "<script>window.open('dashboard_upload_image.php?mem_id=$edit_record&changed=File type should be .gif, .jpg or .png', '_self')</script>";
			exit();
		}
		
        	else
        	{

		$randString = md5(time());
		$splitName = explode(".", $img_name);
		$fileExt = end($splitName);
		$newIMGname  = strtolower($randString.'.'.$fileExt);
		
		unlink("members/member_photos/$mem_old_image");
		
		is_uploaded_file($_FILES['mem_image']['tmp_name']);
			$query = "UPDATE members SET mem_image = '$newIMGname' WHERE mem_id = '$edit_record'";
			$run = mysqli_query($connection, $query);
			move_uploaded_file($img_tmp_name, "$upload_dir/$newIMGname");
			
			echo "<script>window.open('my_account.php?updated=Image has been successfully uploaded.', '_self')</script>";
		}
		
	?>