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
            	<li class="active" style="font-weight: bold;"><a href="employer_search.php">Search Applicant</a></li>
            </ul>
        </div>
        <?php
			if(isset($_GET['updated'])){
				$edit = $_GET['updated'];
				echo "<div id='message' class='alert alert-info'>
        			  	<img src='images/info.png' width='45' height='45'/>
            		 	<div id='aa'><b>Congratulations...</b><br/>$edit</div>
        			  </div>";
			} else {
				echo "<div id='message' class='alert alert-info'>
        				<img src='images/info.png' width='45' height='45'/>
            		  <div id='aa'><b>Search Applicant</b><br/>Find the applicant for your job, enter the appropriate key words</div>
        		</div>";
			}
        ?>
		<div id="search_job" class="row">
        	<form name="" method="post" role="form" action="employer_search.php">
            	<input type="search" name="search" class="form-control" placeholder="E.g. Lecturer, Software Engineer, PHP Developer etc.." /><br/>
                <input type="submit" name="submit" class="btn btn-default" value="Search" />
            </form>
        </div>

        <div id="all_jobs" style="font-size: 14px; padding-bottom: 10px;" class="row">
        <h3>Search Results</h3>
       	<?php
			if(isset($_POST['submit'])){
			$user_keywords = $_POST['search'];
							
			if($user_keywords == ""){
				echo "<div style='color: red; font-weight: bold; font-family: Trebuchet MS; font-size: 16px;'>" . "Enter any keywords" . "</div>";
			}else{
							
		     $get_mem = "SELECT * FROM members WHERE cv_headline like '%$user_keywords%'";
			 $run_mem = mysqli_query($connection, $get_mem);
			 $count = mysqli_num_rows($run_mem);
			 
	   			if($count == 0){
					
				echo "<h3 style='color: red; font-weight: bold; font-family: Trebuchet MS; font-size: 16px;'>No Applicant found for these keywords, Try another!</h3>";
				}
				
				 while($row_mem = mysqli_fetch_array($run_mem)){
					 
					$mem_id = $row_mem['mem_id'];
					$mem_first_name = $row_mem['mem_first_name'];
					$mem_last_name = $row_mem['mem_last_name'];
					$mem_email = $row_mem['mem_email'];
					$mem_cv = $row_mem['cv_headline'];
					
					echo "
						<div id='single_job'>
							<a href='view_applicant.php?mem_id=$mem_id'>
								<h3>$mem_cv</h3>
								<h4>$mem_email</h4>
							</a>
						<hr />
						</div>
						";
					}
				}
		}
	?>	

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