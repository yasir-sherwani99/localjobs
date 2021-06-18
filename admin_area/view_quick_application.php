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
            	<li><a href="applications.php">Applications</a></li>
                <li><a href="quick_applications.php">Non-Member Applications</a></li>
                <li class="active" style="font-weight: bold;"><a href="view_quick_application.php">View Application</a></li>
            </ul>
        </div>

        <div id="all_jobs" style="background-color:#FFF; font-size: 14px;" class="row">
          <div class="table-responsive">	
        	<table border="0" class="table table-bordered table-striped">
            <?php
				$apply_id = $_GET['apply_id'];
				$get_applied_job = "SELECT * FROM quick_apply WHERE apply_id = '$apply_id'";
				$run_applied_job = mysqli_query($connection, $get_applied_job);
				$row_applied_job = mysqli_fetch_array($run_applied_job);
					$applyId = $row_applied_job['apply_id'];
					$jobId = $row_applied_job['job_id'];
					$comp_id = $row_applied_job['comp_id'];
					$fname = $row_applied_job['first_name'];
					$lname = $row_applied_job['last_name'];
					$email = $row_applied_job['email'];
					$country = $row_applied_job['country'];
					$pak_city = $row_applied_job['pak_city'];
					$other_city = $row_applied_job['other_city'];
					$mobile = $row_applied_job['mobile'];
					$cv = $row_applied_job['cv'];
					$apply_date = date("d M Y", strtotime($row_applied_job['apply_date']));
					$job_status = $row_applied_job['job_status'];
			
									
						$get_title = "SELECT * FROM company_jobs WHERE job_id = '$jobId'";
						$run_title = mysqli_query($connection, $get_title);
						$row_title = mysqli_fetch_array($run_title);
								$jobTitle = $row_title['job_title'];
								
						$get_ctry = "SELECT * FROM countries WHERE ctry_id = '$country'";
						$run_ctry = mysqli_query($connection, $get_ctry);
						$row_ctry = mysqli_fetch_array($run_ctry);
								$ctryTitle = $row_ctry['ctry_name'];
								
						$get_city = "SELECT * FROM city WHERE city_id = '$pak_city'";
						$run_city = mysqli_query($connection, $get_city);
						$row_city = mysqli_fetch_array($run_city);
								$cityTitle = $row_city['city_name'];		
				
            ?>
            	<tbody>
            	<tr>
                	<td style="width: 150px;">Applied Job</td>
                	<td style="color: #3333FF; font-weight: bold;"><?php echo $jobTitle; ?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td style="color: #3333FF; font-weight: bold;"><?php echo $email; ?></td>
                </tr>
                <tr>
                    <td>First Name</td>
                    <td><?php echo $fname; ?></td>
                </tr>
                <tr>
                    <td>Last Name</td>
                    <td><?php echo $lname; ?></td>
                </tr>
                <tr>
                    <td>Mobile</td>
                    <td><?php echo "0" . $mobile; ?></td>
                </tr>
                <tr>
                	<td>City</td>
                    <?php
						if($pak_city == "-1"){
							echo "<td>$other_city</td>";
						}else{
							echo "<td>$cityTitle</td>";
						}
                	?>
                </tr>
                <tr>
                	<td>Country</td>
                    <td><?php echo $ctryTitle; ?></td>
                </tr>
                <tr>
                	<td>Applied Date</td>
                    <td><?php echo $apply_date; ?></td>
                </tr>
                </tbody>
            </table>
          </div>  
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
<?php } ?>