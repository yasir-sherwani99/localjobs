<?php
	session_start();
	
	include("includes/connection.php");
	include("functions/functions.php");
	include("functions/jobdetail_functions.php");
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
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.4&appId=779716815444739";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div class="container">

	<!-- This is top bar -->
	<div id="topbar" class="row">
		<div id="topleft" class="col-md-5 col-sm-5 col-xs-12">
        	<ul>
            <?php
        		if(!isset($_SESSION['username'])){
					echo "<li><b>Welcome: </b>Please</li>";
					echo "<li><a href='jobseeker_signin_db.php' style='color: blue;'>Sign In</a> to continue</li>";
				}else{
					echo "<li><b>Welcome: </b>" . $_SESSION['username'] . "</li>";
					echo "<li><a href='members_logout.php' style='color: blue;'>Signout</a></li>";
				}
			?> 
            </ul>   

        </div>
        <div id="topright" class="col-md-3 col-md-offset-4 col-sm-4 col-sm-offset-3 hidden-xs">
	        If you are a Employer? <a href="employers/index.php" target="_blank" style='color: blue;'>Click here</a>
        </div>
	</div>

	<!-- This is header -->
	<div id="header" class="row">
		<?php include("includes/header.php"); ?>
    </div>
        <!-- This is navigation bar -->
    <nav id="ddmenu" class="row">
        <?php include("includes/top-nav.php"); ?>
	</nav>
    
 <div class="row">
     
   
	<!-- This is start of main content area -->
	<div id="contents" style="font-family:Trebuchet MS;" class="col-md-12 col-sm-12 col-xs-12">
        
         <!--   <div id="job_title" class="row"><h3>Contact Us!</h3></div>  -->
      
            <div id="job_details" class="row">
                
              <div id="signin_box" class="col-md-7 col-sm-7 col-xs-12"> 
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <label class="panel-title" style="font-size: 20px; font-family: Verdana;"> Contact Us</label>      
                    </div>
                    <div class="panel-body">

                        <form class="form-horizontal" role="form" method="post" action="contactus.php">
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name" name="name" placeholder="First & Last Name" value="">
                                <p class="text-danger" id="errName"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="email" name="email" placeholder="example@domain.com" value="">
                                <p class="text-danger" id="errEmail"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="text" class="col-sm-2 control-label">Subject</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="subject" name="subject" placeholder="Feedback, Complaint or Suggestion" value="">
                                <p class="text-danger" id="errSubject"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="message" class="col-sm-2 control-label">Message</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" rows="4" name="message"></textarea>
                                <p class="text-danger" id="errMessage"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="human" class="col-sm-2 control-label">3 + 9 = ?</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="human" name="human" placeholder="Your Answer">
                                <p class="text-danger" id="errHuman"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-10 col-sm-offset-2">
                                <input id="submit" name="submit" type="submit" value="Send" class="btn btn-primary">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-10 col-sm-offset-2">
                                <p class="text-danger" id="result"></p>
                            </div>
                        </div>
                    </form>
        		   </div>
                </div>   	
              </div>
              <div id="like_us_on_facebook" class="col-md-5 col-sm-5 hidden-xs">
                        <h3><span class="glyphicon glyphicon-heart"></span> Like us on Facebook :)</h3>
                        <div id="facebook_like_box">
                        <div class="fb-page" data-href="https://www.facebook.com/localjobspak" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="false"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/localjobspak"><a href="https://www.facebook.com/localjobspak">Facebook</a></blockquote></div></div>
                        </div>
                    </div>
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
<?php
	
	if(isset($_POST['submit'])){
		
		$name = $_POST['name'];
		$email = $_POST['email'];
		$subject = $_POST['subject'];
		$message = $_POST['message'];
		$human = intval($_POST['human']);

		$from = $email; 
		$to = 'admin@localjobs.pk'; 
		$subject = $subject;
 
		$body = "From: $name\n E-Mail: $email\n Message:\n $message";
	
		if($name == ""){
			echo "<script>document.getElementById('errName').innerHTML='Please enter your name'</script>";
		}
		if(!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
			echo "<script>document.getElementById('errEmail').innerHTML='Please enter a valid email'</script>";
		}
		if($subject == ""){
			echo "<script>document.getElementById('errSubject').innerHTML='Please enter your subject'</script>";
		}
		if($human != 12) {
			echo "<script>document.getElementById('errHuman').innerHTML='Your anti-spam is incorrect'</script>";
		}
	
		else {
    		mail($to, $subject, $body, $from);
			echo "<script>document.getElementById('result').innerHTML='Thank You! We will be in touch'</script>";
		}
    
    }
	 
?>