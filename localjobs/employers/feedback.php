<?php session_start(); ?>
<?php
	include("includes/connection.php");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Local Jobs Pakistan</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="styles/employer_style.css" />
    <script src="js/respond.js"></script>
</head>

<body>

<div class="container">

	<!-- This is top bar -->
	<div id="topbar" class="row">
		<div id="topleft" class="col-md-5 col-sm-5 col-xs-12">
        	<ul>
            <?php
        		if(!isset($_SESSION['comp_user'])){
					echo "<li><b>Welcome: </b>Please</li>";
					echo "<li><a href='employer_signin.php' style='color: blue;'>Sign In</a> to continue</li>";
				}else{
					echo "<li><b>Welcome: </b>" . $_SESSION['comp_user'] . "</li>";
					echo "<li><a href='employer_logout.php' style='color: blue;'>Signout</a></li>";
				}
			?> 
            </ul>   
        </div>
        <div id="topright" class="col-md-3 col-md-offset-4 col-sm-4 col-sm-offset-3 hidden-xs">
        	If you are a Jobseeker? <a href="../index.php" target="_blank">Click here</a>
        </div>
	</div>

	<!-- This is header -->
	<div id="header" class="row">
		<img src="images/logo.png" />
    </div>
    
    <div class="row">
     	<?php include("includes/navigation_us.php"); ?>
    </div>	
	
	<!-- This is main content area -->
	<div id="contents" class="row">
    	<div class="col-md-8 col-sm-7">
        	<form role="form"> 
            	<div class="form-group"> 
                	<label for="feedback">Give us your feedback</label> 
					<textarea class="form-control" rows="3"></textarea>  
                </div> 
                <div class="form-group">
                	<label for="name">Mutiple Select list</label> 
                    	<select multiple class="form-control"> 
                        	<option>1</option> 
                            <option>2</option> 
                            <option>3</option> 
                            <option>4</option> 
                            <option>5</option> 
                        </select>
                </div>
                <div class="form-group"> 
                	<label for="title">Title for your feedback</label> 
                    <input type="text" class="form-control" id="title" placeholder="Title for your feedback">  
                </div> 
                <div class="form-group"> 
                	<label for="name">Your Name</label>
                    <input type="text" class="form-control" id="name" placeholder="Your name"> 
                </div> 
                <div class="form-group"> 
                	<label for="email">Your Email</label>
                    <input type="text" class="form-control" id="email" placeholder="Your Email"> 
                </div>  
                 
                 	<button type="submit" class="btn btn-primary">Send</button> 
                </form>
    	 </div>
                
        
        <div style="margin-top: 50px;" class="col-md-4 col-sm-5">
        	<iframe
            	width="300"
				height="300"  
				frameborder="1" 
				style="border:1;padding:0px;margin:0px;border-collapse:collapse;border-color:#002e34;"
				src="https://www.google.com/maps/embed/v1/place?key=AIzaSyBQu9YtNowhoyiDO9j8IEfRx2mZ9wdq7bc&q=Fortress+square">
			</iframe>

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
