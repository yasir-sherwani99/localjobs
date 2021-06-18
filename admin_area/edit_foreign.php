<?php 
	session_start();
	if(!isset($_SESSION['username'])){
		header('location: admin_login.php?error=You are not an Administrator');
	}else{
 
?>

<?php include("includes/connection.php"); ?>
<?php include("functions/admin_functions.php"); ?>
<?php
	if(isset($_GET['job_id'])){
		$jobID = $_GET['job_id'];
		
		$get_job = "SELECT * FROM foreign_jobs WHERE for_job_id = '$jobID'";
		$run_job = mysqli_query($connection, $get_job);
		$row_job = mysqli_fetch_array($run_job);
			$fjid = $row_job['for_job_id'];
			$fjtitle = $row_job['for_job_title'];
			$fjcat = $row_job['for_job_cat'];
			$fjcity = $row_job['for_job_city'];
			$fjctry = $row_job['for_job_ctry'];
			$fjtype = $row_job['for_job_type'];
			$fjresp = $row_job['for_job_resp'];
			$fjreq = $row_job['for_job_req'];
			$fjbenefit = $row_job['for_job_benefit'];
			$fjcomp = $row_job['for_job_comp'];
			$fjphone = $row_job['for_job_phone'];
			$fjfax = $row_job['for_job_fax'];
			$fjaddr = $row_job['job_postal_addr'];
			$fjonline = $row_job['for_online_app_form'];
			$fjemail = $row_job['for_job_email'];
			$fjexpday = $row_job['for_job_expiry_day'];
			$fjexpmonth = $row_job['for_job_expiry_month'];
			$fjexpyear = $row_job['for_job_expiry_year'];
			$fjkeywords = $row_job['job_keywords'];
	}
?>
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
            	<li><a href="foreign.php">Foreign Jobs</a></li>
                <li class="active" style="font-weight: bold;"><a href="add_foreignjob.php">Post Foreign Job</a></li>
            </ul>
        </div>
        <?php
			if(isset($_GET['mess'])){
				$published = $_GET['mess'];
				echo "<div id='message' class='alert alert-success'>
        			  	<img src='images/checkmark2.png' width='45' height='45'/>
            		 	<div id='aa'><b>Congratulations...</b><br/>$published</div>
        			  </div>";
			}
			 else {
				echo "<div id='message' class='alert alert-info'>
        				<img src='images/info.png' width='45' height='45'/>
            		  <div id='aa'><b>Update Foreign Job</b><br/>Enter the required fields and update a foreign job ad.						</div>
        		</div>";
			}
        ?>
        <div id="job_form" class="row">
        	<?php include("includes/editforeign.php"); ?>
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
	if(isset($_POST['update'])){
	
		$edit_record = $_GET['edit_form'];
		$title = cleanStr($_POST['title']);
		$company = cleanStr($_POST['comp_name']);
		$country = cleanStr($_POST['job_ctry']);
		$city = cleanStr($_POST['city']);
		$category = cleanStr($_POST['industry']); 
		$exp_day = cleanStr($_POST['exp_day']);
		$exp_month = cleanStr($_POST['exp_month']);
		$exp_year = cleanStr($_POST['exp_year']);
		$type = cleanStr($_POST['emp_type']);
		$respon = cleanStr($_POST['desc']);
		$require = cleanStr($_POST['require']);
		$benefit = cleanStr($_POST['compen']);
		$address = cleanStr($_POST['addr']);
		$phone = cleanStr($_POST['phone']);
		$fax = cleanStr($_POST['fax']);
		$url = cleanStr($_POST['url']);
		$email = cleanStr($_POST['email']);
		$job_keywords = cleanStr($_POST['keywords']);
		
		$update_job = "UPDATE foreign_jobs
						SET for_job_title = '$title',
							for_job_cat = '$category',
							for_job_city = '$city',
							for_job_ctry = '$country',
							for_job_type = '$type',
							for_job_resp = '$respon',
							for_job_req = '$require',
							for_job_benefit = '$benefit',
							for_job_comp = '$company',
							job_postal_addr = '$address',
							for_job_phone = '$phone',
							for_job_fax = '$fax',
							for_online_app_form = '$url',
							for_job_email = '$email',
							for_job_expiry_day = '$exp_day',
							for_job_expiry_month = '$exp_month',
							for_job_expiry_year = '$exp_year',
							job_keywords = '$job_keywords'
								WHERE for_job_id = '$edit_record'";
									
		$run_job = mysqli_query($connection, $update_job);

				
			echo "<script>window.open('foreign.php?updated=A job has Updated successfully...!', '_self')</script>";
			return true;
		
			
		
		
	}
	
	
}
?>