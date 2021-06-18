<?php session_start(); ?>
<?php
	include("includes/connection.php");
	include("functions/functions.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>THElocal Jobs</title>
    <link rel="stylesheet" type="text/css" href="styles/index_style.css" />
    <link rel="stylesheet" type="text/css" href="styles/third_style.css" >
    <link href="styles/ddmenu.css" rel="stylesheet" type="text/css" />
    <script src="js/ddmenu.js" type="text/javascript"></script>
</head>

<body>

<div id="container">

	<!-- This is top bar -->
	<div id="topbar">
		<div id="topleft">
        	<ul>
            	<li><a href="#">Directory Listing</a></li>
                <li><a href="#">Free Resume Search</a></li>
                <li><img src="images/buddy_chat.png" /><a href="#" style="padding-left: 30px;">Live Help</a></li>
            </ul>
        </div>
        <div id="topright">
        If you are a Employer? <a href="#">Click here</a>
        </div>
	</div>

	<!-- This is header -->
	<div id="header">
		<img src="images/localjobs_logo.png"/>
    </div>
        <!-- This is navigation bar -->
    <nav id="ddmenu">
     <!--   <div id="nav">
        	<ul>
                <li><a href="index.php" style="background-color: #6B8E23; color: #FFF;">HOME</a></li>
                <li><a href="my_account.php">DASH BOARD</a></li>
                <li><a href="search_result.php">SEARCH</a></li>
                <li><a href="members_register.php">POST RESUME</a></li>
                <li><a href="#">EMPLOYERS</a></li>
        	</ul>
    	</div>  -->
        <?php include("includes/top-nav.php"); ?>
	</nav>

	<!-- This is start of main content area -->
	<div id="contents" style="width: 850px;">
        	<div id="all_jobs">
<?php

			$job_id = $_GET['job_id'];
        	$get_jobs = "SELECT * FROM company_jobs WHERE job_id = '$job_id'";
			$run_jobs = mysqli_query($conn, $get_jobs);
			$row_jobs = mysqli_fetch_array($run_jobs);
					$job_id = $row_jobs['job_id'];
					$cat_job_id = $row_jobs['cat_id'];
					$job_title = $row_jobs['job_title'];
					$job_positions = $row_jobs['vacancies'];
					$job_type = $row_jobs['emp_status'];
					$job_company = $row_jobs['company_name'];
					$job_location = $row_jobs['job_location'];
					$job_min_exp = $row_jobs['min_exp'];
					$job_max_exp = $row_jobs['max_exp'];
					$job_skills = $row_jobs['job_skills'];
					$job_qual = $row_jobs['job_qual'];
					$job_desc = $row_jobs['job_desc'];
					$post_date = $row_jobs['post_date'];
					$job_expiry_date = $row_jobs['expiry_date'];
					$job_comp_email = $row_jobs['company_email'];
					$job_contact_name = $row_jobs['contact_name'];
					
			echo "<div id='job_title' style='width: 820px;'>Job: $job_title at $job_company , $job_location </div>";		
			
				
					$member = $_SESSION['username'];
					$get_member = "SELECT * FROM members WHERE mem_email = '$member'";
					$run_member = mysqli_query($conn, $get_member);
					$row_member = mysqli_fetch_array($run_member);
						$mem_id = $row_member['mem_id'];
						$mem_first_name = $row_member['mem_first_name'];
						$mem_last_name = $row_member['mem_last_name'];
						$mem_cell = $row_member['mem_cell'];
						
			echo "<div id='warning' style='width: 828px; height: auto; margin-left: 10px;'>
        	<img src='images/correct.gif'>&nbsp;Your application has been submitted successfully.<br/>
			<span style='margin-left: 20px;'>Employer may contact you on $mem_cell</span> 
        		</div>";
					
		$get_category = "SELECT * FROM categories WHERE cat_id = '$cat_job_id'";
		$run_category = mysqli_query($conn, $get_category);
		$row_category = mysqli_fetch_array($run_category);
			$cat_title = $row_category['cat_title'];
		
		echo "
			<div style='width: 831px; height: 500px; margin-top: 0px; margin-left: 10px; border: 1px solid #F5F5F5; background-color: #FFF;'>
			<p style='background-color: #6B8E23; margin-top: 0px; border-radius: 5px; padding: 3px; color: #FFF;'>Job Detail<span style='margin-left: 450px;'>More Jobs From: $cat_title<a href='#' style='color: #FFF;'></a></span></p>
			
			<table cellpadding='5' style='border: 0px solid red; width: 425px; float: left;'>
				<tr>
					<td style='font-weight: bold;'>Industry</td>
					<td>$cat_title</td>
				</tr>
				<tr>
					<td style='font-weight: bold;'>Company</td>
					<td>$job_company</td>
				</tr>
				<tr>
					<td style='font-weight: bold;'>Job Location</td>
					<td>$job_location</td>
				</tr>
				<tr>
					<td style='font-weight: bold;'>Number of Vacancies</td>
					<td>$job_positions</td>
				</tr>
				<tr>
					<td style='font-weight: bold;'>Job Type</td>
					<td>$job_type</td>
				</tr>
				<tr>
					<td style='font-weight: bold;'>Experience</td>
					<td>$job_min_exp . to . $job_max_exp . years</td>
				</tr>
				<tr>
					<td style='font-weight: bold;'>Apply By</td>
					<td>$job_expiry_date</td>
				</tr>
				<tr>
					<td style='font-weight: bold;'>Job Posting Date</td>
					<td>$post_date</td>
				</tr>
				
			</table>
			
			<div style='border: 2px solid #F5F5F5; width: 355px; height: auto; margin-top: 10px; margin-left: 440px; padding: 10px; font-size: 14px;'><span style='color: #OOO; font-weight: bold; padding: 0px; font-size:16px;'>Job Description:</span><br/><br/>$job_desc<br/><br/>$job_skills
			</div>
			<hr style='border-width: 1px; clear: both; margin-top: 25px;'>
				
			</div>
		";		
		

 ?>
        </div>

    	

	</div>
    <!-- Main Content Ends -->
    
	<!-- This is side bar -->
	<div id="sidebar">
		  
	</div>
	
	<!-- This is footer -->
	<div id="footer">
		<?php include("includes/footer_contents.php"); ?>
	</div>
    
</div>

</body>
</html>
