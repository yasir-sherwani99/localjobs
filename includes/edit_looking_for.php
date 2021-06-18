<ul class="nav nav-tabs">
        <li class="active"><a href="#" style="background-color: #F0F0F0;" class="dashboard_title">Update Looking For</a></li>
    </ul>  

    <div id="edit-space-looking">
    
    <form method="post" role="form" action="my_account.php?mem_id=<?php echo $mem_id; ?>">
    <table class="table table-bordered">	
        <tr class="edit_looking_for">
            <td class="dashboard_main_headings">Prefer Job</td>
            <td>
                <input type="text" name="prefer_job" class="form-control" required value="<?php echo $prefer_job; ?>" />
            </td>
        </tr>
        
        <tr class="edit_looking_for">
            <td class="dashboard_main_headings">Prefer Job Location</td>
            <?php
                $get_prefer_job_loc = "SELECT * FROM city WHERE city_id = '$prefer_job_loc'";
                $run_prefer_job_loc = mysqli_query($connection, $get_prefer_job_loc);
                $row_prefer_job_loc = mysqli_fetch_array($run_prefer_job_loc);
                    $prefer_job_id = $row_prefer_job_loc['city_id'];
                    $prefer_job_city = $row_prefer_job_loc['city_name'];
            ?>
            <td>

            <select name="prefer_job_loc" required class="form-control">
                <option value="<?php echo $prefer_job_id; ?>"><?php echo $prefer_job_city; ?></option>
                <?php
                    $get_new_prefer_loc = "SELECT * FROM city order by city_name";
                    $run_new_prefer_loc = mysqli_query($connection, $get_new_prefer_loc);
                    while($row_new_prefer_loc = mysqli_fetch_array($run_new_prefer_loc)){
                        $new_prefer_loc_id = $row_new_prefer_loc['city_id'];
                        $new_prefer_loc_city = $row_new_prefer_loc['city_name'];
                        echo "<option value='$new_prefer_loc_id'>$new_prefer_loc_city</option>";
                    }
                ?>
            </select>
            </td>
        </tr>
                
        <tr class="edit_looking_for">
            <td class="dashboard_main_headings">Salary Expectations</td>
            <td>
                <input type="text" name="exp_sal" class="form-control" value="<?php echo $salary_exp; ?>">
            </td>
        </tr>
        
        <tr class="edit_looking_for">
            <td></td>
            <td>
                <input type="submit" name="update_prefer" class="btn btn-success" value="Save Information">&nbsp;&nbsp;<button id="cancel_summary" class="btn btn-warning">Cancel</button>
            </td>
        </tr>
        </table>
        </form>
        </div>
        
        <?php
            if(isset($_POST['update_prefer'])){
                $edit_record8 = $_GET['mem_id'];
                $prefer_job = cleanStr($_POST['prefer_job']);
                $prefer_job_loc = cleanStr($_POST['prefer_job_loc']);
                $exp_sal = cleanStr($_POST['exp_sal']);
                            
                $update_prefer = "UPDATE members
                                  SET prefer_job = '$prefer_job',
                                    prefer_job_loc = '$prefer_job_loc',
                                    exp_salary = '$exp_sal'
                                        WHERE mem_id = '$edit_record8'";
                                    
                $run_prefer = mysqli_query($connection, $update_prefer);
                
                if($run_prefer){
                    echo "<script>window.open('my_account.php?mem_id=$edit_record8', '_self')</script>";
                } 
                else{
                    die("Database query has failed" . mysqli_error());
                }
        
            }
        ?>