<ul class="nav nav-tabs">
        <li class="active"><a href="#" style="background-color: #F0F0F0;" class="dashboard_title">Update Personal Statement</a></li>
    </ul>  
    <div id="edit-space-ps">
    <form method="post" role="form" action="my_account.php?mem_id=<?php echo $mem_id; ?>">
    <table class="table table-bordered">	
        <tr class="edit_personal_statement">

            <td>
                <textarea name="statement" class="form-control" rows="8"><?php echo $mem_personal_statement; ?></textarea>
            </td>
        </tr>
        <tr class="edit_personal_statement">
            <td>
                <input type="submit" name="update_statement" class="btn btn-success" value="Save Information">&nbsp;&nbsp;<button id="cancel_summary" class="btn btn-warning">Cancel</button>
            </td>
        </tr>

    </table>	
    </form>
    </div>
    <?php
            if(isset($_POST['update_statement'])){
                $edit_record7 = $_GET['mem_id'];
                $statement = cleanStr($_POST['statement']);
                            
                $update_statement = "UPDATE members
                                     SET personal_statement = '$statement'
                                            WHERE mem_id = '$edit_record7'";
                                    
                $run_statement = mysqli_query($connection, $update_statement);
                
                if($run_statement){
                    echo "<script>window.open('my_account.php?mem_id=$edit_record7', '_self')</script>";
                } 
                else{
                    die("Database query has failed" . mysqli_error());
                }
        
            }
     ?>   