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
            	<li><a href="users.php">Users</a></li>
                <li><a href="add_user.php">Add User</a></li>
                <li class="active" style="font-weight: bold;"><a href="edit_user.php">Update User</a></li>
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
            		  <div id='aa'><b>Update User</b><br/>Edit the required fields and update a user.						</div>
        		</div>";
			}
        ?>
        <div id="job_form" class="row">
        	<?php
				$adminid = @$_GET['admin_id'];
				$get_admin = "SELECT * FROM admin_login WHERE admin_id = '$adminid'";
				$run_admin = mysqli_query($connection, $get_admin);
					$row_admin = mysqli_fetch_array($run_admin);
						$id = $row_admin['admin_id'];
						$admin = $row_admin['admin_name'];
						$email = $row_admin['admin_email'];
						$role = $row_admin['admin_role'];
						$status = $row_admin['admin_status'];
									
            ?>
        	<form name="" method="post" role="form" action="edit_user.php?edit_form=<?php echo $id; ?>">
            <table border="0" class="table">
            <tbody>
            <tr>
            	<td><b>Role</b></td>
                <td>
                	<select name="role" class="form-control" required>
                    	<option value="<?php echo $role; ?>"><?php echo $role; ?></option>
                        <option value="Administrator">Administrator</option>
                        <option value="Support">Support</option>
                    </select>
                </td>
            </tr>
            <tr>
            	<td><b>Email</b></td>
                <td><input type="email" name="email" value="<?php echo $email; ?>" required class="form-control"/></td>
            </tr>
			<tr>
            	<td><b>Name</b></td>
                <td><input type="text" name="username" value="<?php echo $admin; ?>" required class="form-control"/></td>
            </tr>
			<tr>
            	<td><b>Status</b></td>
                <td>
                	<select name="status" class="form-control" required>
                    	<option value="<?php echo $status; ?>"><?php echo $status; ?></option>
                        <option value="Active">Active</option>
                        <option value="Inactive">Inactive</option>
                    </select>
                </td>
            </tr>
			<tr>
            	<td></td>
                <td><input type="submit" name="update" class="btn btn-default" value="Update" /></td>
            </tr>
            </tbody>
            </table>
            </form>

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
		$admin_role = cleanStr($_POST['role']);
		$admin_email = cleanStr($_POST['email']);
		$admin_name = cleanStr($_POST['username']);
		$admin_status = cleanStr($_POST['status']);
		
		$update_admin = "UPDATE admin_login
					     SET admin_name = '$admin_name', 
					         admin_email = '$admin_email',
						   	 admin_role = '$admin_role', 
						     admin_status = '$admin_status' 
						   		WHERE admin_id = '$edit_record'"; 
			
		$run_update = mysqli_query($connection, $update_admin);
		if($run_update){
			echo "<script>window.open('users.php?updated=A user has updated successfully...!', '_self')</script>";
		}else{
			exit("Database Query has failed" . mysqli_error());
		}
		
	}
	
	}
?>