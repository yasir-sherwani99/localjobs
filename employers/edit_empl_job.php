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
<!--	<script src="ckeditor/ckeditor.js"></script>  -->
    <script src="js/respond.js"></script>
</head>

<body>
<div class="container">
	<!-- This is top bar -->
	<div id="topbar" class="row">
    	<?php include("includes/top_bar.php"); ?>
	</div>

	<!-- Header area starts -->
    <div id="header" class="row">
    	<img src="images/logo.png" />
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
            	<li><a href="employer_jobs.php">Jobs</a></li>
                <li><a href="add_empl_jobs.php">Post Job</a></li>
                <li class="active" style="font-weight: bold;"><a href="#">Update Job</a></li>
            </ul>
        </div>
        <?php
			if(isset($_GET['mess'])){
				$published = $_GET['mess'];
				echo "<div id='message' class='alert alert-success'>
        			  	<img src='images/info.png' width='45' height='45'/>
            		 	<div id='aa'><b>Congratulations...</b><br/>$published</div>
        			  </div>";
			} else {
				echo "<div id='message' class='alert alert-info'>
        				<img src='images/info.png' width='45' height='45'/>
            		  <div id='aa'><b>Update Job</b><br/>Edit the required fields and update a job ad.						</div>
        		</div>";
			}
        ?>
        <div id="job_form" class="row">
        	<?php
				$jobid = @$_GET['job_id'];
				$get_job = "SELECT * FROM company_jobs WHERE job_id = '$jobid'";
				$run_job = mysqli_query($connection, $get_job);
					$row_job = mysqli_fetch_array($run_job);
						$id = $row_job['job_id'];
						$cat_id = $row_job['cat_id'];
						$title = $row_job['job_title'];
						$desc = $row_job['job_desc'];
						$skills = $row_job['job_skills'];
						$min_exp = $row_job['min_exp'];
						$max_exp = $row_job['max_exp'];
						$job_loc = $row_job['job_location'];
				//		$expiry = $row_job['expiry_date'];
						$expiry_day = $row_job['expiry_day'];
						$expiry_month = $row_job['expiry_month'];
						$expiry_year = $row_job['expiry_year'];
						$min_sal = $row_job['min_salary'];
						$max_sal = $row_job['max_salary'];
						$qual = $row_job['job_qual'];
					//	$profile = $row_job['company_profile'];
						$emp_type = $row_job['emp_type'];
						$emp_status = $row_job['emp_status'];
						$vacancies = $row_job['vacancies'];
					//	$company = $row_job['company_name'];
						$contact_person = $row_job['contact_name'];
						$contact_no = $row_job['contact_no'];
						$company_email = $row_job['company_email'];
				//		$reg_emp = $row_job['reg_emp'];
						$keywords = $row_job['job_keywords'];
						
            ?>
        	<?php include("includes/updatejob.php"); ?>
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
		$job_cat = cleanStr($_POST['industry']);
		$job_title = cleanStr($_POST['title']);
		$job_desc = cleanStr($_POST['desc']);
		$job_skills = cleanStr($_POST['skills']);
		$min_exp = cleanStr($_POST['min_exp']);
		$max_exp = cleanStr($_POST['max_exp']);
		$job_location = cleanStr($_POST['location']);
		$industry = cleanStr($_POST['industry']);
	//	$expiry_date = cleanStr($_POST['expiry']);
		$expiry_day = cleanStr($_POST['exp_day']);
		$expiry_month = cleanStr($_POST['exp_month']);
		$expiry_year = cleanStr($_POST['exp_year']);
		$min_salary = cleanStr($_POST['min_salary']);
		$max_salary = cleanStr($_POST['max_salary']);
		$job_qual = cleanStr($_POST['qual']);
	//	$comp_profile = cleanStr($_POST['profile']);
		$emp_type = cleanStr($_POST['emp_type']);
		$emp_status = cleanStr($_POST['emp_status']);
		$vacancies = cleanStr($_POST['vacancies']);
	//	$comp_name = cleanStr($_POST['company']);
		$contact_person = cleanStr($_POST['contact_name']);
		$contact_no = cleanStr($_POST['contact_no']);
		$comp_email = cleanStr($_POST['email']);
	//	$reg_emp = cleanStr($_POST['reg_emp']);
		$job_keywords = cleanStr($_POST['keywords']);
		
		$update_job = "UPDATE company_jobs
					   SET cat_id = '$job_cat', 
					       job_title = '$job_title',
						   job_desc = '$job_desc', 
						   job_skills = '$job_skills', 
						   min_exp = '$min_exp', 
						   max_exp = '$max_exp', 
						   job_location = '$job_location', 
						   expiry_day = '$expiry_day',
						   expiry_month = '$expiry_month',
						   expiry_year = '$expiry_year', 
						   min_salary = '$min_salary', 
						   max_salary = '$max_salary', 
						   job_qual = '$job_qual', 
						   emp_type = '$emp_type', 
						   emp_status = '$emp_status', 
						   vacancies = '$vacancies', 
						   contact_name = '$contact_person', 
						   contact_no = '$contact_no', 
						   company_email = '$comp_email', 
						   job_keywords = '$job_keywords'
						   		WHERE job_id = '$edit_record'"; 
			
		$run_update = mysqli_query($connection, $update_job);
		if($run_update){
			echo "<script>window.open('employer_jobs.php?updated=A job has updated successfully...!', '_self')</script>";
		}else{
			exit("Database Query has failed" . mysqli_error());
		}
		
	}
	
	}
?>