<div class="table-responsive">
    <table class="table table-condensed table-hover">
        <thead>
        <tr style="color: #039;">
            <th style="width: 5%;"></th>
            <th style="width: 45%;">Position</th>
            <th style="width: 27%;">Location</th>
            <th style="width: 13%;">Post Date</th>
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
     
                $statement = "foreign_jobs ORDER BY for_job_post_date DESC"; // Change `records` according to your table name.
      
            $results = mysqli_query($connection,"SELECT * FROM {$statement} LIMIT {$startpoint} , {$per_page}");
    
            // pagination end
            
        //	$get_jobs = "SELECT * FROM employeer_jobs ORDER BY post_date DESC LIMIT 0, 20";
        //	$run_jobs = mysqli_query($conn, $get_jobs);
        
        if (mysqli_num_rows($results) != 0) {
    
            $i=1;
            while($row_jobs = mysqli_fetch_array($results)){
                $job_id = $row_jobs['for_job_id'];
                $job_title = $row_jobs['for_job_title'];
                $job_comp = $row_jobs['for_job_comp'];
                $job_city = $row_jobs['for_job_city'];
				$job_ctry = $row_jobs['for_job_ctry'];
				$post_date = $row_jobs['for_job_post_date'];
           					
    
                    $get_ctry = "SELECT * FROM countries WHERE ctry_id = '$job_ctry'";
                    $run_ctry = mysqli_query($connection, $get_ctry);
                    $row_ctry = mysqli_fetch_array($run_ctry);
                        $ctry_id = $row_ctry['ctry_id'];
                        $ctry_title = $row_ctry['ctry_name'];
    
      ?>
        <tbody>
        <tr>
            <td style="font-weight: bold; text-align: center; vertical-align: middle;"><?php echo $i++; ?></td>
            <td style="line-height: 120%;"><label style="color: #06F; font-weight:bold;"><?php echo $job_title; ?></label><br/>
            	<span style="color: #A0A0A0;"><?php echo $job_comp; ?></span></td>
			<td style="vertical-align: middle;"><?php echo $job_city . " , " . $ctry_title; ?>   
            
            <td style="vertical-align: middle;"><?php echo $post_date; ?></td>
		
            <td style="vertical-align: middle;"><a href="foreign_details.php?foreign_id=<?php echo $job_id; ?>" target="_blank"><button class="btn btn-primary btn-xs">Details</button></a></td>
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