
<form method="post" role="form" action="add_empl_jobs.php" onSubmit="return confirmSubmit()">
<div class="table-responsive">
<table border="0" class="table table-bordered">
<tbody>
<tr>
	<td style="width: 120px;"><b>Job Title</b><span style="color: #F00; font-size: 16px;">&nbsp;*</span></td>
    <td style="width: 200px;"><input type="text" name="title" id="title" class="form-control" onBlur="jobTitle()"/></td>
    <td style="width: 150px; color: #F00;" id="error1"></td>
</tr>
<tr>
	<td><b>Job Description</b><span style="color: #F00; font-size: 16px;">&nbsp;*</span></td>
    <td>
    	<textarea name="desc" id="desc" cols="50" rows="10" class="form-control" onBlur="jobDesc()">
        </textarea>
        <span style="color: #C0C0C0;">(You may enter upto 2,000 characters)</span>
    </td>
    <td id="error2" style="color: #F00;"></td>
</tr>
<tr>
	<td colspan="3"><b style="color: #0080FF; font-size: 18px;">Filter Options for better results</b></td>
</tr>
<tr>
	<td><b>Key Skills</b><span style="color: #F00; font-size: 16px;">&nbsp;*</span></td>
    <td>
    	<textarea name="skills" id="skills" cols="50" rows="3" class="form-control" onBlur="jobSkills()">
        </textarea>
        <span style="color: #C0C0C0;">Enter work skills or designation.</span>
    </td>
    <td id="error3" style="color: #F00;"></td>
</tr>
<tr>
	<td><b>Experience</b><span style="color: #F00; font-size: 16px;">&nbsp;*</span><br/><span style="color: #C0C0C0;">(in years)</span></td>
    <td>
        <select name="min_exp" id="min_exp" class="emp_drop_down_menu" onBlur="jobExp()">
            <option value="-1">Minimum</option>
            <option value="0">0</option>
            <?php
                $get_exp = "select * from experience";
                $run_exp = mysqli_query($connection, $get_exp);
                while($row_exp = mysqli_fetch_array($run_exp)){
                	$exp_id = $row_exp['exp_id'];
                	$exp_year = $row_exp['exp_years'];
                    echo "<option value='$exp_year'>$exp_year</option>";
                }
            ?>
        </select>
        <select name="max_exp" id="max_exp" class="emp_drop_down_menu" onBlur="jobExp()">
            <option value="-1">Maximum</option>
            <option value="0">0</option>
            <?php
                $get_exp1 = "select * from experience";
                $run_exp1 = mysqli_query($connection, $get_exp1);
                while($row_exp1 = mysqli_fetch_array($run_exp1)){
                	$exp_id1 = $row_exp1['exp_id'];
                	$exp_year1 = $row_exp1['exp_years'];
                    echo "<option value='$exp_year1'>$exp_year1</option>";
                }
            ?>
        </select> 
    </td>
    <td id="error4" style="color: #F00;"></td>
</tr>
<tr>
	<td><b>Job City</b><span style="color: #F00; font-size: 16px;">&nbsp;*</span></td>
    <td>
    	<select name="location" id="location" class="form-control" onBlur="jobCity()">
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
    <td id="error5" style="color: #F00;"></td>
</tr>

<tr id="other_loc">
	<td><b>City Name</b><span style="color: #F00; font-size: 16px;">&nbsp;*</span></td>
    <td><input type="text" name="other_city" id="other_city" class="form-control" onBlur="otherjobCity()"/></td>
    <td id="error20"></td>
</tr>  
<tr>
	<td><b>Job Country</b><span style="color: #F00; font-size: 16px;">&nbsp;*</span></td>
    <td>
    	<select name="job_ctry" id="job_ctry" class="form-control" onBlur="jobCountry()">
        <option value="-1">Select Country</option>
        <?php
			$get_ctry = "select * from countries order by ctry_name";
			$run_ctry = mysqli_query($connection, $get_ctry);
			while($row_ctry = mysqli_fetch_array($run_ctry)){
			$ctry_id = $row_ctry['ctry_id'];
			$ctry_title = $row_ctry['ctry_name'];
                echo "<option value='$ctry_id'>$ctry_title</option>";
			}
		?>

         </select>
    </td>
    <td id="error6" style="color: #F00;"></td>
</tr>

<tr>
	<td><b>Industry</b><span style="color: #F00; font-size: 16px;">&nbsp;*</span></td>
    <td>
       	<select name="industry" id="industry" class="form-control" onBlur="jobIndustry()">
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
    <td id="error7" style="color: #F00;"></td>
</tr>
<tr>
	<td><b>Expiry Date</b><span style="color: #F00; font-size: 16px;">&nbsp;*</span></td>
    <td>
    <!-- <input type="date" name="expiry" class="form-control" /> -->
    	<select name="exp_day" id="exp_day" class="emp_drop_down_menu" onBlur="jobExpiry()">
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
        <select name="exp_month" id="exp_month" class="emp_drop_down_menu" onBlur="jobExpiry()">
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
        <select name="exp_year" id="exp_year" class="emp_drop_down_menu" onBlur="jobExpiry()">
			<option value="-1">Year</option>
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
    <td id="error8" style="color: #F00;"></td>
</tr>
<tr>
	<td><b>Montly Salary</b><span style="color: #F00; font-size: 16px;">&nbsp;*</span></td>
    <td>
		<select name="min_salary" id="min_salary" class="emp_drop_down_menu" onBlur="jobSalary()">
            <option value="-1">Minimum</option>
            <?php
                $get_sal = "select * from salary";
                $run_sal = mysqli_query($connection, $get_sal);
                while($row_sal = mysqli_fetch_array($run_sal)){
                	$sal_id = $row_sal['sal_id'];
                	$salary = $row_sal['sal_sal'];
                    echo "<option value='$salary'>$salary</option>";
                }
            ?>
        </select>
		<select name="max_salary" id="max_salary" class="emp_drop_down_menu" onBlur="jobSalary()">
            <option value="-1">Maximum</option>
            <?php
                $get_sal1 = "select * from salary";
                $run_sal1 = mysqli_query($connection, $get_sal1);
                while($row_sal1 = mysqli_fetch_array($run_sal1)){
                	$sal_id1 = $row_sal1['sal_id'];
                	$salary1 = $row_sal1['sal_sal'];
                    echo "<option value='$salary1'>$salary1</option>";
                }
            ?>
        </select>
	</td>
    <td id="error9" style="color: #F00;"></td>
</tr>
<tr>
	<td><b>Qualification</b><span style="color: #F00; font-size: 16px;">&nbsp;*</span></td>
    <td>
    	<input type="text" name="qual" id="qual" class="form-control" onBlur="jobQual()" />
    </td>
    <td id="error10" style="color: #F00;"></td>
</tr>
<tr>
	<td><b>Number of Vacancies</b><span style="color: #F00; font-size: 16px;">&nbsp;*</span></td>
    <td><input type="text" name="vacancies" id="vacancies" class="form-control" onBlur="jobVacancies()"/></td>
    <td id="error11" style="color: #F00;"></td>
</tr>

<tr>
	<td><b>Employment Type</b><span style="color: #F00; font-size: 16px;">&nbsp;*</span></td>
    <td>
        <select name="emp_type" id="emp_type" class="form-control" onBlur="jobEmployment()">
            <option value="-1">Select Type</option>
            <?php
                $get_type = "select * from types";
                $run_type = mysqli_query($connection, $get_type);
                while($row_type = mysqli_fetch_array($run_type)){
                	$type_id = $row_type['type_id'];
                	$type_name = $row_type['type_name'];
                    echo "<option value='$type_name'>$type_name</option>";
                }
            ?>
        </select>

    </td>
    <td id="error12" style="color: #F00;"></td>
</tr>
<tr>
	<td><b>Employment Status</b><span style="color: #F00; font-size: 16px;">&nbsp;*</span></td>
    <td>
    	<input type="radio" name="emp_status" id="emp_status" value="Full Time" onClick="jobStatus()"> Full Time
        <input type="radio" name="emp_status" id="emp_status" value="Part Time" onClick="jobStatus()"> Part Time
    </td>
    <td id="error13" style="color: #F00;"></td>
</tr>
<tr>
	<td><b>Contact Name</b></td>
    <td><input type="text" name="contact_name" class="form-control" /></td>
    <td id="error14" style="color: #F00;"></td>
</tr>
<tr>
	<td><b>Contact No</b></td>
    <td><input type="text" name="contact_no" class="form-control" /></td>
    <td id="error15" style="color: #F00;"></td>
</tr>
<tr>
	<td><b>Email for response</b><span style="color: #F00; font-size: 16px;">&nbsp;*</span></td>
    <td>
    	<input type="email" name="email" id="email" class="form-control" onBlur="jobEmail()"/>
    	<span style="color: #C0C0C0;">Note: use commas to specify multiple email addresses</span>
    </td>
    <td id="error16" style="color: #F00;"></td>
</tr>
<tr>
	<td><b>Job Keywords</b><span style="color: #F00; font-size: 16px;">&nbsp;*</span></td>
    <td>
    	<input type="text" name="keywords" id="keywords" class="form-control" onBlur="jobKeywords()"/>
        <span style="color: #C0C0C0;">Note: Enter keywords like job title, company name and Category, use commas to separate</span>
    </td>
    <td id="error17" style="color: #F00;"></td>
</tr>
<tr>
	<td></td>
	<td>
        <input type="submit" name="submit" class="btn btn-default" value="Publish &raquo;" />
    </td>
    <td></td>
</tr>
</tbody>
</table>
</div>
</form>