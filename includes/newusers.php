<?php session_start(); ?>
<?php
	include("includes/connection.php");
	include("functions/functions.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>The LocalJOBS PK</title>
<link rel="stylesheet" href="styles/style.css" media="all" type="text/css" />
<link rel="stylesheet" href="styles/style2.css" media="all" type="text/css" />
</head>

<body>
<!-- Main Container Starts -->
<div id="container">
	<!-- Top Bar Starts -->
	<div id="topbar">
    	<div id="welcome">
        	<?php
        		if(!isset($_SESSION['username'])){
					echo "Welcome: Guest! - ";
					echo "<a href='login.php'> Login</a>";
				}else{
					echo "<b>Welcome:" . $_SESSION['username'] . "</b>";
					echo "<a href='members_logout.php'> Logout</a>";
				}
			?>
        </div>
		<div id="register">New User, <a href="newusers.php">Register Now</a></div>
	</div>
    <!-- Top Bar ends -->
	<!-- Header Starts -->
	<div id="header">
    	<?php include("includes/menu.php"); ?>
    </div>
    <!-- Header Ends -->
    <!-- Main Content starts -->
	<div id="contents">
        <div id="center_bar">
        	<div id="left_side">
            <div class="centerbar_title">FEATURED JOBS</div>
            <?php getJobs(); ?>
             <a href="all_jobs.php"><button>View All Jobs</button></a>
            </div>
            <div id="right_side">
           	  <div id="main">
                    <?php include("includes/search.php"); ?>
                    	<?php getCatJob(); ?>
                    	<?php getCityJob(); ?>
                        <div class="centerbar_title">NEW USER REGISTER</div>
                        	<ul style="list-style-type: square; margin-left: 30px; border: 0px solid red;">
                            	<li><a href="members_register.php">Register as Job Seeker</a></li>
                                <li><a href="company_register.php">Register as Employeer</a></li>
                            </ul>
                        	<!-- <form action="login.php" method="post">
							<table style="margin-left: 10px;">
							<tr>
    							<td>Username</td>
    						</tr>
    						<tr>
								<td><input type="text" name="username" placeholder="Enter your email" /></td>
							</tr>
                            <tr>
    							<td>Password</td>
    						</tr>
							<tr>
								<td><input type="password" name="userpass" placeholder="Enter your password" /></td>
							</tr>
							<tr>
								<td><a href="forget.php">Forget Password</a></td>
							</tr>
							<tr>
								<td><input type="submit" name="login" value="Login" /></td>
							</tr>
							</table>
							</form>  -->
		            	</div>
  				<div id="ad">
                  <?php //include("includes/job_seeker.php"); ?> 
				</div>
			</div>
            <div id="center_side">
            	<div class="centerbar_title">JOBS BY CATEGORY</div>
                <ul class="cats">
                	<?php getCats(); ?>	
                </ul>
            </div>
            <div id="city_side">
            	<div class="centerbar_title">JOBS BY CITY</div>
                <ul class="cats">
                	<?php getCity(); ?>	
                </ul>
            </div>
           
       	</div>
	</div>
    
    <!-- Main Content Ends -->
	<!-- Footer Starts -->
	<div id="footer">
    </div>
    <!-- Footer Ends -->

</div>
<!-- Main Container Ends -->
</body>
</html>
<?php
/*	
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
	if($check_user > 0){
		$_SESSION['username'] = $username;
		echo "<script>window.alert('You are logged in succsssfully!')</script>";
		echo "<script>window.open('index.php','_self')</script>";
	}else{
		echo "<script>window.alert('Username or Password is Incorrect!')</script>";
	}
	} */
?>