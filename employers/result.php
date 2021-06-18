<?php

session_start();
  include("includes/connection.php"); 
  include("functions/emp_main_panel_functions.php");

  /* Table:  messages
   * Fields: id      (INT, primary key, auto-increment)
   *         message (TEXT)
   */
      	
	$user_session = $_SESSION['comp_user'];
				
	$get_employer = "SELECT * FROM employers
					   WHERE comp_email = '$user_session'";
				
	$run_employer = mysqli_query($connection, $get_employer);
				
	$row_employer = mysqli_fetch_array($run_employer);

		$comp_id = $row_employer['comp_id'];
		

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
		
		$expiry_date = $expiry_year . "-" . $expiry_month . "-" . $expiry_day;
		
		$insert_job = "INSERT INTO company_jobs
					 (cat_id, comp_id, job_title, job_desc, job_skills, min_exp, max_exp, job_location, other_city, job_ctry, expiry_date, expiry_day, expiry_month, expiry_year, min_salary, max_salary, job_qual, emp_type, emp_status, vacancies, contact_name, contact_no, company_email, job_keywords, post_date, status) VALUES ('$job_cat', '$company_id', '$job_title', '$job_desc', '$job_skills', '$min_exp', '$max_exp', '$job_location', '$other_city', '$job_ctry', '$expiry_date', '$expiry_day', '$expiry_month', '$expiry_year', '$min_salary', '$max_salary', '$job_qual', '$emp_type', '$emp_status', '$vacancies', '$contact_person', '$contact_no', '$comp_email', '$job_keywords', NOW(), '$status')";
			
		$run_job = mysqli_query($connection, $insert_job);
		if($run_job){
			echo "<script>window.open('add_empl_jobs.php?mess=A job has published successfully...!', '_self')</script>";
		}else{
			exit("Database Query has failed" . mysqli_error());
		}
		
	}


 /* $sql = "INSERT INTO messages VALUES(NULL, '" . mysql_real_escape_string($_POST['data']) . "');";
  $queryResource = mysql_query($sql, $dbConn) or die(mysql_error()); */
?>