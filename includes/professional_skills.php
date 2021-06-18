<ul class="nav nav-tabs">
    <li class="active"><a href="#" style="background-color: #F0F0F0;" class="dashboard_title">Skills</a></li>
    <p class="dashboard_paragraph"><a href="#"><button id="edit_skills" class="btn btn-default btn-md"><img src="images/icons/pencil.png" width="10" height="10"></button></a></p>
</ul>  

<div id="space-skills">
    <table class="table table-bordered">
        <tr>
            <td class="dashboard_main_headings">IT Skills</td>
            <td>
            <?php
                if($mem_it_skills == ""){
                    echo "<span style='color: red;'>Not Set</span>";
                }else{
                    echo $mem_it_skills;
                }
            ?>
            </td>
        </tr>
        <tr>
            <td class="dashboard_main_headings">Other Skills</td>
            <td>
            <?php
                if($mem_other_skills == ""){
                    echo "<span style='color: red;'>Not Set</span>";
                }else{
                    echo $mem_other_skills;
                }
            ?>
            </td>
        </tr>
    </table>
</div>
