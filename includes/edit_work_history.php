<ul class="nav nav-tabs">
        <li class="active"><a href="#" style="background-color: #F0F0F0;" class="dashboard_title">Update Work History</a></li>
    </ul>  
    <div id="edit-space-wh">
      <form method="post" role="form" action="my_account.php?mem_id=<?php echo $mem_id; ?>">
      <table class="table table-bordered">
        <tr class="edit_empl_details">
            <td class="dashboard_main_headings">Present/Most Recent Job</td>
            <td>
                <input type="text" name="cjob" class="form-control" value="<?php echo $current_job; ?>" />
            </td>
        </tr>
        <tr class="edit_empl_details">
            <td class="dashboard_main_headings">Present/Most Recent Employer</td>
            <td>
                <input type="text" name="cempl" class="form-control" value="<?php echo $current_empl; ?>" />
            </td>
        </tr>
        
        <tr class="edit_empl_details">
            <td class="dashboard_main_headings">Employer City</td>
            <td>
                <input type="text" name="ccity" class="form-control" value="<?php echo $empl_city; ?>" />
            </td>
        </tr>
          <?php
            $get_ctry3 = "SELECT * FROM countries WHERE ctry_id = '$empl_ctry'";
            $run_ctry3 = mysqli_query($connection, $get_ctry3);
            $row_ctry3 = mysqli_fetch_array($run_ctry3);
                $ctry_id3 = $row_ctry3['ctry_id'];
                $ctry_title3 = $row_ctry3['ctry_name'];
            
        ?>
        <tr class="edit_empl_details">
            <td class="dashboard_main_headings">Employer Country</td>
            <td>
                <select name="cctry" class="profile_ddm">
                <option value="<?php echo $ctry_id3; ?>"><?php echo $ctry_title3; ?></option>
                    <?php
                        $get_ctry4 = "SELECT * FROM countries order by ctry_name";
                        $run_ctry4 = mysqli_query($connection, $get_ctry4);
                        while($row_ctry4 = mysqli_fetch_array($run_ctry4)){
                            $ctry_id4 = $row_ctry4['ctry_id'];
                            $ctry_title4 = $row_ctry4['ctry_name'];
                        echo "<option value='$ctry_id4'>$ctry_title4</option>";
                    }
                    ?>
                </select>	
                
            </td>
        </tr>
        <tr class="edit_empl_details">
            <td class="dashboard_main_headings">Period</td>
            <?php
            $get_month1 = "SELECT * FROM months WHERE month_id = '$empl_month'";
            $run_month1 = mysqli_query($connection, $get_month1);
            $row_month1 = mysqli_fetch_array($run_month1);
                $mon_id1 = $row_month1['month_id'];
                $mon_title1 = $row_month1['month_name'];
            
            ?>

            <td>
                <select name="cemonth" class="profile_ddm">
                    <option value="<?php echo $mon_id1; ?>"><?php echo $mon_title1; ?></option>
                    <?php
                        $get_new_month = "SELECT * FROM months";
                        $run_new_month = mysqli_query($connection, $get_new_month);
                        while($row_new_month = mysqli_fetch_array($run_new_month)){
                            $new_month_id = $row_new_month['month_id'];
                            $new_month_title = $row_new_month['month_name'];
                            echo "<option value='$new_month_id'>$new_month_title</option>";
                        }
                    ?>
                </select>
                <select name="ceyear" required class="profile_ddm">
                    <option value="<?php echo $empl_year;; ?>"><?php echo $empl_year; ?></option>
                    <?php
                        $get_new_year = "SELECT * FROM years order by year_year desc";
                        $run_new_year = mysqli_query($connection, $get_new_year);
                        while($row_new_year = mysqli_fetch_array($run_new_year)){
                            $new_year_id = $row_new_year['year_id'];
                            $new_year_year = $row_new_year['year_year'];
                            echo "<option value='$new_year_id'>$new_year_id</option>";
                        }
                    ?>
                </select> to 
                <select name="ceenddate" class="profile_ddm">
                    <option value="<?php echo $empl_end; ?>"><?php echo $empl_end; ?></option>
                    <option value="Present">Presently Working</option>
                    <?php
                        $getyear4 = "select * from years order by year_year desc";
                        $runyear4 = mysqli_query($connection, $getyear4);
                        while($rowyear4 = mysqli_fetch_array($runyear4)){
                            $yid4 = $rowyear4['year_id'];
                            $yyear4 = $rowyear4['year_year'];
                            echo "<option value='$yid4'>$yyear4</option>";
                        }
                    ?>
                </select>				

            </td>
        </tr>        
        <tr class="edit_empl_details">
            <td></td>
            <td>
                <input type="submit" name="update_job" class="btn btn-success" value="Save Information">&nbsp;&nbsp;<button id="cancel_emp" class="btn btn-warning">Cancel</button>
            </td>
        </tr>
        </table>
        </form>
      </div>  
        <?php
            if(isset($_POST['update_job'])){
                $edit_record1 = $_GET['mem_id'];
                $cjob = cleanStr($_POST['cjob']);
                $cempl = cleanStr($_POST['cempl']);
                $ccity = cleanStr($_POST['ccity']);
                $cctry = cleanStr($_POST['cctry']);
                $cemonth = cleanStr($_POST['cemonth']);
                $ceyear = cleanStr($_POST['ceyear']);
                $cenddate = cleanStr($_POST['ceenddate']);  
                
                            
                $update_emp = "UPDATE members
                                SET current_job = '$cjob',
                                    current_job_month = '$cemonth', 
                                    current_job_year = '$ceyear',
                                    current_end_date = '$cenddate',
                                    comp_name = '$cempl',
                                    comp_ctry = '$cctry',
                                    comp_city = '$ccity'
                                        WHERE mem_id = '$edit_record1'";
                                    
                $run_emp = mysqli_query($connection, $update_emp);
                
                if($run_emp){
                    echo "<script>window.open('my_account.php?mem_id=$edit_record1', '_self')</script>";
                } 
                else{
                    die("Database query has failed" . mysqli_error());
                }
        
            }
        ?>

    