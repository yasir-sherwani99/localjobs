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
	<div id="contents" style="border: 0px solid green;" class="row">
         
		<?php
            if(isset($_GET['deleted'])){
                $withdraw = $_GET['deleted'];
                echo "<div id='warning' class='alert alert-success'>
                        <img src='images/icons2/checkmark.png' width='18' height='18' style='float: left;'>
                        <span id='error'>&nbsp;$withdraw</span>
                      </div>";
            }
        ?>
        
        <div id="account_left_side" style="margin-top: 10px;" class="col-md-3 col-sm-3 hidden-xs">
                <div id="dashboard" class="row">
                    <?php include("includes/dashboard.php"); ?>
                </div>
        </div> 

		<div id="account_center" style="margin-top: 10px;" class="col-md-9 col-sm-9 col-xs-12"> 

        	<div id="frame" style="border-radius: 0px; background-color: #FFF;" class="row">
            <!--	<h2 style="text-align: center; color: #FF8000;">Your Applications</h2> -->
            	<?php include("includes/my_applications.php"); ?>
            </div>  
    
        </div>
         
	</div>
    <!-- Main Content Ends -->
    

	
	<!-- This is footer -->
		<?php include("includes/footer_contents.php"); ?>
    
</div>

<!-- JavaScript-->
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
