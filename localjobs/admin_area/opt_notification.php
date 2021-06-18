<?php 
	session_start();
	if(!isset($_SESSION['username'])){
		header('location: admin_login.php?error=You are not an Administrator');
	}else{
 
?>

<?php include("includes/connection.php"); ?>
<?php include("functions/admin_functions.php"); ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Local Jobs Pakistan</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" />   
	<link rel="stylesheet" type="text/css" href="styles/admin_style.css" />
	<script type="text/javascript" src="js/js_functions.js"></script>
    <script src="js/respond.js"></script>
</head>

<body onLoad="myClock()">
<div class="container">
	<!-- Header area starts -->
    <div id="header" class="row">
    	<?php include("includes/admin_header.php"); ?>    
    </div>
    <!-- Header area ends -->
	<div id="welcome" class="row">
    <?php
		if(isset($_SESSION['admin_name'])){
			$admin = $_SESSION['admin_name'];
			echo "<img src='images/administrator2.png' style='width:25px; height:25px; margin-right: 10px;'><b style='color: #006600'>Welcome: </b>" . $admin . " <a href='admin_logout.php' style='color: blue;'>Signout</a>";
		}
    ?>
    </div>

    <!-- Left side area starts --> 
    <div class="row">
    
       
        <div id="left_side_area" class="col-md-3">
            <!-- Navigation area starts -->
            <div id="nav" class="row">
            	<div class="btn-group-vertical">
    				<a href="index.php"><button class="btn btn-default"><img src="images/clock.png" />Dashboard</button></a>
            		<a href="jobs.php"><button class="btn btn-default"><img src="images/list.png" />Jobs</button></a>
            		<a href="applications.php"><button class="btn btn-default"><img src="images/folder.png" />Applications</button></a>
            		<a href="employers.php"><button class="btn btn-default"><img src="images/group.png" />Employers</button></a>
            		<a href="employees.php"><button class="btn btn-default"><img src="images/administrator.png" />Employees</button></a>
            		<a href="options.php"><button class="btn btn-info"><img src="images/screwdriver.png" />Options</button></a>
                    <a href="#"><button class="btn btn-default"><img src="images/spreadsheet.png" />Reports</button></a>
            		<a href="users.php"><button class="btn btn-default"><img src="images/user.png" />Users</button></a>
            		<a href="admin_logout.php"><button class="btn btn-default"><img src="images/login.png" />Logout</button></a>
    			</div>
            </div> 
       	</div>   
    
    <!-- Navigation area ends -->    
    
    <!-- Main contents area starts -->
    
    <div id="contents" class="col-md-9">
    	<div id="tab" class="row">
        	<ul class="nav nav-tabs">
            	<li><a href="options.php">Types</a></li>
                <li><a href="opt_cat.php">Categories</a></li>
                <li class="active" style="font-weight: bold;"><a href="opt_notification.php">Notifications</a></li>
                <li><a href="opt_city.php">City</a></li>
                <li><a href="opt_ctry.php">Countries</a></li>
                <li><a href="change_pass.php">Change Password</a></li>
            </ul>
        </div>
           <?php
	/*		 if(isset($_GET['deleted'])){
				 $deleted = $_GET['deleted'];
				 echo "<div id='message'>
        				<img src='images/checkmark.png' width='25' height='25'/>
            			<div id='aa'>$deleted</div>
        		</div>"; 
			 }
			 if(isset($_GET['updated'])){
				 $updated = $_GET['updated'];
				 echo "<div id='message'>
        				<img src='images/checkmark.png' width='25' height='25'/>
            			<div id='aa'>$updated</div>
        		</div>"; 
			 }
		*/	 
		?>
        
        <div id="all_jobs" style="height: auto; background-color:#FFF; font-size: 14px; border: hidden;" class="row">
        <div id="message" class='alert alert-info'>
        	<img src="images/info.png" width="45" height="45"/>
            <div id="aa"><b>Job offer confirmation</b><br/>This email will be sent to the candidates who applied for a job.</div>
        </div>       
        <div class="col-md-12 mtwste">

        	<label class="row">Job offer confirmation</label>
            <form name="" action="" role="form" method="post">
            <table class="table table-bordered">
            <tbody>
            <tr>
            	<td>Subject</td>
                <td><input type="text" name="subject" class="form-control" value="Job offer confirmation" /></td>
            </tr>
            <tr>
            	<td>Message</td>
                <td>
                	<textarea name="mess1" class="form-control" cols="60" rows="10">Dear {fname},

Your job application for job: {jobTitle} is received.

Thank you        </textarea>
                </td>
            </tr>
            <tr>
            	<td></td>
                <td><input type="submit" name="submit" class="btn btn-default" value="Save" /></td>
            </tr>
            </tbody>    
            </table>
            </form>
        </div>
    
  <!--      <div class="alert alert-info message">
        	<img src="images/info.png" width="45" height="45"/>
            <div id="aa"><b>Job offer application</b><br/>This email will be sent to the administrator and the job owner.</div>
        </div>  -->
               
        <div class="col-md-12 mtwste">
        	<label class="row">Job offer application</label>
            <form name="" action="" role="form" method="post">
            <table class="table table-bordered">
            <tbody>
            <tr>
            	<td>Subject</td>
                <td><input type="text" name="subject" class="form-control" value="Job offer application" /></td>
            </tr>
            <tr>
            	<td>Message</td>
                <td>
                	<textarea name="mess1" cols="60" rows="10" class="form-control">You received a new application for job: {jobTitle}

First name: {fname}
Last name: {lname}
E-mail: {email}

This email was automatically generated, please do not reply.
                    </textarea>
                </td>
            </tr>
            <tr>
            	<td></td>
                <td><input type="submit" name="submit" class="btn btn-default" value="Save" /></td>
            </tr>
            </tbody>    
            </table>
            </form>
        </div>
     
<!--		<div class="alert alert-info message">
        	<img src="images/info.png" width="45" height="45"/>
            <div id="aa"><b>New job notification</b><br/>This email will be sent to the administrator when new job is posted.</div>
        </div>  -->
               
        <div class="col-md-12 mtwste">
        	<label class="row">New job notification</label>
            <form name="" action="" method="post" role="form">
            <table class="table table-bordered">
            <tbody>
            <tr>
            	<td>Subject</td>
                <td><input type="text" name="subject" class="form-control" value="New job notification" /></td>
            </tr>
            <tr>
            	<td>Message</td>
                <td>
                	<textarea name="mess1" cols="60" rows="10" class="form-control">A new job has been posted.

Job Title: {jobTitle}

Thank you,
                    </textarea>
                </td>
            </tr>
            <tr>
            	<td></td>
                <td><input type="submit" name="submit" class="btn btn-default" value="Save" /></td>
            </tr>
            </tbody>    
            </table>
            </form>
        </div>

<!--		<div class="alert alert-info message">
        	<img src="images/info.png" width="45" height="45"/>
            <div id="aa"><b>Password remainder</b><br/>This is password remainder email message.</div>
        </div>  -->
               
        <div class="col-md-12 mtwste">
        	<label class="row">Password remainder</label>
            <form name="" action="" role="form" method="post">
            <table class="table table-bordered">
            <tbody>
            <tr>
            	<td>Subject</td>
                <td><input type="text" name="subject" class="form-control" value="Password remainder"/></td>
            </tr>
            <tr>
            	<td>Message</td>
                <td>
                	<textarea name="mess1" cols="60" rows="10" class="form-control">Dear {fname},

Your password is: {password}
                    </textarea>
                </td>
            </tr>
            <tr>
            	<td></td>
                <td><input type="submit" name="submit" class="btn btn-default" value="Save" /></td>
            </tr>
            </tbody>    
            </table>
            </form>
        </div>
			
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