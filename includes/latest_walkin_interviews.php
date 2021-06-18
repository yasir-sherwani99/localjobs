<div class="panel panel-success">
		<div id="walkin_interview" class="panel-heading">
			<label class="panel-title" style="font-size: 3vh; font-family: Verdana;"><span class="glyphicon glyphicon-bell"></span> Latest Walk-In Interviews</label>
				
		</div>
		<div class="panel-body">
				
		<div class="table-responsive">
			<table class="table table-hover">
				<thead>
					<tr>
						<th style="width: 60%;">Position</th>
						<th style="width: 15%; padding-left: 7%;">Date</th>
                        			<th style="width: 15%;">Location</th>
                        			<th style="width: 10%;"></th>
                        		</tr>
				</thead>
					
				<?php
					$get_walk = "SELECT * FROM walk_interview ORDER BY post_date desc LIMIT 0, 10";
					$run_walk = mysqli_query($connection, $get_walk);
					while($row_walk = mysqli_fetch_array($run_walk)){
						$walk_id = $row_walk['wjob_id'];
						$walk_title = $row_walk['wjob_title'];
						$walk_comp = $row_walk['wcompany'];
						$walk_day = $row_walk['winterview_day'];
						$walk_month = $row_walk['winterview_month'];
						$walk_year = $row_walk['winterview_year'];
						$walk_city = $row_walk['wlocation'];
						
						$get_wcity = "SELECT * FROM city WHERE city_id = '$walk_city'";
						$run_wcity = mysqli_query($connection, $get_wcity);
						$row_wcity = mysqli_fetch_array($run_wcity);
							$wcity_id = $row_wcity['city_id'];
							$wcity_title = $row_wcity['city_name'];
				?>
				<tbody>
			
					<tr>
			
					<td style="font-size: 12px;"><label style="color: #06F; font-weight:bold; line-height: 80%;"><?php echo $walk_title; ?></label><br/>
						<span style="color: #000; font-weight: bold;"><?php echo $walk_comp; ?></span>
                    </td>
                    <td style="font-size: 12px; text-align: right; font-weight: bold; color: #090; vertical-align: middle;">
                   
                                       <?php

						if(($walk_day >= 1 && $walk_day < 10) && ($walk_month >=1 && $walk_month < 10)){
							echo "0{$walk_day}-0{$walk_month}-{$walk_year}";
						}else{
							if(($walk_day >= 1 && $walk_day < 10) && ($walk_month >=10)){
								echo "0{$walk_day}-{$walk_month}-{$walk_year}";
							}else{
								if(($walk_day >= 10) && ($walk_month >=1 && $walk_month < 10)){
									echo "{$walk_day}-0{$walk_month}-{$walk_year}";
							}else{
								echo "{$walk_day}-{$walk_month}-{$walk_year}";
							}
						  }
						}
                    ?>
                    </td>
                    <td style="vertical-align:middle;">
                      <?php
						if($walk_city == "0"){
							echo "<span style='color: #000;'>Multiple Cities</span>";
						}
						else{
							$get_wcity = "SELECT * FROM city WHERE city_id = '$walk_city'";
							$run_wcity = mysqli_query($connection, $get_wcity);
							$row_wcity = mysqli_fetch_array($run_wcity);
								$wcity_id = $row_wcity['city_id'];
								$wcity_title = $row_wcity['city_name'];

							echo "<span style='color: #000;'>$wcity_title</span>";
						}
                    ?>
                    </td>
				
					<td style="vertical-align: middle;"><a href="walkin_details.php?walk_id=<?php echo $walk_id; ?>"><button type="button" class="btn btn-info btn-xs">Details</button></a></td>  
					
					</tr>
				</tbody>
	  
					
				<?php } ?>
				</table>
			</div>			
		</div>
		<div class="panel-footer" style="text-align: center;">  
			<a href="all_latest_walkins.php">Browse all walkin interviews on localjobs.pk</a>
		</div>
	</div>