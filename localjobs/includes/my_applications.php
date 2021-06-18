<div class="table-responsive" style="font-size: 12px;">
    <table class="table table-bordered table-hover">
            <caption>Job Applications</caption>
            <thead>
            <tr class="success">
                <th>Sr. No</th>
                <th>Job Name</th>
                <th>Company</th>
                <th style="width: 90px;">Apply-Date</th>
                <th style="width: 90px;">Expiry-Date</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            </thead>
            
            <tbody>
            <tr>
                <?php
                
                    if(isset($_GET['mem_id'])){
                        $member_id = $_GET['mem_id'];
                    $get_jobs = "SELECT * FROM jobs_apply WHERE mem_id = '$member_id'";
                    $run_jobs = mysqli_query($connection, $get_jobs);
                    $count_job = mysqli_num_rows($run_jobs);
                    if($count_job == 0){
                        echo "<td colspan='7' style='color: red; font-weight: bold; text-align: center;'>You have not applied for any job!</td>";
                    }else{
                
                    $i = 0;
                    while($row_jobs = mysqli_fetch_array($run_jobs)){
                        $apply_id = $row_jobs['apply_id'];
                        $job_id = $row_jobs['job_id'];
                        $apply_date = date("d M Y", strtotime($row_jobs['apply_date']));
                       // $expiry_date = $row_jobs['expiry_date'];
                        $status = $row_jobs['job_status'];
						
						$get_job_title = "SELECT * FROM company_jobs WHERE job_id = '$job_id'";
						$run_job_title = mysqli_query($connection, $get_job_title);
							$row_job_title = mysqli_fetch_array($run_job_title);
                    			$comp_id = $row_job_title['comp_id'];
								$job_title = $row_job_title['job_title'];
								$expiry_day = $row_job_title['expiry_day'];
								$expiry_month = $row_job_title['expiry_month'];
								$expiry_year = $row_job_title['expiry_year'];
							
						$get_comp_title = "SELECT * FROM employers WHERE comp_id = '$comp_id'";
						$run_comp_title = mysqli_query($connection, $get_comp_title);
							$row_comp_title = mysqli_fetch_array($run_comp_title);
                    			$comp_name = $row_comp_title['comp_name'];
				$i++;					
                ?>
                <td><?php echo $i; ?></td>
                <td><?php echo $job_title; ?></td>
                <td><?php echo $comp_name; ?></td>
                <td><?php echo $apply_date; ?></td>
                <td><?php echo $expiry_day . "-" . $expiry_month . "-" . $expiry_year; ?></td>
                <td><?php echo $status; ?></td>
                <td><a href="withdraw.php?apply_id=<?php echo $apply_id; ?>" onClick="return confirm('Are you sure??')" style="color: #00F;">Remove</a></td>	
            </tr>
            </tbody>
            <?php } } } ?>
        </table>
</div>