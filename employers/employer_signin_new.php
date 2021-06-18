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
	<title>THElocal Jobs</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="styles/employer_style.css" />
    <link rel="stylesheet" type="text/css" href="styles/emp_second_style.css" />
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
		<?php include("includes/header.php"); ?>
    </div>
    
    <div class="row">
     	<?php include("includes/navigation.php"); ?>
    </div>	
    
	<!-- This is start of main content area -->
	<div id="contents" style="border-width: 0px; font-family:Trebuchet MS;" class="row">
    
    <?php
		
		if(isset($_GET['mess1'])){
			$message1 = $_GET['mess1'];
			echo "<div id='warning'>
				  	<img src='images/cross.png' style='width: 20px; height: 20px; float: left;'>&nbsp;&nbsp;
					{$message1}
				  </div>";
		}
		else {
		
			if(isset($_GET['mess'])){
				$message = $_GET['mess'];
				echo "<div id='warning'>
				  	<img src='images/checkmark2.png' style='width: 20px; height: 20px; float: left;'>&nbsp;&nbsp;
					{$message}
				  </div>";
			}
			
			else {
		
				if(isset($_GET['created'])){
					$create = $_GET['created'];
					echo "<div id='warning'>
				  	<img src='images/checkmark2.png' style='width: 20px; height: 20px; float: left;'>&nbsp;&nbsp;
					{$create}
				  </div>";
			}

		else
			{
			echo "<div id='warning'>
        	<img src='images/warning_button.gif'>&nbsp;&nbsp;&nbsp;&nbsp;You are not signed in. Please sign in to continue...
        	</div>";
		}
	}
}
    ?>	
    
       <div id="job_title" class="row"><h3>Employer - Sign in</h3></div>
       <div id="job_details" style="height: 400px;" class="row">
            <div id="signin_box" class="col-md-7 col-sm-7 col-xs-12">
                
                    <form method="post" action="employer_signin_new.php">
                    <table class="table">
                    <tr>
                        <td align="right"><label>E-mail: </label></td>
                        <td><input type="text" name="comp_user" /></td>
                        <td></td>
                    </tr>
       
                    <tr>
                        <td align="right"><label>Password: </label></td>
                        <td><input type="password" name="comp_pass" /></td>
                        <td><span><a href="forgot_password.php" style="color: #390;">Forgot Password?</a></span></td>
                    </tr>
                    
                    <tr>
                        <td></td>
                        <td><input type="submit" name="comp_login" value="Sign In" /> &nbsp;&nbsp;&nbsp;&nbsp;or 
                            <span><a href="members_register.php" style="color: #0080FF;">Join LocalJobs</a></span>
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
    <!-- Main Content Ends -->
    
	
	<!-- This is footer -->
	<div id="footer" class="row">
		
	</div>
    
</div>

<!-- JavaScript-->
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
<?php
	
	if(isset($_POST['comp_login'])){
	
	$comp_user = $_POST['comp_user'];
	$comp_pass = $_POST['comp_pass'];
	
	$query = "SELECT * FROM employers
			  WHERE comp_email = '$comp_user' && comp_pass = '$comp_pass'";
	
	$result = mysqli_query($connection, $query);
	if(!$result){
		die("Database query has failed:" . mysqli_error());
	}
	
	$check_user = mysqli_num_rows($result);
	if($check_user > 0){
		$_SESSION['comp_user'] = $comp_user;
		echo "<script>window.alert('You are logged in succsssfully as an Employer!')</script>";
		echo "<script>window.open('main_panel.php','_self')</script>";
	}else{
		echo "<script>window.open('employer_signin_new.php?mess1=Username or Password is Incorrect, Please try again...','_self')</script>";
	}
	}
	
?>