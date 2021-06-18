            	<div class="panel-heading"><h3 class="panel-title">Job Summary</h3></div>
                <div class="panel-body">
                    <ul class="list-unstyled">
                    	<li style="font-size: 16px; font-weight: bold;">Company</li>
                        <li style="font-size: 14px;"><?php echo $cname; ?></li><br/>
                        <li style="font-size: 16px; font-weight: bold;">Location</li>
                        <?php
							if($job_location == "28"){
								echo "<li style='font-size: 14px;'>{$other_city}&nbsp;,&nbsp;{$ctry_title}</li><br/>";		
							}
							else{
								echo "<li style='font-size: 14px;'>{$city_title}&nbsp;,&nbsp;{$ctry_title}</li><br/>";
							}
                        ?>
                        
                        <?php
                        	$get_category = "SELECT * FROM categories WHERE cat_id = '$cat_job_id'";
							$run_category = mysqli_query($conn, $get_category);
							$row_category = mysqli_fetch_array($run_category);
							$cat_title = $row_category['cat_title'];
						?>
                        <li style="font-size: 16px; font-weight: bold;">Industry</li>
                        <li style="font-size: 14px;"><?php echo $cat_title; ?></li><br/>
                        <li style="font-size: 16px; font-weight: bold;">Job Type</li>
                        <li style="font-size: 14px;"><?php echo $job_status; ?></li><br/>
                        <li style="font-size: 16px; font-weight: bold;">Years of Experience</li>
                        <li style="font-size: 14px;"><?php echo $min_exp . " to " . $max_exp . " years"; ?></li><br/>
                        <li style="font-size: 16px; font-weight: bold;">Salary</li>
                        <li style="font-size: 14px;"><?php echo $min_salary . " PKR to " . $max_salary . " PKR"; ?></li><br/>
                        <li style="font-size: 16px; font-weight: bold;">Number of Vacancies</li>
                        <li style="font-size: 14px;"><?php echo $job_vacancies; ?></li><br/>
                        <li style="font-size: 16px; font-weight: bold;">Keywords</li>
                        <li style="font-size: 14px;"><?php echo $job_keywords; ?></li>
                    </ul>
				</div>