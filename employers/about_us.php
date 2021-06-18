<?php session_start(); ?>
<?php
	include("includes/connection.php");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Local Jobs Pakistan</title>
	<link href="../images/logo_small.png" type="image/gif" rel="shortcut icon" />
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="styles/employer_style.css" />
    <script src="js/respond.js"></script>
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
    
    <div class="row">
     	<?php include("includes/navigation_us.php"); ?>
    </div>	
	
	<!-- This is main content area -->
	<div id="contents" class="row">
    	<div class="col-md-8 col-sm-7">
        	<h3 style="font-size: 18px; font-weight: bold;">About Us</h3>
            <p>Localjobs.pk is created and managed by <span style="color: #06F;">Yee Technologies,</span> a technology firm founded in 2015 and one of the very few companies in Pakistan specialized in developing innovative Online Recruitment Solutions for top enterprises and organizations.</p>
            <p>Since May 2015, we successfully served 3,000+ top companies and employers in Pakistan. 1 million CVs were viewed on our platform and 25,000+ job seekers directly hired through us. In total, 70,000+ open job vacancies were advertized and now, 200,000+ users visit our website each month looking for jobs at top Employers.</p>
            <p>We are now expanding out success to the Gulf region. We are helping employers and job seekers from UAE, Qatar and other gulf countries find their right match through out intelligent real-time recommendations and around the clock support.
            </p>
            
            <h3 style="font-size: 18px; font-weight: bold;">Looking for a job?</h3>
            <p>If you are searching for a new career opportunity. you can <a href="../search_result.php">search open vacancies and jobs.</a> You can also <a href="../members_register.php">sign up here</a> to be alerted of new jobs by email.</p>
            
            <h3 style="font-size: 18px; font-weight: bold;">Are you a recruiter or employer?</h3>
            <p>If you are currently hiring and would like to advertise your jobs at localjobs.pk, please <a href="emp_register.php">signup for an employer account</a> and post your jobs right away.</p>
            
            <h3 style="font-size: 18px; font-weight: bold;">Other inquiries?</h3>
            <p>If you have any other inquiries. please contact us <a href="">here.</a></p>
    	</div>
        
        <div style="margin-top: 50px;" class="col-md-4 col-sm-5">
        	<iframe
            	width="300"
				height="300"  
				frameborder="0" 
				style="border:1;padding:0px;margin:0px;border-collapse:collapse;border-color:#002e34;"
				src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d54495.15640256036!2d74.23637720000002!3d31.388017299999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3918fff17b4d3e97%3A0xa7384e1ff6717543!2sNargis+Block%2C+Lahore%2C+Pakistan!5e0!3m2!1sen!2s!4v1435128465974">
			</iframe>

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