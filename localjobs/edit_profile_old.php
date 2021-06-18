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
		$mem_city = $row_member['mem_city'];
		$mem_ctry = $row_member['mem_country'];
		$mem_degree = $row_member['degree_level'];
		$mem_degree_title = $row_member['degree_title'];
		$mem_majors = $row_member['majors'];
		$mem_year_pass = $row_member['completion_year'];
		$mem_exp_year = $row_member['mem_exp_year'];
		$mem_exp_month = $row_member['mem_exp_month'];
		$mem_industry = $row_member['profession_industry'];
		$mem_role = $row_member['current_job'];
		$mem_cv_headline = $row_member['cv_headline'];
		$mem_cv_name = $row_member['mem_cv'];
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>THElocal Jobs</title>
    <link rel="stylesheet" type="text/css" href="styles/index_style.css" />
    <link rel="stylesheet" type="text/css" href="styles/third_style.css" />
    <link href="styles/ddmenu.css" rel="stylesheet" type="text/css" />
    <script src="js/ddmenu.js" type="text/javascript"></script>
</head>

<body>

<div id="container">

	<!-- This is top bar -->
	<div id="topbar">
		<div id="topleft">
        	<ul>
            <?php
        		if(!isset($_SESSION['username'])){
					echo "<li>Welcome: </li>";
					echo "<li><a href='jobseeker_login.php'> Login</a></li>";
				}else{
					echo "<li><b>Welcome: </b>" . $_SESSION['username'] . "</li>";
					echo "<li><a href='members_logout.php'> Logout</a></li>";
				}
			?> 
            </ul>   
        </div>
        <div id="topright">
        If you are a Employer? <a href="#">Click here</a>
        </div>
	</div>

	<!-- This is header -->
	<div id="header">
		<img src="images/blue1.png" style="border: 1px solid #FFF; margin-top: 7px;"/>
    </div>
        <!-- This is navigation bar -->
    <nav id="ddmenu">
      <!--  <div id="nav">
        	<ul>
                <li><a href="index.php">HOME</a></li>
                <li><a href="all_latest_jobs.php">BROWSE JOBS</a></li>  
                <li><a href="search_result.php">SEARCH JOBS</a></li>
                <?php 
				/*	if(isset($_SESSION['username'])){
						echo "<li><a href='my_account.php' style='background-color: #6B8E23; color: #FFF;'>DASH BOARD</a></li>";
					}else{
						echo "<li><a href='members_register.php'>POST RESUME</a></li>";
					}  */
				?>
 
                <li><a href="#">EMPLOYERS</a></li>

        	</ul>
    	</div>  -->
        <?php include("includes/top-nav.php"); ?>
	</nav>

	<!-- This is start of main content area -->
	<div id="contents" style="border: 0px solid red; width: 980px;">
    	<div id="view_profile">
        	<h1>Edit Resume&nbsp;<span>(My Active Resume)</span><span id="emp_preview"><img src="images/zoom_in.png" width="12" height="12"/>&nbsp;<a href="#" style="color: #20B2AA;">Employer Preview</a></span></h1>
        	<div id="inside">
            	<h2><?php echo $mem_cv_headline; ?></h2>
                <form name="" method="post" action="edit_profile.php?edit_form=<?php echo $mem_id; ?>" enctype="multipart/form-data">
                <table width="930" cellspacing="10" border="0" align="center" style="background-color: #FFF;">
                	<tr>
                    	<td class="heading2">Resume</td>
                        <td class="heading3"></td>
                    </tr>
                    <tr>
                    	<td class="title2">Resume Name</td>
                        <td class="output"><?php echo $mem_cv_name; ?> &nbsp;<span> <a href="#">Update</a> | <a href="#">Preview</a> | <a href="#">Download</a></span></td>
                    </tr>
                    <tr>
                    	<td class="heading2">Edit Personal Information</td>
                        <td class="heading3"><span>Edit</span></td>
                    </tr>
					<tr>
                    	<td class="title2">First Name</td>
                        <td><input type="text" name="f_name" value="<?php echo $mem_first_name; ?>" style="width: 300px; padding: 5px;"/></td>
                    </tr>
                    <tr>
                    	<td class="title2">Last Name</td>
                        <td><input type="text" name="l_name" value="<?php echo $mem_last_name; ?>" style="width: 300px; padding: 5px;"/></td>
                    </tr>
					<tr>
                    	<td class="title2">Country</td>
                        <td>
                 		    <select name="m_ctry" style="padding: 5px;" required>
                                 <option value="<?php echo $mem_ctry; ?>"><?php echo $mem_ctry; ?></option>
                                 <?php
                                    $get_ctry = "select * from countries ORDER BY ctry_name";
                                    $run_ctry = mysqli_query($connection, $get_ctry);
                                    while($row_ctry = mysqli_fetch_array($run_ctry)){
                                    $ctry_id = $row_ctry['ctry_id'];
                                    $ctry_name = $row_ctry['ctry_name'];
                                        echo "<option value='$ctry_id'>$ctry_name</option>";
                                    }
                                ?>
                             </select>
                        </td>
                    </tr>
					<tr>
                    	<td class="title2">Current Location</td>
                        <td>
    	<input type="text" name="m_city" style="width: 130px; padding: 5px;" value="<?php echo $mem_city; ?>" />
    </td>
 
                    </tr>
					<tr>
                    	<td class="title2">Date of Birth</td>
                        <td>
                            <select name="dob_day" style="padding: 5px;">
                                <option value="<?php echo $mem_dob_day; ?>"><?php echo $mem_dob_day; ?></option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                                <option value="19">19</option>
                                <option value="20">20</option>
                                <option value="21">21</option>
                                <option value="22">22</option>
                                <option value="23">23</option>
                                <option value="24">24</option>
                                <option value="25">25</option>
                                <option value="26">26</option>
                                <option value="27">27</option>
                                <option value="28">28</option>
                                <option value="29">29</option>
                                <option value="30">30</option>
                                <option value="31">31</option>
                            </select>
                            <select name="dob_month" style="padding: 5px;">
                                <option value="<?php echo $mem_dob_month; ?>"><?php echo $mem_dob_month; ?></option>
                                <option value="January">January</option>
                                <option value="February">February</option>
                                <option value="March">March</option>
                                <option value="April">April</option>
                                <option value="May">May</option>
                                <option value="June">June</option>
                                <option value="July">July</option>
                                <option value="August">August</option>
                                <option value="September">September</option>
                                <option value="October">October</option>
                                <option value="November">November</option>
                                <option value="December">December</option>
                            </select>
                            <select name="dob_year" style="padding: 5px;">
                                <option value="<?php echo $mem_dob_year; ?>"><?php echo $mem_dob_year; ?></option>
                                <option value="1950">1950</option>
                                <option value="1951">1951</option>
                                <option value="1952">1952</option>
                                <option value="1953">1953</option>
                                <option value="1954">1954</option>
                                <option value="1955">1955</option>
                                <option value="1956">1956</option>
                                <option value="1957">1957</option>
                                <option value="1958">1958</option>
                                <option value="1959">1959</option>
                                <option value="1960">1960</option>
                                <option value="1961">1961</option>
                                <option value="1962">1962</option>
                                <option value="1963">1963</option>
                                <option value="1964">1964</option>
                                <option value="1965">1965</option>
                                <option value="1966">1966</option>
                                <option value="1967">1967</option>
                                <option value="1968">1968</option>
                                <option value="1969">1969</option>
                                <option value="1970">1970</option>
                                <option value="1971">1971</option>
                                <option value="1972">1972</option>
                                <option value="1973">1973</option>
                                <option value="1974">1974</option>
                                <option value="1975">1975</option>
                                <option value="1976">1976</option>
                                <option value="1977">1977</option>
                                <option value="1978">1978</option>
                                <option value="1979">1979</option>
                                <option value="1980">1980</option>
                                <option value="1981">1981</option>
                                <option value="1982">1982</option>
                                <option value="1983">1983</option>
                                <option value="1984">1984</option>
                                <option value="1985">1985</option>
                                <option value="1986">1986</option>
                                <option value="1987">1987</option>
                                <option value="1988">1988</option>
                                <option value="1989">1989</option>
                                <option value="1990">1990</option>
                                <option value="1991">1991</option>
                                <option value="1992">1992</option>
                                <option value="1993">1993</option>
                                <option value="1994">1994</option>
                                <option value="1995">1995</option>
                                <option value="1996">1996</option>
                                <option value="1997">1997</option>
                                <option value="1998">1998</option>
                                <option value="1999">1999</option>
                                <option value="2000">2000</option>
                                <option value="2001">2001</option>
                                <option value="2002">2002</option>
                                <option value="2003">2003</option>
                                <option value="2004">2004</option>
                                <option value="2005">2005</option>
                                <option value="2006">2006</option>
                                <option value="2007">2007</option>
                                <option value="2008">2008</option>
                                <option value="2009">2009</option>
                                <option value="2010">2010</option>
                                <option value="2011">2011</option>
                                <option value="2012">2012</option>
                                <option value="2013">2013</option>
                                <option value="2014">2014</option>
                                <option value="2015">2015</option>
                                <option value="2016">2016</option>
                                <option value="2017">2017</option>
                                <option value="2018">2018</option>
                                <option value="2019">2019</option>
                                <option value="2020">2020</option>
							</select>                    
                        </td>
                    </tr>
					<tr>
                    	<td class="title2">Gender</td>
                        <td>
                        	<select name="m_gender" style="padding: 5px;">
                            	<option value="<?php echo $mem_gender; ?>"><?php echo $mem_gender; ?></option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
					    </td>
                    </tr>
					<tr>
                    	<td class="heading2">Professional Summary</td>
                        <td class="heading3"><span>Edit</span></td>
                    </tr>
                    <tr>
                    	<td class="title2">Total Experience</td>
                        <td>
                            <select name="m_exp_year" style="padding: 5px;">
                                <option value="<?php echo $mem_exp_year; ?>"><?php echo $mem_exp_year; ?></option>
                                <option value="fresh">Fresh</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="10+">10+</option>
                            </select>
                            <select name="m_exp_month" style="padding: 5px;">
                                <option value="<?php echo $mem_exp_month; ?>"><?php echo $mem_exp_month; ?></option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                            </select>
                        </td>

                    </tr>
                    <tr>
                    	<td class="title2">Industry</td>
                        <td>
                            <select name="industry" style="padding: 5px;" required>
                                <option value="<?php echo $mem_industry; ?>"><?php echo $mem_industry; ?></option>
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
                    	<td class="title2">Role</td>
                        <td><input type="text" name="current_job_title" style="width: 300px; padding: 5px;" value="<?php echo $mem_role; ?>"/></td>
                    </tr>
                    <tr>
                    	<td class="title2">Key Skills</td>
                        <td class="output">C++, HTML5, PHP, MySQL, JavaScript, AJAX, JQuery, Oracle 11G, SQL Server 2008, Dreamweaver CS6, Wordpress 4.1, SEO, Web Security, Responsive Web Design</td>
                    </tr>
                    <tr>
                    	<td class="title2">Resume Headline</td>
                        <td><input type="text" name="cv_headline" value="<?php echo $mem_cv_headline; ?>" style="width: 300px; padding: 5px;" /></td>
                    </tr>
                    <tr>
                    	<td class="heading2">Education</td>
                        <td class="heading3"><span>Edit</span></td>
                    </tr>
                    <tr>
                    	<td class="title2">Qualification</td>
                        <td><input type="text" name="degree_title" value="<?php echo $mem_degree_title; ?>" style="width: 300px; padding: 5px;"/></td>

                    </tr>
                    <tr>
                    	<td class="title2">Specialization</td>
                        <td><input type="text" name="majors" value="<?php echo $mem_majors; ?>" style="width: 300px; padding: 5px;"/></td>
                    </tr>
	                <tr>
                    	<td class="title2">Year of Passing</td>
                        <td>
                            <select name="complete_year" required style="padding: 5px;">
                                <option value="<?php echo $mem_year_pass; ?>"><?php echo $mem_year_pass; ?></option>
                                <option value="1950">1950</option>
                                <option value="1951">1951</option>
                                <option value="1952">1952</option>
                                <option value="1953">1953</option>
                                <option value="1954">1954</option>
                                <option value="1955">1955</option>
                                <option value="1956">1956</option>
                                <option value="1957">1957</option>
                                <option value="1958">1958</option>
                                <option value="1959">1959</option>
                                <option value="1960">1960</option>
                                <option value="1961">1961</option>
                                <option value="1962">1962</option>
                                <option value="1963">1963</option>
                                <option value="1964">1964</option>
                                <option value="1965">1965</option>
                                <option value="1966">1966</option>
                                <option value="1967">1967</option>
                                <option value="1968">1968</option>
                                <option value="1969">1969</option>
                                <option value="1970">1970</option>
                                <option value="1971">1971</option>
                                <option value="1972">1972</option>
                                <option value="1973">1973</option>
                                <option value="1974">1974</option>
                                <option value="1975">1975</option>
                                <option value="1976">1976</option>
                                <option value="1977">1977</option>
                                <option value="1978">1978</option>
                                <option value="1979">1979</option>
                                <option value="1980">1980</option>
                                <option value="1981">1981</option>
                                <option value="1982">1982</option>
                                <option value="1983">1983</option>
                                <option value="1984">1984</option>
                                <option value="1985">1985</option>
                                <option value="1986">1986</option>
                                <option value="1987">1987</option>
                                <option value="1988">1988</option>
                                <option value="1989">1989</option>
                                <option value="1990">1990</option>
                                <option value="1991">1991</option>
                                <option value="1992">1992</option>
                                <option value="1993">1993</option>
                                <option value="1994">1994</option>
                                <option value="1995">1995</option>
                                <option value="1996">1996</option>
                                <option value="1997">1997</option>
                                <option value="1998">1998</option>
                                <option value="1999">1999</option>
                                <option value="2000">2000</option>
                                <option value="2001">2001</option>
                                <option value="2002">2002</option>
                                <option value="2003">2003</option>
                                <option value="2004">2004</option>
                                <option value="2005">2005</option>
                                <option value="2006">2006</option>
                                <option value="2007">2007</option>
                                <option value="2008">2008</option>
                                <option value="2009">2009</option>
                                <option value="2010">2010</option>
                                <option value="2011">2011</option>
                                <option value="2012">2012</option>
                                <option value="2013">2013</option>
                                <option value="2014">2014</option>
                                <option value="2015">2015</option>
                                <option value="2016">2016</option>
                                <option value="2017">2017</option>
                                <option value="2018">2018</option>
                                <option value="2019">2019</option>
                                <option value="2020">2020</option>
                            </select>
						</td>
                    </tr>
                    <tr>
                    	<td class="heading2">Employment Details</td>
                        <td class="heading3"><span>Edit</span></td>
                    </tr>
                    <tr>
                    	<td class="heading2">IT Skills</td>
                        <td class="heading3"><span>Edit</span></td>
                    </tr>
					<tr>
                    	<td class="heading2">Others</td>
                        <td class="heading3"><span>Edit</span></td>
                    </tr>
                    <tr>
                    	<td></td>
                        <td id="butt"><input type="submit" name="update" value="Update Resume"></td>
                    </tr>
<?php } ?>
                  </table>
                  </form>
            </div>
    	</div>
	</div>
    <!-- Main Content Ends -->
    
	<!-- This is side bar -->
	<div id="sidebar">
	</div>
	
	<!-- This is footer -->
	<div id="footer">
		<?php include("includes/footer_contents.php"); ?>
	</div>
    
</div>

</body>
</html>
<?php
	if(isset($_POST['update'])){
		$edit_record = $_GET['edit_form'];
		$first_name = $_POST['f_name'];
		$last_name = $_POST['l_name'];
		$country = $_POST['m_ctry'];
		$city = $_POST['m_city'];
		$dob_day = $_POST['dob_day'];
		$dob_month = $_POST['dob_month'];
		$dob_year = $_POST['dob_year'];
		$gender = $_POST['m_gender'];
		$exp_year = $_POST['m_exp_year'];
		$exp_month = $_POST['m_exp_month'];
		$industry = $_POST['industry'];
		$role = $_POST['current_job_title'];
		$cv_headline = $_POST['cv_headline'];
		$degree_title = $_POST['degree_title'];
		$majors = $_POST['majors'];
		$year_pass = $_POST['complete_year'];
		
		$update_query = "UPDATE members
						 SET mem_first_name = '$first_name',
						 	 mem_last_name = '$last_name',
							 mem_gender = '$gender',
							 dob_day = '$dob_day',
							 dob_month = '$dob_month',
							 dob_year = '$dob_year',
							 mem_country = '$country',
							 mem_city = '$city',
							 degree_title = '$degree_title',
							 majors = '$majors',
							 completion_year = '$year_pass',
							 mem_exp_year = '$exp_year',
							 mem_exp_month = '$exp_month',
							 profession_industry = '$industry',
							 current_job = '$role',
							 cv_headline = '$cv_headline'
							 	WHERE mem_id = '$edit_record'";
								
		$run_update = mysqli_query($connection, $update_query);
		
		if($run_update){
			echo "<script>window.open('my_account.php?updated=Your profile has been updated successfully...!','_self')</script>";
		}else{
			die("database query has failed" . mysqli_error());
		}
	}
?>