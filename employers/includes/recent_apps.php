<div class="panel panel-info">
        <div class="panel-heading">
            <label class="panel-title"><span class="glyphicon glyphicon-user"></span> Latest Applications</label>
        </div>
        <div class="panel-body">
        <table class="table table-condensed" align="center">
            <?php
   
                $get_latest_app = "SELECT distinct(mem_id) FROM jobs_apply 
                                    WHERE comp_id = '$comp_id' ORDER BY apply_date DESC LIMIT 0,5";
                $run_latest_app = mysqli_query($connection, $get_latest_app);
                while($row_latest_app = mysqli_fetch_array($run_latest_app)){
                    $mem_id = $row_latest_app['mem_id'];
                    
                $get_member = "SELECT * FROM members WHERE mem_id = '$mem_id'";
                $run_member = mysqli_query($connection, $get_member);
                $row_member = mysqli_fetch_array($run_member);
                    $first_name = $row_member['mem_first_name'];
                    $last_name = $row_member['mem_last_name'];
                    $mem_email = $row_member['mem_email'];
            ?>

        <tr>
            <td>
                <span style="font-size: 18px;"><?php echo $first_name . " " . $last_name; ?></span>
                <br><span style="color: #00F;"><?php echo $mem_email; ?></span>
            </td>
        </tr>
       
            <?php } ?>

        </table>
       </div>    
    </div>
