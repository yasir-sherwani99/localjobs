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
	<link href="images/logo_small.png" type="image/gif" rel="shortcut icon" />
    <link href="css/bootstrap.min.css" rel="stylesheet" />   
	<link rel="stylesheet" type="text/css" href="styles/admin_style.css" />
       <script src="//tinymce.cachefly.net/4.2/tinymce.min.js"></script>
       <script>tinymce.init({selector:'textarea'});</script>
    <script src="js/formvalidation.js"></script>
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

    <div class="row">
    
        <!-- Left side area starts -->
        <div id="left_side_area" class="col-md-3">
            <!-- Navigation area starts -->
            <?php include("includes/dashboard.php"); ?> 
       	</div>   
        
    <!-- Navigation area ends -->
    
    <!-- Main contents area starts -->
    
    <div id="contents" class="col-md-9">
    	<div id="tab" class="row">
        	<ul class="nav nav-tabs">
            	<li><a href="jobs.php">Jobs</a></li>
                <li class="active" style="font-weight: bold;"><a href="add_jobs.php">Add Job</a></li>
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
            		  <div id='aa'><b>Add new job</b><br/>Enter the required fields and add a new job ad.						</div>
        		</div>";
			}
        ?>
        <div id="job_form" class="row">
        	<?php include("includes/postjob.php"); ?>
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
	if(isset($_POST['submit'])){
		$job_cat = cleanStr($_POST['industry']);
		$job_title = cleanStr($_POST['title']);
		$job_desc = cleanStr($_POST['desc']);
		$job_skills = cleanStr($_POST['skills']);
		$min_exp = cleanStr($_POST['min_exp']);
		$max_exp = cleanStr($_POST['max_exp']);
		$job_location = cleanStr($_POST['location']);
		$other_city = cleanStr($_POST['other_city']);
		$job_ctry = cleanStr($_POST['job_ctry']);
		$industry = cleanStr($_POST['industry']);
	//	$expiry_date = cleanStr($_POST['expiry']);
		$expiry_day = cleanStr($_POST['exp_day']);
		$expiry_month = cleanStr($_POST['exp_month']);
		$expiry_year = cleanStr($_POST['exp_year']);
		$min_salary = cleanStr($_POST['min_salary']);
		$max_salary = cleanStr($_POST['max_salary']);
		$job_qual = cleanStr($_POST['qual']);
//		$comp_profile = cleanStr($_POST['profile']);
		$emp_type = cleanStr($_POST['emp_type']);
		$emp_status = cleanStr($_POST['emp_status']);
		$vacancies = cleanStr($_POST['vacancies']);
//		$comp_name = cleanStr($_POST['company']);
		$company_id = cleanStr($_POST['comp_name']);
		$contact_person = cleanStr($_POST['contact_name']);
		$contact_no = cleanStr($_POST['contact_no']);
		$comp_email = cleanStr($_POST['email']);
//		$reg_emp = cleanStr($_POST['reg_emp']);
		$job_keywords = cleanStr($_POST['keywords']);
		$status = 'on';
		
		$insert_job = "INSERT INTO company_jobs
					 (cat_id, comp_id, job_title, job_desc, job_skills, min_exp, max_exp, job_location, other_city, job_ctry, expiry_day, expiry_month, expiry_year, min_salary, max_salary, job_qual, emp_type, emp_status, vacancies, contact_name, contact_no, company_email, job_keywords, post_date, status) 
					  VALUES ('$job_cat', '$company_id', '$job_title', '$job_desc', '$job_skills', '$min_exp', '$max_exp', '$job_location', '$other_city', '$job_ctry', '$expiry_day', '$expiry_month', '$expiry_year', '$min_salary', '$max_salary', '$job_qual', '$emp_type', '$emp_status', '$vacancies', '$contact_person', '$contact_no', '$comp_email', '$job_keywords', NOW(), '$status')";
			
		$run_job = mysqli_query($connection, $insert_job);
		if($run_job){
			echo "<script>window.open('add_jobs.php?mess=A job has published successfully...!', '_self')</script>";
		}else{
			exit("Database Query has failed" . mysqli_error());
		}
		
	}
	
	}

?>