<?php
	$conn = mysqli_connect("localhost","root","","localjob_db");
	if(!$conn){
		die("Database connection has failed" . mysqli_error());
	}
	
	
	function jobTitle(){
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
					$job_type = $row_jobs['job_type'];
					$job_gender = $row_jobs['gender'];
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
				<div style='background-color: #F5F5F5; width:830px; border-top: 8px solid #CCC; border-left: 2px solid #CCC; border-right: 2px solid #CCC; border-bottom: 2px solid #CCC; margin-left: 10px; margin-top: 10px; padding-bottom: 10px;'>
					<h1 style='color: #6B8E23; width: auto;'>$job_title</h1>
					<h2 style='font-size: 18px;'>$job_company</h2>
					<h3 style='font-size: 14px; margin-left: 10px; margin-top: 5px;'><a href='#'>Email to Friend</a> | <a href='#'>Save Job</a> | <a href='#'>Print</a></h3>
				</div> 
				";
				
			echo "
		<div style='width: 831px; height: 220px; margin-top: 10px; margin-left: 10px; border: 1px solid #F5F5F5; background-color: #F5F5F5;'><p style='text-align: right; padding-right: 5px;'><a href='job_details.php?close'>Close</a></p>
    			
			<div style='border: 0px solid red; width: 400px; margin-top: -10px; margin-left: 10px; float:left;'>
            	<span style='color: #6B8E23; font-weight: bold; padding: 10px;'>Not a Member? </span><br /><br /><br /><br />
                <span style='color: #000; font-weight: bold; padding: 10px;'>Step 1/2:</span><span>Upload Your CV</span>
				<form method='post' action=''>
					<input type='file' name='uploadcv' value='Go to Step 2' />
				</form>
                <a href='members_register1.php'><button style='background-color: #FFF; font-size: 14px; padding: 5px; border-radius: 5px; font-weight: bold; text-decoration: underline; margin-left: 5px;'>Go to Step 2</button></a>
            </div>

					<div id='member' style='width: 340px; height: auto; float: right; margin-right: 70px; background-color: #FFF; margin-top: -20px;'>
            	<form method='post' action='job_details.php'>
            	<table width='300' border='0' cellpadding='4' style='border-width: 0px;'>
  				<tr align='center'>
    				<td colspan='2' align='left'><span style='color: #6B8E23; font-weight: bold; font-size: 16px; '>Already a Member: </span><span> Login Below</span></td>
  				</tr>
  				<tr>
    				<td align='right'>Email</td>
    				<td><input type='text' name='username' style='width: 220px;' placeholder='Enter your email' /></td>
  				</tr>
  				<tr>
    				<td align='right'>Password</td>
    				<td><input type='password' name='userpass' style='width: 220px;' placeholder='Enter your password' /></td>
  				</tr>
  				<tr>
                	<td></td>
    				<td><input type='checkbox' name='remember' />Remember Me</td>
  				</tr>
  				<tr align='center'>
    				<td colspan='2'>
                    	<input type='submit' name='login' value='Login' />
                    	<span><a href='forget.php'>Forget Password?</a></span>
                    </td>
  				</tr>
				</table>
				</form>
            </div>

        </div>";
		
		echo "
			<div style='width: 831px; height: 50px; margin-top: 10px; margin-left: 10px; border: 1px solid #F5F5F5; background-color: #FFF;'>
				 <a href='apply_jobs.php?job_id=$job_id'><button style='background-color: #FFF; font-size: 20px; padding: 10px; border-radius: 5px; font-weight: bold; margin-left: 5px; color: #6B8E23; border-color: #6B8E23; margin-left: 330px;'>SUBMIT YOUR CV</button></a>
			</div>
			";
			
		$get_category = "SELECT * FROM categories WHERE cat_id = '$cat_job_id'";
		$run_category = mysqli_query($conn, $get_category);
		$row_category = mysqli_fetch_array($run_category);
			$cat_title = $row_category['cat_title'];
			
		echo "
			<div style='width: 831px; height: 500px; margin-top: 10px; margin-left: 10px; border: 1px solid #F5F5F5; background-color: #FFF;'>
			<p style='background-color: #6B8E23; border-radius: 5px; padding: 3px; color: #FFF;'>Job Detail<span style='margin-left: 450px;'>More Jobs From: <a href='#' style='color: #FFF;'>$cat_title</a></span></p>
			
			<table cellpadding='5' style='border: 0px solid red; width: 425px; float: left; margin-top: 0px;'>
				<tr>
					<td style='font-weight: bold;'>Industry</td>
					<td>$cat_title</td>
				</tr>
				<tr>
					<td style='font-weight: bold;'>Total Position</td>
					<td>$job_positions</td>
				</tr>
				<tr>
					<td style='font-weight: bold;'>Job Type</td>
					<td>$job_type</td>
				</tr>
				<tr>
					<td style='font-weight: bold;'>Job Location</td>
					<td>$job_location</td>
				</tr>
				<tr>
					<td style='font-weight: bold;'>Gender</td>
					<td>$job_gender</td>
				</tr>
				<tr>
					<td style='font-weight: bold;'>Minimum Experience</td>
					<td>$job_exp</td>
				</tr>
				<tr>
					<td style='font-weight: bold;'>Apply By</td>
					<td>$job_expiry_date</td>
				</tr>
				<tr>
					<td style='font-weight: bold;'>Job Posting Date</td>
					<td>$post_date</td>
				</tr>
				
			</table>
			
			<div style='border: 2px solid #F5F5F5; width: 355px; height: auto; margin-top: 10px; margin-left: 440px; padding: 10px; font-size: 14px;'><span style='color: #OOO; font-weight: bold; padding: 0px; font-size:16px;'>Job Description:</span><br/><br/>$job_desc
			</div>
			<hr style='border-width: 2px; clear: both; margin-top: 25px;'>
			
			<div style='width: 831px; height: 50px; margin-top: 10px; margin-left: 0px; border: 1px solid #F5F5F5; background-color: #FFF; clear: both;'>
			
				 <a href='#'><button style='background-color: #FFF; font-size: 20px; padding: 10px; border-radius: 5px; font-weight: bold; color: #6B8E23; border-color: #6B8E23; margin-left: 330px;'>SUBMIT YOUR CV</button></a>
			</div>
				
			</div>
		";		
			}
		}
		
	}
	
	
	function jobApply(){
				
		if(isset($_GET['job_id'])){
			
			global $conn;
			$job_id = $_GET['job_id'];
        	$get_jobs = "SELECT * FROM jobs WHERE job_id = '$job_id'";
			$run_jobs = mysqli_query($conn, $get_jobs);
			$row_jobs = mysqli_fetch_array($run_jobs);
					$job_id = $row_jobs['job_id'];
					$cat_job_id = $row_jobs['cat_id'];
					$job_title = $row_jobs['job_title'];
					$job_positions = $row_jobs['positions'];
					$job_type = $row_jobs['job_type'];
					$job_gender = $row_jobs['gender'];
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
				<div style='background-color: #F5F5F5; width:830px; border-top: 8px solid #CCC; border-left: 2px solid #CCC; border-right: 2px solid #CCC; border-bottom: 2px solid #CCC; margin-left: 10px; margin-top: 10px; padding-bottom: 10px;'>
					<div style='border: 0px solid blue; width: 500px; '>
						<h1 style='color: #6B8E23; width: auto;'>$job_title</h1>
						<h2 style='font-size: 18px;'>$job_company</h2>
						<h3 style='font-size: 14px; margin-left: 10px; margin-top: 5px;'><a href='#'>Email to Friend</a> | <a href='#'>Save Job</a> | <a href='#'>Print</a></h3>
					</div>
					<div style='border: 0px solid red; width: 350px; float: right; margin-top: -70px;'>
						<form method='post' action='apply_jobs.php?job_id=$job_id'>
							<input type='submit' name='apply' value='Apply Now' style='background-color: yellow; font-size: 18px; padding: 3px 20px 3px 20px; border-color: black; border-radius: 5px; margin-left: 50px; margin-bottom: 10px;'/>
						</form>
						<span style='font-size: 14px;'>View all jobs from &nbsp;<a href='#'>$job_company</a></span>
					</div>
			  </div> 
				";
				
					$member = $_SESSION['username'];
					$get_member = "SELECT * FROM members WHERE mem_email = '$member'";
					$run_member = mysqli_query($conn, $get_member);
					$row_member = mysqli_fetch_array($run_member);
						$mem_id = $row_member['mem_id'];
						$mem_first_name = $row_member['mem_first_name'];
						$mem_last_name = $row_member['mem_last_name'];
						
			echo "
		<div style='width: 831px; height: auto; margin-top: 10px; margin-left: 10px; border: 1px solid #F5F5F5; background-color: #F5F5F5;'><p style='text-align: left; background-color: #6B8E23; border-radius: 5px; padding: 3px; color: #FFF;'>Apply For This Job</p>
    			
			<div style='border: 0px solid red; width: 800px; margin-top: 10px; margin-left: 10px;'>
			<form method='post' action=''>
				<table style='border: 0px solid blue; width: 600px;'>
					<tr>
						<td>Cover Letter*</td>
					</tr>
					<tr>	
						<td>
							<textarea name='cover' style='text-align: left; width: 410px; height: 200px;'>
							Dear Sir/Madam,
							I am offering my services for the job in your company.
							Thank you.
							Regards.
							$mem_first_name $mem_last_name
							</textarea>
						</td>
					</tr>
					<tr>
						<td>
							<input type='submit' name='' value='Apply' />
						</td>
					</tr>
				</table>
			</form>
			</div>
            	
        </div>";
					
		$get_category = "SELECT * FROM categories WHERE cat_id = '$cat_job_id'";
		$run_category = mysqli_query($conn, $get_category);
		$row_category = mysqli_fetch_array($run_category);
			$cat_title = $row_category['cat_title'];
		
		echo "
			<div style='width: 831px; height: 500px; margin-top: 0px; margin-left: 10px; border: 1px solid #F5F5F5; background-color: #FFF;'>
			<p style='background-color: #6B8E23; border-radius: 5px; padding: 3px; color: #FFF;'>Job Detail<span style='margin-left: 450px;'>More Jobs From: $cat_title<a href='#' style='color: #FFF;'></a></span></p>
			
			<table cellpadding='5' style='border: 0px solid red; margin-top: 0px; width: 425px; float: left;'>
				<tr>
					<td style='font-weight: bold;'>Industry</td>
					<td>$cat_title</td>
				</tr>
				<tr>
					<td style='font-weight: bold;'>Total Position</td>
					<td>$job_positions</td>
				</tr>
				<tr>
					<td style='font-weight: bold;'>Job Type</td>
					<td>$job_type</td>
				</tr>
				<tr>
					<td style='font-weight: bold;'>Job Location</td>
					<td>$job_location</td>
				</tr>
				<tr>
					<td style='font-weight: bold;'>Gender</td>
					<td>$job_gender</td>
				</tr>
				<tr>
					<td style='font-weight: bold;'>Minimum Experience</td>
					<td>$job_exp</td>
				</tr>
				<tr>
					<td style='font-weight: bold;'>Apply By</td>
					<td>$job_expiry_date</td>
				</tr>
				<tr>
					<td style='font-weight: bold;'>Job Posting Date</td>
					<td>$post_date</td>
				</tr>
				
			</table>
			
			<div style='border: 2px solid #F5F5F5; width: 355px; height: auto; margin-top: 10px; margin-left: 440px; padding: 10px; font-size: 14px;'><span style='color: #OOO; font-weight: bold; padding: 0px; font-size:16px;'>Job Description:</span><br/><br/>$job_desc<br/>
			<form method='post' action=''>
				<input type='submit' name='apply' value='Apply Now' style='background-color: #6B8E23; font-size: 18px; color: white; padding: 3px 20px 3px 20px; border-color: #6B8E23; border-radius: 5px; margin-left: 100px; margin-top: 10px; />
			</form>
			</div>
			<hr style='border-width: 2px; clear: both; margin-top: 25px;'>
				
			</div>
		";		
			}

	}
	
	function apply4Job(){
				
			if(isset($_GET['job_id'])){
					
			global $conn;
			$job_id = $_GET['job_id'];
						
        	$get_jobs = "SELECT * FROM company_jobs WHERE job_id = '$get_job_id'";
			$run_jobs = mysqli_query($conn, $get_jobs);
			$row_jobs = mysqli_fetch_array($run_jobs);
					$job_id = $row_jobs['job_id'];
					$cat_job_id = $row_jobs['cat_id'];
					$job_title = $row_jobs['job_title'];
					$job_positions = $row_jobs['vacancies'];
					$job_type = $row_jobs['emp_status'];
					$job_company = $row_jobs['company_name'];
					$job_location = $row_jobs['job_location'];
					$job_desc = $row_jobs['job_desc'];
					$post_date = $row_jobs['post_date'];
					$job_expiry_date = $row_jobs['expiry_date'];
					$job_status = 'Pending';
					
					$member = $_SESSION['username'];
					$get_member = "SELECT * FROM members WHERE mem_email = '$member'";
					$run_member = mysqli_query($connection, $get_member);
					$row_member = mysqli_fetch_array($run_member);
						$mem_id = $row_member['mem_id'];
						$mem_first_name = $row_member['mem_first_name'];
						$mem_last_name = $row_member['mem_last_name'];

					$insert_query = "INSERT INTO jobs_apply (job_id, job_title, company, mem_id, apply_date, expiry_date, job_status) VALUES('$job_id', '$job_title', '$job_company', '$mem_id', '$post_date', '$job_expiry_date', '$job_status')";
					$run_insert = mysqli_query($connection, $insert_query);
					
					if($run_insert){

						echo "<script>window.open('applied.php?job_id=$job_id','_self')</script>";
					} 
			
					}
			}
?>
