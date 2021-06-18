	<h1 style="font-size: 18px; color: #0080FF; font-weight:normal; padding-left: 10px;">About the Job</h1>
                        <ul>
                            <li style="font-size: 14px;"><?php echo $job_desc; ?></li>
                        </ul>
                        <h1 style="font-size: 18px; color: #0080FF; font-weight:normal; padding-left: 10px;">Job Requirements</h1>
                        <ul>
                        	<li style="font-size: 14px;"><?php echo $job_qual; ?></li>
                        	<li style="font-size: 14px;"><?php echo $job_skills; ?></li>
                        </ul>
                        <h2 style="padding-left: 10px; font-size: 16px; font-weight: bold;">Keywords: <span style="font-weight: normal; font-size: 14px;"><?php echo $job_keywords; ?></span></h2>
                        <h1 style="font-size: 18px; color: #0080FF; font-weight:normal; padding-left: 10px;">Company Profile</h1>
                        <p style="padding-left: 10px;">
                        <?php echo $cprofile; ?>
                        </p>
                        
                        <?php
							if(isset($_SESSION['username'])){
								echo "<a href='job_details.php?jid=$job_id1'>
                        			  <button class='btn btn-success'>Apply to Job</button></a>";
							}
							else{
								echo "<button class='btn btn-primary s_b'>Apply to Job</button>";
							}
                        ?>
                                                <br/><br/><br/>
                        <h2 style="padding-left: 10px; font-size: 16px; font-weight: bold;">Find more Jobs</h2>
                        <ul style="font-size: 14px;">
                        	<li>Jobs in <a href="city_details.php?city_id=<?php echo $city_id; ?>"><?php echo $city_title; ?></a></li>
                            <li>All Careers and Jobs at <a href="company_details.php?comp_id=<?php echo $cid; ?>"><?php echo $cname; ?></a></li>
                            <li><a href="cat_details.php?cat_id=<?php echo $cat_id; ?>"><?php echo $cat_title; ?></a> Jobs in <a href="city_details.php?city_id=<?php echo $city_id; ?>"><?php echo $city_title; ?></a></li>
                        </ul>
