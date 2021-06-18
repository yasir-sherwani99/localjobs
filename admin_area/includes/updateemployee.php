<form name="passcheck" method="post" role="form" action="edit_employee.php?edit_form=<?php echo $id; ?>" enctype="multipart/form-data">
<table class="table">
  <tbody>	
  <tr>
    <td align="left">Email<span style="color: #F00;">*</span></td>
    <td><input type="email" name="m_email" id="email" value="<?php echo $email; ?>" class="form-control"/></td>
    <td style="color: red; font-weight: bold; font-size: 14px; width: 235px;" id="error"></td>
  </tr>
  <tr>
    <td align="left">First Name<span style="color: #F00;">*</span></td>
    <td><input type="text" name="f_name" value="<?php echo $first_name; ?>" required class="form-control"/></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Last Name<span style="color: #F00;">*</span></td>
    <td><input type="text" name="l_name" value="<?php echo $last_name; ?>" required class="form-control"/></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Gender<span style="color: #F00;">*</span></td>
    <td>
    	<select name="m_gender" class="form-control">
        	<option value="<?php echo $gender; ?>"><?php echo $gender; ?></option>
        	<option value="Male">Male</option>
            <option value="Female">Female</option>
        </select>
    </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Date of Birth<span style="color: #F00;">*</span></td>
    <td>
    	<select name="dob_day" style="padding: 5px;">
			<option value="<?php echo $dob_day; ?>"><?php echo $dob_day; ?></option>
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
        <?php
			$getmonth = "select * from months where month_id = '$dob_month'";
			$runmonth = mysqli_query($connection, $getmonth);
			$rowmonth = mysqli_fetch_array($runmonth);
				$mid = $rowmonth['month_id'];
				$mname = $rowmonth['month_name'];
        ?>
        <select name="dob_month" style="padding: 5px;">
			<option value="<?php echo $mid; ?>"><?php echo $mname; ?></option>
            <?php
				$get_new_month = "select * from months";
				$run_new_month = mysqli_query($connection, $get_new_month);
				while($row_new_month = mysqli_fetch_array($run_new_month)){
					$new_mid = $row_new_month['month_id'];
					$new_mname = $row_new_month['month_name'];
						echo "<option value='$new_mid'>$new_mname</option>";
				}
            ?>
        </select>
        <select name="dob_year" style="padding: 5px;">
			<option value="<?php echo $dob_year; ?>"><?php echo $dob_year; ?></option>
            <?php
				$getyear = "select * from years order by year_year desc";
				$runyear = mysqli_query($connection, $getyear);
				while($rowyear = mysqli_fetch_array($runyear)){
					$yid = $rowyear['year_id'];
					$yyear = $rowyear['year_year'];
						echo "<option value='$yid'>$yyear</option>";
				}
            ?>
        </select>
    </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>City<span style="color: #F00;">*</span></td>
    <td>
    	
        	<?php
    	    $get_cty = "select * from city where city_id = '$city'";
        	$run_cty = mysqli_query($connection, $get_cty);
        	$row_cty = mysqli_fetch_array($run_cty);
            	$cty_id = $row_cty['city_id'];
            	$cty_name = $row_cty['city_name'];
	    ?>

       <select name="m_city" class="form-control">
			<option value="<?php echo $cty_id; ?>"><?php echo $cty_name; ?></option>
            <?php
				$get_new_cty = "select * from city ORDER BY city_name";
				$run_new_cty = mysqli_query($connection, $get_new_cty);
				while($row_new_cty = mysqli_fetch_array($run_new_cty)){
					$new_cty_id = $row_new_cty['city_id'];
					$new_cty_name = $row_new_cty['city_name'];
                		echo "<option value='$new_cty_id'>$new_cty_name</option>";
				}
			?>
        </select>

    </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Country<span style="color: #F00;">*</span></td>
    <td>
		<?php
    	    $get_ctry = "select * from countries where ctry_id = '$ctry'";
        	$run_ctry = mysqli_query($connection, $get_ctry);
        	$row_ctry = mysqli_fetch_array($run_ctry);
            	$ctry_id = $row_ctry['ctry_id'];
            	$ctry_name = $row_ctry['ctry_name'];
	    ?>

       <select name="m_ctry" class="form-control">
			<option value="<?php echo $ctry_id; ?>"><?php echo $ctry_name; ?></option>
            <?php
				$get_new_ctry = "select * from countries ORDER BY ctry_name";
				$run_new_ctry = mysqli_query($connection, $get_new_ctry);
				while($row_new_ctry = mysqli_fetch_array($run_new_ctry)){
					$new_ctry_id = $row_new_ctry['ctry_id'];
					$new_ctry_name = $row_new_ctry['ctry_name'];
                		echo "<option value='$new_ctry_id'>$new_ctry_name</option>";
				}
			?>
        </select>

    </td>
    <td>&nbsp;</td>
  </tr>

  <tr>
    <td>Mobile Phone<span style="color: #F00;">*</span></td>
    <td><input type="text" name="m_mobile" required value="<?php echo $mobile; ?>" class="form-control"/></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Home Phone</td>
    <td><input type="text" name="h_mobile" value="<?php echo $home_ph; ?>" class="form-control"/></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3"></td>
  </tr>
  <tr>
    <td style="color: #000; font-weight: bold; width: 165px;">Educational Details</td>
    <td style="color: #FFD700;">Please enter highest educational qualification</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Highest Degree Achieved<span style="color: #F00;">*</span></td>
    <td>
    	<select name="m_edu_level" class="form-control">
            <option value="<?php echo $highest_degree; ?>"><?php echo $highest_degree; ?></option>
            <option value="No Formal Education">Not Purusing Education</option>
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
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Degree Title<span style="color: #F00;">*</span></td>
    <td><input type="text" name="degree_title" required value="<?php echo $degree_title; ?>" class="form-control"/></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Major Subject(s)<span style="color: #F00;">*</span></td>
    <td><input type="text" name="majors" value="<?php echo $majors; ?>" required class="form-control"/></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Location<span style="color: #F00;">*</span></td>
    <td>
    	<input type="text" name="institute_city" class="form-control" required value="<?php echo $degree_city; ?>"/>
    </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
  	<td>Country<span style="color: #F00;">*</span></td>
    <td>
    	<?php
    	    $get_ctry1 = "select * from countries where ctry_id = '$degree_ctry'";
        	$run_ctry1 = mysqli_query($connection, $get_ctry1);
        	$row_ctry1 = mysqli_fetch_array($run_ctry1);
            	$ctry_id1 = $row_ctry1['ctry_id'];
            	$ctry_name1 = $row_ctry1['ctry_name'];
	    ?>      
        <select name="institute_ctry" class="form-control">
        
        	<option value="<?php echo $ctry_id1; ?>"><?php echo $ctry_name1; ?></option>
            <?php
				$get_new_ctry1 = "select * from countries ORDER BY ctry_name";
				$run_new_ctry1 = mysqli_query($connection, $get_new_ctry1);
				while($row_new_ctry1 = mysqli_fetch_array($run_new_ctry1)){
					$new_ctry_id1 = $row_new_ctry1['ctry_id'];
					$new_ctry_name1 = $row_new_ctry1['ctry_name'];
                		echo "<option value='$new_ctry_id1'>$new_ctry_name1</option>";
				}
			?>
         </select>
    </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Institution<span style="color: #F00;">*</span></td>
    <td><input type="text" name="institute_name" value="<?php echo $institute; ?>" required class="form-control"/></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Completion Year<span style="color: #F00;">*</span></td>
    <td>
        <select name="complete_year" required class="form-control">
			<option value="<?php echo $complete_year; ?>"><?php echo $complete_year; ?></option>
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
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3"><hr/></td>
  </tr>
  <tr>
    <td style="color: #000; font-weight: bold;">Professional Summary</td>
    <td style="color: #FFD700;">Provide details of your work summary</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Do you have work experience?<span style="color: #F00;">*</span></td>
    <td>
    	<select name="experience" class="form-control">
        	<option value="<?php echo $work_exp; ?>"><?php echo $work_exp; ?></option>
        	<option value="Yes">Yes</option>
            <option value="No">No</option>
        </select>
    </td>
    <td>&nbsp;</td>
  </tr>

  <tr>
    <td>Total Experience<span style="color: #F00;">*</span></td>
    <td>
    	<select name="m_exp_year" style="padding: 5px;">
            <option value="<?php echo $exp_year; ?>"><?php echo $exp_year; ?></option>
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
        <select name="m_exp_month" style="padding: 5px;">
        	<option value="<?php echo $exp_month; ?>"><?php echo $exp_month; ?></option>
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
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Professional Industry</td>
    <td class="field">
    
		<?php
            $get_cats = "select * from categories where cat_id = '$industry'";
            $run_cats = mysqli_query($connection, $get_cats);
                $row_cats = mysqli_fetch_array($run_cats);
                    $cat_id = $row_cats['cat_id'];
                    $cat_title = $row_cats['cat_title'];
        ?>
    
    	<select name="industry" class="form-control">
        	<option value="<?php echo $cat_id; ?>"><?php echo $cat_title; ?></option>
            <?php
				$get_new_cats = "select * from categories order by cat_title";
				$run_new_cats = mysqli_query($connection, $get_new_cats);
					while($row_new_cats = mysqli_fetch_array($run_new_cats)){
						$new_cat_id = $row_new_cats['cat_id'];
						$new_cat_title = $row_new_cats['cat_title'];
                			echo "<option value='$new_cat_id'>$new_cat_title</option>";
				}
			?>

        </select>
    </td>
    <td>&nbsp;</td>
  </tr>
    <tr>
    <td>First Job Start Date</td>
    <td class="field">
        <select name="job_start_day" style="padding: 5px;">
			<option value="<?php echo $first_job_day; ?>"><?php echo $first_job_day; ?></option>
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
        <?php
			$getmonth3 = "select * from months where month_id = '$first_job_month'";
			$runmonth3 = mysqli_query($connection, $getmonth3);
			$rowmonth3 = mysqli_fetch_array($runmonth3);
				$mid3 = $rowmonth3['month_id'];
				$mname3 = $rowmonth3['month_name'];
        ?>

        <select name="job_start_month" style="padding: 5px;">
			<option value="<?php echo $mid3; ?>"><?php echo $mname3; ?></option>
            <?php
				$getmonth4 = "select * from months";
				$runmonth4 = mysqli_query($connection, $getmonth4);
				while($rowmonth4 = mysqli_fetch_array($runmonth4)){
					$mid4 = $rowmonth4['month_id'];
					$mname4 = $rowmonth4['month_name'];
						echo "<option value='$mid4'>$mname4</option>";
				}
            ?>
        </select>
        <select name="job_start_year" style="padding: 5px;">
			<option value="<?php echo $first_job_year; ?>"><?php echo $first_job_year; ?></option>
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
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Current Job Titles</td>
    <td><input type="text" name="current_job_title" value="<?php echo $current_job; ?>" class="form-control"/></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Job Period</td>
    <td>
    	<table style="width: 300px;">
        	<tr>
    			<td>From: </td>
                <td>
                     <select name="current_start_day" style="padding: 5px;">
						<option value="<?php echo $current_job_day; ?>"><?php echo $current_job_day; ?></option>					        
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
                    <select name="current_start_month" style="padding: 5px;">
                        <option value="<?php echo $current_job_month; ?>"><?php echo $current_job_month; ?></option>
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
                    <select name="current_start_year" style="padding: 5px;">
                        <option value="<?php echo $current_job_year; ?>"><?php echo $current_job_year; ?></option>
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
            	<td>To: </td>
                <td>
                    <select name="current_end_year" style="padding: 5px;">
                        <option value="<?php echo $job_end_date; ?>"><?php echo $job_end_date; ?></option>
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
         </table>
    </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Company Name</td>
    <td class="field"><input type="text" name="comp_name" value="<?php echo $company; ?>" class="form-control"/></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Country</td>
    <td class="field">
        <?php
    	    $get_ctry4 = "select * from countries where ctry_id = '$comp_ctry'";
        	$run_ctry4 = mysqli_query($connection, $get_ctry4);
        	$row_ctry4 = mysqli_fetch_array($run_ctry4);
            	$ctry_id4 = $row_ctry4['ctry_id'];
            	$ctry_name4 = $row_ctry4['ctry_name'];
	    ?>      

          <select name="comp_ctry" class="form-control">
			<option value="<?php echo $ctry_id4; ?>"><?php echo $ctry_name4; ?></option>
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
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>City</td>
    <td><input type="text" name="comp_city" value="<?php echo $comp_city; ?>" class="form-control" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" style="color: #000; font-weight: bold;">Upload CV</td>
  </tr>
  <tr>
    <td>Resume Headline</td>
    <td><input type="text" name="cv_headline" value="<?php echo $cv_headline; ?>" required class="form-control" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr align="left">
  	<td></td>
    <td>
    	<input type="submit" name="update" value="Update Employee" class="btn btn-default" />
    </td>
    <td id="loading"></td>
  </tr>
 <tr>
 	<td></td>
    <td colspan="2">
    <span style="font-size: 14px; color: #A0A0A0;"> 
    By clicking the button above, you are indicating that you have read, understood and agree to the localjobs.pk <a href="terms_conition.php">Terms of use</a> and <a href="privacy.php">privacy policy</a>.
    </span>
    </td>
  </tr>
  </tbody>
</table>
</form>