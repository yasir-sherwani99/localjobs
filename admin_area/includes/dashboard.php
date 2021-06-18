<?php
	$memapps = totalApps();
	$nonmemapps = totalQuickApps();
	
	$totalapps = $memapps + $nonmemapps;

?>

 <div id="nav"> 
       
         <ul class="nav nav-pills nav-stacked" style="max-width: 260px;"> 
         	<li class="active"> <a href="index.php"> <span class="glyphicon glyphicon-dashboard pull-left"></span>&nbsp;Main Dashboard </a> </li>
            <li><a href="jobs.php"><span class="glyphicon glyphicon-list-alt pull-left"></span><span class="badge pull-right"><?php echo totalJobs(); ?></span>&nbsp;Jobs</a></li>
 			<li><a href="applications.php"><span class="glyphicon glyphicon-tasks pull-left"></span><span class="badge pull-right"><?php echo $totalapps; ?></span>&nbsp;Applications</a></li>
            <li><a href="employers.php"><span class="glyphicon glyphicon-bishop pull-left"></span><span class="badge pull-right"><?php echo totalEmployers(); ?></span>&nbsp;Employers</a></li>
            <li><a href="employees.php"><span class="glyphicon glyphicon-knight pull-left"></span><span class="badge pull-right"><?php echo totalMembers(); ?></span>&nbsp;Employees</a></li>
            <li><a href="walkin.php"><span class="glyphicon glyphicon-bell pull-left"></span><span class="badge pull-right"><?php echo totalWalkinJobs(); ?></span>&nbsp;Walk-In Interviews</a></li>
            <li><a href="internship.php"><span class="glyphicon glyphicon-bell pull-left"></span><span class="badge pull-right"><?php echo totalInternships(); ?></span>&nbsp;Internships</a></li>
            <li><a href="foreign.php"><span class="glyphicon glyphicon-globe pull-left"></span><span class="badge pull-right"><?php echo totalForeignJobs(); ?></span>&nbsp;Foreign Jobs</a></li>
            <li><a href="options.php"><span class="glyphicon glyphicon-cog pull-left"></span>&nbsp;Options</a></li>
            <li><a href="#"><span class="glyphicon glyphicon-th pull-left"></span>&nbsp;Reports</a></li>
            <li><a href="#"><span class="glyphicon glyphicon-bullhorn pull-left"></span>&nbsp;Ads</a></li>
            <li><a href="users.php"><span class="glyphicon glyphicon-user pull-left"></span>&nbsp;Users</a></li>
            <li><a href="admin_logout.php"><span class="glyphicon glyphicon-log-out pull-left"></span>&nbsp;Log Out</a></li>
            
         </ul>
</div>	