<form method="post" action="add_walkin.php" enctype="multipart/form-data" role="form" onSubmit="return walkinConfirm()">
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
<!--
<tr>
	<td>Job Description<span style="color: #F00; font-size: 16px;">&nbsp;*</span></td>
    <td>
    	<textarea name="desc" id="desc" cols="50" rows="10" class="form-control" onBlur="jobDesc()"></textarea>
        <span style="color: #C0C0C0;">(You may enter upto 2,000 characters)</span>
    </td>
    <td id="error2" style="color: #F00;">&nbsp;</td>
</tr>
<tr>
	<td colspan="3" class="bgcolor"><b style="color: #0080FF; font-size: 18px;">Filter Options for better results</b></td>
</tr>
<tr>
	<td>Qualification<span style="color: #F00; font-size: 16px;">&nbsp;*</span></td>
    <td>
		<textarea name="qual" id="qual" class="form-control" onBlur="jobQual()"></textarea>
 
    </td>
    <td id="error10" style="color: #F00;">&nbsp;</td>
</tr>
<tr>
	<td>Key Skills</td>
    <td>
    	<textarea name="skills" id="skills" cols="50" rows="3" class="form-control"></textarea>
        <span style="color: #C0C0C0;">Enter work skills or designation. Do not enter soft-skills <br/>such as Good communication, fluency in English</span>
    </td>
    <td id="error3" style="color: #F00;">&nbsp;</td>
</tr>
<tr>
	<td>Experience<br/><span style="color: #C0C0C0;">(in years)</span></td>
    <td>
        <select name="min_exp" id="min_exp" class="emp_drop_down_menu" onBlur="jobExp()">
            <option value="-1">Minimum</option>
            <option value="0">0</option>
            <?php
              /*  $get_exp = "select * from experience";
                $run_exp = mysqli_query($connection, $get_exp);
                while($row_exp = mysqli_fetch_array($run_exp)){
                	$exp_id = $row_exp['exp_id'];
                	$exp_year = $row_exp['exp_years'];
                    echo "<option value='$exp_year'>$exp_year</option>";
                }  */
            ?>
        </select>
        <select name="max_exp" id="max_exp" class="emp_drop_down_menu" onBlur="jobExp()">
            <option value="-1">Maximum</option>
            <option value="0">0</option>
            <?php
            /*    $get_exp1 = "select * from experience";
                $run_exp1 = mysqli_query($connection, $get_exp1);
                while($row_exp1 = mysqli_fetch_array($run_exp1)){
                	$exp_id1 = $row_exp1['exp_id'];
                	$exp_year1 = $row_exp1['exp_years'];
                    echo "<option value='$exp_year1'>$exp_year1</option>";
                }  */
            ?>
        </select> 
    </td>
    <td id="error4" style="color: #F00;">&nbsp;</td>
</tr> -->
<!--
<tr id="other_loc">
	<td>City Name<span style="color: #F00; font-size: 16px;">&nbsp;*</span></td>
    <td><input type="text" name="other_city" class="form-control"/></td>
    <td>&nbsp;</td>
</tr>  -->

<tr>
	<td><b>Interview Date</b><span style="color: #F00; font-size: 16px;">&nbsp;*</span></td>
    <td>
    	<!-- <input type="date" name="expiry" class="form-control" />  -->
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
<!--
<tr>
	<td>How to Apply<span style="color: #F00; font-size: 16px;">&nbsp;*</span></td>
    <td>
		<textarea name="howapply" id="howapply" class="form-control" onBlur="jobApply()"></textarea>
	
	</td>
    <td id="error19" style="color: #F00;">&nbsp;</td>
</tr>
<tr>
	<td>Contact Address<span style="color: #F00; font-size: 16px;">&nbsp;*</span></td>
    <td>
		<textarea name="comp_addr" id="comp_addr" class="form-control" onBlur="jobContact()"></textarea>
	
	</td>
    <td id="error20" style="color: #F00;">&nbsp;</td>
</tr> -->
<tr>
	<td><b>Job City</b><span style="color: #F00; font-size: 16px;">&nbsp;*</span></td>
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
	<td><b>Job Keywords</b><span style="color: #F00; font-size: 16px;">&nbsp;*</span></td>
    <td>
    	<input type="text" name="keywords" id="keywords" class="form-control" onBlur="jobKeywords()"/>
        <span style="color: #C0C0C0;">Note: Enter keywords like job title, company name and Category, use commas to separate</span>
    </td>
    <td id="error17" style="color: #F00;">&nbsp;</td>
</tr>
<tr>
	<td><b>Upload Image</b><span style="color: #F00; font-size: 16px;">&nbsp;*</span></td>
    <td>
        <input type="file" name="walk_image" id="walk_image" class="form-control" />
        <span style="font-size: 14px; color: #A0A0A0;">Upload image only in .gif, .jpg or .png format.</span>
    </td>
    <td id="error26" style="color: #F00;">&nbsp;</td>
</tr>

<tr>
	<td></td>
	<td>
        <input type="submit" name="submit" class="btn btn-default" value="Publish &raquo;" onClick="return jobimageCheck()" />
    </td>
    <td>&nbsp;</td>
</tr>
</tbody>
</table>
</div>
</form>