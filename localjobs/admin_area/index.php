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
    <!-- Navigation area starts -->
    <div class="row">
    
        <!-- Left side area starts -->
        <div id="left_side_area" class="col-md-3">
            <!-- Navigation area starts -->
            <div id="nav" class="row">
            	<div class="btn-group-vertical">
    				<a href="index.php"><button class="btn btn-info"><img src="images/clock.png" />Dashboard</button></a>
            		<a href="jobs.php"><button class="btn btn-default"><img src="images/list.png" />Jobs</button></a>
            		<a href="applications.php"><button class="btn btn-default"><img src="images/folder.png" />Applications</button></a>
            		<a href="employers.php"><button class="btn btn-default"><img src="images/group.png" />Employers</button></a>
            		<a href="employees.php"><button class="btn btn-default"><img src="images/administrator.png" />Employees</button></a>
            		<a href="options.php"><button class="btn btn-default"><img src="images/screwdriver.png" />Options</button></a>
                    <a href="#"><button class="btn btn-default"><img src="images/spreadsheet.png" />Reports</button></a>
            		<a href="users.php"><button class="btn btn-default"><img src="images/user.png" />Users</button></a>
            		<a href="admin_logout.php"><button class="btn btn-default"><img src="images/login.png" />Logout</button></a>
    			</div>
            </div> 
       </div>   
    
    <!-- Navigation area ends -->
    
    <!-- Main contents area starts -->
    
    <div id="contents" class="col-md-9">
    	<div id="top" class="row">
        	<div id="jobs" class="col-md-4 col-sm-4 col-xs-4">
                <div class="panel panel-default"> 
                   <div class="panel-body">
                   	  <table border="0" align="center">
                      	<tr>
                        	<td rowspan="2"><img src="images/notes16.png" style="width: 55px; height: 60px;"></td>
                            <td style="text-align: center; padding-top: 10px;"><span style="font-size: 26px;" class="badge"><?php echo totalJobs(); ?></span></td>
                        </tr>
                        <tr>
                        	<td style="text-align: center; padding-bottom: 0px;"><label style="font-size: 14px;">JOBS</label></td>
                        </tr>
                      </table>	
                                             
                   </div> 
                </div> 			

            </div>
            
            <div id="employers" class="col-md-4 col-sm-4 col-xs-4">

                <div class="panel panel-default"> 
                   <div class="panel-body">
                   	  <table border="0" align="center">
                      	<tr>
                        	<td rowspan="2"><img src="images/management1.png" style="width: 55px; height: 60px;"></td>
                            <td style="text-align: center; padding-top: 10px;"><span style="font-size: 26px;" class="badge"><?php echo totalEmployers(); ?></span></td>
                        </tr>
                        <tr>
                        	<td style="text-align: center; vertical-align: baseline;"><label style="font-size: 14px;">EMPLOYERS</label></td>
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
                        	<td rowspan="2"><img src="images/documents11.png" style="width: 55px; height: 60px;"></td>
                            <td style="text-align: center; padding-top: 10px;"><span style="font-size: 26px;" class="badge"><?php echo totalApps(); ?></span></td>
                        </tr>
                        <tr>
                        	<td style="text-align: center; padding-bottom: 0px;"><label style="font-size: 14px;">APPLICATIONS</label></td>
                        </tr>
                      </table>	
                                             
                 </div>
               </div>   
            </div>
            
        </div>
        <div id="latest" class="row">
        	<div id="latest_jobs" class="col-md-4 col-sm-4 col-xs-4">
                <div class="panel panel-info">
                	<div class="panel-heading">
                    <label class="panel-title"><span class="glyphicon glyphicon-apple"></span> Latest Jobs</label>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table border="0" class="table table-condensed" >
                        <?php
       
                            $query = "SELECT * FROM company_jobs ORDER BY post_date DESC LIMIT 0,5";
                            $run = mysqli_query($connection, $query);
                            while($row = mysqli_fetch_array($run)){
                                $job_id = $row['job_id'];
                                $job_title = $row['job_title'];
                        ?>                
                        
                        <tr>
                            <td class="job_title"><?php echo $job_title; ?></td>
                            <td><span class="badge"><?php echo countLatestJobs($job_id); ?></span><br/>
                                        <span class="text">apps</span>
                            </td>
                        </tr>
                            <?php } ?>
        
                        </table>
                  </div>  
               </div>
            </div>

            </div>
            <div id="latest_employers" class="col-md-4 col-sm-4 col-xs-4">
   
				<div class="panel panel-info">
                   	<div class="panel-heading">
                       	<label class="panel-title"><span class="glyphicon glyphicon-user"></span> Latest Employers</label>
                     </div>
                     <div class="panel-body">
                        <table border="0" class="table table-condensed" align="center">
               		    <?php
           
							$get_empl = "SELECT * FROM employers ORDER BY creation_date DESC LIMIT 0,5";
							$run_empl = mysqli_query($connection, $get_empl);
							while($row_empl = mysqli_fetch_array($run_empl)){
								$comp_id = $row_empl['comp_id'];
								$comp_name = $row_empl['comp_name'];
						?>	

                        <tr>
                        	<td class="job_title"><?php echo $comp_name; ?></td>
                            <td>
                               <span class="badge"><?php echo counttotalEmpJobs($comp_id); ?></span><br/>
                        	   <span class="text">jobs</span>
                            </td>
                        </tr>
                       
                        <?php } ?>
        
                        </table>
					 </div>    
               </div>


            </div>
            <div id="latest_apps" class="col-md-4 hidden-sm hidden-xs">
               	<div class="panel panel-info">
                   	<div class="panel-heading">
                       	<label class="panel-title"><span class="glyphicon glyphicon-user"></span> Latest Applications</label>
                     </div>
                     <div class="panel-body">
                        <table class="table table-condensed">
						<?php
           
							$query1 = "SELECT distinct(mem_id) FROM jobs_apply ORDER BY apply_date DESC LIMIT 0,5";
							$run1 = mysqli_query($connection, $query1);
							while($row1 = mysqli_fetch_array($run1)){
								$mem_id = $row1['mem_id'];
								
							$query2 = "SELECT * FROM members WHERE mem_id = '$mem_id'";
							$run2 = mysqli_query($connection, $query2);
							$row2 = mysqli_fetch_array($run2);
								$first_name = $row2['mem_first_name'];
								$last_name = $row2['mem_last_name'];
								$mem_email = $row2['mem_email'];
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
            
        </div>
        <!--
        <div id="bottom">
        	<div id="last_login">Last Login: </div>
         </div>  -->  
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
<?php } ?>