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
    <script src="js/jquery.js"></script>
	<script type="text/javascript">

	$(document).ready(function(){
		$("#email").blur(function(){
			var user_email = $("#email").val();
			var user_pass = $("#pass").val();
			var user_pass1 = $("#pass1").val();
		//	var user_pass = $("#pass").val();
		/*	$.post("test1.php",{email:user_email},function(data){
				$("#error").html(data);
			});  */
			
			$.ajax({
				url:'test1.php',
				data:{email:user_email,pass:user_pass,pass1:user_pass1},
				type:'POST',
				success:function(data){
					$("#error").html(data);
					$("#correct").html(data);
				}
			});
		});
	});
	
	$(document).ready(function(){
	    toggleFields(); 
		toggleEdu();
		toggleExp();
		
    	$("#location").change(function() {
        	toggleFields();
    	});
		
		$(".hide_edu_details").hide();
		$("#m_edu_level").change(function() {
        	toggleEdu();
    	});
		
		$(".exp_hide").hide();
		$("#experience").change(function() {
        	toggleExp();
    	});

	});

	function toggleFields() {
    	if($("#location").val() == 28)
        	$("#other_loc").show();
    	else
        	$("#other_loc").hide();
	}
	
	function toggleEdu() {
		
    	if($("#m_edu_level").val() == "No Formal Education")
        	$(".hide_edu_details").hide();
    	else
        	$(".hide_edu_details").show();
	}
	
	function toggleExp() {
		
    	if($("#experience").val() == "Yes")
        	$(".exp_hide").show();
    	else
        	$(".exp_hide").hide();
	}
	

</script>

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
                <li class="active" style="font-weight: bold;"><a href="add_employee.php">Add Employee</a></li>
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
            		  <div id='aa'><b>Add new employee</b><br/>Enter the required fields and add a new employee.						</div>
        		</div>";
			}
        ?>
        <div id="job_form" class="row">
        	<?php include("includes/addemployee.php"); ?>
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

</body>
</html>

<?php
	if(isset($_POST['register'])){
		$mem_email = cleanStr($_POST['m_email']);
		$mem_pass = cleanStr($_POST['m_pass1']);
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
		
		$insert_member = "INSERT INTO members(mem_first_name, mem_last_name, mem_email, mem_pass, mem_gender, mem_cell, mem_home_ph, dob_day, dob_month, dob_year, mem_city, mem_country, degree_level, degree_title, degree_city, degree_ctry, majors, institution, completion_year, work_exp, first_job_day, first_job_month, first_job_year, mem_exp_year, mem_exp_month, profession_industry, current_job, current_job_day, current_job_month, current_job_year, current_end_date, comp_name, comp_ctry, comp_city, cv_headline, mem_cv, creation_date, status) VALUES ('$mem_f_name', '$mem_l_name', '$mem_email', '$mem_pass','$mem_gender', '$mem_mobile', '$mem_home_ph', '$dob_day', '$dob_month', '$dob_year', '$mem_city', '$mem_ctry', '$mem_edu_level', '$mem_degree_title', '$mem_institute_city', '$mem_institute_ctry','$mem_majors', '$mem_institute_name', '$mem_complete_year', '$mem_experience', '$first_job_day', '$first_job_month', '$first_job_year', '$mem_exp_year', '$mem_exp_month', '$mem_industry', '$current_job_title', '$current_start_day', '$current_start_month', '$current_start_year', '$end_date', '$comp_name', '$comp_ctry', '$comp_city', '$cv_headline', '$mem_cv', NOW(), '$profile_status')";
		
		$run_insert = mysqli_query($connection, $insert_member);
		
	//	move_uploaded_file($mem_image_tmp, "members/member_photos/$mem_image");
		
		move_uploaded_file($mem_cv_tmp, "../members/member_cvs/$mem_cv");
		
		echo "<script>window.open('add_employee.php?mess=An employee has registered successfully...!', '_self')</script>";
		
			if(!$run_insert){
				die("database query has failed" .  mysqli_error());
			}
	}
	
	}
?>
