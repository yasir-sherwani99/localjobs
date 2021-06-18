<ul class="nav nav-tabs">
        <li class="active"><a href="#" style="background-color: #F0F0F0;" class="dashboard_title">Update Professional Summary</a></li>
    </ul>
    <div id="edit-space-psum">  
    <form method="post" role="form" action="my_account.php?mem_id=<?php echo $mem_id; ?>">
    <table class="table table-bordered">	
        <tr class="edit_mem_summary">
            <td class="dashboard_main_headings">Resume Headline</td>
            <td>
                <input type="text" name="headline" class="form-control" required value="<?php echo $mem_cv_headline; ?>" />
            </td>
        </tr>
        
        <tr class="edit_mem_summary">
            <td class="dashboard_main_headings">Industry</td>
            <td>

            <select name="industry" required class="form-control">
                <option value="<?php echo $industry_id; ?>"><?php echo $industry_title; ?></option>
                <?php
                    $get_cat1 = "SELECT * FROM categories order by cat_title";
                    $run_cat1 = mysqli_query($connection, $get_cat1);
                    while($row_cat1 = mysqli_fetch_array($run_cat1)){
                        $cat_id1 = $row_cat1['cat_id'];
                        $cat_title1 = $row_cat1['cat_title'];
                        echo "<option value='$cat_id1'>$cat_title1</option>";
                    }
                ?>
            </select>
            </td>
        </tr>
                
        <tr class="edit_mem_summary">
            <td class="dashboard_main_headings">Total Professional Experience</td>
            <td>
            <select name="exp_year" required class="profile_ddm">
                <option value="<?php echo $mem_exp_year; ?>"><?php echo $mem_exp_year; ?></option>
                    <?php
                        $get_exp_year = "SELECT * FROM experience";
                        $run_exp_year = mysqli_query($connection, $get_exp_year);
                        while($row_exp_year = mysqli_fetch_array($run_exp_year)){
                            $exp_id = $row_exp_year['exp_id'];
                            $exp_year = $row_exp_year['exp_years'];
                            echo "<option value='$exp_year'>$exp_year</option>";
                        }
                    ?>
                </select>
                years
                <select name="exp_month" required class="profile_ddm">
                    <option value="<?php echo $mem_exp_month; ?>"><?php echo $mem_exp_month; ?></option>
                    <?php
                        $get_exp_month = "SELECT * FROM experience";
                        $run_exp_month = mysqli_query($connection, $get_exp_month);
                        while($row_exp_month = mysqli_fetch_array($run_exp_month)){
                            $exp_id1 = $row_exp_month['exp_id'];
                            $exp_month = $row_exp_month['exp_months'];
                            echo "<option value='$exp_month'>$exp_month</option>";
                        }
                    ?>
                </select>
                months

            </td>
        </tr>
        
        <tr class="edit_mem_summary">
            <td></td>
            <td>
                <input type="submit" name="update_summary" class="btn btn-success" value="Save Information">&nbsp;&nbsp;<button id="cancel_summary" class="btn btn-warning">Cancel</button>
            </td>
        </tr>
        </table>
        </form>
        </div>
        
        <?php
            if(isset($_POST['update_summary'])){
                $edit_record1 = $_GET['mem_id'];
                $expyear = cleanStr($_POST['exp_year']);
                $expmonth = cleanStr($_POST['exp_month']);
                $industry = cleanStr($_POST['industry']);
                $headline = cleanStr($_POST['headline']);
                            
                $update_summ = "UPDATE members
                                SET mem_exp_year = '$expyear',
                                    mem_exp_month = '$expmonth',
                                    profession_industry = '$industry',
                                    cv_headline = '$headline'
                                        WHERE mem_id = '$edit_record1'";
                                    
                $run_summ = mysqli_query($connection, $update_summ);
                
                if($run_summ){
                    echo "<script>window.open('my_account.php?mem_id=$edit_record1', '_self')</script>";
                } 
                else{
                    die("Database query has failed" . mysqli_error());
                }
        
            }
        ?>