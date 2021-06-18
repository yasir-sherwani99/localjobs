<?php 
	session_start();
	if(!isset($_SESSION['username'])){
		header('location: admin_login.php?error=You are not an Administrator');
	}else{
 
?>

<?php include("includes/connection.php"); ?>
<?php include("functions/admin_functions.php"); ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Local Jobs Pakistan</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" />   
	<link rel="stylesheet" type="text/css" href="styles/admin_style.css" />
    <script src="js/formvalidation.js"></script>
    <script src="js/respond.js"></script>
</head>

<body onLoad="myClock()">
<div class="container">
	<!-- Header area starts -->
    <div id="header" class="row">
    	<?php include("includes/admin_header.php"); ?> 
    </div>
    <!-- Header area ends -->
	<div id="welcome" class="row">
    <?php
		if(isset($_SESSION['admin_name'])){
			$admin = $_SESSION['admin_name'];
			echo "<img src='images/administrator2.png' style='width:25px; height:25px; margin-right: 10px;'><b style='color: #006600'>Welcome: </b>" . $admin . " <a href='admin_logout.php' style='color: blue;'>Signout</a>";
		}
    ?>
    </div>

    <div class="row">
    
        <!-- Left side area starts -->
        <div id="left_side_area" class="col-md-3">
            <!-- Navigation area starts -->
            <?php include("includes/dashboard.php"); ?>
       	</div>   
        
    <!-- Navigation area ends -->
    
    <!-- Main contents area starts -->
    
    <div id="contents" class="col-md-9">
    	<div id="tab" class="row">
        	<ul class="nav nav-tabs">
            	<li><a href="walkin.php">Walkin Interviews</a></li>
                <li class="active" style="font-weight: bold;"><a href="add_walkin.php">Post Walkin Interview</a></li>
            </ul>
        </div>
        <?php
			if(isset($_GET['mess'])){
				$published = $_GET['mess'];
				echo "<div id='message' class='alert alert-success'>
        			  	<img src='images/checkmark2.png' width='45' height='45'/>
            		 	<div id='aa'><b>Congratulations...</b><br/>$published</div>
        			  </div>";
			} else {
				echo "<div id='message' class='alert alert-info'>
        				<img src='images/info.png' width='45' height='45'/>
            		  <div id='aa'><b>Add new walkin interview</b><br/>Enter the required fields and add a new walkin interview ad.						</div>
        		</div>";
			}
        ?>
        <div id="job_form" class="row">
        	<?php include("includes/postwalkin.php"); ?>
        </div>
    </div>
 </div>   
    <!-- Main contents area ends -->
    
     <!-- Footer area starts -->
    <div id="footer" class="row">
    	<?php include("includes/footer_contents.php"); ?>
    </div>
    <!-- Footer area ends -->

</div>

<!-- JavaScript-->
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
<?php
	if(isset($_POST['submit'])){
	
		$upload_dir = "./walkin_ads";
		$job_title = cleanStr($_POST['title']);
	//	$job_desc = cleanStr($_POST['desc']);
		$comp_name = cleanStr($_POST['comp_name']);
/*		$min_exp = cleanStr($_POST['min_exp']);
		$max_exp = cleanStr($_POST['max_exp']);
		$job_qual = cleanStr($_POST['qual']);
		$job_skills = cleanStr($_POST['skills']);  */
		$interview_day = cleanStr($_POST['exp_day']);
		$interview_month = cleanStr($_POST['exp_month']);
		$interview_year = cleanStr($_POST['exp_year']);
	//	$job_address = cleanStr($_POST['comp_addr']);
		$job_location = cleanStr($_POST['location']);
//		$walk_apply = cleanStr($_POST['howapply']);
		$walk_img = cleanStr($_FILES['walk_image']['name']);
		$walk_img_tmp = $_FILES['walk_image']['tmp_name'];
		$walk_size = $_FILES['walk_image']['size'];
		$walk_type = $_FILES['walk_image']['type'];
		$job_keywords = cleanStr($_POST['keywords']);
		
		$allowedExts = array(
  				"gif", 
  				"jpg", 
  				"jpeg",
				"png"
		); 

		$allowedMimeTypes = array( 
  				'image/gif',
  				'image/jpeg',
				'image/png'
		);

		$extension = end(explode(".", $walk_img));
		
		if($walk_size <= 0){
			echo "<script>document.getElementById('error26').innerHTML='Can not Upload empty file'</script>";
			exit();
		}
		
		if ( 512000 < $walk_size ) {
			echo "<script>document.getElementById('error26').innerHTML='Image size should be less than 500KB'</script>";
			exit();
		}
		
		if ( ! ( in_array($extension, $allowedExts ) ) ) {
			echo "<script>document.getElementById('error26').innerHTML='Image type should be .gif, .jpg or .png'</script>";
			exit();
		}
		
        else
        {
		
	/*	is_uploaded_file($_FILES['company_logo']['tmp_name']);
			$query = "UPDATE employers SET comp_logo = '$logo_name' WHERE comp_id = '$edit_record'";
			$run = mysqli_query($connection, $query);
			move_uploaded_file($logo_tmp_name, "$upload_dir/$logo_name");
			
			echo "<script>window.open('employer_profile.php?updated=Logo has been successfully uploaded.', '_self')</script>";
		} */
		
		
		$insert_job = "INSERT INTO walk_interview
					 (wjob_title, wjob_desc, wcompany, wmin_exp, wmax_exp, wqual, wskills, wapply, winterview_day, winterview_month, winterview_year, waddress, wlocation, post_date, walk_ad_image, wkeywords) 
					  VALUES ('$job_title', '$job_desc', '$comp_name', '$min_exp', '$max_exp', '$job_qual', '$job_skills', '$walk_apply', '$interview_day', '$interview_month', '$interview_year', '$job_address', '$job_location', NOW(), '$walk_img', '$job_keywords')";
			
		$run_job = mysqli_query($connection, $insert_job);
		
		move_uploaded_file($walk_img_tmp, "$upload_dir/$walk_img");
		
		echo "<script>window.open('add_walkin.php?mess=A job has published successfully...!', '_self')</script>";
		return true;
	
		
	}
	
	}
}
?>