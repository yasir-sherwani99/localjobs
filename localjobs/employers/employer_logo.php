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
   
    <!-- Left side area starts -->
<div class="row">
    <!-- Left side area starts -->
    	 <div id="left_side_area" class="col-md-3 col-sm-3 col-xs-3">
            <!-- Navigation area starts -->
            <div id="nav" class="row">
            	<div class="btn-group-vertical">
            
                <a href="main_panel.php"><button class="btn btn-default"><img src="images/clock.png" />Dashboard</button></a>
                <a href="employer_jobs.php"><button class="btn btn-default"><img src="images/icons/list.png" />Jobs</button></a>
                <a href="employer_apps.php"><button class="btn btn-default"><img src="images/icons/folder.png" />Applications</button></a>
                <a href="employer_profile.php"><button class="btn btn-info"><img src="images/icons/group.png" />Profile</button></a>
                <a href="employer_search.php"><button class="btn btn-default"><img src="images/icons/administrator.png" />Search</button></a>
                <a href="#"><button class="btn btn-default"><img src="images/icons/administrator.png" />Saved Resume</button></a>
                <a href="#"><button class="btn btn-default"><img src="images/icons/spreadsheet.png" />Reports</button></a>
                <a href="employer_change_pass.php"><button class="btn btn-default"><img src="images/icons/screwdriver.png" />Options</button></a>
                <a href="employer_logout.php"><button class="btn btn-default"><img src="images/icons/login.png" />Logout</button></a>
            	</div>
            </div>
        
        </div>


    
		    <?php
				if(isset($_SESSION['comp_user'])){
					$email = $_SESSION['comp_user'];
					
						
				$get_employer = "SELECT * FROM employers WHERE comp_email = '$email'";
				$run_employer = mysqli_query($connection, $get_employer);
				$row_employer = mysqli_fetch_array($run_employer);
					$comp_id = $row_employer['comp_id'];					
				}
	            ?>
                
        <!-- Main contents area starts -->
            
    <div id="contents" style="border: hidden;" class="col-md-9 col-sm-9 col-xs-9">
    	<div id="tab" class="row">
        	<ul class="nav nav-tabs">
            	<li><a href="employer_profile.php">Profile</a></li>
                <li><a href="edit_empl_profile.php?comp_id=<?php echo $comp_id; ?>">Edit Profile</a></li>
                <li class="active" style="font-weight: bold;"><a href="employer_logo.php?comp_id=<?php echo $comp_id; ?>">Upload Logo</a></li>
            </ul>
        </div>
		<?php
			if(isset($_GET['updated'])){
				$edit = $_GET['updated'];
				echo "<div id='message' class='alert alert-info'>
        			  	<img src='images/info.png' width='45' height='45'/>
            		 	<div id='aa'><b>Congratulations...</b><br/>$edit</div>
        			  </div>";
			}
			if(isset($_GET['logo'])){
				$logo = $_GET['logo'];
				echo "<div id='message' class='alert alert-danger'>
        			  	<img src='images/cross.png' width='45' height='45'/>
            		 	<div id='aa'><b>Warning...</b><br/>$logo</div>
        			  </div>";
			}
			 else {
				echo "<div id='message' class='alert alert-info'>
        				<img src='images/info.png' width='45' height='45'/>
            		  <div id='aa' style='margin-left: 10px;'><b>Upload Company Logo</b><br/>Company logo will display with every job you will post...</div>
        		</div>";
			}
        ?>

        <div id="all_jobs" style="height: auto; background-color:#FFF; font-size: 14px;" class="row">
        	
            <form name="" method="post" action="upload_logo.php?edit_form=<?php echo $comp_id; ?>" enctype="multipart/form-data">

                <table border="0" class="table table-bordered">
                    
                    <tr>
                        <td style="font-weight: bold;">Company Logo</td>
                        <td>
                            <input type="file" name="company_logo" />
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>     <input type="submit" name="upload_logo" value="Upload/Update Logo" class="btn btn-default btn-xs"/>
                         
    </td>
                     </tr>
                </table>
             </form>     
          
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
