<table width="680" border="1" cellpadding="4" align="center" style="margin-top: -10px;">
  <tr>
    <th scope="col">Job Title</th>
    <th scope="col">Company Name</th>
    <th scope="col">Location</th>
    <th scope="col" style="width: 70px;">Post Date</th>
    <th scope="col">&nbsp;</th>
  </tr>
  
  <?php
  
  		include("includes/connection.php");
		
		// pagination start
		$page = (int)(!isset($_GET["page"]) ? 1 : $_GET["page"]);
			if ($page <= 0) $page = 1;
 
			$per_page = 7; // Set how many records do you want to display per page.
 
			$startpoint = ($page * $per_page) - $per_page;
 
			$statement = "company_jobs ORDER BY post_date DESC"; // Change `records` according to your table name.
  
		$results = mysqli_query($connection,"SELECT * FROM {$statement} LIMIT {$startpoint} , {$per_page}");

		if (mysqli_num_rows($results) != 0) {

		while($row_jobs = mysqli_fetch_array($results)){
			$job_id = $row_jobs['job_id'];
			$comp_id = $row_jobs['comp_id'];
			$cat_job_id = $row_jobs['cat_id'];
			$job_title = $row_jobs['job_title'];
		//	$job_company = $row_jobs['company_name'];
			$job_location = $row_jobs['job_location'];
			$job_post_date = $row_jobs['post_date'];
			
			$get_company = "SELECT * FROM employers WHERE comp_id = '$comp_id'";
			$run_company = mysqli_query($connection, $get_company);
			$row_company = mysqli_fetch_array($run_company);
				$cid = $row_company['comp_id'];
				$cname = $row_company['comp_name'];

  ?>
  <tr style="background-color: #F0F8FF;">
    <td><?php echo $job_title; ?></td>
    <td><?php echo $cname; ?></td>
    <td><?php echo $job_location; ?></td>
    <td><?php echo $job_post_date; ?></td>
    <td><a href="job_details.php?job_id=<?php echo $job_id; ?>" target="_blank"><button>Details</button></a></td>
  </tr>
<?php } } else{ echo "No records are found."; }?>
	<tr>
    	<td colspan="5"><?php echo pagination($statement,$per_page,$page,$url='?'); ?></td>
    </tr>
</table>


  					
		