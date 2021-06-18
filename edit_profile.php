<?php session_start(); ?>
<?php
	include("includes/connection.php");
	include("functions/functions.php");
?>
<?php
	if(isset($_GET['mem_id'])){
		
	$member = $_GET['mem_id'];
	
	$get_member = "SELECT * FROM members WHERE mem_id = '$member'";
	
	$run_member = mysqli_query($connection, $get_member);
	if(!$run_member){
		die("database query has failed" . mysqli_error());
	}
	
	$row_member = mysqli_fetch_array($run_member);
	
		$mem_id = $row_member['mem_id'];
		$mem_first_name = $row_member['mem_first_name'];
		$mem_last_name = $row_member['mem_last_name'];
		$mem_email = $row_member['mem_email'];
		$mem_gender = $row_member['mem_gender'];
		$mem_cell = $row_member['mem_cell'];
		$mem_home = $row_member['mem_home_ph'];
		$mem_dob_day = $row_member['dob_day'];
		$mem_dob_month = $row_member['dob_month'];
		$mem_dob_year = $row_member['dob_year'];
		$mem_addr = $row_member['mem_addr'];
		$mem_city = $row_member['mem_city'];
		$other_city = $row_member['mem_city_other'];
		$mem_ctry = $row_member['mem_country'];
		$mem_degree = $row_member['degree_level'];
		$mem_degree_title = $row_member['degree_title'];
		$mem_majors = $row_member['majors'];
		$mem_inst = $row_member['institution'];
		$mem_inst_city = $row_member['degree_city'];
		$mem_inst_ctry = $row_member['degree_ctry'];
		$mem_year_pass = $row_member['completion_year'];
		$mem_exp_year = $row_member['mem_exp_year'];
		$mem_exp_month = $row_member['mem_exp_month'];
		$mem_industry = $row_member['profession_industry'];
		$current_job = $row_member['current_job'];
		$current_empl = $row_member['comp_name'];
		$empl_city = $row_member['comp_city'];
		$empl_ctry = $row_member['comp_ctry'];
		$empl_month = $row_member['current_job_month'];
		$empl_year = $row_member['current_job_year'];
		$empl_end = $row_member['current_end_date'];
		$mem_it_skills = $row_member['mem_it_skills'];
		$mem_other_skills = $row_member['mem_other_skills'];
		$mem_cv_headline = $row_member['cv_headline'];
		$mem_cv_name = $row_member['mem_cv'];
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
    <link rel="stylesheet" type="text/css" href="styles/fifth_style.css" />
    <link href="styles/ddmenu.css" rel="stylesheet" type="text/css" />
    <script src="js/ddmenu.js" type="text/javascript"></script>
    <script src="js/respond.js"></script>
    <script src="js/jquery.js"></script>
	<script type="text/javascript">
	
		$(document).ready(function(){
		
			$("#cancel_personal").click(function(){
				$(".edit_personal_info").hide();
			});
			
			$(".edit_personal_info").hide();
			$("#edit_personal").click(function(){
				$(".personal_info").hide();
				$(".edit_personal_info").show();
			});
			
			$("#upload_image").hide();
			$("#upload").click(function(){
				$("#upload_image").show();
			});
			
			
			$("#cancel").click(function(){
				$("#upload_image").hide();
			});
			
			
			$("#update_cv").hide();
			$("#updatec").click(function(){
				$("#update_cv").show();
			});
			
			$("#cancel2").click(function(){
				$("#update_cv").hide();
			});

			$(".edit_mem_summary").hide();
			$("#edit_summary").click(function(){
				$(".prof_summary").hide();
				$(".edit_mem_summary").show();
			});
			
			$("#cancel_summary").click(function(){
				$(".edit_mem_summary").hide();
			});
			
			$(".edit_mem_qual").hide();
			$("#edit_qual").click(function(){
				$(".qualification").hide();
				$(".edit_mem_qual").show();
			});
			
			$("#cancel_qual").click(function(){
				$(".edit_mem_qual").hide();
			});

			$(".edit_empl_details").hide();
			$("#edit_employment").click(function(){
				$(".empl_details").hide();
				$(".edit_empl_details").show();
			});
			
			$("#cancel_emp").click(function(){
				$(".edit_empl_details").hide();
			});
			
			$(".edit_mem_skills").hide();
			$("#edit_skill").click(function(){
				$(".mem_skills").hide();
				$(".edit_mem_skills").show();
			});
			
			$("#cancel_skills").click(function(){
				$(".edit_mem_skills").hide();
			});

			
		});


	</script>

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
	<div id="contents" style="border: 0px solid red;" class="row">
    	<div id="view_profile" class="col-md-12 col-sm-12 col-xs-12">
        	<div class="row" style="margin-right: 17px;">	
             <!--   <h1 class="col-md-4 col-sm-4 col-xs-12">
                    Edit Resume/CV&nbsp;<span>(My Active Resume)</span>
                </h1>
                <div id="profile_button" class="col-md-4 col-md-offset-4 col-sm-4 col-sm-offset-4 hidden-xs">    
                    <label class="emp_preview"><span class="glyphicon glyphicon-search"></span><a href="#" style="color: #20B2AA;"> Employer Preview</a></label>
                    <label class="edit_preview"><span class="glyphicon glyphicon-edit"></span><a href="view_profile.php?mem_id=<?php //echo $mem_id; ?>" style="color: #20B2AA;"> View Resume</a></label>
                </div> -->
                <ul class="nav nav-tabs navbar-right">
                	<li><a href="view_profile.php?mem_id=<?php echo $mem_id; ?>">View Profile</a></li>
                    <li class="active" style="font-weight: bold;"><a href="#">Edit Profile</a></li>
                    
                </ul>
            </div>
            
        <div class="row">    
        	<div id="inside" class="col-md-12 col-sm-12 col-xs-12">
                <table class="table" style="background-color: #FFF;">
                <tbody>
                    <tr>
                        <td colspan="2"><h2><?php echo $mem_cv_headline; ?></h2></td>
                    </tr>

                	<tr class="success">
                    	<td>Resume</td>
                        <td></td>
                    </tr>
                    <tr>
                    	<td class="title2">Resume / CV</td>
                        <td class="output"><?php echo $mem_cv_name; ?> &nbsp;<span> <a href="#" id="updatec">Update</a> | <a href="#">Preview</a> | <a href="download.php?download_file=<?php echo $mem_cv_name; ?>">Download</a></span></td>
                    </tr>
                    
                    <tr id="update_cv">
                    	<td class="title2">Update CV / Resume</td>
                        <td class="output">
                        <form method="post" action="upload_cv.php?edit_form=<?php echo $mem_id; ?>" enctype="multipart/form-data" role="form">
                        <div class="form-group">
                            <input type="file" name="mem_cv" class="form-control"/>
                         </div>
                            <input type="submit" name="upload_cv" value="Update CV" class="btn btn-success btn-xs"/> or <span style="margin-left: 2px;"><a href="#" id="cancel2">Cancel</a></span>
                        </form>
                        </td>
                    </tr>
                    
                    <tr>
                    	<td class="title2">Image</td>
                        <td class="output">
                        <span style="margin-left: 0px;">
                        	<a href="#" id="upload">Upload or Update</a> | <a href="#">Delete</a>
                        </span>
                        </td>
                    </tr>

                    <tr id="upload_image">
                    	<td class="title2">Upload / Update Image</td>
                        <td class="output">
                        <form name="" method="post" action="upload_image.php?edit_form=<?php echo $mem_id; ?>" enctype="multipart/form-data">
                        <div class="form-group">
                        	<input type="file" name="mem_image" class="form-control"/>
                        </div>
                            <input type="submit" name="upload_image" value="Save" class="btn btn-success btn-xs"/> or <span style="margin-left: 2px;"><a href="#" id="cancel">Cancel</a></span>
                        </form>
                        </td>
                    </tr>

                    <tr class="success">
                    	<td>Personal Information</td>
                        <td><button id="edit_personal" class="btn btn-primary btn-xs">Edit</button></td>
                    </tr>
					<tr class="personal_info">
                    	<td class="title2">Name</td>
                        <td class="output"><?php echo $mem_first_name . "&nbsp;" . $mem_last_name; ?></td>
                    </tr>
                    <?php
						$get_month = "SELECT * FROM months WHERE month_id = '$mem_dob_month'";
						$run_month = mysqli_query($connection, $get_month);
						$row_month = mysqli_fetch_array($run_month);
							$mon_id = $row_month['month_id'];
							$mon_title = $row_month['month_name'];
						
                    ?>
					<tr class="personal_info">
                    	<td class="title2">Date of Birth</td>
                        <td class="output"><?php echo $mem_dob_day . "&nbsp;" . $mon_title . "&nbsp;" . $mem_dob_year; ?></td>
                    </tr>
                    <tr class="personal_info">
                    	<td class="title2">Mobile Phone</td>
                        <td class="output"><?php echo "0" . $mem_cell; ?></td>
                    </tr>
					<tr class="personal_info">
                    	<td class="title2">Home Phone</td>
                        <td class="output"><?php echo $mem_home; ?></td>
                    </tr>
         
                    <tr class="personal_info">
                    	<td class="title2">Address</td>
                        <td class="output"><?php echo $mem_addr; ?></td>
                    </tr>
                    <?php
						$get_ctry = "SELECT * FROM countries WHERE ctry_id = '$mem_ctry'";
						$run_ctry = mysqli_query($connection, $get_ctry);
						$row_ctry = mysqli_fetch_array($run_ctry);
							$ctry_id = $row_ctry['ctry_id'];
							$ctry_title = $row_ctry['ctry_name'];
						
                    ?>
					<tr class="personal_info">
                    	<td class="title2">Country</td>
                        <td class="output"><?php echo $ctry_title; ?></td>
                    </tr>
                    <?php
						if($mem_city == "28"){
							echo "<tr class='personal_info'>
									<td class='title2'>Current Location</td>
									<td class='output'>$other_city</td>
								</tr>";
						} else{
							
							$get_city = "SELECT * FROM city WHERE city_id = '$mem_city'";
							$run_city = mysqli_query($connection, $get_city);
							$row_city = mysqli_fetch_array($run_city);
								$city_id = $row_city['city_id'];
								$city_title = $row_city['city_name'];
					  
							echo "<tr class='personal_info'>
									<td class='title2'>Current Location</td>
									<td class='output'>$city_title</td>
								  </tr>";  
	
						}
                    ?>
					<tr class="personal_info">
                    	<td class="title2">Gender</td>
                        <td class="output"><?php echo $mem_gender; ?></td>
                    </tr>
                    
                    <form method="post" action="edit_profile.php?mem_id=<?php echo $mem_id; ?>&mem_city=<?php echo $mem_city; ?>">
                    <tr class="edit_personal_info">
                    	<td class="title2">First Name</td>
                        <td class="output"><input type="text" class="edit_fields" name="fname" required value="<?php echo $mem_first_name; ?>"></td>
                    </tr>
                    <tr class="edit_personal_info">
                    	<td class="title2">Last Name</td>
                        <td class="output"><input type="text" name="lname" class="edit_fields" required value="<?php echo $mem_last_name; ?>"></td>
                    </tr>
                    <tr class="edit_personal_info">
                    	<td class="title2">Mobile Phone</td>
                        <td class="output"><input type="text" name="mobile" class="edit_fields" required value="<?php echo $mem_cell; ?>"></td>
                    </tr>
                    <tr class="edit_personal_info">
                    	<td class="title2">Home Phone</td>
                        <td class="output"><input type="text" name="homeph" class="edit_fields" value="<?php echo $mem_home; ?>"></td>
                    </tr>
                   <tr class="edit_personal_info">
                    	<td class="title2">Address</td>
                        <td class="output"><input type="text" name="address" class="edit_fields" value="<?php echo $mem_addr; ?>">
                        </td>
                    </tr>  
					<tr class="edit_personal_info">
                    	<td class="title2">Country</td>
                        <td class="output">
                        	<select name="country" required class="profile_ddm">
                            	<option value="<?php echo $ctry_id; ?>"><?php echo $ctry_title; ?></option>
                                <?php
									$get_ctry1 = "SELECT * FROM countries order by ctry_name";
									$run_ctry1 = mysqli_query($connection, $get_ctry1);
									while($row_ctry1 = mysqli_fetch_array($run_ctry1)){
										$ctry_id1 = $row_ctry1['ctry_id'];
										$ctry_title1 = $row_ctry1['ctry_name'];
									echo "<option value='$ctry_id1'>$ctry_title1</option>";
								}
                    			?>
                            </select>
                        </td>
                    </tr>
              
                          <?php
						if($mem_city == "28"){
							echo "<tr class='edit_personal_info'>
									<td class='title2'>Current Location</td>
									<td class='output'>
									<input type='text' name='other_city' class='edit_fields' required value=' $other_city'>
									
									</td>
								</tr>";
						} else{
							
							$get_city = "SELECT * FROM city WHERE city_id = '$mem_city'";
							$run_city = mysqli_query($connection, $get_city);
							$row_city = mysqli_fetch_array($run_city);
								$city_id = $row_city['city_id'];
								$city_title = $row_city['city_name'];
					  
										
							echo "<tr class='edit_personal_info'>
                    				<td class='title2'>Current Location</td>
                        			<td class='output'>
                        				<select name='city' required class='profile_ddm'>
                            				<option value='$city_id'>$city_title</option>";
									  
							?>
                                <?php
                                	$get_city1 = 'SELECT * FROM city order by city_name';
									$run_city1 = mysqli_query($connection, $get_city1);
										while($row_city1 = mysqli_fetch_array($run_city1)){
											$city_id1 = $row_city1['city_id'];
											$city_title1 = $row_city1['city_name'];
										echo "<option value='$city_id1'>$city_title1</option>";
										}
								 ?>		
                            			</select>  
                        			</td>
                    			</tr>  
	
						<?php } ?>
                    
					<tr class="edit_personal_info">
                    	<td class="title2">Date of Birth</td>
                        <td class="output">
							<select name="day" required class="profile_ddm">
                            	<option value="<?php echo $mem_dob_day; ?>"><?php echo $mem_dob_day; ?></option>
                                <?php
									$get_day = "SELECT * FROM day";
									$run_day = mysqli_query($connection, $get_day);
									while($row_day = mysqli_fetch_array($run_day)){
										$day_id = $row_day['day_id'];
										$day_day = $row_day['day_day'];
										echo "<option value='$day_id'>$day_id</option>";
									}
                    			?>
							</select>
                            <select name="month" required class="profile_ddm">
                            	<option value="<?php echo $mon_id; ?>"><?php echo $mon_title; ?></option>
                                <?php
									$get_month1 = "SELECT * FROM months";
									$run_month1 = mysqli_query($connection, $get_month1);
									while($row_month1 = mysqli_fetch_array($run_month1)){
										$mon_id1 = $row_month1['month_id'];
										$mon_title1 = $row_month1['month_name'];
										echo "<option value='$mon_id1'>$mon_title1</option>";
									}
                    			?>
							</select>
                            <select name="year" required class="profile_ddm">
                            	<option value="<?php echo $mem_dob_year; ?>"><?php echo $mem_dob_year; ?></option>
                                <?php
									$get_year = "SELECT * FROM years";
									$run_year = mysqli_query($connection, $get_year);
									while($row_year = mysqli_fetch_array($run_year)){
										$year_id = $row_year['year_id'];
										$year_year = $row_year['year_year'];
										echo "<option value='$year_id'>$year_id</option>";
									}
                    			?>
							</select>
						</td>
                    </tr>
                    
					<tr class="edit_personal_info">
                    	<td class="title2">Gender</td>
                        <td class="output">
                            <select name="gender" required class="profile_ddm">
                            	<option value="<?php echo $mem_gender; ?>"><?php echo $mem_gender; ?></option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
							</select>

                        </td>
                    </tr>
                    <tr class="edit_personal_info">
                    	<td class="title2"></td>
                        <td class="output">
 							<input type="submit" name="update_info" class="btn btn-success btn-xs" value="Save">&nbsp;&nbsp;<button id="cancel_personal" class="btn btn-warning btn-xs">Cancel</button>
                        </td>
                    </tr>
					</form>
                    <?php
						if(isset($_POST['update_info'])){
							$edit_record = $_GET['mem_id'];
							$edit_city = $_GET['mem_city'];
							$fname = $_POST['fname'];
							$lname = $_POST['lname'];
							$mobile = $_POST['mobile'];
							$homeph = $_POST['homeph'];
							$addres = $_POST['address'];
							$country = $_POST['country'];
							$city = $_POST['city'];
							$other_city = $_POST['other_city'];
							$day = $_POST['day'];
							$month = $_POST['month'];
							$year = $_POST['year'];
							$gender = $_POST['gender'];
							
							if($edit_city == "28"){
								$update_info = "UPDATE members
									SET mem_first_name = '$fname',
										mem_last_name = '$lname',
										mem_gender = '$gender',
										mem_cell = '$mobile',
										mem_home_ph = '$homeph',
										dob_day = '$day',
										dob_month = '$month',
										dob_year = '$year',
										mem_addr = '$addres',
										mem_city_other = '$other_city',
										mem_country = '$country'
											WHERE mem_id = '$edit_record'";
						}
								else{
								$update_info = "UPDATE members
									SET mem_first_name = '$fname',
										mem_last_name = '$lname',
										mem_gender = '$gender',
										mem_cell = '$mobile',
										mem_home_ph = '$homeph',
										dob_day = '$day',
										dob_month = '$month',
										dob_year = '$year',
										mem_addr = '$addres',
										mem_city = '$city',
										mem_country = '$country'
											WHERE mem_id = '$edit_record'";
			
								}
							$run_update = mysqli_query($connection, $update_info);
							
							if($run_update){
								echo "<script>window.open('edit_profile.php?mem_id=$edit_record', '_self')</script>";
							} 
							else{
								die("Database query has failed" . mysqli_error());
							}
					
						}
                    ?>
					<tr class="success">
                    	<td>Professional Summary</td>
                        <td><button id="edit_summary" class="btn btn-primary btn-xs">Edit</button></td>
                    </tr>
                    <tr class="prof_summary">
                    	<td class="title2">Total Experience</td>
                        <td class="output"><?php echo $mem_exp_year . "&nbsp;years&nbsp;" . $mem_exp_month . "&nbsp;months"; ?></td>
                    </tr>
                    <?php
						$get_cat = "SELECT * FROM categories WHERE cat_id = '$mem_industry'";
						$run_cat = mysqli_query($connection, $get_cat);
						$row_cat = mysqli_fetch_array($run_cat);
							$cat_id = $row_cat['cat_id'];
							$cat_title = $row_cat['cat_title'];
						
                    ?>
                    <tr class="prof_summary">
                    	<td class="title2">Industry</td>
                        <td class="output"><?php echo $cat_title; ?></td>
                    </tr>
                                        
                    <tr class="prof_summary">
                    	<td class="title2">Resume Headline</td>
                        <td class="output"><?php echo $mem_cv_headline; ?></td>
                    </tr>
                    
                    <form method="post" action="edit_profile.php?mem_id=<?php echo $mem_id; ?>">
                    <tr class="edit_mem_summary">
                    	<td class="title2">Total Experience</td>
                        <td class="output">
                        	<select name="exp_year" required class="profile_ddm">
                            	<option value="<?php echo $mem_exp_year; ?>"><?php echo $mem_exp_year; ?></option>
                                <?php
					$get_exp_year = "SELECT * FROM experience";
					$run_exp_year = mysqli_query($connection, $get_exp_year);
					while($row_exp_year = mysqli_fetch_array($run_exp_year)){
						$exp_id = $row_exp_year['exp_id'];
						$exp_year = $row_exp_year['exp_years'];
						echo "<option value='$exp_year'>$exp_year</option>";
					}
	?>
				</select>
                            years
							<select name="exp_month" required class="profile_ddm">
                            	<option value="<?php echo $mem_exp_month; ?>"><?php echo $mem_exp_month; ?></option>
                                <?php
					$get_exp_month = "SELECT * FROM experience";
					$run_exp_month = mysqli_query($connection, $get_exp_month);
					while($row_exp_month = mysqli_fetch_array($run_exp_month)){
						$exp_id1 = $row_exp_month['exp_id'];
						$exp_month = $row_exp_month['exp_months'];
						echo "<option value='$exp_month'>$exp_month</option>";
					}
		?>
							</select>
							months
                        </td>
                    </tr>
                    
                    <tr class="edit_mem_summary">
                    	<td class="title2">Industry</td>
                        <td class="output">
                        <?php
							$get_cat = "SELECT * FROM categories WHERE cat_id = '$mem_industry'";
							$run_cat = mysqli_query($connection, $get_cat);
							$row_cat = mysqli_fetch_array($run_cat);
								$cat_id = $row_cat['cat_id'];
								$cat_title = $row_cat['cat_title'];
							
						?>
                        <select name="industry" required class="profile_ddm">
                        	<option value="<?php echo $cat_id; ?>"><?php echo $cat_title; ?></option>
                            <?php
								$get_cat1 = "SELECT * FROM categories order by cat_title";
								$run_cat1 = mysqli_query($connection, $get_cat1);
								while($row_cat1 = mysqli_fetch_array($run_cat1)){
									$cat_id1 = $row_cat1['cat_id'];
									$cat_title1 = $row_cat1['cat_title'];
									echo "<option value='$cat_id1'>$cat_title1</option>";
								}
							?>
                        </select>
                        </td>
                    </tr>
                    		
                    <tr class="edit_mem_summary">
                    	<td class="title2">Resume Headline</td>
                        <td class="output">
							<input type="text" name="headline" class="edit_fields" required value="<?php echo $mem_cv_headline; ?>" />
                        </td>
                    </tr>
                    
					<tr class="edit_mem_summary">
                    	<td class="title2"></td>
                        <td class="output">
 							<input type="submit" name="update_summary" class="btn btn-success btn-xs" value="Save">&nbsp;&nbsp;<button id="cancel_summary" class="btn btn-warning btn-xs">Cancel</button>
                        </td>
                    </tr>
					</form>
                    <?php
						if(isset($_POST['update_summary'])){
							$edit_record1 = $_GET['mem_id'];
							$expyear = $_POST['exp_year'];
							$expmonth = $_POST['exp_month'];
							$industry = $_POST['industry'];
							$headline = $_POST['headline'];
										
							$update_summ = "UPDATE members
								SET mem_exp_year = '$expyear',
									mem_exp_month = '$expmonth',
									profession_industry = '$industry',
									cv_headline = '$headline'
										WHERE mem_id = '$edit_record1'";
										
							$run_summ = mysqli_query($connection, $update_summ);
							
							if($run_summ){
								echo "<script>window.open('edit_profile.php?mem_id=$edit_record1', '_self')</script>";
							} 
							else{
								die("Database query has failed" . mysqli_error());
							}
					
						}
                    ?>
                    <tr class="success">
                    	<td>Education</td>
                        <td><button id="edit_qual" class="btn btn-primary btn-xs">Edit</button></td>
                    </tr>
                    <tr class="qualification">
                    	<td class="title2">Qualification</td>
                        <td class="output"><?php echo $mem_degree_title; ?></td>
                    </tr>
                    <tr class="qualification">
                    	<td class="title2">Specialization/Majors</td>
                        <td class="output"><?php echo $mem_majors; ?></td>
                    </tr>
                    <tr class="qualification">
                    	<td class="title2">Institute</td>
                        <td class="output"><?php echo $mem_inst; ?></td>
                    </tr>
                    <tr class="qualification">
                    	<td class="title2">Institute City</td>
                        <td class="output"><?php echo $mem_inst_city; ?></td>
                    </tr>
              <?php
					$get_ctry5 = "SELECT * FROM countries WHERE ctry_id = '$mem_inst_ctry'";
					$run_ctry5 = mysqli_query($connection, $get_ctry5);
					$row_ctry5 = mysqli_fetch_array($run_ctry5);
						$ctry_id5 = $row_ctry5['ctry_id'];
						$ctry_title5 = $row_ctry5['ctry_name'];
					
                    ?>
                    <tr class="qualification">
                    	<td class="title2">Institute Country</td>
                        <td class="output"><?php echo $ctry_title5; ?></td>
                    </tr>
	                <tr class="qualification">
                    	<td class="title2">Year of Passing</td>
                        <td class="output"><?php echo $mem_year_pass; ?></td>
                    </tr>
                    
                    <form method="post" action="edit_profile.php?mem_id=<?php echo $mem_id; ?>">
                    <tr class="edit_mem_qual">
                    	<td class="title2">Qualification</td>
                        <td class="output">
                           <select name="qual" class="profile_ddm">
            					<option value="<?php echo $mem_degree_title; ?>"><?php echo $mem_degree_title; ?></option>
            					<option value="No Formal Education">No Formal Education</option>
            					<option value="SSC/Matric/O-Level">SSC/Matric/O-Level</option>
            					<option value="HSSC/Intermediate/A-Level">HSSC/Intermediate/A-Level</option>
            					<option value="Graduation (2-Y)">Graduation (2-Y)</option>
            					<option value="Graduation (4-Y)Hons">Graduation (4-Y)Hons</option>
            					<option value="Masters (2-Y)">Masters (2-Y)</option>
            					<option value="Post Graduation/MS/M.Phil">Post Graduation/MS/M.Phil</option>
            					<option value="Doctorate/PhD">Doctorate/PhD</option>
            					<option value="Post Doctorate">Post Doctorate</option>
            					<option value="Other">Other</option>
        					</select>

                        </td>
                    </tr>
                    <tr class="edit_mem_qual">
                    	<td class="title2">Specialization/Majors</td>
                        <td class="output">
                        <input type="text" name="majors" class="edit_fields" value="<?php echo $mem_majors; ?>">
                        </td>
                    </tr>
                    <tr class="edit_mem_qual">
                    	<td class="title2">Institute</td>
                        <td class="output">
                        <input type="text" name="inst" class="edit_fields" value="<?php echo $mem_inst; ?>">
						
                        </td>
                    </tr>
                    <tr class="edit_mem_qual">
                    	<td class="title2">Institute City</td>
                        <td class="output">
                        <input type="text" name="instcity" class="edit_fields" value="<?php echo $mem_inst_city; ?>">
	
                        </td>
                    </tr>
                      <?php
						$get_ctry7 = "SELECT * FROM countries WHERE ctry_id = '$mem_inst_ctry'";
						$run_ctry7 = mysqli_query($connection, $get_ctry7);
						$row_ctry7 = mysqli_fetch_array($run_ctry7);
							$ctry_id7 = $row_ctry7['ctry_id'];
							$ctry_title7 = $row_ctry7['ctry_name'];
						
                    ?>
                    <tr class="edit_mem_qual">
                    	<td class="title2">Institute Country</td>
                        <td class="output">
                        <select name="instctry" class="profile_ddm">
                        	<option value="<?php echo $ctry_id7; ?>"><?php echo $ctry_title7; ?></option>
                            <?php
								$get_ctry6 = "SELECT * FROM countries";
								$run_ctry6 = mysqli_query($connection, $get_ctry6);
								while($row_ctry6 = mysqli_fetch_array($run_ctry6)){
									$ctry_id6 = $row_ctry6['ctry_id'];
									$ctry_title6 = $row_ctry6['ctry_name'];
									echo "<option value='$ctry_id6'>$ctry_title6</option>";
								}
 		                   ?>
                        </select>
						
                        </td>
                    </tr>
	                <tr class="edit_mem_qual">
                    	<td class="title2">Year of Passing</td>
                        <td class="output">
                        	<input type="text" name="passing" class="edit_fields" value="<?php echo $mem_year_pass; ?>">
                        </td>
                    </tr>
					<tr class="edit_mem_qual">
                    	<td class="title2"></td>
                        <td class="output">
 							<input type="submit" name="update_qual" class="btn btn-success btn-xs" value="Save">&nbsp;&nbsp;<button id="cancel_qual" class="btn btn-warning btn-xs">Cancel</button>
                        </td>
                    </tr>
					</form>
					<?php
						if(isset($_POST['update_qual'])){
							$edit_record2 = $_GET['mem_id'];
							$qual = $_POST['qual'];
							$majors = $_POST['majors'];
							$insti = $_POST['inst'];
							$icity = $_POST['instcity'];
							$ictry = $_POST['instctry'];
							$passing = $_POST['passing'];
										
							$update_qual = "UPDATE members
									SET degree_title = '$qual',
										degree_city = '$icity',
										degree_ctry = '$ictry',
										majors = '$majors',
										institution = '$insti',
										completion_year = '$passing'
											WHERE mem_id = '$edit_record2'";
											
							$run_qual = mysqli_query($connection, $update_qual);
							
							if($run_qual){
								echo "<script>window.open('edit_profile.php?mem_id=$edit_record2', '_self')</script>";
							} 
							else{
								die("Database query has failed" . mysqli_error());
							}
					
						}
                    ?>
                    
                    <tr class="success">
                    	<td>Employment Details</td>
                        <td><button class="btn btn-primary btn-xs" id="edit_employment">Edit</button></td>
                    </tr>
                    <tr class="empl_details">
                    	<td class="title2">Current/Most Recent Job</td>
                        <td class="output"><?php echo $current_job; ?></td>
                    </tr>
                    <tr class="empl_details">
                    	<td class="title2">Current/Most Recent Employer</td>
                        <td class="output"><?php echo $current_empl; ?></td>
                    </tr>
                   
					<tr class="empl_details">
                    	<td class="title2">Employer City</td>
                        <td class="output"><?php echo $empl_city; ?></td>
                    </tr>
                    <?php
						$get_ctry3 = "SELECT * FROM countries WHERE ctry_id = '$empl_ctry'";
						$run_ctry3 = mysqli_query($connection, $get_ctry3);
						$row_ctry3 = mysqli_fetch_array($run_ctry3);
							$ctry_id3 = $row_ctry3['ctry_id'];
							$ctry_title3 = $row_ctry3['ctry_name'];
						
                    ?>
                    <tr class="empl_details">
                    	<td class="title2">Employer Country</td>
                        <td class="output"><?php echo $ctry_title3; ?></td>
                    </tr>
					<tr class="empl_details">
                    	<td class="title2">Duration</td>
                        <?php
						$get_month1 = "SELECT * FROM months WHERE month_id = '$empl_month'";
						$run_month1 = mysqli_query($connection, $get_month1);
						$row_month1 = mysqli_fetch_array($run_month1);
							$mon_id1 = $row_month1['month_id'];
							$mon_title1 = $row_month1['month_name'];
						
                    	?>

                        <td class="output">
							<?php echo $mon_title1; ?> - <?php echo $empl_year; ?> to <?php echo $empl_end; ?>
                        </td>
                    </tr>
                    <form method="post" action="edit_profile.php?mem_id=<?php echo $mem_id; ?>">
					<tr class="edit_empl_details">
                    	<td class="title2">Current/Most Recent Job</td>
                        <td class="output">
                        	<input type="text" name="cjob" class="edit_fields" value="<?php echo $current_job; ?>" />
                        </td>
                    </tr>
                    <tr class="edit_empl_details">
                    	<td class="title2">Current/Most Recent Employer</td>
                        <td class="output">
							<input type="text" name="cempl" class="edit_fields" value="<?php echo $current_empl; ?>" />
                        </td>
                    </tr>
                    
					<tr class="edit_empl_details">
                    	<td class="title2">Employer City</td>
                        <td class="output">
                    	    <input type="text" name="ccity" class="edit_fields" value="<?php echo $empl_city; ?>" />
                        </td>
                    </tr>
					  <?php
						$get_ctry3 = "SELECT * FROM countries WHERE ctry_id = '$empl_ctry'";
						$run_ctry3 = mysqli_query($connection, $get_ctry3);
						$row_ctry3 = mysqli_fetch_array($run_ctry3);
							$ctry_id3 = $row_ctry3['ctry_id'];
							$ctry_title3 = $row_ctry3['ctry_name'];
						
                    ?>
                    <tr class="edit_empl_details">
                    	<td class="title2">Employer Country</td>
                        <td class="output">
							<select name="cctry" class="profile_ddm">
                            <option value="<?php echo $ctry_id3; ?>"><?php echo $ctry_title3; ?></option>
                                <?php
					$get_ctry4 = "SELECT * FROM countries order by ctry_name";
					$run_ctry4 = mysqli_query($connection, $get_ctry4);
					while($row_ctry4 = mysqli_fetch_array($run_ctry4)){
						$ctry_id4 = $row_ctry4['ctry_id'];
						$ctry_title4 = $row_ctry4['ctry_name'];
					echo "<option value='$ctry_id4'>$ctry_title4</option>";
				}
	?>
                            </select>	
                            
                        </td>
                    </tr>
                    <tr class="edit_empl_details">
                    	<td class="title2">Duration</td>
                        <?php
						$get_month1 = "SELECT * FROM months WHERE month_id = '$empl_month'";
						$run_month1 = mysqli_query($connection, $get_month1);
						$row_month1 = mysqli_fetch_array($run_month1);
							$mon_id1 = $row_month1['month_id'];
							$mon_title1 = $row_month1['month_name'];
						
                    	?>

                        <td class="output">
                        	<select name="cemonth" class="profile_ddm">
                            	<option value="<?php echo $mon_id1; ?>"><?php echo $mon_title1; ?></option>
                                <?php
						$get_new_month = "SELECT * FROM months";
						$run_new_month = mysqli_query($connection, $get_new_month);
						while($row_new_month = mysqli_fetch_array($run_new_month)){
							$new_month_id = $row_new_month['month_id'];
							$new_month_title = $row_new_month['month_name'];
							echo "<option value='$new_month_id'>$new_month_title</option>";
						}
        ?>
            </select>
                            <select name="ceyear" required class="profile_ddm">
                            	<option value="<?php echo $empl_year;; ?>"><?php echo $empl_year; ?></option>
                                <?php
					$get_new_year = "SELECT * FROM years order by year_year desc";
					$run_new_year = mysqli_query($connection, $get_new_year);
					while($row_new_year = mysqli_fetch_array($run_new_year)){
						$new_year_id = $row_new_year['year_id'];
						$new_year_year = $row_new_year['year_year'];
						echo "<option value='$new_year_id'>$new_year_id</option>";
					}
		?>
							</select> to 
                            <select name="ceenddate" class="profile_ddm">
                        		<option value="<?php echo $empl_end; ?>"><?php echo $empl_end; ?></option>
                        		<option value="Present">Presently Working</option>
                        		<?php
						$getyear4 = "select * from years order by year_year desc";
						$runyear4 = mysqli_query($connection, $getyear4);
						while($rowyear4 = mysqli_fetch_array($runyear4)){
							$yid4 = $rowyear4['year_id'];
							$yyear4 = $rowyear4['year_year'];
							echo "<option value='$yid4'>$yyear4</option>";
						}
			?>
    		</select>				

                        </td>
                    </tr>        
                    <tr class="edit_empl_details">
                    	<td class="title2"></td>
                        <td class="output">
 							<input type="submit" name="update_job" class="btn btn-success btn-xs" value="Save">&nbsp;&nbsp;<button id="cancel_emp" class="btn btn-warning btn-xs">Cancel</button>
                        </td>
                    </tr>
					</form>
                    <?php
						if(isset($_POST['update_job'])){
							$edit_record1 = $_GET['mem_id'];
							$cjob = $_POST['cjob'];
							$cempl = $_POST['cempl'];
							$ccity = $_POST['ccity'];
							$cctry = $_POST['cctry'];
							$cemonth = $_POST['cemonth'];
							$ceyear = $_POST['ceyear'];
							$cenddate = $_POST['ceenddate'];  
							
										
							$update_emp = "UPDATE members
								SET current_job = '$cjob',
									current_job_month = '$cemonth', 
									current_job_year = '$ceyear',
									current_end_date = '$cenddate',
									comp_name = '$cempl',
									comp_ctry = '$cctry',
									comp_city = '$ccity'
										WHERE mem_id = '$edit_record1'";
												
							$run_emp = mysqli_query($connection, $update_emp);
							
							if($run_emp){
								echo "<script>window.open('edit_profile.php?mem_id=$edit_record1', '_self')</script>";
							} 
							else{
								die("Database query has failed" . mysqli_error());
							}
					
						}
                    ?>

                    <tr class="success">
                    	<td>Skills</td>
                        <td><button id="edit_skill" class="btn btn-primary btn-xs">Edit</button></td>
                    </tr>
                    <tr class="mem_skills">
                    	<td class="title2">IT Skills</td>
                        <td class="output"><?php echo $mem_it_skills; ?></td>
                    </tr>
					<tr class="mem_skills">
                    	<td class="title2">Other Skills</td>
                        <td class="output"><?php echo $mem_other_skills; ?></td>
                    </tr>
                    
                    <form method="post" role="form" action="edit_profile.php?mem_id=<?php echo $mem_id; ?>">
                    <tr class="edit_mem_skills">
                    	<td class="title2">IT Skills</td>
                        <td class="output"><input type="text" name="itskills" class="form-control" value="<?php echo $mem_it_skills; ?>"></td>
                    </tr>
					<tr class="edit_mem_skills">
                    	<td class="title2">Other Skills</td>
                        <td class="output"><input type="text" name="otherskills" class="form-control" value="<?php echo $mem_other_skills; ?>"></td>
                    </tr>
					<tr class="edit_mem_skills">
                    	<td class="title2"></td>
                        <td class="output">
 							<input type="submit" name="update_skills" class="btn btn-success btn-xs" value="Save">&nbsp;&nbsp;<button id="cancel_skills" class="btn btn-warning btn-xs">Cancel</button>
                        </td>
                    </tr>
					</form>
                    <?php
						if(isset($_POST['update_skills'])){
							$edit_record3 = $_GET['mem_id'];
							$itskill = $_POST['itskills'];
							$otherskill = $_POST['otherskills'];
										
							$update_skill = "UPDATE members
									SET mem_it_skills = '$itskill',
										mem_other_skills = '$otherskill'
											WHERE mem_id = '$edit_record3'";
											
							$run_skill = mysqli_query($connection, $update_skill);
							
							if($run_skill){
								echo "<script>window.open('edit_profile.php?mem_id=$edit_record3', '_self')</script>";
							} 
							else{
								die("Database query has failed" . mysqli_error());
							}
					
						}
                    ?>

					<tr class="success">
                    	<td>Others</td>
                        <td><button class="btn btn-primary btn-xs">Edit</button></td>
                    </tr>
                  </tbody>   
<?php } ?>
                  </table>
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