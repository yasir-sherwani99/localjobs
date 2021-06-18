<?php session_start(); ?>
<?php
	include("includes/connection.php");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Free Job Posting | Advertise Jobs | Free Job Posting ad | Find Talent</title>
    	<meta name="keywords" content="Free Job Posting | Employer Registration | Advertise Jobs | Post Free Job ads" />
	<meta name="description" content="Employer registration, free job posting to target Pakistani job seekers " />
	<link href="../images/logo_small.png" type="image/gif" rel="shortcut icon" />
    	<link href="css/bootstrap.min.css" rel="stylesheet" />
    	<link rel="stylesheet" type="text/css" href="styles/employer_style.css" />
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
    
    	<div class="row">
     		<?php include("includes/navigation.php"); ?>
    	</div>	
	
	<!-- This is main content area -->
	<div id="contents" class="row">
    
         <div id="myCarousel" class="carousel slide" data-ride="carousel">
    	<!-- Indicators -->
    		<ol class="carousel-indicators">
      			<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      			<li data-target="#myCarousel" data-slide-to="1"></li>
      			<li data-target="#myCarousel" data-slide-to="2"></li>
      			<li data-target="#myCarousel" data-slide-to="3"></li>
    		</ol>

    	<!-- Wrapper for slides -->
    		<div class="carousel-inner" role="listbox">

      		<div class="item active">
        		<img src="images/pleasure1.jpg" alt="Local Jobs Pakistan" width="460" height="345">
        		<div class="carousel-caption">
          		<h3 class="c_two">Aristotle</h3>
         		 <p class="c_two">Pleasure in the job puts perfection in the work. Happiness is an inside job.</p>
        		</div>
		</div>

      		<div class="item">
        		<img src="images/choose1.jpg" alt="Local Jobs Pakistan" width="460" height="345">
        		<div class="carousel-caption">
         		<h3 class="c_one">Confucius</h3>
          		<p class="c_one">Choose a job you love, and you will never have to work a day in your life.</p>
        		</div>
      		</div>

    		<div class="item">
        		<img src="images/youth1.jpg" alt="Local Jobs Pakistan" width="460" height="345">
        		<div class="carousel-caption">
       			<h3 class="c_one">Abdul Kalam</h3>
          		<p class="c_one">The youth need to be enabled to become job generators from job seekers.</p>
       	 		</div>
  		</div>   

    		<div class="item">
        		<img src="images/scratch1.jpg" alt="Local Jobs Pakistan" width="460" height="345">
        		<div class="carousel-caption">
        		<h3 class="c_two">Franklin P. Jones</h3>
          		<p class="c_two">Scratch a dog and you will find a permanent job.</p>
        		</div>
    		</div>

    

<!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>

        <div id="search_bar" class="col-md-12 col-sm-12 hidden-xs">
         
         <nav class="navbar navbar-default" role="navigation"> 
         	<div class="navbar-header"> 
            	<a class="navbar-brand" href="#">Try Searching our CV Database</a> 
            </div> 
            <div> 
            	<form class="navbar-form navbar-left" role="search"> 
                <div class="form-group"> 
                	<input type="search" class="form-control" placeholder="Search by Keywords (e.g. Software Engineer, Sales Executive...)"> 
                </div>
                <input type="submit" class="btn btn-default" name="search" value="GO!" /> 
                </form> 
            </div> 
          </nav>
                
        </div>
        
        <div id="main_area" class="col-md-12 col-sm-12 col-xs-12">
          <div class="row">	
        	<div id="jobs" class="col-md-4 col-sm-4">
                 	<div class="panel panel-primary">
                    	<div id="latest_jobs" class="panel-heading">
                        	<label class="panel-title" style="font-family: Verdana; font-size: 18px;"><span class="glyphicon glyphicon-bullhorn"></span> Advertise Your Jobs </label>
                     	</div>
                    	<div class="panel-body" style="height: 260px;">
               
                            <p>
                                Get more applicant in less time with an average of <b>400+</b> applicants per month.
                            </p>
                            <p>
                                Find the <b>best quality</b> university graduates and professionals.
                            </p>
                            <p>
                                <b>Save time</b> with our simple to use screening and filtration tools.
                            </p>
                            <p>
                                Get daily or weekly <b>email digests</b> with new applicants.
                            </p>
                            <p>
                                Signup now to <b><a href="#">Start Posting Jobs!</a></b>
                            </p>
						</div>
                    </div>
             </div>   
            <div id="cvs" class="col-md-4 col-sm-4">
                	<div class="panel panel-primary">
                    	<div id="latest_jobs" class="panel-heading">
                        	<label class="panel-title" style="font-family: Verdana; font-size: 18px;"><span class="glyphicon glyphicon-search"></span> Search CVs</label>
                     	</div>
                    	<div class="panel-body" style="height: 260px;">

                            <p>
                                <b>Thousands</b> of updated CVs are added monthly.
                            </p>
                            <p>
                                Find the talent you need precisely with our next generation <b>CV Search Technology.</b> 
                            </p>
                            <p>
                                Find candidates with the skills and experience you need and close to your location. e.g. <b>Sales Manager in Karachi</b>
                            </p>
                            <p>
                                You can even <b style="color: #3399FF;"><a href="#">Try Out the Search</a></b> right now.
                            </p>
            
						</div>
                    </div>
             </div>   
                        
            <div id="login" class="col-md-4 col-sm-4">
                <div class="panel panel-primary">
                    	<div id="latest_jobs" class="panel-heading">
                        	<label class="panel-title" style="font-family: Verdana; font-size: 18px;"><span class="glyphicon glyphicon-log-in"></span> Employer Sign In</label>
                     	</div>
                    	<div class="panel-body" style="height: 260px;">
                            <form method="post" action="" role="form">
                            	<div class="form-group" id="authenticate_email">
                                    <label for="email">E-mail</label>
                                    <input type="text" class="username form-control" name="comp_user" id="email" placeholder="Enter Email"/>
                                </div>
                            	<div class="form-group" id="authenticate_pass">
                                	<label for="password">Password</label>
                                    <input type="password" class="password form-control" name="comp_pass" id="password" placeholder="Enter Password"/>
                                </div>
				<div class="form-group">
                                	<label id="error" style="color: red;">&nbsp;</label>
                                    <label><a href="forgot_password.php" style="color: #390;">Forgot Password?</a></label>
                                </div>
            				   <input type="submit" name="comp_login" value="Sign In" class="btn btn-primary btn-sm"/>
                             </form>               

 			 </div>
                 </div>
            </div>
            
                 </div>   
     </div>    
        
</div>	
	<!-- This is footer -->
	<div id="footer" class="row">
		<?php include("includes/footer_contents.php"); ?>
	</div>
    
</div>


<!-- JavaScript-->
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
<?php
	
	if(isset($_POST['comp_login'])){
	
	$comp_user = $_POST['comp_user'];
	$comp_pass = $_POST['comp_pass'];
	
	$query = "SELECT * FROM employers
			  WHERE comp_email = '$comp_user' && comp_pass = '$comp_pass'";
	
	$result = mysqli_query($connection, $query);
	if(!$result){
		die("Database query has failed:" . mysqli_error());
	}
	
	$check_user = mysqli_num_rows($result);
	
	$row = mysqli_fetch_array($result);
		$comp_name = $row['comp_name'];

	if($check_user > 0){
		$_SESSION['comp_user'] = $comp_user;
		$_SESSION['comp_name'] = $comp_name;
		echo "<script>window.alert('You are logged in succsssfully as an Employer!')</script>";
		echo "<script>window.open('main_panel.php','_self')</script>";
	}else{
		echo "<script>document.getElementById('error').innerHTML='Username or Password is Incorrect'</script>";
	}
	
	
	}
?>