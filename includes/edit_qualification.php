    <ul class="nav nav-tabs">
        <li class="active"><a href="#" style="background-color: #F0F0F0;" class="dashboard_title">Update Qualification</a></li>
    </ul>  

    <div id="space-qual">

      <form method="post" action="my_account.php?mem_id=<?php echo $mem_id; ?>">
      <table class="table table-bordered">
        <tr class="edit_mem_qual">
            <td class="dashboard_main_headings">Qualification</td>
            <td>
               <select name="qual" class="profile_ddm">
                    <option value="<?php echo $mem_degree_title; ?>"><?php echo $mem_degree_title; ?></option>
                    <option value="No Formal Education">No Formal Education</option>
                    <option value="SSC/Matric/O-Level">SSC/Matric/O-Level</option>
                    <option value="HSSC/Intermediate/A-Level">HSSC/Intermediate/A-Level</option>
                    <option value="Graduation (2-Y)">Graduation (2-Y)</option>
                    <option value="Graduation (4-Y)Hons">Graduation (4-Y)Hons</option>
                    <option value="Masters (2-Y)">Masters (2-Y)</option>
                    <option value="Post Graduation/MS/M.Phil">Post Graduation/MS/M.Phil</option>
                    <option value="Doctorate/PhD">Doctorate/PhD</option>
                    <option value="Post Doctorate">Post Doctorate</option>
                    <option value="Other">Other</option>
                </select>

            </td>
        </tr>
        <tr class="edit_mem_qual">
            <td class="dashboard_main_headings">Specialization/Majors</td>
            <td>
                <input type="text" name="majors" class="edit_fields" value="<?php echo $mem_majors; ?>">
            </td>
        </tr>
        <tr class="edit_mem_qual">
            <td class="dashboard_main_headings">Institute</td>
            <td>
            <input type="text" name="inst" class="edit_fields" value="<?php echo $mem_inst; ?>">
            
            </td>
        </tr>
        <tr class="edit_mem_qual">
            <td class="dashboard_main_headings">Institute City</td>
            <td>
            <input type="text" name="instcity" class="edit_fields" value="<?php echo $mem_inst_city; ?>">

            </td>
        </tr>
          <?php
            $get_ctry7 = "SELECT * FROM countries WHERE ctry_id = '$mem_inst_ctry'";
            $run_ctry7 = mysqli_query($connection, $get_ctry7);
            $row_ctry7 = mysqli_fetch_array($run_ctry7);
                $ctry_id7 = $row_ctry7['ctry_id'];
                $ctry_title7 = $row_ctry7['ctry_name'];
            
        ?>
        <tr class="edit_mem_qual">
            <td class="dashboard_main_headings">Institute Country</td>
            <td>
            <select name="instctry" class="profile_ddm">
                <option value="<?php echo $ctry_id7; ?>"><?php echo $ctry_title7; ?></option>
                <?php
                    $get_ctry6 = "SELECT * FROM countries";
                    $run_ctry6 = mysqli_query($connection, $get_ctry6);
                    while($row_ctry6 = mysqli_fetch_array($run_ctry6)){
                        $ctry_id6 = $row_ctry6['ctry_id'];
                        $ctry_title6 = $row_ctry6['ctry_name'];
                        echo "<option value='$ctry_id6'>$ctry_title6</option>";
                    }
               ?>
            </select>
            
            </td>
        </tr>
        <tr class="edit_mem_qual">
            <td class="dashboard_main_headings">Year of Passing</td>
            <td>
                <input type="text" name="passing" class="edit_fields" value="<?php echo $mem_year_pass; ?>">
            </td>
        </tr>
        <tr class="edit_mem_qual">
            <td></td>
            <td>
                <input type="submit" name="update_qual" class="btn btn-success" value="Save Information">&nbsp;&nbsp;<button id="cancel_qual" class="btn btn-warning">Cancel</button>
            </td>
        </tr>
        </table>
        </form>
      </div>  
        <?php
            if(isset($_POST['update_qual'])){
                $edit_record2 = $_GET['mem_id'];
                $qual = cleanStr($_POST['qual']);
                $majors = cleanStr($_POST['majors']);
                $insti = cleanStr($_POST['inst']);
                $icity = cleanStr($_POST['instcity']);
                $ictry = cleanStr($_POST['instctry']);
                $passing = cleanStr($_POST['passing']);
                            
                $update_qual = "UPDATE members
                                SET degree_title = '$qual',
                                    degree_city = '$icity',
                                    degree_ctry = '$ictry',
                                    majors = '$majors',
                                    institution = '$insti',
                                    completion_year = '$passing'
                                        WHERE mem_id = '$edit_record2'";
                                    
                $run_qual = mysqli_query($connection, $update_qual);
                
                if($run_qual){
                    echo "<script>window.open('my_account.php?mem_id=$edit_record2', '_self')</script>";
                } 
                else{
                    die("Database query has failed" . mysqli_error());
                }
        
            }
        ?>