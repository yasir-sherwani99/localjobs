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
	if(isset($_GET['intern_id'])){
			$job_id = $_GET['intern_id'];
        	$get_jobs = "SELECT * FROM internship WHERE intern_id = '$job_id'";
			$run_jobs = mysqli_query($conn, $get_jobs);
			$row_jobs = mysqli_fetch_array($run_jobs);
					$job_id1 = $row_jobs['intern_id'];
					$job_title = $row_jobs['intern_title'];
					$job_comp = $row_jobs['intern_comp'];
					$job_desc = $row_jobs['intern_desc'];
					$job_qual = $row_jobs['intern_qual'];
					$job_type = $row_jobs['intern_type'];
					$job_cat = $row_jobs['intern_cat'];
					$job_vacancies = $row_jobs['intern_vacancies'];
					$job_exp = $row_jobs['intern_exp'];
					$job_apply = $row_jobs['intern_apply'];
					$job_addr = $row_jobs['intern_addr'];
					$job_ph = $row_jobs['intern_phone'];
					$job_city = $row_jobs['intern_city'];
					$job_email = $row_jobs['intern_email'];
					$job_url = $row_jobs['intern_online_url'];
					$post_date = date("d F Y", strtotime($row_jobs['intern_post_date']));
					$job_expiry_day = $row_jobs['intern_exp_day'];
					$job_expiry_month = $row_jobs['intern_exp_month'];
					$job_expiry_year = $row_jobs['intern_exp_year'];
					$job_keywords = $row_jobs['intern_keywords'];
					
							
			$get_city = "SELECT * FROM city WHERE city_id = '$job_city'";
			$run_city = mysqli_query($connection, $get_city);
			$row_city = mysqli_fetch_array($run_city);
				$city_id = $row_city['city_id'];
				$city_title = $row_city['city_name'];

				
			$get_cat = "SELECT * FROM categories WHERE cat_id = '$job_cat'";
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
				  	<span class='glyphicon glyphicon-saved'></span><b>{$message}</b>&nbsp;&nbsp;{$message2}
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
				  	<span class='glyphicon glyphicon-alert'></span>&nbsp;{$message3}
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
            
        <div id="left_side_bar" class="col-md-3 col-sm-4 hidden-xs">
                <div id="summary" class="panel panel-default">
                        <?php include("includes/intern_summary.php"); ?>
                </div>
                    
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
                    
        <div id="details" class="col-md-6 col-sm-8 col-xs-12">
                <div id="job_comp" class="row">
					<ul class="list-unstyled">
						<li style="font-size: 22px; color: #00F;"><?php echo $job_title; ?></li>
						<li style="font-size: 20px; color: #000;"><?php echo $job_comp; ?></li>
						<li style="font-size: 14px; color: #A0A0A0;">Date Posted: <?php echo $post_date; ?></li>
					</ul>
                                              <!--  <hr style="border-style: dashed;"/>       -->         
                </div>
                <div id="about_job" class="row">
                        <?php include("includes/about_internship.php"); ?>
                </div>
                      
        </div>
                    <!-- This is side bar -->
        <div id="sidebar" style="border: 1px solid #FFF;" class="col-md-3 hidden-sm hidden-xs">
                                 		
                        <div id="social_share" style="text-align: center;">
                            <h4>Ads</h4><br/>
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