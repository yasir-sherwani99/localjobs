<?php session_start(); ?>
<?php
	include("includes/connection.php");
	include("functions/functions.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Foreign Jobs | Overseas Jobs | International Jobs | Middle East Jobs</title>
    	<meta name="keywords" content="Foreign Jobs | International Jobs | Overseas Jobs | Middle East Jobs" />
	<meta name="description" content="Foreign, International or Overseas Jobs Information for Pakistani Job Seekers" />
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
                <h3>FOREIGN JOBS BY <span style="color: #F00;">CATEGORY</span></h3>
                 		
                     <!--   <div id='each_cat'>  -->
                            <ul>
                            	<?php
                    				$top_cats = "select * from categories order by rand()";
                    				$run_top = mysqli_query($connection, $top_cats);
                    
                    				while($row_top = mysqli_fetch_array($run_top)){
                        				$cat_id = $row_top['cat_id'];
                        				$cat_name = $row_top['cat_title'];
                        
                				?>
                                <a href='foreign_cat_details.php?cat_id=<?php echo $cat_id; ?>'>
                                <li>
                                	<?php echo $cat_name; ?>
                                	<?php echo "<span style='color: black;'>(" . countForeignCategoryJobs($cat_id) . ")</span><br/>"; ?>
                                
                                </li>
                                </a>
                                <?php	}   ?>		
                            </ul>
                    <!--    </div>  -->     
    
            </div>
            
            <div id="all_jobs" class="col-md-9 col-sm-9 col-xs-12">
                <h1>Latest Foreign / International Jobs</h1>
          
                 <h2><?php echo countTotalForeign() . " Jobs found"; ?></h2>
                <?php include("includes/all_latest_foreign.php"); ?>
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
<?php
	
	if(isset($_POST['login'])){
	
	$username = $_POST['username'];
	$password = $_POST['userpass'];
	
	$query = "SELECT * FROM members
			  WHERE mem_email = '$username' && mem_pass = '$password'";
	
	$result = mysqli_query($connection, $query);
	if(!$result){
		die("Database query has failed:" . mysqli_error());
	}
	
	$check_user = mysqli_num_rows($result);
	if($check_user > 0){
		$_SESSION['username'] = $username;
		echo "<script>window.alert('You are logged in succsssfully as a Job Seeker!')</script>";
		echo "<script>window.open('index.php','_self')</script>";
	}else{
		echo "<script>document.getElementById('error').innerHTML='Username or Password is Incorrect'</script>";
	}
	
	
	}
?>