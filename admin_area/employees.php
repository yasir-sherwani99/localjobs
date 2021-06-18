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
	<link href="images/logo_small.png" type="image/gif" rel="shortcut icon" />
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
            	<li class="active" style="font-weight: bold;"><a href="employees.php">Employees</a></li>
                <li><a href="add_employee.php">Add Employee</a></li>
            </ul>
        </div>
        <div id="search_job" style="background-color: #FFF; height: 30px; border: hidden;" class="row">
        	<form name="" method="post" action="" class="pull-left">
            	<input type="search" name="search" placeholder="Search" />
                <input type="submit" name="submit" class="btn btn-default btn-sm" value="Search" />
            </form>
            <button class="btn btn-default pull-right" disabled="disabled">Total Employees <span class="badge"><?php echo totalMembers(); ?></span></button>
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
        
        	<table border="0" class="table table-bordered">
            	<thead>
            	<tr class="success">
                	<th>Sr.No</th>
                	<th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th style="text-align: center;">Pic</th>
                    <th style="text-align: center;">Status</th>
                    <th></th>
                
                </tr>
                </thead>
                <?php
				
				// pagination start
				$page = (int)(!isset($_GET["page"]) ? 1 : $_GET["page"]);
				if ($page <= 0) $page = 1;
 
				$per_page = 10; // Set how many records do you want to display per page.
 
				$startpoint = ($page * $per_page) - $per_page;
 
				$statement = "members ORDER BY creation_date DESC"; // Change `records` according to your table name.
  
				$results = mysqli_query($connection,"SELECT * FROM {$statement} LIMIT {$startpoint} , {$per_page}");
				
				if (mysqli_num_rows($results) != 0) {
				
				$i = 1;
				while($row_jobs = mysqli_fetch_array($results)){
	
						$mem_id = $row_jobs['mem_id'];
						$first_name = $row_jobs['mem_first_name'];
						$last_name = $row_jobs['mem_last_name'];
						$email = $row_jobs['mem_email'];
						$status = $row_jobs['status'];	
						$pic = $row_jobs['mem_image'];				
                ?>
                <tbody>
                <tr>
                	<td><?php echo $i++; ?></td>
                    <td><?php echo $first_name; ?></td>
                    <td><?php echo $last_name; ?></td>
                    <td><?php echo $email; ?></td>
                    <td align="center">
                    <?php
			if($pic == ""){
				echo "<img src='../members/member_photos/administrator.png' width='30' height='30' />";		
			}
			else{
				echo "<img src='../members/member_photos/$pic' width='30' height='30' />"; 
			}
		    ?>
                    </td>
                    <td style="color: green; font-weight: bold; text-align: center;"><?php echo $status; ?></td>
                    <td><a href="edit_employee.php?mem_id=<?php echo $mem_id; ?>"><button class="btn btn-default btn-xs"><img src="images/pencil.png" width="10" height="10"></button></a>
                    <a href="delete_employee.php?mem_id=<?php echo $mem_id; ?>" onClick="return confirm('Are you sure, you want to delete this Employee??')"><button class="btn btn-default btn-xs"><img src="images/cross.png" width="10" height="10"></button></a></td>
                </tr>
                <?php } } else{ echo "No records are found."; } ?>
                <tr>
    				<td colspan="7"><?php echo pagination($statement,$per_page,$page,$url='?'); ?></td>
                    
    			</tr>
                </tbody>
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