<?php session_start(); ?>
<?php
	include("includes/connection.php");
	include("functions/jobdetail_functions.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>THElocal Jobs</title>
    <link rel="stylesheet" type="text/css" href="styles/index_style.css" />
    <link rel="stylesheet" type="text/css" href="styles/third_style.css" />
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
		<img src="images/localjobs_logo.png" />
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
				
		//	if(isset($_POST['apply'])){
		
				$get_job_id = $_GET['job_id'];
		
					if(isset($_SESSION['username'])){
						$username = $_SESSION['username'];
							
					$query = "SELECT * FROM company_jobs WHERE job_id = '$get_job_id'";
					$run = mysqli_query($connection, $query);
					$row = mysqli_fetch_array($run);
						$job_id = $row['job_id'];
						$job_title = $row['job_title'];
						$comp_id = $row['comp_id'];
					//	$comp_name = $row['company_name'];
					//	$post_date = $row['post_date'];
						$expiry_date = $row['expiry_date'];
												
					$get_company = "SELECT * FROM employers WHERE comp_id = '$comp_id'";
					$run_company = mysqli_query($connection, $get_company);
					$row_company = mysqli_fetch_array($run_company);
						$cid = $row_company['comp_id'];
						$cname = $row_company['comp_name'];

				
					$get_mem = "SELECT * FROM members WHERE mem_email = '$username'";
					$run_mem = mysqli_query($connection, $get_mem);
					$row_mem = mysqli_fetch_array($run_mem);
						$mem_id = $row_mem['mem_id'];
						$job_status = 'Received';
					
					$insert_record = "INSERT INTO jobs_apply(job_id, job_title, comp_id, company, mem_id, apply_date, expiry_date, job_status) VALUES ('$get_job_id', '$job_title', '$cid', '$cname', '$mem_id', NOW(), '$expiry_date', '$job_status')";
				
					$run_record = mysqli_query($connection, $insert_record);
				
				if($run_record){
					echo "<script>window.alert('Your application has been submitted successfully!')</script>";
					echo "<script>window.open('applied.php?job_id=$get_job_id', '_self')</script>";
				}
			
					
				}else{
			
						//echo jobApply();
					//	echo apply4Job();
					
					echo "<script>window.open('jobseeker_login.php?job_id=$get_job_id','_self')</script>";
					}
			//	}
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
<?php
//	session_start();
//	include("includes/connection.php");
//	include("functions/jobdetail_functions.php");
	
	if(isset($_POST['apply'])){
	
			$job_id = $_GET['job_id'];
		
			if(isset($_SESSION['username'])){
				$username = $_SESSION['username'];
				
				$get_mem = "SELECT * FROM members WHERE mem_email = '$username'";
				$run_mem = mysqli_query($connection, $get_mem);
				$row_mem = mysqli_fetch_array($run_mem);
					$mem_id = $row_mem['mem_id'];
					$job_status = 'Pending';
					
				$get_job = "SELECT * FROM jobs WHERE job_id = '$job_id'";
				$run_job = mysqli_query($connection, $get_job);
				$row_job = mysqli_fetch_array($run_job);
					$job_title = $row_job['job_title'];
					$job_company = $row_job['job_company'];
					$expiry_date = $row_job['expiry_date'];
					
				$insert_record = "INSERT INTO jobs_apply(job_id, job_title, company, mem_id, apply_date, expiry_date, job_status) VALUES ('$job_id', '$job_title', '$job_company', '$mem_id', NOW(), '$expiry_date', '$job_status')";
				
				$run_record = mysqli_query($connection, $insert_record);
				
				if($run_record){
					echo "<script>window.alert('Your application has been submitted successfully!')</script>";
					echo "<script>window.open('applied.php?job_id=$job_id', '_self')</script>";
				}else{
					die("database query has failed" . mysqli_error());
				}
			}
	}
?>
