<?php 
	session_start();
	if(!isset($_SESSION['username'])){
		header('location: jobseeker_signin.php?error=You are not a Member..');
	}else{
 
?>
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
    <link href="images/logo_small.png" type="image/gif" rel="shortcut icon" />
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
		<?php include("includes/header.php"); ?>
    </div>
        <!-- This is navigation bar -->
    <nav id="ddmenu" class="row">
        <?php include("includes/top-nav.php"); ?>
	</nav>
<?php
            if(isset($_GET['changed'])){
                $changed = $_GET['changed'];
                echo "<div id='warning' class='alert alert-danger alert-dismissable'>
                	<button type='button' class='close' data-dismiss='alert' aria-hidden='true'> &times; </button>
                        <img src='images/icons2/cross.png' width='18' height='18' style='float: left;'>
                        <span id='error'>&nbsp;$changed</span>
                     </div>";
            }
            if(isset($_GET['deleted'])){
                $deleted = $_GET['deleted'];
                echo "<div id='warning' class='alert alert-success'>
                        <img src='images/icons2/checkmark.png' width='18' height='18' style='float: left;'>
                        <span id='error'>&nbsp;$deleted</span>
                     </div>";
            }
        ?>
	<!-- This is start of main content area -->
	<div id="contents" class="row">

        
        
       
	     <div id="account_left_side" class="col-md-3 col-sm-3 col-xs-3">
                <div id="dashboard">
                    <?php include("includes/dashboard.php"); ?>
                </div>
         </div> 


		 <div id="account_center" class="col-md-6 col-sm-6 col-xs-9"> 
        	<div id="frame" class="row">
            	
        <!--   	<div id="pic_title" class="col-md-12 col-sm-12 col-xs-12">  -->
      				<div id="title" class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            			<?php getProfileNames(); ?>
	        		</div>
                    <div id="pic" class="col-lg-4 col-md-4 col-sm-4 hidden-xs">
                    	<div class="thumbnail">
            				<?php getProfilePic(); ?> 
                        </div>
                        <div class="caption">
                        	<p style="margin-top: -15px; text-align: center;">
                        	<a href="dashboard_upload_image.php?mem_id=<?php echo $mem_id; ?>" class="btn btn-default btn-xs">Change your Photo</a>
                            </p>
                        </div>
                        
        			</div>
                    

            <!--    </div>    -->
 <!--        		<div id="mycv" class="col-md-12 col-sm-12 col-xs-12">
            		<img src="images/icons2/id.png" />
                	<h1>Upload/Update Picture</h1>
                	<div id="contact" class="col-md-12 col-sm-12 col-xs-12">
            			
                		<?php //include("includes/update_image.php"); ?>
         			</div>  	
	        	</div>	-->
            	
          	</div> 
			 <div id="upload-picture" class="row">
            	<ul class="nav nav-tabs">
            		<li class="active"><a href="#" style="background-color: #F0F0F0;" class="dashboard_title">Upload / Update Picture</a></li>
             
            	</ul>  
			     <?php include("includes/update_image.php"); ?>
            </div>  

    
        </div>
<!--        <div id="ads_area">
        	<h1>Ads</h1>
        </div>  -->
    
	<!-- This is side bar -->
    <div id="account_right_side" class="col-md-3 col-sm-3 hidden-xs">
		<?php include("includes/dashboard_account_right_side.php"); ?>
     </div>
     
      <!-- Main Content Ends -->
</div>	
	<!-- This is footer -->
		<?php include("includes/footer_contents.php"); ?>
    
</div>

<!-- JavaScript-->
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
<?php } ?>