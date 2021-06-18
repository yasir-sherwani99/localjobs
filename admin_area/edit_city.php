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
	<link href="images/logo_small.png" type="image/gif" rel="shortcut icon" />
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
            <?php include("includes/dashboard.php"); ?> 
       	</div>   
    
    <!-- Navigation area ends -->    
    
    <!-- Main contents area starts -->
    
    <div id="contents" class="col-md-9">
    	<div id="tab" class="row">
        	<ul class="nav nav-tabs">
                <li><a href="options.php">Types</a></li>
                <li><a href="opt_cat.php">Categories</a></li>
                <li><a href="opt_notification.php">Notifications</a></li>
                <li><a href="opt_city.php">City</a></li>
                <li class="active" style="font-weight: bold;"><a href="opt_city.php">Edit City</a></li>
                <li><a href="opt_ctry.php">Countries</a></li>
                <li><a href="change_pass.php">Change Password</a></li>
            </ul>
        </div>
        <?php
			if(isset($_GET['mess'])){
				$published = $_GET['mess'];
				echo "<div id='message' class='alert alert-success'>
        			  	<img src='images/info.png' width='45' height='45'/>
            		 	<div id='aa'><b>Congratulations...</b><br/>$published</div>
        			  </div>";
			} else {
				echo "<div id='message' class='alert alert-info'>
        				<img src='images/info.png' width='45' height='45'/>
            		  <div id='aa'><b>Update City</b><br/>Edit the required fields and update a city.						</div>
        		</div>";
			}
        ?>
        <div id="job_form" class="row">
        	<?php
				$cityid = @$_GET['city_id'];
				$get_city = "SELECT * FROM city WHERE city_id = '$cityid'";
				$run_city = mysqli_query($connection, $get_city);
					$row_city = mysqli_fetch_array($run_city);
						$id = $row_city['city_id'];
						$city_name = $row_city['city_name'];
								
            ?>
        	<form method="post" role="form" action="edit_city.php?edit_form=<?php echo $id; ?>">
			<table border="0" class="table">
            <tbody>
			<tr>
				<td>City Name<span style="color: #F00; font-size: 16px;">&nbsp;*</span></td>
    			<td><input type="text" name="title" class="form-control" value="<?php echo $city_name; ?>"/></td>
			</tr>
            <tr>
            	<td></td>
                <td><input type="submit" name="update" class="btn btn-default" value="Update" /></td>
            </tr>
            </tbody>
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
<?php
	if(isset($_POST['update'])){
		$edit_record = $_GET['edit_form'];
		$city_title = cleanStr($_POST['title']);
		
		$update_city = "UPDATE city
					   SET city_name = '$city_title' 
						   	WHERE city_id = '$edit_record'"; 
			
		$run_update = mysqli_query($connection, $update_city);
		if($run_update){
			echo "<script>window.open('opt_city.php?updated=A city has updated successfully...!', '_self')</script>";
		}else{
			exit("Database Query has failed" . mysqli_error());
		}
		
	}
	
	}
?>