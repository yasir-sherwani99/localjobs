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
    <link href="css/bootstrap.min.css" rel="stylesheet" />   
	<link rel="stylesheet" type="text/css" href="styles/admin_style.css" />
    <script type="text/javascript" src="js/js_functions.js"></script>
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

    <!-- Left side area starts --> 
    <div class="row">
    
       
        <div id="left_side_area" class="col-md-3">
            <!-- Navigation area starts -->
            <div id="nav" class="row">
            	<div class="btn-group-vertical">
    				<a href="index.php"><button class="btn btn-default"><img src="images/clock.png" />Dashboard</button></a>
            		<a href="jobs.php"><button class="btn btn-default"><img src="images/list.png" />Jobs</button></a>
            		<a href="applications.php"><button class="btn btn-default"><img src="images/folder.png" />Applications</button></a>
            		<a href="employers.php"><button class="btn btn-default"><img src="images/group.png" />Employers</button></a>
            		<a href="employees.php"><button class="btn btn-info"><img src="images/administrator.png" />Employees</button></a>
            		<a href="options.php"><button class="btn btn-default"><img src="images/screwdriver.png" />Options</button></a>
                    <a href="#"><button class="btn btn-default"><img src="images/spreadsheet.png" />Reports</button></a>
            		<a href="users.php"><button class="btn btn-default"><img src="images/user.png" />Users</button></a>
            		<a href="admin_logout.php"><button class="btn btn-default"><img src="images/login.png" />Logout</button></a>
    			</div>
            </div> 
       	</div>   
    
    <!-- Navigation area ends -->
    
    <!-- Main contents area starts -->
    
    <div id="contents" class="col-md-9">
    	<div id="tab" class="row">
        	<ul class="nav nav-tabs">
            	<li><a href="employees.php">Employees</a></li>
                <li><a href="add_employee.php">Add Employee</a></li>
                <li class="active" style="font-weight: bold;"><a href="edit_employer.php">Update Employee</a></li>
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
            		  <div id='aa'><b>Update Employee</b><br/>Edit the required fields and update an employee.						</div>
        		</div>";
			}
        ?>
        <div id="job_form" class="row">
        	<?php
				$memid = @$_GET['mem_id'];
				$get_mem = "SELECT * FROM members WHERE mem_id = '$memid'";
				$run_mem = mysqli_query($connection, $get_mem);
					$row_mem = mysqli_fetch_array($run_mem);
						$id = $row_mem['mem_id'];
						$first_name = $row_mem['mem_first_name'];
						$last_name = $row_mem['mem_last_name'];
						$email = $row_mem['mem_email'];
						$gender = $row_mem['mem_gender'];
						$mobile = $row_mem['mem_cell'];
						$home_ph = $row_mem['mem_home_ph'];
						$dob_day = $row_mem['dob_day'];
						$dob_month = $row_mem['dob_month'];
						$dob_year = $row_mem['dob_year'];
						$city = $row_mem['mem_city'];
						$ctry = $row_mem['mem_country'];
						$highest_degree = $row_mem['degree_level'];
						$degree_title = $row_mem['degree_title'];
						$degree_city = $row_mem['degree_city'];
						$degree_ctry = $row_mem['degree_ctry'];
						$majors = $row_mem['majors'];
						$institute = $row_mem['institution'];
						$complete_year = $row_mem['completion_year'];
						$work_exp = $row_mem['work_exp'];
						$first_job_day = $row_mem['first_job_day'];
						$first_job_month = $row_mem['first_job_month'];
						$first_job_year = $row_mem['first_job_year'];
						$exp_year = $row_mem['mem_exp_year'];
						$exp_month = $row_mem['mem_exp_month'];
						$industry = $row_mem['profession_industry'];
						$current_job = $row_mem['current_job'];
						$current_job_day = $row_mem['current_job_day'];
						$current_job_month = $row_mem['current_job_month'];
						$current_job_year = $row_mem['current_job_year'];
						$job_end_date = $row_mem['current_end_date'];
						$company = $row_mem['comp_name'];
						$comp_ctry = $row_mem['comp_ctry'];
						$comp_city = $row_mem['comp_city'];
						$cv_headline = $row_mem['cv_headline'];
						$mem_cv = $row_mem['mem_cv'];
						$status = $row_mem['status'];
								
            ?>
        	<?php include("includes/updateemployee.php"); ?>
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
		$mem_email = cleanStr($_POST['m_email']);
		$mem_f_name = cleanStr($_POST['f_name']);
		$mem_l_name = cleanStr($_POST['l_name']);
		$mem_gender = cleanStr($_POST['m_gender']);
		$dob_day = cleanStr($_POST['dob_day']);
		$dob_month = cleanStr($_POST['dob_month']);
		$dob_year = cleanStr($_POST['dob_year']);
		$mem_city = cleanStr($_POST['m_city']);
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
		$mem_experience = cleanStr($_POST['experience']);
		$first_job_day = cleanStr($_POST['job_start_day']);
		$first_job_month = cleanStr($_POST['job_start_month']);
		$first_job_year = cleanStr($_POST['job_start_year']);
		$mem_exp_year = cleanStr($_POST['m_exp_year']);
		$mem_exp_month = cleanStr($_POST['m_exp_month']);
		$mem_industry = cleanStr($_POST['industry']);
		$current_job_title = cleanStr($_POST['current_job_title']);
		$current_start_day = cleanStr($_POST['current_start_day']);
		$current_start_month = cleanStr($_POST['current_start_month']);
		$current_start_year = cleanStr($_POST['current_start_year']);
		$end_date = cleanStr($_POST['current_end_year']);
		$comp_name = cleanStr($_POST['comp_name']);
		$comp_ctry = cleanStr($_POST['comp_ctry']);
		$comp_city = cleanStr($_POST['comp_city']);
	//	$mem_image = $_FILES['m_image']['name'];
//		$mem_image_tmp = $_FILES['m_image']['tmp_name'];
		$cv_headline = cleanStr($_POST['cv_headline']);
		$mem_cv = $_FILES['m_cv']['name'];
		$mem_cv_tmp = $_FILES['m_cv']['tmp_name'];
	//	$terms_cond = $_POST['terms'];
		$profile_status = 'Active';

		
		$update_mem = "UPDATE members
					   SET mem_first_name = '$mem_f_name', 
					       mem_last_name = '$mem_l_name',
						   mem_email = '$mem_email', 
						   mem_gender = '$mem_gender', 
						   mem_cell = '$mem_mobile', 
						   mem_home_ph = '$mem_home_ph', 
						   dob_day = '$dob_day', 
						   dob_month = '$dob_month', 
						   dob_year = '$dob_year', 
						   mem_city = '$mem_city', 
						   mem_country = '$mem_ctry', 
						   degree_level = '$mem_edu_level', 
						   degree_title = '$mem_degree_title', 
						   degree_city = '$mem_institute_city', 
						   degree_ctry = '$mem_institute_ctry',
						   majors = '$mem_majors',
						   institution = '$mem_institute_name',
						   completion_year = '$mem_complete_year',
						   work_exp = '$mem_experience',
						   first_job_day = '$first_job_day',
						   first_job_month = '$first_job_month',
						   first_job_year = '$first_job_year',
						   mem_exp_year = '$mem_exp_year',
						   mem_exp_month = '$mem_exp_month',
						   profession_industry = '$mem_industry',
						   current_job = '$current_job_title',
						   current_job_day = '$current_start_day',
						   current_job_month = '$current_start_month',
						   current_job_year = '$current_start_year',
						   current_end_date = '$end_date',
						   comp_name = '$comp_name',
						   comp_ctry = '$comp_ctry',
						   comp_city = '$comp_city',
						   cv_headline = '$cv_headline',
						   mem_cv = '$mem_cv'
						    	WHERE mem_id = '$edit_record'"; 
			
		$run_update = mysqli_query($connection, $update_mem);
		
		move_uploaded_file($mem_cv_tmp, "../members/member_cvs/$mem_cv");

		if($run_update){
			echo "<script>window.open('employees.php?updated=An employee record has been updated successfully...!', '_self')</script>";
		}else{
			exit("Database Query has failed" . mysqli_error());
		}
		
	}
	
	}
?>
