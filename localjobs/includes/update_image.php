<div class="table-responsive">
	<table class="table">
    	<tbody>
        <tr>
            <td class='title2'>Picture:</td>
            <td>
                <span style="margin-left: 0px; color: #00F;">
                    <a href="#">Delete</a>
                </span>
            </td>
        </tr>
        <tr>
            <td class="title2">Upload / Update Image:</td>
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
    </table>
</div>