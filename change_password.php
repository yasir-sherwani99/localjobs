<?php 
	session_start();
	if(!isset($_SESSION['username'])){
		header('location: jobseeker_signin.php?error=You are not a Member..');
	}else{
 
?>
<?php
	include("includes/connection.php");
	include("functions/functions.php");
	include("functions/profile_functions.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Local Jobs Pakistan</title>
    <link href="images/logo_small.png" type="image/gif" rel="shortcut icon" />
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="styles/index_style.css" />
    <link rel="stylesheet" type="text/css" href="styles/second_style.css" />
    <link href="styles/ddmenu.css" rel="stylesheet" type="text/css" />
    <script src="js/ddmenu.js" type="text/javascript"></script>
    <script src="js/respond.js"></script>

</head>

<body>

<div class="container">

	<!-- This is top bar -->
	<div id="topbar" class="row">
    	<?php include("includes/top_bar.php"); ?>
	</div>

	<!-- This is header -->
	<div id="header" class="row">
		<?php include("includes/header.php"); ?>
    </div>
        <!-- This is navigation bar -->
    
    <nav id="ddmenu" class="row">    
        <?php include("includes/top-nav.php"); ?>
	</nav>

	<!-- This is start of main content area -->
	<div id="contents" class="row">
        
            <?php
				if(isset($_GET['updated'])){
					$update_mess = $_GET['updated'];
					echo "<div id='warning' style='width: 690px;'>
        					<img src='images/icons2/checkmark.png' width='18' height='18' style='float: left;'>
            				<span id='error'>&nbsp;$update_mess</span>
						  </div>";
				}
            ?>
        
        <div id="account_left_side" class="col-md-3 col-sm-3 col-xs-3">
                <div id="dashboard">
                    <?php include("includes/dashboard.php"); ?>
                </div>
        </div> 

		 <div id="account_center" class="col-md-6 col-sm-6 col-xs-9">
			<div id="frame" class="row">
        <!--   	<div id="pic_title" class="col-md-12 col-sm-12 col-xs-12">  -->
      				<div id="title" class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            			<?php getProfileNames(); ?>
	        		</div>
                    <div id="pic" class="col-lg-4 col-md-4 col-sm-4 hidden-xs">
                    	<div class="thumbnail">
            				<?php getProfilePic(); ?> 
                        </div>
                        <div class="caption">
                        	<p style="margin-top: -15px; text-align: center;">
                        	<a href="#" class="btn btn-default btn-xs">Change your Photo</a>
                            </p>
                        </div>
                        
        			</div>
                    

            <!--    </div>    -->
<!--        		<div id="mycv" class="col-md-12 col-sm-12 col-xs-12">
            		<img src="images/icons2/password.png" />
                	<h1>Change your Login information / Password</h1>
                	<div id="contact" class="col-md-12 col-sm-12 col-xs-12">
            			<?php //include("includes/change_pass.php"); ?>
                	
         			</div>  	
	        	</div>  -->	
            	
          	</div>
            <div id="change-password" class="row">
            	<ul class="nav nav-tabs">
            		<li class="active"><a href="#" style="background-color: #F0F0F0;" class="dashboard_title">Change Password</a></li>
             
            	</ul>  
			     <?php include("includes/change_pass.php"); ?>
            </div>  

		</div>
    
<!--		<div id="ads_area">
        	<h1>Ads</h1>
        </div>  -->
    
    
	<!-- This is side bar -->
    <div id="account_right_side" style="border: 0px solid red;" class="col-md-3 col-sm-3 hidden-xs">
    	<?php include("includes/dashboard_account_right_side.php"); ?>
	</div>
    
    <!-- Main Content Ends -->
	</div>
	<!-- This is footer -->

		<?php include("includes/footer_contents.php"); ?>
    
</div>

<!-- JavaScript-->
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
<?php

	
	
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
}
?>