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

<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '842048222497902',
      xfbml      : true,
      version    : 'v2.3'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>

<div class="container">

	<!-- This is top bar -->
	<div id="topbar" class="row">
		<div id="topleft" class="col-md-5 col-sm-5 col-xs-12">
        	<ul>
            <?php
        		if(!isset($_SESSION['username'])){
					echo "<li><b>Welcome: </b>Please</li>";
					echo "<li><a href='jobseeker_signin_db.php' style='color: blue;'>Sign In</a> to continue</li>";
				}else{
					echo "<li><b>Welcome: </b>" . $_SESSION['username'] . "</li>";
					echo "<li><a href='members_logout.php' style='color: blue;'>Signout</a></li>";
				}
			?> 
            </ul>   

        </div>
        <div id="topright" class="col-md-3 col-md-offset-4 col-sm-4 col-sm-offset-3 hidden-xs">
	        If you are a Employer? <a href="employers/index.php" target="_blank" style='color: blue;'>Click here</a>
        </div>
	</div>

	<!-- This is header -->
	<div id="header" class="row">
		<img src="images/blue1.png" style="border: 1px solid #FFF;" class="img-responsive" alt="Responsive image"/>
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
				  	<img src='images/icons2/cross.png' style='width: 20px; height: 20px;'>&nbsp;&nbsp;
					{$message1}
				  </div>";
		}
		else {
		
			if(isset($_GET['mess'])){
				$message = $_GET['mess'];
				echo "<div id='warning' class='alert alert-success'>
				  	<img src='images/icons2/checkmark2.png' style='width: 20px; height: 20px;'>&nbsp;&nbsp;
					{$message}
				  </div>";
			}
			
			else {
		
				if(isset($_GET['created'])){
					$create = $_GET['created'];
					echo "<div id='warning' class='row alert alert-success'>
				  	<img src='images/icons2/checkmark2.png' style='width: 20px; height: 20px;'>&nbsp;&nbsp;
					{$create}
				  </div>";
			}

		else
			{
			echo "<div id='warning' class='alert alert-warning'>
        	<img src='images/warning_button.gif' style='width: 20px; height: 20px;'>&nbsp;&nbsp;You are not signed in. Please sign in to continue...
        	</div>";
		}
	}
}
    ?>	
   
	<!-- This is start of main content area -->
	<div id="contents" style="font-family:Trebuchet MS;" class="col-md-12 col-sm-12 col-xs-12">
        
            <div id="job_title" class="row"><img src="images/icons2/login.png"><h3>Job Seeker - Sign In</h3></div>
      
                <div id="job_details" style="height: 400px;" class="row">
                    <div id="signin_box" class="col-md-7 col-sm-7 col-xs-12"> 
                    
                        <form method="post" action="jobseeker_signin_db.php" role="form">
                        <div class="table-responsive">
                            <table class="table">
                            <tr>
                                <td align="right"><label>E-mail: </label></td>
                                <td><input type="text" class="form-control" name="username" /></td>
                                <td></td>
                            </tr>
               
                            <tr>
                                <td align="right"><label>Password: </label></td>
                                <td><input type="password" class="form-control" name="userpass" /></td>
                                <td><span><a href="forgot_password.php" style="color: #390;">Forgot Password?</a></span></td>
                            </tr>
                            
                            <tr>
                                <td></td>
                                <td><input type="submit" name="login" class="btn btn-primary" value="Sign In" /> <span style="padding-left: 20px;">or</span> 
                                    <span style="padding-left: 10px;"><a href="members_register.php" style="color: #0080FF;">Join LocalJobs</a></span>
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

		<?php include("includes/footer_contents.php"); ?>
    
</div>

<!-- JavaScript-->
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
<?php
	
	if(isset($_POST['login'])){
		
	$username = $_POST['username'];
	$password = $_POST['userpass'];
	
	$query = "SELECT * FROM members
			  WHERE mem_email = '$username' && mem_pass = '$password'";
	
	$result = mysqli_query($connection, $query);
	if(!$result){
		die("Database query has failed:" . mysqli_error());
	}
	
	$check_user = mysqli_num_rows($result);
	$row = mysqli_fetch_array($result);
		$first_name = $row['mem_first_name'];
		$last_name = $row['mem_last_name'];

	if($check_user > 0){
		$_SESSION['username'] = $username;
		$_SESSION['mem_first_name'] = $first_name;
		$_SESSION['mem_last_name'] = $last_name;
		
		echo "<script>window.open('my_account.php?mess=You are successfully signed in as a job seeker...','_self')</script>";
	}else{
		echo "<script>window.open('jobseeker_signin_db.php?mess1=Username or Password is Incorrect, Please try again...','_self')</script>";
	}
	
	
	} 
?>
