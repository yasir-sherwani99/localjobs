<?php session_start(); ?>
<?php
	include("includes/connection.php");
	include("functions/functions.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Local Jobs Pakistan</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" /> 
    <link rel="stylesheet" type="text/css" href="styles/index_style.css" />
    <link rel="stylesheet" type="text/css" href="styles/second_style.css" />
    <link rel="stylesheet" type="text/css" href="styles/sixth_style.css" />
    <link href="styles/ddmenu.css" rel="stylesheet" type="text/css" />
    <script src="js/ddmenu.js" type="text/javascript"></script>
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
		<img src="images/blue1.png" style="border: 1px solid #FFF;" class="img-responsive" alt="Responsive image"/>
    </div>
        <!-- This is navigation bar -->
    <nav id="ddmenu" class="row">
        <?php include("includes/top-nav.php"); ?>
	</nav>

    <div id="search_register_post" class="row">
        <div id="search1" class="col-md-5 col-sm-5 col-xs-12">
            <?php include("includes/search_index.php"); ?>
        </div>
        
        <div id="new_jobseeker" class="col-md-3 col-sm-3 hidden-xs">
                <h2>New JobSeeker?</h2>
                <h3>Post Your</h3>
                <h4>Resume</h4>
                <a href="members_register.php"><button class="btn btn-danger"><b>Register Free Today</b></button></a>        
        </div>
            
        <div id="find_talent" class="col-md-4 col-sm-4 hidden-xs">
                <h2>Find Talent</h2>
                <p>Reach hundreds of thousands of job seekers & qualified graduates.</p>
                <a href="employers/index.php"><button class="btn btn-success"><b>Post Jobs</b></button></a>
         </div>
    </div>

	<!-- This is start of main content area -->
    <div class="row">
        <div id="contents" style="border: 0px solid #C0C0C0;" class="col-md-9 col-sm-9 col-xs-12">
            <div class="panel panel-primary"> 
            	<div class="panel-heading">
            		<h3 class="panel-title" style="font-weight: bold;">SEARCH RESULTS</h3>
                </div>
                <div id="results" class="panel-body">
					<?php
                        if(isset($_POST['submit'])){
                        $user_keywords = $_POST['search'];
                                        
                        if($user_keywords == ""){
                            echo "<div id='single_search' class='row'>" . "<h3>Enter any keywords</h3>" . "</div>";
                        }else{
                                        
                         $get_jobs = "SELECT * FROM company_jobs WHERE job_keywords like '%$user_keywords%'";
                         $run_jobs = mysqli_query($connection, $get_jobs);
                         $count = mysqli_num_rows($run_jobs);
                         
                            if($count == 0){
                                
                            echo "<div id='single_search' class='row'>" . "<h3>No Job found in this category, Try another!</h3>" . "</div>";
                            }
                            
                             while($row_jobs = mysqli_fetch_array($run_jobs)){
                                 
                                $job_id = $row_jobs['job_id'];
                                $cat_job_id = $row_jobs['cat_id'];
                                $job_title = $row_jobs['job_title'];
                                $comp_id = $row_jobs['comp_id'];
                                
                                    $get_comp = "SELECT * FROM employers WHERE comp_id = '$comp_id'";
                                    $run_comp = mysqli_query($connection, $get_comp);
                                    $row_comp = mysqli_fetch_array($run_comp);
                                        $cid = $row_comp['comp_id'];
                                        $ctitle = $row_comp['comp_name'];
                                
                                echo "
                                    <div id='single_search' class='row'>
                                        <a href='job_details.php?job_id=$job_id'>
                                            <h3>$job_title</h3>
                                            <h4>$ctitle</h4>
                                        </a>
                                    </div>
                                    ";
                                }
                            }
      		              }
            		  ?>	
        
                    </div>
                </div>
         </div>
        <!-- Main Content Ends -->
    
        <!-- This is side bar -->
        <div id="sidebar" class="col-md-3 col-sm-3 hidden-xs">
 	       <div class="row">
                	<div class="panel panel-info">
                    	<div class="panel-heading">
                            <label class="panel-title"><span style="color: #F00;" class="glyphicon glyphicon-log-in"></span> Existing User- Sign In</label>
                        
                    	</div>
                    	<div id="login" class="panel-body">
                            <form method="post" action="" role="form">
                            	<div class="form-group">
                                	<label for="email">E-mail</label>
                                    <input type="text" class="form-control" name="username" id="email" placeholder="Enter Email"/>
                                </div>
                            	<div class="form-group">
                                	<label for="password">Password</label>
                                    <input type="password" class="form-control" name="userpass" id="password" placeholder="Enter Password"/>
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
             
        </div>
	  </div>	
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
	if($check_user > 0){
		$_SESSION['username'] = $username;
		echo "<script>window.alert('You are logged in succsssfully as a Job Seeker!')</script>";
		echo "<script>window.open('index.php','_self')</script>";
	}else{
		echo "<script>document.getElementById('error').innerHTML='Invalid Username/Password'</script>";
	}
	
	
	}
?>