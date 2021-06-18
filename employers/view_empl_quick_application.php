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
                    <li><a href="employer_quick_apps.php">Non-Member's Applications</a></li>
                    <li class="active" style="font-weight: bold;"><a href="#">Application Tracking</a></li>
                </ul>
            </div>
    
            <div id="all_jobs" style="height: auto; margin-top: 5px; background-color:#FFF; font-size: 14px;" class="row">
             <div class="table-responsive">
                <table border="0" class="table table-bordered table-striped">
                <?php
                    $apply_id = @$_GET['apply_id'];
                    $get_applied_job = "SELECT * FROM quick_apply WHERE apply_id = '$apply_id'";
                    $run_applied_job = mysqli_query($connection, $get_applied_job);
                    $row_applied_job = mysqli_fetch_array($run_applied_job);
                        $applyId = $row_applied_job['apply_id'];
                        $jobId = $row_applied_job['job_id'];
                        $compId = $row_applied_job['comp_id'];
                        $fname = $row_applied_job['first_name'];
						$lname = $row_applied_job['last_name'];
						$email = $row_applied_job['email'];
						$country = $row_applied_job['country'];
						$pakcity = $row_applied_job['pak_city'];
						$othercity = $row_applied_job['other_city'];
						$mobile = $row_applied_job['mobile'];
                        $applyDate = $row_applied_job['apply_date'];
                        $jobStatus = $row_applied_job['job_status'];
						$cv = $row_applied_job['cv'];
						$emp_notes = $row_applied_job['notes'];
                        							
						$get_title = "SELECT * FROM company_jobs WHERE job_id = '$jobId'";
						$run_title = mysqli_query($connection, $get_title);
						$row_title = mysqli_fetch_array($run_title);
								$jobTitle = $row_title['job_title'];
								
						$get_city = "SELECT * FROM city WHERE city_id = '$pakcity'";
						$run_city = mysqli_query($connection, $get_city);
						$row_city = mysqli_fetch_array($run_city);
								$cityTitle = $row_city['city_name'];
								
						$get_ctry = "SELECT * FROM countries WHERE ctry_id = '$country'";
						$run_ctry = mysqli_query($connection, $get_ctry);
						$row_ctry = mysqli_fetch_array($run_ctry);
								$ctryTitle = $row_ctry['ctry_name'];				
                ?>
                  <tr>
                  	<td colspan="2">
                    	<label style="color: #F00; font-family: Helvetica; font-weight: bold;">Applicant Summary:</label> 
                        <span style="color: #00F; font-weight: bold;"><?php //echo $cv_HEADLINE; ?></span>
                    </td>
                  </tr>	
                  <tr>
                        <td style="font-weight: bold;">Status</td>
                        <td>
                            <form action="view_empl_quick_application.php?edit_form=<?php echo $applyId; ?>" role="form" method="post">
                            <select name="status" style="width: 120px; height: 32px;" class="form-control pull-left">
                                <option value="<?php echo $jobStatus; ?>"><?php echo $jobStatus; ?></option>
                                <option value="Received">Received</option>
                                <option value="Shortlisted">Shortlisted</option>
                                <option value="Approved">Approved</option>
                                <option value="Rejected">Rejected</option>
                            </select>&nbsp;
                            <input type="submit" class="btn btn-primary btn-sm" name="update_status" value="Change Status">
                            </form>
                        </td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold; width: 200px;">Applied Job</td>
                        <td style="color: #3333FF; font-weight: bold;"><?php echo $jobTitle; ?></td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold;">Email</td>
                        <td style="color: #3333FF; font-weight: bold;"><?php echo $email; ?></td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold;">Applicant Name</td>
                        <td><?php echo $fname . "&nbsp;" . $lname; ?></td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold;">Mobile</td>
                        <td><?php echo "0" . $mobile; ?></td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold;">Country</td>
                        <td><?php echo $ctryTitle; ?></td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold;">City</td>
                        <td>
							<?php
								if($pakcity == "-1"){
									echo $othercity;
								}else{
									echo $cityTitle;
								} 
							?>
                        </td>
                    </tr>
                
                    <tr>
                        <td style="font-weight: bold;">Download CV/Resume</td>
                        <td><?php echo $cv; ?>&nbsp;
                        	<a href="download.php?download_file=<?php echo $cv; ?>"><button class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-download-alt"></span> Download</button></a>
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><button class="btn btn-primary btn-sm" id="btn-notes"><span class="glyphicon glyphicon-pencil"></span> Add Notes</button></a> 
                        </td>
                    </tr>
                    <tr id="collapseTwo" class="panel-collapse collapse">
                        <td style="font-weight: bold;">Notes</td>
                        <td>
                            <form action="view_empl_quick_application.php?edit_form=<?php echo $applyId; ?>" role="form" method="post">
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
		
		$update_status = "UPDATE quick_apply
							SET job_status = '$new_status'
								WHERE apply_id = '$edit_record'";
								
		$run_status = mysqli_query($connection, $update_status);
		if($run_status){
			echo "<script>window.open('employer_quick_apps.php?updated=A job status has updated successfully...', '_self')</script>";
		}
		else{
			die("Database query has failed" . mysqli_error());
		}
	}
?>
<?php
	if(isset($_POST['add_notes'])){
		$edit_record = $_GET['edit_form'];
		$notes = $_POST['notes'];
		
		$update_notes = "UPDATE quick_apply
							SET notes = '$notes'
								WHERE apply_id = '$edit_record'";
								
		$run_notes = mysqli_query($connection, $update_notes);
		if($run_notes){
		
			echo "<script>window.open('view_empl_quick_application.php?apply_id=$edit_record', '_self')</script>";
		}
		else{
			die("Database query has failed" . mysqli_error());
		}
	}
?>