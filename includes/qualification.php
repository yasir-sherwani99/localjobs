<ul class="nav nav-tabs">
        <li class="active"><a href="#" style="background-color: #F0F0F0;" class="dashboard_title">Qualification</a></li>
        <p class="dashboard_paragraph"><a href="#"><button id="edit_qualification" class="btn btn-default btn-md"><img src="images/icons/pencil.png" width="10" height="10"></button></a></p>
    </ul>  

    <div id="space-qual">
        <table class="table table-bordered">
            <tr>
                <td class="dashboard_main_headings">Highest Qualification</td>
                <td><?php echo $mem_degree; ?></td>
            </tr>
            <tr>
                <td class="dashboard_main_headings">Specialization/Majors</td>
                <td>
                <?php
                    if($mem_majors == ""){
                        echo "<span style='color: red;'>Not Set</span>";
                    }else{
                        echo $mem_majors;
                    }
                ?>
                </td>
            </tr>
            <tr>
                <td class="dashboard_main_headings">Institute</td>
                <td>
                <?php
                    if($mem_inst == ""){
                        echo "<span style='color: red;'>Not Set</span>";
                    }else{
                        echo $mem_inst;
                    }
                ?>
                </td>
            </tr>
            
            <tr>
                <td class="dashboard_main_headings">Institute City</td>
                <td>
                <?php
                    if($mem_inst_city == ""){
                        echo "<span style='color: red;'>Not Set</span>";
                    }else{
                        echo $mem_inst_city;
                    }
                ?>
                </td>
            </tr>
            <tr>
                <td class="dashboard_main_headings">Institute Country</td>
                <td>
                <?php
                    if($inst_country_title == ""){
                        echo "<span style='color: red;'>Not Set</span>";
                    }else{
                        echo $inst_country_title;
                    }
                ?>
                </td>
            </tr>
            <tr>
                <td class="dashboard_main_headings">Year of Passing</td>
                <td>
                <?php
                    if($mem_year_pass == "0000"){
                        echo "<span style='color: red;'>Not Set</span>";
                    }else{
                        echo $mem_year_pass;
                    }
                ?>
                </td>
            </tr>
        </table>
    </div>