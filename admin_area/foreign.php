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
            <?php include("includes/dashboard.php"); ?>
       	</div>   
    
    <!-- Navigation area ends -->

    <!-- Main contents area starts -->
    
    <div id="contents" class="col-md-9">
    	
    	<div id="tab" class="row">
        	<ul class="nav nav-tabs">
            	<li class="active" style="font-weight: bold;"><a href="foreign.php">Foreign Jobs</a></li>
                <li><a href="add_foreignjob.php">Post Foreign Job</a></li>
            </ul>
        </div>
        <div id="search_job" style="background-color: #FFF; height: 30px; border: hidden;" class="row">
        	<form name="" method="post" action="" class="pull-left">
            	<input type="search" name="search" placeholder="Search" />
                <input type="submit" name="submit" class="btn btn-default btn-sm" value="Search" />
            </form>
            <button class="btn btn-default pull-right" disabled="disabled">Total Jobs: <span class="badge"><?php echo totalForeignJobs(); ?></span></button>
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

        <div id="all_jobs" class="row">
          <div class="table-responsive">	
        	<table class="table table-bordered">
            	<thead>
            	<tr class="success">
                	<th style="width: 6%;">Sr.No</th>
                	<th style="width: 25%;">Title</th>
                    <th style="width: 25%;">Company</th>
                    <th style="width: 10%;">City</th>
                    <th style="width: 10%;">Country</th>
                    <th style="width: 12%;">Due Date</th>
                    <th style="width: 8%;">Status</th>
                    <th style="width: 3%;"></th>
                    <th style="width: 2%;"></th>
                </tr>
                </thead>
                <?php
				
				// pagination start
				$page = (int)(!isset($_GET["page"]) ? 1 : $_GET["page"]);
				if ($page <= 0) $page = 1;
 
				$per_page = 10; // Set how many records do you want to display per page.
 
				$startpoint = ($page * $per_page) - $per_page;
 
				$statement = "foreign_jobs ORDER BY for_job_post_date DESC"; // Change `records` according to your table name.
  
				$results = mysqli_query($connection,"SELECT * FROM {$statement} LIMIT {$startpoint} , {$per_page}");
				
				if (mysqli_num_rows($results) != 0) {
				
				$i = 1;
				while($row_jobs = mysqli_fetch_array($results)){
	
						$job_id = $row_jobs['for_job_id'];
						$job_title = $row_jobs['for_job_title'];
						$job_comp = $row_jobs['for_job_comp'];
						$job_city = $row_jobs['for_job_city'];
						$job_ctry = $row_jobs['for_job_ctry'];
						$expiry_day = $row_jobs['for_job_expiry_day'];
						$expiry_month = $row_jobs['for_job_expiry_month'];
						$expiry_year = $row_jobs['for_job_expiry_year'];
						
						$get_ctry = "SELECT * FROM countries WHERE ctry_id = '$job_ctry'";
						$run_ctry = mysqli_query($connection, $get_ctry);
						$row_ctry = mysqli_fetch_array($run_ctry);
							$ctry_title = $row_ctry['ctry_name'];
					
                ?>
                <tbody>
                <tr>
                	<td style="text-align: center;"><?php echo $i++; ?></td>
                    <td><?php echo $job_title; ?></td>
                    <td><?php echo $job_comp; ?></td>
                    <td><?php echo $job_city; ?></td>
                    <td><?php echo $ctry_title; ?></td>
                    <td><?php echo $expiry_day . "-" . $expiry_month . "-" . $expiry_year; ?></td>
                    <?php
						$todays_date = date("Y-m-d");
						$expiry_date = $expiry_year . "-" . $expiry_month . "-" . $expiry_day;
				
						$today = strtotime($todays_date);
						$expire = strtotime($expiry_date); 
						if($today > $expire){
							echo "<td style='color: red; font-weight: bold;'>Expired</td>";
						}
						else{
							echo "<td style='color: green; font-weight: bold;'>Active</td>";
						}
                    ?>
                    <td><a href="edit_foreign.php?job_id=<?php echo $job_id; ?>"><button class="btn btn-default btn-xs"><img src="images/pencil.png" width="10" height="10"></button></a></td>
                    <td><a href="delete_foreign.php?job_id=<?php echo $job_id; ?>" onClick="return confirm('Are you sure, you want to delete this Job??')"><button class="btn btn-default btn-xs"><img src="images/cross.png" width="10" height="10"></button></a></td>
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