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
    <link href="css/bootstrap.min.css" rel="stylesheet" />
	<link rel="stylesheet" type="text/css" href="styles/emp_main_panel_style.css" />	
	<script type="text/javascript" src="js/js_functions.js"></script>
    <script src="js/respond.js"></script>
	<script src="js/jquery.js"></script>
    <script type="text/javascript">

	$(document).ready(function(){
	    toggleFields(); //call this first so we start out with the correct visibility depending on the selected form values
    //this will call our toggleFields function every time the selection value of our underAge field changes
    	$("#location").change(function() {
        	toggleFields();
    	});

	});
//this toggles the visibility of our parent permission fields depending on the current selected value of the underAge field
	function toggleFields() {
    	if($("#location").val() == 28)
        	$("#other_loc").show();
    	else
        	$("#other_loc").hide();
	}

	</script>

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
    <!-- Header area ends -->
    
    <div class="row">
     	<?php include("includes/navigation_main.php"); ?>
    </div>	
    
    <div class="row">
        <!-- Left side area starts -->
        <div id="left_side_area" class="col-md-3 col-sm-3 col-xs-3">
    
            <!-- Navigation area starts -->
            <div id="nav" class="row">
            	<div class="btn-group-vertical">
            
                <a href="main_panel.php"><button class="btn btn-default"><img src="images/clock.png" />Dashboard</button></a>
                <a href="employer_jobs.php"><button class="btn btn-info"><img src="images/icons/list.png" />Jobs</button></a>
                <a href="employer_apps.php"><button class="btn btn-default"><img src="images/icons/folder.png" />Applications</button></a>
                <a href="employer_profile.php"><button class="btn btn-default"><img src="images/icons/group.png" />Profile</button></a>
                <a href="employer_search.php"><button class="btn btn-default"><img src="images/icons/administrator.png" />Search</button></a>
                <a href="#"><button class="btn btn-default"><img src="images/icons/administrator.png" />Saved Resume</button></a>
                <a href="#"><button class="btn btn-default"><img src="images/icons/spreadsheet.png" />Reports</button></a>
                <a href="employer_change_pass.php"><button class="btn btn-default"><img src="images/icons/screwdriver.png" />Options</button></a>
                <a href="employer_logout.php"><button class="btn btn-default"><img src="images/icons/login.png" />Logout</button></a>
            	</div>
            </div>
        
        </div>
    
        
        <!-- Main contents area starts -->
        
        <div id="contents" style="border: hidden;" class="col-md-9 col-sm-9 col-xs-9">
            <div id="tab" class="row">
                <ul class="nav nav-tabs">
                    <li><a href="employer_jobs.php">Jobs</a></li>
                    <li class="active" style="font-weight: bold;"><a href="add_empl_jobs.php">Post Job</a></li>
                </ul>
            </div>
            <?php
                if(isset($_GET['mess'])){
                    $published = $_GET['mess'];
                    echo "<div id='message' class='alert alert-success'>
                            <img src='images/checkmark2.png' width='45' height='45'/>
                            <p id='aa'><b>Congratulations...</b><br/>$published</p>
                          </div>";
                } else {
                    echo "<div id='message' class='alert alert-info'>
                            <img src='images/info.png' width='45' height='45'/>
                          <p id='aa'><b>Post new job</b><br/>Enter the required fields and post a new job ad.						</p>
                    </div>";
                }
            ?>
            <div id="job_form" class="row">
                <?php include("includes/postEmpjob.php"); ?>
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
	if(isset($_SESSION['comp_user'])){
			$user_session = $_SESSION['comp_user'];
						
			$get_employer = "SELECT * FROM employers
							   WHERE comp_email = '$user_session'";
						
			$run_employer = mysqli_query($connection, $get_employer);
						
			$row_employer = mysqli_fetch_array($run_employer);
		
				$comp_id = $row_employer['comp_id'];
		}

	if(isset($_POST['submit'])){
		$company_id = $comp_id;
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
			echo "<script>window.open('add_empl_jobs.php?mess=A job has published successfully...!', '_self')</script>";
		}else{
			exit("Database Query has failed" . mysqli_error());
		}
		
	}
	
	}
?>