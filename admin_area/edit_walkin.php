<?php 
	session_start();
	if(!isset($_SESSION['username'])){
		header('location: admin_login.php?error=You are not an Administrator');
	}else{
 
?>

<?php include("includes/connection.php"); ?>
<?php include("functions/admin_functions.php"); ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Local Jobs Pakistan</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" />   
	<link rel="stylesheet" type="text/css" href="styles/admin_style.css" />
    <script type="text/javascript" src="js/js_functions.js"></script>
    <script src="js/respond.js"></script>
</head>

<body onLoad="myClock()">
<div class="container">
	<!-- Header area starts -->
    <div id="header" class="row">
    	<?php include("includes/admin_header.php"); ?>    
    </div>
    <!-- Header area ends -->
	<div id="welcome" class="row">
    <?php
		if(isset($_SESSION['admin_name'])){
			$admin = $_SESSION['admin_name'];
			echo "<img src='images/administrator2.png' style='width:25px; height:25px; margin-right: 10px;'><b style='color: #006600'>Welcome: </b>" . $admin . " <a href='admin_logout.php' style='color: blue;'>Signout</a>";
		}
    ?>
    </div>
    
    <!-- Left side area starts --> 
    <div class="row">
    
       
        <div id="left_side_area" class="col-md-3">
            <!-- Navigation area starts -->
            <?php include("includes/dashboard.php"); ?>
       	</div>   
    
    <!-- Navigation area ends -->
        
    <!-- Main contents area starts -->
    
    <div id="contents" class="col-md-9">
    	<div id="tab" class="row">
        	<ul class="nav nav-tabs">
            	<li><a href="walkin.php">Walkin Interviews</a></li>
                <li><a href="add_walkin.php">Post Walkin Interview</a></li>
                <li class="active" style="font-weight: bold;"><a href="edit_walkin.php">Update Walkin Interview</a></li>
            </ul>
        </div>
        <?php
				echo "<div id='message' class='alert alert-info'>
        				<img src='images/info.png' width='45' height='45'/>
            		  <div id='aa'><b>Update Job</b><br/>Edit the required fields and update a job ad.						</div>
        		</div>";
			
        ?>
        <div id="job_form" class="row">
        	<?php
				$jobid = @$_GET['job_id'];
				$get_job = "SELECT * FROM walk_interview WHERE wjob_id = '$jobid'";
				$run_job = mysqli_query($connection, $get_job);
					$row_jobs = mysqli_fetch_array($run_job);
					
						$job_id = $row_jobs['wjob_id'];
						$job_title = $row_jobs['wjob_title'];
					//	$job_desc = $row_jobs['wjob_desc'];
						$job_comp = $row_jobs['wcompany'];
					//	$job_apply = $row_jobs['wapply'];
					//	$min_exp = $row_jobs['wmin_exp'];
					//	$max_exp = $row_jobs['wmax_exp'];
					//	$job_qual = $row_jobs['wqual'];
					//	$job_skills = $row_jobs['wskills'];
						$interview_day = $row_jobs['winterview_day'];
						$interview_month = $row_jobs['winterview_month'];
						$interview_year = $row_jobs['winterview_year'];
					//	$job_addr = $row_jobs['waddress'];
						$job_loc = $row_jobs['wlocation'];
						$post_date = $row_jobs['post_date'];
						$keywords = $row_jobs['wkeywords'];
						
            ?>
        	<?php include("includes/updatewalk.php"); ?>
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
<?php
	if(isset($_POST['update'])){
		$edit_record = $_GET['edit_form'];
		$job_title = cleanStr($_POST['title']);
		$comp_name = cleanStr($_POST['comp_name']);
	//	$job_desc = cleanStr($_POST['desc']);
	//	$job_qual = cleanStr($_POST['qual']);
	//	$job_skills = cleanStr($_POST['skills']);
	//	$min_exp = cleanStr($_POST['min_exp']);
	//	$max_exp = cleanStr($_POST['max_exp']);
		$inter_day = cleanStr($_POST['exp_day']);
		$inter_month = cleanStr($_POST['exp_month']);
		$inter_year = cleanStr($_POST['exp_year']);
		$job_apply = cleanStr($_POST['howapply']);
	//	$job_addr = cleanStr($_POST['comp_addr']);
		$job_location = cleanStr($_POST['location']);
		$job_keywords = cleanStr($_POST['keywords']);
		
		$update_job = "UPDATE walk_interview
					   SET wjob_title = '$job_title',
						   wcompany = '$comp_name',				   
						   winterview_day = '$inter_day', 
						   winterview_month = '$inter_month', 
						   winterview_year = '$inter_year', 
						   wlocation = '$job_location',  
						   wkeywords = '$job_keywords'
						   		WHERE wjob_id = '$edit_record'"; 
			
		$run_update = mysqli_query($connection, $update_job);
		if($run_update){
			echo "<script>window.open('walkin.php?updated=A job has updated successfully...!', '_self')</script>";
		}else{
			exit("Database Query has failed" . mysqli_error());
		}
		
	}
	
	}
?>