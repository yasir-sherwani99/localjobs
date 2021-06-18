<form method="post" action="post_job.php">
<table border="0" width="990" cellpadding="5" cellspacing="4" style="border-collapse: nocollapse;">
<tr align="left">
	<th colspan="2" class="main_heading">1 - Post a Job</th>
</tr>
<tr>
	<td colspan="2" class="bgcolor"><b>Job Description</b></td>
</tr>
<tr>
	<td style="background-color: #EBFAF7;">Job Title<span style="color: #F00; font-size: 16px;">&nbsp;*</span></td>
    <td><input type="text" name="title" style="padding: 5px; width: 230px;" required/></td>
</tr>
<tr>
	<td style="background-color: #EBFAF7;">Job Description<span style="color: #F00; font-size: 16px;">&nbsp;*</span></td>
    <td>
    	<textarea name="desc" cols="50" rows="10" required>
        </textarea>
        <br/>
        <span>(You may enter upto 2,000 characters)</span>
    </td>
</tr>
<tr>
	<td colspan="2" class="bgcolor"><b>Filter Options for better results</b></td>
</tr>
<tr>
	<td class="post_job_title" style="background-color: #EBFAF7;">Key Skills<span style="color: #F00; font-size: 16px;">&nbsp;*</span></td>
    <td>
    	<textarea name="skills" cols="50" rows="3" required>
        </textarea>
        <br/>
        <span>Enter work skills or designation. Do not enter soft-skills <br/>such as Good communication, fluency in English</span>
    </td>
</tr>
<tr>
	<td class="post_job_title" style="background-color: #EBFAF7;">Experience<span style="color: #F00; font-size: 16px;">&nbsp;*</span><br/><span>(in years)</span></td>
    <td>
    	<select name="min_exp" style="padding: 5px;" required>
            <option value="">Min</option>
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
        <select name="max_exp" style="padding: 5px;" required>
        	<option value="-1">Max</option>
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
        
    </td>
</tr>
<tr>
	<td class="post_job_title" style="background-color: #EBFAF7;">Job City<span style="color: #F00; font-size: 16px;">&nbsp;*</span></td>
    <td>
    	<select name="location" id="location" style="padding: 5px;" required>
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
</tr>
<tr id="other_loc">
	<td class="post_job_title" style="background-color: #EBFAF7;">City Name<span style="color: #F00; font-size: 16px;">&nbsp;*</span></td>
    <td><input type="text" name="location" style="padding: 5px; width: 230px;" required/></td>
</tr>
<tr>
	<td class="post_job_title" style="background-color: #EBFAF7;">Job Country<span style="color: #F00; font-size: 16px;">&nbsp;*</span></td>
    <td>
    	<select name="job_ctry" id="job_ctry" style="padding: 5px;" required>
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
</tr>

<tr>
	<td class="post_job_title" style="background-color: #EBFAF7;">Industry<span style="color: #F00; font-size: 16px;">&nbsp;*</span></td>
    <td>
        <select name="industry" style="padding: 5px;" required>
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
</tr>
<tr>
	<td style="background-color: #EBFAF7;">Expiry Date</td>
    <td><input type="date" name="expiry" style="padding: 5px;" /></td>
</tr>
<tr>
	<td colspan="2" class="bgcolor"><b>Additional Information</b></td>
</tr>
<tr>
	<td class="post_job_title" style="background-color: #EBFAF7;">Montly Salary<span style="color: #F00; font-size: 16px;">&nbsp;*</span></td>
    <td>
    	<select name="min_salary" style="padding: 5px;" required>
        	<option value="-1">Min</option>
            <option value="10000">10,000</option>
            <option value="15000">15,000</option>
            <option value="20000">20,000</option>
            <option value="25000">25,000</option>
            <option value="30000">30,000</option>
            <option value="35000">35,000</option>
            <option value="40000">40,000</option>
            <option value="45000">45,000</option>
            <option value="50000">50,000</option>
            <option value="55000">55,000</option>
            <option value="60000">60,000</option>
            <option value="65000">65,000</option>
            <option value="70000">70,000</option>
            <option value="75000">75,000</option>
            <option value="80000">80,000</option>
            <option value="85000">85,000</option>
            <option value="90000">90,000</option>
            <option value="95000">95,000</option>
            <option value="100000">100,000</option>
            <option value="110000">110,000</option>
            <option value="120000">120,000</option>
            <option value="120000+">120,000+</option>
        </select>
        <select name="max_salary" style="padding: 5px;" required>
        	<option value="-1">Max</option>
            <option value="10000">10,000</option>
            <option value="15000">15,000</option>
            <option value="20000">20,000</option>
            <option value="25000">25,000</option>
            <option value="30000">30,000</option>
            <option value="35000">35,000</option>
            <option value="40000">40,000</option>
            <option value="45000">45,000</option>
            <option value="50000">50,000</option>
            <option value="55000">55,000</option>
            <option value="60000">60,000</option>
            <option value="65000">65,000</option>
            <option value="70000">70,000</option>
            <option value="75000">75,000</option>
            <option value="80000">80,000</option>
            <option value="85000">85,000</option>
            <option value="90000">90,000</option>
            <option value="95000">95,000</option>
            <option value="100000">100,000</option>
            <option value="110000">110,000</option>
            <option value="120000">120,000</option>
            <option value="120000+">120,000+</option>
        </select>
	</td>
</tr>
<tr>
	<td class="post_job_title" style="background-color: #EBFAF7;">Qualification</td>
    <td>
    	<input type="text" name="qual" style="padding: 5px; width: 230px;" />
    </td>
</tr>
<tr>
	<td class="post_job_title" style="background-color: #EBFAF7;">Experience</td>
    <td>
    	<select name="exper" style="padding: 5px;">
        	<option value="Fresh">Fresh Graduate/No Industry Experience</option>
            <option value="10000">10,000</option>
            <option value="15000">15,000</option>
            <option value="20000">20,000</option>
            <option value="25000">25,000</option>
            <option value="30000">30,000</option>
            <option value="35000">35,000</option>
            <option value="40000">40,000</option>
            <option value="45000">45,000</option>
            <option value="50000">50,000</option>
            <option value="55000">55,000</option>
            <option value="60000">60,000</option>
            <option value="65000">65,000</option>
            <option value="70000">70,000</option>
            <option value="75000">75,000</option>
            <option value="80000">80,000</option>
            <option value="85000">85,000</option>
            <option value="90000">90,000</option>
            <option value="95000">95,000</option>
            <option value="100000">100,000</option>
            <option value="110000">110,000</option>
            <option value="120000">120,000</option>
            <option value="120000+">120,000+</option>
        </select>
    </td>
</tr>
<tr>
	<td style="background-color: #EBFAF7;">Number of Vacancies<span style="color: #F00; font-size: 16px;">&nbsp;*</span></td>
    <td><input type="text" name="vacancies" required style="padding: 5px; width: 230px;" /></td>
</tr>
<tr>
	<td style="background-color: #EBFAF7;">Company Profile<span style="color: #F00; font-size: 16px;">&nbsp;*</span></td>
    <td>
    	<textarea name="profile" cols="50" rows="10">
        </textarea>
        <br/>
        <span>(You may enter upto 2,000 characters)</span>
    </td>
</tr>

<tr>
	<td class="post_job_title" style="background-color: #EBFAF7;">Employment Type</td>
    <td>
    	<select name="emp_type" style="padding: 5px;">
        	<option value="Permanent">Permanent</option>
            <option value="Temporary">Temporary</option>
            <option value="Contract">Contract</option>
            <option value="Project">Project</option>
            <option value="Internship">Internship</option>
        </select>
    </td>
</tr>
<tr>
	<td class="post_job_title" style="background-color: #EBFAF7;">Employment Status</td>
    <td>
    	<input type="radio" name="emp_status" value="Full Time"> Full Time
        <input type="radio" name="emp_status" value="Part Time"> Part Time
    </td>
</tr>
<tr>
	<td colspan="2" class="bgcolor"><b>Contact Information</b></td>
</tr>
<tr>
	<td class="post_job_title" style="background-color: #EBFAF7;">Company Name<span style="color: #F00; font-size: 16px;">&nbsp;*</span></td>
    <td><input type="text" name="company" required style="padding: 5px; width: 230px;" /></td>
</tr>
<tr>
	<td class="post_job_title" style="background-color: #EBFAF7;">Contact Name<span style="color: #F00; font-size: 16px;">&nbsp;*</span></td>
    <td><input type="text" name="contact_name" required style="padding: 5px; width: 230px;" /></td>
</tr>
<tr>
	<td class="post_job_title" style="background-color: #EBFAF7;">Contact No</td>
    <td><input type="text" name="contact_no" style="padding: 5px; width: 230px;" /></td>
</tr>
<tr>
	<td class="post_job_title" style="background-color: #EBFAF7;">Email for response<span style="color: #F00; font-size: 16px;">&nbsp;*</span></td>
    <td>
    	<input type="email" name="email" required style="padding: 5px; width: 230px;" /><br/>
    	<span>Note: use commas to specify multiple email addresses</span>
    </td>
</tr>
<tr>
	<td colspan="2" class="main_heading">2 - Account Details</td>
</tr>
<tr>
	<td colspan="2" class="bgcolor"><b>Account Information</b></td>
</tr>
<tr>
	<td class="post_job_title" style="background-color: #EBFAF7;">Registered Employer of localjobs</td>
    <td>
		<input type="radio" name="reg_emp" value="Yes"> Yes
        <input type="radio" name="reg_emp" value="No"> No    	
    </td>
</tr>

<tr>
	<td style="background-color: #EBFAF7;">Job Keywords<span style="color: #F00; font-size: 16px;">&nbsp;*</span></td>
    <td><input type="text" name="keywords" required style="padding: 5px; width: 230px;" /></td>
</tr>
<tr>
	<td></td>
	<td id="post_butt">
        <input type="submit" name="submit" value="Publish Job &raquo;" />
    </td>
</tr>
</table>
</form>