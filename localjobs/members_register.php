<?php //session_start(); ?>
<?php
	include("includes/connection.php");
	include("functions/functions.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Local Jobs Pakistan</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" /> 
    <link rel="stylesheet" type="text/css" href="styles/index_style.css" />
    <link rel="stylesheet" type="text/css" href="styles/second_style.css" />
    <link href="styles/ddmenu.css" rel="stylesheet" type="text/css" />
    <script src="js/ddmenu.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/formvalidation.js"></script>
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
//					$("#correct").html(data);
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

<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.3&appId=842048222497902";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div class="container">

	<!-- This is top bar -->
	<div id="topbar" class="row">
		<div id="topleft" class="col-md-5 col-sm-5 col-xs-12">
        	<ul>
            	<li>ALREADY A MEMBER?</li>
                <li><a href="jobseeker_signin.php">Click Here</a></li>
            </ul>
        </div>
        <div id="topright" class="col-md-3 col-md-offset-4 col-sm-4 col-sm-offset-3 hidden-xs">
       		 If you are a Employer?&nbsp;<a href="employers/index.php" target="_blank" style='color: blue;'>Click here</a>
        </div>
	</div>

	<!-- This is header -->
	<div id="header" class="row">
		<img src="images/blue1.png" style="border: 1px solid #FFF;" class="img-responsive" alt="Responsive image"/>
    </div>
        <!-- This is navigation bar -->
    <nav id="ddmenu" class="row">
        <?php include("includes/top-nav.php"); ?>
	</nav>

	<!-- This is start of main content area -->

<div class="row">    
  <div id="contents" class="col-md-12">

	<div class="row">    
        <div id="form" class="col-md-8 col-sm-8 col-xs-12">
        	 <img src="images/icons2/id.png"><h1>New User? Please Sign Up</h1> 	            
             <?php include("includes/newuser_reg.php"); ?>  
        </div>

    	<div id="reg2" class="col-md-4 col-sm-4 hidden-xs">
        	<?php include("includes/member_signup_info.php"); ?>
        </div>   
            
     </div> 
   </div>  
 </div>   
    <!-- Main Content Ends -->
    	
	<!-- This is footer -->

		<?php include("includes/footer_contents.php"); ?>
    
</div>

<!-- JavaScript-->
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
<?php //session_start(); ?>

<?php
	if(isset($_POST['register'])){
		$mem_email = cleanStr($_POST['m_email']);
		$mem_pass = cleanStr($_POST['m_pass']);
		$mem_f_name = cleanStr($_POST['f_name']);
		$mem_l_name = cleanStr($_POST['l_name']);
		$mem_gender = cleanStr($_POST['m_gender']);
		$dob_day = cleanStr($_POST['dob_day']);
		$dob_month = cleanStr($_POST['dob_month']);
		$dob_year = cleanStr($_POST['dob_year']);
		$mem_city = cleanStr($_POST['location']);
		$mem_city_other = cleanStr($_POST['other_location']);
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
		$mem_industry = cleanStr($_POST['industry']);
		$mem_experience = cleanStr($_POST['experience']);
		$first_job_day = cleanStr($_POST['job_start_day']);
		$first_job_month = cleanStr($_POST['job_start_month']);
		$first_job_year = cleanStr($_POST['job_start_year']);
		$current_job_title = cleanStr($_POST['current_job_title']);
		$mem_exp_year = cleanStr($_POST['m_exp_year']);
		$mem_exp_month = cleanStr($_POST['m_exp_month']);
		$current_start_day = cleanStr($_POST['current_start_day']);
		$current_start_month = cleanStr($_POST['current_start_month']);
		$current_start_year = cleanStr($_POST['current_start_year']);
		$end_date = cleanStr($_POST['current_end_year']);
		$comp_name = cleanStr($_POST['comp_name']);
		$comp_ctry = cleanStr($_POST['comp_ctry']);
		$comp_city = cleanStr($_POST['comp_city']);
		$cv_headline = cleanStr($_POST['cv_headline']);
		$mem_cv = cleanStr($_FILES['m_cv']['name']);
		$mem_cv_tmp = $_FILES['m_cv']['tmp_name'];
		$profile_status = 'Active';
//		$mem_encr_pass = md5($mem_pass);
		
		$insert_member = "INSERT INTO members(mem_first_name, mem_last_name, mem_email, mem_pass, mem_gender, mem_cell, mem_home_ph, dob_day, dob_month, dob_year, mem_city, mem_city_other, mem_country, degree_level, degree_title, degree_city, degree_ctry, majors, institution, completion_year, work_exp, first_job_day, first_job_month, first_job_year, mem_exp_year, mem_exp_month, profession_industry, current_job, current_job_day, current_job_month, current_job_year, current_end_date, comp_name, comp_ctry, comp_city, cv_headline, mem_cv, creation_date, status) VALUES ('$mem_f_name', '$mem_l_name', '$mem_email', '$mem_pass','$mem_gender', '$mem_mobile', '$mem_home_ph', '$dob_day', '$dob_month', '$dob_year', '$mem_city', '$mem_city_other', '$mem_ctry', '$mem_edu_level', '$mem_degree_title', '$mem_institute_city', '$mem_institute_ctry','$mem_majors', '$mem_institute_name', '$mem_complete_year', '$mem_experience', '$first_job_day', '$first_job_month', '$first_job_year', '$mem_exp_year', '$mem_exp_month', '$mem_industry', '$current_job_title', '$current_start_day', '$current_start_month', '$current_start_year', '$end_date', '$comp_name', '$comp_ctry', '$comp_city', '$cv_headline', '$mem_cv', NOW(), '$profile_status')";
		
		$run_insert = mysqli_query($connection, $insert_member);
		
		$to = $mem_email;
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		$headers .= 'From: <support@localjobs.pk>';
		
		$subject = "Welcome: localjobs.pk";
		$message = "Hello!
					Welcome to localjobs.pk
					E-mail: {$email}
					Your password: {$password1}
					Now you can login with this email and password";
		
		$retval = mail($to, $subject, $message, $headers);
		
		move_uploaded_file($mem_cv_tmp, "members/member_cvs/$mem_cv");
		
		echo "<script>window.open('jobseeker_signin.php?created=Thank you! Your account has been created successfully, Enter your email and password to sign in...','_self')</script>";
	
			if(!$run_insert){
				die("database query has failed" .  mysqli_error());
			}
	}
?>
