<div id="date_box">
   <h1 id="clock"></h1>
        
   <div id="day"> 
            <?php 
                $day = date("l");
                $day2 = strtoupper($day);
                echo $day2;  
            ?>
    </div>
    <div id="date"><?php echo date("F d, Y"); ?></div>
</div> 