<?php session_start(); ?>
<?php
	include("includes/connection.php");
	include("functions/functions.php");
	include("functions/profile_functions.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Local Jobs Pakistan</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="styles/index_style.css" />
    <link rel="stylesheet" type="text/css" href="styles/second_style.css" />
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
		<img src="images/blue1.png" style="border: 1px solid #FFF;" class="img-responsive" alt="Responsive image"/>
    </div>
        <!-- This is navigation bar -->
    <nav id="ddmenu" class="row">
          <?php include("includes/top-nav.php"); ?>
	</nav>

	<!-- This is start of main content area -->
	<div id="contents" style="border: 0px solid red;" class="row">
    
        
            <?php
				if(isset($_GET['updated'])){
					$update_mess = $_GET['updated'];
					echo "<div id='warning' style='width: 710px;'>
        					<img src='images/icons2/checkmark.png' width='18' height='18' style='float: left;'>
            				<span id='error'>&nbsp;$update_mess</span>
						 </div>";
				}
				if(isset($_GET['changed'])){
					$changed = $_GET['changed'];
					echo "<div id='warning' style='width: 690px;'>
        					<img src='images/icons2/checkmark.png' width='18' height='18' style='float: left;'>
            				<span id='error'>&nbsp;$changed</span>
						 </div>";
				}
            ?>
        
        
        <div id="account_left_side" class="col-md-3 col-sm-3 col-xs-3">
            <div id="dashboard" class="row">
                <?php include("includes/dashboard.php"); ?>
            </div>
        </div> 

		
        <div id="account_center" class="col-md-9 col-sm-6 col-xs-9">
        	<div id="search_jobs" class="row">
            	<div id="search_dash_box" class="row">
                	<?php include("includes/search.php"); ?>
            	</div>
            </div>
            
            <div class="panel panel-primary"> 
            	<div class="panel-heading">
            		<h3 class="panel-title" style="font-weight: bold;">SEARCH RESULTS</h3>
                </div>
                <div id="results" class="panel-body">
					<?php
                        if(isset($_POST['submit'])){
                        $user_keywords = $_POST['search'];
                                        
                        if($user_keywords == ""){
                            echo "<div id='single_search' class='row'>" . "<h3>Enter any keywords</h3>" . "</div>";
                        }else{
                                        
                         $get_jobs = "SELECT * FROM company_jobs WHERE job_keywords like '%$user_keywords%'";
                         $run_jobs = mysqli_query($connection, $get_jobs);
                         $count = mysqli_num_rows($run_jobs);
                         
                            if($count == 0){
                                
                            echo "<div id='single_search' class='row'>" . "<h3>No Job found in this category, Try another!</h3>" . "</div>";
                            }
                            
                             while($row_jobs = mysqli_fetch_array($run_jobs)){
                                 
                                $job_id = $row_jobs['job_id'];
                                $cat_job_id = $row_jobs['cat_id'];
                                $job_title = $row_jobs['job_title'];
                                $comp_id = $row_jobs['comp_id'];
                                
                                    $get_comp = "SELECT * FROM employers WHERE comp_id = '$comp_id'";
                                    $run_comp = mysqli_query($connection, $get_comp);
                                    $row_comp = mysqli_fetch_array($run_comp);
                                        $cid = $row_comp['comp_id'];
                                        $ctitle = $row_comp['comp_name'];
                                
                                echo "
                                    <div id='single_search' class='row'>
                                        <a href='job_details.php?job_id=$job_id'>
                                            <h3>$job_title</h3>
                                            <h4>$ctitle</h4>
                                        </a>
                                    </div>
                                    ";
                                }
                            }
      		              }
            		  ?>	
        
        	       </div>
			</div>
         </div>
    
    </div>
 <!--       <div id="ads_area">
        	<h1>Ads</h1>
        </div>  -->
    <!-- Main Content Ends -->
    
	<!-- This is side bar 
	<div id="sidebar1">
    	<h1>Ads</h1>
	</div>  -->
	
	<!-- This is footer -->
	
		<?php include("includes/footer_contents.php"); ?>
	   
</div>

<!-- JavaScript-->
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
