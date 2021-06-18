<?php 
	session_start();
	if(!isset($_SESSION['username'])){
		header('location: admin_login.php?error=You are not an Administrator');
	}else{
 
?>

<?php include("includes/connection.php"); ?>
<?php include("functions/admin_functions.php"); ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Local Jobs Pakistan</title>
	<link href="images/logo_small.png" type="image/gif" rel="shortcut icon" />
    <link href="css/bootstrap.min.css" rel="stylesheet" />   
	<link rel="stylesheet" type="text/css" href="styles/admin_style.css" />
	<script type="text/javascript" src="js/js_functions.js"></script>
    <script src="js/respond.js"></script>
</head>

<body onLoad="myClock()">
<div class="container">
	<!-- Header area starts -->
    <div id="header" class="row">
    	<?php include("includes/admin_header.php"); ?>    
    </div>
    <!-- Header area ends -->
    <div id="welcome" class="row">
    <?php
		if(isset($_SESSION['admin_name'])){
			$admin = $_SESSION['admin_name'];
			echo "<img src='images/administrator2.png' style='width:25px; height:25px; margin-right: 10px;'><b style='color: #006600'>Welcome: </b>" . $admin . " <a href='admin_logout.php' style='color: blue;'>Signout</a>";
		}
    ?>
    </div>

    <!-- Left side area starts --> 
    <div class="row">
    
       
        <div id="left_side_area" class="col-md-3">
            <!-- Navigation area starts -->
            <?php include("includes/dashboard.php"); ?>
       	</div>   
    
    <!-- Navigation area ends -->    
    
    <!-- Main contents area starts -->
    
    <div id="contents" class="col-md-9">
    	<div id="tab" class="row">
        	<ul class="nav nav-tabs">
            	<li><a href="options.php">Types</a></li>
                <li><a href="opt_cat.php">Categories</a></li>
                <li><a href="opt_notification.php">Notifications</a></li>
                <li><a href="opt_city.php">City</a></li>
                <li><a href="opt_ctry.php">Countries</a></li>
                <li class="active" style="font-weight: bold;"><a href="change_pass.php">Change Password</a></li>
            </ul>
        </div>
          <?php
			 if(isset($_GET['changed'])){
				 $changed = $_GET['changed'];
				 echo "<div id='message' class='alert alert-success'>
        				<img src='images/checkmark.png' width='25' height='25'/>
            			<div id='aa'>$changed</div>
        		</div>"; 
			 }
			 
			 else{
				 echo "<div id='message' class='alert alert-info'>
        				<img src='images/info.png' width='45' height='45'/>
            			<div id='aa'><b>Change password</b><br/>Enter the required fields and change the password.</div>
        			</div>";
			 }
			 
		?>

        <div id="all_jobs" style="background-color:#FFF; font-size: 16px; border: hidden;" class="row">
        	<form name="" method="post" form="role" action="change_pass.php">
        	<table border="0" class="table">
              <tbody>	
              <tr>
                <td style="width: 150px;"><b>Existing Password</b></td>
                <td style="width: 180px;"><input type="password" class="form-control" name="old_pass" /></td>
                <td id="error1" style="color: #F00; width: 150px;">&nbsp;</td>
              </tr>
            <!--  <tr>
              	<td></td>
                <td id="error1" style="color: #F00;">&nbsp;</td>
              </tr>  -->
              <tr>
                <td><b>New Password</b></td>
                <td><input type="password" class="form-control" name="new_pass" /></td>
                <td id="error2">&nbsp;</td>
              </tr>
            <!--  <tr>
              	<td></td>
                <td id="error2">&nbsp;</td>
              </tr>  -->
              <tr>
                <td><b>Confirm New Password</b></td>
                <td><input type="password" class="form-control" name="new_pass_again" /></td>
                <td id="error3" style="color: #F00;">&nbsp;</td>
              </tr>
            <!--  <tr>
              	<td></td>
                <td id="error3" style="color: #F00;">&nbsp;</td>
              </tr>  -->
              <tr align="left">
                <td></td>
                <td><input type="submit" name="change_password" class="btn btn-default" value="Change Password" /></td>
                <td>&nbsp;</td>
              </tr>
              </tbody>	
            </table>
            </form>
        </div>
   	</div>
</div>    
    <!-- Main contents area ends -->
     <!-- Footer area starts -->
    <div id="footer" class="row">
    	<?php include("includes/footer_contents.php"); ?>
    </div>
    <!-- Footer area ends -->

</div>

<!-- JavaScript-->
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
<?php

	include("includes/connection.php");
	
	if(isset($_SESSION['username'])){	 	
	
		$m = $_SESSION['username'];
	
	if(isset($_POST['change_password'])){
		
		$old_pass = $_POST['old_pass'];
		$new_pass = $_POST['new_pass'];
		$new_pass_again = $_POST['new_pass_again'];
		
		
		$get_real_pass = "SELECT * FROM admin_login WHERE admin_pass = '$old_pass'";
		
		$run_real_pass = mysqli_query($connection, $get_real_pass);
		
		$check_pass = mysqli_num_rows($run_real_pass);
		
		if($old_pass == ""){
			
			echo "<script>document.getElementById('error1').innerHTML='Password required!'</script>";
			exit();

		}

		if($check_pass == 0){
			
			echo "<script>document.getElementById('error1').innerHTML='Wrong password, try again!'</script>";
			exit();
			
		}
				
		if($new_pass != $new_pass_again){
			
			echo "<script>document.getElementById('error3').innerHTML='Passwords do not match, try again!'</script>";
			exit(); 
			
		} 
		if($new_pass == "" || $new_pass_again == ""){
			
			echo "<script>document.getElementById('error3').innerHTML='New Passwords required!'</script>";
			exit();
		} 
		else {
			
			$update_pass = "UPDATE admin_login SET admin_pass = '$new_pass' WHERE admin_email = '$m'";
			$run_pass = mysqli_query($connection, $update_pass);
			
			echo "<script>window.open('change_pass.php?changed=Your password has been changed successfully!','_self')</script>";
		}
	}
	}
	
	}
?>