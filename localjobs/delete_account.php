<?php session_start(); ?>
<?php
	include("includes/connection.php");
	include("functions/functions.php");
	include("functions/profile_functions.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>THElocal Jobs</title>
    <link rel="stylesheet" type="text/css" href="styles/index_style.css" />
    <link rel="stylesheet" type="text/css" href="styles/second_style.css" />
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
					echo "<li>Welcome: </li>";
					echo "<li><a href='jobseeker_login.php'> Login</a></li>";
				}else{
					echo "<li><b>Welcome: </b>" . $_SESSION['username'] . "</li>";
					echo "<li><a href='members_logout.php'> Logout</a></li>";
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
		<img src="images/localjobs_logo.png" />
    </div>
        <!-- This is navigation bar -->
        
    <nav id="ddmenu">   
      <!--  <div id="nav">
        	<ul>
                <li><a href="index.php">HOME</a></li>
                <li><a href="all_latest_jobs.php">BROWSE JOBS</a></li>  
                <li><a href="search_result.php">SEARCH JOBS</a></li>
                <?php 
				/*	if(isset($_SESSION['username'])){
						echo "<li><a href='my_account.php' style='background-color: #6B8E23; color: #FFF;'>DASH BOARD</a></li>";
					}else{
						echo "<li><a href='members_register.php'>POST RESUME</a></li>";
					}   */
				?>
 
                <li><a href="#">EMPLOYERS</a></li>

        	</ul>
    	</div>  -->
        <?php include("includes/top-nav.php"); ?>
	</nav>

	<!-- This is start of main content area -->
	<div id="contents" style="width: 730px;">
    
    	<div id="search" style="margin-bottom: 10px;">
        	<?php include("includes/search.php"); ?>
        </div>
        
            <?php
				if(isset($_GET['updated'])){
					$update_mess = $_GET['updated'];
					echo "<div id='warning' style='width: 690px;'>
        					<img src='images/correct.gif' width='18' height='18' style='float: left;'>
            				<span id='error'>&nbsp;$update_mess</span>
						  </div>";
				}
            ?>
        
        <div id="profile">
 		<div id="dashboard">
        	<?php include("includes/dashboard.php"); ?>
        </div>
   
   		<div id="frame">    
        	<div id="pic">
            	<?php getProfilePic(); ?>
        	</div>
			<div id="title">
            	<?php getProfileNames(); ?>
	        </div>
        	<div id="mycv">
            	<img src="images/icons2/close.png" style="float: left; width: 45px; height: 45px;" />
                <h1 style="padding-left: 50px;">Delete Account</h1>
                <hr />
	        </div>	
            <div id="contact">
                <?php include("includes/delete_account.php"); ?>
                <hr/>
         	</div>
    	</div>
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
