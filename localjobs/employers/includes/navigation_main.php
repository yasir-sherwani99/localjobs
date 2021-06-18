<nav class="navbar navbar-default" role="navigation" style="margin-bottom: 5px;">
        <div class="navbar-header"> 
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#example-navbar-collapse">
                <span class="sr-only">Toggle navigation</span> 
                <span class="icon-bar"></span> 
                <span class="icon-bar"></span> 
                <span class="icon-bar"></span> 
            </button>
        </div>
        <div class="collapse navbar-collapse" id="example-navbar-collapse">    
            <ul class="nav navbar-nav" style="font-weight: bold;">
                <li><a href="index.php">Home</a></li>
                <?php 
        			if(isset($_SESSION['comp_user'])){
                		echo "<li class='active'><a href='main_panel.php'>Employer HQ</a></li>";
            		}else{
                		echo "<li class='active'><a href='employer_signin.php'>Employer HQ</a></li>";
            		}     
       			 ?>
    <!--            <li><a href="index.php">Employer HQ</a></li>  -->
                <li><a href="emp_register.php">Join Now</a></li>
                <li><a href="../index.php">Job Seeker?</a></li>
                <li><a href="about_us.php">About Us</a></li>
                <li><a href="#">Contact Us</a></li>
            </ul>
        </div>
</nav>
