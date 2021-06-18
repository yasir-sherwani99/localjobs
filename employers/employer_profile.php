<?php 
	session_start();
	if(!isset($_SESSION['comp_user'])){
		header('location: index.php?error=You are not an Administrator');
	}else{
 
?>

<?php include("includes/connection.php"); ?>
<?php include("functions/emp_main_panel_functions.php"); ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Local Jobs Pakistan</title>
	<link href="../images/logo_small.png" type="image/gif" rel="shortcut icon" />
    <link href="css/bootstrap.min.css" rel="stylesheet" />
	<link rel="stylesheet" type="text/css" href="styles/emp_main_panel_style.css" />
    <script src="js/respond.js"></script>
</head>

<body>
<div class="container">
	<!-- This is top bar -->
	<div id="topbar" class="row">
    	<?php include("includes/top_bar.php"); ?>
	</div>

	<!-- Header area starts -->
    <div id="header" class="row">
    	<?php include("includes/header.php"); ?> 
    </div>
    <!-- Header area ends -->
    
    <div class="row">
     	<?php include("includes/navigation_main.php"); ?>
    </div>	

    <!-- Left side area starts -->
<div class="row">
    <!-- Left side area starts -->
    	 <div id="left_side_area" class="col-md-3 col-sm-3 col-xs-3">
            <!-- Navigation area starts -->
            <?php include("includes/employer_dashboard.php"); ?>
        
        </div>

    
    <!-- Main contents area starts -->
    <?php
				if(isset($_SESSION['comp_user'])){
					$email = $_SESSION['comp_user'];
					
						
				$get_employer = "SELECT * FROM employers WHERE comp_email = '$email'";
				$run_employer = mysqli_query($connection, $get_employer);
				$row_employer = mysqli_fetch_array($run_employer);
					$comp_id = $row_employer['comp_id'];
					$comp_hr = $row_employer['contact_person'];
					$comp_desig = $row_employer['designation'];
					$comp_email = $row_employer['comp_email'];
					$comp_ac = $row_employer['area_code'];
					$comp_ll = $row_employer['land_line'];
					$comp_ext = $row_employer['extn'];
					$comp_cell = $row_employer['mobile'];
					$comp_name = $row_employer['comp_name'];
					$comp_addr = $row_employer['comp_addr'];
					$comp_type = $row_employer['comp_type'];
					$comp_loc = $row_employer['location'];
					$comp_bt = $row_employer['business_type'];
					$comp_cat = $row_employer['category'];
					$comp_profile = $row_employer['profile'];
					$comp_url = $row_employer['website'];
					$comp_logo = $row_employer['comp_logo'];
										
					$get_cat = "SELECT * FROM categories WHERE cat_id = '$comp_cat'";
					$run_cat = mysqli_query($connection, $get_cat);
					$row_cat = mysqli_fetch_array($run_cat);
						$catID = $row_cat['cat_id'];
						$catTITLE = $row_cat['cat_title'];
						
					$get_comp_type = "SELECT * FROM business_type WHERE buss_id = '$comp_bt'";
					$run_comp_type = mysqli_query($connection, $get_comp_type);
					$row_comp_type = mysqli_fetch_array($run_comp_type);
						$busID = $row_comp_type['buss_id'];
						$busTYPE = $row_comp_type['buss_type'];
						
					$get_city = "SELECT * FROM city WHERE city_id = '$comp_loc'";
					$run_city = mysqli_query($connection, $get_city);
					$row_city = mysqli_fetch_array($run_city);
						$cityID = $row_city['city_id'];
						$cityTITLE = $row_city['city_name'];
	            ?>
    <div id="contents" style="padding-top: 10px;" class="col-md-9 col-sm-9 col-xs-9">
    	<div id="tab" class="row">
        	<ul class="nav nav-tabs">
            	<li class="active" style="font-weight: bold;"><a href="employer_profile.php">Profile</a></li>
                <li><a href="edit_empl_profile.php?comp_id=<?php echo $comp_id; ?>">Edit Profile</a></li>
                <li><a href="employer_logo.php?comp_id=<?php echo $comp_id; ?>">Upload Logo</a></li>
            </ul>
        </div>
		<?php
			if(isset($_GET['updated'])){
				$edit = $_GET['updated'];
				echo "<div id='message' class='alert alert-success'>
        			  	<img src='images/checkmark2.png' width='45' height='45'/>
            		 	<div id='aa'><b>Congratulations...</b><br/>$edit</div>
        			  </div>";
			}
			 else {
				echo "<div id='message' class='alert alert-info'>
        				<img src='images/info.png' width='45' height='45'/>
            		  <div id='aa'><b>Employer Profile</b><br/>Edit the company profile...</div>
        		</div>";
			}
        ?>

        <div id="all_jobs" style="height: auto; background-color:#FFF; font-size: 14px;" class="row">
        
        	<table border="0" class="table table-bordered table-striped">
            	<tr>
                	<td style="width: 150px; font-weight: bold;">Company Title</td>
                	<td style="color: #3333FF; font-weight: bold;"><?php echo $comp_name; ?></td>
                    <td style="width: 100px; border: 0px solid #999;" rowspan="3">
                    <?php
						if($comp_logo == ""){
							echo "<img src='images/help2.png' width='100' height='100' />";
						} else {
							echo "<img src='company_logo/$comp_logo' width='100' height='100' />";
						}
					?>
                    </td>
                </tr>
                <tr>
                	<td style="width: 150px; font-weight: bold;">Company Category</td>
                	<td style="color: #3333FF; font-weight: bold;"><?php echo $catTITLE; ?></td>
                </tr>
                <tr>
                    <td style="font-weight: bold;">Company Type</td>
                    <td style="color: #3333FF; font-weight: bold;"><?php echo $comp_type; ?></td>
                </tr>
                <tr>
                    <td style="font-weight: bold;">Business Type</td>
                    <td style="color: #3333FF; font-weight: bold;" colspan="2"><?php echo $busTYPE; ?></td>
                </tr>
                <tr>
                    <td style="font-weight: bold;">Company Email</td>
                    <td style="color: #3333FF; font-weight: bold;" colspan="2"><?php echo $comp_email; ?></td>
                </tr>
                <tr>
                    <td style="font-weight: bold;">Address</td>
                    <td colspan="2">
                    	<?php echo $comp_addr; ?>
                    </td>
                </tr>
                <tr>
                    <td style="font-weight: bold;">Location</td>
                    <td colspan="2">
                    	<?php echo $cityTITLE; ?>
                    </td>
                </tr>
                <tr>
                	<td style="font-weight: bold;">Contact Person</td>
                    <td colspan="2"><?php echo $comp_hr; ?></td>
                </tr>
                <tr>
                	<td style="font-weight: bold;">Designation</td>
                    <td colspan="2"><?php echo $comp_desig; ?></td>
                </tr>
                <tr>
                	<td style="font-weight: bold;">Land Line Number</td>
                    <td colspan="2"><?php echo "0" . $comp_ac . "&nbsp;-&nbsp;" . $comp_ll . "&nbsp;-&nbsp;" . $comp_ext; ?></td>
                </tr>
                <tr>
                	<td style="font-weight: bold;">Mobile Number</td>
                    <td colspan="2"><?php echo "0" . $comp_cell; ?></td>
                </tr>
                <tr>
                	<td style="font-weight: bold;">Company Profile</td>
                    <td colspan="2">
                        	<?php echo $comp_profile; ?>
                    </td>
                </tr>
                <tr>
                	<td style="font-weight: bold;">Company URL</td>
                    <td colspan="2">
                        	<?php echo $comp_url; ?>
                    </td>
                </tr>

                <?php } ?>
              
            </table>
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