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
                <a href="employer_jobs.php"><button class="btn btn-default"><img src="images/icons/list.png" />Jobs</button></a>
                <a href="employer_apps.php"><button class="btn btn-info"><img src="images/icons/folder.png" />Applications</button></a>
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
                    <li><a href="employer_apps.php">Applications</a></li>
                    <li class="active" style="font-weight: bold;"><a href="#">Application Tracking</a></li>
                </ul>
            </div>
    
            <div id="all_jobs" style="height: auto; margin-top: 5px; background-color:#FFF; font-size: 14px;" class="row">
             <div class="table-responsive">
                <table border="0" class="table table-bordered table-striped">
                <?php
                    $apply_id = $_GET['apply_id'];
                    $get_applied_job = "SELECT * FROM jobs_apply WHERE apply_id = '$apply_id'";
                    $run_applied_job = mysqli_query($connection, $get_applied_job);
                    $row_applied_job = mysqli_fetch_array($run_applied_job);
                        $applyId = $row_applied_job['apply_id'];
                        $jobId = $row_applied_job['job_id'];
                  //      $jobTitle = $row_applied_job['job_title'];
                        $compId = $row_applied_job['comp_id'];
                        $memId = $row_applied_job['mem_id'];
                        $applyDate = $row_applied_job['apply_date'];
                        $jobStatus = $row_applied_job['job_status'];
                        
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
                            $memberCV = $row_member['mem_cv'];
							
						$get_title = "SELECT * FROM company_jobs WHERE job_id = '$jobId'";
						$run_title = mysqli_query($connection, $get_title);
						$row_title = mysqli_fetch_array($run_title);
								$jobTitle = $row_title['job_title'];
                ?>
                  <tr>
                        <td style="font-weight: bold;">Status</td>
                        <td>
                            <form action="view_empl_application.php?edit_form=<?php echo $applyId; ?>" method="post">
                            <select name="status" style="padding: 2px;">
                                <option value="<?php echo $jobStatus; ?>"><?php echo $jobStatus; ?></option>
                                <option value="Received">Received</option>
                                <option value="Shortlisted">Shortlisted</option>
                                <option value="Approved">Approved</option>
                                <option value="Rejected">Rejected</option>
                            </select>
                            <input type="submit" class="btn btn-default btn-xs" name="update_status" value="Change Status"/>
                            </form>
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
                        <td><?php echo "+" . $memberCELL; ?></td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold;">Experience</td>
                        <td><?php echo $memberEXPyear . "&nbsp;years&nbsp;" . $memberEXPmonth . "&nbsp;months"; ?></td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold;">Qualification</td>
                        <td><?php echo $memberDEGREE; ?></td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold;">Institution</td>
                        <td><?php echo $memberINS; ?></td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold;">Present Job</td>
                        <td><?php echo $memberJOB; ?></td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold;">Present Employer</td>
                        <td><?php echo $memberCOMPANY; ?></td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold;">View CV</td>
                        <td><?php echo $memberCV; ?>&nbsp;
                            <span> <a href="#">Preview</a> | <a href="download.php?download_file=<?php echo $memberCV; ?>">Download</a></span>
                        </td>
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
<?php
	if(isset($_POST['update_status'])){
		$edit_record = $_GET['edit_form'];
		$new_status = $_POST['status'];
		
		$update_status = "UPDATE jobs_apply
							SET job_status = '$new_status'
								WHERE apply_id = '$edit_record'";
								
		$run_status = mysqli_query($connection, $update_status);
		if($run_status){
			echo "<script>window.open('employer_apps.php?updated=A job status has updated successfully...', '_self')</script>";
		}
		else{
			die("Database query has failed" . mysqli_error());
		}
	}
?>