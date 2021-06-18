<!--   <h1 id="clock"></h1>
        
   <div id="day"> 
            <?php 
      /*          $day = date("l");
                $day2 = strtoupper($day);
                echo $day2;  */  
            ?>
    </div>
    <div id="date"><?php //echo date("F d, Y"); ?></div>
-->
<div class="panel panel-default"> 
    <div class="panel-body">
        <div id="day1" class="pull-left"> 
            <?php 
                $day = date("l");
                $day2 = strtoupper($day);
                echo $day2;  
            ?>
            
            <div id="date1"><?php echo date("F d, Y"); ?></div>
        </div>
        <h1 id="clock" class="pull-right" style="font-size: 24px; font-weight: bold; width: 70px; margin-top: 0px;"></h1>
    </div> 
</div> 			
                    
