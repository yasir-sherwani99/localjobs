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
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="styles/index_style.css" />
    <link rel="stylesheet" type="text/css" href="styles/third_style.css" />
    <link href="styles/ddmenu.css" rel="stylesheet" type="text/css" />
    <script src="js/jquery.js"></script>
    <script src="js/respond.js"></script>
    <script src="js/ddmenu.js" type="text/javascript"></script>
 	<script type="text/javascript">

		$(document).ready(function(){
			
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
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.3&appId=779716815444739";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div class="container">

	<!-- This is top bar -->
	<div id="topbar" class="row">
    	<?php include("includes/top_bar.php"); ?>
	</div>

	<!-- This is header -->
	<div id="header" class="row">
		<img src="images/blue1.png" style="border: 1px solid #FFF;"/>
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
    
            <div id="job_title" class="col-md-12 col-sm-12 col-xs-12">Job: <?php echo $job_title; ?> at <?php echo $cname; ?>,
            <?php
				if($job_location == "28"){
					echo $other_city;		
				}
				else{
					echo $city_title;
				}
            ?> 
			
            </div>
            <div id="job_details" class="col-md-12 col-sm-8 col-xs-8">
            	<div class="row">
                    <div id="left_side_bar" class="col-md-3 hidden-sm hidden-xs">
                        <div id="summary" class="panel panel-default">
                            <?php include("includes/summary.php"); ?>
                        </div>
                    
                        <!-- Email subscription Box start -->
                      <div class="panel panel-warning">
                    	<div class="panel-heading">
                            <label class="panel-title"><span style="color: #F00;" class="glyphicon glyphicon-log-in"></span> Subscribe Jobs</label>
                        
                    	</div>
                    	<div class="panel-body">
                            <form method="post" action="" role="form">
                            	<div class="form-group">
                                	<label for="email">Your E-mail</label>
                                    <input type="text" class="form-control" name="sub_email" id="email" placeholder="Enter Email"/>
                                </div>
               				    <input type="submit" name="subscribe" value="Subscribe" class="btn btn-primary "/>
                             </form>               
                            
						</div>
                     </div>

                    
                    <!-- ad box start here -->
                        <div id="job_ads_area" class="row">
                            <h4>Ads</h4>
                        </div>
                    <!-- ad box end here -->
                    
                    </div>
                    
                    <div id="details" class="col-md-6 col-sm-8 col-xs-8">
                        <div id="job_comp" class="row">
                            <ul class="list-unstyled">
                                <li style="font-size: 22px; color: #FF8C00;"><?php echo $job_title; ?></li>
                                <li style="font-size: 20px; color: #0080FF;"><?php echo $cname; ?></li>
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

                 <!--       <div id="ads_partner" class="row about_job">
                            <h4>Ads by Partners</h4>
                        </div>  -->
                    </div>
                    <!-- This is side bar -->
                    <div id="sidebar" style="border: 1px solid #FFF;" class="col-md-3 hidden-4 col-xs-4">
                        <div id="logo" class="row">
                                <?php
                                    if($clogo == ""){
                                        echo "<img src='images/icons2/help2.png' width='90' height='90' />";
                                    } else {
                                        echo "<img src='employers/company_logo/$clogo' />";
                                    } 
                                ?>  
    
                            </div>    
    
                     <!--   <div id="apply_job" class="about_job">  -->
                     	<div id="apply_job" class="row about_job">
							<?php
                                    if(isset($_SESSION['username'])){
                                        echo "<a href='job_details.php?jid=$job_id1'>
                                              <button class='btn btn-success'>Apply to Job</button></a>";
                                    }
                                    else{
                                        echo "<button class='btn btn-primary s_b'>Apply to Job</button>";
                                    }
                            ?>
                            <div id="people_already_applied" class="col-md-12 about_job"><?php echo countLatestJobs($job_id); ?> people have applied</div>
                        </div>
                   <!--     <div class="about_job">  -->
                   		<div id="new_about_job" class="row about_job">
                             <br /><span style="padding-left: 115px;">OR</span><br />
                             <a href="search_result.php"><button class="btn btn-warning btn-block"><span class="glyphicon glyphicon-search"></span> Search Jobs</button></a>  
                        </div>
                        <div id="social_share" class="row about_job">
                            <h2>Share this job with friends</h2><br/>
                                <div class="fb-share-button" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button_count"></div>
                                <div>
                                <a href="http://twitter.com/share?text=An%20intersting%20blog&url=http://www.localjobs.pk" target="_blank" title="Click to post to Twitter"><img src="images/tweet_s.png"></a>
                                </div>

                                <!-- Place this tag where you want the share button to render. -->
								<div class="g-plus" data-action="share"></div>
                                
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
	
	if(isset($_POST['login'])){
	$jobid = $_GET['job_id'];
	$username = $_POST['username'];
	$password = $_POST['userpass'];
	
	$query = "SELECT * FROM members
			  WHERE mem_email = '$username' && mem_pass = '$password'";
	
	$result = mysqli_query($connection, $query);
	if(!$result){
		die("Database query has failed:" . mysqli_error());
	}
	
	$check_user = mysqli_num_rows($result);
	$row = mysqli_fetch_array($result);
		$first_name = $row['mem_first_name'];
		$last_name = $row['mem_last_name'];

	if($check_user > 0){
		$_SESSION['username'] = $username;
		$_SESSION['mem_first_name'] = $first_name;
		$_SESSION['mem_last_name'] = $last_name;

		
		echo "<script>window.open('job_details.php?job_id=$jobid&mess4=You are successfully signed in as a job seeker&mess5=Click on Apply to Job button again to apply to this job...','_self')</script>";
	}else{
		echo "<script>window.open('job_details.php?job_id=$jobid&mess3=Username or Password is Incorrect, Please try again','_self')</script>";
	}
	
	
	} 
?>
<?php

	if(isset($_GET['jid'])){
	
			$jid = $_GET['jid'];
		
			if(isset($_SESSION['username'])){
				$username = $_SESSION['username'];
				
				$get_mem = "SELECT * FROM members WHERE mem_email = '$username'";
				$run_mem = mysqli_query($connection, $get_mem);
				$row_mem = mysqli_fetch_array($run_mem);
					$mem_id = $row_mem['mem_id'];
					$mem_ph = $row_mem['mem_cell'];
					$job_status = 'Received';
					
				$get_job = "SELECT * FROM company_jobs WHERE job_id = '$jid'";
				$run_job = mysqli_query($connection, $get_job);
				$row_job = mysqli_fetch_array($run_job);
					$jtitle = $row_job['job_title'];
					$jcompid = $row_job['comp_id'];
					$jexpirydate = $row_job['expiry_date'];
					
			$get_comp = "SELECT * FROM employers WHERE comp_id = '$jcompid'";
			$run_comp = mysqli_query($connection, $get_comp);
			$row_comp = mysqli_fetch_array($run_comp);
				$cid1 = $row_comp['comp_id'];
				$cname1 = $row_comp['comp_name'];

					
				$insert_record = "INSERT INTO jobs_apply(job_id, comp_id, mem_id, apply_date, job_status) VALUES ('$jid', '$cid1', '$mem_id', NOW(), '$job_status')";
				
				$run_record = mysqli_query($connection, $insert_record);
				
				if($run_record){
	
					echo "<script>window.open('job_details.php?job_id=$jid&mess1=Your application has been submitted successfully!&mess2=Employer may contact you on 0$mem_ph', '_self')</script>";
				}else{
					die("database query has failed" . mysqli_error());
				}
			}
	}
?>
	

