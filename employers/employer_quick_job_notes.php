<?php 
	session_start();
	if(!isset($_SESSION['comp_user'])){
		header('location: index.php?error=You are not an Administrator');
	}else{
 
?>

<?php include("includes/connection.php"); ?>
<?php include("functions/emp_main_panel_functions.php"); ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Local Jobs Pakistan</title>
	<link href="../images/logo_small.png" type="image/gif" rel="shortcut icon" />
    <link href="css/bootstrap.min.css" rel="stylesheet" />
	<link rel="stylesheet" type="text/css" href="styles/emp_main_panel_style.css" />
    <script src="js/respond.js"></script>
	<script type="text/javascript" src="js/js_functions.js"></script>
</head>

<body>
<?php
	if(isset($_GET['apply_id'])){
		$apply_id = $_GET['apply_id'];
			$get_applied_job = "SELECT * FROM quick_apply WHERE apply_id = '$apply_id'";
			$run_applied_job = mysqli_query($connection, $get_applied_job);
			$row_applied_job = mysqli_fetch_array($run_applied_job);
				$applyId = $row_applied_job['apply_id'];
				$emp_notes = $row_applied_job['notes'];

	}

?>
<div class="container">
	<!-- This is top bar -->
	<div id="topbar" class="row">
    	<?php include("includes/top_bar.php"); ?>
	</div>

	<!-- Header area starts -->
    <div id="header" class="row">
    	<?php include("includes/header.php"); ?> 
    </div>
    <!-- Header area ends -->

	<div class="row">
     	<?php include("includes/navigation_main.php"); ?>
    </div>	

	<div class="row">

        <!-- Left side area starts -->
		 <div id="left_side_area" class="col-md-3 col-sm-3 col-xs-3">
            <!-- Navigation area starts -->
            <?php include("includes/employer_dashboard.php"); ?>
        
        </div>
        
        <!-- Main contents area starts -->
        
        <div id="contents" style="padding-top: 10px;" class="col-md-9 col-sm-9 col-xs-9">
            <div id="tab" class="row">
                <ul class="nav nav-tabs">
                    <li><a href="employer_apps.php">Member's Applications</a></li>
                    <li><a href="employer_quick_apps.php">Non-Member's Applications</a></li>
                    <li class="active" style="font-weight: bold;"><a href="#">Add Notes</a></li>
                </ul>
            </div>
      
            <?php
          
                 if(isset($_GET['updated'])){
                     $updated = $_GET['updated'];
                     echo "<div id='message' class='alert alert-success'>
                            <img src='images/checkmark.png' width='25' height='25'/>
                            <div id='aa'>$updated</div>
                    </div>"; 
                 }
				else {
                    echo "<div id='message' class='alert alert-info'>
                            <img src='images/info.png' width='45' height='45'/>
                          <p id='aa'><b>Add Notes/Comments</b><br/>You may enter any comments or notes to any application.						</p>
                    </div>";
                }
                 
            ?>
    
            <div id="all_jobs" style="background-color:#FFF; font-size: 14px;" class="row">
               <div class="table-responsive"> 
                <table class="table table-bordered">
                	<form action="employer_quick_job_notes.php?edit_form=<?php echo $applyId; ?>" role="form" method="post">
                 
                     <tr>
                        <td style="width: 15%;"><span style="font-weight: bold;">My Notes</span></td>
                                                	
                        <td style="width: 85%;">
                            <textarea name="notes" class="form-control"></textarea>
                        </td>
                     </tr> 
                     <tr>
                     	<td></td>  
                        <td>
                            <input type="submit" class="btn btn-primary btn-sm pull-left" name="add_notes" value="Save">
                   
                        </td>    
                          	
                        
                    </tr>
                    </form>
                
                   
                 </table>
              </div>
              
            </div>
        </div>
    </div>
    <!-- Main contents area ends -->
     <!-- Footer area starts -->
    <div id="footer" class="row">
    	<?php include("includes/footer_contents.php"); ?>
    </div>
    <!-- Footer area ends -->

</div>
</body>
</html>
<?php } ?>
<?php
	if(isset($_POST['add_notes'])){
		$edit_record = $_GET['edit_form'];
		$notes = $_POST['notes'];
		
		$update_notes = "UPDATE quick_apply
							SET notes = '$notes'
								WHERE apply_id = '$edit_record'";
								
		$run_notes = mysqli_query($connection, $update_notes);
		if($run_notes){
		
			echo "<script>window.open('employer_quick_apps.php?updated=You have successfully added notes to application...', '_self')</script>";
		}
		else{
			die("Database query has failed" . mysqli_error());
		}
	}
?>