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
		if(isset($_GET['foreign_id'])){
			$for_id = $_GET['foreign_id'];
			
    		$get_jobs = "SELECT * FROM foreign_jobs WHERE for_job_id = '$for_id'";
				$run_jobs = mysqli_query($connection, $get_jobs);
				$row_jobs = mysqli_fetch_array($run_jobs);
					$jobid = $row_jobs['for_job_id'];
				    $jobtitle = $row_jobs['for_job_title'];
					$jobcat = $row_jobs['for_job_cat'];
					$comp = $row_jobs['for_job_comp'];
					$loc = $row_jobs['for_job_city'];
					$country = $row_jobs['for_job_ctry'];
					$type = $row_jobs['for_job_type'];
		//			$postdate = date("d F Y", strtotime($row_jobs['for_job_post_date']));
					$respon = $row_jobs['for_job_resp'];
					$req = $row_jobs['for_job_req'];
					$benefit = $row_jobs['for_job_benefit'];
					$addr = $row_jobs['job_postal_addr'];
					$phone = $row_jobs['for_job_phone'];
					$fax = $row_jobs['for_job_fax'];
					$app_url = $row_jobs['for_online_app_form'];
					$email = $row_jobs['for_job_email'];
					$exp_day = $row_jobs['for_job_expiry_day'];
					$exp_month = $row_jobs['for_job_expiry_month'];
					$exp_year = $row_jobs['for_job_expiry_year'];
					$post_date = $row_jobs['for_job_post_date'];
					
					
						$get_cat = "SELECT * FROM categories WHERE cat_id = '$jobcat'";
						$run_cat = mysqli_query($connection, $get_cat);
						$row_cat = mysqli_fetch_array($run_cat);
							$cat_id = $row_cat['cat_id'];
							$cat_title = $row_cat['cat_title'];
						  
								
						$get_ctry = "SELECT * FROM countries WHERE ctry_id = '$country'";
						$run_ctry = mysqli_query($connection, $get_ctry);
						$row_ctry = mysqli_fetch_array($run_ctry);
							$ctry_id = $row_ctry['ctry_id'];
							$ctry_title = $row_ctry['ctry_name'];
			?>

	<!-- This is start of main content area -->
	<div id="contents" style="font-family:Trebuchet MS;" class="row">
   
    <ol class="breadcrumb">
    	<li><a href="index.php">Home</a></li>
        <li><a href="#">Foreign Jobs</a></li>
        <li class="active"><?php echo $jobtitle; ?></li>
    </ol>

        <div class="row" style="padding: 5px;">
    
    	<div class="col-md-1 col-sm-1 col-xs-1">
    		<div class="fb-like" data-href="http://localjobs.pk/foreign_details.php?foreign_id=<?php echo $jobid; ?>" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div>
  	</div>
  	<div class="col-md-1 col-sm-1 col-xs-1" style="margin-left: 40px;">
		<a href="https://twitter.com/share" class="twitter-share-button" data-url="http://localjobs.pk/foreign_details.php?foreign_id=<?php echo $jobid; ?>">Tweet</a>
		<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
	</div>
  	<div class="col-md-2 col-sm-2 col-xs-2" style="margin-left: 0px;">
  		<script src="//platform.linkedin.com/in.js" type="text/javascript"> lang: en_US</script>
		<script type="IN/Share" data-url="http://localjobs.pk/foreign_details.php?foreign_id=%3C?php%20echo%20$jobid;%20?%3E" data-counter="right"></script>
		
	</div>
	<div class="col-md-1 col-sm-1 col-xs-1" style="margin-left: -87px;"><g:plusone></g:plusone></div>
	
	
    </div>	
	
     
    <div id="job_details" class="col-md-12 col-sm-8 col-xs-8">
            <div class="row">
                                        
                    <div id="details" class="col-md-9 col-sm-9 col-xs-9">
                    	<h3 style="font-weight: bold;"><?php echo $jobtitle; ?></h3><br/>                         
						<div class="table-responsive">
                    	<table class="table table-striped" style="font-size: 16px;">
                        	<tr>
                            	<td style="width: 30%;"><b>Institution:</b></td>
                                <td style="width: 70%; color: #00F; font-weight: bold;"><?php echo $comp; ?></td>
                            </tr>
                            <tr>
                            	<td><b>Location:</b></td>
                                <td style="color: #A0A0A0;"><?php echo $loc . " , " . $ctry_title; ?></td>
                            </tr>
                            <tr>
                            	<td><b>Category:</b></td>
                                <td style="color: #A0A0A0;"><?php echo $cat_title; ?></td>
                            </tr>
                            <tr>
                            	<td><b>Posted:</b></td>
                                <td style="color: #A0A0A0;"><?php echo $post_date; ?></td>
                            </tr>
                            <tr>
                            	<td><b>Application Due:</b></td>
                                <td style="color: #A0A0A0;"><?php echo $exp_year . "-" . $exp_month . "-" . $exp_day; ?></td>
                            </tr>
                            <tr>
                            	<td><b>Type:</b></td>
                                <td style="color: #A0A0A0;"><?php echo $type; ?></td>
                            </tr>
                            <tr>
                            	<td><b>Notes:</b></td>
                                <td style="color: #A0A0A0;"></td>
                            </tr>
                        </table>
                    
                   		 </div>
                         <div>
                         	<h4 style="font-size: 16px; font-weight: bold;">Responsibilities:</h4>
                            <p>
                            	<?php echo $respon; ?>
                            </p>
                         </div>
                         <?php
						 	if($req == ""){
								echo "<div style='display: none;'></div>";
							}else{
								echo "<div>
                         				<h4 style='font-size: 16px; font-weight: bold;'>Requirements:</h4>
                            			<p>$req</p>
                         			  </div>";
							}
                         ?>
                        
                         <?php
						 	if($benefit == ""){
								echo "<div style='display: none;'></div>";
							}else{
								echo "<div>
                         				<h4 style='font-size: 16px; font-weight: bold;'>Compensation:</h4>
                            			<p>$benefit</p>
                         			  </div>";
							}
                         ?>
                         
                         <h3 style="font-size: 16px; font-weight: bold;">APPLICATION INFORMATION</h3><br/>
                         <div class="table-responsive">
                    		<table class="table table-striped" style="font-size: 16px;">
                         
                        	<tr>
                            	<td style="width: 30%;"><b>Postal Address:</b></td>
                                <?php
									if($addr == ""){
										echo "<td style='width: 70%;'>Not Known</td>";
									}else{
										echo "<td style='width: 70%;'>$addr</td>";
									}
                                ?>
                              
                            </tr>
                            <tr>
                            	<td><b>Online App. Form:</b></td>
                                <?php
									if($app_url == ""){
										echo "<td style='width: 70%;'>Not Known</td>";
									}else{
										echo "<td><a style='color: #00F;' href='$app_url' target='_blank'>$app_url</a></td>";
									}
                                ?>
                            </tr>
                            <tr>
                            	<td><b>Email:</b></td>
                                <?php
									if($email == ""){
										echo "<td style='width: 70%;'>Not Known</td>";
									}else{
										echo "<td><a style='color: #00F;' href='mailto:{$email}'>$email</a></td>";
									}
                                ?>
                            
                            </tr>
                            <tr>
                            	<td><b>Phone:</b></td>
                                <?php
									if($phone == "0"){
										echo "<td style='width: 70%;'>Not Known</td>";
									}else{
										echo "<td>+$phone</td>";
									}
                                ?>
                              
                            </tr>
                            <tr>
                            	<td><b>Fax:</b></td>
                                <?php
									if($fax == "0"){
										echo "<td style='width: 70%;'>Not Known</td>";
									}else{
										echo "<td>+$fax</td>";
									}
                                ?>
                            </tr>
                            
                        </table>
                    
                   		 </div>
                         <a href="<?php echo $app_url; ?>" target="_blank;"><button class="btn btn-success btn-lg">Apply through Institution's Website</button></a>
                    </div>    
                    <!-- This is side bar -->
                    <div id="sidebar" style="border: 1px solid #FFF;" class="col-md-3 hidden-3 col-xs-3">
                       
                       
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