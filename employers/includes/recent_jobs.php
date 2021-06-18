<div class="panel panel-info">
        <div class="panel-heading">
            <label class="panel-title"><span class="glyphicon glyphicon-user"></span> Latest Jobs</label>
        </div>
        <div class="panel-body">
          <div class="table-responsive">
            <table class="table table-condensed" >
                <?php
       
                    $get_latest_jobs = "SELECT * FROM company_jobs 
                                        WHERE comp_id = '$comp_id' ORDER BY post_date DESC LIMIT 0,5";
                    $run_latest_jobs = mysqli_query($connection, $get_latest_jobs);
                    while($row_latest_jobs = mysqli_fetch_array($run_latest_jobs)){
                        $job_id = $row_latest_jobs['job_id'];
                        $job_title = $row_latest_jobs['job_title'];
                        
                       
                ?>	

            
            <tr>
                <td class="job_title"><?php echo $job_title; ?></td>
                <td style="text-align: right;"><span class="badge num"><?php echo countLatestApps($job_id); ?></span><br/>
                            <span class="text">apps</span>
                </td>
            </tr>
                <?php } ?>

            </table>
          </div>  
       </div>
    </div>