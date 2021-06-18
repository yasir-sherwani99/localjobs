<div class="panel panel-success">
		<div id="city_jobs" class="panel-heading">
			<label class="panel-title" style="font-size: 3vh; font-family: Verdana;"><span class="glyphicon glyphicon-globe"></span> Featured Jobs in PAKISTAN</label>
			
		</div>
		<div class="panel-body">

					 <?php
						$get_city_job = "SELECT * FROM city ORDER BY rand() LIMIT 0, 20";
					   $run_city_job = mysqli_query($connection, $get_city_job);
						while($row_city_job = mysqli_fetch_array($run_city_job)){
							$city_job_id = $row_city_job['city_id'];
							$city_job_name = $row_city_job['city_name'];
					?>		
						<a href="city_details.php?city_id=<?php echo $city_job_id; ?>">
						<div id="single_city">
							<ul>
								<li><h4><?php echo $city_job_name . "&nbsp;Jobs"; ?></h4></li>
							</ul>
						</div>
						</a>
					
				<?php } ?>
		</div>
		<div class="panel-footer" style="text-align: center;">  
			<a href="view_all_city.php">Browse all jobs by city on localjobs.pk</a>
		</div>
	</div>