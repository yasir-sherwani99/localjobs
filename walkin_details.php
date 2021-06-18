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
	<title>WalkIn Interviews, Localjobs Pakistan</title>
	<link href="images/logo_small.png" type="image/gif" rel="shortcut icon" />
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="styles/index_style.css" />
    <link rel="stylesheet" type="text/css" href="styles/third_style.css" />
    <link href="styles/ddmenu.css" rel="stylesheet" type="text/css" />
    <script src="js/jquery.js"></script>
    <script src="js/respond.js"></script>
    <script src="js/ddmenu.js" type="text/javascript"></script>
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
	if(isset($_GET['walk_id'])){
			$walk_id = $_GET['walk_id'];
        	$get_jobs = "SELECT * FROM walk_interview WHERE wjob_id = '$walk_id'";
			$run_jobs = mysqli_query($conn, $get_jobs);
			$row_jobs = mysqli_fetch_array($run_jobs);
					$job_id1 = $row_jobs['wjob_id'];
					$job_title = $row_jobs['wjob_title'];
					$job_company = $row_jobs['wcompany'];
	
					$interview_day = $row_jobs['winterview_day'];
					$interview_month = $row_jobs['winterview_month'];
					$interview_year = $row_jobs['winterview_year'];
	
					$job_location = $row_jobs['wlocation'];
					$job_image = $row_jobs['walk_ad_image'];
					$post_date = date("d F Y", strtotime($row_jobs['post_date']));
					
						
			$get_city = "SELECT * FROM city WHERE city_id = '$job_location'";
			$run_city = mysqli_query($connection, $get_city);
			$row_city = mysqli_fetch_array($run_city);
				$city_id = $row_city['city_id'];
				$city_title = $row_city['city_name'];

	?>
	<!-- This is start of main content area -->
	<div id="contents" style="font-family:Trebuchet MS;" class="row">
   
    <ol class="breadcrumb">
    	<li><a href="index.php">Home</a></li>
        <li><a href="#">Walkin Interview</a></li>
        <li class="active"><?php echo $job_title; ?></li>
    </ol>

   <div class="row" style="padding: 5px;">
    
    	<div class="col-md-1 col-sm-1 col-xs-1">
    		<div class="fb-like" data-href="http://localjobs.pk/walkin_details.php?walk_id=<?php echo $job_id1; ?>" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div>
  	</div>
  	<div class="col-md-1 col-sm-1 col-xs-1" style="margin-left: 40px;">
		<a href="https://twitter.com/share" class="twitter-share-button" data-url="http://www.localjobs.pk/walkin_details.php?walkin_id=<?php echo $job_id1; ?>">Tweet</a>
		<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
	</div>
  	<div class="col-md-2 col-sm-2 col-xs-2" style="margin-left: 0px;">
  		<script src="//platform.linkedin.com/in.js" type="text/javascript"> lang: en_US</script>
		<script type="IN/Share" data-url="http://www.localjobs.pk/walkin_details.php?walkin_id=%3C?php%20echo%20$job_id1;%20?%3E" data-counter="right"></script>
		
	</div>
	<div class="col-md-1 col-sm-1 col-xs-1" style="margin-left: -87px;"><g:plusone></g:plusone></div>
	
	
    </div>	
	
            <div id="job_details" class="col-md-12 col-sm-8 col-xs-8">
            	<div class="row">
                    <div id="left_side_bar" class="col-md-3 hidden-sm hidden-xs">
                        <div id="summary" class="panel panel-default">
                            <?php include("includes/walkin_summary.php"); ?>
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
                                <li style="font-size: 20px; color: #000;"><?php echo $job_company; ?></li>
                                <li style="font-size: 14px; color: #A0A0A0;">Interview Date: <?php echo $interview_day . "-" . $interview_month . "-" . $interview_year; ?></li>
                            </ul>
                                              <!--  <hr style="border-style: dashed;"/>       -->         
                        </div>
                        <div id="about_job" class="row about_job">
                            <?php include("includes/about_wjob.php"); ?>
                        </div>
                      

                 <!--       <div id="ads_partner" class="row about_job">
                            <h4>Ads by Partners</h4>
                        </div>  -->
                    </div>
                    <!-- This is side bar -->
                    <div id="sidebar" style="border: 1px solid #FFF;" class="col-md-3 hidden-4 col-xs-4">
                        <div id="logo" class="row">
                                <?php
                                 
                                        echo "<img src='images/1129d2f.png' class='img-responsive' />";
                                 
                                ?>  
    
                            </div>    
    
                   		
                        <div id="social_share" class="row about_job" style="text-align: center;">
                            <h4>Ads</h4>         
                            <script src="//go.padstm.com/?id=416583"></script>
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
	