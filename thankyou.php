<?php session_start(); ?>
<?php
	include("includes/connection.php");
	include("functions/functions.php");
?>

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
		$mem_cv = cleanStr($_FILES['m_cv']['name']);
		$mem_cv_tmp = $_FILES['m_cv']['tmp_name'];
	//	$terms_cond = $_POST['terms'];
		$profile_status = 'Active';
		
		$insert_member = "INSERT INTO members(mem_first_name, mem_last_name, mem_email, mem_pass, mem_gender, mem_cell, mem_home_ph, dob_day, dob_month, dob_year, mem_city, mem_country, degree_level, degree_title, degree_city, degree_ctry, majors, institution, completion_year, work_exp, first_job_day, first_job_month, first_job_year, mem_exp_year, mem_exp_month, profession_industry, current_job, current_job_day, current_job_month, current_job_year, current_end_date, comp_name, comp_ctry, comp_city, cv_headline, mem_cv, creation_date, status) VALUES ('$mem_f_name', '$mem_l_name', '$mem_email', '$mem_pass','$mem_gender', '$mem_mobile', '$mem_home_ph', '$dob_day', '$dob_month', '$dob_year', '$mem_city', '$mem_ctry', '$mem_edu_level', '$mem_degree_title', '$mem_institute_city', '$mem_institute_ctry','$mem_majors', '$mem_institute_name', '$mem_complete_year', '$mem_experience', '$first_job_day', '$first_job_month', '$first_job_year', '$mem_exp_year', '$mem_exp_month', '$mem_industry', '$current_job_title', '$current_start_day', '$current_start_month', '$current_start_year', '$end_date', '$comp_name', '$comp_ctry', '$comp_city', '$cv_headline', '$mem_cv', NOW(), '$profile_status')";
		
		$run_insert = mysqli_query($connection, $insert_member);
		
	//	move_uploaded_file($mem_image_tmp, "members/member_photos/$mem_image");
		
		move_uploaded_file($mem_cv_tmp, "members/member_cvs/$mem_cv");
		
		echo "<script>window.alert('Accounts Created Successfully! Thank you')</script>";
	
			if(!$run_insert){
				die("database query has failed" .  mysqli_error());
			}
	
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>THElocal Jobs</title>
    <link rel="stylesheet" type="text/css" href="styles/index_style.css" />
    <link href="styles/ddmenu.css" rel="stylesheet" type="text/css" />
    <script src="js/ddmenu.js" type="text/javascript"></script>
    <script src="jquery.js"></script>
	<style>
		#login{
			width: 280px;
			height: auto;
			border: 1px solid #E0E0E0;
			background-color: #E0E0E0;
			font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
			font-size: 14px;
			margin-right: 20px;
			border-radius: 10px;
		}
		#login h1{
			font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
			font-size: 20px;
			border: 0px solid red;
			margin-top: 0px;
			padding-left: 18px;
			padding-top: 10px;
			margin-bottom: -1px;
		}
		#login table{
			border: 0px solid green;
			margin-left: 18px;
		}
		input[type=text]{
			width: 230px;
			height: 25px;
		}
		input[type=password]{
			width: 230px;
			height: 25px;
		}
		#login input[type=submit]{
			background-color: #3399FF;
			padding: 6px;
			font-size: 14px;
			font-weight: bold;
			color: #FFF;
			border-radius: 8px;
		}
		#wel{
			border: 1px solid #CDB797; 
			background-color: #6B8E23; 
			color: #FFF; 
			width: 800px; 
			height: 30px; 
			font-size: 20px; 
			padding-top: 5px; 
			margin-top: 20px; 
			margin-left: auto; 
			margin-right: auto; 
			border-radius: 10px; 
			padding-left: 20px;
		}
		#mess{
			border: 1px solid #6B8E23; 
			width: 820px; 
			height: 350px; 
			margin-left: auto; 
			margin-right: auto; 
			margin-top: 20px; 
			border-radius: 10px; 
			margin-bottom: 10px;
		}

	</style> 
	<script type="text/javascript">

		$(document).ready(function(){
			$("#sub").click(function(){
				var user_email = $("#email").val();
				var user_pass = $("#pass").val();
				$.post("test.php",{email:user_email,pass:user_pass},function(data){
					$("#error").html(data);
				});
			});
		});
		
	</script>

</head>

<body>

<div id="container">

	<!-- This is top bar -->
	<div id="topbar">
		<div id="topleft" style="border: 0px solid red; padding-top: 6px; height: 22px; padding-left: 5px; 	border: 1px solid #CCC;">
                <?php
		
				echo "Welcome: " . "<b style='font-weight: bold;'>" . $mem_f_name . "&nbsp;" . $mem_l_name . "</b> | ";
				echo "<a href='members_logout1.php'> Logout</a>";
			
        ?>

        </div>
        <div id="topright">
        If you are a Employer? <a href="#">Click here</a>
        </div>
	</div>

	<!-- This is header -->
	<div id="header">
		<img src="images/localjobs_logo.png" />
    </div>
        <!-- This is navigation bar -->
     <nav id="ddmenu">   
     <!--   <div id="nav">
        	<ul>
                <li><a href="#">HOME</a></li>
                <li><a href="#">DASH BOARD</a></li>
                <li><a href="#">SEARCH</a></li>
                <li><a href="#">POST RESUME</a></li>
                <li><a href="#">EMPLOYERS</a></li>
        	</ul>  
    	</div>  -->
        <?php include("includes/top-nav.php"); ?>
	</nav>

	<!-- This is start of main content area -->
	<div id="contents" style="background-color: #FFF; font-family: Trebuchet MS; border:hidden; margin-left: auto;">
   		<div id="wel">Thank you <?php echo "Welcome: <b>" . $mem_f_name . "&nbsp;" . $mem_l_name . "</b>"; ?> for submitting your Resume</div>
        <div id="mess">
        <p style="color: #6B8E23; padding-left: 20px; padding-top: 0px; font-weight: bold;">
        	You will received an automated email shortly. Kindly follow the instructions to verify your phone number.
        </p>
        <span style="color: #6B8E23; padding-left: 20px; font-size: 14px;">Kindly check your inbox to verify your email address.</span>
        	<hr style="border-color: #6B8E23; width: 780px;"/>
        	<div style="width: 475px; height: auto; font-size: 14px; margin-left: 20px; margin-top: 0px; float: left;">
            <p>
            	Your resume is now being reviewed by our team. We will notify you in less than one day when your resume is approved and searchable by recruiters.
            </p>
            <p>
            	To complete, your registration process, you must verify your email address and phone number.
            </p>
            <p>
            	While your CV is being reviewed, you can continue to search and apply for jobs.
            </p>
        	</div>
            <?php } ?>
            <div id="login" style="float: right;">
                   	<h1>User Login</h1><hr/>
            
            <table>
            <tr>
            	<td>User Name</td>
            </tr>
            <tr>
            	<td><input type="text" name="username" id="email" /></td>
            </tr>
            <tr>
            	<td>Password</td>
            </tr>
            <tr>
            	<td><input type="password" name="userpass" id="pass" /></td>
            </tr>
            <tr>
            	<td><span id="error"></span></td>
            </tr>
			<tr>
            	<td><a href="#" style="color: #F00;">Forgot Password?</a></td>
            </tr>
            <tr align="right">
            	<td><input type="submit" name="login" id="sub" value="Sign In" /></td>
            </tr>
            </table>
            </form>
            </div>
        </div>       
        
	</div>

   	    
    <!-- Main Content Ends -->
	<!-- Footer Starts -->
	<div id="footer">
    	<?php include("includes/footer_contents.php"); ?>
    </div>
    <!-- Footer Ends -->

</div>
<!-- Main Container Ends -->
</body>
</html>
<?php
	/*
	if(isset($_POST['login'])){
	
	$username = $_POST['username'];
	$password = $_POST['userpass'];
	
	$query = "SELECT * FROM members
			  WHERE mem_email = '$username' && mem_pass = '$password'";
	
	$result = mysqli_query($connection, $query);
	if(!$result){
		die("Database query has failed:" . mysqli_error());
	}
	
	$check_user = mysqli_num_rows($result);
	if($check_user > 0){
		$_SESSION['username'] = $username;
		echo "<script>window.alert('You are logged in succsssfully!')</script>";
		echo "<script>window.open('view_all_category.php','_self')</script>";
	}else{
		echo "<script>document.getElementById('error').innerHTML='Username or Password is Incorrect!'</script>";
	
	}
	} 
	*/
?>