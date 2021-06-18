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
        	<h3>JOBS BY <span style="color: #F00;">CATEGORIES</span></h3>
                   
						<ul>
                        <?php
							$top_cats = "select * from categories order by rand()";
							$run_top = mysqli_query($connection, $top_cats);
				
								while($row_top = mysqli_fetch_array($run_top)){
									$cat_id = $row_top['cat_id'];
									$cat_name = $row_top['cat_title'];
					
			  			?>		
							<a href='cat_details.php?cat_id=<?php echo $cat_id; ?>'>
							<li>
 	     	                      <?php echo $cat_name; ?>
    	    	                  <?php echo "<span style='color: black;'>(" . countCategoryJobs($cat_id) . ")</span><br/>"; ?>
 
                            </li>
                            </a>
                            <?php	}   ?>
						</ul> 

        </div>

    	<div id="all_jobs" class="col-md-9 col-sm-9 col-xs-12">
        	<?php
				if(isset($_GET['cat_id'])){
					$cat_id1 = $_GET['cat_id'];
					$get_category = "SELECT * FROM categories WHERE cat_id = '$cat_id1'";
					$run_category = mysqli_query($connection, $get_category);
					$row_category = mysqli_fetch_array($run_category);
						$cat_title = $row_category['cat_title'];  
				}  
            ?>
        	<h1 style="border-bottom: 2px solid #036; margin-left: 5px;"><?php echo $cat_title; ?>&nbsp;<span style="color: #F00;">Jobs</span></h1>
        	<?php					
					if(isset($_GET['cat_id'])){
						
						$cat_id = $_GET['cat_id'];
						
						$page = (int)(!isset($_GET["page"]) ? 1 : $_GET["page"]);
						if ($page <= 0) $page = 1;
 
						$per_page = 10; // Set how many records do you want to display per page.
 
						$startpoint = ($page * $per_page) - $per_page;
 
						$statement = "company_jobs WHERE cat_id = '$cat_id' ORDER BY post_date DESC"; // Change `records` according to your table name.
						$results = mysqli_query($connection,"SELECT * FROM {$statement} LIMIT {$startpoint} , {$per_page}");

		// pagination end
		
			//			if (mysqli_num_rows($results) != 0) {

  						
  //      				$get_cat_job = "SELECT * FROM jobs WHERE cat_id = '$cat_id'";
	//					$run_cat_job = mysqli_query($connection, $get_cat_job);
						$count = mysqli_num_rows($results);
						if($count == 0){
							echo "<h4 style='border: 0px solid red; margin-left: 10px; margin-top: 10px; font-weight: bold; color: red;'>No Job found in this category!</h4>";
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
        			echo pak_cat_pagination($statement,$per_page,$page,$url='?',$cat_id);
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