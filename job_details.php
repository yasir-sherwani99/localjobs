<?php
	session_start();
	
	include("includes/connection.php");
	include("functions/functions.php");
	include("functions/jobdetail_functions.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Local Jobs Pakistan</title>
	<link href="images/logo_small.png" type="image/gif" rel="shortcut icon" />
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="styles/index_style.css" />
    <link rel="stylesheet" type="text/css" href="styles/third_style.css" />
    <link href="styles/ddmenu.css" rel="stylesheet" type="text/css" />
    <script src="js/jquery.js"></script>
    <script src="js/respond.js"></script>
    <script src="js/ddmenu.js" type="text/javascript"></script>
     	<script type="text/javascript">

		$(document).ready(function(){
			toggleFields();
			$("#pak_location").hide();
			$("#other_loc").hide();
		
			$("#country").change(function() {
        		toggleFields();
    		});
			
			$(".when_apply_to_job").hide();
			
			$(".s_b").click(function(){
				$(".about_job").hide();
				$(".when_apply_to_job").show();
			});  	
		});
		
		$(document).ready(function(){
			
			$("#click").click(function(){
				$(".about_job").show();
				$(".when_apply_to_job").hide();
			});	
			
		});
		
		
		function toggleFields() {
    		if($("#country").val() == 1){
        		$("#pak_location").show();
				$("#other_loc").hide();
		}
    	else{
        	$("#other_loc").show();
			$("#pak_location").hide();
		}
		}
	
	$(document).ready(function(){
		$("#login").click(function(){
			var user_email = $("#email").val();
			var user_pass = $("#password").val();
			var job_id = $("#hidden").val();
			
		
			$.post("detail_check_login.php",{email:user_email, pass:user_pass, id:job_id},function(data){
				$("#error").html(data);
			});  
			
		});
	});


	</script>

   <!-- Place this tag in your head or just before your close body tag. -->
	<script src="https://apis.google.com/js/platform.js" async defer></script>
	
	
</head>

<body>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.4&appId=842048222497902";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

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
	if(isset($_GET['job_id'])){
			$job_id = $_GET['job_id'];
        	$get_jobs = "SELECT * FROM company_jobs WHERE job_id = '$job_id'";
			$run_jobs = mysqli_query($conn, $get_jobs);
			$row_jobs = mysqli_fetch_array($run_jobs);
					$job_id1 = $row_jobs['job_id'];
					$cat_job_id = $row_jobs['cat_id'];
					$comp_id = $row_jobs['comp_id'];
					$job_title = $row_jobs['job_title'];
				//	$job_company = $row_jobs['company_name'];
					$job_location = $row_jobs['job_location'];
					$other_city = $row_jobs['other_city'];
					$job_country = $row_jobs['job_ctry'];
					$job_qual = $row_jobs['job_qual'];
					$job_desc = $row_jobs['job_desc'];
					$job_skills = $row_jobs['job_skills'];
					$job_status = $row_jobs['emp_status'];
					$min_exp = $row_jobs['min_exp'];
					$max_exp = $row_jobs['max_exp'];
					$job_vacancies = $row_jobs['vacancies'];
					$min_salary = $row_jobs['min_salary'];
					$max_salary = $row_jobs['max_salary'];
					$post_date = date("d F Y", strtotime($row_jobs['post_date']));
					$job_expiry_date = $row_jobs['expiry_date'];
				//	$comp_profile = $row_jobs['company_profile'];
					$job_email = $row_jobs['company_email'];
					$job_keywords = $row_jobs['job_keywords'];
					$job_desc1 = html_entity_decode($job_desc);
					$job_skills1 = html_entity_decode($job_skills);

			$get_company = "SELECT * FROM employers WHERE comp_id = '$comp_id'";
			$run_company = mysqli_query($connection, $get_company);
			$row_company = mysqli_fetch_array($run_company);
				$cid = $row_company['comp_id'];
				$cname = $row_company['comp_name'];
				$clogo = $row_company['comp_logo'];
				$cprofile = $row_company['profile'];
				
			$get_city = "SELECT * FROM city WHERE city_id = '$job_location'";
			$run_city = mysqli_query($connection, $get_city);
			$row_city = mysqli_fetch_array($run_city);
				$city_id = $row_city['city_id'];
				$city_title = $row_city['city_name'];

			$get_ctry = "SELECT * FROM countries WHERE ctry_id = '$job_country'";
			$run_ctry = mysqli_query($connection, $get_ctry);
			$row_ctry = mysqli_fetch_array($run_ctry);
				$ctry_id = $row_ctry['ctry_id'];
				$ctry_title = $row_ctry['ctry_name'];
				
			$get_cat = "SELECT * FROM categories WHERE cat_id = '$cat_job_id'";
			$run_cat = mysqli_query($connection, $get_cat);
			$row_cat = mysqli_fetch_array($run_cat);
				$cat_id = $row_cat['cat_id'];
				$cat_title = $row_cat['cat_title'];	

	?>
	<!-- This is start of main content area -->
	<div id="contents" style="font-family:Trebuchet MS;" class="row">
    <?php
		if(isset($_GET['mess1'])){
			$message = $_GET['mess1'];
			$message2 = $_GET['mess2'];
			echo "<div id='success_message' class='alert alert-success'>
				  	<img src='images/icons2/checkmark2.png'>&nbsp;&nbsp;
					<b>{$message}</b>&nbsp;&nbsp;{$message2}
				  </div>";
		}
		
		if(isset($_GET['mess4'])){
			$message4 = $_GET['mess4'];
			$message5 = $_GET['mess5'];
			echo "<div id='success_message' class='alert alert-info'>
				  	<img src='images/icons2/info2.png'>&nbsp;&nbsp;
					<b>{$message4}</b>&nbsp;&nbsp;{$message5}
				  </div>";
		}
		
		if(isset($_GET['mess3'])){
			$message3 = $_GET['mess3'];
			echo "<div id='success_message' class='alert alert-danger'>
				  	<img src='images/icons2/cross.png'>&nbsp;&nbsp;
					&nbsp;&nbsp;{$message3}
				  </div>";
		}
		
    ?>	
    <ol class="breadcrumb">
    	<li><a href="index.php">Home</a></li>
        <li><a href="cat_details.php?cat_id=<?php echo $cat_id; ?>"><?php echo $cat_title; ?></a></li>
        <li class="active"><?php echo $job_title; ?></li>
    </ol>
    
    <div class="row" style="padding: 5px;">
    
    	<div class="col-md-1 col-sm-1 col-xs-1">
    		<div class="fb-like" data-href="http://localjobs.pk/job_details.php?job_id=<?php echo $job_id1; ?>" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div>
  	</div>
  	<div class="col-md-1 col-sm-1 col-xs-1" style="margin-left: 40px;">
		<a href="https://twitter.com/share" class="twitter-share-button" data-url="http://www.localjobs.pk/job_details.php?job_id=<?php echo $job_id1; ?>">Tweet</a>
		<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
	</div>
  	<div class="col-md-2 col-sm-2 col-xs-2" style="margin-left: 0px;">
  		<script src="//platform.linkedin.com/in.js" type="text/javascript"> lang: en_US</script>
		<script type="IN/Share" data-url="http://www.localjobs.pk/job_details.php?job_id=%3C?php%20echo%20$job_id1;%20?%3E" data-counter="right"></script>
		
	</div>
	<div class="col-md-1 col-sm-1 col-xs-1" style="margin-left: -87px;"><g:plusone></g:plusone></div>
	
	
    </div>	
    
            <div id="job_details" class="col-md-12 col-sm-8 col-xs-8">
            	<div class="row">
                    <div id="left_side_bar" class="col-md-3 hidden-sm hidden-xs">
                        <div id="summary" class="panel panel-default">
                            <?php include("includes/summary.php"); ?>
                        </div>
                    
                        <!-- Email subscription Box start -->
          
                <div id="optin">
			<form action="//localjobs.us11.list-manage.com/subscribe/post?u=7519e5679f828c0e97fb092c2&amp;id=674d602d14" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                  	<div id="mc_embed_signup_scroll">
	            <label for="mce-EMAIL">Subscribe to our mailing list</label>
	            <input type="email" value="" name="EMAIL" class="email form-control" id="mce-EMAIL" placeholder="email address" required>
            <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                    <div style="position: absolute; left: -5000px;"><input type="text" name="b_7519e5679f828c0e97fb092c2_674d602d14" tabindex="-1" value=""></div>
                    <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button btn btn-success btn-block"></div>
    </div>
</form>
		</div>

                    
                    <!-- ad box start here -->
                        <div id="job_ads_area" class="row">
                            <h4>Ads</h4>
                            <div style="margin-left: -25px;">
                            	<script src="//go.padstm.com/?id=416628"></script>
                            </div>	
                        </div>
                    <!-- ad box end here -->
                    
                    </div>
                    
                    <div id="details" class="col-md-6 col-sm-8 col-xs-8">
                        <div id="job_comp" class="row">
                            <ul class="list-unstyled">
                                <li style="font-size: 22px; color: #00F;"><?php echo $job_title; ?></li>
                                <li style="font-size: 20px; color: #000;"><?php echo $cname; ?></li>
                                <li style="font-size: 14px; color: #A0A0A0;">Date Posted: <?php echo $post_date; ?></li>
                            </ul>
                                              <!--  <hr style="border-style: dashed;"/>       -->         
                        </div>
                        <div id="about_job" class="row about_job">
                            <?php include("includes/about_job.php"); ?>
                        </div>
                      
                        <div id="when_apply_to_job" class="row when_apply_to_job">
                            <?php include("includes/when_apply_to_job.php"); ?>
                        </div>

                
                    </div>
                    <!-- This is side bar -->
                    <div id="sidebar" style="border: 1px solid #FFF;" class="col-md-3 hidden-4 col-xs-4">
                        <div id="logo" class="row">
                                <?php
                                    if($clogo == ""){
                                        echo "<img src='images/no_log.png' width='90' height='90' />";
                                    } else {
                                        echo "<img src='employers/company_logo/$clogo' />";
                                    } 
                                ?>  
    
                            </div>    
    
                     
                     	<div id="apply_job" class="row about_job">
                           <div id="button">
			   <?php
                                    if(isset($_SESSION['username'])){
                                        echo "<a href='job_details.php?jid=$job_id1' style='text-decoration: none;'>
                                              <button class='btn btn-success btn-block'>Apply to Job</button></a>";
                                    }
                                    else{
                                        echo "<button class='btn btn-primary btn-block s_b'>Apply to Job</button>";
                                    }
                            ?>
                            <?php
					$memapps = countAPPLICATIONS($job_id);
					$nonmemapps = countQuickAPPLICATIONS($job_id);
					$totalapps = $memapps + $nonmemapps;
            		     ?>
                            </div>
                            <div id="people_already_applied" class="col-md-12 about_job"><?php echo $totalapps; ?> people have applied</div>
                        </div>
                   
                   	<div id="new_about_job" class="row about_job">
                             <br /><span style="padding-left: 115px;">OR</span><br />
                             <a href="search_result.php"><button class="btn btn-warning btn-block"><span class="glyphicon glyphicon-search"></span> Search Jobs</button></a>  
                        </div>
                        <div id="social_share" class="row about_job" style="text-align: center;">
                           
                             <h4>Ads</h4>
                      
					<script src="//go.padstm.com/?id=416583"></script>
						
                                
                        </div>
                        <div id="when_apply_login" class="row when_apply_to_job">
                                <?php include("includes/when_apply_login.php"); ?>		
                         </div>
                    </div>
        
                </div>
			</div>       
   
    </div>
    <?php } ?>
    <!-- Main Content Ends -->
    
	
	<!-- This is footer -->
		<?php include("includes/footer_contents.php"); ?>
    
</div>

<!-- JavaScript-->
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>

<?php

	if(isset($_GET['jid'])){
	
			$jid = $_GET['jid'];
		
			if(isset($_SESSION['username'])){
				$username = $_SESSION['username'];
				
				$get_mem = "SELECT * FROM members WHERE mem_email = '$username'";
				$run_mem = mysqli_query($connection, $get_mem);
				$row_mem = mysqli_fetch_array($run_mem);
					$mem_id = $row_mem['mem_id'];
					$mem_fname = $row_mem['mem_first_name'];
					$mem_lname = $row_mem['mem_last_name'];
					$mem_email = $row_mem['mem_email'];
					$mem_ph = $row_mem['mem_cell'];
					$job_status = 'Received';
					
				$get_job = "SELECT * FROM company_jobs WHERE job_id = '$jid'";
				$run_job = mysqli_query($connection, $get_job);
				$row_job = mysqli_fetch_array($run_job);
					$jtitle = $row_job['job_title'];
					$jcompid = $row_job['comp_id'];
					$jexpirydate = $row_job['expiry_date'];
					$applydate = date("F d, Y");
					
			$get_comp = "SELECT * FROM employers WHERE comp_id = '$jcompid'";
			$run_comp = mysqli_query($connection, $get_comp);
			$row_comp = mysqli_fetch_array($run_comp);
				$cid1 = $row_comp['comp_id'];
				$cname1 = $row_comp['comp_name'];
				$cemail = $row_comp['comp_email'];

				$check = "SELECT * FROM jobs_apply WHERE job_id='$jid' && mem_id='$mem_id'";
				$run_check = mysqli_query($connection, $check);
				$check_again = mysqli_num_rows($run_check);
		
				if($check_again >= 1){
					echo "<script>window.open('job_details.php?job_id=$jid&mess3=You have already applied for this job...', '_self')</script>";
					exit(); 
				}	
				else{
		
				$insert_record = "INSERT INTO jobs_apply(job_id, comp_id, mem_id, apply_date, job_status) VALUES ('$jid', '$cid1', '$mem_id', NOW(), '$job_status')";
				
				$run_record = mysqli_query($connection, $insert_record);
				
				$to = $mem_email;
				$headers = "MIME-Version: 1.0" . "\r\n";
				$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
				$headers .= 'From: <admin@localjobs.pk>';
		
				$subject = "LocalJobs.pk: CV Delivered - {$jtitle}";
				$message = "<b>Dear {$mem_fname}</b> <br /><br/>
		
				Your CV has been successfully delivered to the following employer advertising on Localjobs.pk
				<br/><br/>
				
				<b>Application Details</b><br/><br/>

				Position:&nbsp;&nbsp; {$jtitle}<br/>
				Employer:&nbsp;&nbsp; {$cname1} <br/>
				Application Date:&nbsp;&nbsp; {$applydate}<br/><br/>
				
				<b>What happens next?</b><br/><br/>
				
				Your job applications are recorded and instantly delivered to the recruiter advertising the vacancy. The recruiter then reviews the applications and, if your CV and general profile match their requirements, may decide to contact you for a telephone or face-to-face interview. <br/><br/>

Please note that recruiters receive hundreds of applications for each vacancy and may not provide individual notification or feedback on unsuccessful applications. However, you may track on-line whether your chosen vacancy is still open or has been closed. <br/><br/>

Thank you for using Localjobs.pk, and good luck with your job search! <br/><br/>

						
				Best regards,<br/>
 				<b>The LocalJobs.pk Team</b>";
 				
 				$to_emp = $cemail;
				$headers_emp = "MIME-Version: 1.0" . "\r\n";
				$headers_emp .= "Content-type:text/html;charset=UTF-8" . "\r\n";
				$headers_emp .= 'From: <admin@localjobs.pk>';
		
				$subject_emp = "LocalJobs.pk: CV Received - {$jtitle}";
				$message_emp = "<b>Dear {$cname1}</b> <br /><br/>
		
				Your have received an application against the job that you have advertise at Localjobs.pk
				<br/><br/>
				
				<b>Applicant Details</b><br/><br/>

				Name:&nbsp;&nbsp; {$mem_fname}&nbsp;{$mem_lname}<br/>
				Email:&nbsp;&nbsp; {$mem_email} <br/>
				Application Date:&nbsp;&nbsp; {$applydate}<br/><br/>
				
				<b>What happens next?</b><br/><br/>
				
				The job application has been delivered to {$cname1}, to view further details about the applicant, please log on to <a href='http://localjobs.pk/employers'>www.localjobs.pk</a>.  <br/><br/>


Thank you for using Localjobs.pk, and good luck with your job suitable candidate search! <br/><br/>

						
				Best regards,<br/>
 				<b>The LocalJobs.pk Team</b>";
		
				$retval = mail($to, $subject, $message, $headers);
				$retval_emp = mail($to_emp, $subject_emp, $message_emp, $headers_emp);

				
	
				echo "<script>window.open('job_details.php?job_id=$jid&mess1=Your application has been submitted successfully!&mess2=Employer may contact you on 0$mem_ph', '_self')</script>";
					
				}
	}
	}
?>
<?php
	
	if(isset($_POST['quick_apply'])){
		$jobid = $_GET['job_id'];
		$firstname = cleanStr($_POST['fname']);
		$lastname = cleanStr($_POST['lname']);
		$email = cleanStr($_POST['email']);
		$country = cleanStr($_POST['country']);
		$pakcity = cleanStr($_POST['pakcity']);
		$othercity = cleanStr($_POST['other_city']);
		$mobile = cleanStr($_POST['mobile']);
		$cv = cleanStr($_FILES['resume']['name']);
		$cv_tmp = $_FILES['resume']['tmp_name'];
		$cv_size = $_FILES['resume']['size'];
		$cv_type = $_FILES['resume']['type'];
		$job_status = 'Received';
		$applydate = date("F d, Y");
		
		$get_job = "SELECT * FROM company_jobs WHERE job_id = '$jobid'";
		$run_job = mysqli_query($connection, $get_job);
		$row_job = mysqli_fetch_array($run_job);
			$jcompid = $row_job['comp_id'];
			$jobtitle = $row_job['job_title'];
			$jexpirydate = $row_job['expiry_date'];
		
		$get_comp = "SELECT * FROM employers WHERE comp_id = '$jcompid'";
			$run_comp = mysqli_query($connection, $get_comp);
			$row_comp = mysqli_fetch_array($run_comp);
				$cid1 = $row_comp['comp_id'];
				$cname1 = $row_comp['comp_name'];
				$cemail = $row_comp['comp_email'];
			
		$allowedExts = array(
  				"pdf", 
  				"doc", 
  				"docx"
		); 

		$allowedMimeTypes = array( 
  				'application/msword',
  				'application/pdf'
		);

		$extension = end(explode(".", $cv));

		if ( 512000 < $cv_size ) {
  			echo "<script>document.getElementById('error26').innerHTML='File size should be less than 500KB'</script>";
			exit();
		}

		if ( ! ( in_array($extension, $allowedExts ) ) ) {
  			echo "<script>document.getElementById('error26').innerHTML='File type should be docx or pdf'</script>";
			exit();
		}

		else 
		{     
		 
	   	$randString = md5(time());
		$randString1 = substr(str_shuffle($randString), 0, 8);
		$splitName = explode(".", $cv);
		$fileExt = end($splitName);
		$newCVname  = strtolower($firstname.$lastname.$randString1.'.'.$fileExt);

		$insert_query = "INSERT INTO quick_apply(job_id, comp_id, first_name, last_name, email, country, pak_city, other_city, mobile, cv, apply_date, job_status) VALUES('$jobid', '$jcompid', '$firstname', '$lastname', '$email', '$country', '$pakcity', '$othercity', '$mobile', '$newCVname', NOW(), '$job_status')";
		
		$run_insert = mysqli_query($connection, $insert_query);
		
		move_uploaded_file($cv_tmp, "members/member_cvs/$newCVname");
		
				$to = $email;
				$headers = "MIME-Version: 1.0" . "\r\n";
				$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
				$headers .= 'From: <admin@localjobs.pk>';
		
				$subject = "LocalJobs.pk: CV Delivered - {$jobtitle}";
				$message = "<b>Dear {$firstname}</b> <br /><br/>
		
				Your CV has been successfully delivered to the following employer advertising on Localjobs.pk
				<br/><br/>
				
				<b>Application Details</b><br/><br/>

				Position:&nbsp;&nbsp; {$jobtitle}<br/>
				Employer:&nbsp;&nbsp; {$cname1} <br/>
				Application Date:&nbsp;&nbsp; {$applydate}<br/><br/>
				
				<b>What happens next?</b><br/><br/>
				
				Your job applications are recorded and instantly delivered to the recruiter advertising the vacancy. The recruiter then reviews the applications and, if your CV and general profile match their requirements, may decide to contact you for a telephone or face-to-face interview. <br/><br/>

Please note that recruiters receive hundreds of applications for each vacancy and may not provide individual notification or feedback on unsuccessful applications. However, you may track on-line whether your chosen vacancy is still open or has been closed. <br/><br/>

Thank you for using Localjobs.pk, and good luck with your job search! <br/><br/>

						
				Best regards,<br/>
 				<b>The LocalJobs.pk Team</b>";
 				
 				$to_emp = $cemail;
				$headers_emp = "MIME-Version: 1.0" . "\r\n";
				$headers_emp .= "Content-type:text/html;charset=UTF-8" . "\r\n";
				$headers_emp .= 'From: <admin@localjobs.pk>';
		
				$subject_emp = "LocalJobs.pk: CV Received - {$jobtitle}";
				$message_emp = "<b>Dear {$cname1}</b> <br /><br/>
		
				Your have received an application against the job that you have advertise at Localjobs.pk
				<br/><br/>
				
				<b>Applicant Details</b><br/><br/>

				Name:&nbsp;&nbsp; {$firstname}&nbsp;{$lastname}<br/>
				Email:&nbsp;&nbsp; {$email} <br/>
				Application Date:&nbsp;&nbsp; {$applydate}<br/><br/>
				
				<b>What happens next?</b><br/><br/>
				
				The job application has been delivered to {$cname1}, to view further details about the applicant, please log on to <a href='http://localjobs.pk/employers'>www.localjobs.pk</a>.  <br/><br/>


Thank you for using Localjobs.pk, and good luck with your job suitable candidate search! <br/><br/>

						
				Best regards,<br/>
 				<b>The LocalJobs.pk Team</b>";
		
				$retval = mail($to, $subject, $message, $headers);
				$retval_emp = mail($to_emp, $subject_emp, $message_emp, $headers_emp);

				
	
		
		echo "<script>window.open('job_details.php?job_id=$jobid&mess1=Your application has been submitted successfully!&mess2=Employer may contact you on $mobile', '_self')</script>";
		
		return true;	  
      }

	}
?>
	