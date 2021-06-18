<div id="topleft" class="col-md-4 col-sm-4 col-xs-12">
    <ul>
    <?php
        if(!isset($_SESSION['username'])){
            echo "<li><b>Welcome: </b>Please</li>";
            echo "<li><a href='jobseeker_signin.php' style='color: blue;'>Sign In</a> to continue</li>";
        }else{
            echo "<li><b>Welcome: </b>" . $_SESSION['mem_first_name'] . "&nbsp;" .$_SESSION['mem_last_name'] . "</li>";
            echo "<li><a href='members_logout.php' style='color: blue;'>Signout</a></li>";
        }
    ?> 
    </ul>   

</div>
<div id="topright" class="col-md-3 col-md-offset-5 col-sm-4 col-sm-offset-4 hidden-xs">
    If you are Employer? <a href="employers/index.php" target="_blank" style='color: blue;'>Click here</a>
</div>
