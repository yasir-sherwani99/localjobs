<?php
	session_start();
	$connection = mysqli_connect("localhost","localjob_admin","HongKong99localjobs","localjob_db");
	if(!$connection){
		die("Database connection has failed" . mysqli_error());
	}
	
	$username = $_POST['email'];
	$password = $_POST['pass'];
	$job_id = $_POST['id'];
	
//	echo $username . "&nbsp;" . $password;

	$get_comp = "SELECT * FROM company_jobs WHERE job_id = '$job_id'";
	$run_comp = mysqli_query($connection, $get_comp);
	$row_comp = mysqli_fetch_array($run_comp);
		$comp_id = $row_comp['comp_id'];
		$job_title = $row_comp['job_title'];
	
	$get_company = "SELECT * FROM employers WHERE comp_id = '$comp_id'";
	$run_company = mysqli_query($connection, $get_company);
	$row_company = mysqli_fetch_array($run_company);
		$comp_title = $row_company['comp_name'];
		$comp_email = $row_company['comp_email'];	
	
	$query = "SELECT * FROM members
			  WHERE mem_email = '$username' && mem_pass = '$password'";
	
	$result = mysqli_query($connection, $query);

	$check_user = mysqli_num_rows($result);
	$row = mysqli_fetch_array($result);
		$first_name = $row['mem_first_name'];
		$last_name = $row['mem_last_name'];
		$mem_id = $row['mem_id'];
		$mem_cell = $row['mem_cell'];
		$mem_email = $row['mem_email'];
		$job_status = 'Received';
		$apply_date = date("F d, Y");
		
	$check = "SELECT * FROM jobs_apply WHERE job_id='$job_id' && mem_id='$mem_id'";
	$run_check = mysqli_query($connection, $check);
	$check_again = mysqli_num_rows($run_check);
		
	if($check_again == 1){
			echo "&nbsp;&nbsp;<span class='glyphicon glyphicon-alert'></span>&nbsp;You have already applied";
			exit(); 
	}	
		
	if($check_user > 0){
		
		
		$insert_record = "INSERT INTO jobs_apply(job_id, comp_id, mem_id, apply_date, job_status) VALUES ('$job_id', '$comp_id', '$mem_id', NOW(), '$job_status')";
				
		$run_record = mysqli_query($connection, $insert_record);
		
		$_SESSION['username'] = $username;
		$_SESSION['mem_first_name'] = $first_name;
		$_SESSION['mem_last_name'] = $last_name;

				$to = $mem_email;
				$headers = "MIME-Version: 1.0" . "\r\n";
				$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
				$headers .= 'From: <admin@localjobs.pk>';
		
				$subject = "LocalJobs.pk: CV Delivered - {$job_title}";
				$message = "<b>Dear {$first_name}</b> <br /><br/>
		
				Your CV has been successfully delivered to the following employer advertising on Localjobs.pk
				<br/><br/>
				
				<b>Application Details</b><br/><br/>

				Position:&nbsp;&nbsp; {$job_title}<br/>
				Employer:&nbsp;&nbsp; {$comp_title} <br/>
				Application Date:&nbsp;&nbsp; {$apply_date}<br/><br/>
				
				<b>What happens next?</b><br/><br/>
				
				Your job applications are recorded and instantly delivered to the recruiter advertising the vacancy. The recruiter then reviews the applications and, if your CV and general profile match their requirements, may decide to contact you for a telephone or face-to-face interview. <br/><br/>

Please note that recruiters receive hundreds of applications for each vacancy and may not provide individual notification or feedback on unsuccessful applications. However, you may track on-line whether your chosen vacancy is still open or has been closed. <br/><br/>

Thank you for using Localjobs.pk, and good luck with your job search! <br/><br/>

						
				Best regards,<br/>
 				<b>The LocalJobs.pk Team</b>";
		
				$to_emp = $comp_email;
				$headers_emp = "MIME-Version: 1.0" . "\r\n";
				$headers_emp .= "Content-type:text/html;charset=UTF-8" . "\r\n";
				$headers_emp .= 'From: <admin@localjobs.pk>';
		
				$subject_emp = "LocalJobs.pk: CV Received - {$job_title}";
				$message_emp = "<b>Dear {$comp_title}</b> <br /><br/>
		
				Your have received an application against the job that you have advertise at Localjobs.pk
				<br/><br/>
				
				<b>Applicant Details</b><br/><br/>

				Name:&nbsp;&nbsp; {$first_name}&nbsp;{$last_name}<br/>
				Email:&nbsp;&nbsp; {$mem_email} <br/>
				Application Date:&nbsp;&nbsp; {$apply_date}<br/><br/>
				
				<b>What happens next?</b><br/><br/>
				
				The job application has been delivered to {$comp_title}, to view further details about the applicant, please log on to <a href='http://localjobs.pk/employers'>www.localjobs.pk</a>.  <br/><br/>


Thank you for using Localjobs.pk, and good luck with your job suitable candidate search! <br/><br/>

						
				Best regards,<br/>
 				<b>The LocalJobs.pk Team</b>";
		
				$retval = mail($to, $subject, $message, $headers);
				$retval_emp = mail($to_emp, $subject_emp, $message_emp, $headers_emp);
		
		//	echo "You have successfully applied for this job";
			echo "<script>window.open('job_details.php?job_id=$job_id&mess1=Your application has been submitted successfully!&mess2=Employer may contact you on 0$mem_cell', '_self')</script>";
			exit();
		}
		else{
			echo "&nbsp;&nbsp;<span class='glyphicon glyphicon-alert'></span>&nbsp;Username / Password is Incorrect..";
			exit();
		}
	

?>