    <ul class="nav nav-tabs">
        <li class="active"><a href="#" style="background-color: #F0F0F0;" class="dashboard_title">Update Personal Information</a></li>
    </ul>  

    <div id="edit-space-info">
  
      <form method="post" role="form" action="my_account.php?mem_id=<?php echo $mem_id; ?>&mem_city=<?php echo $mem_city; ?>">
      <table class="table table-bordered">
        <tr class="edit_personal_info">
            <td class="dashboard_main_headings">First Name</td>
            <td><input type="text" class="form-control" name="fname" required value="<?php echo $mem_first_name; ?>"></td>
        </tr>
        <tr class="edit_personal_info">
            <td class="dashboard_main_headings">Last Name</td>
            <td><input type="text" name="lname" class="form-control" required value="<?php echo $mem_last_name; ?>"></td>
        </tr>
        <tr class="edit_personal_info">
            <td class="dashboard_main_headings">Mobile Phone</td>
            <td><input type="text" name="mobile" class="form-control" required value="<?php echo $mem_cell; ?>"></td>
        </tr>
        <tr class="edit_personal_info">
            <td class="dashboard_main_headings">Home Phone</td>
            <td><input type="text" name="homeph" class="form-control" value="<?php echo $mem_home; ?>"></td>
        </tr>
       <tr class="edit_personal_info">
            <td class="dashboard_main_headings">Address</td>
            <td><input type="text" name="address" class="form-control" value="<?php echo $mem_addr; ?>">
            </td>
        </tr>  
        <tr class="edit_personal_info">
            <td class="dashboard_main_headings">Country</td>
            <td>
                <select name="country" id="m_ctry" required class="profile_ddm">
                    <option value="<?php echo $mem_country_id; ?>"><?php echo $mem_country_title; ?></option>
                    <?php
                        $get_ctry1 = "SELECT * FROM countries order by ctry_name";
                        $run_ctry1 = mysqli_query($connection, $get_ctry1);
                        while($row_ctry1 = mysqli_fetch_array($run_ctry1)){
                            $ctry_id1 = $row_ctry1['ctry_id'];
                            $ctry_title1 = $row_ctry1['ctry_name'];
                        echo "<option value='$ctry_id1'>$ctry_title1</option>";
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr id="member_pak_city">
			<td class="dashboard_main_headings">Current Location</td>
			<td>
                 <select name="city" required class="profile_ddm">
                       <option value="<?php echo $mem_city_id; ?>"><?php echo $mem_city_title; ?></option>
                          
        	<?php				                
                        $get_city1 = 'SELECT * FROM city order by city_name';
                        $run_city1 = mysqli_query($connection, $get_city1);
                            while($row_city1 = mysqli_fetch_array($run_city1)){
                                $city_id1 = $row_city1['city_id'];
                                $city_title1 = $row_city1['city_name'];
                            echo "<option value='$city_id1'>$city_title1</option>";
                            }
         	?>
                  </select> 
             </td>
		</tr>
        <tr id="member_other_city">
            <td class="dashboard_main_headings">Current Location</td>
            <td>
            	<input type="text" name="other_city" class="edit_fields" required value="<?php echo $other_city; ?>">
            
            </td>
         </tr>
        
                     
        <tr class="edit_personal_info">
            <td class="dashboard_main_headings">Date of Birth</td>
            <td>
                <select name="day" required class="profile_ddm">
                    <option value="<?php echo $mem_dob_day; ?>"><?php echo $mem_dob_day; ?></option>
                    <?php
                        $get_day = "SELECT * FROM day";
                        $run_day = mysqli_query($connection, $get_day);
                        while($row_day = mysqli_fetch_array($run_day)){
                            $day_id = $row_day['day_id'];
                            $day_day = $row_day['day_day'];
                            echo "<option value='$day_id'>$day_id</option>";
                        }
                    ?>
                </select>
                <select name="month" required class="profile_ddm">
                    <option value="<?php echo $mem_dob_month_id; ?>"><?php echo $mem_dob_month_title; ?></option>
                    <?php
                        $get_month1 = "SELECT * FROM months";
                        $run_month1 = mysqli_query($connection, $get_month1);
                        while($row_month1 = mysqli_fetch_array($run_month1)){
                            $mon_id1 = $row_month1['month_id'];
                            $mon_title1 = $row_month1['month_name'];
                            echo "<option value='$mon_id1'>$mon_title1</option>";
                        }
                    ?>
                </select>
                <select name="year" required class="profile_ddm">
                    <option value="<?php echo $mem_dob_year; ?>"><?php echo $mem_dob_year; ?></option>
                    <?php
                        $get_year = "SELECT * FROM years";
                        $run_year = mysqli_query($connection, $get_year);
                        while($row_year = mysqli_fetch_array($run_year)){
                            $year_id = $row_year['year_id'];
                            $year_year = $row_year['year_year'];
                            echo "<option value='$year_id'>$year_id</option>";
                        }
                    ?>
                </select>
            </td>
        </tr>
        
        <tr class="edit_personal_info">
            <td class="dashboard_main_headings">Gender</td>
            <td>
                <select name="gender" required class="profile_ddm">
                    <option value="<?php echo $mem_gender; ?>"><?php echo $mem_gender; ?></option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>

            </td>
        </tr>
        <tr class="edit_personal_info">
            <td class="dashboard_main_headings"></td>
            <td>
                <input type="submit" name="update_info" class="btn btn-success" value="Save Information">&nbsp;&nbsp;<span id="cancel_personal" class="btn btn-warning">Cancel</span>
            </td>
        </tr>
        </table>
        </form>
     </div>   
        <?php
            if(isset($_POST['update_info'])){
                $edit_record = $_GET['mem_id'];
                $edit_city = cleanStr($_GET['mem_city']);
                $fname = cleanStr($_POST['fname']);
                $lname = cleanStr($_POST['lname']);
                $mobile = cleanStr($_POST['mobile']);
                $homeph = cleanStr($_POST['homeph']);
                $addres = cleanStr($_POST['address']);
                $country = cleanStr($_POST['country']);
                $city = cleanStr($_POST['city']);
                $other_city = cleanStr($_POST['other_city']);
                $day = cleanStr($_POST['day']);
                $month = cleanStr($_POST['month']);
                $year = cleanStr($_POST['year']);
                $gender = cleanStr($_POST['gender']);
				
				if($country == 1){
					$other_city = "";
					
					$update_info = "UPDATE members
                                    SET mem_first_name = '$fname',
                                        mem_last_name = '$lname',
                                        mem_gender = '$gender',
                                        mem_cell = '$mobile',
                                        mem_home_ph = '$homeph',
                                        dob_day = '$day',
                                        dob_month = '$month',
                                        dob_year = '$year',
                                        mem_addr = '$addres',
										mem_city = '$city',
                                        mem_city_other = '$other_city',
                                        mem_country = '$country'
                                            WHERE mem_id = '$edit_record'";

				}
                
                else{
					$city = "-1";
                    $update_info = "UPDATE members
                                    SET mem_first_name = '$fname',
                                        mem_last_name = '$lname',
                                        mem_gender = '$gender',
                                        mem_cell = '$mobile',
                                        mem_home_ph = '$homeph',
                                        dob_day = '$day',
                                        dob_month = '$month',
                                        dob_year = '$year',
                                        mem_addr = '$addres',
										mem_city = '$city',
                                        mem_city_other = '$other_city',
                                        mem_country = '$country'
                                            WHERE mem_id = '$edit_record'";
                    }
                  /*  else{
                        $update_info = "UPDATE members
                                        SET mem_first_name = '$fname',
                                            mem_last_name = '$lname',
                                            mem_gender = '$gender',
                                            mem_cell = '$mobile',
                                            mem_home_ph = '$homeph',
                                            dob_day = '$day',
                                            dob_month = '$month',
                                            dob_year = '$year',
                                            mem_addr = '$addres',
                                            mem_city = '$city',
                                            mem_country = '$country'
                                                WHERE mem_id = '$edit_record'";

                    }  */
                $run_update = mysqli_query($connection, $update_info);
                
                if($run_update){
                    echo "<script>window.open('my_account.php?mem_id=$edit_record', '_self')</script>";
                } 
                else{
                    die("Database query has failed" . mysqli_error());
                }
        
            }
        ?>

