<?php session_start(); ?>

<?php include("includes/connection.php"); ?>
<?php //include("functions/admin_functions.php"); ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Local Jobs Pakistan</title>
	<link href="images/logo_small.png" type="image/gif" rel="shortcut icon" />
    <link href="css/bootstrap.min.css" rel="stylesheet" />   
	<link rel="stylesheet" type="text/css" href="styles/admin_style.css" />
    <script src="js/respond.js"></script>
</head>

<body>
<div class="container">
	<!-- Header area starts -->
    <div id="header" class="row">
    	<div id="admin_heading" class="col-md-offset-4 col-md-4 col-md-offset-4 col-sm-offset-3 col-sm-6 col-sm-offset-3 col-xs-12">
        	<h1>Admin Panel</h1> 
        </div>

    </div>
    <!-- Header area ends -->
    
 
    <!-- Main contents area starts -->
       
    <div id="main_content_area" class="row">
    	<div id="login_area" class="col-md-offset-3 col-md-6 col-md-offset-3 col-sm-offset-2 col-sm-8 col-sm-offset-2 col-xs-12">
            <h3>ADMIN LOGIN</h3><br/>
            <form class="form-horizontal" role="form" action="admin_login.php" method="post"> 
            	<div class="form-group" id="authenticate_email"> 
                	<label for="useremail" class="col-md-3 col-sm-3 col-xs-3 control-label">Email</label> 
                    <div class="col-md-9 col-sm-9 col-xs-9"> 
                    	<input type="text" class="username form-control" name="username" id="useremail" placeholder="Enter Email"> 
                    </div> 
                </div> 
                <div class="form-group" id="authenticate_pass"> 
                    <label for="password" class="col-md-3 col-sm-3 col-xs-3 control-label">Password</label> 
                    <div class="col-md-9 col-sm-9 col-xs-9"> 
                        <input type="password" class="password form-control" name="userpass" id="password" placeholder="Enter Password">   
                    </div> 
                </div>
                <?php
					if(isset($_GET['error'])){
						$error = $_GET['error'];
					}  
        		?> 
                <div class="form-group"> 
                    <label class="col-md-offset-3 col-md-9 col-sm-offset-3 col-sm-9 col-xs-12" id="error">
                    &nbsp;<?php echo @$error; ?>
                    </label>
                </div> 
                <div class="form-group"> 
                    <div class="col-md-offset-3 col-md-9 col-sm-offset-3 col-sm-9 col-xs-12"> 
                    
                    	<input type="submit" class="btn btn-default" name="login" value="Login" />&nbsp | <label><a href="forgot.php">Forgot Password</a></label> &nbsp;|
                        	<label><a href="#">Employer Login</a></label>
                     </div> 
                </div> 
              </form>
    	</div>
    </div>
    
    <!-- Main contents area ends -->
    
    <!-- Footer area starts -->
    <div id="footer" class="row">
    	<label>Admin Panel</label> <span>Copyright &copy 2015:</span> <label>LocalJobs.PK</label>
    </div>
    <!-- Footer area ends -->
    
</div>

<!-- JavaScript-->
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
<?php
	
	if(isset($_POST['login'])){
	
	$username = $_POST['username'];
	$password = $_POST['userpass'];
	
	$query = "SELECT * FROM admin_login
			  WHERE admin_email = '$username' && admin_pass = '$password'";
	
	$result = mysqli_query($connection, $query);
	if(!$result){
		die("Database query has failed:" . mysqli_error());
	}
	
	$check_user = mysqli_num_rows($result);
	$row = mysqli_fetch_array($result);
		$admin_name = $row['admin_name'];
		
	if($check_user > 0){
		$_SESSION['username'] = $username;
		$_SESSION['admin_name'] = $admin_name;
		echo "<script>window.alert('You are logged in succsssfully as an Admin!')</script>";
		echo "<script>window.open('index.php','_self')</script>";
	}else{
		echo "<script>document.getElementById('error').innerHTML='Wrong Username or Password'</script>";
	}
	
	}
?>