<?php
	session_start();
	
	include("includes/connection.php");
	include("functions/functions.php");
	include("functions/jobdetail_functions.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Local Jobs Pakistan</title>
	<link href="images/logo_small.png" type="image/gif" rel="shortcut icon" />
    <link href="css/bootstrap.min.css" rel="stylesheet" />   
    <link rel="stylesheet" type="text/css" href="styles/index_style.css" />
    <link rel="stylesheet" type="text/css" href="styles/third_style.css" />
    <link href="styles/ddmenu.css" rel="stylesheet" type="text/css" />
    <script src="js/ddmenu.js" type="text/javascript"></script>
	<script src="js/respond.js"></script>	
</head>

<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.4&appId=779716815444739";
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
        <?php include("includes/top-nav.php"); ?>
	</nav>
    
<div class="row">    
	<!-- This is start of main content area -->
    <?php
		
		if(isset($_GET['mess1'])){
			$message1 = $_GET['mess1'];
			echo "<div id='warning' class='alert alert-danger alert-dismissable'>
			<button type='button' class='close' data-dismiss='alert' aria-hidden='true'> &times; </button>
				  	<img src='images/icons2/cross.png' style='width: 20px; height: 20px;'>&nbsp;&nbsp;
					{$message1}
				  </div>";
		}
		else {
		
			if(isset($_GET['mess'])){
				$message = $_GET['mess'];
				echo "<div id='warning' class='alert alert-success alert-dismissable'>
				<button type='button' class='close' data-dismiss='alert' aria-hidden='true'> &times; </button>
				  	<img src='images/icons2/checkmark2.png' style='width: 20px; height: 20px;'>&nbsp;&nbsp;
					{$message}
				  </div>";
			}
			
			else {
		
				if(isset($_GET['created'])){
					$create = $_GET['created'];
					echo "<div id='warning' class='row alert alert-success alert-dismissable'>
					<button type='button' class='close' data-dismiss='alert' aria-hidden='true'> &times; </button>
				  	<img src='images/icons2/checkmark2.png' style='width: 20px; height: 20px;'>&nbsp;&nbsp;
					{$create}
				  </div>";
			}

		else
			{
			echo "<div id='warning' class='alert alert-info alert-dismissable'>
			<button type='button' class='close' data-dismiss='alert' aria-hidden='true'> &times; </button>
        	<img src='images/icons2/info.png' style='width: 20px; height: 20px;'>&nbsp;&nbsp;&nbsp;&nbsp;You are not signed in. Please sign in to continue...
        	</div>";
		}
	}
}
    ?>	

	<div id="contents" style="font-family:Trebuchet MS;" class="col-md-12 col-sm-12 col-xs-12">
        
      
                <div id="job_details" style="height: 400px;" class="row">
                    <div id="signin_box" class="col-md-7 col-sm-7 col-xs-12" style="padding-left: 100px; padding-right: 100px;"> 
                    <div class="panel panel-default">
                    <div class="panel-heading">
                        <label class="panel-title" style="font-size: 20px; font-family: Verdana;">Sign In - Job Seeker</label>
                        
                    </div>
                    <div class="panel-body">
                        <form method="post" action="jobseeker_signin_db.php" role="form">
                            <div class="form-group" id="authenticate_email">
                                <label for="email">E-mail</label>
                                <input type="text" class="username form-control" name="username" id="email" placeholder="Enter Email"/>
                            </div>
                            <div class="form-group" id="authenticate_pass">
                                <label for="password">Password</label>
                                <input type="password" class="password form-control" name="userpass" id="password" placeholder="Enter Password"/>
                            </div>
							<div class="form-group">
                                <label id="error" style="color: red;">&nbsp;</label>
                                <label>New User?<a href="members_register.php" style="color: #390;"> Sign Up!</a></label>
                            </div>
                            <div class="form-group">
                                <label id="error" style="color: red;">&nbsp;</label>
                                <label><a href="forgot_password.php" style="color: #390;">Forgot Password?</a></label>
                            </div>
            				<input type="submit" name="login" value="Sign In" class="btn btn-primary btn-sm"/>
                        </form>               
                            
					</div>
                </div>

        			
                    </div>
                    <div id="like_us_on_facebook" class="col-md-5 col-sm-5 hidden-xs">
                        <h3><span class="glyphicon glyphicon-heart"></span> Like us on Facebook :)</h3>
                        <div id="facebook_like_box">
<div class="fb-page" data-href="https://www.facebook.com/localjobspak" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="false"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/localjobspak"><a href="https://www.facebook.com/localjobspak">Facebook</a></blockquote></div></div>
                        </div>
                    </div>
            </div>
       
   
    </div>
 </div>   
    <!-- Main Content Ends -->
    
	
	<!-- This is footer -->

		<?php include("includes/footer_contents.php"); ?>
    
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
	
	$query = "SELECT * FROM members
			  WHERE mem_email = '$username' && mem_pass = '$password'";
	
	$result = mysqli_query($connection, $query);
	if(!$result){
		die("Database query has failed:" . mysqli_error());
	}
	
	$check_user = mysqli_num_rows($result);
	$row = mysqli_fetch_array($result);
		$first_name = $row['mem_first_name'];
		$last_name = $row['mem_last_name'];
		
	if($check_user > 0){
		$_SESSION['username'] = $username;
		$_SESSION['mem_first_name'] = $first_name;
		$_SESSION['mem_last_name'] = $last_name;
		
		echo "<script>window.open('my_account.php?mess=You are successfully signed in as a job seeker...','_self')</script>";
	}else{
		echo "<script>window.open('jobseeker_signin_db.php?mess1=Username or Password is Incorrect, Please try again...','_self')</script>";
	}
	
	
	} 
?>