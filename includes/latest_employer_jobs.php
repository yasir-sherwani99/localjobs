<div class="panel panel-success">
		<div id="latest_jobs" class="panel-heading">
			<label class="panel-title" style="font-size: 3vh; font-family: Verdana;"><span class="glyphicon glyphicon-hand-right"></span> Featured Jobs in PAKISTAN</label>
				
		</div>
		<div class="panel-body" style="height: 975px;">
			<?php
				$get_jobs = "SELECT * FROM company_jobs order by post_date DESC LIMIT 0, 26";
				$run_jobs = mysqli_query($connection, $get_jobs);
				while($row_jobs = mysqli_fetch_array($run_jobs)){
					$jobid = $row_jobs['job_id'];
				  	$jobtitle1 = substr($row_jobs['job_title'], 0,27);
				        $jobtitle = $row_jobs['job_title'];
				   	$jt = strlen($jobtitle);
					$compid = $row_jobs['comp_id'];
					$loc = $row_jobs['job_location'];
					$other_loc = $row_jobs['other_city'];
					$country = $row_jobs['job_ctry'];
					$postdate = date("d F Y", strtotime($row_jobs['post_date']));
					
					
						$get_comp = "SELECT * FROM employers WHERE comp_id = '$compid'";
						$run_comp = mysqli_query($connection, $get_comp);
						$row_comp = mysqli_fetch_array($run_comp);
							$cid = $row_comp['comp_id'];
							$cimg = $row_comp['comp_logo'];
						        $ctitle1 = substr($row_comp['comp_name'], 0,27);
						  $ctitle = $row_comp['comp_name'];
						    $ct = strlen($ctitle);
						$get_city = "SELECT * FROM city WHERE city_id = '$loc'";
						$run_city = mysqli_query($connection, $get_city);
						$row_city = mysqli_fetch_array($run_city);
							$city_id = $row_city['city_id'];
						//    $city_title = substr($row_city['city_name'], 0,40);
						//    $cn = strlen($city_title);
						$city_title = $row_city['city_name'];
						
						$get_ctry = "SELECT * FROM countries WHERE ctry_id = '$country'";
						$run_ctry = mysqli_query($connection, $get_ctry);
						$row_ctry = mysqli_fetch_array($run_ctry);
							$ctry_id = $row_ctry['ctry_id'];
						//    $city_title = substr($row_city['city_name'], 0,40);
						//    $cn = strlen($city_title);
						$ctry_title = $row_ctry['ctry_name'];
			?>
			<!-- style="float: left; padding-top: 15px; padding-right: 15px; padding-left: 15px;" 
				style="margin-left: 50px; height: 80px; border: 0px solid red;" -->
				
					<a href="job_details.php?job_id=<?php echo $jobid; ?>">
					<div id="single_job" class="row">
							<p class="col-md-3 hidden-sm col-xs-12" id="emp_logo_main">
							<?php
								if($cimg == ""){
									echo "<img src='employers/company_logo/no_log.png' width='50' height='50' title='$jobtitle' />";		
								}
								else{
									echo "<img src='employers/company_logo/$cimg' width='50' height='50' title='$jobtitle'/>"; 
								}
							?>
							</p>
							<div class="col-md-9 col-sm-12 hidden-xs" id="emp_details_main">
							<p id="hi4">
							<?php
		
									if($jt >= "30"){
										echo $jobtitle1 . "...";
									}
									else{
										echo $jobtitle;
									}
								
							?>
							</p>
							<p id="hi5">
							<?php
							
									if($ct >= "28"){
										echo $ctitle1 . "...";
									}
									else{
										echo $ctitle;
									}
							?>
							</p>
							<p id="hi6">
							<?php 
								if($loc == "-1"){
									echo $other_loc . ",&nbsp;" . $ctry_title;
								}
								else{
									echo $city_title . ",&nbsp;" . $ctry_title;
								}
							//	echo $postdate; 
							?>
							</p>
							</div>
					 </div>
					 </a>
				<?php } ?>	
		</div> 
		<div class="panel-footer" style="text-align: center;">  
			<a href="all_latest_jobs.php">See all latest jobs on localjobs.pk</a>
		</div>
	</div>