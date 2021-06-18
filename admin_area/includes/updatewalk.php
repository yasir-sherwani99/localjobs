<form method="post" role="form" action="edit_walkin.php?edit_form=<?php echo $job_id; ?>">
<div class="table-responsive">
<table border="0" class="table table-bordered">
<tbody>
<tr>
	<td style="width: 120px;">Job Title<span style="color: #F00; font-size: 16px;">&nbsp;*</span></td>
    <td style="width: 200px;"><input type="text" name="title" id="title" class="form-control" value="<?php echo $job_title; ?>" onBlur="jobTitle()"/></td>
    <td style="width: 150px; color: #F00;" id="error1"></td>
</tr>
<tr>
	<td>Company Name<span style="color: #F00; font-size: 16px;">&nbsp;*</span></td>
    <td>
		<input type="text" name="comp_name" id="comp_name" class="form-control" value="<?php echo $job_comp; ?>" onBlur="jobCompany()" />
    </td>
    <td id="error18" style="color: #F00;">&nbsp;</td>
</tr>


<tr>
	<td>Interview Date<span style="color: #F00; font-size: 16px;">&nbsp;*</span></td>
    <td>
    	<!-- <input type="date" name="expiry" class="form-control" />  -->
         <select name="exp_day" id="exp_day" class="emp_drop_down_menu" onBlur="jobExpiry()">
			<option value="<?php echo $interview_day; ?>"><?php echo $interview_day; ?></option>
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
			<option value="<?php echo $interview_month; ?>"><?php echo $interview_month; ?></option>
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
			<option value="<?php echo $interview_year; ?>"><?php echo $interview_year; ?></option>
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
	<td>Job City<span style="color: #F00; font-size: 16px;">&nbsp;*</span></td>
	<?php
        $get_city = "select * from city where city_id = '$job_loc'";
        $run_city = mysqli_query($connection, $get_city);
        $row_city = mysqli_fetch_array($run_city);
            $city_id = $row_city['city_id'];
            $city_name = $row_city['city_name'];
    ?>

    <td>
    	<select name="location" id="location" class="form-control" onBlur="jobCity()">
        	<option value="<?php echo $city_id; ?>"><?php echo $city_name; ?></option>
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
	<td>Job Keywords<span style="color: #F00; font-size: 16px;">&nbsp;*</span></td>
    <td>
    	<input type="text" name="keywords" id="keywords" class="form-control" value="<?php echo $keywords; ?>" onBlur="jobKeywords()"/>
        <span style="color: #C0C0C0;">Note: Enter keywords like job title, company name and Category, use commas to separate</span>
    </td>
    <td id="error17" style="color: #F00;">&nbsp;</td>
</tr>
<tr>
	<td></td>
	<td>
        <input type="submit" name="update" class="btn btn-default" value="Update Job &raquo;" />
    </td>
    <td>&nbsp;</td>
</tr>
</tbody>
</table>
</div>
</form>