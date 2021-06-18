<?php 
	session_start();
		if(!isset($_SESSION['username'])){
		header('location: jobseeker_signin.php?error=You are not a Member..');
	}else{
 
?>
<?php
	include("includes/connection.php");
	include("functions/functions.php");
	include("functions/profile_functions.php");
?>
<?php
		$user_session = $_SESSION['username'];
						
		$get_member = "SELECT * FROM members
					   WHERE mem_email = '$user_session'";
						
		$run_member = mysqli_query($conn, $get_member);
						
		$row_member = mysqli_fetch_array($run_member);
				
		$mem_id = $row_member['mem_id'];
		$mem_first_name = $row_member['mem_first_name'];
		$mem_last_name = $row_member['mem_last_name'];
		$mem_email = $row_member['mem_email'];
		$mem_gender = $row_member['mem_gender'];
		$mem_cell = $row_member['mem_cell'];
		$mem_home = $row_member['mem_home_ph'];
		$mem_dob_day = $row_member['dob_day'];
		$mem_dob_month = $row_member['dob_month'];
		$mem_dob_year = $row_member['dob_year'];
		$mem_addr = $row_member['mem_addr'];
		$mem_city = $row_member['mem_city'];
		$other_city = $row_member['mem_city_other'];
		$mem_ctry = $row_member['mem_country'];
		$mem_degree = $row_member['degree_level'];
		$mem_degree_title = $row_member['degree_title'];
		$mem_majors = $row_member['majors'];
		$mem_inst = $row_member['institution'];
		$mem_inst_city = $row_member['degree_city'];
		$mem_inst_ctry = $row_member['degree_ctry'];
		$mem_year_pass = $row_member['completion_year'];
		$mem_exp_year = $row_member['mem_exp_year'];
		$mem_exp_month = $row_member['mem_exp_month'];
		$mem_industry = $row_member['profession_industry'];
		$current_job = $row_member['current_job'];
		$current_empl = $row_member['comp_name'];
		$empl_city = $row_member['comp_city'];
		$empl_ctry = $row_member['comp_ctry'];
		$empl_month = $row_member['current_job_month'];
		$empl_year = $row_member['current_job_year'];
		$empl_end = $row_member['current_end_date'];
		$mem_it_skills = $row_member['mem_it_skills'];
		$mem_other_skills = $row_member['mem_other_skills'];
		$mem_cv_headline = $row_member['cv_headline'];
		$mem_cv_name = $row_member['mem_cv'];
		$prefer_job = $row_member['prefer_job'];
		$prefer_job_loc = $row_member['prefer_job_loc'];
		$salary_exp = $row_member['exp_salary'];
		$mem_personal_statement = $row_member['personal_statement'];
		
		$get_industry = "SELECT * FROM categories WHERE cat_id = '$mem_industry'";
		$run_industry = mysqli_query($conn, $get_industry);
		$row_industry = mysqli_fetch_array($run_industry);
				$industry_id = $row_industry['cat_id'];
				$industry_title = $row_industry['cat_title'];
				
		$get_empl_country = "SELECT * FROM countries WHERE ctry_id = '$empl_ctry'";
		$run_empl_country = mysqli_query($conn, $get_empl_country);
		$row_empl_country = mysqli_fetch_array($run_empl_country);
				$empl_country_title = $row_empl_country['ctry_name'];

		$get_inst_country = "SELECT * FROM countries WHERE ctry_id = '$mem_inst_ctry'";
		$run_inst_country = mysqli_query($conn, $get_inst_country);
		$row_inst_country = mysqli_fetch_array($run_inst_country);
				$inst_country_title = $row_inst_country['ctry_name'];

		$get_mem_country = "SELECT * FROM countries WHERE ctry_id = '$mem_ctry'";
		$run_mem_country = mysqli_query($conn, $get_mem_country);
		$row_mem_country = mysqli_fetch_array($run_mem_country);
				$mem_country_id = $row_mem_country['ctry_id'];
				$mem_country_title = $row_mem_country['ctry_name'];
				
		$get_mem_city = "SELECT * FROM city WHERE city_id = '$mem_city'";
		$run_mem_city = mysqli_query($conn, $get_mem_city);
		$row_mem_city = mysqli_fetch_array($run_mem_city);
				$mem_city_id = $row_mem_city['city_id'];
				$mem_city_title = $row_mem_city['city_name'];
				
		$get_empl_month = "SELECT * FROM months WHERE month_id = '$empl_month'";
		$run_empl_month = mysqli_query($conn, $get_empl_month);
		$row_empl_month = mysqli_fetch_array($run_empl_month);
				$empl_month_title = $row_empl_month['month_name'];

		$get_mem_month = "SELECT * FROM months WHERE month_id = '$mem_dob_month'";
		$run_mem_month = mysqli_query($conn, $get_mem_month);
		$row_mem_month = mysqli_fetch_array($run_mem_month);
				$mem_dob_month_id = $row_mem_month['month_id'];
				$mem_dob_month_title = $row_mem_month['month_name'];
		
?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Local Jobs Pakistan</title>
    <link href="images/logo_small.png" type="image/gif" rel="shortcut icon" /> 
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="styles/index_style.css" />
    <link rel="stylesheet" type="text/css" href="styles/second_style.css" />
    <link rel="stylesheet" type="text/css" href="styles/fifth_style.css" />
    <link href="styles/ddmenu.css" rel="stylesheet" type="text/css" />
    <script src="js/ddmenu.js" type="text/javascript"></script>
    <script src="js/respond.js"></script>
        <script src="js/jquery.js"></script>
	<script src="js/jquery_functions_db.js"></script>

</head>

<body>

<div class="container">

	<!-- This is top bar -->
	<div id="topbar" class="row">
    	<?php include("includes/top_bar.php"); ?>
	</div>

	<!-- This is header -->
	<div id="header" class="row">
		<?php include("includes/header.php"); ?>
    </div>
        <!-- This is navigation bar -->
    <nav id="ddmenu" class="row">
        <?php include("includes/top-nav.php"); ?>
	</nav>

       <?php
				if(isset($_GET['updated'])){
					$update_mess = $_GET['updated'];
					echo "<div id='warning' class='alert alert-success alert-dismissable'>
					<button type='button' class='close' data-dismiss='alert' aria-hidden='true'> &times; </button>
        					<img src='images/icons2/checkmark2.png' width='18' height='18' style='float: left;'>
            				<span id='error'>&nbsp;&nbsp;&nbsp;$update_mess</span>
						 </div>";
				}
				if(isset($_GET['changed'])){
					$changed = $_GET['changed'];
					echo "<div id='warning' class='alert alert-success alert-dismissable'>
					<button type='button' class='close' data-dismiss='alert' aria-hidden='true'> &times; </button>
        					<img src='images/icons2/checkmark2.png' width='18' height='18' style='float: left;'>
            				<span id='error'>&nbsp;&nbsp;&nbsp;$changed</span>
						 </div>";
				}
				if(isset($_GET['mess'])){
					$message = $_GET['mess'];
					echo "<div id='warning' class='alert alert-success alert-dismissable'>
					<button type='button' class='close' data-dismiss='alert' aria-hidden='true'> &times; </button>
        					<img src='images/icons2/checkmark.png' width='18' height='18' style='float: left;'>
            				<span id='error'>&nbsp;&nbsp;&nbsp;$message</span>
						 </div>";
				}

            ?>

	<!-- This is start of main content area -->
	<div id="contents" class="row">
        
             
      <!--  <div id="profile">  -->
          <div id="account_left_side" class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <div id="dashboard">
                    <?php include("includes/dashboard.php"); ?>
                </div>
          </div> 
           
		  <div id="account_center" class="col-lg-6 col-md-6 col-sm-6 col-xs-9"> 
        	<div id="frame" class="row">
            
         <!--   	<div id="pic_title" class="col-md-12 col-sm-12 col-xs-12">  -->
      				<div id="title" class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            			<?php getProfileNames(); ?>
	        		</div>
                    <div id="pic" class="col-lg-4 col-md-4 col-sm-4 hidden-xs">
                    	<div class="thumbnail">
            				<?php getProfilePic(); ?> 
                        </div>
                        <div class="caption">
                        	<p style="margin-top: -15px; text-align: center;">
                        	<a href="dashboard_upload_image.php?mem_id=<?php echo $mem_id; ?>" class="btn btn-default btn-xs">Change your Photo</a>
                            </p>
                        </div>
                        
        			</div>
                    

          
            	
          	</div> 
            <div id="personal-statement" class="row">
                   <?php include("includes/personal_statement.php"); ?>
            </div>
            <div id="edit-personal-statement" class="row">
            	   <?php include("includes/edit_personal_statement.php"); ?>
            </div>
            <div id="professional-summary" class="row">
            	   <?php include("includes/professional_summary.php"); ?>
            </div>  
	    <div id="edit-professional-summary" class="row">
                   <?php include("includes/edit_professional_summary.php"); ?>
            </div>
            <div id="work-history" class="row">
            	   <?php include("includes/work_history.php"); ?>   
            </div>
            <div id="edit-work-history" class="row">
                   <?php include("includes/edit_work_history.php"); ?>	        
	    </div>
            <div id="qualification" class="row">
                   <?php include("includes/qualification.php"); ?>	
            </div>
            <div id="edit-qualification" class="row">
                   <?php include("includes/edit_qualification.php"); ?>  	
            </div>
            <div id="professional-skills" class="row">
                   <?php include("includes/professional_skills.php"); ?>	
            </div>
            <div id="edit-professional-skills" class="row">
                   <?php include("includes/edit_professional_skills.php"); ?>	
            </div>  
  
            <div id="personal-info" class="row">
                   <?php include("includes/personal_info.php"); ?>
            </div>
            <div id="edit-personal-info" class="row">
                   <?php include("includes/edit_personal_info.php"); ?>  	
            </div>
            <div id="looking-for" class="row">
                   <?php include("includes/looking_for.php"); ?>	
            </div>  
	    <div id="edit-looking-for" class="row">
                   <?php include("includes/edit_looking_for.php"); ?>
            </div>  

	    <div id="resume-cv" class="row">
                  <?php include("includes/resume_cv.php"); ?>	
            </div>
     </div>	    
     
    
    
	<!-- This is side bar -->
    	<div id="account_right_side" class="col-lg-3 col-md-3 col-sm-3 hidden-xs">
        	<?php include("includes/dashboard_account_right_side.php"); ?>
    	</div>
<!-- Main Content Ends -->      
</div>	
	<!-- This is footer -->
		<?php include("includes/footer_contents.php"); ?>
    
</div>

<!-- JavaScript-->
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
<?php } ?>