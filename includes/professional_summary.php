<ul class="nav nav-tabs">
        <li class="active"><a href="#" style="background-color: #F0F0F0;" class="dashboard_title">Professional Summary</a></li>
        <p class="dashboard_paragraph"><a href="#"><button id="edit_professional" class="btn btn-default btn-md"><img src="images/icons/pencil.png" width="10" height="10"></button></a></p>
    </ul>  

    <div id="space-psum">
        <table class="table table-bordered">
            <tr>
                <td class="dashboard_main_headings">Resume Headline</td>
                <td><?php echo $mem_cv_headline; ?></td>
            </tr>
            <tr>
                <td class="dashboard_main_headings">Industry</td>
                <td><?php echo $industry_title; ?></td>
            </tr>
            <tr>
                <td class="dashboard_main_headings">Total Professional Experience</td>
                <td><?php echo $mem_exp_year . " years " . $mem_exp_month . " months"; ?></td>
            </tr>
        </table>
    </div>