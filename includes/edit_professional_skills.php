<ul class="nav nav-tabs">
        <li class="active"><a href="#" style="background-color: #F0F0F0;" class="dashboard_title">Update Skills</a></li>
    </ul>  

    <div id="edit-space-skills">
    
      <form method="post" role="form" action="my_account.php?mem_id=<?php echo $mem_id; ?>">
      <table class="table table-bordered">
        <tr class="edit_mem_skills">
            <td class="dashboard_main_headings">IT Skills</td>
            <td><textarea name="itskills" class="form-control" rows="5"><?php echo $mem_it_skills; ?></textarea></td>
        </tr>
        <tr class="edit_mem_skills">
            <td class="dashboard_main_headings">Other Skills</td>
            <td><textarea name="otherskills" class="form-control" rows="5"><?php echo $mem_other_skills; ?></textarea></td>
        </tr>
        <tr class="edit_mem_skills">
            <td></td>
            <td>
                <input type="submit" name="update_skills" class="btn btn-success" value="Save Information">&nbsp;&nbsp;<button id="cancel_skills" class="btn btn-warning">Cancel</button>
            </td>
        </tr>
       </table>  
    </form>
    </div>
        <?php
            if(isset($_POST['update_skills'])){
                $edit_record3 = $_GET['mem_id'];
                $itskill = cleanStr($_POST['itskills']);
                $otherskill = cleanStr($_POST['otherskills']);
                            
                $update_skill = "UPDATE members
                                SET mem_it_skills = '$itskill',
                                    mem_other_skills = '$otherskill'
                                        WHERE mem_id = '$edit_record3'";
                                    
                $run_skill = mysqli_query($connection, $update_skill);
                
                if($run_skill){
                    echo "<script>window.open('my_account.php?mem_id=$edit_record3', '_self')</script>";
                } 
                else{
                    die("Database query has failed" . mysqli_error());
                }
        
            }
        ?>
