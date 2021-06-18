    <div class="menu-icon"></div>
    <ul>
        <li class="no-sub"><a class="top-heading" href="index.php">Home</a></li>
		<li>
            <a class="top-heading" href="all_latest_jobs.php">Browse Jobs</a>
			<i class="caret"></i>           
            <div class="dropdown">
                <div class="dd-inner">
                    <div class="column">
                        <a href="cat_details.php?cat_id=9">Technology/IT Jobs</a>
                        <a href="cat_details.php?cat_id=39">Accounting Jobs</a>
                        <a href="cat_details.php?cat_id=34">Banking/Finance Jobs</a>
                        <a href="cat_details.php?cat_id=6">Engineering Jobs</a>
                        <a href="cat_details.php?cat_id=8">Medical/Health Care Jobs</a>
                        <a href="all_latest_jobs.php">All Other Jobs</a>
                    </div>
                </div>
            </div>
        </li>
		<li class="no-sub"><a class="top-heading" href="search_result.php">Search Jobs</a></li> 
        <?php 
				if(isset($_SESSION['username'])){
						echo "<li class='no-sub'><a class='top-heading' href='my_account.php'>DashBoard</a></li>";
				}else{
						echo "<li class='no-sub'><a class='top-heading' href='jobseeker_signin_db.php'>DashBoard</a></li>";
				}    
		?>  
		<li class="no-sub"><a class="top-heading" href="members_register.php">Join Now</a></li>
		<li class="no-sub"><a class="top-heading" href="employers/emp_register.php" target="_blank">Post Jobs</a></li>
		<li>
            <a class="top-heading" href="employers/index.php">Employers</a>
			<i class="caret"></i>           
            <div class="dropdown">
                <div class="dd-inner">
                    <div class="column">
                        <a href="employers/index.php">Employer Login</a>
                        <a href="employers/index.php">Hiring Solutions</a>
                        <a href="employers/index.php">Post Job for Free</a>
                        <a href="employers/index.php">Search CVs</a>
                        <a href="#">Advertisment</a>
                    </div>
                </div>
            </div>
        </li>
	<li class="no-sub"><a class="top-heading" href="contactus.php">Contact Us</a></li>
    </ul>
