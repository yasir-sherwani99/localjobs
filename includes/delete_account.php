
<form method="post" action="">

<table width="470" border="0" cellpadding="4">
  <tr align="center">
    <th colspan="2"><h1 style="font-size: 20px; color: #F00;">Do you really want to delete your account???</h1></th>
  </tr>
   <tr align="center">
    <td id="del_butt">
    	<input type="submit" name="yes" value="Yes, I Want to Delete" />
    </td>
    <td id="nodel_butt">
    	<input type="submit" name="no" value="No, I Do not Want to Delete" />
    </td>
  </tr>
</table>

</form>
<?php
	include("includes/connection.php");
	
	$m = @$_SESSION['username'];
	
	if(isset($_POST['yes'])){
		
		$delete_mem = "DELETE FROM members WHERE mem_email = '$m'";
		
		$run_delete = mysqli_query($connection, $delete_mem);
		
		if($run_delete){
			
			session_destroy();
			echo "<script>window.alert('Your account has been deleted, Good Bye!')</script>";
			echo "<script>window.open('index.php','_self')</script>";
		}
		
	}
	
	if(isset($_POST['no'])){
		
			echo "<script>window.open('index.php','_self')</script>";
 
		
	}
	
?>