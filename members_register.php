<?php //session_start();
 ?>
<?php
	include("includes/connection.php");
	include("functions/functions.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Job Seeker Registration</title>
    <meta name="keywords" content="Job Seeker Registration | Join Now" />
	<meta name="description" content="Job Seeker Registration and profile creation" />
	<link href="images/logo_small.png" type="image/gif" rel="shortcut icon" />
    <link href="css/bootstrap.min.css" rel="stylesheet" /> 
    <link rel="stylesheet" type="text/css" href="styles/index_style.css" />
    <link rel="stylesheet" type="text/css" href="styles/second_style.css" />
    <link href="styles/ddmenu.css" rel="stylesheet" type="text/css" />
    <script src="js/ddmenu.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/formvalidation.js"></script>
    <script src="js/respond.js"></script>
    <script src="js/jquery.js"></script>
    <script src="js/jquery_functions_mem.js"></script>

</head>

<body>


<div class="container">

	<!-- This is top bar -->
	<div id="topbar" class="row">
		<div id="topleft" class="col-md-5 col-sm-5 col-xs-12">
        	<ul>
            	<li>ALREADY A MEMBER?</li>
                <li><a href="jobseeker_signin.php">Click Here</a></li>
            </ul>
        </div>
        <div id="topright" class="col-md-3 col-md-offset-4 col-sm-4 col-sm-offset-3 hidden-xs">
       		 If you are a Employer?&nbsp;<a href="employers/index.php" target="_blank" style='color: blue;'>Click here</a>
        </div>
	</div>

	<!-- This is header -->
	<div id="header" class="row">
		<?php include("includes/header.php"); ?>
    </div>
        <!-- This is navigation bar -->
    <nav id="ddmenu" class="row">
        <?php include("includes/top-nav.php"); ?>
	</nav>

	<!-- This is start of main content area -->

<div class="row">    
  <div id="contents" class="col-md-12">

	<div class="row">    
        <div id="form" class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-12">
        	 <h1><span class="glyphicon glyphicon-king"></span> New User? Please Sign Up</h1><br /> 	            
             <?php include("includes/newuser_reg.php"); ?>  
        </div> 
            
     </div> 
   </div>  
 </div>   
    <!-- Main Content Ends -->
    	
	<!-- This is footer -->

		<?php include("includes/footer_contents.php"); ?>
    
</div>

<!-- JavaScript-->
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>


<?php
	if(isset($_POST['register'])){
		$mem_email = cleanStr($_POST['m_email']);
		$mem_pass = cleanStr($_POST['m_pass']);
		$mem_f_name = cleanStr($_POST['f_name']);
		$mem_l_name = cleanStr($_POST['l_name']);
		$mem_gender = cleanStr($_POST['m_gender']);
		$dob_day = cleanStr($_POST['dob_day']);
		$dob_month = cleanStr($_POST['dob_month']);
		$dob_year = cleanStr($_POST['dob_year']);
		$mem_city = cleanStr($_POST['location']);
		$mem_city_other = cleanStr($_POST['other_location']);
		$mem_ctry = cleanStr($_POST['m_ctry']);
		$mem_mobile = cleanStr($_POST['m_mobile']);
		$mem_home_ph = cleanStr($_POST['h_mobile']);
		$mem_edu_level = cleanStr($_POST['m_edu_level']);
		$mem_degree_title = cleanStr($_POST['degree_title']);
		$mem_majors = cleanStr($_POST['majors']);
		$mem_institute_city = cleanStr($_POST['institute_city']);
		$mem_institute_ctry = cleanStr($_POST['institute_ctry']);
		$mem_institute_name = cleanStr($_POST['institute_name']);
		$mem_complete_year = cleanStr($_POST['complete_year']);
		$mem_industry = cleanStr($_POST['industry']);
		$mem_experience = cleanStr($_POST['experience']);
		$first_job_day = cleanStr($_POST['job_start_day']);
		$first_job_month = cleanStr($_POST['job_start_month']);
		$first_job_year = cleanStr($_POST['job_start_year']);
		$current_job_title = cleanStr($_POST['current_job_title']);
		$mem_exp_year = cleanStr($_POST['m_exp_year']);
		$mem_exp_month = cleanStr($_POST['m_exp_month']);
		$current_start_day = cleanStr($_POST['current_start_day']);
		$current_start_month = cleanStr($_POST['current_start_month']);
		$current_start_year = cleanStr($_POST['current_start_year']);
		$end_date = cleanStr($_POST['current_end_year']);
		$comp_name = cleanStr($_POST['comp_name']);
		$comp_ctry = cleanStr($_POST['comp_ctry']);
		$comp_city = cleanStr($_POST['comp_city']);
		$cv_headline = cleanStr($_POST['cv_headline']);
		$mem_cv = cleanStr($_FILES['m_cv']['name']);
		$mem_cv_tmp = $_FILES['m_cv']['tmp_name'];
                $mem_size = $_FILES['m_cv']['size'];
		$mem_type = $_FILES['m_cv']['type'];
		$profile_status = 'Active';
		$pref_job = cleanStr($_POST['prefer_job']);
		$pref_job_loc = cleanStr($_POST['prefer_job_loc']);
		$exp_sal = cleanStr($_POST['salary_exp']);
		
		
		$querycheck = "SELECT * FROM members WHERE mem_email = '$mem_email'";
		$runcheck = mysqli_query($connection, $querycheck);
		$checkuser = mysqli_num_rows($runcheck);
		
		if($mem_email == ""){
			echo "<script>document.getElementById('error').innerHTML='Email is required'</script>";
			exit();
		}
		
		if($checkuser >= 1){
			echo "<script>document.getElementById('error').innerHTML='Email is already registered.'</script>";
			exit();
		}
		
		$allowedExts = array(
  			"pdf", 
  			"doc", 
  			"docx"
		); 

		$allowedMimeTypes = array( 
  			'application/msword',
  			'application/pdf'
		);

		$extension = end(explode(".", $mem_cv));

		if ( 512000 < $mem_size ) {
  			echo "<script>document.getElementById('error26').innerHTML='File size should be less than 500KB'</script>";
			exit();
		}

		if ( ! ( in_array($extension, $allowedExts ) ) ) {
  			echo "<script>document.getElementById('error26').innerHTML='File type should be docx or pdf'</script>";
			exit();
		}

		else 
		{     
		
		$randString = md5(time());
		$randString1 = substr(str_shuffle($randString), 0, 8);
		$splitName = explode(".", $mem_cv);
		$fileExt = end($splitName);
		$newCVname  = strtolower($mem_f_name.$mem_l_name.$randString1.'.'.$fileExt);

		$insert_member = "INSERT INTO members(mem_first_name, mem_last_name, mem_email, mem_pass, mem_gender, mem_cell, mem_home_ph, dob_day, dob_month, dob_year, mem_city, mem_city_other, mem_country, degree_level, degree_title, degree_city, degree_ctry, majors, institution, completion_year, work_exp, first_job_day, first_job_month, first_job_year, mem_exp_year, mem_exp_month, profession_industry, current_job, current_job_day, current_job_month, current_job_year, current_end_date, comp_name, comp_ctry, comp_city, cv_headline, mem_cv, creation_date, prefer_job, prefer_job_loc, exp_salary, status) VALUES ('$mem_f_name', '$mem_l_name', '$mem_email', '$mem_pass','$mem_gender', '$mem_mobile', '$mem_home_ph', '$dob_day', '$dob_month', '$dob_year', '$mem_city', '$mem_city_other', '$mem_ctry', '$mem_edu_level', '$mem_degree_title', '$mem_institute_city', '$mem_institute_ctry','$mem_majors', '$mem_institute_name', '$mem_complete_year', '$mem_experience', '$first_job_day', '$first_job_month', '$first_job_year', '$mem_exp_year', '$mem_exp_month', '$mem_industry', '$current_job_title', '$current_start_day', '$current_start_month', '$current_start_year', '$end_date', '$comp_name', '$comp_ctry', '$comp_city', '$cv_headline', '$newCVname', NOW(), '$pref_job', '$pref_job_loc', '$exp_sal', '$profile_status')";
		
		$run_insert = mysqli_query($connection, $insert_member);
		
		move_uploaded_file($mem_cv_tmp, "members/member_cvs/$newCVname");
		
		$to = $mem_email;
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		$headers .= 'From: <admin@localjobs.pk>';
		
		$subject = "Welcome to LocalJobs.pk";
		$message = "<b>Dear {$mem_f_name}&nbsp;{$mem_l_name}</b> <br /><br/>
		
				Thank you for registering with LocalJobs.pk, the leading online recruitment service for Pakistani professionals. Your registered access details are as follows:<br/>
 	URL: <a href='http://localjobs.pk' target='_blank'>www.localjobs.pk</a> <br/><br/>

			<b>Email:</b> {$mem_email}<br/>
			<b>Password:</b> {$mem_pass} <br/><br/>
					
			If you have not already completed your online profile, including your CV and career preferences, please do so as soon as possible. <br/><br/>

 
	
To complete your online profile and/or apply for job opportunities, please visit our site at <a href='http://localjobs.pk' target='_blank'>www.localjobs.pk</a>. We hope you will find our site useful in advancing your career and wish you all the best in your job search. 
<br/><br/>
					
					Best regards,<br/>
 					<b>The LocalJobs.pk Team</b>";
		
		$retval = mail($to, $subject, $message, $headers);

		
               echo "<script>window.open('jobseeker_signin.php?created=Thank you! Your account has been created successfully, Enter your email and password to sign in...','_self')</script>";
	
		return true;	  
      }
	  
	  
     }
?>