<?php 
	session_start();
	if(!isset($_SESSION['comp_user'])){
		header('location: index.php?error=You are not an Administrator');
	}else{  
 
?>

<?php include("includes/connection.php"); ?>
<?php include("functions/emp_main_panel_functions.php"); ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Local Jobs Pakistan</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="styles/emp_main_panel_style.css" />
    <script type="text/javascript" src="js/js_functions.js"></script>
    <script src="js/respond.js"></script>
</head>

<body onLoad="myClock()">

<div class="container">

	<!-- This is top bar -->
	<div id="topbar" class="row">
    	<?php include("includes/top_bar.php"); ?>
	</div>

	<!-- This is header -->
	<div id="header" style="background-color: #FFF; border: 1px solid #FFF;" class="row">
		<img src="images/logo.png" />
	</div>  
    
    <div class="row">
     	<?php include("includes/navigation_main.php"); ?>
    </div>	

	<div class="row">
        <!-- Left side area starts -->
        <div id="left_side_area" class="col-md-3 col-sm-3 col-xs-3">
            <!-- Navigation area starts -->
            <div id="nav" class="row">
            	<div class="btn-group-vertical">
            
                <a href="main_panel.php"><button class="btn btn-info"><img src="images/clock.png" />Dashboard</button></a>
                <a href="employer_jobs.php"><button class="btn btn-default"><img src="images/icons/list.png" />Jobs</button></a>
                <a href="employer_apps.php"><button class="btn btn-default"><img src="images/icons/folder.png" />Applications</button></a>
                <a href="employer_profile.php"><button class="btn btn-default"><img src="images/icons/group.png" />Profile</button></a>
                <a href="employer_search.php"><button class="btn btn-default"><img src="images/icons/administrator.png" />Search</button></a>
                <a href="#"><button class="btn btn-default"><img src="images/icons/administrator.png" />Saved Resume</button></a>
                <a href="#"><button class="btn btn-default"><img src="images/icons/spreadsheet.png" />Reports</button></a>
                <a href="employer_change_pass.php"><button class="btn btn-default"><img src="images/icons/screwdriver.png" />Options</button></a>
                <a href="employer_logout.php"><button class="btn btn-default"><img src="images/icons/login.png" />Logout</button></a>
            	</div>
            </div>
        
        </div>
        <!-- This is main content area -->
        <div id="contents" class="col-md-9 col-sm-9 col-xs-9">
            <div id="top" class="row">
                <?php
                
                if(isset($_SESSION['comp_user'])){
                    $user_session = $_SESSION['comp_user'];
                                    
                    $get_employer = "SELECT * FROM employers
                                       WHERE comp_email = '$user_session'";
                                    
                    $run_employer = mysqli_query($connection, $get_employer);
                                    
                    $row_employer = mysqli_fetch_array($run_employer);
                    
                    $comp_id = $row_employer['comp_id'];
                    $comp_email = $row_employer['comp_email'];
                    $contact_person = $row_employer['contact_person'];
                    $comp_name = $row_employer['comp_name'];
                    
                    $get_jobs = "SELECT * FROM company_jobs WHERE comp_id = '$comp_id'";
                    $run_jobs = mysqli_query($connection, $get_jobs);
                    $total_jobs = mysqli_num_rows($run_jobs);
        
                    $get_apps = "SELECT * FROM jobs_apply WHERE comp_id = '$comp_id'";
                    $run_apps = mysqli_query($connection, $get_apps);
                    $total_apps = mysqli_num_rows($run_apps);
                                    
                    }
    
                ?>
                <div id="jobs" class="col-md-4 col-sm-4 col-xs-4">
          
                    <div class="panel panel-default"> 
                    	<div class="panel-body">
                        <table border="0" align="center">
                      	<tr>
                        	<td rowspan="2"><img src="images/notes16.png" style="width: 40px; height: 50px;"></td>
                            <td style="text-align: center; padding-top: 10px;"><span style="font-size: 22px;" class="badge"><?php echo $total_jobs; ?></span></td>
                        </tr>
                        <tr>
                        	<td style="text-align: center; padding-bottom: 0px;"><label style="font-size: 12px;">JOBS</label></td>
                        </tr>
                      </table>	

                        </div> 
                    </div> 			
   
                </div>
                
                <div id="apps" class="col-md-4 col-sm-4 col-xs-4">
                    <div class="panel panel-default"> 
                    	<div class="panel-body">
                        <table border="0" align="center">
                      	<tr>
                        	<td rowspan="2"><img src="images/documents11.png" style="width: 40px; height: 50px;"></td>
                            <td style="text-align: center; padding-top: 10px;"><span style="font-size: 22px;" class="badge"><?php echo $total_apps; ?></span></td>
                        </tr>
                        <tr>
                        	<td style="text-align: center; padding-bottom: 0px;"><label style="font-size: 12px;">APPLICATIONS</label></td>
                        </tr>
                      </table>	
 
                        </div> 
                    </div> 			
                </div>
                
                <div id="clock_day" class="col-md-4 hidden-sm hidden-xs">
                    <div class="panel panel-default"> 
                    	<div class="panel-body">
                        	<div id="day1" class="pull-left"> 
								<?php 
                                    $day = date("l");
                                    $day2 = strtoupper($day);
                                    echo $day2;  
                                ?>
                                
                                <div id="date1"><?php echo date("F d, Y"); ?></div>
                             </div>
                             <h1 id="clock" class="pull-right" style="font-size: 24px;"></h1>
                        </div> 
                    </div> 			
                    
                	
                </div>
               
            </div>
            <div id="latest" class="row">
                <div id="latest_jobs" class="col-md-4 col-sm-4 col-xs-4">
	                <div class="panel panel-info">
                    	<div class="panel-heading">
                        	<label class="panel-title"><span class="glyphicon glyphicon-user"></span> Latest Jobs</label>
                     	</div>
                    	<div class="panel-body">
                          <div class="table-responsive">
							<table class="table table-condensed" >
                     			<?php
                       
                                    $get_latest_jobs = "SELECT * FROM company_jobs 
                                                        WHERE comp_id = '$comp_id' ORDER BY post_date DESC LIMIT 0,5";
                                    $run_latest_jobs = mysqli_query($connection, $get_latest_jobs);
                                    while($row_latest_jobs = mysqli_fetch_array($run_latest_jobs)){
                                        $job_id = $row_latest_jobs['job_id'];
                                        $job_title = $row_latest_jobs['job_title'];
                                ?>	
                
                            
                            <tr>
                                <td class="job_title"><?php echo $job_title; ?></td>
                                <td><span class="badge num"><?php echo countLatestJobs($job_id); ?></span><br/>
                                            <span class="text">apps</span>
            					</td>
                            </tr>
                                <?php } ?>
            
                            </table>
                          </div>  
                       </div>
                	</div>
                </div>
                <div id="latest_apps" class="col-md-4 col-sm-4 col-xs-4">
                	<div class="panel panel-info">
                    	<div class="panel-heading">
                        	<label class="panel-title"><span class="glyphicon glyphicon-user"></span> Latest Applications</label>
                     	</div>
                    	<div class="panel-body">
                        <table class="table table-condensed" align="center">
							<?php
                   
                                $get_latest_app = "SELECT distinct(mem_id) FROM jobs_apply 
                                                    WHERE comp_id = '$comp_id' ORDER BY apply_date DESC LIMIT 0,5";
                                $run_latest_app = mysqli_query($connection, $get_latest_app);
                                while($row_latest_app = mysqli_fetch_array($run_latest_app)){
                                    $mem_id = $row_latest_app['mem_id'];
                                    
                                $get_member = "SELECT * FROM members WHERE mem_id = '$mem_id'";
                                $run_member = mysqli_query($connection, $get_member);
                                $row_member = mysqli_fetch_array($run_member);
                                    $first_name = $row_member['mem_first_name'];
                                    $last_name = $row_member['mem_last_name'];
                                    $mem_email = $row_member['mem_email'];
                            ?>
       
                        <tr>
                            <td>
                                <span style="font-size: 18px;"><?php echo $first_name . " " . $last_name; ?></span>
                                <br><span style="color: #00F;"><?php echo $mem_email; ?></span>
                            </td>
                        </tr>
                       
                            <?php } ?>
        
                        </table>
					   </div>    
                	</div>
    			</div>
                <div id="corporate_news" class="col-md-4 hidden-sm hidden-xs">
              	  <div class="panel panel-info">
                    	<div class="panel-heading">
                        	<label class="panel-title"><span class="glyphicon glyphicon-user"></span> Quick Stats</label>
                     	</div>
                    	<div class="panel-body">
                            <table border="0" class="table">
                            <tr>
                                <td style="color: #0080FF;">Current live jobs</td>
                                <td><span class="badge">0</span></td>
                            </tr>
                            
                            <tr>
                                <td style="color: #0080FF;">Jobs posted this month</td>
                                <td><span class="badge">0</span></td>
                            </tr>
                            <tr>
                                <td style="color: #0080FF;">Job views this month</td>
                                <td><span class="badge">0</span></td>
                            </tr>
                            <tr>
                                <td style="color: #0080FF;">Application received this month</td>
                                <td><span class="badge">0</span></td>
                            </tr>
                            </table>               	
                		</div>
    			   </div>
               </div> 
         <!--   <div id="bottom">
                <div id="last_login">Last Login: </div>
             </div>   -->
        
        </div> 
	</div>
</div>	
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
	if($check_user > 0){
		$_SESSION['comp_user'] = $comp_user;
		echo "<script>window.alert('You are logged in succsssfully as an Employer!')</script>";
		echo "<script>window.open('main_panel.php','_self')</script>";
	}else{
		echo "<script>document.getElementById('error').innerHTML='Username or Password is Incorrect'</script>";
	}
	
	
	}
}
?>