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
</head>

<body>
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
                    <td style="width: 25%;"><b>Applicant Name</b></td>
                    <td style="width: 75%;"><?php echo $memberFIRST . "&nbsp;" . $memberLAST; ?></td>
                </tr>
               <tr>
                    <td><b>Email</b></td>
                    <td style="color: #3333FF; font-weight: bold;"><?php echo $memberEMAIL; ?></td>
                </tr>
                 <tr>
                    <td><b>Mobile</b></td>
                    <td><?php echo "+" . $memberCELL; ?></td>
                </tr>
                <tr>
                	<td><b>Experience</b></td>
                    <td><?php echo $memberEXPyear . "&nbsp;years&nbsp;" . $memberEXPmonth . "&nbsp;months"; ?></td>
                </tr>
                <tr>
                	<td><b>Qualification</b></td>
                    <td><?php echo $memberDEGREE; ?></td>
                </tr>
                <tr>
                	<td><b>Institution</b></td>
                    <td><?php echo $memberINS; ?></td>
                </tr>
                <tr>
                	<td><b>Present Job</b></td>
                    <td><?php echo $memberJOB; ?></td>
                </tr>
				<tr>
                	<td><b>Present Employer</b></td>
                    <td><?php echo $memberCOMPANY; ?></td>
                </tr>
                <tr>
                	<td><b>Download CV</b></td>
                    <td><?php echo $memberCV; ?>&nbsp;
                    <a href="download.php?download_file=<?php echo $memberCV; ?>"><button class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-download-alt"></span> Download</button></a>
                    	
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