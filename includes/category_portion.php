<div class="panel panel-success">
		<div id="cat_jobs" class="panel-heading">
			<label class="panel-title" style="font-size: 3vh; font-family: Verdana;"><span class="glyphicon glyphicon-knight"></span> Featured Jobs by CATEGORY</label>
				
		</div>
		<div class="panel-body">

				<?php
					$get_cat = "SELECT * FROM categories ORDER BY rand() LIMIT 0, 20";
					$run_cat = mysqli_query($connection, $get_cat);
					while($row_cat = mysqli_fetch_array($run_cat)){
						$cat_id = $row_cat['cat_id'];
						$cat_name = $row_cat['cat_title'];
				?>		
						<a href="cat_details.php?cat_id=<?php echo $cat_id; ?>">
						<div id="single_cat">
							<ul>
								<li><h4><?php echo $cat_name . "&nbsp;Jobs"; ?></h4></li>
							</ul>  
							
						</div>
						</a>
					
				<?php } ?>
		</div>
		<div class="panel-footer" style="text-align: center;">  
			<a href="all_latest_jobs.php">Browse all jobs by category on localjobs.pk</a>
		</div>
	</div>