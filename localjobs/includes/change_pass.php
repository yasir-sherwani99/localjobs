
<form method="post" action="change_password.php" role="form">

<div class="table-responsive">
<table class="table table-condensed">
  <tbody>	
  <tr>
  <?php 
  	if(isset($_SESSION['username'])){
				$user_session = $_SESSION['username'];
								
				$get_member_pic = "SELECT * FROM members
								   WHERE mem_email = '$user_session'";
								
				$run_member = mysqli_query($conn, $get_member_pic);
								
				$row_member = mysqli_fetch_array($run_member);
				
				$member_id = $row_member['mem_id'];
				$member_email = $row_member['mem_email'];
	}  
	?>

  	<td class="title2">Primary Email Address:</td>
    <td><?php echo $member_email; ?></td>
  </tr> 
	
  <tr>
    <td class="title2">Existing Password:</td>
    <td><input type="password" name="old_pass" class="form-control" /></td>
  </tr>
  <tr>
  	<td></td>
  	<td id="error1" style="color: #F00; font-size: 12px;">&nbsp;</td>
  </tr>
  <tr>
    <td class="title2">New Password:</td>
    <td><input type="password" name="new_pass" class="form-control" /></td>
  </tr>
  <tr>
  	<td></td>
  	<td id="error3" style="color: #F00; font-size: 12px;">&nbsp;</td>
  </tr>
  <tr>
    <td class="title2">Confirm New Password:</td>
    <td><input type="password" name="new_pass_again" class="form-control" /></td>
  </tr>
  <tr>
  	<td></td>
  	<td id="error4" style="color: #F00; font-size: 12px;">&nbsp;</td>
  </tr>
  <tr align="left" class="hidden_change_pass">
  	<td></td>
    <td> 
    	<input type="submit" name="change_password" class="btn btn-primary btn-xs" value="Change Password" />  
       <!-- <a href="#" id="hide_change_pass" style="font-size: 12px; text-decoration: none;">Cancel</a> -->
    </td>
  </tr>
  </tbody>
</table>
</div>
</form>

<?php

	include("includes/connection.php");
	
	if(isset($_SESSION['username'])){	 	
	
		$m = $_SESSION['username'];
	
	if(isset($_POST['change_password'])){
		
		$old_pass = $_POST['old_pass'];
		$new_pass = $_POST['new_pass'];
		$new_pass_again = $_POST['new_pass_again'];
		
		
		$get_real_pass = "SELECT * FROM members WHERE mem_pass = '$old_pass'";
		
		$run_real_pass = mysqli_query($connection, $get_real_pass);
		
		$check_pass = mysqli_num_rows($run_real_pass);
		
		if($old_pass == ""){
			
			echo "<script>document.getElementById('error1').innerHTML='Password required!'</script>";
			exit();

		}
		if($check_pass == 0){
			
			echo "<script>document.getElementById('error1').innerHTML='Wrong Password, try again!'</script>";
			exit();
			
		}
				
		if($new_pass != $new_pass_again){
			
			echo "<script>document.getElementById('error4').innerHTML='Passwords do not match, try again!'</script>";
			exit(); 
			
		}
		if($new_pass == ""){
			
			echo "<script>document.getElementById('error3').innerHTML='New Password required!'</script>";
			exit();
		} 
		else {
			
			$update_pass = "UPDATE members SET mem_pass = '$new_pass' WHERE mem_email = '$m'";
			$run_pass = mysqli_query($connection, $update_pass);
			
			echo "<script>window.open('my_account.php?changed=Your password has been changed successfully!','_self')</script>";
		}
	}
	}

?>