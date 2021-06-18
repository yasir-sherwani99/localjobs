<?php session_start(); ?>
<?php
	include("includes/connection.php");
	include("functions/functions.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>THElocal Jobs</title>
    <link rel="stylesheet" type="text/css" href="styles/index_style.css" />
    <link rel="stylesheet" type="text/css" href="styles/third_style.css" />
    <link href="styles/ddmenu.css" rel="stylesheet" type="text/css" />
    <script src="js/ddmenu.js" type="text/javascript"></script>
</head>

<body>

<div id="container">

	<!-- This is top bar -->
	<div id="topbar">
		<div id="topleft">
			<ul>
            <?php
        		if(!isset($_SESSION['username'])){
					echo "<li><b>Welcome: </b>Please</li>";
					echo "<li><a href='jobseeker_signin.php' style='color: blue;'>Sign In</a> to continue</li>";
				}else{
					echo "<li><b>Welcome: </b>" . $_SESSION['username'] . "</li>";
					echo "<li><a href='members_logout.php' style='color: blue;'>Signout</a></li>";
				}
			?> 
            </ul>   
        </div>
        <div id="topright">
        If you are a Employer? <a href="#">Click here</a>
        </div>
	</div>

	<!-- This is header -->
	<div id="header">
		<img src="images/blue1.png" style="border: 1px solid #FFF; margin-top: 7px;"/>
    </div>
        <!-- This is navigation bar -->
        
     <nav id="ddmenu">
        <?php include("includes/top-nav.php"); ?>
	</nav>

	<!-- This is start of main content area -->
	<div id="contents">
        <div id="all_jobs">
        	<h1>All Category Jobs</h1>
            <h2>LocalJOBS.com is providing all latest Featured Jobs in Pakistan. Find and apply for featured jobs in Pakistan via LatestJOBS.com Find below latest jobs in all major cities of Pakistan.</h2>
        	<?php include("includes/all_category_new.php"); ?>
        </div>

    	
	</div>
    <!-- Main Content Ends -->
    
	<!-- This is side bar -->
	<div id="sidebar">
		  
	</div>
	
	<!-- This is footer -->
	<div id="footer">
		<?php include("includes/footer_contents.php"); ?>
	</div>
    
</div>

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
	if($check_user > 0){
		$_SESSION['username'] = $username;
		echo "<script>window.alert('You are logged in succsssfully as a Job Seeker!')</script>";
		echo "<script>window.open('index.php','_self')</script>";
	}else{
		echo "<script>document.getElementById('error').innerHTML='Username or Password is Incorrect'</script>";
	}
	
	
	}
?>