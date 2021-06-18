  	
    <div id="quick_apply" class="col-md-12">
        <p>Please complete the information below to apply to this job.</p>  
        <div class="table-responsive">
        <form method="post" action="job_details.php?job_id=<?php echo $job_id1; ?>" enctype="multipart/form-data" role="form">
        <table class="table">
            <tr>
                <td style="text-align: right; font-weight: bold; width: 30%;">First Name:</td>
                <td style="width: 65%;"><input type="text" name="fname" class="form-control" /></td>
                <td style="color: #F00; font-size: 16px; font-weight: bold; width: 5%;">*</td>
            </tr>
            <tr>
                <td style="text-align: right; font-weight: bold;">Last Name:</td>
                <td><input type="text" name="lname" class="form-control" /></td>
                <td style="color: #F00; font-size: 16px; font-weight: bold;">*</td>
            </tr>
            <tr>
                <td style="text-align: right; font-weight: bold;">Email:</td>
                <td><input type="email" name="email" class="form-control" /></td>
                <td style="color: #F00; font-size: 16px; font-weight: bold;">*</td>
            </tr>
            <tr>
                <td style="text-align: right; font-weight: bold;">Country:</td>
                <td>
                	<select name="country" id="country" class="form-control">
        			<option value="-1">Select Country</option>
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
                <td style="color: #F00; font-size: 16px; font-weight: bold;">*</td>
            </tr>
            <tr id="pak_location">
                <td style="text-align: right; font-weight: bold;">City:</td>
                <td>
                    <select name="pakcity" class="form-control">
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
                <td style="color: #F00; font-size: 16px; font-weight: bold;">*</td>
            </tr>
            <tr id="other_loc">
                <td style="text-align: right; font-weight: bold;">City:</td>
                <td><input type="text" name="other_city" class="form-control" /></td>
                <td style="color: #F00; font-size: 16px; font-weight: bold;">*</td>
            </tr>
            <tr>
                <td style="text-align: right; font-weight: bold;">Mobile:</td>
                <td><input type="text" name="mobile" class="form-control" /></td>
                <td style="color: #F00; font-size: 16px; font-weight: bold;">*</td>
            </tr>
            <tr>
                <td style="text-align: right; font-weight: bold;">CV / Resume:</td>
                <td>
                    <input type="file" name="resume" class="form-control" />
                    <span class="help-block">Attach your CV (Word or PDF file)</span>
                </td>
                <td style="color: #F00; font-size: 16px; font-weight: bold;">*</td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="quick_apply" value="Submit" class="btn btn-primary" /></td>
                <td></td>
            </tr>           
        </table>
        </form>
        </div>
    </div>