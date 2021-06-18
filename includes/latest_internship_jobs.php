<div class="panel panel-success">
		<div id="latest_jobs" class="panel-heading">
			<label class="panel-title" style="font-size: 3vh; font-family: Verdana;"><span class="glyphicon glyphicon-thumbs-up"></span> Fresh Graduates / Internships</label>
				
		</div>
		<div class="panel-body" style="height: 975px;">
          <div class="table-responsive">
			<table class="table table-hover">
				<thead>
					<tr>
						<th style="width: 70%;">Position</th>
						<th style="text-align: right; width: 30%;"></th>
					</tr>
				</thead>
				

			<?php
				$get_jobs = "SELECT * FROM internship order by intern_post_date DESC LIMIT 0, 15";
				$run_jobs = mysqli_query($connection, $get_jobs);
				while($row_jobs = mysqli_fetch_array($run_jobs)){
					$jobid = $row_jobs['intern_id'];
				    $jobtitle = $row_jobs['intern_title'];
					$comp = $row_jobs['intern_comp'];
					$desc = $row_jobs['intern_desc'];
					$loc = $row_jobs['intern_city'];
					$req = $row_jobs['intern_qual'];
					$jobcat = $row_jobs['intern_cat'];
					$post_date = $row_jobs['intern_post_date'];
					
					
						$get_cat = "SELECT * FROM categories WHERE cat_id = '$jobcat'";
						$run_cat = mysqli_query($connection, $get_cat);
						$row_cat = mysqli_fetch_array($run_cat);
							$cat_id = $row_cat['cat_id'];
							$cat_title = $row_cat['cat_title'];
						  
								
						$get_city = "SELECT * FROM city WHERE city_id = '$loc'";
						$run_city = mysqli_query($connection, $get_city);
						$row_city = mysqli_fetch_array($run_city);
							$city_id = $row_city['city_id'];
							$city_title = $row_city['city_name'];
							
			?>
			
				<tbody>
				
				<tr>
          			
                    <td style="font-size: 12px;">
                    	<label style="color: #06F; font-weight:bold; line-height: 80%;"><a style="color: #00F;" href="intern_details.php?intern_id=<?php echo $jobid; ?>"><?php echo $jobtitle; ?></a></label><br/>
            			<span style="color: #000; font-weight: bold;"><?php echo $comp; ?></span> - 
                        <?php
							if($loc == "0"){
								echo "<span style='color: #A0A0A0;'>Multiple Cities</span>";
							}
							else{
								echo "<span style='color: #A0A0A0;'>$city_title</span>";
							}
                        ?>
                        
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
			<a href="all_latest_internships.php">See all latest internships/fresh graduate jobs on localjobs.pk</a>
		</div>
	</div>