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
    <script type="text/javascript" src="js/js_functions.js"></script>
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
                <li class="active" style="font-weight: bold;"><a href="add_employers.php">Add Employers</a></li>
            </ul>
        </div>
        <?php
			if(isset($_GET['mess'])){
				$published = $_GET['mess'];
				echo "<div id='message' class='alert alert-success'>
        			  	<img src='images/info.png' width='45' height='45'/>
            		 	<div id='aa'><b>Congratulations...</b><br/>$published</div>
        			  </div>";
			} else {
				echo "<div id='message' class='alert alert-info'>
        				<img src='images/info.png' width='45' height='45'/>
            		  <div id='aa'><b>Add new employer</b><br/>Enter the required fields and add a new employer.						</div>
        		</div>";
			}
        ?>
        <div id="job_form" class="row">
        	<?php include("includes/addemployer.php"); ?>
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
	if(isset($_POST['register'])){
		$empl_email = cleanStr($_POST['emp_email']);
		$empl_pass = cleanStr($_POST['emp_pass']);
		$empl_name = cleanStr($_POST['emp_name']);
		$empl_desig = cleanStr($_POST['emp_desig']);
		$empl_area_code = cleanStr($_POST['area_code']);
		$empl_land_line = cleanStr($_POST['land_line']);
		$empl_extn = cleanStr($_POST['ext']);
		$empl_mobile = cleanStr($_POST['emp_mobile']);
		$empl_comp_name = cleanStr($_POST['comp_name']);
		$empl_comp_addr = cleanStr($_POST['comp_addr']);
		$empl_comp_type = cleanStr($_POST['comp_type']);
		$empl_comp_loc = cleanStr($_POST['comp_loc']);
		$empl_business = cleanStr($_POST['business']);
		$empl_industry = cleanStr($_POST['industry']);
		$empl_comp_profile = cleanStr($_POST['comp_profile']);
		$empl_comp_url = cleanStr($_POST['comp_url']);
		$empl_status = 'Active';
	
		$insert_employer = "INSERT INTO employers(comp_email, comp_pass, contact_person, designation, area_code, land_line, extn, mobile, comp_name, comp_addr, comp_type, location, business_type, category, profile, website, creation_date, status) VALUES('$empl_email', '$empl_pass', '$empl_name', '$empl_desig', '$empl_area_code', '$empl_land_line', '$empl_extn', '$empl_mobile', '$empl_comp_name', '$empl_comp_addr', '$empl_comp_type', '$empl_comp_loc', '$empl_business', '$empl_industry', '$empl_comp_profile', '$empl_comp_url', NOW(), '$empl_status')";
		
		$run_employer = mysqli_query($connection, $insert_employer);
		if($run_employer){
			echo "<script>window.open('add_employers.php?mess=An employer has registered successfully...!', '_self')</script>";
		} else{
			die("Database query has failed...!" . mysqli_error());
		}	
	}
	
	}
?>
