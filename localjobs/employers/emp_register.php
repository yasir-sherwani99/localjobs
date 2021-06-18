<?php
	include("includes/connection.php");
?>
<?php include("functions/emp_main_panel_functions.php"); ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Local Jobs Pakistan</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="styles/employer_style.css" />
    <script type="text/javascript" src="js/formvalidation.js"></script>
    <script src="js/respond.js"></script>
    <script src="js/jquery.js"></script>
	<script type="text/javascript">

	$(document).ready(function(){
		$("#emp_email").blur(function(){
			var user_email = $("#emp_email").val();
			
			$.ajax({
				url:'testempl.php',
				data:{email:user_email},
				type:'POST',
				success:function(data){
					$("#error1").html(data);
				}
			});
		});
		
		toggleFields();
		$("#location").change(function() {
        	toggleFields();
    	});


	});
	
	function toggleFields() {
    	if($("#location").val() == 28)
        	$("#other_loc").show();
    	else
        	$("#other_loc").hide();
		}
	
	</script>
</head>

<body>

<div class="container">

	<!-- This is top bar -->
	<div id="topbar" class="row">
    	<?php include("includes/top_bar.php"); ?>
    </div>

	<!-- This is header -->
	<div id="header" class="row">
		<img src="images/logo.png" />
    </div>
    
    <div class="row">
     	<?php include("includes/navigation.php"); ?>
    </div>	


<div class="row">	
	<!-- This is corporate news bar -->
     <div id='warning' class='alert alert-info'>
            <img src='images/info.png' style='width: 40px; height: 40px; float: left; margin-right: 10px;'/>
            <p>Experience dynamic hiring with our diverse solutions, designed to meet our recruitment needs effectively. To proceed further complete the registration form given below. If you are existing user <a href='employer_signin.php'>Login here.</a></p>
    </div>  
			 
     
	
	<!-- This is main content area -->
	<div id="contents" class="col-md-12 col-sm-12 col-xs-12">
    
       <div id="job_title" class="row" style="margin-bottom: 10px;"><img src="images/login.png"><h3>Employer / Organization Registration</h3>
       </div>     

 
	<div class="row">
        <div id="newemp" class="col-md-8 col-sm-8 col-xs-12">
        	<?php include("includes/comp_reg_form.php"); ?> 
        </div>
    
	<!-- This is side bar -->
	<div id="sidebar" class="col-md-4 col-sm-4 hidden-xs">
		<div id="exist_login" class="row">
 			<h1>SIGN UP NOW</h1>
            <h2>FOR A FREE TRIAL</h2>
            <h6>THE MOST ADVANCED JOB SITE</h6>
            <h4>IN PAKISTAN AND &nbsp;SOUTH ASIA</h4>
            <h5>AND INSTANTLY <span>POST YOUR JOBS</span> AND <span>SEARCH CVS</span></h5>       	
        </div>
     <!--   <div id="reg_ad">
        	<h3>Ads</h3>
        </div>   -->
	</div>
   </div> 
	
</div>
</div>
	<!-- This is footer -->
	<div id="footer" class="row">
		<?php include("includes/footer_contents.php"); ?>
	</div>
    
</div>

<!-- JavaScript-->
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
<?php
	if(isset($_POST['register'])){
		$empl_email = cleanStr($_POST['emp_email']);
		$empl_pass = cleanStr($_POST['emp_pass']);
		$empl_name = cleanStr($_POST['emp_name']);
		$empl_desig = cleanStr($_POST['emp_desig']);
		$empl_area_code = cleanStr($_POST['area_code']);
		$empl_land_line = cleanStr($_POST['land_line']);
		$empl_extn = cleanStr($_POST['ext']);
		$empl_mobile = cleanStr($_POST['emp_mobile']);
		$empl_comp_name = cleanStr($_POST['comp_name']);
		$empl_comp_addr = cleanStr($_POST['comp_addr']);
		$empl_comp_type = cleanStr($_POST['comp_type']);
		$empl_comp_loc = cleanStr($_POST['comp_loc']);
		$empl_other_city = cleanStr($_POST['other_city']);
		$empl_comp_ctry = cleanStr($_POST['country']);
		$empl_business = cleanStr($_POST['business']);
		$empl_industry = cleanStr($_POST['industry']);
		$empl_comp_profile = cleanStr($_POST['comp_profile']);
		$empl_comp_url = cleanStr($_POST['comp_url']);
		$empl_status = 'Active';
	
		$insert_employer = "INSERT INTO employers(comp_email, comp_pass, contact_person, designation, area_code, land_line, extn, mobile, comp_name, comp_addr, comp_type, location, other_city, country, business_type, category, profile, website, creation_date, status) VALUES('$empl_email', '$empl_pass', '$empl_name', '$empl_desig', '$empl_area_code', '$empl_land_line', '$empl_extn', '$empl_mobile', '$empl_comp_name', '$empl_comp_addr', '$empl_comp_type', '$empl_comp_loc', '$empl_other_city', '$empl_comp_ctry', '$empl_business', '$empl_industry', '$empl_comp_profile', '$empl_comp_url',NOW(), '$empl_status')";
		
		$run_employer = mysqli_query($connection, $insert_employer);
		if($run_employer){
			echo "<script>window.alert('Congratulations!, You are successfully registered...')</script>";
			echo "<script>window.open('employer_signin.php?mess=A company has registered successfully, Please Sign In to continue...!','_self')</script>";
		} else{
			die("Database query has failed...!" . mysqli_error());
		}	
	}
?>