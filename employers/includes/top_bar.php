<div id="topleft" class="col-md-6 col-sm-6 col-xs-12">
    <ul>
    <?php
        if(!isset($_SESSION['comp_user'])){
            echo "<li><b>Welcome: </b>Please</li>";
            echo "<li><a href='employer_signin.php' style='color: blue;'>Sign In</a> to continue</li>";
        }else{
            echo "<li><b>Welcome: </b>" . $_SESSION['comp_name'] . "</li>";
            echo "<li><a href='employer_logout.php' style='color: blue;'>Signout</a></li>";
        }
    ?> 
    </ul>   
</div>
<div id="topright" class="col-md-3 col-md-offset-3 col-sm-3 col-sm-offset-3 hidden-xs">
    If you are Jobseeker? <a href="../index.php" target="_blank">Click here</a>
</div>
