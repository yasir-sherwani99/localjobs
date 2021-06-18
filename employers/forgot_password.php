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
	<link href="../images/logo_small.png" type="image/gif" rel="shortcut icon" />
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="styles/employer_style.css" />
    <script type="text/javascript" src="js/formvalidation.js"></script>
	<script src="js/respond.js"></script>	
</head>

<body>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.4&appId=779716815444739";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div class="container">

	<!-- This is top bar -->
	<div id="topbar" class="row">
		<div id="topleft" class="col-md-5 col-sm-5 col-xs-12">
        	<ul>
            <?php
        		if(!isset($_SESSION['comp_user'])){
					echo "<li><b>Welcome: </b>Please</li>";
					echo "<li><a href='employer_signin.php' style='color: blue;'>Sign In</a> to continue</li>";
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
		<?php include("includes/header.php"); ?> 
    </div>
    
    <div class="row">
     	<?php include("includes/navigation.php"); ?>
    </div>
    	
   <div class="row">
	  
    
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
        <!-- This is start of main content area -->
	<div id="contents" style="font-family:Trebuchet MS; border: hidden;" class="col-md-12 col-sm-12 col-xs-12">
    
        

                <div id="job_details" style="height: 400px;" class="row">
                	<div  class="row">
                        <div id="signin_box" class="col-md-7 col-sm-7 col-xs-12"> 
                
                     <!--       <form method="post" action="forgot_password.php">
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
                            </form>  -->
                            <div class="panel panel-warning">
                    <div class="panel-heading">
                        <label class="panel-title" style="font-size: 20px; font-family: Verdana;"> Forgot Password</label>
                        
                    </div>
                    <div class="panel-body">
                        <form method="post" action="forgot_password.php" role="form">
                            <div class="form-group" id="authenticate_email">
                                <label for="email">E-mail</label>
                                <input type="text" class="form-control" name="useremail" placeholder="Enter Your Email"/>
                            </div>
							<div class="form-group">
                                <label id="error" style="color: red;">&nbsp;</label>
                                <label>New User?<a href="emp_register.php" style="color: #390;"> Sign Up!</a></label>
                            </div>
                            <div class="form-group">
                                <label id="error" style="color: red;">&nbsp;</label>
                                <label>Already a Member?<a href="employer_signin.php" style="color: #390;"> Sign In!</a></label>
                            </div>
            				<input type="submit" name="send" value="Continue" class="btn btn-primary"/>
                        </form>               
                            
					</div>
                </div>

	  					</div>
        		        <div id="like_us_on_facebook" class="col-md-5 col-sm-5 hidden-xs">
                			<h3>Like us on Facebook :)</h3>
                            <div id="facebook_like_box">
                            <div class="fb-page" data-href="https://www.facebook.com/localjobspak" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="false"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/localjobspak"><a href="https://www.facebook.com/localjobspak">Facebook</a></blockquote></div></div>
                            </div>
                    	</div>
                	</div>
            	</div>
    </div>   
    <!-- Main Content Ends -->
    
</div>	
	<!-- This is footer -->
	<div id="footer" class="row">
		<?php include("includes/footer_contents.php"); ?>
	</div>
    
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
		$headers .= 'From: <admin@localjobs.pk>';
		
		$subject = "Localjobs.pk: Password Reminder";
		$message = "<b>Hello!</b> <br />
					Please return to the site and log in using the following information. <br/><br/>
					
					<b>Your new password:</b> {$password2} <br/>
					<b>E-mail:</b> {$email} <br/><br/>
					
					Now you can login with this email and password <br/>
					http://www.localjobs.pk/employers/employer_signin.php <br/><br/>
					
					Thanks for helping us keep your account safe,<br/>
 					<i>The LocalJobs.pk Team</i>";
		
		$retval = mail($to, $subject, $message, $headers);
	}
		if($retval == true){
			
		echo "<script>window.open('forgot_password.php?mess=New password has been sent to your email.','_self')</script>";
	}else{
		echo "<script>window.open('forgot_password.php?mess1=No user exist with this email id','_self')</script>";
	}

	
	}
?>