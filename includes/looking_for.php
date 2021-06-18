<ul class="nav nav-tabs">
        <li class="active"><a href="#" style="background-color: #F0F0F0;" class="dashboard_title">Looking For</a></li>
        <p class="dashboard_paragraph"><a href="#"><button id="edit_looking" class="btn btn-default btn-md"><img src="images/icons/pencil.png" width="10" height="10"></button></a></p>
    </ul>  

    <div id="space-looking">
        <table class="table table-bordered">
            <tr>
                <td class="dashboard_main_headings">Prefer Job</td>
                <td>
                <?php
                    if($prefer_job == ""){
                        echo "<span style='color: red;'>Not Set</span>";
                    }else{
                        echo $prefer_job;
                    }
                ?>
                </td>
            </tr>
            <tr>
                <td class="dashboard_main_headings">Prefer Job Location</td>
                <td>
                <?php
                    $prefer_job_loc_confirm = "SELECT * FROM city WHERE city_id = '$prefer_job_loc'";
                    $run_prefer_job_loc_confirm = mysqli_query($connection, $prefer_job_loc_confirm);
                    $row_prefer_job_loc_confirm = mysqli_fetch_array($run_prefer_job_loc_confirm);
                        $prefer_job_id_c = $row_prefer_job_loc_confirm['city_id'];
                        $prefer_job_city_c = $row_prefer_job_loc_confirm['city_name'];
                ?>
                <?php
                    if($prefer_job_loc == "-1"){
                        echo "<span style='color: red;'>Not Set</span>";
                    }else{
                        echo $prefer_job_city_c;
                    }
                ?>
                </td>
            </tr>
            <tr>
                <td class="dashboard_main_headings">Salary Expectations</td>
                <td>
                <?php
                    if($salary_exp == "0"){
                        echo "<span style='color: red;'>Not Set</span>";
                    }else{
                        echo $salary_exp;
                    }
                ?>
                </td>
            </tr>
        </table>
    </div>