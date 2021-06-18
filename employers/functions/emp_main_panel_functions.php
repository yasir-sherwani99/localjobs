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
	
	function totalJobs(){
		global $conn;
		$query = "SELECT * FROM company_jobs";
		$run = mysqli_query($conn, $query);
		$total_records = mysqli_num_rows($run);
		return $total_records;
	}
	
	function totalEmployerJobs($cid){
		global $conn;
		$query = "SELECT * FROM company_jobs WHERE comp_id = '$cid'";
		$run = mysqli_query($conn, $query);
		$total_records = mysqli_num_rows($run);
		return $total_records;
	}
	
	
	function totalEmployers(){
		global $conn;
		$query = "SELECT * FROM employers";
		$run = mysqli_query($conn, $query);
		$total_records = mysqli_num_rows($run);
		return $total_records;
	}
	
	function totalApps(){
		global $conn;
		$query = "SELECT * FROM jobs_apply";
		$run = mysqli_query($conn, $query);
		$total_records = mysqli_num_rows($run);
		return $total_records;
	}
	
	function totalMembers(){
		global $conn;
		$query = "SELECT * FROM members";
		$run = mysqli_query($conn, $query);
		$total_records = mysqli_num_rows($run);
		return $total_records;
	}

	function totalCategory(){
		global $conn;
		$query = "SELECT * FROM categories";
		$run = mysqli_query($conn, $query);
		$total_records = mysqli_num_rows($run);
		return $total_records;
	}

	function totalCity(){
		global $conn;
		$query = "SELECT * FROM city";
		$run = mysqli_query($conn, $query);
		$total_records = mysqli_num_rows($run);
		return $total_records;
	}
	
	function totalCtry(){
		global $conn;
		$query = "SELECT * FROM countries";
		$run = mysqli_query($conn, $query);
		$total_records = mysqli_num_rows($run);
		return $total_records;
	}

	function totalType(){
		global $conn;
		$query = "SELECT * FROM types";
		$run = mysqli_query($conn, $query);
		$total_records = mysqli_num_rows($run);
		return $total_records;
	}

	
/*	function latestJobs(){
		global $conn;
		$query = "SELECT * FROM company_jobs ORDER BY post_date LIMIT 0,4";
		$run = mysqli_query($conn, $query);
		while($row = mysqli_fetch_array($run)){
			$job_title = $row['job_title'];
		}
	}
*/

	function countLatestJobs($j_id){
		 
		 	global $conn;
			$query1 = "SELECT COUNT(job_id) as count_jobs FROM jobs_apply WHERE job_id = '$j_id'";
			$run1 = mysqli_query($conn, $query1);
			$row1 = mysqli_fetch_array($run1);
			$total_jobs1 = $row1['count_jobs'];
			return $total_jobs1;
	}
	
	function countLatestApps($j_id){
		 
		 	global $conn;
			$query1 = "SELECT COUNT(job_id) as count_jobs FROM jobs_apply WHERE job_id = '$j_id'";
			$run1 = mysqli_query($conn, $query1);
			$row1 = mysqli_fetch_array($run1);
			$total_jobs1 = $row1['count_jobs'];
			$query2 = "SELECT COUNT(job_id) as count_jobs FROM quick_apply WHERE job_id = '$j_id'";
			$run2 = mysqli_query($conn, $query2);
			$row2 = mysqli_fetch_array($run2);
			$total_jobs2 = $row2['count_jobs'];
			$total_apps = $total_jobs1 + $total_jobs2;
			return $total_apps;
	}
	
	function countEmployerApps($cid){
		 
		 	global $conn;
			$query1 = "SELECT COUNT(comp_id) as count_jobs FROM jobs_apply WHERE comp_id = '$cid'";
			$run1 = mysqli_query($conn, $query1);
			$row1 = mysqli_fetch_array($run1);
			$total_jobs1 = $row1['count_jobs'];
			return $total_jobs1;
   

		}
		
	function countQUICKEmployerApps($cid){
		 
		 	global $conn;
			$query1 = "SELECT COUNT(comp_id) as count_jobs FROM quick_apply WHERE comp_id = '$cid'";
			$run1 = mysqli_query($conn, $query1);
			$row1 = mysqli_fetch_array($run1);
			$total_jobs1 = $row1['count_jobs'];
			return $total_jobs1;
   

		}
	

	function countMemberJobs($mid){
		 
		 	global $conn;
			$query1 = "SELECT COUNT(mem_id) as count_jobs FROM jobs_apply WHERE mem_id = '$cid'";
			$run1 = mysqli_query($conn, $query1);
			$row1 = mysqli_fetch_array($run1);
			$total_jobs1 = $row1['count_jobs'];
			return $total_jobs1;
   

		}
		
	function currentliveJobs($cid){
		global $conn;
		
		$todays_date = date("Y-m-d");
			
		$query = "SELECT * FROM company_jobs WHERE comp_id = '$cid' && expiry_date >= '$todays_date'";
		$run = mysqli_query($conn, $query);
		$total_records = mysqli_num_rows($run);
		return $total_records;
	}
	
	function currentmonthJobs($cid){
		global $conn;
		
		$current_year = date("Y");	
		$current_month = date("m");
		
		$current_date_start = $current_year . "-" . $current_month . "-01";
		$current_date_end = $current_year . "-" . $current_month . "-31";
					
		$query = "SELECT * FROM company_jobs WHERE comp_id = '$cid' && post_date between '$current_date_start' and '$current_date_end'";
		$run = mysqli_query($conn, $query);
		$total_records = mysqli_num_rows($run);
		return $total_records;
	}
	
	function currentWEEKJobs($cid){
		global $conn;
							
		$query = "SELECT * FROM company_jobs WHERE comp_id = '$cid' && post_date between date_sub(now(), INTERVAL 1 WEEK) and now()";
		
		$run = mysqli_query($conn, $query);
		$total_records = mysqli_num_rows($run);
		return $total_records;
	}
	
	function TodayJobs($cid){
		global $conn;
		
		$current_date = date("Y-m-d");
					
		$query = "SELECT * FROM company_jobs WHERE comp_id = '$cid' && post_date = '$current_date'";
		$run = mysqli_query($conn, $query);
		$total_records = mysqli_num_rows($run);
		return $total_records;
	}

	function TodayApps($cid){
		global $conn;
		
		$current_date = date("Y-m-d");
					
		$query = "SELECT * FROM jobs_apply WHERE comp_id = '$cid' && apply_date = '$current_date'";
		$run = mysqli_query($conn, $query);
		$total_records = mysqli_num_rows($run);
		return $total_records;
	}

	function currentmonthApplication($cid){
		global $conn;
	
		$current_year = date("Y");	
		$current_month = date("m");
		
		$current_date_start = $current_year . "-" . $current_month . "-01";
		$current_date_end = $current_year . "-" . $current_month . "-31";
					
		$query1 = "SELECT * FROM jobs_apply WHERE comp_id = '$cid' && apply_date between '$current_date_start' and '$current_date_end'";
		$run1 = mysqli_query($conn, $query1);
		$total_records1 = mysqli_num_rows($run1);
		$query2 = "SELECT * FROM quick_apply WHERE comp_id = '$cid' && apply_date between '$current_date_start' and '$current_date_end'";
		$run2 = mysqli_query($conn, $query2);
		$total_records2 = mysqli_num_rows($run2);
		
		$totalappsmonth = $total_records1 + $total_records2;
			
		return $totalappsmonth;
	}
	
	function currentWEEKApplication($cid){
		global $conn;
				
		$query = "SELECT * FROM jobs_apply WHERE comp_id = '$cid' && apply_date between date_sub(now(), INTERVAL 1 WEEK) and now()";
		$run = mysqli_query($conn, $query);
		$total_records = mysqli_num_rows($run);
		return $total_records;
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
	//			$pagination .= "<li class='page_info'>Page {$page} of {$lastpage}</li>";
				  
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

?>