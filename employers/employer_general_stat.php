<?php 
	session_start();
	if(!isset($_SESSION['comp_user'])){
		header('location: index.php?error=You are not an Administrator');
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
    <script src="js/respond.js"></script>
</head>

<body>
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
	}
				
?>
<div class="container">
	<!-- This is top bar -->
	<div id="topbar" class="row">
    	<?php include("includes/top_bar.php"); ?>
	</div>

	<!-- Header area starts -->
    <div id="header" class="row">
    	<?php include("includes/header.php"); ?> 
    </div>
    
    <div class="row">
     	<?php include("includes/navigation_main.php"); ?>
    </div>	
    <!-- Header area ends -->
    
    <div class="row">
    <!-- Left side area starts -->
    	 <div id="left_side_area" class="col-md-3 col-sm-3 col-xs-3">
            <!-- Navigation area starts -->
			<?php include("includes/employer_dashboard.php"); ?>        
        </div>
    
    <!-- Main contents area starts -->
    
    <div id="contents" style="padding-top: 10px;" class="col-md-9 col-sm-9 col-xs-9">
    	<div id="tab" class="row">
        	<ul class="nav nav-tabs">
            	<li><a href="employer_reports.php">Quick Stats</a></li>
                <li class="active" style="font-weight: bold;"><a href="#">General Stats</a></li>
                <li><a href="employer_jobs_stat.php">Job Stats</a></li>
            </ul>
        </div>
        
        <?php
			 if(isset($_GET['deleted'])){
				 $deleted = $_GET['deleted'];
				 echo "<div id='message' class='alert alert-danger'>
        				<img src='images/checkmark.png' width='25' height='25'/>
            			<div id='aa'>$deleted</div>
        		</div>"; 
			 }
			 if(isset($_GET['updated'])){
				 $updated = $_GET['updated'];
				 echo "<div id='message' class='alert alert-success'>
        				<img src='images/checkmark.png' width='25' height='25'/>
            			<div id='aa'>$updated</div>
        		</div>"; 
			 }
			 
		?>

        <div id="all_jobs" style="height: 350px; background-color:#FFF; font-size: 14px;" class="row">
          <div class="table-responsive">
                <table border="0" class="table table-bordered" style="width: 70%;">
                <tr>
                	<td colspan="5" style="color: #F00;">General Stats</td>
                </tr>
                <tr class="success">
                	<th></th>
                    <th style="text-align: center;">Whole Period</th>
                    <th style="text-align: center;">This Month</th>
                    <th style="text-align: center;">Whole Week</th>
                    <th style="text-align: center;">Today</th>
                </tr>
                <tr>
                    <td style="color: #0080FF; width: 30%;">Regular Jobs Posted</td>
                    <td style="text-align: center; width: 20%;"><span class="badge num"><?php echo totalEmployerJobs($comp_id) ?></span></td>
                    <td style="text-align: center; width: 20%;"><span class="badge num"><?php echo currentmonthJobs($comp_id); ?></span></td>
                    <td style="text-align: center; width: 20%;"><span class="badge num"><?php echo currentWEEKJobs($comp_id); ?></span></td>
                    <td style="text-align: center; width: 10%;"><span class="badge num"><?php echo TodayJobs($comp_id); ?></span></td>
                </tr>
                
                <tr>
                    <td style="color: #0080FF;">Application Received</td>
                    <td style="text-align: center;"><span class="badge num"><?php echo countEmployerApps($comp_id); ?></span></td>
                    <td style="text-align: center;"><span class="badge num"><?php echo currentmonthApplication($comp_id); ?></span></td>
                    <td style="text-align: center;"><span class="badge num"><?php echo currentWEEKApplication($comp_id); ?></span></td>
                    <td style="text-align: center;"><span class="badge num"><?php echo TodayApps($comp_id); ?></span></td>
                </tr>
                <tr>
                    <td style="color: #0080FF;">Resumes Viewed</td>
                    <td style="text-align: center;"><span class="badge">0</span></td>
                    <td style="text-align: center;"><span class="badge num">0</span></td>
                    <td style="text-align: center;"><span class="badge num">0</span></td>
                    <td style="text-align: center;"><span class="badge num">0</span></td>
                </tr>
              
                </table>
           </div>  
        </div>
   	</div>
    
 </div>
    <!-- Main contents area ends -->
     <!-- Footer area starts -->
    <div id="footer" class="row">
    	<?php include("includes/footer_contents.php"); ?>
    </div>
    <!-- Footer area ends -->

</div>
<!-- JavaScript-->
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
<?php } ?>