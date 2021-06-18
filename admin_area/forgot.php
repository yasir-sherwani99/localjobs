<?php //session_start(); ?>

<?php include("includes/connection.php"); ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Local Jobs Pakistan</title>
	<link href="images/logo_small.png" type="image/gif" rel="shortcut icon" />
    <link href="css/bootstrap.min.css" rel="stylesheet" />   
	<link rel="stylesheet" type="text/css" href="styles/admin_style.css" />
    <script src="js/respond.js"></script>
</head>

<body>
<div class="container">
	<!-- Header area starts -->
    <div id="header" class="row">
    	<div id="admin_heading" class="col-md-offset-4 col-md-4 col-md-offset-4 col-sm-offset-3 col-sm-6 col-sm-offset-3 col-xs-12">
        	<h1>Admin Panel</h1> 
        </div>

    </div>
    <!-- Header area ends -->
        
    <!-- Main contents area starts -->
       
    <div id="main_content_area" class="row">
    	<div id="login_area" style="height: 200px;" class="col-md-offset-3 col-md-6 col-md-offset-3 col-sm-offset-2 col-sm-8 col-sm-offset-2 col-xs-12">
        	<h3>PASSWORD REMINDER</h3><br />
        	<form name="" action="forgot.php" method="post" class="form-horizontal" role="form">
             <div class="form-group"> 
                	<label for="useremail" class="col-md-3 col-sm-3 col-xs-3 control-label">Email</label> 
                    <div class="col-md-9 col-sm-9 col-xs-9"> 
                    	<input type="text" class="form-control" name="useremail" id="useremail" placeholder="Enter Email"> 
                    </div> 
             </div> 
			 <div class="form-group"> 
                    <label class="col-md-offset-3 col-md-9 col-sm-offset-3 col-sm-9 col-xs-12" id="error">
                    &nbsp;<?php echo @$error; ?>
                    </label>
             </div> 
             <div class="form-group"> 
                    <div class="col-md-offset-3 col-md-9 col-sm-offset-3 col-sm-9 col-xs-12"> 
                    
                    	<input type="submit" class="btn btn-default" name="send" value="Send" />&nbsp | <label><a href="admin_login.php">Back</a></label> 
                     </div> 
             </div> 
             </form>

    	</div>
    </div>
    
    <!-- Main contents area ends -->
    
    <!-- Footer area starts -->
    <div id="footer" class="row">
    	<label>Admin Panel</label> <span>Copyright &copy 2015:</span> <label>LocalJobs.PK</label>
    </div>
    <!-- Footer area ends -->
    
</div>

<!-- JavaScript-->
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
<?php
	
	if(isset($_REQUEST['send'])){
	
	$email = $_REQUEST['useremail'];
	$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%&*_";
	$password = substr(str_shuffle($chars), 0, 8);
	$password1 = sha1($password);
	$password2 = substr($password1, 0, 8);
	
	$query = "SELECT * FROM admin_login
			  WHERE admin_email = '$email'";
	
	$result = mysqli_query($connection, $query);
	if(!$result){
		die("Database query has failed:" . mysqli_error());
	}
	
	$check_user = mysqli_num_rows($result);
	if($check_user > 0){
		
		$query_update = "UPDATE admin_login
						 SET admin_pass = '$password2'
						 	 WHERE admin_email = '$email'";
							 
		$run_update = mysqli_query($connection, $query_update);
	
	
		$to = $email;
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		$headers .= 'From: <admin@localjobs.com>';
		
		$subject = "Localjobs.pk: Password Reminder";
		$message = "<b>Hello!</b> <br />
					Please return to the site and log in using the following information. <br/><br/>
					
					<b>Your new password:</b> {$password2} <br/>
					<b>E-mail:</b> {$email} <br/><br/>
					
					Now you can login with this email and password <br/>
					http://localjobs.pk/admin_area/ <br/><br/>
					
					Thanks for helping us keep your account safe,<br/>
 					<i>The LocalJobs.pk Team</i>";
		
		$retval = mail($to, $subject, $message, $headers);
	}
		if($retval == true){
		
		echo "<script>document.getElementById('error').innerHTML='New password has been sent to your email.'</script>";
		
	}else{
		echo "<script>document.getElementById('error').innerHTML='No user exist with this email id'</script>";
	}
	
	}
?>