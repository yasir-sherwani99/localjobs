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
    <link rel="stylesheet" type="text/css" href="styles/third_style.css" />
    <link href="styles/ddmenu.css" rel="stylesheet" type="text/css" />
    <script src="js/ddmenu.js" type="text/javascript"></script>
    <script src="js/respond.js"></script>
</head>

<body>

<div class="container">

	<!-- This is top bar -->
	<div id="topbar" class="row">
		<div id="topleft" class="col-md-5 col-sm-5 col-xs-12">
			<ul>
            <?php
        		if(!isset($_SESSION['username'])){
					echo "<li><b>Welcome: </b>Please</li>";
					echo "<li><a href='jobseeker_signin.php' style='color: blue;'>Sign In</a> to continue</li>";
				}else{
					echo "<li><b>Welcome: </b>" . $_SESSION['mem_first_name'] . "&nbsp;" .$_SESSION['mem_last_name'] . "</li>";
					echo "<li><a href='members_logout.php' style='color: blue;'>Signout</a></li>";
				}
			?> 
            </ul>   
        </div>
        <div id="topright" class="col-md-3 col-md-offset-4 col-sm-4 col-sm-offset-3 hidden-xs">
        If you are a Employer? <a href="employers/index.php" target="_blank" style='color: blue;'>Click here</a>
        </div>
	</div>

	<!-- This is header -->
	<div id="header" class="row">
		<img src="images/blue1.png" style="border: 1px solid #FFF;" class="img-responsive" alt="Responsive image"/>
    </div>
        <!-- This is navigation bar -->

	<nav id="ddmenu" class="row">
        <?php include("includes/top-nav.php"); ?>
	</nav>

	<!-- This is start of main content area -->
	<div id="contents" class="row">
    
        <div id="alljobs_leftside" class="col-md-3 col-sm-3 hidden-xs">
        	<h3>JOBS BY <span style="color: #F00;">COMPANIES</span></h3>
                   
						<ul>
                        <?php
							$top_comp = "select * from employers order by rand()";
							$run_comp = mysqli_query($connection, $top_comp);
				
								while($row_comp = mysqli_fetch_array($run_comp)){
									$comp_id = $row_comp['comp_id'];
									$comp_name = $row_comp['comp_name'];
					
			  			?>		
							<a href='company_details.php?comp_id=<?php echo $comp_id; ?>'>
							<li>
 	     	                      <?php echo $comp_name; ?>
    	    	                  <?php echo "<span style='color: black;'>(" . countCompanyJobs($comp_id) . ")</span><br/>"; ?>
 
                            </li>
                            </a>
                            <?php	}   ?>
						</ul> 

        </div>

    	<div id="all_jobs" class="col-md-9 col-sm-9 col-xs-12">
        	<?php
				if(isset($_GET['comp_id'])){
					$comp_id1 = $_GET['comp_id'];
					$get_company = "SELECT * FROM employers WHERE comp_id = '$comp_id1'";
					$run_company = mysqli_query($connection, $get_company);
					$row_company = mysqli_fetch_array($run_company);
						$comp_title = $row_company['comp_name'];  
				}  
            ?>
        	<h1 style="border-bottom: 2px solid #036; margin-left: 5px;"><?php echo $comp_title; ?>&nbsp;<span style="color: #F00;">Jobs</span></h1>
        	<?php					
					if(isset($_GET['comp_id'])){
						
						$com_id = $_GET['comp_id'];
						
						$page = (int)(!isset($_GET["page"]) ? 1 : $_GET["page"]);
						if ($page <= 0) $page = 1;
 
						$per_page = 10; // Set how many records do you want to display per page.
 
						$startpoint = ($page * $per_page) - $per_page;
 
						$statement = "company_jobs WHERE comp_id = '$com_id' ORDER BY post_date DESC"; // Change `records` according to your table name.
						$results = mysqli_query($connection,"SELECT * FROM {$statement} LIMIT {$startpoint} , {$per_page}");

		// pagination end
		
			//			if (mysqli_num_rows($results) != 0) {

  						
  //      				$get_cat_job = "SELECT * FROM jobs WHERE cat_id = '$cat_id'";
	//					$run_cat_job = mysqli_query($connection, $get_cat_job);
						$count = mysqli_num_rows($results);
						if($count == 0){
							echo "<h4 style='border: 0px solid red; margin-left: 10px; margin-top: 10px; font-weight: bold; color: red;'>No Job found in this company!</h4>";
						}
						else{
					while($row_cat_job = mysqli_fetch_array($results)){
						$job_id = $row_cat_job['job_id'];
						$job_title = $row_cat_job['job_title'];
						$job_post_date = date("d F Y", strtotime($row_cat_job['post_date']));
						$comp_id = $row_cat_job['comp_id'];
						$job_location = $row_cat_job['job_location'];
						$job_desc = substr($row_cat_job['job_desc'],0,150);
						
							$get_city = "SELECT * FROM city WHERE city_id = '$job_location'";
							$run_city = mysqli_query($connection, $get_city);
							$row_city = mysqli_fetch_array($run_city);
								$city_id = $row_city['city_id'];
								$city_title = $row_city['city_name'];
								
							$get_company = "SELECT * FROM employers WHERE comp_id = '$comp_id'";
							$run_company = mysqli_query($connection, $get_company);
							$row_company = mysqli_fetch_array($run_company);
								$cid = $row_company['comp_id'];
								$cname = $row_company['comp_name'];
					
					echo "
						<div id='category_all_jobs' class='row'>
							<h3>$job_title </h3>
							<h4>$cname - <span> $city_title</span></h4>
							<h2>Posted: $job_post_date</h2>
							
							<h5>$job_desc
							<a href='job_details.php?job_id=$job_id'>View Details</a></h5>
	
						</div>
						";
					}
				}
				}
					
				?>
                <div style='border: 0px solid red; margin-left: 8px;' class='row'>
        		<?php
        			echo pagination($statement,$per_page,$page,$url='?');
				?>
        		</div>
        </div>
    	
	</div>
    <!-- Main Content Ends -->
    
	<!-- This is side bar -->
<!--	<div id="sidebar">
		  
	</div>  -->
	
	<!-- This is footer -->
		<?php include("includes/footer_contents.php"); ?>
	
    
</div>

<!-- JavaScript-->
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
