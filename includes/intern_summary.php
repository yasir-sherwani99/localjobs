            	<div class="panel-heading"><h3 class="panel-title">Job Summary</h3></div>
                <div class="panel-body">
                    <ul class="list-unstyled">
                    	<li style="font-size: 16px; font-weight: bold;">Company</li>
                        <li style="font-size: 14px;"><?php echo $job_comp; ?></li><br/>
                        <li style="font-size: 16px; font-weight: bold;">Location</li>
                        <?php
				if($job_city == "0"){
					echo "<li style='font-size: 14px;'>Multiple Cities</li><br/>";
				}
				else{
					echo "<li style='font-size: 14px;'>$city_title</li><br/>";
				}
                        ?>
			                        
                        <?php
                        	$get_category = "SELECT * FROM categories WHERE cat_id = '$job_cat'";
							$run_category = mysqli_query($conn, $get_category);
							$row_category = mysqli_fetch_array($run_category);
							$cat_title = $row_category['cat_title'];
						?>
                        <li style="font-size: 16px; font-weight: bold;">Industry</li>
                        <li style="font-size: 14px;"><?php echo $cat_title; ?></li><br/>
                        <li style="font-size: 16px; font-weight: bold;">Job Type</li>
                        <li style="font-size: 14px;"><?php echo $job_type; ?></li><br/>
                        <li style="font-size: 16px; font-weight: bold;">Years of Experience</li>
                        <li style="font-size: 14px;"><?php echo $job_exp; ?></li><br/>
                        <li style="font-size: 16px; font-weight: bold;">Number of Vacancies</li>
                        <li style="font-size: 14px;"><?php echo $job_vacancies; ?></li><br/>
                        <li style="font-size: 16px; font-weight: bold;">Keywords</li>
                        <li style="font-size: 14px;"><?php echo $job_keywords; ?></li>
                    </ul>
				</div>