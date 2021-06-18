<?php 
	session_start();
	if(!isset($_SESSION['comp_user'])){
		header('location: index.php?error=You are not an Employer');
	}else{  
 
?>

<?php include("includes/connection.php"); ?>
<?php include("functions/emp_main_panel_functions.php"); ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Local Jobs Pakistan</title>
	<link href="../images/logo_small.png" type="image/gif" rel="shortcut icon" />
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="styles/emp_main_panel_style.css" />
    <script type="text/javascript" src="js/js_functions.js"></script>
    <script src="js/respond.js"></script>
</head>

<body onLoad="myClock()">

<div class="container">

	<!-- This is top bar -->
	<div id="topbar" class="row">
    	<?php include("includes/top_bar.php"); ?>
	</div>

	<!-- This is header -->
	<div id="header" style="background-color: #FFF; border: 1px solid #FFF;" class="row">
		<?php include("includes/header.php"); ?>
	</div>  
    
    <div class="row">
     	<?php include("includes/navigation_main.php"); ?>
    </div>	

	<div class="row">
        <!-- Left side area starts -->
        <div id="left_side_area" class="col-md-3 col-sm-3 col-xs-3">
            <!-- Navigation area starts -->
            <?php include("includes/employer_dashboard.php"); ?>
        
        </div>
        <!-- This is main content area -->
        <div id="contents" style="padding-top: 10px;" class="col-md-9 col-sm-9 col-xs-9">
            <div id="top" class="row">
                <?php
                
                if(isset($_SESSION['comp_user'])){
                    $user_session = $_SESSION['comp_user'];
                                    
                    $get_employer = "SELECT * FROM employers
                                       WHERE comp_email = '$user_session'";
                                    
                    $run_employer = mysqli_query($connection, $get_employer);
                                    
                    $row_employer = mysqli_fetch_array($run_employer);
                    
                    $comp_id = $row_employer['comp_id'];
                    $comp_email = $row_employer['comp_email'];
                    $contact_person = $row_employer['contact_person'];
                    $comp_name = $row_employer['comp_name'];
                    
                    $get_jobs = "SELECT * FROM company_jobs WHERE comp_id = '$comp_id'";
                    $run_jobs = mysqli_query($connection, $get_jobs);
                    $total_jobs = mysqli_num_rows($run_jobs);
        
                    $get_apps = "SELECT * FROM jobs_apply WHERE comp_id = '$comp_id'";
                    $run_apps = mysqli_query($connection, $get_apps);
                    $total_apps = mysqli_num_rows($run_apps);
                                    
                    }
    
                ?>
                <div id="jobs" class="col-md-4 col-sm-4 col-xs-4">
          
         		<?php include("includes/employer_jobs.php"); ?>	
   
                </div>
                
                <div id="apps" class="col-md-4 col-sm-4 col-xs-4">
                
                    <?php include("includes/employer_total_apps.php"); ?>
                     			
                </div>
                
                <div id="clock_day" class="col-md-4 hidden-sm hidden-xs">
                    
                    <?php include("includes/clock.php"); ?> 			
                	
                </div>
               
            </div>
            <div id="latest" class="row">
                <div id="latest_jobs" class="col-md-4 col-sm-4 col-xs-4">
                
                	<?php include("includes/recent_jobs.php"); ?>
                
	        </div>
                <div id="latest_apps" class="col-md-4 col-sm-4 col-xs-4">
                
                	<?php include("includes/recent_apps.php"); ?>
                	
    		</div>
                <div id="corporate_news" class="col-md-4 hidden-sm hidden-xs">
              	  
    			<?php include("includes/quick_stats.php"); ?>
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
<?php	}   ?>