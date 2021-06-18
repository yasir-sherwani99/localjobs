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
<div class="container">
	<!-- This is top bar -->
	<div id="topbar" class="row">
    	<?php include("includes/top_bar.php"); ?>
	</div>

	<!-- Header area starts -->
    <div id="header" class="row">
    	<?php include("includes/header.php"); ?> 
    </div>
    <!-- Header area ends -->

     <div class="row">
     	<?php include("includes/navigation_main.php"); ?>
    </div>	

	<div class="row">

        <!-- Left side area starts -->
     	 <div id="left_side_area" class="col-md-3 col-sm-3 col-xs-3">
            <!-- Navigation area starts -->
            <?php include("includes/employer_dashboard.php"); ?>
        
        </div>
        
        <!-- Main contents area starts -->
        
        <div id="contents" style="padding-top: 10px; height: auto;" class="col-md-9 col-sm-9 col-xs-9">
            <div id="tab" class="row">
                <ul class="nav nav-tabs">
                    <li><a href="employer_apps.php">Member's Applications</a></li>
                    <li class="active" style="font-weight: bold;"><a href="#">Application Tracking</a></li>
                    <li><a href="employer_quick_apps.php">Non-Member's Applications</a></li>
                </ul>
            </div>
    
            <div id="all_jobs" style="height: auto; margin-top: 5px; background-color:#FFF; font-size: 14px;" class="row">
             <div class="table-responsive">
                <table border="0" class="table table-bordered table-striped">
                <?php
                    $apply_id = @$_GET['apply_id'];
                    $get_applied_job = "SELECT * FROM jobs_apply WHERE apply_id = '$apply_id'";
                    $run_applied_job = mysqli_query($connection, $get_applied_job);
                    $row_applied_job = mysqli_fetch_array($run_applied_job);
                        $applyId = $row_applied_job['apply_id'];
                        $jobId = $row_applied_job['job_id'];
                        $compId = $row_applied_job['comp_id'];
                        $memId = $row_applied_job['mem_id'];
                        $applyDate = $row_applied_job['apply_date'];
                        $jobStatus = $row_applied_job['job_status'];
						$emp_notes = $row_applied_job['notes'];
                        
                        $get_member = "SELECT * FROM members WHERE mem_id = '$memId'";
                        $run_member = mysqli_query($connection, $get_member);
                        $row_member = mysqli_fetch_array($run_member);
                            $memberID = $row_member['mem_id'];
                            $memberFIRST = $row_member['mem_first_name'];
                            $memberLAST = $row_member['mem_last_name'];
                            $memberEMAIL = $row_member['mem_email'];
                            $memberCELL = $row_member['mem_cell'];
                            $memberDEGREE = $row_member['degree_title'];
                            $memberINS = $row_member['institution'];
                            $memberEXPyear = $row_member['mem_exp_year'];
                            $memberEXPmonth = $row_member['mem_exp_month'];
                            $memberJOB = $row_member['current_job'];
                            $memberCOMPANY = $row_member['comp_name'];
			    $memberPREFERJOB = $row_member['prefer_job'];
		            $memberPREFERLOC = $row_member['prefer_job_loc'];
			    $memberSALARY = $row_member['exp_salary'];
                            $memberCV = $row_member['mem_cv'];
			    $cv_HEADLINE = $row_member['cv_headline'];
							
						$get_title = "SELECT * FROM company_jobs WHERE job_id = '$jobId'";
						$run_title = mysqli_query($connection, $get_title);
						$row_title = mysqli_fetch_array($run_title);
								$jobTitle = $row_title['job_title'];
								
						$get_city = "SELECT * FROM city WHERE city_id = '$memberPREFERLOC'";
						$run_city = mysqli_query($connection, $get_city);
						$row_city = mysqli_fetch_array($run_city);
								$cityTitle = $row_city['city_name'];
								
						$get_comp = "SELECT * FROM employers WHERE comp_id = '$compId'";
						$run_comp = mysqli_query($connection, $get_comp);
						$row_comp = mysqli_fetch_array($run_comp);
								$compNAME = $row_comp['comp_name'];				
                ?>
                  <tr>
                  	<td colspan="2">
                    	<label style="color: #F00; font-weight: bold;">Applicant Summary:</label> 
                        <span style="color: #00F; font-weight: bold;"><?php echo $cv_HEADLINE; ?></span>
                    </td>
                  </tr>	
                  <tr>
                        <td style="font-weight: bold; vertical-align: middle;">Status</td>
                        <td style="vertical-align: middle;">
                            <form action="view_empl_application.php?edit_form=<?php echo $applyId; ?>" role="form" method="post">
                            <select name="status" style="width: 120px; height: 32px;" class="form-control pull-left">
                                <option value="<?php echo $jobStatus; ?>"><?php echo $jobStatus; ?></option>
                                <option value="Received">Received</option>
                                <option value="Shortlisted">Shortlisted</option>
                                <option value="Approved">Approved</option>
                                <option value="Rejected">Rejected</option>
                            </select>&nbsp;
                            <input type="submit" class="btn btn-primary btn-sm" name="update_status" value="Change Status">
                            </form>
                            <span class="help-block">Note: Shortlisted and Approved status is notify to applicant through email.</span>
                        </td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold; width: 200px;">Applied Job</td>
                        <td style="color: #3333FF; font-weight: bold;"><?php echo $jobTitle; ?></td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold;">Email</td>
                        <td style="color: #3333FF; font-weight: bold;"><?php echo $memberEMAIL; ?></td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold;">Applicant Name</td>
                        <td><?php echo $memberFIRST . "&nbsp;" . $memberLAST; ?></td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold;">Mobile</td>
                        <td><?php echo "0" . $memberCELL; ?></td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold;">Experience</td>
                        <td><?php echo $memberEXPyear . "&nbsp;years&nbsp;" . $memberEXPmonth . "&nbsp;months"; ?></td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold;">Qualification</td>
                        <td>
							<?php
								if($memberDEGREE == ""){
									echo "<span style='color: #F00;'>Not Set</span>";
								}else{
									echo $memberDEGREE;
								} 
							?>
                        </td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold;">Institution</td>
                        <td>
                        	<?php
								if($memberINS == ""){
									echo "<span style='color: #F00;'>Not Set</span>";
								}else{
									echo $memberINS;
								} 
							?>
                        </td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold;">Present Job</td>
                        <td>
                        	<?php
								if($memberJOB == ""){
									echo "<span style='color: #F00;'>Not Set or may be Fresh Graduate</span>";
								}else{
									echo $memberJOB;
								} 
							?>
                        </td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold;">Present Employer</td>
                        <td>
                        	<?php
								if($memberCOMPANY == ""){
									echo "<span style='color: #F00;'>Not Set</span>";
								}else{
									echo $memberCOMPANY;
								} 
							?>
                        </td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold;">Prefer Job</td>
                        <td><?php echo $memberPREFERJOB; ?></td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold;">Prefer Location</td>
                        <td><?php echo $cityTitle; ?></td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold;">Salary Expectation</td>
                        <td><?php echo $memberSALARY; ?> <span style="font-size: 14px;" class="label label-success">PKR</span></td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold;">Download CV/Resume</td>
                        <td><?php echo $memberCV; ?>&nbsp;
                        	<a href="download.php?download_file=<?php echo $memberCV; ?>"><button class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-download-alt"></span> Download</button></a>
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><button class="btn btn-primary btn-sm" id="btn-notes"><span class="glyphicon glyphicon-pencil"></span> Add Notes</button></a> 
                        </td>
                    </tr>
                    <tr id="collapseTwo" class="panel-collapse collapse">
                        <td style="font-weight: bold;">Notes</td>
                        <td>
                            <form action="view_empl_application.php?edit_form=<?php echo $applyId; ?>" role="form" method="post">
                            <textarea name="notes" class="form-control"></textarea>
                            <br/>
                            <input type="submit" class="btn btn-primary btn-sm pull-left" name="add_notes" value="Save">
                         
                            </form>
                          	&nbsp;<a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><button class="btn btn-primary btn-sm">Close</button></a>
                        </td>
                    </tr>
                    <?php
					 if($emp_notes != ""){
						 echo "<tr>
						 		<td style='color: #F00; font-weight: bold;'>My Notes</td>
								<td style='color: #00F;'>$emp_notes</td>
						 </tr>";
					 }else{
						 
					 }
                    ?>
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
<?php
	if(isset($_POST['update_status'])){
		$edit_record = $_GET['edit_form'];
		$new_status = $_POST['status'];
		
		$get_app = "SELECT * FROM jobs_apply WHERE apply_id = '$edit_record'";
		$run_app = mysqli_query($connection, $get_app);
		$row_app = mysqli_fetch_array($run_app);
			$comp_id = $row_app['comp_id'];
			$job_id = $row_app['job_id'];
			$mem_id = $row_app['mem_id'];
			 
		$get_mem = "SELECT * FROM members WHERE mem_id = '$mem_id'";
		$run_mem = mysqli_query($connection, $get_mem);
		$row_mem = mysqli_fetch_array($run_mem);
			$first_name = $row_mem['mem_first_name'];
			$last_name = $row_mem['mem_last_name'];
			$mem_email = $row_mem['mem_email'];
		
		$get_job = "SELECT * FROM company_jobs WHERE job_id = '$job_id'";
		$run_job = mysqli_query($connection, $get_job);
		$row_job = mysqli_fetch_array($run_job);
			$job_title = $row_job['job_title'];

		$get_comp = "SELECT * FROM employers WHERE comp_id = '$comp_id'";
		$run_comp = mysqli_query($connection, $get_comp);
		$row_comp = mysqli_fetch_array($run_comp);
			$job_company = $row_comp['comp_name'];
			
		$update_status = "UPDATE jobs_apply
				  SET job_status = '$new_status'
				      WHERE apply_id = '$edit_record'";
								
		$run_status = mysqli_query($connection, $update_status);
		
		
		
		if($new_status == "Received" || $new_status == "Rejected"){
			echo "<script>window.open('view_empl_application.php?apply_id=$edit_record', '_self')</script>";
			exit();
		}
		else{  
			$to = $mem_email;
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= 'From: <admin@localjobs.pk>';
		
			$subject = "LocalJobs.pk: Congratulations - {$first_name}, your resume has been {$new_status}";
			$message = "<b>Dear {$first_name}</b> <br /><br/>
		
				Thank you for being a part of LocalJobs.pk. Pakistan's leading Job site. We are glad to inform you that your cv/resume has been {$new_status} by the {$job_company} for the following job.
				<br/><br/>
				

				Position:&nbsp;&nbsp; {$job_title}<br/><br/>
				
				<b>What happens next?</b><br/><br/>
				
				You should receive an update from the employer very soon. If you have any queries, please feel free to contact us at admin@localjobs.pk <br/><br/>
						
				Wishing you success using LocalJobs.pk,<br/><br/>
 				<b>The LocalJobs.pk Team</b>";
 				
 			$retval = mail($to, $subject, $message, $headers);
 			
 			echo "<script>window.alert('The Status of application has successfully changed. An email has been sent to applicant about his job new status')</script>";		
			echo "<script>window.open('view_empl_application.php?apply_id=$edit_record', '_self')</script>";
			
		
	}	
}	
?>
<?php
	if(isset($_POST['add_notes'])){
		$edit_record = $_GET['edit_form'];
		$notes = $_POST['notes'];
		
		$update_notes = "UPDATE jobs_apply
							SET notes = '$notes'
								WHERE apply_id = '$edit_record'";
								
		$run_notes = mysqli_query($connection, $update_notes);
		if($run_notes){
		
			echo "<script>window.open('view_empl_application.php?apply_id=$edit_record', '_self')</script>";
		}
		else{
			die("Database query has failed" . mysqli_error());
		}
	}
?>