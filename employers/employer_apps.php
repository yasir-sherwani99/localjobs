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
	<link href="../images/logo_small.png" type="image/gif" rel="shortcut icon" />
    <link href="css/bootstrap.min.css" rel="stylesheet" />
	<link rel="stylesheet" type="text/css" href="styles/emp_main_panel_style.css" />
    <script src="js/respond.js"></script>
	<script type="text/javascript" src="js/js_functions.js"></script>
</head>

<body>
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
	}

?>
<div class="container">
	<!-- This is top bar -->
	<div id="topbar" class="row">
    	<?php include("includes/top_bar.php"); ?>
	</div>

	<!-- Header area starts -->
    <div id="header" class="row">
    	<?php include("includes/header.php"); ?>
    </div>
    <!-- Header area ends -->

	<div class="row">
     	<?php include("includes/navigation_main.php"); ?>
    </div>	

	<div class="row">

        <!-- Left side area starts -->
		 <div id="left_side_area" class="col-md-3 col-sm-3 col-xs-3">
            <!-- Navigation area starts -->
            <?php include("includes/employer_dashboard.php"); ?>
        
        </div>
        
        <!-- Main contents area starts -->
        
        <div id="contents" style="padding-top: 10px;" class="col-md-9 col-sm-9 col-xs-9">
            <div id="tab" class="row">
                <ul class="nav nav-tabs">
                    <li class="active" style="font-weight: bold;"><a href="employer_apps.php">Member's Applications</a></li>
                    <li><a href="employer_quick_apps.php">Non-Member's Applications</a></li>
                </ul>
            </div>
            <div id="search_job" style="height: 30px;" class="row">
                <form name="" method="post" action="" class="role pull-left">
                    <input type="search" name="search" placeholder="Search" style="width: 200px; float: left;" class="form-control"/>&nbsp;
                    <input type="submit" name="submit" class="btn btn-default btn-sm" value="Search" style="font-size: 14px;" />
                </form>  
                <button class="btn btn-default pull-right" disabled="disabled">Total Applications <span class="badge"><?php echo countEmployerApps($comp_id); ?></span></button>
            </div>
            <?php
          
                 if(isset($_GET['updated'])){
                     $updated = $_GET['updated'];
                     echo "<div id='message' class='alert alert-success' alert-dismissable>
					 		<button type='button' class='close' data-dismiss='alert' aria-hidden='true'> &times; </button>
                            <img src='images/checkmark.png' width='25' height='25'/>
                            <div id='aa'>$updated</div>
                    </div>"; 
                 }
                 
            ?>
    
            <div id="all_jobs" style="background-color:#FFF; font-size: 14px;" class="row">
               <div class="table-responsive"> 
                <table class="table table-bordered table-condensed">
                	<thead>
                    <tr class="active">
                        <th style="width: 5%;">Sr.No</th>
                        <th style="width: 21%;">Applicant</th>
                        <th style="width: 25%;">Resume Headline</th>
                        <th style="width: 22%;">Job Title</th>
                        <th style="width: 12%;">Apply Date</th>
                        <th style="width: 10%;">Status</th>
                        <th style="width: 5%;"></th>
                    </tr>
                    </thead>
                    <?php
                    
                    // pagination start
                    $page = (int)(!isset($_GET["page"]) ? 1 : $_GET["page"]);
                    if ($page <= 0) $page = 1;
     
                    $per_page = 7; // Set how many records do you want to display per page.
     
                    $startpoint = ($page * $per_page) - $per_page;
     
                    $statement = "jobs_apply WHERE comp_id = '$comp_id' ORDER BY apply_date DESC"; // Change `records` according to your table name.
      
                    $results = mysqli_query($connection,"SELECT * FROM {$statement} LIMIT {$startpoint} , {$per_page}");
                    
                    if (mysqli_num_rows($results) != 0) {
                    
                    $i = 1;
                    while($row_jobs = mysqli_fetch_array($results)){
        
                            $apply_id = $row_jobs['apply_id'];
                            $job_id = $row_jobs['job_id'];
                       
                            $mem_id = $row_jobs['mem_id'];
                         //   $apply_date = $row_jobs['apply_date'];
							$apply_date = date("d M Y", strtotime($row_jobs['apply_date']));
                            $job_status = $row_jobs['job_status'];
							$emp_notes = $row_jobs['notes'];
                            
                            $get_mem = "SELECT * FROM members WHERE mem_id = '$mem_id'";
                            $run_mem = mysqli_query($connection, $get_mem);
                            $row_mem = mysqli_fetch_array($run_mem);
                                $mem_first_name = $row_mem['mem_first_name'];
								$mem_last_name = $row_mem['mem_last_name'];
                                $mem_email = $row_mem['mem_email'];
								$mem_city = $row_mem['mem_city'];
								$mem_other_city = $row_mem['mem_city_other'];
								$mem_country = $row_mem['mem_country'];
								$resume_headline = $row_mem['cv_headline'];
								
							$get_title = "SELECT * FROM company_jobs WHERE job_id = '$job_id'";
							$run_title = mysqli_query($connection, $get_title);
							$row_title = mysqli_fetch_array($run_title);
								$job_title = $row_title['job_title'];
								
								$get_city = "SELECT * FROM city WHERE city_id = '$mem_city'";
								$run_city = mysqli_query($connection, $get_city);
								$row_city = mysqli_fetch_array($run_city);
									$city_name = $row_city['city_name'];
									
								$get_ctry = "SELECT * FROM countries WHERE ctry_id = '$mem_country'";
								$run_ctry = mysqli_query($connection, $get_ctry);
								$row_ctry = mysqli_fetch_array($run_ctry);
									$crty_name = $row_ctry['ctry_name'];	
                    ?>
                    <tbody>
                    <tr>
                        <td rowspan="2" style="text-align: center; vertical-align:middle;"><?php echo $i++; ?></td>
                        <td>
							<span style='font-weight: bold;'><?php echo $mem_first_name . "&nbsp;" . $mem_last_name; ?></span><br/>
                            <?php 
								if($mem_city == "-1"){
									echo $mem_other_city . " , " . $crty_name;	
								}else{
									echo $city_name . " , " . $crty_name;
								}
							?>
                        </td>
                        <td><?php echo $resume_headline; ?></td>
                        <td><?php echo $job_title; ?></td>
                        <td><?php echo $apply_date; ?></td>
                        <td style="font-weight: bold;"><?php echo $job_status; ?></td>
                        <td align="center">
                        <a href="view_empl_application.php?apply_id=<?php echo $apply_id; ?>" style="line-height: 25px;"><button class="btn btn-success btn-xs" style="width: 84px;" title="Application Tracking..."><span class="glyphicon glyphicon-flash"></span>Action</button></a>
                        <a href="employer_job_notes.php?apply_id=<?php echo $apply_id; ?>"><button class="btn btn-success btn-xs"><span class="glyphicon glyphicon-pencil"></span> Add Notes</button></a>
                        </td>
                    </tr>
     
                    <?php
						if($emp_notes != ""){
							echo "<tr>
								
								<td colspan='6'><label style='color: #F00;'>Notes:</label> <span style='color: #00F;'>$emp_notes</span><a href='delete_note.php?apply_id=$apply_id'><button type='button' class='close' style='margin-right: 5px;' title='Delete Notes...'> &times; </button></a></td>
							</tr>";
						}
						else{
						}
                    ?>
                
                    </tbody>
                    <?php } } else{ echo "No records are found."; } ?>
                    <tfoot>
                    <tr>
                        <td colspan="7"><?php echo pagination($statement,$per_page,$page,$url='?'); ?></td>
                        
                    </tr>
                    </tfoot>
                </table>
              </div>
              
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
</body>
</html>
<?php } ?>