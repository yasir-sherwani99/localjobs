<?php session_start(); ?>
<?php
	include("includes/connection.php");
	include("functions/functions.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Local Jobs Pakistan</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" />   
    <link href="styles/index_style.css" rel="stylesheet" type="text/css" />
    <link href="styles/third_style.css" rel="stylesheet" type="text/css" />
    <link href="styles/ddmenu.css" rel="stylesheet" type="text/css" />
    <script src="js/ddmenu.js" type="text/javascript"></script>   
    <script src="js/respond.js"></script>
</head>

<body>

<div class="container">

	<!-- This is top bar -->
    <!-- row 1-->
	<div id="topbar" class="row">
    	<?php include("includes/top_bar.php"); ?>
	</div>
    
    <!-- This is header -->
    <!-- row 2-->
	<div id="header" class="row">
		<img src="images/blue1.png" style="border: 1px solid #FFF; class="img-responsive" alt="Responsive image"/>  
        
    </div>
    
    <!-- This is navigation bar -->  
    <!-- row 3 -->  
    <nav id="ddmenu" class="row">
            <?php include("includes/top-nav.php"); ?>
    </nav>
    
    <!-- row 4 -->

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
                <p class="lead">Reach hundreds of thousands of job seekers & qualified graduates.</p>
                <a href="employers/index.php"><button class="btn btn-success"><b>Post Jobs</b></button></a>
            </div>
        </div>
        
        
        <!-- This is start of left content area -->
        <!-- row 5-->
        <div class="row">
            <div id="contents" style="border: 1px solid #FFF;" class="col-md-9 col-sm-9 col-xs-12">
               
                <div id="latest" class="row">
                	<div class="panel panel-success">
                    	<div id="latest_jobs" class="panel-heading">
                            <label class="panel-title" style="font-size: 20px;"><span class="glyphicon glyphicon-user"></span> Latest Jobs in PAKISTAN</label>
                            
                    	</div>
                    	<div class="panel-body">
                        <?php
                            $get_jobs = "SELECT * FROM company_jobs order by post_date DESC LIMIT 0, 16";
                            $run_jobs = mysqli_query($connection, $get_jobs);
                            while($row_jobs = mysqli_fetch_array($run_jobs)){
                                $jobid = $row_jobs['job_id'];
                                $jobtitle = substr($row_jobs['job_title'], 0,20);
                                $jt = strlen($jobtitle);
                                $compid = $row_jobs['comp_id'];
                                $loc = $row_jobs['job_location'];
                                $postdate = date("d F Y", strtotime($row_jobs['post_date']));
								
								
                                    $get_comp = "SELECT * FROM employers WHERE comp_id = '$compid'";
                                    $run_comp = mysqli_query($connection, $get_comp);
                                    $row_comp = mysqli_fetch_array($run_comp);
                                        $cid = $row_comp['comp_id'];
                                        $ctitle = substr($row_comp['comp_name'], 0,13);
                                        $ct = strlen($ctitle);
                                    $get_city = "SELECT * FROM city WHERE city_id = '$loc'";
                                    $run_city = mysqli_query($connection, $get_city);
                                    $row_city = mysqli_fetch_array($run_city);
                                        $city_id = $row_city['city_id'];
                                        $city_title = substr($row_city['city_name'], 0,8);
                                        $cn = strlen($city_title);
                        ?>
                        
                                <a href="job_details.php?job_id=<?php echo $jobid; ?>">
                                <div id="single_job">
                                        <h4>
                                        <?php
                                            if($jt > 20){
                                                echo $jobtitle . ".." ;
                                            }else{
                                                echo $jobtitle;
                                            }
                                        ?>
                                        </h4>
                                        <h5>
                                        <?php
                                             if($ct > 12){
                                                echo $ctitle . ".. - " . $city_title;
                                            }else{
                                                echo $ctitle . " - " . $city_title;
                                            }
                                        ?>
                                        </h5>
                                        <h6><?php echo $postdate; ?></h6>
                                 </div>
                                 </a>
                            <?php } ?>	
                           </div> 
                      <div class="panel-footer" style="text-align: center;">  
                    	<a href="all_latest_jobs.php">See all latest jobs on localjobs.pk</a>
                      </div>
                    </div>
                </div>
                <div class="center_ad" class="row">
                </div>
                
                <div id="cat" class="row">
                	<div class="panel panel-success">
                    	<div id="cat_jobs" class="panel-heading">
                            <label class="panel-title" style="font-size: 20px;"><span class="glyphicon glyphicon-knight"></span> Browse Jobs by CATEGORY</label>
                            
                    	</div>
                    	<div class="panel-body">

							<?php
                                $get_cat = "SELECT * FROM categories ORDER BY rand() LIMIT 0, 16";
                                $run_cat = mysqli_query($connection, $get_cat);
                                while($row_cat = mysqli_fetch_array($run_cat)){
                                    $cat_id = $row_cat['cat_id'];
                                    $cat_name = $row_cat['cat_title'];
                            ?>		
                                    <a href="cat_details.php?cat_id=<?php echo $cat_id; ?>">
                                    <div id="single_cat">
                                        <ul>
                                            <li><h4><?php echo $cat_name . "&nbsp;Jobs"; ?></h4></li>
                                        </ul>  
                                        
                                    </div>
                                    </a>
                                
                            <?php } ?>
                         </div>
                         <div class="panel-footer" style="text-align: center;">  
     			               	<a href="all_latest_jobs.php">Browse all jobs by category on localjobs.pk</a>
 	                     </div>
					</div>
                </div>
                <div class="center_ad" class="row">
                </div>
        
                <div id="city" class="row">
	                <div class="panel panel-success">
                    	<div id="city_jobs" class="panel-heading">
                            <label class="panel-title" style="font-size: 20px;"><span class="glyphicon glyphicon-globe"></span> Browse Jobs in PAKISTAN</label>
                        
                    	</div>
                    	<div class="panel-body">

								 <?php
                                    $get_city_job = "SELECT * FROM city ORDER BY rand() LIMIT 0, 16";
                                   $run_city_job = mysqli_query($connection, $get_city_job);
                                    while($row_city_job = mysqli_fetch_array($run_city_job)){
                                        $city_job_id = $row_city_job['city_id'];
                                        $city_job_name = $row_city_job['city_name'];
                                ?>		
                                    <a href="city_details.php?city_id=<?php echo $city_job_id; ?>">
                                    <div id="single_city">
                                        <ul>
                                            <li><h4><?php echo $city_job_name . "&nbsp;Jobs"; ?></h4></li>
                                        </ul>
                                    </div>
                                    </a>
                                
                            <?php } ?>
                          </div>
                          <div class="panel-footer" style="text-align: center;">  
     			               	<a href="view_all_city.php">Browse all jobs by city on localjobs.pk</a>
 	                      </div>
  					</div>
                </div>	
                <div class="center_ad" class="row">
                </div>
     
            </div>
            <!-- Main Content Ends -->
        
            <!-- This is side bar -->
            <div id="sidebar" style="border: 0px solid #000;" class="col-md-3 col-sm-3 hidden-xs">
            	<div class="row">
                	<div class="panel panel-info">
                    	<div class="panel-heading">
                            <label class="panel-title"><span style="color: #2F4F4F;" class="glyphicon glyphicon-log-in"></span> Existing User- Sign In</label>
                        
                    	</div>
                    	<div class="panel-body">
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
                     
                     <div class="panel panel-success">
                    	<div class="panel-heading">
                            <label class="panel-title"><span style="color: #006633;" class="glyphicon glyphicon-log-in"></span> Subscribe to Job Alerts</label>
                        
                    	</div>
                    	<div class="panel-body">
                            <form method="post" action="" role="form">
                            	<div class="form-group">
                                	<label for="email">Your E-mail</label>
                                    <input type="text" class="form-control" name="sub_email" id="email" placeholder="Enter Email"/>
                                </div>
               				    <input type="submit" name="subscribe" value="Subscribe" class="btn btn-primary btn-sm"/>
                             </form>               
                            
						</div>
                     </div>

                </div>
            </div>
		</div>
        	
        <!-- This is footer -->
        <!-- row 6 -->
        
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
		
		echo "<script>window.alert('You are logged in succsssfully as a Job Seeker!')</script>";
		echo "<script>window.open('index.php','_self')</script>";
	}else{
		echo "<script>document.getElementById('error').innerHTML='Invalid Username/Password '</script>";
	}
	
	
	}
?>