<div class="table-responsive">
    <table class="table table-condensed table-hover">
        <thead>
        <tr style="color: #039;">
 	    <th style="width: 5%;"></th>	       
            <th style="width: 60%;">Position</th>
            <th style="width: 10%;">Location</th>
            <th style="width: 15%;">Post Date</th>
            <th style="width: 10%;">&nbsp;</th>
        </tr>
        </thead>
      
      <?php
      
            include("includes/connection.php");
            
            // pagination start
            $page = (int)(!isset($_GET["page"]) ? 1 : $_GET["page"]);
                if ($page <= 0) $page = 1;
     
                $per_page = 22; // Set how many records do you want to display per page.
     
                $startpoint = ($page * $per_page) - $per_page;
     
                $statement = "company_jobs ORDER BY post_date DESC"; // Change `records` according to your table name.
      
            $results = mysqli_query($connection,"SELECT * FROM {$statement} LIMIT {$startpoint} , {$per_page}");
    
            // pagination end
            
        //	$get_jobs = "SELECT * FROM employeer_jobs ORDER BY post_date DESC LIMIT 0, 20";
        //	$run_jobs = mysqli_query($conn, $get_jobs);
        
        if (mysqli_num_rows($results) != 0) {
    
    	    $i = 1;	
            while($row_jobs = mysqli_fetch_array($results)){
                $job_id = $row_jobs['job_id'];
                $cat_job_id = $row_jobs['cat_id'];
                $job_title = $row_jobs['job_title'];
                $comp_id = $row_jobs['comp_id'];
                $job_location = $row_jobs['job_location'];
                $other_city = $row_jobs['other_city'];
                $job_post_date = date("d M Y", strtotime($row_jobs['post_date']));
					
	                $get_comp = "SELECT * FROM employers WHERE comp_id = '$comp_id'";
                    $run_comp = mysqli_query($connection, $get_comp);
                    $row_comp = mysqli_fetch_array($run_comp);
                            $cid = $row_comp['comp_id'];
                            $company_title = $row_comp['comp_name'];
    
                    $get_city = "SELECT * FROM city WHERE city_id = '$job_location'";
                    $run_city = mysqli_query($connection, $get_city);
                    $row_city = mysqli_fetch_array($run_city);
                        $city_id = $row_city['city_id'];
                        $city_title = $row_city['city_name'];
    
      ?>
        <tbody>
        <tr>
            <td style="text-align: center; font-weight: bold; vertical-align: middle;"><?php echo $i++; ?></td>	
            <td style="line-height: 120%;"><label style="color: #06F; font-weight:bold;"><?php echo $job_title; ?></label><br/>
            	<span style="color: #A0A0A0;"><?php echo $company_title; ?></span></td>
            <?php
		if($job_location == "28"){
			echo "<td style='vertical-align: middle;'>$other_city</td>";
		}
		else{
			echo "<td style='vertical-align: middle;'>$city_title</td>";
		}
            ?>   
            <td style="vertical-align: middle;"><?php echo $job_post_date; ?></td>
            <td style="vertical-align: middle;"><a href="job_details.php?job_id=<?php echo $job_id; ?>" target="_blank"><button class="btn btn-primary btn-xs">Details</button></a></td>
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