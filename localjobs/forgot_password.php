<?php
	session_start();
	
	include("includes/connection.php");
	include("functions/functions.php");
	include("functions/jobdetail_functions.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Local Jobs Pakistan</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" />  
    <link rel="stylesheet" type="text/css" href="styles/index_style.css" />
    <link rel="stylesheet" type="text/css" href="styles/third_style.css" />
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
		<img src="images/blue1.png" style="border: 1px solid #FFF;"/>
    </div>
        <!-- This is navigation bar -->
    <nav id="ddmenu" class="row">
        <?php include("includes/top-nav.php"); ?>
	</nav>
    
 <div class="row">
     <?php
		
		if(isset($_GET['mess1'])){
			$message1 = $_GET['mess1'];
			echo "<div id='warning' class='alert alert-danger'>
				  	<img src='images/icons2/cross.png' style='width: 20px; height: 20px; float: left;'>&nbsp;&nbsp;
					{$message1}
				  </div>";
		}
		else {
		
			if(isset($_GET['mess'])){
				$message = $_GET['mess'];
				echo "<div id='warning' class='alert alert-success'>
				  	<img src='images/icons2/checkmark2.png' style='width: 20px; height: 20px; float: left;'>&nbsp;&nbsp;
					{$message}
				  </div>";
			}
			
			else {
		
				if(isset($_GET['created'])){
					$create = $_GET['created'];
					echo "<div id='warning' class='alert alert-success'>
				  	<img src='images/icons2/checkmark2.png' style='width: 20px; height: 20px; float: left;'>&nbsp;&nbsp;
					{$create}
				  </div>";
			}

		else
			{
			echo "<div id='warning' class='alert alert-warning'>
        	<img src='images/warning_button.gif'>&nbsp;&nbsp;&nbsp;&nbsp;Your new password will sent to your email address...
        	</div>";
		}
	}
}
    ?>	   
	<!-- This is start of main content area -->
	<div id="contents" style="font-family:Trebuchet MS;" class="col-md-12 col-sm-12 col-xs-12">
    
            <div id="job_title" class="row"><img src="images/icons2/fingerprint.png"><h3>Job Seeker - Forgot Password</h3></div>
            <div id="job_details" style="height: 400px;" class="row">
            	<div id="signin_box" class="col-md-7 col-sm-7 col-xs-12">
                
               	<form method="post" role="form" action="forgot_password.php">
                <table class="table">
                <tr>
                    <td align="right"><label>E-mail: </label></td>
                    <td><input type="text" class="form-control" name="useremail" /></td>
                    <td></td>
                </tr>                
                <tr>
                	<td></td>
                    <td><input type="submit" name="send" class="btn btn-primary" value="Continue" /> <span style="padding-left: 30px;">or</span> 
                    	<span style="padding-left: 10px;"><a href="members_register.php" style="color: #0080FF;">Join LocalJobs</a></span>
                    </td>
                    <td></td>
                </tr>
                </table>
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
	
		<?php include("includes/footer_contents.php"); ?>
	    
</div>

<!-- JavaScript-->
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
<?php
	
	if(isset($_REQUEST['send'])){
	
	$email = cleanStr($_REQUEST['useremail']);
	$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%&*_";
	$password = substr(str_shuffle($chars), 0, 4);
	$password1 = md5($password);
	
	$query = "SELECT * FROM members
			  WHERE mem_email = '$email'";
	
	$result = mysqli_query($connection, $query);
	if(!$result){
		die("Database query has failed:" . mysqli_error());
	}
	
	$check_user = mysqli_num_rows($result);
	if($check_user > 0){
		
		$query_update = "UPDATE members
						 SET mem_pass = '$password1'
						 	 WHERE mem_email = '$email'";
							 
		$run_update = mysqli_query($connection, $query_update);
	
	
		$to = $email;
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		$headers .= 'From: <support@localjobs.pk>';
		
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