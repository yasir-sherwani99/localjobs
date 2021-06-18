<ul class="nav nav-tabs">
        <li class="active"><a href="#" style="background-color: #F0F0F0;" class="dashboard_title">Personal Information</a></li>
        <p class="dashboard_paragraph"><a href="#"><button id="edit_personal_info" class="btn btn-default btn-md"><img src="images/icons/pencil.png" width="10" height="10"></button></a></p>
    </ul>  

    <div id="space-info">
        <table class="table table-bordered">
            <tr>
                <td class="dashboard_main_headings">Name</td>
                <td><?php echo $mem_first_name . "&nbsp;" . $mem_last_name; ?></td>
            </tr>
            <tr>
                <td class="dashboard_main_headings">Date of Birth</td>
                <td><?php echo $mem_dob_day . "-" . $mem_dob_month . "-" . $mem_dob_year; ?></td>
            </tr>
            <tr>
                <td class="dashboard_main_headings">Gender</td>
                <td><?php echo $mem_gender; ?></td>
            </tr>
            <tr>
                <td class="dashboard_main_headings">Mobile No</td>
                <td><?php echo "0" . $mem_cell; ?></td>
            </tr>
            <tr>
                <td class="dashboard_main_headings">Home Phone</td>
                <td><?php echo "0" . $mem_home; ?></td>
            </tr>
            <tr>
                <td class="dashboard_main_headings">Address</td>
                <td>
                <?php
                    if($mem_addr == ""){
                        echo "<span style='color: red;'>Not Set</span>";
                    }else{
                        echo $mem_addr;
                    }
                ?>
                </td>
            </tr>
            <?php
                if($mem_city == "-1"){
                    echo "<tr>
                            <td class='dashboard_main_headings'>Current Location</td>
                            <td>$other_city</td>
                        </tr>";
                } else{
                    
                    $get_mem_city = "SELECT * FROM city WHERE city_id = '$mem_city'";
                    $run_mem_city = mysqli_query($connection, $get_mem_city);
                    $row_mem_city = mysqli_fetch_array($run_mem_city);
                        $mem_city_title = $row_mem_city['city_name'];
              
                    echo "<tr>
                            <td class='dashboard_main_headings'>Current Location</td>
                            <td>$mem_city_title</td>
                          </tr>";  

                }
            ?>
            <tr>
                <td class="dashboard_main_headings">Country</td>
                <td><?php echo $mem_country_title; ?></td>
            </tr>
            
        </table>
    </div>
