<?php
	$memberAPPS = countEmployerApps($comp_id);
	$quickAPPS = countQUICKEmployerApps($comp_id);
	
	$totalAPPS = $memberAPPS + $quickAPPS;
	
?>

<div class="panel panel-default"> 
        <div class="panel-body">
        <table border="0" align="center">
        <tr>
            <td rowspan="2"><img src="images/documents11.png" style="width: 40px; height: 50px;"></td>
            <td style="text-align: center; padding-top: 10px;"><span style="font-size: 22px;" class="badge"><?php echo $totalAPPS; ?></span></td>
        </tr>
        <tr>
            <td style="text-align: center; padding-bottom: 0px;"><label style="font-size: 12px;">APPLICATIONS</label></td>
        </tr>
      </table>	

        </div> 
    </div> 			