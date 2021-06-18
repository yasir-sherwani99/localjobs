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
            		<a href="employers.php"><button class="btn btn-default"><img src="images/group.png" />Employers</button></a>
            		<a href="employees.php"><button class="btn btn-default"><img src="images/administrator.png" />Employees</button></a>
            		<a href="options.php"><button class="btn btn-default"><img src="images/screwdriver.png" />Options</button></a>
                    <a href="#"><button class="btn btn-default"><img src="images/spreadsheet.png" />Reports</button></a>
            		<a href="users.php"><button class="btn btn-info"><img src="images/user.png" />Users</button></a>
            		<a href="admin_logout.php"><button class="btn btn-default"><img src="images/login.png" />Logout</button></a>
    			</div>
            </div> 
       	</div>   
    
    <!-- Navigation area ends -->
    
    <!-- Main contents area starts -->
    
    <div id="contents" class="col-md-9">
    	<div id="tab" class="row">
        	<ul class="nav nav-tabs">
            	<li class="active" style="font-weight: bold;"><a href="users.php">Users</a></li>
                <li><a href="add_user.php">Add User</a></li>
            </ul>
        </div>
        <div id="search_job" style="background-color: #FFF; height: 30px; border: hidden;" class="row">
        	<form name="" method="post" action="">
            	<input type="search" name="search" placeholder="Search" />
                <input type="submit" class="btn btn-default btn-sm" name="submit" value="Search" />
            </form>
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
        
        	<table border="0" class="table">
				<thead>
            	<tr class="success">
                	<th>Sr.No</th>
                	<th>Name</th>
                    <th>Email</th>
                    <th>Reg. Date</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <?php
				
				// pagination start
				$page = (int)(!isset($_GET["page"]) ? 1 : $_GET["page"]);
				if ($page <= 0) $page = 1;
 
				$per_page = 7; // Set how many records do you want to display per page.
 
				$startpoint = ($page * $per_page) - $per_page;
 
				$statement = "admin_login ORDER BY reg_date DESC"; // Change `records` according to your table name.
  
				$results = mysqli_query($connection,"SELECT * FROM {$statement} LIMIT {$startpoint} , {$per_page}");
				
				if (mysqli_num_rows($results) != 0) {
				
				$i = 1;
				while($row_admin = mysqli_fetch_array($results)){
	
						$admin_id = $row_admin['admin_id'];
						$admin_name = $row_admin['admin_name'];
						$admin_email = $row_admin['admin_email'];
						$admin_pass = $row_admin['admin_pass'];
						$admin_role = $row_admin['admin_role'];
						$admin_status = $row_admin['admin_status'];
						$admin_reg_date = $row_admin['reg_date'];
					
                ?>
                <tbody>
                <tr>
                	<td><?php echo $i++; ?></td>
                    <td><?php echo $admin_name; ?></td>
                    <td><?php echo $admin_email; ?></td>
                    <td><?php echo $admin_reg_date; ?></td>
                    <td><?php echo $admin_role; ?></td>
                    <td><?php echo $admin_status; ?></td>
                    <td><a href="edit_user.php?admin_id=<?php echo $admin_id; ?>"><button class="btn btn-default btn-xs"><img src="images/pencil.png" width="10" height="10"></button></a></td>
                    <td><a href="delete_user.php?admin_id=<?php echo $admin_id; ?>" onClick="return confirm('Are you sure, you want to delete this User??')"><button class="btn btn-default btn-xs"><img src="images/cross.png" width="10" height="10"></button></a></td>
                </tr>
                </tbody>
                <?php } } else{ echo "No records are found."; } ?>
                <tfoot>
                <tr>
    				<td colspan="8"><?php echo pagination($statement,$per_page,$page,$url='?'); ?></td>
    			</tr>
                </tfoot>
            </table>
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