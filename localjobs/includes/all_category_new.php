<?php include("includes/connection.php"); ?>

<table width="650" border="0" cellpadding="4">
  <tr style="font-weight: bold;">
  	<td>Sr. No</td>
    <td>Industry</td>
    <td>Total Jobs</td>
    <td>&nbsp;</td>
  </tr>
  <?php
			$get_cats = "select * from categories order by cat_title";
			$run_cats = mysqli_query($connection, $get_cats);
			$i=1;
			while($row_cats = mysqli_fetch_array($run_cats)){
				$cat_id = $row_cats['cat_id'];
				$cat_title = $row_cats['cat_title'];
               // echo "<option value='$cat_id'>$cat_title</option>";
			
	?>

  <tr>
  	<td><?php echo $i++; ?></td>
    <td><?php echo $cat_title; ?></td>   
    <td><?php echo countCategoryJobs($cat_id); ?></td>
    <td><a href="cat_details.php?cat_id=<?php echo $cat_id; ?>" target="_blank"><button>Details</button></a></td>
  </tr>
  <?php } ?>

</table>

