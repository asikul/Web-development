<?php
include("includes/db.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


<div id="sidebar_title">Categories</div>

 <ul id="cats">
			
	

<?php	
	$get_cats = "SELECT * FROM cateegories";
	$run_cats = mysqli_query($conn, $get_cats);

   
    // output data of each row
    while($row = mysqli_fetch_assoc($run_cats)) {
               $cat_id=$row['cat_id'];
			   $cat_title=$row['cat_title'];
			 echo" <li><a href='index.php?cat=$cat_id'>$cat_title </a><li>";  
    }
 


//mysqli_close($conn);
?>
	
	
   </ul>
			
<div id="sidebar_title">Brands</div>
 <ul id="cats">
			<?php	
	$get_brands = "SELECT * FROM brands";
	$run_brands = mysqli_query($conn, $get_brands);

   
    // output data of each row
    while($row = mysqli_fetch_assoc($run_brands)) {
         
		
		        $brand_id=$row['brand_id'];
			   $brand_title=$row['brand_title'];
			 echo" <li><a href='index.php?cat=$brand_id'>$brand_title </a><li>";  
    }
 


       mysqli_close($conn);
    ?>
		   
</ul>