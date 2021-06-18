<?php
	$conn = mysqli_connect("localhost","root","","localjob_db");
	if(!$conn){
		die("Database connection has failed" . mysqli_error());
	}
	
	function cleanStr($str){
		$cStr = trim($str);
		$cStr = htmlspecialchars($cStr);
		$cStr = addslashes($cStr);
		return $cStr;
	}
	
	function getJobs(){
		global $conn;
        $get_jobs = "SELECT * FROM jobs ORDER BY rand() LIMIT 0, 6";
		$run_jobs = mysqli_query($conn, $get_jobs);
		while($row_jobs = mysqli_fetch_array($run_jobs)){
			$job_id = $row_jobs['job_id'];
			$cat_job_id = $row_jobs['cat_id'];
			$job_title = $row_jobs['job_title'];
			$job_company = $row_jobs['job_company'];
					
			echo "
				<div id='single_job'>
				<a href='details.php?job_id=$job_id'>
				<h3>$job_title</h3>
				<h4>$job_company</h4>
				</a>
				<hr />
				</div>
			";
		}
	}
	
	function getCompanyJobs(){
		global $conn;
        $get_jobs = "SELECT * FROM employeer_jobs ORDER BY post_date DESC LIMIT 0, 6";
		$run_jobs = mysqli_query($conn, $get_jobs);
		while($row_jobs = mysqli_fetch_array($run_jobs)){
			$job_id = $row_jobs['job_id'];
			$cat_job_id = $row_jobs['job_category'];
			$job_title = $row_jobs['job_title'];
			$job_company = $row_jobs['job_company'];
			$job_location = $row_jobs['job_location'];
			$job_post_date = $row_jobs['post_date'];
					
			echo "
				<div id='single_job'>
				<a href='details_com.php?job_id=$job_id'>
				<h3>$job_title</h3>
				<h4>$job_company</h4>
				</a>
				<hr />
				</div>
			";
			}
	}
	
	function getCats(){
		global $conn;
		$get_cats = "SELECT * FROM categories";
		$run_cats = mysqli_query($conn, $get_cats);
		while($row_cats = mysqli_fetch_array($run_cats)){
			$cat_id = $row_cats['cat_id'];
			$cat_title = $row_cats['cat_title'];
          	echo "<li><a href='jobs_category.php?cat=$cat_id'>$cat_title</a></li><hr/>";
		}		
	}
	
	function getCatJob(){
		global $conn;
		if(isset($_GET['cat'])){
			$cat_id = $_GET['cat'];
        	$get_cat_job = "SELECT * FROM jobs WHERE cat_id = '$cat_id'";
			$run_cat_job = mysqli_query($conn, $get_cat_job);
			$count = mysqli_num_rows($run_cat_job);
			if($count == 0){
				echo "<h3>No Jobs found in this category!</h3>";
			}
				while($row_cat_job = mysqli_fetch_array($run_cat_job)){
					$job_id = $row_cat_job['job_id'];
					$job_title = $row_cat_job['job_title'];
					$job_company = $row_cat_job['job_company'];
					$job_desc = substr($row_cat_job['job_desc'],0,100);
					
			echo "
				<div id='single_job'>
				<h3>$job_title</h3>
				<h4>$job_company</h4>
				<br/>
				<h5>$job_desc
				<a href='details.php?job_id=$job_id'>View Details</a></h5>
				<hr />
				</div>
			";
		}

	}
	}

	function getCity(){
	global $conn;
		$get_cats = "SELECT DISTINCT location FROM jobs LIMIT 0, 5";
		$run_cats = mysqli_query($conn, $get_cats);
		
		while($row_cats = mysqli_fetch_array($run_cats)){
			@$job_id = $row_cats['job_id'];
			$job_location = $row_cats['location'];
          	echo "<li><a href='index.php?city=$job_location'>$job_location</a></li><hr/>";
		}		
	}
	
	function getCityJob(){
		global $conn;
		if(isset($_GET['city'])){
			$job_loc = $_GET['city'];
        	$get_cat_job = "SELECT * FROM jobs WHERE location = '$job_loc'";
			$run_cat_job = mysqli_query($conn, $get_cat_job);
			$count = mysqli_num_rows($run_cat_job);
			if($count == 0){
				echo "<h3>No Jobs found in this category!</h3>";
			}
				while($row_cat_job = mysqli_fetch_array($run_cat_job)){
					$job_id = $row_cat_job['job_id'];
					$job_title = $row_cat_job['job_title'];
					$job_company = $row_cat_job['job_company'];
					$job_desc = substr($row_cat_job['job_desc'],0,100);
					
			echo "
				<div id='single_job'>
				<h3>$job_title</h3>
				<h4>$job_company</h4>
				<br/>
				<h5>$job_desc
				<a href='details.php?job_id=$job_id'>View Details</a></h5>
				<hr />
				</div>
			";
		}

	}
	}	
	
	function pagination($query,$per_page=10,$page=1,$url='?'){   
    	global $conn; 
    	$query = "SELECT COUNT(*) as num FROM {$query}";
    	$row = mysqli_fetch_array(mysqli_query($conn,$query));
    	$total = $row['num'];
    	$adjacents = "2"; 
      
    	$prevlabel = "&lsaquo; Prev";
    	$nextlabel = "Next &rsaquo;";
    	$lastlabel = "Last &rsaquo;&rsaquo;";
      
    	$page = ($page == 0 ? 1 : $page);  
    	$start = ($page - 1) * $per_page;                               
      
    	$prev = $page - 1;                          
    	$next = $page + 1;
      
    	$lastpage = ceil($total/$per_page);
      
    	$lpm1 = $lastpage - 1; // //last page minus 1
      
    	$pagination = "";
    	if($lastpage > 1){   
        	$pagination .= "<ul class='pagination'>";
        //	$pagination .= "<li class='page_info'>Page {$page} of {$lastpage}</li>";
              
            if ($page > 1) $pagination.= "<li><a href='{$url}page={$prev}'>{$prevlabel}</a></li>";
              
        if ($lastpage < 7 + ($adjacents * 2)){   
            for ($counter = 1; $counter <= $lastpage; $counter++){
                if ($counter == $page)
                    $pagination.= "<li><a class='current'>{$counter}</a></li>";
                else
                    $pagination.= "<li><a href='{$url}page={$counter}'>{$counter}</a></li>";                    
            }
          
        } elseif($lastpage > 5 + ($adjacents * 2)){
              
            if($page < 1 + ($adjacents * 2)) {
                  
                for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++){
                    if ($counter == $page)
                        $pagination.= "<li><a class='current'>{$counter}</a></li>";
                    else
                        $pagination.= "<li><a href='{$url}page={$counter}'>{$counter}</a></li>";                    
                }
                $pagination.= "<li class='dot'>...</li>";
                $pagination.= "<li><a href='{$url}page={$lpm1}'>{$lpm1}</a></li>";
                $pagination.= "<li><a href='{$url}page={$lastpage}'>{$lastpage}</a></li>";  
                      
            } elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2)) {
                  
                $pagination.= "<li><a href='{$url}page=1'>1</a></li>";
                $pagination.= "<li><a href='{$url}page=2'>2</a></li>";
                $pagination.= "<li class='dot'>...</li>";
                for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++) {
                    if ($counter == $page)
                        $pagination.= "<li><a class='current'>{$counter}</a></li>";
                    else
                        $pagination.= "<li><a href='{$url}page={$counter}'>{$counter}</a></li>";                    
                }
                $pagination.= "<li class='dot'>..</li>";
                $pagination.= "<li><a href='{$url}page={$lpm1}'>{$lpm1}</a></li>";
                $pagination.= "<li><a href='{$url}page={$lastpage}'>{$lastpage}</a></li>";      
                  
            } else {
                  
                $pagination.= "<li><a href='{$url}page=1'>1</a></li>";
                $pagination.= "<li><a href='{$url}page=2'>2</a></li>";
                $pagination.= "<li class='dot'>..</li>";
                for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++) {
                    if ($counter == $page)
                        $pagination.= "<li><a class='current'>{$counter}</a></li>";
                    else
                        $pagination.= "<li><a href='{$url}page={$counter}'>{$counter}</a></li>";                    
                }
            }
        }
          
            if ($page < $counter - 1) {
                $pagination.= "<li><a href='{$url}page={$next}'>{$nextlabel}</a></li>";
                $pagination.= "<li><a href='{$url}page=$lastpage'>{$lastlabel}</a></li>";
            }
          
        $pagination.= "</ul>";        
    }
      
    return $pagination;
}

	function getrecentJobs(){
		global $conn;
        $get_jobs = "SELECT * FROM jobs ORDER BY post_date DESC LIMIT 0, 20";
		$run_jobs = mysqli_query($conn, $get_jobs);
		while($row_jobs = mysqli_fetch_array($run_jobs)){
			$job_id = $row_jobs['job_id'];
			$cat_job_id = $row_jobs['cat_id'];
			$job_title = $row_jobs['job_title'];
			$job_company = $row_jobs['job_company'];
			$post_date = $row_jobs['post_date'];
					
			echo "
				<div id='single_job'>
				<a href='details.php?job_id=$job_id' target='_blank'>
				<h4 style='color: #000;'>$job_title - <span>$post_date</span></h4>
				</a>
				<hr />
				</div>
			";
		}
	}

	function getJobSeekerDefault(){
		global $conn;
		if(isset($_SESSION['username'])){
			$c = $_SESSION['username'];
			$get_c = "SELECT * FROM members WHERE mem_email = '$c'";
			$run_c = mysqli_query($conn, $get_c);
		
			$row_c = mysqli_fetch_array($run_c);
			$mem_id = $row_c['mem_id'];
		
			if(!isset($_GET['my_jobs'])){
				if(!isset($_GET['edit_account'])){
					if(!isset($_GET['change_pass'])){
						if(!isset($_GET['delete_account'])){
					
					$get_jobs = "SELECT * FROM jobs_apply 
								 WHERE mem_id = '$mem_id' && job_status = 'pending'";
								 
					$run_jobs = mysqli_query($conn, $get_jobs);
					
					$count_jobs = mysqli_num_rows($run_jobs);
					
					if($count_jobs > 0){
						
						echo "
							 <div style='padding: 10px;'>
							 <h1 style='color: red; font-size: 20pt; font-weight: bold; text-decoration: underline;'>Important!</h1>
							 <h3>You have ($count_jobs) pending jobs</h3>
							 <h4>Please see your Job details by clicking this<a href='my_account.php?my_jobs'> LINK</a></h4>
							 </div>";
					}else{
						
						echo "
							 <div style='padding: 10px;'>
							 <h1 style='color: red; font-size: 20pt; font-weight: bold; text-decoration: underline;'>Important!</h1>
							 <h3>You have (No) pending jobs</h3>
							 <h4>You can see your job history by clicking this <a href='my_account.php?my_jobs'>LINK</a></h4>
							 </div>";
					}
					}
				}
			}
		}
	}
	}
	
	function newspaperDetails(){
		global $conn;
		if(isset($_GET['job_id'])){
			$job_id = $_GET['job_id'];
        	$get_jobs = "SELECT * FROM jobs WHERE job_id = '$job_id'";
			$run_jobs = mysqli_query($conn, $get_jobs);
			while($row_jobs = mysqli_fetch_array($run_jobs)){
					$job_id = $row_jobs['job_id'];
					$cat_job_id = $row_jobs['cat_id'];
					$job_title = $row_jobs['job_title'];
					$job_positions = $row_jobs['positions'];
					$job_company = $row_jobs['job_company'];
					$job_location = $row_jobs['location'];
					$job_exp = $row_jobs['job_exp'];
					$job_qual = $row_jobs['job_qual'];
					$job_desc = $row_jobs['job_desc'];
					$post_date = $row_jobs['post_date'];
					$job_expiry_date = $row_jobs['expiry_date'];
					$job_addr = $row_jobs['job_add'];
					$job_apply = $row_jobs['job_apply'];
					
			echo "
				<table id='job_details'>
				<tr>
					<td align='right' style='color: blue; font-weight:bold;'>Job Title</td>
					<td>$job_title</td>
				</tr>
				<tr style='background-color: #FFF;'>
					<td align='right' style='color: blue; font-weight:bold;'>Positions</td>
					<td>$job_positions</td>
				</tr>
				</tr>
				<tr>
					<td align='right' style='color: blue; font-weight:bold;'>Company</td>
					<td>$job_company</td>
				</tr>
				<tr style='background-color: #FFF;'>
					<td align='right' style='color: blue; font-weight:bold;'>Location</td>
					<td>$job_location</td>
				</tr>
				<tr>
					<td align='right' style='color: blue; font-weight:bold;'>Experience</td>
					<td>$job_exp</td>
				</tr>
				<tr style='background-color: #FFF;'>
					<td align='right' style='color: blue; font-weight:bold;'>Qualification</td>
					<td>$job_qual</td>
				</tr>
				<tr>
					<td align='right' style='color: blue; font-weight:bold;'>Description</td>
					<td>$job_desc</td>
				</tr>
				<tr style='background-color: #FFF;'>
					<td align='right' style='color: blue; font-weight:bold;'>Post Date</td>
					<td>$post_date</td>
				</tr>
				<tr>
					<td align='right' style='color: blue; font-weight:bold;'>Apply Before</td>
					<td>$job_expiry_date</td>
				</tr>
				<tr style='background-color: #FFF;'>
					<td align='right' style='color: blue; font-weight:bold;'>Apply</td>
					<td>$job_apply</td>
				</tr>
				</table>";
				}
			}

	}
	
	function empJobDetails(){
		global $conn;
		if(isset($_GET['job_id'])){
			$job_id = $_GET['job_id'];
        	$get_jobs = "SELECT * FROM employeer_jobs WHERE job_id = '$job_id'";
			$run_jobs = mysqli_query($conn, $get_jobs);
			
			while($row_jobs = mysqli_fetch_array($run_jobs)){
				$job_id = $row_jobs['job_id'];
				$cat_job_id = $row_jobs['job_category'];
				$job_title = $row_jobs['job_title'];
				$job_positions = $row_jobs['job_positions'];
				$job_company = $row_jobs['job_company'];
				$job_location = $row_jobs['job_location'];
				$job_exp = $row_jobs['job_exp'];
				$job_qual = $row_jobs['job_qual'];
				$job_desc = $row_jobs['job_desc'];
				$post_date = $row_jobs['post_date'];
				$job_expiry_date = $row_jobs['expiry_date'];
					
				echo "
					<table>
					<tr style='background-color: #F0F8FF;'>
						<td align='right' style='color: blue; font-weight:bold;'>Job Title</td>
						<td>$job_title</td>
					</tr>
					<tr style='background-color: #FFF;'>
						<td align='right' style='color: blue; font-weight:bold;'>Positions</td>
						<td>$job_positions</td>
					</tr>
					<tr style='background-color: #F0F8FF;'>
						<td align='right' style='color: blue; font-weight:bold;'>Post Date</td>
						<td>$post_date</td>
					</tr>
					<tr style='background-color: #FFF;'>
						<td align='right' style='color: blue; font-weight:bold;'>Apply Before</td>
						<td>$job_expiry_date</td>
					</tr>
					<tr style='background-color: #F0F8FF;'>
						<td align='right' style='color: blue; font-weight:bold;'>Company</td>
						<td>$job_company</td>
					</tr>
					<tr style='background-color: #FFF;'>
						<td align='right' style='color: blue; font-weight:bold;'>Location</td>
						<td>$job_location</td>
					</tr>
					<tr style='background-color: #F0F8FF;'>
						<td align='right' style='color: blue; font-weight:bold;'>Experience</td>
						<td>$job_exp</td>
					</tr>
					<tr style='background-color: #FFF;'>
						<td align='right' style='color: blue; font-weight:bold;'>Qualification</td>
						<td>$job_qual</td>
					</tr>
					<tr style='background-color: #F0F8FF;'>
						<td align='right' style='color: blue; font-weight:bold;'>Description</td>
						<td>$job_desc</td>
					</tr>
					<tr align='center'>
						<td colspan='2'><a href='details_comp1.php?apply_job=$job_id'><button>Apply</button></a></td>
					</tr>
					</table>";
					}
				}

		}	
		
		function countCategoryJobs($x){
		 
		 	global $conn;
			$query1 = "SELECT COUNT(cat_id) as count_jobs FROM company_jobs WHERE cat_id = '$x'";
			$run1 = mysqli_query($conn, $query1);
			$row1 = mysqli_fetch_array($run1);
			$total_jobs1 = $row1['count_jobs'];
			return $total_jobs1;
   

		}
		
		function countCategoryIntern($x){
		 
		 	global $conn;
			$query1 = "SELECT COUNT(intern_cat) as count_jobs FROM internship WHERE intern_cat = '$x'";
			$run1 = mysqli_query($conn, $query1);
			$row1 = mysqli_fetch_array($run1);
			$total_jobs1 = $row1['count_jobs'];
			return $total_jobs1;
   

		}

		
		function countWalkinCityJobs($x){
		 
		 	global $conn;
			$query1 = "SELECT COUNT(wlocation) as count_jobs FROM walk_interview WHERE wlocation = '$x'";
			$run1 = mysqli_query($conn, $query1);
			$row1 = mysqli_fetch_array($run1);
			$total_jobs1 = $row1['count_jobs'];
			return $total_jobs1;
   

		}
		
		function countForeignCategoryJobs($x){
		 
		 	global $conn;
			$query1 = "SELECT COUNT(for_job_cat) as count_jobs FROM foreign_jobs WHERE for_job_cat = '$x'";
			$run1 = mysqli_query($conn, $query1);
			$row1 = mysqli_fetch_array($run1);
			$total_jobs1 = $row1['count_jobs'];
			return $total_jobs1;
   

		}
		
		function countJobTypes($emp_type){
		 
		 	global $conn;
			$query1 = "SELECT COUNT(emp_status) as count_jobs FROM company_jobs WHERE emp_status = '$emp_type'";
			$run1 = mysqli_query($conn, $query1);
			$row1 = mysqli_fetch_array($run1);
			$total_jobs1 = $row1['count_jobs'];
			return $total_jobs1;
   

		}
		
		function countJobStatus($emp_status){
		 
		 	global $conn;
			$query1 = "SELECT COUNT(emp_type) as count_jobs FROM company_jobs WHERE emp_type = '$emp_status'";
			$run1 = mysqli_query($conn, $query1);
			$row1 = mysqli_fetch_array($run1);
			$total_jobs1 = $row1['count_jobs'];
			return $total_jobs1;
   

		}
		
		function countCityJobs($city){
		 
		 	global $conn;
			$query1 = "SELECT COUNT(job_location) as count_jobs FROM company_jobs WHERE job_location = '$city'";
			$run1 = mysqli_query($conn, $query1);
			$row1 = mysqli_fetch_array($run1);
			$total_jobs1 = $row1['count_jobs'];
			return $total_jobs1;
   

		}
		
		function countCompanyJobs($comp){
		 
		 	global $conn;
			$query1 = "SELECT COUNT(comp_id) as count_jobs FROM company_jobs WHERE comp_id = '$comp'";
			$run1 = mysqli_query($conn, $query1);
			$row1 = mysqli_fetch_array($run1);
			$total_jobs1 = $row1['count_jobs'];
			return $total_jobs1;
   

		}

		
		function countAPPLICATIONS($jId){
		 
		 	global $conn;
			$query1 = "SELECT COUNT(job_id) as count_jobs FROM jobs_apply WHERE job_id = '$jId'";
			$run1 = mysqli_query($conn, $query1);
			$row1 = mysqli_fetch_array($run1);
			$total_jobs1 = $row1['count_jobs'];
			return $total_jobs1;
	}

		function countQuickAPPLICATIONS($jId){
		 
		 	global $conn;
			$query1 = "SELECT COUNT(job_id) as count_jobs FROM quick_apply WHERE job_id = '$jId'";
			$run1 = mysqli_query($conn, $query1);
			$row1 = mysqli_fetch_array($run1);
			$total_jobs1 = $row1['count_jobs'];
			return $total_jobs1;
	}

		function countMemberJobs($mid){
		 
		 	global $conn;
			$query1 = "SELECT COUNT(mem_id) as count_jobs FROM jobs_apply WHERE mem_id = '$mid'";
			$run1 = mysqli_query($conn, $query1);
			$row1 = mysqli_fetch_array($run1);
			$total_jobs1 = $row1['count_jobs'];
			return $total_jobs1;
   

		}

		function countTotalJobs(){
		 
		 	global $conn;
			$query1 = "SELECT * FROM company_jobs";
			$run1 = mysqli_query($conn, $query1);
			$count = mysqli_num_rows($run1);
			return $count;
	}
	
		function countTotalIntern(){
		 
		 	global $conn;
			$query1 = "SELECT * FROM internship";
			$run1 = mysqli_query($conn, $query1);
			$count = mysqli_num_rows($run1);
			return $count;
	}

	
		function countTotalWalkin(){
		 
		 	global $conn;
			$query1 = "SELECT * FROM walk_interview";
			$run1 = mysqli_query($conn, $query1);
			$count = mysqli_num_rows($run1);
			return $count;
	}		

	function countTotalForeign(){
		 
		 	global $conn;
			$query1 = "SELECT * FROM foreign_jobs";
			$run1 = mysqli_query($conn, $query1);
			$count = mysqli_num_rows($run1);
			return $count;
	}		
			
	function walkin_pagination($query,$per_page=10,$page=1,$url='?',$walkin){   
	
    	global $conn; 
    	$query = "SELECT COUNT(*) as num FROM {$query}";
    	$row = mysqli_fetch_array(mysqli_query($conn,$query));
    	$total = $row['num'];
    	$adjacents = "2"; 
      
    	$prevlabel = "&lsaquo; Prev";
    	$nextlabel = "Next &rsaquo;";
    	$lastlabel = "Last &rsaquo;&rsaquo;";
      
    	$page = ($page == 0 ? 1 : $page);  
    	$start = ($page - 1) * $per_page;                               
      
    	$prev = $page - 1;                          
    	$next = $page + 1;
      
    	$lastpage = ceil($total/$per_page);
      
    	$lpm1 = $lastpage - 1; // //last page minus 1
      
    	$pagination = "";
    	if($lastpage > 1){   
        	$pagination .= "<ul class='pagination'>";
        //	$pagination .= "<li class='page_info'>Page {$page} of {$lastpage}</li>";
              
            if ($page > 1) $pagination.= "<li><a href='{$url}page={$prev}&city_id={$walkin}'>{$prevlabel}</a></li>";
              
        if ($lastpage < 7 + ($adjacents * 2)){   
            for ($counter = 1; $counter <= $lastpage; $counter++){
                if ($counter == $page)
                    $pagination.= "<li><a class='current'>{$counter}</a></li>";
                else
                    $pagination.= "<li><a href='{$url}page={$counter}&city_id={$walkin}'>{$counter}</a></li>";                    
            }
          
        } elseif($lastpage > 5 + ($adjacents * 2)){
              
            if($page < 1 + ($adjacents * 2)) {
                  
                for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++){
                    if ($counter == $page)
                        $pagination.= "<li><a class='current'>{$counter}</a></li>";
                    else
                        $pagination.= "<li><a href='{$url}page={$counter}&city_id={$walkin}'>{$counter}</a></li>";                    
                }
                $pagination.= "<li class='dot'>...</li>";
                $pagination.= "<li><a href='{$url}page={$lpm1}&city_id={$walkin}'>{$lpm1}</a></li>";
                $pagination.= "<li><a href='{$url}page={$lastpage}&city_id={$walkin}'>{$lastpage}</a></li>";  
                      
            } elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2)) {
                  
                $pagination.= "<li><a href='{$url}page=1&city_id={$walkin}'>1</a></li>";
                $pagination.= "<li><a href='{$url}page=2&city_id={$walkin}'>2</a></li>";
                $pagination.= "<li class='dot'>...</li>";
                for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++) {
                    if ($counter == $page)
                        $pagination.= "<li><a class='current'>{$counter}</a></li>";
                    else
                        $pagination.= "<li><a href='{$url}page={$counter}&city_id={$walkin}'>{$counter}</a></li>";                    
                }
                $pagination.= "<li class='dot'>..</li>";
                $pagination.= "<li><a href='{$url}page={$lpm1}&city_id={$walkin}'>{$lpm1}</a></li>";
                $pagination.= "<li><a href='{$url}page={$lastpage}&city_id={$walkin}'>{$lastpage}</a></li>";      
                  
            } else {
                  
                $pagination.= "<li><a href='{$url}page=1&city_id={$walkin}'>1</a></li>";
                $pagination.= "<li><a href='{$url}page=2&city_id={$walkin}'>2</a></li>";
                $pagination.= "<li class='dot'>..</li>";
                for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++) {
                    if ($counter == $page)
                        $pagination.= "<li><a class='current'>{$counter}</a></li>";
                    else
                        $pagination.= "<li><a href='{$url}page={$counter}&city_id={$walkin}'>{$counter}</a></li>";                    
                }
            }
        }
          
            if ($page < $counter - 1) {
                $pagination.= "<li><a href='{$url}page={$next}&city_id={$walkin}'>{$nextlabel}</a></li>";
                $pagination.= "<li><a href='{$url}page=$lastpage&city_id={$walkin}'>{$lastlabel}</a></li>";
            }
          
        $pagination.= "</ul>";        
    }
      
    return $pagination;
}		

	function foreign_pagination($query,$per_page=10,$page=1,$url='?',$foreign){   
	
    	global $conn; 
    	$query = "SELECT COUNT(*) as num FROM {$query}";
    	$row = mysqli_fetch_array(mysqli_query($conn,$query));
    	$total = $row['num'];
    	$adjacents = "2"; 
      
    	$prevlabel = "&lsaquo; Prev";
    	$nextlabel = "Next &rsaquo;";
    	$lastlabel = "Last &rsaquo;&rsaquo;";
      
    	$page = ($page == 0 ? 1 : $page);  
    	$start = ($page - 1) * $per_page;                               
      
    	$prev = $page - 1;                          
    	$next = $page + 1;
      
    	$lastpage = ceil($total/$per_page);
      
    	$lpm1 = $lastpage - 1; // //last page minus 1
      
    	$pagination = "";
    	if($lastpage > 1){   
        	$pagination .= "<ul class='pagination'>";
        //	$pagination .= "<li class='page_info'>Page {$page} of {$lastpage}</li>";
              
            if ($page > 1) $pagination.= "<li><a href='{$url}page={$prev}&cat_id={$foreign}'>{$prevlabel}</a></li>";
              
        if ($lastpage < 7 + ($adjacents * 2)){   
            for ($counter = 1; $counter <= $lastpage; $counter++){
                if ($counter == $page)
                    $pagination.= "<li><a class='current'>{$counter}</a></li>";
                else
                    $pagination.= "<li><a href='{$url}page={$counter}&cat_id={$foreign}'>{$counter}</a></li>";                    
            }
          
        } elseif($lastpage > 5 + ($adjacents * 2)){
              
            if($page < 1 + ($adjacents * 2)) {
                  
                for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++){
                    if ($counter == $page)
                        $pagination.= "<li><a class='current'>{$counter}</a></li>";
                    else
                        $pagination.= "<li><a href='{$url}page={$counter}&cat_id={$foreign}'>{$counter}</a></li>";                    
                }
                $pagination.= "<li class='dot'>...</li>";
                $pagination.= "<li><a href='{$url}page={$lpm1}&cat_id={$foreign}'>{$lpm1}</a></li>";
                $pagination.= "<li><a href='{$url}page={$lastpage}&cat_id={$foreign}'>{$lastpage}</a></li>";  
                      
            } elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2)) {
                  
                $pagination.= "<li><a href='{$url}page=1&cat_id={$foreign}'>1</a></li>";
                $pagination.= "<li><a href='{$url}page=2&cat_id={$foreign}'>2</a></li>";
                $pagination.= "<li class='dot'>...</li>";
                for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++) {
                    if ($counter == $page)
                        $pagination.= "<li><a class='current'>{$counter}</a></li>";
                    else
                        $pagination.= "<li><a href='{$url}page={$counter}&cat_id={$foreign}'>{$counter}</a></li>";                    
                }
                $pagination.= "<li class='dot'>..</li>";
                $pagination.= "<li><a href='{$url}page={$lpm1}&cat_id={$foreign}'>{$lpm1}</a></li>";
                $pagination.= "<li><a href='{$url}page={$lastpage}&cat_id={$foreign}'>{$lastpage}</a></li>";      
                  
            } else {
                  
                $pagination.= "<li><a href='{$url}page=1&cat_id={$foreign}'>1</a></li>";
                $pagination.= "<li><a href='{$url}page=2&cat_id={$foreign}'>2</a></li>";
                $pagination.= "<li class='dot'>..</li>";
                for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++) {
                    if ($counter == $page)
                        $pagination.= "<li><a class='current'>{$counter}</a></li>";
                    else
                        $pagination.= "<li><a href='{$url}page={$counter}&cat_id={$foreign}'>{$counter}</a></li>";                    
                }
            }
        }
          
            if ($page < $counter - 1) {
                $pagination.= "<li><a href='{$url}page={$next}&cat_id={$foreign}'>{$nextlabel}</a></li>";
                $pagination.= "<li><a href='{$url}page=$lastpage&cat_id={$foreign}'>{$lastlabel}</a></li>";
            }
          
        $pagination.= "</ul>";        
    }
      
    return $pagination;
}

	function pak_cat_pagination($query,$per_page=10,$page=1,$url='?', $cat){   
	
    	global $conn; 
    	$query = "SELECT COUNT(*) as num FROM {$query}";
    	$row = mysqli_fetch_array(mysqli_query($conn,$query));
    	$total = $row['num'];
    	$adjacents = "2"; 
      
    	$prevlabel = "&lsaquo; Prev";
    	$nextlabel = "Next &rsaquo;";
    	$lastlabel = "Last &rsaquo;&rsaquo;";
      
    	$page = ($page == 0 ? 1 : $page);  
    	$start = ($page - 1) * $per_page;                               
      
    	$prev = $page - 1;                          
    	$next = $page + 1;
      
    	$lastpage = ceil($total/$per_page);
      
    	$lpm1 = $lastpage - 1; // //last page minus 1
      
    	$pagination = "";
    	if($lastpage > 1){   
        	$pagination .= "<ul class='pagination'>";
        //	$pagination .= "<li class='page_info'>Page {$page} of {$lastpage}</li>";
              
            if ($page > 1) $pagination.= "<li><a href='{$url}page={$prev}&cat_id={$cat}'>{$prevlabel}</a></li>";
              
        if ($lastpage < 7 + ($adjacents * 2)){   
            for ($counter = 1; $counter <= $lastpage; $counter++){
                if ($counter == $page)
                    $pagination.= "<li><a class='current'>{$counter}</a></li>";
                else
                    $pagination.= "<li><a href='{$url}page={$counter}&cat_id={$cat}'>{$counter}</a></li>";                    
            }
          
        } elseif($lastpage > 5 + ($adjacents * 2)){
              
            if($page < 1 + ($adjacents * 2)) {
                  
                for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++){
                    if ($counter == $page)
                        $pagination.= "<li><a class='current'>{$counter}</a></li>";
                    else
                        $pagination.= "<li><a href='{$url}page={$counter}&cat_id={$cat}'>{$counter}</a></li>";                    
                }
                $pagination.= "<li class='dot'>...</li>";
                $pagination.= "<li><a href='{$url}page={$lpm1}&cat_id={$cat}'>{$lpm1}</a></li>";
                $pagination.= "<li><a href='{$url}page={$lastpage}&cat_id={$cat}'>{$lastpage}</a></li>";  
                      
            } elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2)) {
                  
                $pagination.= "<li><a href='{$url}page=1&cat_id={$cat}'>1</a></li>";
                $pagination.= "<li><a href='{$url}page=2&cat_id={$cat}'>2</a></li>";
                $pagination.= "<li class='dot'>...</li>";
                for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++) {
                    if ($counter == $page)
                        $pagination.= "<li><a class='current'>{$counter}</a></li>";
                    else
                        $pagination.= "<li><a href='{$url}page={$counter}&cat_id={$cat}'>{$counter}</a></li>";                    
                }
                $pagination.= "<li class='dot'>..</li>";
                $pagination.= "<li><a href='{$url}page={$lpm1}&cat_id={$cat}'>{$lpm1}</a></li>";
                $pagination.= "<li><a href='{$url}page={$lastpage}&cat_id={$cat}'>{$lastpage}</a></li>";      
                  
            } else {
                  
                $pagination.= "<li><a href='{$url}page=1&cat_id={$cat}'>1</a></li>";
                $pagination.= "<li><a href='{$url}page=2&cat_id={$cat}'>2</a></li>";
                $pagination.= "<li class='dot'>..</li>";
                for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++) {
                    if ($counter == $page)
                        $pagination.= "<li><a class='current'>{$counter}</a></li>";
                    else
                        $pagination.= "<li><a href='{$url}page={$counter}&cat_id={$cat}'>{$counter}</a></li>";                    
                }
            }
        }
          
            if ($page < $counter - 1) {
                $pagination.= "<li><a href='{$url}page={$next}&cat_id={$cat}'>{$nextlabel}</a></li>";
                $pagination.= "<li><a href='{$url}page=$lastpage&cat_id={$cat}'>{$lastlabel}</a></li>";
            }
          
        $pagination.= "</ul>";        
    }
      
    return $pagination;
}
		
	function intern_cat_pagination($query,$per_page=10,$page=1,$url='?', $cat){   
	
    	global $conn; 
    	$query = "SELECT COUNT(*) as num FROM {$query}";
    	$row = mysqli_fetch_array(mysqli_query($conn,$query));
    	$total = $row['num'];
    	$adjacents = "2"; 
      
    	$prevlabel = "&lsaquo; Prev";
    	$nextlabel = "Next &rsaquo;";
    	$lastlabel = "Last &rsaquo;&rsaquo;";
      
    	$page = ($page == 0 ? 1 : $page);  
    	$start = ($page - 1) * $per_page;                               
      
    	$prev = $page - 1;                          
    	$next = $page + 1;
      
    	$lastpage = ceil($total/$per_page);
      
    	$lpm1 = $lastpage - 1; // //last page minus 1
      
    	$pagination = "";
    	if($lastpage > 1){   
        	$pagination .= "<ul class='pagination'>";
        //	$pagination .= "<li class='page_info'>Page {$page} of {$lastpage}</li>";
              
            if ($page > 1) $pagination.= "<li><a href='{$url}page={$prev}&cat_id={$cat}'>{$prevlabel}</a></li>";
              
        if ($lastpage < 7 + ($adjacents * 2)){   
            for ($counter = 1; $counter <= $lastpage; $counter++){
                if ($counter == $page)
                    $pagination.= "<li><a class='current'>{$counter}</a></li>";
                else
                    $pagination.= "<li><a href='{$url}page={$counter}&cat_id={$cat}'>{$counter}</a></li>";                    
            }
          
        } elseif($lastpage > 5 + ($adjacents * 2)){
              
            if($page < 1 + ($adjacents * 2)) {
                  
                for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++){
                    if ($counter == $page)
                        $pagination.= "<li><a class='current'>{$counter}</a></li>";
                    else
                        $pagination.= "<li><a href='{$url}page={$counter}&cat_id={$cat}'>{$counter}</a></li>";                    
                }
                $pagination.= "<li class='dot'>...</li>";
                $pagination.= "<li><a href='{$url}page={$lpm1}&cat_id={$cat}'>{$lpm1}</a></li>";
                $pagination.= "<li><a href='{$url}page={$lastpage}&cat_id={$cat}'>{$lastpage}</a></li>";  
                      
            } elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2)) {
                  
                $pagination.= "<li><a href='{$url}page=1&cat_id={$cat}'>1</a></li>";
                $pagination.= "<li><a href='{$url}page=2&cat_id={$cat}'>2</a></li>";
                $pagination.= "<li class='dot'>...</li>";
                for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++) {
                    if ($counter == $page)
                        $pagination.= "<li><a class='current'>{$counter}</a></li>";
                    else
                        $pagination.= "<li><a href='{$url}page={$counter}&cat_id={$cat}'>{$counter}</a></li>";                    
                }
                $pagination.= "<li class='dot'>..</li>";
                $pagination.= "<li><a href='{$url}page={$lpm1}&cat_id={$cat}'>{$lpm1}</a></li>";
                $pagination.= "<li><a href='{$url}page={$lastpage}&cat_id={$cat}'>{$lastpage}</a></li>";      
                  
            } else {
                  
                $pagination.= "<li><a href='{$url}page=1&cat_id={$cat}'>1</a></li>";
                $pagination.= "<li><a href='{$url}page=2&cat_id={$cat}'>2</a></li>";
                $pagination.= "<li class='dot'>..</li>";
                for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++) {
                    if ($counter == $page)
                        $pagination.= "<li><a class='current'>{$counter}</a></li>";
                    else
                        $pagination.= "<li><a href='{$url}page={$counter}&cat_id={$cat}'>{$counter}</a></li>";                    
                }
            }
        }
          
            if ($page < $counter - 1) {
                $pagination.= "<li><a href='{$url}page={$next}&cat_id={$cat}'>{$nextlabel}</a></li>";
                $pagination.= "<li><a href='{$url}page=$lastpage&cat_id={$cat}'>{$lastlabel}</a></li>";
            }
          
        $pagination.= "</ul>";        
    }
      
    return $pagination;
}
	
?>