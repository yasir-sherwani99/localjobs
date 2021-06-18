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
            <div id="nav" class="row">
            	<div class="btn-group-vertical">
    				<a href="index.php"><button class="btn btn-default"><img src="images/clock.png" />Dashboard</button></a>
            		<a href="jobs.php"><button class="btn btn-default"><img src="images/list.png" />Jobs</button></a>
            		<a href="applications.php"><button class="btn btn-info"><img src="images/folder.png" />Applications</button></a>
            		<a href="employers.php"><button class="btn btn-default"><img src="images/group.png" />Employers</button></a>
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
            	<li class="active" style="font-weight: bold;"><a href="jobs.php">Applications</a></li>
            </ul>
        </div>
        <div id="search_job" style="background-color: #FFF; height: 30px; border: hidden;" class="row">
        	<form name="" method="post" action="" class="pull-left">
            	<input type="search" name="search" placeholder="Search" />
                <input type="submit" name="submit" class="btn btn-default btn-sm" value="Search" />
            </form>
            <button class="btn btn-default pull-right" disabled="disabled">Total Applications: <span class="badge"><?php echo totalApps(); ?></span></button>
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
            	<tr class="success">
                	<th>Sr.No</th>
                	<th>Job Title</th>
                    <th>First Name</th>
                    <th>Email</th>
                    <th>Apply-Date</th>
                    <th>Status</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <?php
				
				// pagination start
				$page = (int)(!isset($_GET["page"]) ? 1 : $_GET["page"]);
				if ($page <= 0) $page = 1;
 
				$per_page = 10; // Set how many records do you want to display per page.
 
				$startpoint = ($page * $per_page) - $per_page;
 
				$statement = "jobs_apply ORDER BY apply_date DESC"; // Change `records` according to your table name.
  
				$results = mysqli_query($connection,"SELECT * FROM {$statement} LIMIT {$startpoint} , {$per_page}");
				
				if (mysqli_num_rows($results) != 0) {
				
				$i = 1;
				while($row_jobs = mysqli_fetch_array($results)){
	
						$apply_id = $row_jobs['apply_id'];
						$job_id = $row_jobs['job_id'];
					//	$job_title = $row_jobs['job_title'];
						$mem_id = $row_jobs['mem_id'];
						$apply_date = date("d M Y", strtotime($row_jobs['apply_date']));
						$job_status = $row_jobs['job_status'];
						
						$get_mem = "SELECT * FROM members WHERE mem_id = '$mem_id'";
						$run_mem = mysqli_query($connection, $get_mem);
						$row_mem = mysqli_fetch_array($run_mem);
							$mem_first_name = $row_mem['mem_first_name'];
							$mem_email = $row_mem['mem_email'];
							
							$get_title = "SELECT * FROM company_jobs WHERE job_id = '$job_id'";
							$run_title = mysqli_query($connection, $get_title);
							$row_title = mysqli_fetch_array($run_title);
								$job_title = $row_title['job_title'];
                ?>
                <tbody>
                <tr>
                	<td><?php echo $i++; ?></td>
                    <td><?php echo $job_title; ?></td>
                    <td><?php echo $mem_first_name; ?></td>
                    <td><?php echo $mem_email; ?></td>
                    <td><?php echo $apply_date; ?></td>
                    <td><?php echo $job_status; ?></td>
                    <td><a href="view_application.php?apply_id=<?php echo $apply_id; ?>"><button class="btn btn-default btn-xs"><img src="images/eye.png" width="10" height="10"></button></a></td>
                    <td><a href="delete_app.php?apply_id=<?php echo $apply_id; ?>" onClick="return confirm('Are you sure, you want to delete this Job??')"><button class="btn btn-default btn-xs"><img src="images/cross.png" width="10" height="10"></button></a></td>
                </tr>
                <?php } } else{ echo "No records are found."; } ?>
                </tbody>
                <tr>
    				<td colspan="8"><?php echo pagination($statement,$per_page,$page,$url='?'); ?></td>
             
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