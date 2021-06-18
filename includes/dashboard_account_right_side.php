 <!--   <div id="sidebar1" class="row">  -->
        <?php
            
            $user_session = $_SESSION['username'];
                            
            $get_member_pic = "SELECT * FROM members
                               WHERE mem_email = '$user_session'";
                            
            $run_member = mysqli_query($conn, $get_member_pic);
                            
            $row_member = mysqli_fetch_array($run_member);
                    
            $mem_id = $row_member['mem_id'];

        ?>
        <div id="total_jobs_applied" class="row">
            <h3>Job Application (<?php echo countMemberJobs($mem_id); ?>)</h3>
            <h5>You have applied for: <a href="my_applications.php?mem_id=<?php echo $mem_id; ?>" style="color: #00F;"><?php echo countMemberJobs($mem_id); ?> Jobs</a></h5>
        </div>
        
        <div id="sidebar_ad" class="row">
            <h1>Ads</h1>
            	<a href="http://www.infolinks.com/join-us?aid=2499562" target="_blank"><img src="images/Creative1-300X250.jpg" class="img-responsive" alt="Infolinks ad"/></a>
        </div>
  <!--  </div>  -->