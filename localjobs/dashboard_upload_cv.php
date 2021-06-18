<?php session_start(); ?>
<?php
	include("includes/connection.php");
	include("functions/functions.php");
	include("functions/profile_functions.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            if(isset($_GET['changed'])){
                $changed = $_GET['changed'];
                echo "<div id='warning' class='alert alert-danger'>
                        <img src='images/icons2/cross.png' width='18' height='18' style='float: left;'>
                        <span id='error'>&nbsp;$changed</span>
                     </div>";
            }
        ?>
    
       
 		<div id="account_left_side" class="col-md-3 col-sm-3 col-xs-3">       
			<div id="dashboard">
        		<?php include("includes/dashboard.php"); ?>
        	</div>
		</div>
        
        <div id="account_center" class="col-md-6 col-sm-6 col-xs-9">
		    <div id="frame" class="row">
            	<h2>My Resume/CV</h2>
            	<div id="pic_title" class="col-md-12 col-sm-12 col-xs-12">
        			<div id="pic" class="col-md-3 col-sm-3 hidden-xs">
            			<?php getProfilePic(); ?>
                        <span><a href="#">Edit</a> | <a href="#">Remove</a></span> 
        			</div>
					<div id="title" class="col-md-9 col-sm-9 col-xs-12">
            			<?php getProfileNames(); ?>
	        		</div>
                </div>    
        		<div id="mycv" class="col-md-12 col-sm-12 col-xs-12"> 
            		<img src="images/icons2/id.png" />
                	<h1>Update CV / Resume</h1>
                	<div id="contact" class="col-md-12 col-sm-12 col-xs-12">
                		<?php include("includes/update_resume.php"); ?>
         			</div>  	
	        	</div>	
            	
          	</div>
        </div>
<!--        <div id="ads_area">
        	<h1>Ads</h1>
        </div>  -->
    <!-- Main Content Ends -->
    
	<!-- This is side bar -->
    <div id="account_right_side" class="col-md-3 col-sm-3 hidden-xs">
        <div id="sidebar1" class="row">
			<?php
                    
                $user_session = $_SESSION['username'];
                                
                $get_member_pic = "SELECT * FROM members
                                   WHERE mem_email = '$user_session'";
                                
                $run_member = mysqli_query($conn, $get_member_pic);
                                
                $row_member = mysqli_fetch_array($run_member);
                        
                $mem_id = $row_member['mem_id'];
        
            ?>
        
                <div id="total_jobs_applied">
                    <h3>Job Application (<?php echo countMemberJobs($mem_id); ?>)</h3>
                    <h5>You have applied for: <a href="my_applications.php?mem_id=<?php echo $mem_id; ?>" style="color: #00F;"><?php echo countMemberJobs($mem_id); ?> Jobs</a></h5>
                </div>
                
                <div id="sidebar_ad">
                    <h1>Ads</h1>
                </div>
        </div>  
	</div>
    </div>	
	<!-- This is footer -->
		<?php include("includes/footer_contents.php"); ?>
    
</div>

<!-- JavaScript-->
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
