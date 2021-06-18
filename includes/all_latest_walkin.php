<div class="table-responsive">
    <table class="table table-condensed table-hover">
        <thead>
        <tr style="color: #039;">
            <th style="width: 5%;"></th>	
            <th style="width: 50%">Position</th>
            <th style="width: 12%">Location</th>
            <th style="width: 13%">Interview Date</th>
	    <th style="width: 10%">Status</th>
            <th style="width: 10%">&nbsp;</th>
        </tr>
        </thead>
      
      <?php
      
            include("includes/connection.php");
            
            // pagination start
            $page = (int)(!isset($_GET["page"]) ? 1 : $_GET["page"]);
                if ($page <= 0) $page = 1;
     
                $per_page = 45; // Set how many records do you want to display per page.
     
                $startpoint = ($page * $per_page) - $per_page;
     
                $statement = "walk_interview ORDER BY post_date DESC"; // Change `records` according to your table name.
      
            $results = mysqli_query($connection,"SELECT * FROM {$statement} LIMIT {$startpoint} , {$per_page}");
    
            // pagination end
            
        //	$get_jobs = "SELECT * FROM employeer_jobs ORDER BY post_date DESC LIMIT 0, 20";
        //	$run_jobs = mysqli_query($conn, $get_jobs);
        
        if (mysqli_num_rows($results) != 0) {
    
    	    $i=1;
            while($row_jobs = mysqli_fetch_array($results)){
                $job_id = $row_jobs['wjob_id'];
                $job_title = $row_jobs['wjob_title'];
                $job_comp = $row_jobs['wcompany'];
                $job_location = $row_jobs['wlocation'];

            //    $job_post_date = date("d M Y", strtotime($row_jobs['post_date']));
				$interview_day = $row_jobs['winterview_day'];
				$interview_month = $row_jobs['winterview_month'];
				$interview_year = $row_jobs['winterview_year'];
					
    
                    
    
      ?>
        <tbody>
        <tr>
            <td style="font-weight: bold; text-align: center; vertical-align: middle;"><?php echo $i++; ?></td> 
            <td style="line-height: 120%;"><label style="color: #06F; font-weight:bold;"><?php echo $job_title; ?></label><br/>
            	<span style="color: #A0A0A0;"><?php echo $job_comp; ?></span></td>
			<?php
					if($job_location == "0"){
						echo "<td style='vertical-align: middle;'>Multiple Cities</td>";
					}
					else{
					$get_city = "SELECT * FROM city WHERE city_id = '$job_location'";
                   			 $run_city = mysqli_query($connection, $get_city);
                   			 $row_city = mysqli_fetch_array($run_city);
                       				 $city_id = $row_city['city_id'];
                       				 $city_title = $row_city['city_name'];
   
							echo "<td style='vertical-align: middle;'>$city_title</td>";
					}
            ?>     
            
             <?php
								
			if(($interview_day >= 1 && $interview_day < 10) && ($interview_month >=1 && $interview_month < 10)){
				echo "<td style='color: green; vertical-align: middle;'>0$interview_day - 0$interview_month - $interview_year</td>";
				}else{
					if(($interview_day >= 1 && $interview_day < 10) && ($interview_month >=10)){
						echo "<td style='color: green; vertical-align: middle;'>0$interview_day - $interview_month - $interview_year</td>";
					}else{
						if(($interview_day >= 10) && ($interview_month >=1 && $interview_month < 10)){
							echo "<td style='color: green; vertical-align: middle;'>$interview_day - 0$interview_month - $interview_year</td>";
						}else{
							echo "<td style='color: green; vertical-align: middle;'>$interview_day - $interview_month - $interview_year</td>";
						}
					}
				}
    ?>
			<?php
				$todays_date = date("Y-m-d");
				$expiry_date = $interview_year . "-" . $interview_month . "-" . $interview_day;
		
				$today = strtotime($todays_date);
				$expire = strtotime($expiry_date); 
				if($today > $expire){
					echo "<td style='color: red; vertical-align: middle;'><button class='btn btn-danger btn-xs' disabled='disabled' style='width: 70px;'><span class='glyphicon glyphicon-alert'></span> Expired</button></td>";
				}
				else{
					echo "<td style='color: green; vertical-align: middle;'><button class='btn btn-success btn-xs' disabled='disabled' style='width: 70px;'><span class='glyphicon glyphicon-saved'></span> Active</button></td>";				}
            ?>
            <td style="vertical-align: middle;"><a href="walkin_details.php?walk_id=<?php echo $job_id; ?>" target="_blank"><button class="btn btn-primary btn-xs">Details</button></a></td>
        </tr>
        </tbody>
    <?php } }else{ echo "No records are found."; } ?>
        <tfoot>
        <tr>
        
            <td colspan="5">
                <?php
                    echo pagination($statement,$per_page,$page,$url='?');
                ?>
    
            </td>
        </tr>
        </tfoot>
    </table>
</div>