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
    <script src="js/respond.js"></script>
</head>

<body>
<div class="container">
	<!-- This is top bar -->
	<div id="topbar" class="row">
    	<?php include("includes/top_bar.php"); ?>
	</div>

	<!-- Header area starts -->
    <div id="header" class="row">
    	<img src="images/logo.png" />
    </div>
    <!-- Header area ends -->
    
    <div class="row">
     	<?php include("includes/navigation_main.php"); ?>
    </div>	
 
<div class="row">   
    <!-- Left side area starts -->
    <div id="left_side_area" class="col-md-3 col-sm-3 col-xs-3">
    
	    <!-- Navigation area starts -->
        <div id="nav" class="row">
            <div class="btn-group-vertical">
            
                <a href="main_panel.php"><button class="btn btn-default"><img src="images/clock.png" />Dashboard</button></a>
                <a href="employer_jobs.php"><button class="btn btn-default"><img src="images/icons/list.png" />Jobs</button></a>
                <a href="employer_apps.php"><button class="btn btn-default"><img src="images/icons/folder.png" />Applications</button></a>
                <a href="employer_profile.php"><button class="btn btn-default"><img src="images/icons/group.png" />Profile</button></a>
                <a href="employer_search.php"><button class="btn btn-info"><img src="images/icons/administrator.png" />Search</button></a>
                <a href="#"><button class="btn btn-default"><img src="images/icons/administrator.png" />Saved Resume</button></a>
                <a href="#"><button class="btn btn-default"><img src="images/icons/spreadsheet.png" />Reports</button></a>
                <a href="employer_change_pass.php"><button class="btn btn-default"><img src="images/icons/screwdriver.png" />Options</button></a>
                <a href="employer_logout.php"><button class="btn btn-default"><img src="images/icons/login.png" />Logout</button></a>
            </div>
        </div>
        
    </div>
        
    <!-- Main contents area starts -->
    
    <div id="contents" style="border: hidden;" class="col-md-9 col-sm-9 col-xs-9">
    	<div id="tab" class="row">
        	<ul class="nav nav-tabs">
            	<li><a href="employer_search.php">Search Applicant</a></li>
                <li class="active" style="font-weight: bold;"><a href="#">View Applicant</a></li>
            </ul>
        </div>

        <div id="all_jobs" style="height: auto; background-color:#FFF; font-size: 14px;" class="row">
        
        	<table class="table table-bordered">
            <?php
				$memId = $_GET['mem_id'];
					
					$get_member = "SELECT * FROM members WHERE mem_id = '$memId'";
					$run_member = mysqli_query($connection, $get_member);
					$row_member = mysqli_fetch_array($run_member);
						$memberID = $row_member['mem_id'];
						$memberFIRST = $row_member['mem_first_name'];
						$memberLAST = $row_member['mem_last_name'];
						$memberEMAIL = $row_member['mem_email'];
						$memberCELL = $row_member['mem_cell'];
						$memberDEGREE = $row_member['degree_title'];
						$memberINS = $row_member['institution'];
						$memberEXPyear = $row_member['mem_exp_year'];
						$memberEXPmonth = $row_member['mem_exp_month'];
						$memberJOB = $row_member['current_job'];
						$memberCOMPANY = $row_member['comp_name'];
						$memberCV = $row_member['mem_cv'];
            ?>
            	<tbody>
                <tr>
                    <td style="width: 150px;">Applicant Name</td>
                    <td><?php echo $memberFIRST . "&nbsp;" . $memberLAST; ?></td>
                </tr>
               <tr>
                    <td>Email</td>
                    <td style="color: #3333FF; font-weight: bold;"><?php echo $memberEMAIL; ?></td>
                </tr>
                 <tr>
                    <td>Mobile</td>
                    <td><?php echo "+" . $memberCELL; ?></td>
                </tr>
                <tr>
                	<td>Experience</td>
                    <td><?php echo $memberEXPyear . "&nbsp;years&nbsp;" . $memberEXPmonth . "&nbsp;months"; ?></td>
                </tr>
                <tr>
                	<td>Qualification</td>
                    <td><?php echo $memberDEGREE; ?></td>
                </tr>
                <tr>
                	<td>Institution</td>
                    <td><?php echo $memberINS; ?></td>
                </tr>
                <tr>
                	<td>Present Job</td>
                    <td><?php echo $memberJOB; ?></td>
                </tr>
				<tr>
                	<td>Present Employer</td>
                    <td><?php echo $memberCOMPANY; ?></td>
                </tr>
                <tr>
                	<td>View CV</td>
                    <td><?php echo $memberCV; ?>&nbsp;
                    	<span> <a href="#">Preview</a> | <a href="download.php?download_file=<?php echo $memberCV; ?>">Download</a></span>
                    </td>
                </tr>
                </tbody>
            </table>
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

<!-- JavaScript-->
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
<?php } ?>
