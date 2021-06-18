<?php session_start(); ?>
<?php
	include("includes/connection.php");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>THElocal Jobs</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="styles/employer_style.css" />
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
		<img src="images/logo.png" />
    </div>
    
    <div class="row">
     	<?php include("includes/navigation.php"); ?>
    </div>	
	
	<!-- This is main content area -->
	<div id="contents" class="row">
    
    	<div id="employer_ad" class="col-md-12 col-sm-12 hidden-xs">
        	<div class="row">
                <div id="pic" class="col-md-4 col-sm-4 hidden-xs">
                    <img src="images/Hiring.jpg">
                </div>
                <div id="free_trial" class="col-md-8 col-sm-8 hidden-xs">
                    <h1>HIRE GREAT PEOPLE</h1>
                    <h2>The Best Professionals in PAKISTAN</h2>
                    <a href="emp_register.php"><button class="btn btn-warning btn-lg">Start your Free Trial</button></a>
                    <h5>Already registered ? <a href="employer_signin.php">Sign in</a></h5>
                </div>
            </div>
        </div>
        
        <div id="search_bar" class="col-md-12 col-sm-12 hidden-xs">
         
         <nav class="navbar navbar-default" role="navigation"> 
         	<div class="navbar-header"> 
            	<a class="navbar-brand" href="#">Try Searching our CV Database</a> 
            </div> 
            <div> 
            	<form class="navbar-form navbar-left" role="search"> 
                <div class="form-group"> 
                	<input type="search" class="form-control" placeholder="Search by Keywords (e.g. Software Engineer, Sales Executive...)"> 
                </div>
                <input type="submit" class="btn btn-default" name="search" value="GO!" /> 
                </form> 
            </div> 
          </nav>
                
        </div>
        
        <div id="main_area" class="col-md-12 col-sm-12 col-xs-12">
          <div class="row">	
        	<div id="jobs" class="col-md-4 col-sm-4">
                 	<div class="panel panel-primary">
                    	<div id="latest_jobs" class="panel-heading">
                        	<label class="panel-title"><span class="glyphicon glyphicon-user"></span> Advertise Your Jobs</label>
                     	</div>
                    	<div class="panel-body">
               
                            <p>
                                Get more applicant in less time with an average of <b>400+</b> applicants per month.
                            </p>
                            <p>
                                Find the <b>best quality</b> university graduates and professionals.
                            </p>
                            <p>
                                <b>Save time</b> with our simple to use screening and filtration tools.
                            </p>
                            <p>
                                Get daily or weekly <b>email digests</b> with new applicants.
                            </p>
                            <p>
                                Signup now to <b><a href="#">Start Posting Jobs!</a></b>
                            </p>
						</div>
                    </div>
             </div>   
            <div id="cvs" class="col-md-4 col-sm-4">
                	<div class="panel panel-primary">
                    	<div id="latest_jobs" class="panel-heading">
                        	<label class="panel-title"><span class="glyphicon glyphicon-user"></span> Search CVs</label>
                     	</div>
                    	<div class="panel-body">

                            <p>
                                <b>Thousands</b> of updated CVs are added monthly.
                            </p>
                            <p>
                                Find the talent you need precisely with our next generation <b>CV Search Technology.</b> 
                            </p>
                            <p>
                                Find candidates with the skills and experience you need and close to your location. e.g. <b>Sales Manager in Karachi</b>
                            </p>
                            <p>
                                You can even <b style="color: #3399FF;"><a href="#">Try Out the Search</a></b> right now.
                            </p>
            
						</div>
                    </div>
             </div>   
                        
            <div id="login" class="col-md-4 col-sm-4">
                	<div class="panel panel-primary">
                    	<div id="latest_jobs" class="panel-heading">
                        	<label class="panel-title"><span class="glyphicon glyphicon-user"></span> Employer Sign In</label>
                     	</div>
                    	<div class="panel-body">
                                     <form method="post" action="" role="form">
                            	<div class="form-group">
                                	<label for="email">E-mail</label>
                                    <input type="text" class="form-control" name="comp_user" id="email" placeholder="Enter Email"/>
                                </div>
                            	<div class="form-group">
                                	<label for="password">Password</label>
                                    <input type="password" class="form-control" name="comp_pass" id="password" placeholder="Enter Password"/>
                                </div>
								<div class="form-group">
                                	<label id="error" style="color: red;">&nbsp;</label>
                                    <label><a href="forgot_password.php" style="color: #390;">Forgot Password?</a></label>
                                </div>
            				    <input type="submit" name="comp_login" value="Sign In" class="btn btn-primary btn-sm"/>
                             </form>               

 					 </div>
                 </div>
            </div>
     </div>   
     </div>    
     <div id="start_compaign" class="col-md-12 col-sm-12 hidden-xs">
     	<div class="row">
        	<div id="already_register" class="col-md-5 col-sm-5 hidden-xs">
            	<a href="employer_signin.php"><button class="btn btn-success btn-lg">
                		Already Registered Employer<br/>
                        <span>Sign-In</span>
                </button></a>
            </div>
            <div id="or" class="col-md-2 col-sm-2">OR</div>
            <div id="new_user_free_trial" class="col-md-5 col-sm-5 hidden-xs">
            	<a href="emp_register.php"><button class="btn btn-warning btn-lg">
                		Signup for Free Trial<br/>
                        <span>Post Jobs for Free!</span>
                </button></a>
            </div>
      	</div>
      </div>
        
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
	
	$row = mysqli_fetch_array($result);
		$comp_name = $row['comp_name'];

	if($check_user > 0){
		$_SESSION['comp_user'] = $comp_user;
		$_SESSION['comp_name'] = $comp_name;
	//	echo "<script>window.alert('You are logged in succsssfully as an Employer!')</script>";
		echo "<script>window.open('main_panel.php','_self')</script>";
	}else{
		echo "<script>document.getElementById('error').innerHTML='Username or Password is Incorrect'</script>";
	}
	
	
	}
?>