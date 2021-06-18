<?php 
	session_start();
	if(!isset($_SESSION['comp_user'])){
		header('location: index.php?error=You are not an Administrator');
	}else{
 
?>

<?php include("includes/connection.php"); ?>
<?php include("functions/emp_main_panel_functions.php"); ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Local Jobs Pakistan</title>
	<link href="../images/logo_small.png" type="image/gif" rel="shortcut icon" />
    <link href="css/bootstrap.min.css" rel="stylesheet" />
	<link rel="stylesheet" type="text/css" href="styles/emp_main_panel_style.css" />
	<script src="js/respond.js"></script>
</head>

<body>
<div class="container">
	<!-- This is top bar -->
	<div id="topbar" class="row">
    	<?php include("includes/top_bar.php"); ?>
	</div>

	<!-- Header area starts -->
    <div id="header" class="row">
    	<?php include("includes/header.php"); ?> 
    </div>
    <!-- Header area ends -->
    
    <div class="row">
     	<?php include("includes/navigation_main.php"); ?>
    </div>	
    
<div class="row">
    <!-- Left side area starts -->
    	 <div id="left_side_area" class="col-md-3 col-sm-3 col-xs-3">
            <!-- Navigation area starts -->
            <?php include("includes/employer_dashboard.php"); ?>
        
        </div>


    
    <!-- Main contents area starts -->
    
    <div id="contents" style="padding-top: 10px;" class="col-md-9 col-sm-9 col-xs-9">
    	<div id="tab" class="row">
        	<ul class="nav nav-tabs">
            	<li class="active" style="font-weight: bold;"><a href="employer_change_pass.php">Change Password</a></li>
            </ul>
        </div>
        <?php
			if(isset($_GET['changed'])){
				$change = $_GET['changed'];
				echo "<div id='message' class='alert alert-info'>
        			  	<img src='images/checkmark2.png' width='45' height='45'/>
            		 	<div id='aa' style='margin-left: 10px;'><b>Congratulations...</b><br/>$change</div>
        			  </div>";
			} else {
				echo "<div id='message' class='alert alert-info'>
        				<img src='images/info.png' width='45' height='45'/>
            		  <div id='aa' style='margin-left: 10px;'><b>Change Password</b><br/>Fill all the required fields and change password successfully...</div>
        		</div>";
			}
        ?>

        <div id="all_jobs" style="height: auto; background-color:#FFF; font-size: 14px; padding-bottom: 10px;" class="row">
            <form name="" method="post" role="form" action="employer_change_pass.php">
            <div class="table-responsive">
        	<table border="0" class="table table-bordered table-condensed">
              <tbody> 
              <tr>
                <td style="width: 180px; font-weight: bold;">Existing Password</td>
                <td style="width: 200px;"><input type="password" name="old_pass" class="form-control"/></td>
                <td id="error1" style="color: #F00;"></td>
              </tr>
              <tr>
                <td style="font-weight: bold;">New Password</td>
                <td><input type="password" name="new_pass" class="form-control"/></td>
                <td id="error2"></td>
              </tr>
              <tr>
                <td style="font-weight: bold;">Confirm New Password</td>
                <td><input type="password" name="new_pass_again" class="form-control"/></td>
                <td id="error3" style="color: #F00;"></td>
              </tr>
              <tr align="left">
                <td></td>
                <td colspan="2"><input type="submit" name="change_password" class="btn btn-default btn-sm" value="Change Password" /></td>
              </tr>
              </tbody>
            </table>
            </div>
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
	
	if(isset($_SESSION['comp_user'])){	 	
	
		$e = $_SESSION['comp_user'];
	
	if(isset($_POST['change_password'])){
		
		$old_pass = $_POST['old_pass'];
		$new_pass = $_POST['new_pass'];
		$new_pass_again = $_POST['new_pass_again'];
		
		
		$get_real_pass = "SELECT * FROM employers WHERE comp_pass = '$old_pass'";
		
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
			
			$update_pass = "UPDATE employers SET comp_pass = '$new_pass' WHERE comp_email = '$e'";
			$run_pass = mysqli_query($connection, $update_pass);
			
			echo "<script>window.open('employer_change_pass.php?changed=Your password has been changed successfully!','_self')</script>";
		}
	}
	}
	
	}
?>