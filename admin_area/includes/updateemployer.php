<form method="post" role="form" action="edit_employer.php?edit_form=<?php echo $id; ?>">
<table border="0" class="table table-bordered">
	<tbody>
    <tr>
        <td colspan="2">
        <b style="color: #0080FF; font-size: 18px;">Contact Information</b><br/>
            <span style="color: #FFB266; font-size: 14px;">Information below will be used for communication between you and localjobs.pk</span>
        </td>
    </tr>
    <tr>
        <td>Contact Name</td>
        <td><input type="text" name="emp_name" class="form-control" required value="<?php echo $contact_person; ?>"/></td>
    </tr>
    <tr>
        <td>Designation</td>
        <td><input type="text" name="emp_desig" class="form-control" required value="<?php echo $desig; ?>"/></td>
    </tr>
    <tr>
        <td>Contact Number</td>
        <td>
            <input type="text" name="area_code" maxlength="4" placeholder="Area Code" style="padding: 5px; width: 75px; border-radius: 5px; border: 1px solid #C0C0C0;"required value="<?php echo $area_code; ?>"/>
            <input type="text" name="land_line" maxlength="7" placeholder="Landline Number" style="padding: 5px; width: 130px; border-radius: 5px; border: 1px solid #C0C0C0;" required value="<?php echo $land_line; ?>"/>
            <input type="text" name="ext" maxlength="4" placeholder="Extn." style="padding: 5px; width: 40px; border-radius: 5px; border: 1px solid #C0C0C0;" required value="<?php echo $extn; ?>"/>
        </td>
    </tr>
    <tr>
        <td>Mobile Number</td>
        <td><input type="text" name="emp_mobile" class="form-control" required value="<?php echo $mobile; ?>"/></td>
    </tr>
    <tr>
        <td colspan="2">
            <b style="color: #0080FF; font-size: 18px;">Company Information</b><br/>
            <span style="color: #FFB266; font-size: 14px;">Information below will be used for communication between you and localjobs.pk</span>
        </td>
    </tr>
    <tr>
        <td>Company Name</td>
        <td><input type="text" name="comp_name" class="form-control" required value="<?php echo $comp_name; ?>"/></td>
    </tr>
    <tr>
        <td>Company Address</td>
        <td>
            <textarea name="comp_addr" cols="50" rows="3" required class="form-control">
            <?php echo $comp_addr; ?>
            </textarea>
        </td>
    </tr>
    <tr>
        <td>Company Type</td>
        <td>
        	<select name="comp_type" class="form-control" required>
            	<option value="<?php echo $comp_type; ?>"><?php echo $comp_type; ?></option>
                <option value="Placement Consultants">Placement Consultants</option>
                <option value="Corporate">Corporate</option>
            </select>
        </td>
    </tr>
    <tr>
        <td>Location(City)<span style="color: #F00; font-size: 16px;">&nbsp;*</span></td>
          <?php
				$get_city = "select * from city where city_id = '$location'";
				$run_city = mysqli_query($connection, $get_city);
				$row_city = mysqli_fetch_array($run_city);
					$city_id = $row_city['city_id'];
					$city_name = $row_city['city_name'];
		 ?>

        <td>
            <select name="comp_loc"  class="form-control" required>
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
        <td>Type of Business</td>
         <?php
				$get_buss = "select * from business_type where buss_id = '$business_type'";
				$run_buss = mysqli_query($connection, $get_buss);
				$row_buss = mysqli_fetch_array($run_buss);
					$buss_id = $row_buss['buss_id'];
					$buss_type = $row_buss['buss_type'];
		 ?>

        <td>
            <select name="business" class="form-control" required>
            	<option value="<?php echo $buss_id; ?>"><?php echo $buss_type; ?></option>
                <?php
					$get_new_buss = "select * from business_type";
					$run_new_buss = mysqli_query($connection, $get_new_buss);
						while($row_new_buss = mysqli_fetch_array($run_new_buss)){
							$new_buss_id = $row_new_buss['buss_id'];
							$new_buss_type = $row_new_buss['buss_type'];
								echo "<option value='$new_buss_id'>$new_buss_type</option>";
					}
				?>
            </select>
        </td>
    </tr>
    <tr>
        <td>Company Category<span style="color: #F00; font-size: 16px;">&nbsp;*</span></td>
		<?php
            $get_cats = "select * from categories where cat_id = '$category'";
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
        <td>Company Profile</td>
        <td>
            <textarea name="comp_profile" cols="50" rows="4" class="form-control" required>
            <?php echo $profile; ?>
            </textarea>
        </td>
    </tr>
    <tr>
        <td>Company Website</td>
        <td><input type="url" name="comp_url" class="form-control" value="<?php echo $website; ?>"/></td>
    </tr>
    <tr>
        <td></td>
        <td><input type="submit" name="update" class="btn btn-default" value="Update Employer &raquo;"/></td>
    </tr>
    </tbody>
</table>
</form>
