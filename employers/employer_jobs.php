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
            	<li class="active" style="font-weight: bold;"><a href="employer_jobs.php">Jobs</a></li>
                <li><a href="add_empl_jobs.php">Post Job</a></li>
 
            </ul>
        </div>
        <div id="search_job" style="height: 30px;" class="row">
        	<form name="" method="post" action="" class="role pull-left">
                    <input type="search" name="search" placeholder="Search" style="width: 200px; float: left;" class="form-control"/>&nbsp;
                    <input type="submit" name="submit" class="btn btn-default btn-sm" value="Search" style="font-size: 14px;" />
            </form>
    
            <button class="btn btn-default pull-right" disabled="disabled">Total Jobs <span class="badge"><?php echo totalEmployerJobs($comp_id) ?></span></button>
        </div>
        <?php
			 if(isset($_GET['deleted'])){
				 $deleted = $_GET['deleted'];
				 echo "<div id='message' class='alert alert-danger'>
        				<img src='images/checkmark.png' width='25' height='25'/>
            			<div id='aa'>$deleted</div>
        		</div>"; 
			 }
			 if(isset($_GET['updated'])){
				 $updated = $_GET['updated'];
				 echo "<div id='message' class='alert alert-success'>
        				<img src='images/checkmark.png' width='25' height='25'/>
            			<div id='aa'>$updated</div>
        		</div>"; 
			 }
			 
		?>

        <div id="all_jobs" style="height: auto; background-color:#FFF; font-size: 14px;" class="row">
          <div class="table-responsive">	
        	<table border="0" class="table table-bordered">
            	<thead>
            	<tr class="active">
                	<th style="width: 6%;">Sr.No</th>
                	<th style="width: 25%;">Title</th>
                    <th style="width: 10%;">Type</th>
                    <th style="width: 25%;">Category</th>
                    <th style="width: 12%;">Expiry-Date</th>
                    <th style="width: 8%;">Status</th>
                    <th style="width: 6%;">Apps</th>
                    <th style="width: 4%;"></th>
                    <th style="width: 4%;"></th>
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
	
						$get_cat = "SELECT * FROM categories WHERE cat_id = '$cat_id'";
						$run_cat = mysqli_query($connection, $get_cat);
						$row_cat = mysqli_fetch_array($run_cat);
							$cat_title = $row_cat['cat_title'];
                ?>
                <tbody>
                <tr>
                	<td style="text-align: center;"><?php echo $i++; ?></td>
                    <td><?php echo $job_title; ?></td>
                    <td><?php echo $emp_type; ?></td>
                    <td><?php echo $cat_title; ?></td>
                    <td><?php echo $expiry_day . "-" . $expiry_month . "-" . $expiry_year; ?></td>
                    <?php
						$todays_date = date("Y-m-d");
						$expiry_date = $expiry_year . "-" . $expiry_month . "-" . $expiry_day;
				
						$today = strtotime($todays_date);
						$expire = strtotime($expiry_date); 
						if($today > $expire){
							echo "<td style='color: red; font-weight: bold;'><button class='btn btn-danger btn-xs' disabled='disabled' style='width: 70px;'><span class='glyphicon glyphicon-alert'></span> Expired</button></td>";
						}
						else{
							echo "<td style='color: green; font-weight: bold;'><button class='btn btn-success btn-xs' disabled='disabled' style='width: 70px;'><span class='glyphicon glyphicon-saved'></span> Active</button></td>";
						}
                    ?>
                    <td style="text-align: center;"><span class="badge"><?php echo countLatestJobs($job_id); ?></span></td>
                    <td><a href="edit_empl_job.php?job_id=<?php echo $job_id; ?>"><button class="btn btn-default btn-xs"><img src="images/pencil.png" width="10" height="10" title="Edit/Update Job"></button></a></td>
                    <td><a href="delete_job.php?job_id=<?php echo $job_id; ?>" onClick="return confirm('Are you sure, you want to delete this Job??')"><button class="btn btn-default btn-xs"><img src="images/cross1.png" width="10" height="10" title="Delete Job"></button></a></td>
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