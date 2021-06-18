<?php include("includes/connection.php"); ?>
<?php include("functions/admin_functions.php"); ?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Panel</title>
<link rel="stylesheet" type="text/css" href="styles/admin_style.css" />
<script type="text/javascript" src="js/js_functions.js"></script>
<style>
	#message{
		border: 1px solid #0080FF;
		background-color: #CCFFFF;
		width: 740px;
		height: 30px;
		margin-top: 10px;
		margin-left: auto;
		margin-right: auto;
		font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
	}
	#message img{
		border: 0px solid red;
		margin-left: 10px;
		margin-top: 2px;
		float: left;
	}
	#aa{
		border: 0px solid green;
		margin-left: -5px;
		margin-top: 5px;
		padding-left: 55px;
	}

</style>
</head>

<body onLoad="myClock()">
<div id="container">
	<!-- Header area starts -->
    <div id="header">
    	<div id="admin_heading">
        	<h1>Admin Panel</h1> 
        </div>
        <?php include("includes/current_date_time.php"); ?>
    </div>
    <!-- Header area ends -->
    
    <!-- Navigation area starts -->
    <div id="nav">
    	<ul>
        	<li><a href="index.php"><button><img src="images/clock.png" />Dashboard</button></a></li>
            <li><a href="jobs.php"><button><img src="images/list.png" />Jobs</button></a></li>
            <li><a href="applications.php"><button><img src="images/folder.png" />Applications</button></a></li>
            <li><a href="employers.php"><button><img src="images/group.png" />Employers</button></a></li>
            <li><a href="employees.php"><button><img src="images/administrator.png" />Employees</button></a></li>
            <li><a href="options.php"><button style="background-color: #FFF; font-weight: bold;"><img src="images/screwdriver.png" />Options</button></a></li>
            <li><button><img src="images/user.png" />Users</button></li>
            <li><button><img src="images/login.png" />Logout</button></li>
        </ul>
    </div>
    
    <!-- Navigation area ends -->
    
    <!-- Main contents area starts -->
    
    <div id="contents">
    	<div id="tab" style="background-color: #C0C0C0; height: 30px;">
        	<ul>
            	<li style="background-color: #FFF; font-weight: bold;"><a href="jobs.php">Jobs</a></li>
                <li><a href="add_jobs.php">Add Job</a></li>
            </ul>
        </div>
        <div id="search_job" style="background-color: #FFF; height: 30px; border: hidden;">
        	<form name="" method="post" action="">
            	<input type="search" name="search" placeholder="Search" />
                <input type="submit" name="submit" value="Search" />
            </form>
        </div>
        <?php
			 if(isset($_GET['deleted'])){
				 $deleted = $_GET['deleted'];
				 echo "<div id='message'>
        				<img src='images/checkmark.png' width='25' height='25'/>
            			<div id='aa'>$deleted</div>
        		</div>"; 
			 }
			 if(isset($_GET['updated'])){
				 $updated = $_GET['updated'];
				 echo "<div id='message'>
        				<img src='images/checkmark.png' width='25' height='25'/>
            			<div id='aa'>$updated</div>
        		</div>"; 
			 }
			 
		?>

        <div id="all_jobs" style="height: 500px; background-color:#FFF; font-size: 14px;">
        
        	<table border="1" width="740" cellpadding="5">
            	<tr style="background-color: #F5F5F5;">
                	<th style="width: 40px;">Sr.No</th>
                	<th style="width: 200px;">Title</th>
                    <th style="width: 60px;">Type</th>
                    <th style="width: 200px;">Category</th>
                    <th style="width: 80px;">Exp.Date</th>
                    <th style="width: 40px;">Apps</th>
                    <th style="width: 50px;">Edit</th>
                    <th style="width: 50px;">Delete</th>
                </tr>
                <?php
				
				// pagination start
				$page = (int)(!isset($_GET["page"]) ? 1 : $_GET["page"]);
				if ($page <= 0) $page = 1;
 
				$per_page = 7; // Set how many records do you want to display per page.
 
				$startpoint = ($page * $per_page) - $per_page;
 
				$statement = "company_jobs ORDER BY post_date DESC"; // Change `records` according to your table name.
  
				$results = mysqli_query($connection,"SELECT * FROM {$statement} LIMIT {$startpoint} , {$per_page}");
				
				if (mysqli_num_rows($results) != 0) {
				
				$i = 1;
				while($row_jobs = mysqli_fetch_array($results)){
	
						$job_id = $row_jobs['job_id'];
						$cat_id = $row_jobs['cat_id'];
						$job_title = $row_jobs['job_title'];
						$emp_type = $row_jobs['emp_type'];
						$expiry_date = $row_jobs['expiry_date'];
						
						$get_cat = "SELECT * FROM categories WHERE cat_id = '$cat_id'";
						$run_cat = mysqli_query($connection, $get_cat);
						$row_cat = mysqli_fetch_array($run_cat);
							$cat_title = $row_cat['cat_title'];
					
                ?>
                <tr>
                	<td align="center"><?php echo $i++; ?></td>
                    <td><?php echo $job_title; ?></td>
                    <td><?php echo $emp_type; ?></td>
                    <td><?php echo $cat_title; ?></td>
                    <td><?php echo $expiry_date; ?></td>
                    <td align="center"><?php echo countLatestJobs($job_id); ?></td>
                    <td align="center"><a href="edit_job.php?job_id=<?php echo $job_id; ?>"><button><img src="images/pencil.png" width="10" height="10"></button></a></td>
                    <td align="center"><a href="delete_job.php?job_id=<?php echo $job_id; ?>" onClick="return confirm('Are you sure, you want to delete this Job??')"><button><img src="images/cross.png" width="10" height="10"></button></a></td>
                </tr>
                <?php } } else{ echo "No records are found."; } ?>
                <tr>
    				<td colspan="6"><?php echo pagination($statement,$per_page,$page,$url='?'); ?></td>
                    <td colspan="2" style="color: #A0A0A0;">Total Jobs: <?php echo totalJobs(); ?></td>
    			</tr>
            </table>
        </div>
   	</div>
    
    <!-- Main contents area ends -->
     <!-- Footer area starts -->
    <div id="footer">
    	<label>&copy 2015: thelocaljobs.pk</label>
    </div>
    <!-- Footer area ends -->

</div>
</body>
</html>