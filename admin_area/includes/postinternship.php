<form method="post" action="add_internship.php" enctype="multipart/form-data" role="form" onSubmit="return internConfirm()">
<div class="table-responsive">
<table border="0" class="table table-bordered">
<tbody>
<tr>
	<td style="width: 120px;"><b>Job Title</b><span style="color: #F00; font-size: 16px;">&nbsp;*</span></td>
    <td style="width: 200px;"><input type="text" name="title" id="title" class="form-control" onBlur="jobTitle()"/></td>
    <td style="width: 150px; color: #F00;" id="error1"></td>
</tr>
<tr>
	<td><b>Company Name</b><span style="color: #F00; font-size: 16px;">&nbsp;*</span></td>
    <td>
		<input type="text" name="comp_name" id="comp_name" class="form-control" onBlur="jobCompany()" />
    </td>
    <td id="error18" style="color: #F00;">&nbsp;</td>
</tr>
<tr>
	<td><b>City</b><span style="color: #F00; font-size: 16px;">&nbsp;*</span></td>
    <td>
    	<select name="location" id="location" class="form-control" onBlur="jobCity()">
        	<option value="-1">Select City</option>
            <option value="0">Multiple Cities</option>
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
    <td id="error5" style="color: #F00;">&nbsp;</td>
</tr>
<tr>
	<td><b>Category</b><span style="color: #F00; font-size: 16px;">&nbsp;*</span></td>
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
    <td id="error7" style="color: #F00;">&nbsp;</td>
</tr>
<tr>
	<td><b>Application Due</b><span style="color: #F00; font-size: 16px;">&nbsp;*</span></td>
    <td>
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
    <td id="error8" style="color: #F00;">&nbsp;</td>
</tr>
<tr>
	<td><b>Type</b><span style="color: #F00; font-size: 16px;">&nbsp;*</span></td>
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
    <td id="error12" style="color: #F00;">&nbsp;</td>
</tr>
<tr>
	<td><b>Vacancies</b><span style="color: #F00; font-size: 16px;">&nbsp;*</span></td>
    <td>
		<input type="text" name="vacancies" id="vacancies" class="form-control" onBlur="jobVacancies1()" />
    </td>
    <td id="error111" style="color: #F00;">&nbsp;</td>
</tr>
<tr>
	<td><b>Experience</b><span style="color: #F00; font-size: 16px;">&nbsp;*</span></td>
    <td>
		<select name="experience" id="experience" class="form-control" >
            <option value="-1">Select Type</option>
            <option value="Fresh Graduates">Fresh Graduates</option>
            <option value="Fresh or upto 1 year">Fresh or upto 1 year</option>
			<option value="1 to 2 years">1 to 2 years</option>
            <option value="1 to 3 years">1 to 3 years</option>
            <option value="1 to 4 years">1 to 4 years</option>            
        </select>
    </td>
    <td id="error111" style="color: #F00;">&nbsp;</td>
</tr>

<tr>
	<td><b>Responsibilities</b><span style="color: #F00; font-size: 16px;">&nbsp;*</span></td>
    <td>
    	<textarea name="desc" id="desc" cols="50" rows="10" class="form-control" onBlur="jobDesc()"></textarea>
      <!--  <script>
			CKEDITOR.replace('desc')
		</script> -->
        <span class="help-block">(You may enter upto 5,000 characters)</span>
    </td>
    <td id="error2" style="color: #F00;"></td>
</tr>
<tr>
	<td><b>Requirements</b><span style="color: #F00; font-size: 16px;">&nbsp;*</span></td>
    <td>
    	<textarea name="require" id="require" cols="50" rows="10" class="form-control" onBlur="jobDesc()"></textarea>
      <!--  <script>
			CKEDITOR.replace('desc')
		</script> -->
        <span class="help-block">(You may enter upto 5,000 characters)</span>
    </td>
    <td id="error9" style="color: #F00;"></td>
</tr>
<tr>
	<td><b>How to Apply</b></td>
    <td>
    	<textarea name="compen" id="compen" cols="50" rows="5" class="form-control"></textarea>
      <!--  <script>
			CKEDITOR.replace('desc')
		</script> -->
        <span class="help-block">(You may enter upto 2,000 characters)</span>
    </td>
    <td id="error10" style="color: #F00;"></td>
</tr>
<tr>
	<td><b>Postal Address</b></td>
    <td>
    	<textarea name="addr" id="addr" cols="50" rows="4" class="form-control"></textarea>
      <!--  <script>
			CKEDITOR.replace('desc')
		</script> -->
    </td>
    <td id="error11" style="color: #F00;"></td>
</tr>
<tr>
	<td><b>Phone</b></td>
    <td>
    	<input type="text" name="phone" id="phone" class="form-control" />
    </td>
    <td id="error12" style="color: #F00;"></td>
</tr>
<tr>
	<td><b>Online Application Form</b></td>
    <td>
    	<input type="text" name="url" id="url" class="form-control" />
    </td>
    <td id="error14" style="color: #F00;"></td>
</tr>

<tr>
	<td><b>Email Address:</b></td>
    <td>
    	<input type="email" name="email" id="email" class="form-control" />
    </td>
    <td id="error15" style="color: #F00;"></td>
</tr>

<tr>
	<td><b>Job Keywords</b><span style="color: #F00; font-size: 16px;">&nbsp;*</span></td>
    <td>
    	<input type="text" name="keywords" id="keywords" class="form-control" onBlur="jobKeywords()"/>
        <span style="color: #C0C0C0;">Note: Enter keywords like job title, company name and Category, use commas to separate</span>
    </td>
    <td id="error17" style="color: #F00;">&nbsp;</td>
</tr>

<tr>
	<td></td>
	<td>
        <input type="submit" name="submit" class="btn btn-default" value="Publish &raquo;" />
    </td>
    <td>&nbsp;</td>
</tr>
</tbody>
</table>
</div>
</form>
