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
            	<li><a href="users.php">Users</a></li>
                <li class="active" style="font-weight: bold;"><a href="add_user.php">Add User</a></li>
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
            		  <div id='aa'><b>Add new user</b><br/>Enter the required fields and add a new user.						</div>
        		</div>";
			}
        ?>
        <div id="job_form" class="row">
            <form name="" method="post" role="form" action="add_user.php">
            <table border="0" class="table">
            <tbody>
            <tr>
            	<td style="width: 150px;"><b>Role</b></td>
                <td>
                	<select name="role" class="form-control" required>
                    	<option value="">--Choose--</option>
                        <option value="Administrator">Administrator</option>
                        <option value="Support">Support</option>
                    </select>
                </td>
            </tr>
            <tr>
            	<td><b>Email</b></td>
                <td><input type="email" name="email" required class="form-control"/></td>
            </tr>
            <tr>
            	<td><b>Password</b></td>
                <td><input type="password" name="password" required class="form-control"/></td>
            </tr>
			<tr>
            	<td><b>Name</b></td>
                <td><input type="text" name="username" required class="form-control"/></td>
            </tr>
			<tr>
            	<td><b>Status</b></td>
                <td>
                	<select name="status" class="form-control" required>
                    	<option value="">--Choose--</option>
                        <option value="Active">Active</option>
                        <option value="Inactive">Inactive</option>
                    </select>
                </td>
            </tr>
			<tr>
            	<td></td>
                <td><input type="submit" name="submit" class="btn btn-default" value="Save" /></td>
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
	if(isset($_POST['submit'])){
		$admin_role = cleanStr($_POST['role']);
		$admin_email = cleanStr($_POST['email']);
		$admin_pass = cleanStr($_POST['password']);
		$admin_name = cleanStr($_POST['username']);
		$admin_status = cleanStr($_POST['status']);

		
		$insert_admin = "INSERT INTO admin_login
					 (admin_name, admin_email, admin_pass, admin_role, admin_status, reg_date) 
					  VALUES ('$admin_name', '$admin_email', '$admin_pass', '$admin_role', '$admin_status', NOW())";
			
		$run_admin = mysqli_query($connection, $insert_admin);
		if($run_admin){
			echo "<script>window.open('add_user.php?mess=An Admin has registered successfully...!', '_self')</script>";
		}else{
			exit("Database Query has failed" . mysqli_error());
		}
		
	}
	
	}
?>