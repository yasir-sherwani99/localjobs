<form name="" action="emp_register.php" method="post" role="form" onSubmit="return confirmSubmit()">
    <div class="table-responsive">
        <table border="0" class="table table-striped">
        	<tbody>
            <tr>
                <td colspan="3" style="padding-left: 10px;">
                <b style="color: #0080FF; font-size: 18px;">Login Information</b><br/>
                <span style="color: #FFB266; font-size: 14px;">Password should be atleast 6 characters</span>
                </td>
            </tr>
            <tr>
                <td style="width: 150px; padding-left: 10px;">Email<span class="red_sterik">&nbsp;*</span></td>
                <td style="width: 250px;"><input type="email" name="emp_email" id="emp_email" class="form-control" onBlur="emailCheck()"/></td>
                <td style="width: 200px;" class="empl_errors" id="error1"></td>
            </tr>
            <tr>
                <td style="padding-left: 10px;">Password<span class="red_sterik">&nbsp;*</span></td>
                <td><input type="password" name="emp_pass" id="emp_pass" class="form-control" onBlur="emptyCheck()" /></td>
                <td id="error2" class="empl_errors"></td>
            </tr>
            <tr>
                <td style="padding-left: 10px;">Confirm Password<span class="red_sterik">&nbsp;*</span></td>
                <td><input type="password" name="emp_pass1" id="emp_pass1" class="form-control" onBlur="checkPass()" /></td>
                <td id="error3" class="empl_errors"></td>
            </tr>
            <tr>
                <td colspan="3" style="padding-left: 10px;">
                <b style="color: #0080FF; font-size: 18px;">Contact Information</b><br/>
                    <span style="color: #FFB266; font-size: 14px;">Information below will be used for communication between you and localjobs.pk</span>
                </td>
            </tr>
            <tr>
                <td style="padding-left: 10px;">Contact Name<span class="red_sterik">&nbsp;*</span></td>
                <td><input type="text" name="emp_name" id="emp_name" class="form-control" onBlur="NameCheck()" /></td>
                <td id="error4" class="empl_errors"></td>
            </tr>
            <tr>
                <td style="padding-left: 10px;">Designation<span class="red_sterik">&nbsp;*</span></td>
                <td><input type="text" name="emp_desig" id="emp_desig" class="form-control" onBlur="desigCheck()" /></td>
                <td id="error5" class="empl_errors"></td>
            </tr>
            <tr>
                <td style="padding-left: 10px;">Land Line Number</td>
                <td>
                    <input type="text" name="area_code" maxlength="4" placeholder="Area Code" style="padding: 5px; width: 80px; border: 1px solid #C0C0C0; border-radius: 5px;" />
                    <input type="text" name="land_line" maxlength="7" placeholder="Landline Number" style="padding: 5px; width: 125px; border: 1px solid #C0C0C0; border-radius: 5px;" />
                    <input type="text" name="ext" maxlength="4" placeholder="Extn." style="padding: 5px; width: 45px; border: 1px solid #C0C0C0; border-radius: 5px;" />
                </td>
                <td></td>
            </tr>
            <tr>
                <td style="padding-left: 10px;">Mobile Number<span class="red_sterik">&nbsp;*</span></td>
                <td><input type="text" name="emp_mobile" id="emp_mobile" class="form-control" onBlur="mobileCheck()" /></td>
                <td id="error6" class="empl_errors"></td>
            </tr>
            <tr>
                <td colspan="3" style="padding-left: 10px;">
                    <b style="color: #0080FF; font-size: 18px;">Company Information</b>
                </td>
            </tr>
            <tr>
                <td style="padding-left: 10px;">Company Name<span class="red_sterik">&nbsp;*</span></td>
                <td><input type="text" name="comp_name" id="comp_name" class="form-control" onBlur="compCheck()" /></td>
                <td id="error7" class="empl_errors"></td>
            </tr>
            <tr>
                <td style="padding-left: 10px;">Company Address<span class="red_sterik">&nbsp;*</span></td>
                <td>
                    <textarea name="comp_addr" id="comp_addr" cols="31" rows="3" class="form-control" onBlur="compaddrCheck()"></textarea>
                </td>
                <td id="error8" class="empl_errors"></td>
            </tr>
            <tr>
                <td style="padding-left: 10px;">Company Type<span class="red_sterik">&nbsp;*</span></td>
                <td>
                <input type="radio" name="comp_type" id="comp_type" value="Placement Consultants" onClick="comptypeCheck()"/>&nbsp;Placement Consultants<br />
                <input type="radio" name="comp_type" id="comp_type" value="Corporate" onClick="comptypeCheck()"/>&nbsp;Corporate
                </td>
                <td id="error9" class="empl_errors"></td>
            </tr>
            <tr>
                <td style="padding-left: 10px;">Location(City)<span class="red_sterik">&nbsp;*</span></td>
                <td>
                   <select name="comp_loc" id="location" class="form-control" onBlur="cityCheck()">
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
                <td id="error10" class="empl_errors"></td>
            </tr>
            <tr id="other_loc">
                <td style="padding-left: 10px;">City Name<span class="red_sterik">&nbsp;*</span></td>
                <td><input type="text" name="other_city" id="other_city" class="form-control" onBlur="othercityCheck()"/></td>
                <td id="error11" class="empl_errors"></td>
            </tr>
            <tr>
                <td style="padding-left: 10px;">Country<span class="red_sterik">&nbsp;*</span></td>
                <td>
                    <select name="country" id="job_ctry" class="form-control" onBlur="ctryCheck()">
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
                <td id="error12" class="empl_errors"></td>
            </tr>

            <tr>
                <td style="padding-left: 10px;">Type of Business<span class="red_sterik">&nbsp;*</span></td>
                <td>
                    <select name="business" id="business" class="form-control" onBlur="businessCheck()">
                        <option value="-1">Select Business</option>
                        <?php
                            $get_buss = "select * from business_type order by buss_type";
                            $run_buss = mysqli_query($connection, $get_buss);
                            while($row_buss = mysqli_fetch_array($run_buss)){
                                $buss_id = $row_buss['buss_id'];
                                $buss_type = $row_buss['buss_type'];
                                echo "<option value='$buss_id'>$buss_type</option>";
                            }  
                        ?>
                    </select>
                </td>
                <td id="error13" class="empl_errors"></td>
            </tr>
            <tr>
                <td style="padding-left: 10px;">Category<span class="red_sterik">&nbsp;*</span></td>
                <td>
                    <select name="industry" id="industry" class="form-control" onBlur="industryCheck()">
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
                <td id="error14" class="empl_errors"></td>
            </tr>
            <tr>
                <td style="padding-left: 10px;">Company Profile<span class="red_sterik">&nbsp;*</span></td>
                <td>
                    <textarea name="comp_profile" id="comp_profile" cols="31" rows="8" class="form-control" onBlur="profileCheck()"></textarea>
                </td>
                <td id="error15" class="empl_errors"></td>
            </tr>
            <tr>
                <td style="padding-left: 10px;">Company Website</td>
                <td><input type="text" name="comp_url" class="form-control" value="http://"/></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="register" class="btn btn-danger" value="Register &raquo;" /></td>
                <td></td>
            </tr>
            </tbody>
        </table>
        </div> 
        </form>
  