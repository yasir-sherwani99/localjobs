<?php session_start(); ?>
<?php
	include("includes/connection.php");
	include("functions/functions.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Walkin Interviews | Walkin Interviews in Pakistan | Latest Walkin Interviews in Pakistan</title>
    	<meta name="keywords" content="Walkin Interviews | Walkin Interviews in Pakistan | Latest Walkin Interviews in Pakistan" />
	<meta name="description" content="Information about Latest Walkin interviews in Pakistan" />
	<link href="images/logo_small.png" type="image/gif" rel="shortcut icon" />
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
    	<?php include("includes/top_bar.php"); ?>
	</div>

	<!-- This is header -->
	<div id="header" class="row">
		<?php include("includes/header.php"); ?>
    </div>
        <!-- This is navigation bar -->

	<nav id="ddmenu" class="row">
        <?php include("includes/top-nav.php"); ?>
	</nav>

	<!-- This is start of main content area -->
	<div id="contents" class="row">
    
        <div id="alljobs_leftside" class="col-md-3 col-sm-3 hidden-xs">
        	<h3>WALK-IN INTERVIEWS BY <span style="color: #F00;">CITY</span></h3>
                   
						<ul>
                        <?php
							$top_city = "select * from city order by rand()";
							$run_top = mysqli_query($connection, $top_city);
				
								while($row_top = mysqli_fetch_array($run_top)){
									$city_id = $row_top['city_id'];
									$city_name = $row_top['city_name'];
					
			  			?>		
							<a href='walkin_city_jobs.php?city_id=<?php echo $city_id; ?>'>
							<li>
 	     	                      <?php echo $city_name; ?>
    	    	                  <?php echo "<span style='color: black;'>(" . countWalkinCityJobs($city_id) . ")</span><br/>"; ?>
 
                            </li>
                            </a>
                            <?php	}   ?>
						</ul> 

        </div>

    	<div id="all_jobs" class="col-md-9 col-sm-9 col-xs-12">
        	<?php
				if(isset($_GET['city_id'])){
					$city_id1 = $_GET['city_id'];
					$get_city = "SELECT * FROM city WHERE city_id = '$city_id1'";
					$run_city = mysqli_query($connection, $get_city);
					$row_city = mysqli_fetch_array($run_city);
						$city_title = $row_city['city_name'];  
				}  
            ?>
        	<h1 style="border-bottom: 2px solid #036; margin-left: 5px;"><?php echo $city_title; ?>&nbsp;<span style="color: #F00;">Walk-In Interviews</span></h1>
        	<?php					
					if(isset($_GET['city_id'])){
						
						$city_id = $_GET['city_id'];
						
						$page = (int)(!isset($_GET["page"]) ? 1 : $_GET["page"]);
						if ($page <= 0) $page = 1;
 
						$per_page = 20; // Set how many records do you want to display per page.
 
						$startpoint = ($page * $per_page) - $per_page;
 
						$statement = "walk_interview WHERE wlocation = '$city_id' ORDER BY post_date DESC"; // Change `records` according to your table name.
						$results = mysqli_query($connection,"SELECT * FROM {$statement} LIMIT {$startpoint} , {$per_page}");

		// pagination end
		
			//			if (mysqli_num_rows($results) != 0) {

  						
  //      				$get_cat_job = "SELECT * FROM jobs WHERE cat_id = '$cat_id'";
	//					$run_cat_job = mysqli_query($connection, $get_cat_job);
						$count = mysqli_num_rows($results);
						if($count == 0){
							echo "<h4 style='border: 0px solid red; margin-left: 10px; margin-top: 10px; font-weight: bold; color: red;'>No Walk-In Interview found in this city!</h4>";
						}
						else{
					while($row_wcity_job = mysqli_fetch_array($results)){
						$wjob_id = $row_wcity_job['wjob_id'];
						$wjob_title = $row_wcity_job['wjob_title'];
					//	$wjob_post_date = date("d F Y", strtotime($row_wcity_job['post_date']));
						$wcomp = $row_wcity_job['wcompany'];
						$wjob_location = $row_wcity_job['wlocation'];
						$winterview_day = $row_wcity_job['winterview_day'];
						$winterview_month = $row_wcity_job['winterview_month'];
						$winterview_year = $row_wcity_job['winterview_year'];
						
						
							$get_city1 = "SELECT * FROM city WHERE city_id = '$wjob_location'";
							$run_city1 = mysqli_query($connection, $get_city1);
							$row_city1 = mysqli_fetch_array($run_city1);
								$new_city_id = $row_city1['city_id']; 
								$new_city_title = $row_city1['city_name'];
								
					
					echo "
						<div id='category_all_jobs' class='row'>
							<h3><a style='color: #00F;' href='walkin_details.php?walk_id=$wjob_id' target='_blank'>$wjob_title </a></h3>
							<h4>$wcomp - <span> $new_city_title</span></h4>
							<h2>Interview Date: $winterview_day - $winterview_month - $winterview_year</h2>
							
							
						</div>
						";
					}
				}
				}
					
				?>
                <div style='border: 0px solid red; margin-left: 8px;' class='row'>
        		<?php
        			echo walkin_pagination($statement,$per_page,$page,$url='?',$wjob_location);
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