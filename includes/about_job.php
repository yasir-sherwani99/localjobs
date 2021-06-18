	<h1 style="font-size: 18px; color: #0080FF; font-weight:normal;">About the Job</h1>
                        <p>
                            <?php echo $job_desc1; ?>
                        </p>
                        <h1 style="font-size: 18px; color: #0080FF; font-weight:normal;">Job Requirements</h1>
                        <p>
                     
                        	<?php echo $job_skills1; ?>
                        </p>
                        <h1 style="font-size: 18px; color: #0080FF; font-weight:normal;">Qualification</h1>
     					<p><?php echo $job_qual; ?></p>     
                        <h2 style="font-size: 16px; font-weight: bold;">Keywords: <span style="font-weight: normal; font-size: 14px;"><?php echo $job_keywords; ?></span></h2>
                        <h1 style="font-size: 18px; color: #0080FF; font-weight:normal;">Company Profile</h1>
                        <p>
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
                        <h2 style="font-size: 16px; font-weight: bold;">Find more Jobs</h2>
                        <ul style="font-size: 14px;">
                        	<li>Jobs in <a href="city_details.php?city_id=<?php echo $city_id; ?>"><?php echo $city_title; ?> City</a></li>
                            <li>All Careers and Jobs at <a href="company_details.php?comp_id=<?php echo $cid; ?>"><?php echo $cname; ?></a></li>
                            <li><a href="cat_details.php?cat_id=<?php echo $cat_id; ?>"><?php echo $cat_title; ?></a> Jobs in <a href="city_details.php?city_id=<?php echo $city_id; ?>"><?php echo $city_title; ?> City</a></li>
                        </ul>