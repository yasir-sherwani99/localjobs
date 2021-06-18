<?php session_start(); ?>

<?php include("includes/connection.php"); ?>
<?php //include("functions/admin_functions.php"); ?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Panel</title>
<link rel="stylesheet" type="text/css" href="styles/admin_style.css" />
<link rel="stylesheet" type="text/css" href="styles/second_style.css" />
</head>

<body>
<div id="container">
	<!-- Header area starts -->
    <div id="header">
    	<div id="admin_heading">
        	<h1>Admin Panel</h1> 
        </div>

    </div>
    <!-- Header area ends -->
    
    <!-- Navigation area starts -->
      
    <!-- Navigation area ends -->
    
    <!-- Main contents area starts -->
       
    <div id="main_content_area">
    	<div id="login_area">
        	<form name="" action="admin_login.php" method="post">
            <table border="0" cellpadding="4" width="460" align="center">
            	<caption>EMPLOYER LOGIN</caption>
            	<tr>
                	<td>Email</td>
                    <td><span class="email_pass_dec" style="float: left;">&commat;</span><input type="text" name="username" /></td>
                </tr>
                <tr>
                	<td>Password</td>
                    <td><span class="email_pass_dec" style="float: left;"><img src="images/lock.png"></span><input type="password" name="userpass" /></td>
                </tr>
				<tr>
                	<td></td>
                    <td><input type="submit" name="login" value="Login" />&nbsp;
                    	<label><a href="forgot.php">Forgot Password</a></label>&nbsp;|
                        <label><a href="#">Admin Login</a></label>
                    </td>
                </tr>
                <?php
					if(isset($_GET['error'])){
						$error = $_GET['error'];
					}
        		?>

                <tr>
                	<td></td>
                    <td><span id="error"><?php echo @$error; ?></span></td>
                </tr>
            </table>
            </form>
    	</div>
    </div>
    
    <!-- Main contents area ends -->
    
    <!-- Footer area starts -->
    <div id="footer">
    	<label>Admin Panel</label> <span>Copyright &copy 2015:</span> <label>LocalJobs.PK</label>
    </div>
    <!-- Footer area ends -->
    
</div>
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
	if($check_user > 0){
		$_SESSION['username'] = $username;
		echo "<script>window.alert('You are logged in succsssfully as an Admin!')</script>";
		echo "<script>window.open('index.php','_self')</script>";
	}else{
		echo "<script>document.getElementById('error').innerHTML='Wrong Username or Password'</script>";
	}
	
	}
?>