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
    
    <div id="contents" style="padding-top: 10px;" class="col-md-9 col-sm-9 col-xs-9">
    	<div id="tab" class="row">
        	<ul class="nav nav-tabs"> 
            	<li><a href="employer_profile.php">Profile</a></li>
                <li class="active" style="font-weight: bold;"><a href="#">Edit Profile</a></li>
                <li><a href="employer_logo.php">Upload Logo</a></li>
            </ul>
        </div>
		<?php
			if(isset($_GET['updated'])){
				$edit = $_GET['updated'];
				echo "<div id='message' style='height: 50px;'>
        			  	<img src='images/checkmark2.png' width='45' height='45'/>
            		 	<div id='aa' style='margin-left: 10px;'><b>Congratulations...</b><br/>$edit</div>
        			  </div>";
			}
			 else {
				echo "<div id='message' class='alert alert-info'>
        				<img src='images/info.png' width='45' height='45'/>
            		  <div id='aa' style='margin-left: 10px;'><b>Update Profile</b><br/>Update your company profile...</div>
        		</div>";
			}
        ?>

        <div id="all_jobs" style="height: auto; background-color:#FFF; font-size: 14px;" class="row">
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
										
					$get_cat = "SELECT * FROM categories WHERE cat_id = '$comp_cat'";
					$run_cat = mysqli_query($connection, $get_cat);
					$row_cat = mysqli_fetch_array($run_cat);
						$catID = $row_cat['cat_id'];
						$catTITLE = $row_cat['cat_title'];
				}
	            ?>
     		
            <form method="post" role="form" action="edit_empl_profile.php?edit_form=<?php echo $comp_id; ?>">	  
        	<table border="0" class="table table-bordered">
            	<tbody>
             	<tr>
                	<td style="width: 150px; font-weight: bold;">Company Title</td>
                	<td>
                    	<input type="text" name="comp_name" class="form-control" value="<?php echo $comp_name; ?>" />
                    </td>
                </tr>
                <tr>
                	<td style="width: 150px; font-weight: bold;">Company Category</td>
                	<td>				
                        <select name="industry" class="form-control">
                            <option value="<?php echo $catID; ?>"><?php echo $catTITLE; ?></option>
                            <?php
                                $get_cats = "select * from categories order by cat_title";
                                $run_cats = mysqli_query($connection, $get_cats);
                                while($row_cats = mysqli_fetch_array($run_cats)){
                                $cat_id = $row_cats['cat_id'];
                                $cat_title = $row_cats['cat_title'];
                                    echo "<option value='$cat_id'>$cat_title</option>";
                                }
                            ?>
                        </select>

                    </td>
                </tr>
                <tr>
                    <td style="font-weight: bold;">Company Type</td>
                    <td>
                    	<select name="comp_type" class="form-control">
                        	<option value="<?php echo $comp_type; ?>"><?php echo $comp_type; ?></option>
                            <option value="Placement Consultants">Placement Consultants</option>
                            <option value="Corporate">Corporate</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td style="font-weight: bold;">Business Type</td>
                    <?php
                            $get_comp_type = "SELECT * FROM business_type WHERE buss_id = '$comp_bt'";
							$run_comp_type = mysqli_query($connection, $get_comp_type);
							$row_comp_type = mysqli_fetch_array($run_comp_type);
								$busID = $row_comp_type['buss_id'];
								$busTYPE = $row_comp_type['buss_type'];
					?>
                    <td>
                    <select name="business" class="form-control">
                    		<option value="<?php echo $busID; ?>"><?php echo $busTYPE; ?></option>
                            <?php
                            $get_comp_type1 = "SELECT * FROM business_type";
							$run_comp_type1 = mysqli_query($connection, $get_comp_type1);
							while($row_comp_type1 = mysqli_fetch_array($run_comp_type1)){
								$busID1 = $row_comp_type1['buss_id'];
								$busTYPE1 = $row_comp_type1['buss_type'];
								echo "<option value='$busID1'>$busTYPE1</option>";
							}
							?>
                    </select>
                    </td>
                </tr>
                <tr>
                    <td style="font-weight: bold;">Address</td>
                    <td>
                    	<textarea name="comp_addr" cols="32" rows="4" class="form-control"><?php echo $comp_addr; ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td style="font-weight: bold;">Location</td>
                    <?php
                    	$get_city = "SELECT * FROM city WHERE city_id = '$comp_loc'";
						$run_city = mysqli_query($connection, $get_city);
						$row_city = mysqli_fetch_array($run_city);
							$cityID = $row_city['city_id'];
							$cityTITLE = $row_city['city_name'];
					?>
                    <td>
					<select name="comp_loc" class="form-control">
                    		<option value="<?php echo $cityID; ?>"><?php echo $cityTITLE; ?></option>
                            <?php
                            $get_city1 = "SELECT * FROM city order by city_name";
							$run_city1 = mysqli_query($connection, $get_city1);
							while($row_city1 = mysqli_fetch_array($run_city1)){
								$cityID1 = $row_city1['city_id'];
								$cityTITLE1 = $row_city1['city_name'];
								echo "<option value='$cityID1'>$cityTITLE1</option>";
							}
							?>
                    </select>
                   
                    </td>
                </tr>
                <tr>
                	<td style="font-weight: bold;">Contact Person</td>
                    <td>
						<input type="text" name="emp_name" class="form-control" value="<?php echo $comp_hr; ?>" />
                    </td>
                </tr>
                <tr>
                	<td style="font-weight: bold;">Designation</td>
                    <td>
						<input type="text" name="emp_desig" class="form-control" value="<?php echo $comp_desig; ?>" />
                    </td>
                </tr>
                <tr>
                	<td style="font-weight: bold;">Land Line Number</td>
                    <td>
                    <input type="text" name="area_code" maxlength="4" style="padding: 5px; width: 65px;" value="<?php echo $comp_ac; ?>" />
                    <input type="text" name="land_line" maxlength="7" style="padding: 5px; width: 100px;" value="<?php echo $comp_ll; ?>" />
                    <input type="text" name="ext" maxlength="4" style="padding: 5px; width: 30px;" value="<?php echo $comp_ext; ?>" />
					</td>
                </tr>
                <tr>
                	<td style="font-weight: bold;">Mobile Number</td>
                    <td>
						<input type="text" name="emp_mobile" class="form-control" value="<?php echo $comp_cell; ?>" />
                    </td>
                </tr>
                <tr>
                	<td style="font-weight: bold;">Company Profile</td>
                    <td>
                    		<textarea name="comp_profile" cols="50" rows="8" class="form-control"><?php echo $comp_profile; ?></textarea>
                    </td>
                </tr>
                <tr>
                	<td style="font-weight: bold;">Company URL</td>
                    <td>
                    	<input type="url" name="comp_url" class="form-control" value="<?php echo $comp_url; ?>" />
                    </td>
                </tr>
                <tr>
                	<td></td>
					<td><input type="submit" name="update_profile" class="btn btn-default" value="Update Profile" /></td>
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
<?php } ?>
<?php
	if(isset($_POST['update_profile'])){
		$edit_record = $_GET['edit_form'];
	//	$empl_email = cleanStr($_POST['emp_email']);
		$empl_name = cleanStr($_POST['emp_name']);
		$empl_desig = cleanStr($_POST['emp_desig']);
		$empl_area_code = cleanStr($_POST['area_code']);
		$empl_land_line = cleanStr($_POST['land_line']);
		$empl_extn = cleanStr($_POST['ext']);
		$empl_mobile = cleanStr($_POST['emp_mobile']);
		$empl_comp_name = cleanStr($_POST['comp_name']);
		$empl_comp_addr = cleanStr($_POST['comp_addr']);
		$empl_comp_type = cleanStr($_POST['comp_type']);
		$empl_comp_loc = cleanStr($_POST['comp_loc']);
		$empl_business = cleanStr($_POST['business']);
		$empl_industry = cleanStr($_POST['industry']);
		$empl_comp_profile = cleanStr($_POST['comp_profile']);
		$empl_comp_url = cleanStr($_POST['comp_url']);
	
		$update_profile = "UPDATE employers
						   SET contact_person = '$empl_name',
							   designation = '$empl_desig',
							   area_code = '$empl_area_code',
							   land_line = '$empl_land_line',
							   extn = '$empl_extn',
							   mobile = '$empl_mobile',
							   comp_name = '$empl_comp_name',
							   comp_addr = '$empl_comp_addr',
							   comp_type = '$empl_comp_type',
							   location = '$empl_comp_loc',
							   business_type = '$empl_business',
							   category = '$empl_industry',
							   profile = '$empl_comp_profile',
							   website = '$empl_comp_url'
							 		WHERE comp_id = '$edit_record'";
				
		$run_profile = mysqli_query($connection, $update_profile);
		if($run_profile){
			echo "<script>window.open('employer_profile.php?updated=Profile has been updated successfully...!', '_self')</script>";
		} else{
			die("Database query has failed...!" . mysqli_error());
		}	
	}
?>