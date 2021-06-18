<?php
	
		extract($_REQUEST);
		include("includes/connection.php");
 
 		$del = $_GET['delete_pic'];
		
		$sql = "select * from members where mem_id='$del'";
		$result = mysqli_query($connection, $sql);
		
		$row = mysqli_fetch_array($result);
 
 		if($row['mem_image'] == ""){
			echo "<script>window.alert('You have no image/pic to delete..')</script>";
			echo "<script>window.open('dashboard_upload_image.php?mem_id=$del', '_self')</script>";
			return false;
		}
		
		else{
			unlink("members/member_photos/$row[mem_image]");
		
			$update = "update members set
						mem_image = ''
						where mem_id = '$del'";
 
			$run = mysqli_query($connection, $update);

			echo "<script>window.alert('The image is deleted successfully...')</script>";
			echo "<script>window.open('dashboard_upload_image.php?mem_id=$del&deleted=Your image/pic is deleted successfully..', '_self')</script>";
		
			return true;
		
		}
  
?>
