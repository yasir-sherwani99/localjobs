<div class="table-responsive">
    <table class="table table-condensed table-bordered table-hover">
        <thead>
        <tr style="background-color: #F0F0F0;">
            <th>Job Title</th>
            <th>Company Name</th>
            <th>Location</th>
            <th style="width: 90px;">Post Date</th>
            <th>&nbsp;</th>
        </tr>
        </thead>
      
      <?php
      
            include("includes/connection.php");
            
            // pagination start
            $page = (int)(!isset($_GET["page"]) ? 1 : $_GET["page"]);
                if ($page <= 0) $page = 1;
     
                $per_page = 10; // Set how many records do you want to display per page.
     
                $startpoint = ($page * $per_page) - $per_page;
     
                $statement = "company_jobs ORDER BY post_date DESC"; // Change `records` according to your table name.
      
            $results = mysqli_query($connection,"SELECT * FROM {$statement} LIMIT {$startpoint} , {$per_page}");
    
            // pagination end
            
        //	$get_jobs = "SELECT * FROM employeer_jobs ORDER BY post_date DESC LIMIT 0, 20";
        //	$run_jobs = mysqli_query($conn, $get_jobs);
        
        if (mysqli_num_rows($results) != 0) {
    
            while($row_jobs = mysqli_fetch_array($results)){
                $job_id = $row_jobs['job_id'];
                $cat_job_id = $row_jobs['cat_id'];
                $job_title = $row_jobs['job_title'];
                $comp_id = $row_jobs['comp_id'];
                $job_location = $row_jobs['job_location'];
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
            <td><?php echo $job_title; ?></td>
            <td><?php echo $company_title; ?></td>
            <td><?php echo $city_title; ?></td>
            <td><?php echo $job_post_date; ?></td>
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