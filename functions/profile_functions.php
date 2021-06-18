<?php
	$conn = mysqli_connect("localhost","root","","localjob_db");
	if(!$conn){
		die("Database connection has failed" . mysqli_error());
	}

	function getProfilePic(){
			global $conn;
			
			if(isset($_SESSION['username'])){
				$user_session = $_SESSION['username'];
								
				$get_member_pic = "SELECT * FROM members
								   WHERE mem_email = '$user_session'";
								
				$run_member = mysqli_query($conn, $get_member_pic);
								
				$row_member = mysqli_fetch_array($run_member);
						
				$member_pic = $row_member['mem_image'];
				
				if($member_pic == ""){
					echo "<img src='images/icons2/administrator.png' style='width: 135px; height: 160px;' class='img-responsive'/>";
				}else{
				echo "<img src='members/member_photos/$member_pic' style='width: 135px; height: 160px;' class='img-responsive'/>";
				}
			//	echo "<a href='edit_pic.php'>Edit Picture</a>";

								
				}
		}
		
		function getProfileNames(){
			global $conn;
			
			if(isset($_SESSION['username'])){
				$user_session = $_SESSION['username'];
								
				$get_member_pic = "SELECT * FROM members
								   WHERE mem_email = '$user_session'";
								
				$run_member = mysqli_query($conn, $get_member_pic);
								
				$row_member = mysqli_fetch_array($run_member);
				
				$member_id = $row_member['mem_id'];
				$member_first = $row_member['mem_first_name'];
				$member_last = $row_member['mem_last_name'];
				$current_job = $row_member['current_job'];
				$comp_name = $row_member['comp_name'];
				$mem_city = $row_member['mem_city'];
				$other_city = $row_member['mem_city_other'];
				$mem_ctry = $row_member['mem_country'];
				$member_email = $row_member['mem_email'];
				$member_cell = $row_member['mem_cell'];
				$industry = $row_member['profession_industry'];
				$prefer_job = $row_member['prefer_job'];
				$mem_cv_headline = $row_member['cv_headline'];
				$last_login = date("F d, Y");
				
				$getcity = "SELECT * FROM city where city_id = '$mem_city'";
				$runcity = mysqli_query($conn, $getcity);
				$rowcity = mysqli_fetch_array($runcity);
					$city_id = $rowcity['city_id'];
					$city_name = $rowcity['city_name'];
					
				$getctry = "SELECT * FROM countries where ctry_id = '$mem_ctry'";
				$runctry = mysqli_query($conn, $getctry);
				$rowctry = mysqli_fetch_array($runctry);
					$ctry_id = $rowctry['ctry_id'];
					$ctry_name = $rowctry['ctry_name'];

				$getcat = "SELECT * FROM categories where cat_id = '$industry'";
				$runcat = mysqli_query($conn, $getcat);
				$rowcat = mysqli_fetch_array($runcat);
					$cat_id = $rowcat['cat_id'];
					$cat_name = $rowcat['cat_title'];
				
				echo "<h3 style='font-weight: bold;'>{$member_first}&nbsp;{$member_last}</h3>";
				if($current_job == ""){
					echo "<h5 style='color: #A0A0A0; font-weight: bold;'>{$prefer_job}</h5>";
				}else{
					  echo "<h5 style='color: #A0A0A0; font-weight: bold;'>{$current_job}, {$comp_name}</h5>";
				}
				if($mem_city == "-1"){
					echo "<h5>{$other_city}, {$ctry_name} | {$cat_name}</h5><br/>";
					
				}else{
					echo "<h5>{$city_name}, {$ctry_name} | {$cat_name}</h5><br/>";
					  
				}
				echo "<h5><b>Email:</b> {$member_email}</h5>
					  <h5><b>Mobile:</b> 0{$member_cell}</h5>";
					  
			}
		}
		
		function getProfileContact(){
			global $conn;
			
			if(isset($_SESSION['username'])){
				$user_session = $_SESSION['username'];
								
				$get_member_pic = "SELECT * FROM members
								   WHERE mem_email = '$user_session'";
								
				$run_member = mysqli_query($conn, $get_member_pic);
								
				$row_member = mysqli_fetch_array($run_member);
				
				$member_id = $row_member['mem_id'];
				$cv_headline = $row_member['cv_headline'];
				$total_exp_year = $row_member['mem_exp_year'];
				$total_exp_month = $row_member['mem_exp_month'];
				$member_cv = $row_member['mem_cv'];
				
				echo "
					<div class='table-responsive'>
					<table border='0' class='table table-condensed'>
						<tr>
							<td style='font-size: 12px; font-weight: bold; width: 140px;'>Resume Headline:</td>
							<td style='font-size: 12px;'>{$cv_headline}</td>
						</tr>
						<tr>
							<td style='font-size: 12px; font-weight: bold;'>Experience:</td>
							<td style='font-size: 12px;'>{$total_exp_year} years {$total_exp_month} months</td>
						</tr>
						<tr>
							<td colspan='2' style='font-size: 18px; font-weight: bold; color: #3333FF;'>{$member_cv}
							<span style='font-size: 12px; margin-left: 40px;'>Update | <a href='download.php?download_file=$member_cv' style='text-decoration: none;'>Download</a></span>
							</td>
						</tr>
						<tr>
							<td colspan='2'>
								<a href='view_profile.php?mem_id=$member_id'><button class='btn btn-warning btn-sm'>PREVIEW RESUME</button></a>
								<a href='edit_profile.php?mem_id=$member_id'><button class='btn btn-primary btn-sm'>EDIT RESUME</button></a>
							</td>
						</tr>
					</table>
					</div>
				";
				}
		}
		
		function getProfileExp(){
			global $conn;
			
			if(isset($_SESSION['username'])){
				$user_session = $_SESSION['username'];
								
				$get_member_pic = "SELECT * FROM members
								   WHERE mem_email = '$user_session'";
								
				$run_member = mysqli_query($conn, $get_member_pic);
								
				$row_member = mysqli_fetch_array($run_member);
				
				$member_id = $row_member['mem_id'];
				$current_job = $row_member['current_job'];
				$job_month = $row_member['current_job_month'];
				$job_year = $row_member['current_job_year'];
				$job_end_year = $row_member['current_end_date'];
				$comp_name = $row_member['comp_name'];
				$comp_city = $row_member['comp_city'];
				$comp_ctry = $row_member['comp_ctry'];
				
				echo "<span style='font-size: 16px; font-weight: bold;'>" . $current_job . "</span><br/>";
				echo "<span style='font-size: 14px; color: red;'>" . $comp_name . "</span><br/>";
				echo "<span style='font-size: 14px; color: #A0A0A0;'>" . $comp_city . ", " . $comp_ctry . "</span><br/>";
				echo "<span style='font-size: 14px; color: #A0A0A0;'>" . $job_month . " " . $job_year . " to " . $job_end_year . "</span><br/>";
								
				}
		}
		
		function getProfileEdu(){
			global $conn;
			
			if(isset($_SESSION['username'])){
				$user_session = $_SESSION['username'];
								
				$get_member_pic = "SELECT * FROM members
								   WHERE mem_email = '$user_session'";
								
				$run_member = mysqli_query($conn, $get_member_pic);
								
				$row_member = mysqli_fetch_array($run_member);
				
				$member_id = $row_member['mem_id'];
				$member_first = $row_member['mem_first_name'];
				$member_last = $row_member['mem_last_name'];
				$member_email = $row_member['mem_email'];
				$member_cell = $row_member['mem_cell'];
				$member_city = $row_member['mem_city'];
				$degree_title = $row_member['degree_title'];
				$degree_level = $row_member['degree_level'];
				$degree_majors = $row_member['majors'];
				$degree_inst = $row_member['institution'];
				$degree_year = $row_member['completion_year'];
				$current_job = $row_member['current_job'];
				$job_month = $row_member['current_job_month'];
				$job_year = $row_member['current_job_year'];
				$comp_name = $row_member['comp_name'];
				$comp_city = $row_member['comp_city'];
				$comp_ctry = $row_member['comp_ctry'];
				$member_pic = $row_member['mem_image'];
				$member_cv = $row_member['mem_cv'];
				
				echo "<span style='font-size: 16px; font-weight: bold;'>" . $degree_inst . "</span><br/>";
				echo "<span style='font-size: 14px; color: red;'>" . $degree_level . "</span><br/>";
				echo "<span style='font-size: 14px; color: #A0A0A0;'>" . $degree_title . ", " . $degree_year . "</span><br/>";
				echo "<span style='font-size: 14px; color: #A0A0A0;'>" . $degree_majors . "</span><br/>";
								
				}
		}


?>