	<?php

		$user_session = $_SESSION['comp_user'];
        $get_employer = "SELECT * FROM employers
                                       WHERE comp_email = '$user_session'";
                                    
        $run_employer = mysqli_query($connection, $get_employer);
                                    
        $row_employer = mysqli_fetch_array($run_employer);
                    
            $comp_id = $row_employer['comp_id'];
	
		$memberAPPS = countEmployerApps($comp_id);
		$quickAPPS = countQUICKEmployerApps($comp_id);
		
		$totalAPPS = $memberAPPS + $quickAPPS;

    ?>

 <div id="nav"> 
       
         <ul class="nav nav-pills nav-stacked" style="max-width: 260px;"> 
         	<li class="active"> <a href="main_panel.php?comp_id=<?php echo $comp_id; ?>"> <span class="glyphicon glyphicon-dashboard pull-left"></span>&nbsp;Employer Dashboard </a> </li>
            <li><a href="employer_jobs.php?comp_id=<?php echo $comp_id ?>"><span class="glyphicon glyphicon-list-alt pull-left"></span><span class="badge pull-right"><?php echo totalEmployerJobs($comp_id); ?></span>&nbsp;Jobs</a></li>
 			<li><a href="employer_apps.php?comp_id=<?php echo $comp_id ?>"><span class="glyphicon glyphicon-tasks pull-left"></span><span class="badge pull-right"><?php echo $totalAPPS; ?></span>&nbsp;Applications</a></li>
            <li><a href="employer_profile.php?comp_id=<?php echo $comp_id ?>"><span class="glyphicon glyphicon-user pull-left"></span>&nbsp;Profile</a></li>
            <li><a href="employer_search.php?comp_id=<?php echo $comp_id ?>"><span class="glyphicon glyphicon-search pull-left"></span>&nbsp;Search</a></li>
            <li><a href="#"><span class="glyphicon glyphicon-saved pull-left"></span>&nbsp;Saved Resume</a></li>
            <li><a href="employer_reports.php"><span class="glyphicon glyphicon-th-list pull-left"></span>&nbsp;Reports</a></li>
            <li><a href="employer_change_pass.php?comp_id=<?php echo $comp_id ?>"><span class="glyphicon glyphicon-cog pull-left"></span>&nbsp;Options</a></li>
            <li><a href="employer_logout.php"><span class="glyphicon glyphicon-log-out pull-left"></span>&nbsp;Signout</a></li> 
              
         </ul>
</div>	