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
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="styles/index_style.css" />
    <link rel="stylesheet" type="text/css" href="styles/third_style.css" />
    <link rel="stylesheet" type="text/css" href="styles/fifth_style.css" />
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
		<img src="images/blue1.png" style="border: 1px solid #FFF;" class="img-responsive" alt="Responsive image"/>
    </div>
        <!-- This is navigation bar -->
    <nav id="ddmenu" class="row">
        <?php include("includes/top-nav.php"); ?>
	</nav>

	<!-- This is start of main content area -->
	<div id="contents" style="border: 0px solid red;" class="row">
    	<div id="view_profile" class="col-md-12 col-sm-12 col-xs-12">
          <div class="row">	
        	<h1 class="col-md-4 col-sm-4 col-xs-12">
            	View Resume/CV&nbsp;<span>(My Active Resume)</span>
            </h1>
            <div id="profile_button" class="col-md-4 col-md-offset-4 col-sm-4 col-sm-offset-4 hidden-xs">    
                <label class="emp_preview"><span class="glyphicon glyphicon-search"></span><a href="#" style="color: #20B2AA;"> Employer Preview</a></label>
                <label class="edit_preview"><span class="glyphicon glyphicon-edit"></span><a href="edit_profile.php?mem_id=<?php echo $mem_id; ?>" style="color: #20B2AA;"> Edit Resume</a></label>
            </div>
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
                            <td class="output"><?php echo $mem_cv_name; ?></td>
                        </tr>
                        <tr class="success">
                            <td>Personal Information</td>
                            <td class="heading3"></td>
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
                        
                        <tr class="success">
                            <td>Professional Summary</td>
                            <td class="heading3"></td>
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
                            <td class="title2">Current Job</td>
                            <td class="output"><?php echo $current_job; ?></td>
                        </tr>
                        <tr class="prof_summary">
                            <td class="title2">Current Employer</td>
                            <td class="output"><?php echo $current_empl; ?></td>
                        </tr>
                       
                        <tr class="prof_summary">
                            <td class="title2">Employer City</td>
                            <td class="output"><?php echo $empl_city; ?></td>
                        </tr>
                        <?php
                            $get_ctry2 = "SELECT * FROM countries WHERE ctry_id = '$empl_ctry'";
                            $run_ctry2 = mysqli_query($connection, $get_ctry2);
                            $row_ctry2 = mysqli_fetch_array($run_ctry2);
                                $ctry_id2 = $row_ctry2['ctry_id'];
                                $ctry_title2 = $row_ctry2['ctry_name'];
                            
                        ?>
                        <tr class="prof_summary">
                            <td class="title2">Employer Country</td>
                            <td class="output"><?php echo $ctry_title2; ?></td>
                        </tr>
                        
                        <tr class="prof_summary">
                            <td class="title2">Resume Headline</td>
                            <td class="output"><?php echo $mem_cv_headline; ?></td>
                        </tr>
                        
                        <tr class="success">
                            <td>Education</td>
                            <td></td>
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
                        
                        <tr class="success">
                            <td>Employment Details</td>
                            <td></td>
                        </tr>
                        <tr class="success">
                            <td>Skills</td>
                            <td></td>
                        </tr>
                        <tr class="mem_skills">
                            <td class="title2">IT Skills</td>
                            <td class="output"><?php echo $mem_it_skills; ?></td>
                        </tr>
                        <tr class="mem_skills">
                            <td class="title2">Other Skills</td>
                            <td class="output"><?php echo $mem_other_skills; ?></td>
                        </tr>
                        
                        <tr class="success">
                            <td>Others</td>
                            <td></td>
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
