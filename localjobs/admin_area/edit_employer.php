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
    <script src="js/respond.js"></script>
	<script type="text/javascript" src="js/js_functions.js"></script>
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
    
    <!-- Left side area starts --> 
    <div class="row">
    
       
        <div id="left_side_area" class="col-md-3">
            <!-- Navigation area starts -->
            <div id="nav" class="row">
            	<div class="btn-group-vertical">
    				<a href="index.php"><button class="btn btn-default"><img src="images/clock.png" />Dashboard</button></a>
            		<a href="jobs.php"><button class="btn btn-default"><img src="images/list.png" />Jobs</button></a>
            		<a href="applications.php"><button class="btn btn-default"><img src="images/folder.png" />Applications</button></a>
            		<a href="employers.php"><button class="btn btn-info"><img src="images/group.png" />Employers</button></a>
            		<a href="employees.php"><button class="btn btn-default"><img src="images/administrator.png" />Employees</button></a>
            		<a href="options.php"><button class="btn btn-default"><img src="images/screwdriver.png" />Options</button></a>
                    <a href="#"><button class="btn btn-default"><img src="images/spreadsheet.png" />Reports</button></a>
            		<a href="users.php"><button class="btn btn-default"><img src="images/user.png" />Users</button></a>
            		<a href="admin_logout.php"><button class="btn btn-default"><img src="images/login.png" />Logout</button></a>
    			</div>
            </div> 
       	</div>   
    
    <!-- Navigation area ends -->
    
    <!-- Main contents area starts -->
    
    <div id="contents" class="col-md-9">
    	<div id="tab" class="row">
        	<ul class="nav nav-tabs">
            	<li><a href="employers.php">Employers</a></li>
                <li><a href="add_employers.php">Add Employer</a></li>
                <li class="active" style="font-weight: bold;"><a href="edit_employer.php">Update Employer</a></li>
            </ul>
        </div>
        <?php
				echo "<div id='message' class='alert alert-info'>
        				<img src='images/info.png' width='45' height='45'/>
            		  <div id='aa'><b>Update Employer</b><br/>Edit the required fields and update an employer.						</div>
        		</div>";
			
        ?>
        <div id="job_form" class="row">
        	<?php
				$compid = @$_GET['comp_id'];
				$get_comp = "SELECT * FROM employers WHERE comp_id = '$compid'";
				$run_comp = mysqli_query($connection, $get_comp);
					$row_comp = mysqli_fetch_array($run_comp);
						$id = $row_comp['comp_id'];
					//	$comp_email = $row_comp['comp_email'];
						$contact_person = $row_comp['contact_person'];
						$desig = $row_comp['designation'];
						$area_code = $row_comp['area_code'];
						$land_line = $row_comp['land_line'];
						$extn = $row_comp['extn'];
						$mobile = $row_comp['mobile'];
						$comp_name = $row_comp['comp_name'];
						$comp_addr = $row_comp['comp_addr'];
						$comp_type = $row_comp['comp_type'];
						$location = $row_comp['location'];
						$business_type = $row_comp['business_type'];
						$category = $row_comp['category'];
						$profile = $row_comp['profile'];
						$website = $row_comp['website'];
						
            ?>
        	<?php include("includes/updateemployer.php"); ?>
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
	//	$comp_email = cleanStr($_POST['emp_email']);
		$employee = cleanStr($_POST['emp_name']);
		$desig = cleanStr($_POST['emp_desig']);
		$area_code = cleanStr($_POST['area_code']);
		$land_line = cleanStr($_POST['land_line']);
		$extn = cleanStr($_POST['ext']);
		$comp_mobile = cleanStr($_POST['emp_mobile']);
		$comp_name = cleanStr($_POST['comp_name']);
		$comp_addr = cleanStr($_POST['comp_addr']);
		$comp_type = cleanStr($_POST['comp_type']);
		$comp_loc = cleanStr($_POST['comp_loc']);
		$business = cleanStr($_POST['business']);
		$industry = cleanStr($_POST['industry']);
		$profile = cleanStr($_POST['comp_profile']);
		$website = cleanStr($_POST['comp_url']);

		
		$update_empl = "UPDATE employers
					   SET contact_person = '$employee',
						   designation = '$desig', 
						   area_code = '$area_code', 
						   land_line = '$land_line', 
						   extn = '$extn', 
						   mobile = '$comp_mobile', 
						   comp_name = '$comp_name', 
						   comp_addr = '$comp_addr', 
						   comp_type = '$comp_type', 
						   location = '$comp_loc', 
						   business_type = '$business', 
						   category = '$industry', 
						   profile = '$profile', 
						   website = '$website'
						   		WHERE comp_id = '$edit_record'"; 
			
		$run_update = mysqli_query($connection, $update_empl);
		if($run_update){
			echo "<script>window.open('employers.php?updated=An employer record has been updated successfully...!', '_self')</script>";
		}else{
			exit("Database Query has failed" . mysqli_error());
		}
		
	}
	
	}
?>