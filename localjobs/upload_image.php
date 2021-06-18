<?php
		include("includes/connection.php");
		
		$upload_dir = "./members/member_photos";
		$edit_record = $_GET['edit_form'];
		$img_name = $_FILES['mem_image']['name'];
		$img_tmp_name = $_FILES['mem_image']['tmp_name'];
		$img_size = $_FILES['mem_image']['size'];
		$img_type = $_FILES['mem_image']['type'];
	
		if($img_size <= 0){
		//	die("cannot upload empty file");
			echo "<script>window.open('dashboard_upload_image.php?changed=Can not upload empty file', '_self')</script>";
		}
		if(is_uploaded_file($_FILES['mem_image']['tmp_name'])){
			$query = "UPDATE members SET mem_image = '$img_name' WHERE mem_id = '$edit_record'";
			$run = mysqli_query($connection, $query);
			move_uploaded_file($img_tmp_name, "$upload_dir/$img_name");
			
			echo "<script>window.open('my_account.php?updated=Image has been successfully uploaded.', '_self')</script>";
		}else{
			die("possible file upload attack");
		}
		
	?>
