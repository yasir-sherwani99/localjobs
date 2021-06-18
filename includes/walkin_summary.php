            	<div class="panel-heading"><h3 class="panel-title">Job Summary</h3></div>
                <div class="panel-body">
                    <ul class="list-unstyled">
                    	<li style="font-size: 16px; font-weight: bold;">Company</li>
                        <li style="font-size: 14px;"><?php echo $job_company; ?></li><br/>
                        <li style="font-size: 16px; font-weight: bold;">Location</li>
			 <?php
							if($job_location == "0"){
								echo "<li style='font-size: 14px;'>Multiple Cities</li><br/>";
							}
							else{
								
   								echo "<li style='font-size: 14px;'>$city_title</li><br/>";
							}
            			?>
                        <li style="font-size: 16px; font-weight: bold;">Interview Date</li>
                        <li style="font-size: 14px;"><?php echo $interview_day . "-" . $interview_month . "-" . $interview_year; ?></li>
                    </ul>
				</div>