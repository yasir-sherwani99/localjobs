<?php 
	session_start();
	if(!isset($_SESSION['comp_user'])){
		header('location: index.php?error=You are not an Administrator');
	}else{
 
?>

<?php include("includes/connection.php"); ?>
<?php include("functions/emp_main_panel_functions.php"); ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Local Jobs Pakistan</title>
	<link href="../images/logo_small.png" type="image/gif" rel="shortcut icon" />
    <link href="css/bootstrap.min.css" rel="stylesheet" />
	<link rel="stylesheet" type="text/css" href="styles/emp_main_panel_style.css" />
    <script src="js/respond.js"></script>
</head>

<body>
<?php
	if(isset($_SESSION['comp_user'])){
			$user_session = $_SESSION['comp_user'];
								
			$get_employer = "SELECT * FROM employers
							 WHERE comp_email = '$user_session'";
								
			$run_employer = mysqli_query($connection, $get_employer);
								
			$row_employer = mysqli_fetch_array($run_employer);
				
				$comp_id = $row_employer['comp_id'];
				$comp_email = $row_employer['comp_email'];
				$contact_person = $row_employer['contact_person'];
				$comp_name = $row_employer['comp_name'];
	}
				
?>
<div class="container">
	<!-- This is top bar -->
	<div id="topbar" class="row">
    	<?php include("includes/top_bar.php"); ?>
	</div>

	<!-- Header area starts -->
    <div id="header" class="row">
    	<?php include("includes/header.php"); ?> 
    </div>
    
    <div class="row">
     	<?php include("includes/navigation_main.php"); ?>
    </div>	
    <!-- Header area ends -->
    
    <div class="row">
    <!-- Left side area starts -->
    	 <div id="left_side_area" class="col-md-3 col-sm-3 col-xs-3">
            <!-- Navigation area starts -->
			<?php include("includes/employer_dashboard.php"); ?>        
        </div>
    
    <!-- Main contents area starts -->
    
    <div id="contents" style="padding-top: 10px;" class="col-md-9 col-sm-9 col-xs-9">
    	<div id="tab" class="row">
        	<ul class="nav nav-tabs">
            	<li><a href="employer_reports.php">Quick Stats</a></li>
                <li><a href="employer_general_stat.php">General Stats</a></li>
                <li class="active" style="font-weight: bold;"><a href="#">Job Stats</a></li>
            </ul>
        </div>
        <div id="all_jobs" style="height: auto; background-color:#FFF; font-size: 14px;" class="row">
          <div class="table-responsive">	
        	<table border="0" class="table">
            	<thead>
                <tr>
                	<td colspan="6" style="color: #F00;">Job Stats</td>
                </tr>
            	<tr class="active">
                	<th style="width: 10%;">Sr.No</th>
                	<th style="width: 35%;">Job Title</th>
                    <th style="width: 15%;">Posted</th>
                    <th style="width: 15%;">Expiry Date</th>
                    <th style="width: 10%; text-align: center;">Views</th>
                    <th style="width: 15%; text-align: center;">Applications</th>
                </tr>
                </thead>
                <?php
			
								// pagination start
				$page = (int)(!isset($_GET["page"]) ? 1 : $_GET["page"]);
				if ($page <= 0) $page = 1;
 
				$per_page = 10; // Set how many records do you want to display per page.
 
				$startpoint = ($page * $per_page) - $per_page;
 
				$statement = "company_jobs WHERE comp_id = '$comp_id' ORDER BY post_date DESC"; // Change `records` according to your table name.
  
				$results = mysqli_query($connection,"SELECT * FROM {$statement} LIMIT {$startpoint} , {$per_page}");
				
				if (mysqli_num_rows($results) != 0) {
				
				$i = 1;
				while($row_jobs = mysqli_fetch_array($results)){
	
						$job_id = $row_jobs['job_id'];
						$cat_id = $row_jobs['cat_id'];
						$job_title = $row_jobs['job_title'];
						$emp_type = $row_jobs['emp_type'];
						$post_date = date("d M Y", strtotime($row_jobs['post_date']));
						$expiry_day = $row_jobs['expiry_day'];
						$expiry_month = $row_jobs['expiry_month'];
						$expiry_year = $row_jobs['expiry_year'];
	
                ?>
                <tbody>
                <tr>
                	<td><?php echo $i++; ?></td>
                    <td><?php echo $job_title; ?></td>
                    <td><?php echo $post_date; ?></td>
                    <td><?php echo $expiry_day . "-" . $expiry_month . "-" . $expiry_year; ?></td>
                    <td style="text-align: center;"></td>
                    <td style="text-align: center;"><?php echo countLatestApps($job_id); ?></td>
                </tr>
                </tbody>
                <?php } } else{ echo "No records are found."; } ?>
                <tfoot>
                <tr>
                
    				<td colspan="9"><?php echo pagination($statement,$per_page,$page,$url='?'); ?></td>
    			</tr>
                </tfoot>
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