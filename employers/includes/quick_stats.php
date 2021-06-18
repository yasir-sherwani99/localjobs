<div class="panel panel-info">
        <div class="panel-heading">
            <label class="panel-title"><span class="glyphicon glyphicon-user"></span> Quick Stats</label>
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table border="0" class="table">
                <tr>
                    <td style="color: #0080FF;">Current live jobs</td>
                    <td style="text-align: right;"><span class="badge num"><?php echo currentliveJobs($comp_id); ?></span></td>
                </tr>
                
                <tr>
                    <td style="color: #0080FF;">Jobs posted this month</td>
                    <td style="text-align: right;"><span class="badge num"><?php echo currentmonthJobs($comp_id); ?></span></td>
                </tr>
                <tr>
                    <td style="color: #0080FF;">Job views this month</td>
                    <td style="text-align: right;"><span class="badge">0</span></td>
                </tr>
                <tr>
                    <td style="color: #0080FF;">Application received this month</td>
                    <td style="text-align: right;"><span class="badge num"><?php echo currentmonthApplication($comp_id); ?></span></td>
                </tr>
                </table>
            </div>                   	
        </div>
   </div>