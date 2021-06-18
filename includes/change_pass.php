<form method="post" action="change_password.php" role="form">

<div class="table-responsive">
<table class="table table-bordered">
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

  	<td class="dashboard_main_headings">Primary Email Address:</td>
    <td><?php echo $member_email; ?></td>
  </tr> 
	
  <tr>
    <td class="dashboard_main_headings">Existing Password:</td>
    <td><input type="password" name="old_pass" class="form-control" /></td>
  </tr>
  <tr>
  	<td></td>
  	<td id="error1" style="color: #F00; font-size: 12px;">&nbsp;</td>
  </tr>
  <tr>
    <td class="dashboard_main_headings">New Password:</td>
    <td><input type="password" name="new_pass" class="form-control" /></td>
  </tr>
  <tr>
  	<td></td>
  	<td id="error3" style="color: #F00; font-size: 12px;">&nbsp;</td>
  </tr>
  <tr>
    <td class="dashboard_main_headings">Confirm New Password:</td>
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

