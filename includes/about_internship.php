	<h1 style="font-size: 18px; color: #0080FF; font-weight:normal;">About the Job</h1>
             <p><?php echo $job_desc; ?></p>
    <h1 style="font-size: 18px; color: #0080FF; font-weight:normal;">Job Requirements</h1>
                       
             <p><?php echo $job_qual; ?></p>
                                       
    <h2 style="font-size: 16px; font-weight: bold;">Keywords: <span style="font-weight: normal; font-size: 14px;">			<?php echo $job_keywords; ?></span></h2>
    <h1 style="font-size: 18px; color: #0080FF; font-weight:normal;">How to Apply?</h1>
                       
             <p><?php echo $job_apply; ?></p>
                    
   <h3 style="font-size: 16px; font-weight: bold; color: #0080FF">APPLICATION INFORMATION</h3>
   <div class="table-responsive">
         <table class="table table-striped" style="font-size: 14px;">
                         
                <tr>
                    <td style="width: 30%;"><b>Postal Address:</b></td>
                    <?php
                        if($job_addr == ""){
                            echo "<td style='width: 70%;'>Not Known</td>";
                        }else{
                            echo "<td style='width: 70%;'>$job_addr</td>";
                        }
                    ?>
                  
                </tr>
                <tr>
                    <td><b>Online App. Form:</b></td>
                    <?php
                        if($job_url == ""){
                            echo "<td style='width: 70%;'>Not Known</td>";
                        }else{
                            echo "<td style='width: 70%;'><a style='color: #00F;' href='http://$job_url' target='_blank'>$job_url</a></td>";
                        }
                    ?>
                </tr>
                <tr>
                    <td><b>Email:</b></td>
                    <?php
                        if($job_email == ""){
                            echo "<td style='width: 70%;'>Not Known</td>";
                        }else{
                            echo "<td style='width: 70%;'><a style='color: #00F;' href='mailto:<?php echo $job_email; ?>'>$job_email</a></td>";
                        }
                    ?>
                
                </tr>
                <tr>
                    <td><b>Phone:</b></td>
                    <?php
                        if($job_ph == "0"){
                            echo "<td style='width: 65%;'>Not Known</td>";
                        }else{
                            echo "<td style='width: 65%;'>0$job_ph</td>";
                        }
                    ?>
                  
                </tr>
                <tr>
                    <td><b>Application Due:</b></td>
                    
                    <td style='width: 65%;'><?php echo $job_expiry_day."-".$job_expiry_month."-".$job_expiry_year ?></td>
            
                </tr>
                
            </table>
        
             </div>
             <a href="http://<?php echo $job_url; ?>" target="_blank;"><button style="font-size: 14px;" class="btn btn-success btn-lg">Apply through Institution's Website</button></a>
        
