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
	<link href="../images/logo_small.png" type="image/gif" rel="shortcut icon" />
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="styles/employer_style.css" />
    <script type="text/javascript" src="js/formvalidation.js"></script>
	<script src="js/respond.js"></script>	
</head>

<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.4&appId=842048222497902";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div class="container">

	<!-- This is top bar -->
	<div id="topbar" class="row">
    	<?php include("includes/top_bar.php"); ?>
	</div>

	<!-- This is header -->
	<div id="header" class="row">
		<?php include("includes/header.php"); ?>
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
               
      
                <div id="job_details" class="row" style="padding-left: 100px; padding-right: 100px;">
                	<div  class="row">
                        <div id="signin_box" class="col-md-7 col-sm-7 col-xs-12"> 
                        <div class="panel panel-warning">
                    <div class="panel-heading">
                        <label class="panel-title" style="font-size: 20px; font-family: Verdana;">Sign In - Employer</label>
                        
                    </div>
                    <div class="panel-body">
                        <form method="post" action="employer_signin.php" role="form">
                            <div class="form-group" id="authenticate_email">
                                <label for="email">E-mail</label>
                                <input type="text" class="username form-control" name="comp_user" placeholder="Enter Email"/>
                            </div>
                            <div class="form-group" id="authenticate_pass">
                                <label for="password">Password</label>
                                <input type="password" class="password form-control" name="comp_pass" placeholder="Enter Password"/>
                            </div>
							<div class="form-group">
                                <label id="error" style="color: red;">&nbsp;</label>
                                <label>New User?<a href="emp_register.php" style="color: #390;"> Sign Up!</a></label>
                            </div>
                            <div class="form-group">
                                <label id="error" style="color: red;">&nbsp;</label>
                                <label><a href="forgot_password.php" style="color: #390;">Forgot Password?</a></label>
                            </div>
            				<input type="submit" name="comp_login" value="Sign In" class="btn btn-primary"/>
                        </form>               
                            
		  </div>
                </div>
                                         
                        </div>
                        <div id="like_us_on_facebook" class="col-md-5 col-sm-5 hidden-xs">
                            <h3><span class="glyphicon glyphicon-heart"></span> Like us on Facebook :)</h3>
                            <div id="facebook_like_box">
<div class="fb-page" data-href="https://www.facebook.com/localjobspak" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="false"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/localjobspak"><a href="https://www.facebook.com/localjobspak">LocalJobs.pk</a></blockquote></div></div>
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