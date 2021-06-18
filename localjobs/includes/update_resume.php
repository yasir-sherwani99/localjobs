<?php
	if(isset($_GET['mem_id'])){
		
	$member = $_GET['mem_id'];
	
	$get_member = "SELECT * FROM members WHERE mem_id = '$member'";
	
	$run_member = mysqli_query($connection, $get_member);
	if(!$run_member){
		die("database query has failed" . mysqli_error());
	}
	
	$row_member = mysqli_fetch_array($run_member);
	
		$mem_id = $row_member['mem_id'];
		$mem_cv_name = $row_member['mem_cv'];
	
?>

<table class="table">
    <tr>
        <td class='title2'>CV/Resume:</td>
        <td>
            <?php echo $mem_cv_name; ?> &nbsp;<span style="font-size: 12px;"> <a href="#">Preview</a> | <a href="download.php?download_file=<?php echo $mem_cv_name; ?>">Download</a></span>
        </td>
    </tr>
    <tr>
        <td class="title2">Update CV/Resume:</td>
    
        <form name="" method="post" action="upload_cv1.php?edit_form=<?php echo $mem_id; ?>" enctype="multipart/form-data">
        <td>
            <input type="file" name="mem_cv" />
        </td>
    </tr>
    <tr>
        <td></td>
        <td id="butt1">
            <input type="submit" name="upload_cv" class="btn btn-primary btn-xs" value="Upload" /> 
        </td>
        </form>
    </tr>
<?php } ?>
</table>
