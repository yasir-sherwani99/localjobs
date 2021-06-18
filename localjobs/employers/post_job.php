<?php
	include("includes/connection.php");
	include("functions/emp_functions.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>THElocal Jobs</title>
    <link rel="stylesheet" type="text/css" href="styles/employer_style.css" />
    <link rel="stylesheet" type="text/css" href="styles/emp_second_style.css" />
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

<div id="container">

	<!-- This is top bar -->
	<div id="topbar">
		<div id="topleft">
        	<ul>
            	<li><a href="#">Directory Listing</a></li>
                <li><a href="#">Free Resume Search</a></li>
                <li><img src="images/buddy_chat.png" /><a href="#" style="padding-left: 30px;">Live Help</a></li>
            </ul>
        </div>
        <div id="topright">
        If you are a Jobseeker? <a href="../index.php" target="_blank">Click here</a>
        </div>
	</div>

	<!-- This is header -->
	<div id="header">
		<img src="images/local_logo1.png" />
	</div>
	
	<!-- This is navigation bar -->
	<div id="nav">
		<ul>
        	<li><a href="#" style="background-color: #FFF; color: #F30;">Employer HQ</a></li>
            <li><a href="#">Products</a></li>
        </ul>
	</div>
	
	<!-- This is corporate news bar -->
	<div id="corporate">
		<h3>Corporate Headlines:</h3>
	</div>
    
    <!-- This is message area -->
	
            <?php
				if(isset($_GET['mess'])){
					$message = $_GET['mess'];
					echo "<div id='message'>
       					<img src='images/correct.gif' width='18' height='18'>
        				<span id='error' style='color: black;'>$message
						</span>
						</div>";
				}
	        ?>
        
	
	<!-- This is main content area -->
	<div id="contents" style="background-color: #FFF; width:995px; height: auto; border: hidden;">
    	<div id="post_job">
    		<?php include("includes/postjob.php"); ?>
        </div>	
	</div>
	<!-- This is side bar -->
	<div id="sidebar">
		
	</div>
	
	<!-- This is footer -->
	<div id="footer" style="clear: both;">
	This is footer area
	</div>
    
</div>

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
		$job_ctry = cleanStr($_POST['job_ctry']);
		$industry = cleanStr($_POST['industry']);
		$expiry_date = cleanStr($_POST['expiry']);
		$min_salary = cleanStr($_POST['min_salary']);
		$max_salary = cleanStr($_POST['max_salary']);
		$job_qual = cleanStr($_POST['qual']);
		$comp_profile = cleanStr($_POST['profile']);
		$emp_type = cleanStr($_POST['emp_type']);
		$emp_status = cleanStr($_POST['emp_status']);
		$vacancies = cleanStr($_POST['vacancies']);
		$comp_name = cleanStr($_POST['company']);
		$contact_person = cleanStr($_POST['contact_name']);
		$contact_no = cleanStr($_POST['contact_no']);
		$comp_email = cleanStr($_POST['email']);
		$reg_emp = cleanStr($_POST['reg_emp']);
		$job_keywords = cleanStr($_POST['keywords']);
		$status = 'on';
		
		$insert_job = "INSERT INTO company_jobs
					 (cat_id, job_title, job_desc, job_skills, min_exp, max_exp, job_location, job_ctry, expiry_date, min_salary, max_salary, job_qual, company_profile, emp_type, emp_status, vacancies, company_name, contact_name, contact_no, company_email, reg_emp, job_keywords, post_date, status) 
					  VALUES ('$job_cat', '$job_title', '$job_desc', '$job_skills', '$min_exp', '$max_exp', '$job_location', '$job_ctry', '$expiry_date', '$min_salary', '$max_salary', '$job_qual', '$comp_profile', '$emp_type', '$emp_status', '$vacancies', '$comp_name', '$contact_person', '$contact_no', '$comp_email', '$reg_emp', '$job_keywords', NOW(), '$status')";
			
		$run_job = mysqli_query($connection, $insert_job);
		if($run_job){
			echo "<script>window.open('post_job.php?mess=A job has posted successfully...!', '_self')</script>";
		}else{
			exit("Database Query has failed" . mysqli_error());
		}
		
	}
?>