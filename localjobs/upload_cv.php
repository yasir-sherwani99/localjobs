<?php
		include("includes/connection.php");
		
		$upload_dir = "./members/member_cvs";
		$edit_record = $_GET['edit_form'];
		$cv_name = $_FILES['mem_cv']['name'];
		$cv_tmp_name = $_FILES['mem_cv']['tmp_name'];
		$cv_size = $_FILES['mem_cv']['size'];
		$cv_type = $_FILES['mem_cv']['type'];
	
		if($cv_size <= 0){
			die("cannot upload empty file");
		}
		if(is_uploaded_file($_FILES['mem_cv']['tmp_name'])){
			$query = "UPDATE members SET mem_cv = '$cv_name' WHERE mem_id = '$edit_record'";
			$run = mysqli_query($connection, $query);
			move_uploaded_file($cv_tmp_name, "$upload_dir/$cv_name");
			
			echo "<script>window.open('edit_profile.php?mem_id=$edit_record', '_self')</script>";
		}else{
			die("possible file upload attack");
		}
		
	?>
