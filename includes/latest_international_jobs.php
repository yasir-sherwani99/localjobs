<div class="panel panel-primary">
		<div id="latest_jobs" class="panel-heading">
			<label class="panel-title" style="font-size: 3vh; font-family: Verdana;"><span class="glyphicon glyphicon-globe"></span> Foreign Jobs</label>
				
		</div>
		<div class="panel-body" style="height: 900px;">
          <div class="table-responsive">
			<table class="table table-hover">
				<thead>
					<tr>
						<th style="width: 70%;">Position</th>
						<th style="width: 30%; text-align: right;"></th>
					</tr>
				</thead>
				

			<?php
				$get_jobs = "SELECT * FROM foreign_jobs order by for_job_post_date DESC LIMIT 0, 11";
				$run_jobs = mysqli_query($connection, $get_jobs);
				while($row_jobs = mysqli_fetch_array($run_jobs)){
					$jobid = $row_jobs['for_job_id'];
				    $jobtitle = $row_jobs['for_job_title'];
					$jobcat = $row_jobs['for_job_cat'];
					$comp = $row_jobs['for_job_comp'];
					$loc = $row_jobs['for_job_city'];
					$country = $row_jobs['for_job_ctry'];
					$type = $row_jobs['for_job_type'];
		//			$postdate = date("d F Y", strtotime($row_jobs['for_job_post_date']));
					$respon = $row_jobs['for_job_resp'];
					$req = $row_jobs['for_job_req'];
					$benefit = $row_jobs['for_job_benefit'];
					$addr = $row_jobs['job_postal_addr'];
					$phone = $row_jobs['for_job_phone'];
					$fax = $row_jobs['for_job_fax'];
					$app_url = $row_jobs['for_online_app_form'];
					$email = $row_jobs['for_job_email'];
					$exp_day = $row_jobs['for_job_expiry_day'];
					$exp_month = $row_jobs['for_job_expiry_month'];
					$exp_year = $row_jobs['for_job_expiry_year'];
					$post_date = $row_jobs['for_job_post_date'];
					
					
						$get_cat = "SELECT * FROM categories WHERE cat_id = '$jobcat'";
						$run_cat = mysqli_query($connection, $get_cat);
						$row_cat = mysqli_fetch_array($run_cat);
							$cat_id = $row_cat['cat_id'];
							$cat_title = $row_cat['cat_title'];
						  
								
						$get_ctry = "SELECT * FROM countries WHERE ctry_id = '$country'";
						$run_ctry = mysqli_query($connection, $get_ctry);
						$row_ctry = mysqli_fetch_array($run_ctry);
							$ctry_id = $row_ctry['ctry_id'];
							$ctry_title = $row_ctry['ctry_name'];
			?>
			
				<tbody>
				
				<tr>
          			
                    <td style="font-size: 12px;">
                    	<label style="color: #06F; font-weight:bold; line-height: 80%;"><a style="color: #00F;" href="foreign_details.php?foreign_id=<?php echo $jobid; ?>"><?php echo $jobtitle; ?></a></label><br/>
            			<span style="color: #000; font-weight: bold;"><?php echo $comp; ?></span><br/>
                        <span style="color: #A0A0A0;"><?php echo $loc . " , " . $ctry_title; ?></span>
                        
                    </td>
                    
					<td style="text-align: right; font-size: 12px;">
                    	<label style="font-weight: normal; line-height: 90%;"><?php echo $cat_title; ?></label><br/>
                        <label style="font-weight: normal; color: #A0A0A0;">Posted: <?php echo $post_date; ?></label>
					</td>

				<!--	<td><a href="walkin_details.php?walk_id=<?php //echo $walk_id; ?>"><button type="button" class="btn btn-info btn-xs">Details</button></a></td>  -->
					</tr>
                    
				</tbody>
				<?php } ?>
				</table>
			</div>			

		</div>
    
		<div class="panel-footer" style="text-align: center;">  
			<a href="all_latest_foreign.php">See all latest foreign jobs on localjobs.pk</a>
		</div>
	</div>