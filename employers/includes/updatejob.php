<form method="post" role="form" action="edit_empl_job.php?edit_form=<?php echo $id; ?>">
<table border="0" class="table table-bordered">
<tbody>
<tr>
	<td><b>Job Title</b><span style="color: #F00; font-size: 16px;">&nbsp;*</span></td>
    <td><input type="text" name="title" class="form-control" required value="<?php echo $title; ?>"/></td>
</tr>
<tr>
	<td><b>Job Description</b><span style="color: #F00; font-size: 16px;">&nbsp;*</span></td>
    <td>
    	<textarea name="desc" id="desc" cols="50" rows="10" class="form-control" required><?php echo $desc; ?></textarea>
        <span style="color: #C0C0C0;">(You may enter upto 2,000 characters)</span>
    </td>
</tr>
<tr>
	<td colspan="2" class="bgcolor"><b>Filter Options for better results</b></td>
</tr>
<tr>
	<td><b>Key Skills</b><span style="color: #F00; font-size: 16px;">&nbsp;*</span></td>
    <td>
    	<textarea name="skills" id="skills" cols="50" rows="3" class="form-control" required><?php echo $skills; ?></textarea>
        <span style="color: #C0C0C0;">Enter work skills or designation.</span>
    </td>
</tr>
<tr>
	<td><b>Experience</b><span style="color: #F00; font-size: 16px;">&nbsp;*</span><br/><span style="color: #C0C0C0;">(in years)</span></td>
    <td>
    	<select name="min_exp" class="emp_drop_down_menu" required>
            <option value="<?php echo $min_exp; ?>"><?php echo $min_exp; ?></option>
            <?php
				$get_exp = "select * from experience";
				$run_exp = mysqli_query($connection, $get_exp);
				while($row_exp = mysqli_fetch_array($run_exp)){
					$exp_id = $row_exp['exp_id'];
					$exp_years = $row_exp['exp_years'];
					echo "<option value='$exp_years'>$exp_years</option>";
				}
			?>

         </select> 
        <select name="max_exp" class="emp_drop_down_menu" required>
        	<option value="<?php echo $max_exp; ?>"><?php echo $max_exp; ?></option>
            <?php
				$get_exp = "select * from experience";
				$run_exp = mysqli_query($connection, $get_exp);
				while($row_exp = mysqli_fetch_array($run_exp)){
					$exp_id = $row_exp['exp_id'];
					$exp_years = $row_exp['exp_years'];
					echo "<option value='$exp_years'>$exp_years</option>";
				}
			?>
         </select>
         <div style="color: #C0C0C0;"><span style="padding-left: 8px;">Minimum</span><span style="padding-left: 15px;">Maximum</span></div>
    </td>
</tr>
<tr>
	<td><b>Job Location</b><span style="color: #F00; font-size: 16px;">&nbsp;*</span></td>
	<?php
        $get_city = "select * from city where city_id = '$job_loc'";
        $run_city = mysqli_query($connection, $get_city);
        $row_city = mysqli_fetch_array($run_city);
            $city_id = $row_city['city_id'];
            $city_name = $row_city['city_name'];
    ?>
    <td>
    	<select name="location" class="form-control" required>
        	<option value="<?php echo $city_id; ?>"><?php echo $city_name; ?></option>
            <?php
				$get_new_city = "select * from city order by city_name";
				$run_new_city = mysqli_query($connection, $get_new_city);
				while($row_new_city = mysqli_fetch_array($run_new_city)){
					$new_city_id = $row_new_city['city_id'];
					$new_city_name = $row_new_city['city_name'];
					echo "<option value='$new_city_id'>$new_city_name</option>";
				}
			?>

        </select>
    </td>
</tr>
<tr>
	<td><b>Industry</b><span style="color: #F00; font-size: 16px;">&nbsp;*</span></td>
    <?php
		$get_cats = "select * from categories where cat_id = '$cat_id'";
		$run_cats = mysqli_query($connection, $get_cats);
		$row_cats = mysqli_fetch_array($run_cats);
			$cat_id = $row_cats['cat_id'];
			$cat_title = $row_cats['cat_title'];
	?>
    <td>
        <select name="industry" class="form-control" required>
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
</tr>
<tr>
	<td><b>Expiry Date</b></td>
	<?php
        $getday = "select * from day where day_id = '$expiry_day'";
        $runday = mysqli_query($connection, $getday);
        $rowday = mysqli_fetch_array($runday);
            $did = $rowday['day_id'];
            $dday = $rowday['day_day'];
    ?>

    <td>
    <!-- <input type="date" name="expiry" class="form-control" required value="<?php echo $expiry; ?>"/> -->
     	<select name="exp_day" id="exp_day" class="emp_drop_down_menu" required>
			<option value="<?php echo $did; ?>"><?php echo $dday; ?></option>
            <?php
				$getnewday = "select * from day";
				$runnewday = mysqli_query($connection, $getnewday);
				while($rownewday = mysqli_fetch_array($runnewday)){
					$newdid = $rownewday['day_id'];
					$newdday = $rownewday['day_day'];
						echo "<option value='$newdid'>$newdday</option>";
				}
            ?>
        </select>
            <?php
				$getmonth = "select * from months where month_id = '$expiry_month'";
				$runmonth = mysqli_query($connection, $getmonth);
				$rowmonth = mysqli_fetch_array($runmonth);
					$mid = $rowmonth['month_id'];
					$mname = $rowmonth['month_name'];
            ?>

        <select name="exp_month" id="exp_month" class="emp_drop_down_menu" required>
			<option value="<?php echo $mid; ?>"><?php echo $mname; ?></option>
            <?php
				$getnewmonth = "select * from months";
				$runnewmonth = mysqli_query($connection, $getnewmonth);
				while($rownewmonth = mysqli_fetch_array($runnewmonth)){
					$newmid = $rownewmonth['month_id'];
					$newmname = $rownewmonth['month_name'];
						echo "<option value='$newmid'>$newmname</option>";
				}
            ?>
        </select>
      
        <select name="exp_year" id="exp_year" class="emp_drop_down_menu" required>
			<option value="<?php echo $expiry_year; ?>"><?php echo $expiry_year; ?></option>
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
</tr>
<tr>
	<td><b>Montly Salary</b><span style="color: #F00; font-size: 16px;">&nbsp;*</span></td>
    <td>
    	<select name="min_salary" class="emp_drop_down_menu" required>
        	<option value="<?php echo $min_sal; ?>"><?php echo $min_sal; ?></option>
            <?php
				$get_sal = "select * from salary";
				$run_sal = mysqli_query($connection, $get_sal);
				while($row_sal = mysqli_fetch_array($run_sal)){
					$sal_id = $row_sal['sal_id'];
					$sal_sal = $row_sal['sal_sal'];
					echo "<option value='$sal_sal'>$sal_sal</option>";
				}
			?>
         </select>
        <select name="max_salary" class="emp_drop_down_menu" required>
        	<option value="<?php echo $max_sal; ?>"><?php echo $max_sal; ?></option>
            <?php
				$get_sal = "select * from salary";
				$run_sal = mysqli_query($connection, $get_sal);
				while($row_sal = mysqli_fetch_array($run_sal)){
					$sal_id = $row_sal['sal_id'];
					$sal_sal = $row_sal['sal_sal'];
					echo "<option value='$sal_sal'>$sal_sal</option>";
				}
			?>
        </select>
        <div style="color: #C0C0C0;"><span style="padding-left: 8px;">Minimum</span><span style="padding-left: 25px;">Maximum</span>
        </div>
	</td>
</tr>
<tr>
	<td><b>Qualification</b></td>
    <td>
    	<input type="text" name="qual" class="form-control" required value="<?php echo $qual; ?>"/>
    </td>
</tr>
<tr>
	<td><b>Number of Vacancies</b><span style="color: #F00; font-size: 16px;">&nbsp;*</span></td>
    <td><input type="text" name="vacancies" required class="form-control" value="<?php echo $vacancies; ?>"/></td>
</tr>

<tr>
	<td><b>Employment Type</b></td>
    <td>
    	<select name="emp_type" required class="form-control">
        	<option value="<?php echo $emp_type; ?>"><?php echo $emp_type; ?></option>
			<?php
				$get_type = "select * from types";
				$run_type = mysqli_query($connection, $get_type);
				while($row_type = mysqli_fetch_array($run_type)){
					$type_id = $row_type['type_id'];
					$type_name = $row_type['type_name'];
					echo "<option value='$type_id'>$type_name</option>";
				}
			?>        
         </select>
    </td>
</tr>
<tr>
	<td><b>Employment Status</b></td>
    <td>
    	<select name="emp_status" required class="form-control">
        	<option value="<?php echo $emp_status; ?>"><?php echo $emp_status; ?></option>
            <option value="Full Time">Full Time</option>
            <option value="Part Time">Part Time</option>
        </select>
    </td>
</tr>
<tr>
	<td><b>Contact Name</b><span style="color: #F00; font-size: 16px;">&nbsp;*</span></td>
    <td><input type="text" name="contact_name" required class="form-control" value="<?php echo $contact_person; ?>"/></td>
</tr>
<tr>
	<td><b>Contact No</b></td>
    <td><input type="text" name="contact_no" class="form-control" value="<?php echo $contact_no; ?>"/></td>
</tr>
<tr>
	<td><b>Email for response</b><span style="color: #F00; font-size: 16px;">&nbsp;*</span></td>
    <td>
    	<input type="email" name="email" required class="form-control" value="<?php echo $company_email; ?>"/>
    	<span style="color: #C0C0C0;">Note: use commas to specify multiple email addresses</span>
    </td>
</tr>
<tr>
	<td><b>Job Keywords</b><span style="color: #F00; font-size: 16px;">&nbsp;*</span></td>
    <td><input type="text" name="keywords" required class="form-control" value="<?php echo $keywords; ?>"/></td>
</tr>
<tr>
	<td></td>
	<td>
        <input type="submit" name="update" class="btn btn-default" value="Update this Job &raquo;" />
    </td>
</tr>
</tbody>
</table>
</form>