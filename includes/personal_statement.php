<ul class="nav nav-tabs">
        <li class="active"><a href="#" style="background-color: #F0F0F0;" class="dashboard_title">Personal Statement</a></li>
        	<p class="dashboard_paragraph"><a href="#"><button id="edit_personal" class="btn btn-default btn-md"><img src="images/icons/pencil.png" width="10" height="10"></button></a></p>
</ul>  
    <div id="space-ps">
        <?php
            if($mem_personal_statement == ""){
                echo "<span style='color: red;'>Please add personal statement to improve your profile...</span>";
            }else{
                echo $mem_personal_statement;
            }
        ?>

    </div>