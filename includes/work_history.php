<ul class="nav nav-tabs">
        <li class="active"><a href="#" style="background-color: #F0F0F0;" class="dashboard_title">Work History</a></li>
        <p class="dashboard_paragraph"><a href="#"><button id="work_history" class="btn btn-default btn-md"><img src="images/icons/pencil.png" width="10" height="10"></button></a></p>
    </ul>  
    <div id="space-wh">
        <table class="table table-bordered">
            <tr>
                <td class="dashboard_main_headings">Present/Most Recent Job</td>
                <td>
                <?php
                    if($current_job == ""){
                        echo "<span style='color: red;'>Not Set</span>";
                    }else{
                        echo $current_job;
                    }
                ?>
                </td>
            </tr>
            <tr>
                <td class="dashboard_main_headings">Present/Most Recent Employer</td>
                <td>
                <?php
                    if($current_empl == ""){
                        echo "<span style='color: red;'>Not Set</span>";
                    }else{
                        echo $current_empl;
                    }
                ?>
                </td>
            </tr>
            <tr>
                <td class="dashboard_main_headings">Employer City</td>
                <td>
                <?php
                    if($empl_city == ""){
                        echo "<span style='color: red;'>Not Set</span>";
                    }else{
                        echo $empl_city;
                    }
                ?>
                </td>
            </tr>
            <tr>
                <td class="dashboard_main_headings">Employer Country</td>
                <td>
                <?php
                    if($empl_country_title == ""){
                        echo "<span style='color: red;'>Not Set</span>";
                    }else{
                        echo $empl_country_title;
                    }
                ?>
                </td>
            </tr>
            <tr>
                <td class="dashboard_main_headings">Period</td>
                <td>
                <?php
                    if($empl_month == "-1" && $empl_end == "-1"){
                        echo "<span style='color: red;'>Not Set</span>";
                    }else{
                        echo $empl_month_title . "&nbsp;" . $empl_year . " to " . $empl_end;
                    }
                ?>
                </td>
            </tr>
        </table>
    </div>   