<?php
	session_start();
	
	include("includes/connection.php");
	include("functions/emp_main_panel_functions.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Local Jobs Pakistan</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="styles/employer_style.css" />
    <script type="text/javascript" src="js/formvalidation.js"></script>
	<script src="js/respond.js"></script>	
</head>

<body>

<div class="container">

	<!-- This is top bar -->
	<div id="topbar" class="row">
    	<?php include("includes/top_bar.php"); ?>
	</div>

	<!-- This is header -->
	<div id="header" class="row">
		<img src="images/logo.png" />
    </div>
    
        <!-- This is navigation bar -->
    <nav id="ddmenu" class="row">
        <?php include("includes/navigation.php"); ?>
	</nav>
    
	<!-- This is start of main content area -->
 <div class="row">
 
    <?php
		
		if(isset($_GET['mess1'])){
			$message1 = $_GET['mess1'];
			echo "<div id='warning' class='alert alert-danger'>
				  	<img src='images/cross.png' style='width: 20px; height: 20px;'>&nbsp;&nbsp;
					{$message1}
				  </div>";
		}
		else {
		
			if(isset($_GET['mess'])){
				$message = $_GET['mess'];
				echo "<div id='warning' class='alert alert-success'>
				  	<img src='images/checkmark2.png' style='width: 20px; height: 20px;'>&nbsp;&nbsp;
					{$message}
				  </div>";
			}
			
			else {
		
				if(isset($_GET['created'])){
					$create = $_GET['created'];
					echo "<div id='warning' class='alert alert-success'>
				  	<img src='images/checkmark2.png' style='width: 20px; height: 20px;'>&nbsp;&nbsp;
					{$create}
				  </div>";
			}

		else
			{
			echo "<div id='warning' class='alert alert-warning'>
        	<img src='images/warning_button.gif' style='width: 20px; height: 20px;'>&nbsp;&nbsp;&nbsp;&nbsp;You are not signed in. Please sign in to continue...
        	</div>";
		}
	}
}
    ?>	
  
   
  	<div id="contents" style="font-family:Trebuchet MS; border: hidden;" class="col-md-12 col-sm-12 col-xs-12">
             
  
       <div id="job_title" class="row"><img src="images/login.png"><h3>Employer - Sign In</h3></div>     
      
                <div id="job_details" style="height: 400px;" class="row">
                	<div  class="row">
                        <div id="signin_box" class="col-md-7 col-sm-7 col-xs-12"> 
                        
                            <form method="post" action="employer_signin.php" role="form">
                            <div class="table-responsive">
                                <table class="table table-condensed">
                                <tr>
                                    <td align="right"><label>E-mail: </label></td>
                                    <td><input type="text" class="form-control" name="comp_user" /></td>
                                    <td></td>
                                </tr>
                   
                                <tr>
                                    <td align="right"><label>Password: </label></td>
                                    <td><input type="password" class="form-control" name="comp_pass" /></td>
                                    <td><span><a href="forgot_password.php" style="color: #390;">Forgot Password?</a></span></td>
                                </tr>
                                
                                <tr>
                                    <td></td>
                                    <td><input type="submit" name="comp_login" class="btn btn-primary" value="Sign In" /> <span style="padding-left: 20px;">or</span> 
                                        <span style="padding-left: 10px;"><a href="members_register.php" style="color: #0080FF;">Join LocalJobs</a></span>
                                    </td>
                                    <td></td>
                                </tr>
                                </table>
                            </div>
                            </form>
                        
                        </div>
                        <div id="like_us_on_facebook" class="col-md-5 col-sm-5 hidden-xs">
                            <h3><span class="glyphicon glyphicon-heart"></span> Like us on Facebook :)</h3>
                            <div id="facebook_like_box">
                            </div>
                        </div>
                    </div>
            </div>
       
   
    </div>
</div>    
    <!-- Main Content Ends -->
    
	
	<!-- This is footer -->
	<div id="footer" class="row">
		<?php include("includes/footer_contents.php"); ?>
	</div>
    
</div>

<!-- JavaScript-->
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
<?php
	
	if(isset($_POST['comp_login'])){
	
	$comp_user = $_POST['comp_user'];
	$comp_pass = $_POST['comp_pass'];
	
	$query = "SELECT * FROM employers
			  WHERE comp_email = '$comp_user' && comp_pass = '$comp_pass'";
	
	$result = mysqli_query($connection, $query);
	if(!$result){
		die("Database query has failed:" . mysqli_error());
	}
			
	$check_user = mysqli_num_rows($result);
	$row = mysqli_fetch_array($result);
		$comp_name = $row['comp_name'];

	if($check_user > 0){
		$_SESSION['comp_user'] = $comp_user;
		$_SESSION['comp_name'] = $comp_name;
	//	echo "<script>window.alert('You are logged in succsssfully as an Employer!')</script>";
		echo "<script>window.open('main_panel.php','_self')</script>";
	}else{
		echo "<script>window.open('employer_signin.php?mess1=Username or Password is Incorrect, Please try again...','_self')</script>";
	}
	}
	
?>