	<?php
        $useremail = $_SESSION['username'];
        $get_mem = "SELECT * FROM members WHERE mem_email = '$useremail'";
        $run_mem = mysqli_query($connection, $get_mem);
        $row_mem = mysqli_fetch_array($run_mem);
            $mem_id = $row_mem['mem_id'];
    ?>

	
            <ul class="list-group">
            	<li class="list-group-item active"><span class="glyphicon glyphicon-dashboard"></span>&nbsp;&nbsp;<a href="my_account.php?mem_id=<?php echo $mem_id; ?>" style="color: #FFF; font-weight: bold;">Dashboard</a></li>
            	<li class="list-group-item disabled"><img src="images/icons2/list.png" width="18" height="18"/>&nbsp;&nbsp;<a href="view_profile.php?mem_id=<?php echo $mem_id; ?>">View Profile</a></li>
                <li class="list-group-item disabled"><img src="images/icons2/gear.png" width="18" height="18"/>&nbsp;&nbsp;<a href="edit_profile.php?mem_id=<?php echo $mem_id; ?>">Edit Profile</a></li>
                <li class="list-group-item"><img src="images/icons2/upload2.png" width="18" height="18"/>&nbsp;&nbsp;<a href="dashboard_upload_image.php?mem_id=<?php echo $mem_id; ?>">Upload Picture</a></li>
                <li class="list-group-item"><img src="images/icons2/download2.png" width="18" height="18"/>&nbsp;&nbsp;<a href="dashboard_upload_cv.php?mem_id=<?php echo $mem_id; ?>">Update CV / Resume</a></li>
                <li class="list-group-item"><img src="images/icons2/folder.png" width="18" height="18"/>&nbsp;&nbsp;<a href="my_applications.php?mem_id=<?php echo $mem_id; ?>">Job Applications</a></li>
             <!--   <li class="list-group-item"><img src="images/icons2/notepad.png" width="18" height="18"/>&nbsp;&nbsp;<a href="dashboard_search.php">Search Jobs</a></li>  -->
                <li class="list-group-item"><img src="images/icons2/password.png" width="18" height="18"/>&nbsp;&nbsp;<a href="change_password.php?mem_id=<?php echo $mem_id; ?>">Change Password</a></li>
                <li class="list-group-item"><img src="images/icons2/delete.png" width="18" height="18"/>&nbsp;&nbsp;<a href="members_logout.php">Signout</a></li>
            </ul>
