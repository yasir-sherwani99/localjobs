<form name="passcheck" method="post" action="" enctype="multipart/form-data" role="form" onSubmit="return confirmSubmit()">
<table border="0" class="table table-bordered">
  <tbody>
  <tr>
    <td colspan="3" class="form_top_title">Account Information</td>
  </tr>
   
  <tr>
    <td style="width: 150px;">Email<span style="color: #F00;">*</span></td>
    <td style="width: 200px;">
    <input type="email" name="m_email" id="email" placeholder="Register your current email address." class="form-control" required/>
    </td> 
    <td style="width: 200px;" id="correct1"><span id="error">&nbsp;</span></td>
  </tr>
  
  <tr>
    <td>Password<span style="color: #F00;">*</span></td>
    <td>
    <input type="password" name="m_pass" id="m_pass" class="form-control" placeholder="Password" required/>
    </td>
    <td id="correct2"><span class="error_mess" id="error1">&nbsp;</span></td>
  </tr>
  
  <tr>
    <td>Confirm Password<span style="color: #F00;">*</span></td>
    <td>
    <input type="password" name="m_pass1" id="m_pass1" class="form-control" placeholder="Confirm Password" required/>
    </td>
    <td><span class="error_mess" id="error2">&nbsp;</span></td>
  </tr>
  
  <tr>
    <td colspan="3" class="form_top_title">Personal & Contact Details</td>
  </tr>
  
  <tr>
    <td>First Name<span style="color: #F00;">*</span></td>
    <td>
    <input type="text" name="f_name" id="f_name" placeholder="Mention your first name" class="form-control" required/>
    </td>
    <td><span class="error_mess" id="error3">&nbsp;</span></td>
  </tr>
  
  <tr>
    <td>Last Name<span style="color: #F00;">*</span></td>
    <td>
    <input type="text" name="l_name" id="l_name" placeholder="Mention your last name" class="form-control" required/>
    </td>
    <td><span class="error_mess" id="error4">&nbsp;</span></td>
  </tr>
  
  <tr>
    <td>Gender<span style="color: #F00;">*</span></td>
    <td>
    	<input type="radio" name="m_gender" id="m_gender" value="Male" />&nbsp;Male
        <input type="radio" name="m_gender" id="m_gender" value="Female" />&nbsp;Female 
  
    </td>
    <td> <span class="error_mess" id="error5">&nbsp;</span></td>
  </tr>
  
  <tr>
    <td>Date of Birth<span style="color: #F00;">*</span></td>
    <td>
    	<select name="dob_day" id="dob_day" class="form_drop_down_menu" required>
			<option value="-1">Day</option>
            <?php
				$getday = "select * from day";
				$runday = mysqli_query($connection, $getday);
				while($rowday = mysqli_fetch_array($runday)){
					$did = $rowday['day_id'];
					$dday = $rowday['day_day'];
						echo "<option value='$did'>$dday</option>";
				}
            ?>
        </select>
        <select name="dob_month" id="dob_month" class="form_drop_down_menu" required>
			<option value="-1">Month</option>
            <?php
				$getmonth = "select * from months";
				$runmonth = mysqli_query($connection, $getmonth);
				while($rowmonth = mysqli_fetch_array($runmonth)){
					$mid = $rowmonth['month_id'];
					$mname = $rowmonth['month_name'];
						echo "<option value='$mid'>$mname</option>";
				}
            ?>
        </select>
        <select name="dob_year" id="dob_year" class="form_drop_down_menu" required>
			<option value="-1">Year</option>
            <?php
				$getyear = "select * from years";
				$runyear = mysqli_query($connection, $getyear);
				while($rowyear = mysqli_fetch_array($runyear)){
					$yid = $rowyear['year_id'];
					$yyear = $rowyear['year_year'];
						echo "<option value='$yid'>$yyear</option>";
				}
            ?>
        </select>
    </td>
    <td><span class="error_mess" id="error6">&nbsp;</span></td>
  </tr>
  
  <tr>
	<td>City<span style="color: #F00;">*</span></td>
    <td>
    	<select name="location" id="location" class="form-control" required>
        	<option value="-1">Select City</option>
            <?php
			$get_city = "select * from city order by city_name";
			$run_city = mysqli_query($connection, $get_city);
			while($row_city = mysqli_fetch_array($run_city)){
			$city_id = $row_city['city_id'];
			$city_title = $row_city['city_name'];
                echo "<option value='$city_id'>$city_title</option>";
			}
		?>
         </select>
    </td>
    <td><span class="error_mess" id="error30">&nbsp;</span></td>
  </tr>
  
  <tr id="other_loc">
	<td>City Name:</td>
    <td>
    	<input type="text" name="other_location" id="other_location" class="form-control" required />
    </td>
    <td id="correct9"><span class="error_mess" id="error31">&nbsp;</span></td>
  </tr>
	
  <tr>
    <td>Country<span style="color: #F00;">*</span></td>
    <td>
        <select name="m_ctry" id="m_ctry" class="form-control" required>
        <option value="-1">Select Country</option>
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
    <td><span class="error_mess" id="error7">&nbsp;</span></td>
  </tr>
  
  <tr>
    <td>Mobile Phone<span style="color: #F00;">*</span></td>
    <td>
    <input type="text" name="m_mobile" id="m_mobile" maxlength="12" placeholder="Example: 0321-1234567" class="form-control" required/>
    </td>
    <td><span class="error_mess" id="error8">&nbsp;</span></td>
  </tr>
  
  <tr>
    <td>Home Phone:</td>
    <td>
    <input type="text" name="h_mobile" placeholder="Example: +924231234567" class="form-control"/>
    </td>
    <td> <span class="error_mess" id="error9">&nbsp;</span></td>
  </tr>
  
  <tr>
    <td colspan="3" class="form_top_title">Educational Details</td>
  </tr>
  
  <tr>
    <td>Higest Degree<span style="color: #F00;">*</span></td>
    <td>
    	<select name="m_edu_level" id="m_edu_level" class="form-control" required>
            <option value="-1">Select</option>
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
    <td><span class="error_mess" id="error10">&nbsp;</span></td>
  </tr>
  
  <tr class="hide_edu_details">
    <td>Degree Title<span style="color: #F00;">*</span></td>
    <td>
    <input type="text" name="degree_title" id="degree_title" placeholder="Example: B.Sc (Hon's) in Computer Science" class="form-control" />
    </td>
    <td><span class="error_mess" id="error11">&nbsp;</span></td>
  </tr>
  
  <tr class="hide_edu_details">
    <td>Major Subject(s)<span style="color: #F00;">*</span></td>
    <td>
    	<input type="text" name="majors" id="majors" class="form-control" />
    </td>
    <td><span class="error_mess" id="error12">&nbsp;</span></td>
  </tr>
  
  <tr class="hide_edu_details">
    <td>City<span style="color: #F00;">*</span></td>
    <td>
    	<input type="text" name="institute_city" id="institute_city" class="form-control" />
    </td>
    <td><span class="error_mess" id="error46">&nbsp;</span></td>
  </tr>
  
  <tr class="hide_edu_details">
  	<td>Country<span style="color: #F00;">*</span></td>
    <td>     
         <select name="institute_ctry" id="institute_ctry" class="form-control">
         <option value="-1">Select Country</option>
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
    <td><span class="error_mess" id="error13">&nbsp;</span></td>
  </tr>
  
  <tr class="hide_edu_details">
    <td>Institution<span style="color: #F00;">*</span></td>
    <td>
    	<input type="text" name="institute_name" id="institute_name" class="form-control"/>
    </td>
    <td><span class="error_mess" id="error14">&nbsp;</span></td>
  </tr>
  
  <tr class="hide_edu_details">
    <td>Completion Year<span style="color: #F00;">*</span></td>
    <td>
        <select name="complete_year" id="complete_year" class="form-control">
			<option value="-1">Select Year</option>
            <?php
				$getyear1 = "select * from years order by year_year desc";
				$runyear1 = mysqli_query($connection, $getyear1);
				while($rowyear1 = mysqli_fetch_array($runyear1)){
					$yid1 = $rowyear1['year_id'];
					$yyear1 = $rowyear1['year_year'];
						echo "<option value='$yid1'>$yyear1</option>";
				}
            ?>
        </select>
    </td>
    <td><span class="error_mess" id="error15">&nbsp;</span></td>
  </tr>
  
  <tr>
    <td colspan="3" class="form_top_title">Professional Summary</td>
  </tr>
  
  <tr>
    <td>Professional Industry<span style="color: #F00;">*</span></td>
    <td>
        <select name="industry" id="industry" class="form-control" required>
        <option value="-1">Select Industry</option>
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
    <td><span class="error_mess" id="error18">&nbsp;</span></td>
  </tr>

  <tr>
    <td>Work Experience?<span style="color: #F00;">*</span></td>
    <td>
    	<select name="experience" id="experience" required class="form-control"> 
        	<option value="-1">Select</option>
            <option value="Yes">Yes</option>
            <option value="No">No</option>
        </select>
    </td>
    <td><span class="error_mess" id="error16">&nbsp;</span></td>
  </tr>
  
  <tr class="exp_hide">
    <td>Total Experience<span style="color: #F00;">*</span></td>
    <td>
    	<select name="m_exp_year" id="m_exp_year" class="form_drop_down_menu">
            <option value="">Years</option>
            <?php
				$getexp = "select * from experience";
				$runexp = mysqli_query($connection, $getexp);
				while($rowexp = mysqli_fetch_array($runexp)){
					$expid = $rowexp['exp_id'];
					$expyear = $rowexp['exp_years'];
						echo "<option value='$expyear'>$expyear</option>";
				}
            ?>
        </select>
        <select name="m_exp_month" id="m_exp_month" class="form_drop_down_menu">
        	<option value="-1">Months</option>
            <option value="0">0</option>
            <?php
				$getmonth1 = "select * from months";
				$runmonth1 = mysqli_query($connection, $getmonth1);
				while($rowmonth1 = mysqli_fetch_array($runmonth1)){
					$mid1 = $rowmonth1['month_id'];
					$mname1 = $rowmonth1['month_name'];
						echo "<option value='$mid1'>$mid1</option>";
				}
            ?>
        </select>
	</td>
    <td><span class="error_mess" id="error17">&nbsp;</span></td>
  </tr>
    
  <tr class="exp_hide">
    <td>First Job Start Date<span style="color: #F00;">*</span></td>
    <td>
        <select name="job_start_day" id="job_start_day" class="form_drop_down_menu">
			<option value="-1">Day</option>
            <?php
				$getday1 = "select * from day";
				$runday1 = mysqli_query($connection, $getday1);
				while($rowday1 = mysqli_fetch_array($runday1)){
					$did1 = $rowday1['day_id'];
					$dday1 = $rowday1['day_day'];
						echo "<option value='$did1'>$dday1</option>";
				}
            ?>
        </select>
        <select name="job_start_month" id="job_start_month" class="form_drop_down_menu" >
			<option value="-1">Month</option>
            <?php
				$getmonth2 = "select * from months";
				$runmonth2 = mysqli_query($connection, $getmonth2);
				while($rowmonth2 = mysqli_fetch_array($runmonth2)){
					$mid2 = $rowmonth2['month_id'];
					$mname2 = $rowmonth2['month_name'];
						echo "<option value='$mid2'>$mname2</option>";
				}
            ?>
        </select>
        <select name="job_start_year" id="job_start_year" class="form_drop_down_menu">
			<option value="-1">Year</option>
            <?php
				$getyear2 = "select * from years order by year_year desc";
				$runyear2 = mysqli_query($connection, $getyear2);
				while($rowyear2 = mysqli_fetch_array($runyear2)){
					$yid2 = $rowyear2['year_id'];
					$yyear2 = $rowyear2['year_year'];
						echo "<option value='$yid2'>$yyear2</option>";
				}
            ?>
        </select>
    </td>
    <td><span class="error_mess" id="error19">&nbsp;</span></td>
  </tr>
  
  <tr class="exp_hide">
    <td>Current Job Title:</td>
    <td>
    	<input type="text" name="current_job_title" id="current_job_title" class="form-control" />
    </td>
    <td><span class="error_mess" id="error20">&nbsp;</span></td>
  </tr>
  
  <tr class="exp_hide">
    <td style="vertical-align: middle;">Job Period</td>
    <td>
    	<table style="width: 270px; margin-top: 0px;" border="0">
        	<tr>
    			<td style="font-size: 12px; font-weight: bold;">From: </td>
                <td>
                     <select name="current_start_day" id="current_start_day" class="form_drop_down_menu" style="width: 60px;">
						<option value="-1">Day</option>
                        <?php
							$getday3 = "select * from day";
							$runday3 = mysqli_query($connection, $getday3);
							while($rowday3 = mysqli_fetch_array($runday3)){
								$did3 = $rowday3['day_id'];
								$dday3 = $rowday3['day_day'];
									echo "<option value='$did3'>$dday3</option>";
							}
            			?>
                     </select>
                    <select name="current_start_month" id="current_start_month" class="form_drop_down_menu" style="width: 75px;">
                        <option value="-1">Month</option>
                        <?php
							$getmonth3 = "select * from months";
							$runmonth3 = mysqli_query($connection, $getmonth3);
							while($rowmonth3 = mysqli_fetch_array($runmonth3)){
								$mid3 = $rowmonth3['month_id'];
								$mname3 = $rowmonth3['month_name'];
									echo "<option value='$mid3'>$mname3</option>";
							}
            			?>
                    </select>
                    <select name="current_start_year" id="current_start_year" class="form_drop_down_menu" style="width: 65px;">
                        <option value="-1">Year</option>
                        <?php
							$getyear3 = "select * from years order by year_year desc";
							$runyear3 = mysqli_query($connection, $getyear3);
							while($rowyear3 = mysqli_fetch_array($runyear3)){
								$yid3 = $rowyear3['year_id'];
								$yyear3 = $rowyear3['year_year'];
									echo "<option value='$yid3'>$yyear3</option>";
							}
            			?>
                    </select>				
                </td>
            </tr>
            <tr>
            	<td style="font-size: 12px; font-weight: bold;">To: </td>
                <td>
                    <select name="current_end_year" id="current_end_year" class="form_drop_down_menu">
                        <option value="-1">Year</option>
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
            <tr>
            	<td colspan="2">
         			<span class="error_mess" id="error21">&nbsp;</span>
				</td>
            </tr>
         </table>
         </td>
    <td></td>
  </tr>
  
  <tr class="exp_hide">
    <td>Company Name:</td>
    <td>
    	<input type="text" name="comp_name" id="comp_name" class="form-control" />
    </td>
    <td><span class="error_mess" id="error22">&nbsp;</span></td>
  </tr>
  
  <tr class="exp_hide">
    <td>Country:</td>
    <td>
        <select name="comp_ctry" id="comp_ctry" class="form-control">
         <option value="-1">Select Country</option>
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
    <td><span class="error_mess" id="error23">&nbsp;</span></td>
  </tr>
  
  <tr class="exp_hide">
    <td>City:</td>
    <td>
    	<input type="text" name="comp_city" id="comp_city" class="form-control"/>
    </td>
    <td><span class="error_mess" id="error24">&nbsp;</span></td>
  </tr>
  
  <tr>
    <td colspan="3" class="form_top_title">Upload CV or Resume</td>
  </tr>
  
  <tr>
    <td>Resume Headline<span style="color: #F00;">*</span></td>
    <td>
    	<input type="text" name="cv_headline" id="cv_headline" placeholder="Make your Resume Headline Work" class="form-control" required />
    </td>
    <td><span class="error_mess" id="error25">&nbsp;</span></td>
  </tr>
  
  <tr>
    <td>Upload CV or Resume<span style="color: #F00;">*</span></td>
    <td>
    	<input type="file" name="m_cv" id="m_cv" class="form-control" required />
        <span style="font-size: 14px; color: #A0A0A0;">Upload file only in .doc, .docx or pdf format.</span>
    </td>
    <td><span class="error_mess" id="error26">&nbsp;</span></td>
  </tr>
  

  <tr align="left">
  	<td></td>
    <td>
    	<input type="submit" class="btn btn-warning btn-block" name="register" value="Join LocalJobs"/>
    </td>
    <td><span id="loading">&nbsp;</span></td>
  </tr>
  
  <tr>
 	<td></td>
    <td>
    <span style="font-size: 14px; color: #A0A0A0;"> 
    By clicking the button above, you are indicating that you have read, understood and agree to the localjobs.pk <a href="terms_conition.php">Terms of use</a> and <a href="privacy.php">privacy policy</a>.
    </span>
    </td>
    <td></td>
  </tr>
  </tbody>
</table>
</form>