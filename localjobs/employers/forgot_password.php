<?php
	session_start();
	
	include("includes/connection.php");
	include("functions/emp_main_panel_functions.php");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Local Jobs Pakistan</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="styles/employer_style.css" />
    <script type="text/javascript" src="js/formvalidation.js"></script>
	<script src="js/respond.js"></script>	
</head>

<body>

<div class="container">

	<!-- This is top bar -->
	<div id="topbar" class="row">
		<div id="topleft" class="col-md-5 col-sm-5 col-xs-12">
        	<ul>
            <?php
        		if(!isset($_SESSION['comp_user'])){
					echo "<li><b>Welcome: </b>Please</li>";
					echo "<li><a href='index.php' style='color: blue;'>Sign In</a> to continue</li>";
				}else{
					echo "<li><b>Welcome: </b>" . $_SESSION['comp_user'] . "</li>";
					echo "<li><a href='employer_logout.php' style='color: blue;'>Signout</a></li>";
				}
			?> 
            </ul>   
        </div>
        <div id="topright" class="col-md-3 col-md-offset-4 col-sm-4 col-sm-offset-3 hidden-xs">
        	If you are a Jobseeker? <a href="../index.php" target="_blank">Click here</a>
        </div>
    </div>

	<!-- This is header -->
	<div id="header" class="row">
		<img src="images/logo.png" />
    </div>
    
    <div class="row">
     	<?php include("includes/navigation.php"); ?>
    </div>
    	
	<!-- This is start of main content area -->
	<div id="contents" style="font-family:Trebuchet MS; border: hidden;" class="row">
    
    <?php
		
		if(isset($_GET['mess1'])){
			$message1 = $_GET['mess1'];
			echo "<div id='warning' class='alert alert-danger'>
				  	<img src='images/cross.png' style='width: 20px; height: 20px; float: left;'>&nbsp;&nbsp;
					{$message1}
				  </div>";
		}
		else {
		
			if(isset($_GET['mess'])){
				$message = $_GET['mess'];
				echo "<div id='warning' class='alert alert-success'>
				  	<img src='images/checkmark2.png' style='width: 20px; height: 20px; float: left;'>&nbsp;&nbsp;
					{$message}
				  </div>";
			}
			
			
		else
			{
			echo "<div id='warning' class='alert alert-warning'>
        	<img src='images/warning_button.gif'>&nbsp;&nbsp;&nbsp;&nbsp;You are not signed in. Please sign in to continue...
        	</div>";
		}
	}

    ?>	
    
         <h3>Employer - Forgot Password</h3>
                <div id="job_details" style="height: 400px;" class="col-md-12 col-sm-12 col-xs-12">
                	<div  class="row">
                        <div id="signin_box" class="col-md-7 col-sm-7 col-xs-12"> 
                
                            <form method="post" action="forgot_password.php">
                            <div class="table-responsive">
                            <table class="table table-condensed">
                            <tr>
                                <td align="right"><label>E-mail: </label></td>
                                <td><input type="text" name="useremail" /></td>
                                <td></td>
                            </tr>
                               
                            <tr>
                                <td></td>
                                <td><input type="submit" class="btn btn-primary" name="send" value="Continue" /> &nbsp;&nbsp;&nbsp;&nbsp;or 
                                    <span><a href="emp_register.php" style="color: #0080FF;">Join LocalJobs</a></span>
                                </td>
                                <td></td>
                            </tr>
                            </table>
                            </div>
                            </form>

	  					</div>
        		        <div id="like_us_on_facebook" class="col-md-5 col-sm-5 hidden-xs">
                			<h3><span class="glyphicon glyphicon-heart"></span> Like us on Facebook :)</h3>
                            <div id="facebook_like_box">
                            </div>
                    	</div>
                	</div>
            	</div>
    </div>   
    <!-- Main Content Ends -->
    
	
	<!-- This is footer -->
	<div id="footer" class="row">
		<?php include("includes/footer_contents.php"); ?>
	</div>
    
</div>

</body>
</html>
<?php
	
	if(isset($_REQUEST['send'])){
	
	$email = $_REQUEST['useremail'];
	$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%&*_";
	$password = substr(str_shuffle($chars), 0, 4);
	$password1 = md5($password);
	
	$query = "SELECT * FROM employers
			  WHERE comp_email = '$email'";
	
	$result = mysqli_query($connection, $query);
	if(!$result){
		die("Database query has failed:" . mysqli_error());
	}
	
	$check_user = mysqli_num_rows($result);
	if($check_user > 0){
		
		$query_update = "UPDATE employers
						 SET comp_pass = '$password1'
						 	 WHERE comp_email = '$email'";
							 
		$run_update = mysqli_query($connection, $query_update);
	
	
		$to = $email;
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		$headers .= 'From: <yasir.sherwani@yahoo.com>';
		
		$subject = "Password Reminder";
		$message = "Hello!
					Your new password: {$password1}
					E-mail: {$email}
					Now you can login with this email and password";
		
		$retval = mail($to, $subject, $message, $headers);
	}
		if($retval == true){
			
		echo "<script>window.open('forgot_password.php?mess=New password has been sent to your email.','_self')</script>";
	}else{
		echo "<script>window.open('forgot_password.php?mess1=No user exist with this email id','_self')</script>";
	}

	
	}
?>