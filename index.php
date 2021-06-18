<?php session_start(); ?>
<?php
	include("includes/connection.php");
	include("functions/functions.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="msvalidate.01" content="920CC18E5FE451A1B3EB31A7D6E3AA11" />
	<meta name="propeller" content="c5f29b6ce0199e0eb5275edc4ddcb38b" />
	<title>Jobs for Pakistanies | Internships in Pakistan | Walkin Interviews in Pakistan | Jobs for Fresh Graduates in Pakistan </title>
    	<meta name="keywords" content="Company Jobs in Pakistan | Internships in Pakistan | Walkin Interviews in Pakistan | Jobs for Fresh Graduates in Pakistan " />
	<meta name="description" content="Jobs in Pakistan by different companies, information about latest walkin interviews in Pakistan, Information about internships and jobs for fresh graduates" />
	<link href="images/logo_small.png" type="image/gif" rel="shortcut icon" />
<link href="//cdn-images.mailchimp.com/embedcode/slim-081711.css" rel="stylesheet" type="text/css">
    <link href="css/bootstrap.min.css" rel="stylesheet" />   
    <link href="styles/index_style.css" rel="stylesheet" type="text/css" />
    <link href="styles/third_style.css" rel="stylesheet" type="text/css" />
    <link href="styles/ddmenu.css" rel="stylesheet" type="text/css" />
    <script src="js/ddmenu.js" type="text/javascript"></script>   
    <script src="js/respond.js"></script>

</head>

<body>

<div class="container">

	<!-- This is top bar -->
    <!-- row 1-->
	<div id="topbar" class="row">
    	<?php include("includes/top_bar.php"); ?>
	</div>
    
    <!-- This is header -->
    <!-- row 2-->
	<div id="header" class="row">
		<?php include("includes/header.php"); ?>  
    </div>
    
    <!-- This is navigation bar -->  
    <!-- row 3 -->  
    <nav id="ddmenu" class="row">
            <?php include("includes/top-nav.php"); ?>
    </nav>
    
    <!-- row 4 -->

   	<div id="search_register_post" class="row"> 
        	<?php include("includes/search_bar.php"); ?>
    </div>
        
        
        
        <!-- row 5-->
        
    <div class="row">
    	  <div id="latest" class="col-md-7 col-sm-7 col-xs-12">
				<?php include("includes/latest_employer_jobs.php"); ?>
          </div>
          <div id="international" class="col-md-5 col-sm-5 col-xs-12">
				<?php include("includes/latest_internship_jobs.php"); ?>
          </div>
    </div>  

    <div class="row">
         <div id="contents" style="border: 1px solid #FFF;" class="col-md-9 col-sm-9 col-xs-12">
               
            
       <!--     <div id="walkin">
                <?php include("includes/latest_walkin_interviews.php"); ?>
            </div>
            <div class="center_ad">
            </div>
       -->         
            <div id="cat">
                 <?php include("includes/category_portion.php"); ?>
            </div>
            <div class="center_ad">
            </div>
        
            <div id="city">
	            <?php include("includes/city_portion.php"); ?>
            </div>	
            <div class="center_ad">
            </div>
     
        </div>
            <!-- Main Content Ends -->
        
            <!-- This is side bar -->
        <div id="sidebar" style="border: 0px solid #000;" class="col-md-3 col-sm-3 hidden-xs">
         
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <label class="panel-title" style="font-family: Verdana;"><span class="glyphicon glyphicon-log-in"></span> Existing User- SIGN IN</label>
                        
                    </div>
                    <div class="panel-body">
                        <form method="post" action="" role="form">
                            <div class="form-group" id="authenticate_email">
                                <label for="email">E-mail</label>
                                <input type="text" class="username form-control" name="username" placeholder="Enter Email"/>
                            </div>
                            <div class="form-group" id="authenticate_pass">
                                <label for="password">Password</label>
                                <input type="password" class="password form-control" name="userpass" placeholder="Enter Password"/>
                            </div>
							<div class="form-group">
                                <label id="error" style="color: red;">&nbsp;</label>
                                <label><a href="forgot_password.php" style="color: #390;">Forgot Password?</a></label>
                            </div>
            				<input type="submit" name="login" value="Sign In" class="btn btn-primary btn-sm"/>
                        </form>               
                            
					</div>
                </div>
                     
		<div id="optin">
		  <h4 style="font-weight: bold; margin-top: -10px;">Get Free Email Updates</h4>
		  <form action="//localjobs.us11.list-manage.com/subscribe/post?u=7519e5679f828c0e97fb092c2&amp;id=674d602d14" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                  <div id="mc_embed_signup_scroll">
	            <label for="mce-EMAIL">Subscribe to our mailing list</label>
	            <input type="email" value="" name="EMAIL" class="email form-control" id="mce-EMAIL" placeholder="email address" required>
            <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                    <div style="position: absolute; left: -5000px;"><input type="text" name="b_7519e5679f828c0e97fb092c2_674d602d14" tabindex="-1" value=""></div>
                    <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button btn btn-success btn-block"></div>
    </div>
</form>


	     </div>


            </div>
    
	</div>
        	
        <!-- This is footer -->
        <!-- row 6 -->
        
            <?php include("includes/footer_contents.php"); ?>
    
	<script language="javascript" type="text/javascript" src="http://www.submitshop.com/seotools/social/socialsubmit.js"> </script>
</div>

<!-- JavaScript-->
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript">
var infolinks_pid = 2499562
var infolinks_wsid = 1
</script>
<script type="text/javascript" src="http://resources.infolinks.com/js/infolinks_main.js"></script>
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
	$row = mysqli_fetch_array($result);
		$first_name = $row['mem_first_name'];
		$last_name = $row['mem_last_name'];

	if($check_user > 0){
		$_SESSION['username'] = $username;
		$_SESSION['mem_first_name'] = $first_name;
		$_SESSION['mem_last_name'] = $last_name;
		
		echo "<script>window.alert('You are logged in succsssfully as a Job Seeker!')</script>";
		echo "<script>window.open('index.php','_self')</script>";
	}else{
		echo "<script>document.getElementById('error').innerHTML='Invalid Username/Password '</script>";
	}
	
	
	}
?>