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
            	<li><a href="internship.php">Internships</a></li>
                <li class="active" style="font-weight: bold;"><a href="add_internship.php">Post Internship</a></li>
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
            		  <div id='aa'><b>Add New Foreign Job</b><br/>Enter the required fields and add a new foreign job ad.						</div>
        		</div>";
			}
        ?>
        <div id="job_form" class="row">
        	<?php include("includes/postinternship.php"); ?>
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
	
		$title = cleanStr($_POST['title']);
		$company = cleanStr($_POST['comp_name']);
		$city = cleanStr($_POST['location']);
		$category = cleanStr($_POST['industry']); 
		$exp_day = cleanStr($_POST['exp_day']);
		$exp_month = cleanStr($_POST['exp_month']);
		$exp_year = cleanStr($_POST['exp_year']);
		$type = cleanStr($_POST['emp_type']);
		$vacancies = cleanStr($_POST['vacancies']);
		$experience = cleanStr($_POST['experience']);
		$desc = cleanStr($_POST['desc']);
		$require = cleanStr($_POST['require']);
		$apply = cleanStr($_POST['compen']);
		$address = cleanStr($_POST['addr']);
		$phone = cleanStr($_POST['phone']);
	//	$fax = cleanStr($_POST['fax']);
		$url = cleanStr($_POST['url']);
		$email = cleanStr($_POST['email']);
		$job_keywords = cleanStr($_POST['keywords']);
		
		
		$insert_job = "INSERT INTO internship
					 (intern_title, intern_comp, intern_desc, intern_qual, intern_type, intern_cat, intern_vacancies, intern_exp, intern_apply, intern_addr, intern_phone, intern_city, intern_email, intern_online_url, intern_post_date, intern_exp_day, intern_exp_month, intern_exp_year, intern_keywords) VALUES ('$title', '$company', '$desc', '$require', '$type', '$category', '$vacancies', '$experience', '$apply', '$address', '$phone', '$city', '$email', '$url', NOW(), '$exp_day', '$exp_month', '$exp_year', '$job_keywords')";
			
		$run_job = mysqli_query($connection, $insert_job);

				
			echo "<script>window.open('add_internship.php?mess=A job has published successfully...!', '_self')</script>";
			return true;
			
		
	}
	
}
?>