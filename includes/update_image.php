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
		$mem_pic_name = $row_member['mem_image'];
	
?>
<div class="table-responsive">
	<table class="table table-bordered">
    	<tbody>
        <tr>
            <td class="dashboard_main_headings">Picture:</td>
            <td>
                <span style="margin-left: 0px; color: #00F;">
                    <a href="delete_mem_pic.php?delete_pic=<?php echo $mem_id; ?>" onClick="return confirm('Are you sure, you want to delete this Image??')">Delete</a>
                </span>
            </td>
        </tr>
        <tr>
            <td class="dashboard_main_headings">Upload / Update Image:</td>
            <?php
            	if(isset($_GET['mem_id'])){
                    $mem_id = $_GET['mem_id'];
                }  
            ?>
            <td>
            <form name="" method="post" action="upload_image.php?edit_form=<?php echo $mem_id; ?>" enctype="multipart/form-data">
                <input type="file" name="mem_image" />
            </td>
        </tr>
        <tr>
            <td class="heading"></td>
            <td id="butt1">
                <input type="submit" name="upload_image" class="btn btn-primary btn-xs" value="Upload" /> 
            </form>
            </td>
        </tr>
		</tbody>
	<?php } ?>	
    </table>
</div>