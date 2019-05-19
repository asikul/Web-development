<?php
include("includes/db.php");
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<title>untit</title>
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>
 </head>
<body  bgcolor="red"">
<form method="post" action="insert_product.php" enctype="multipart/form-data" >

<table width="700" align="center" border="1" bgcolor="#3399cc">
     <tr align="center">
	  <td colspan="2"><h2> Insert New Product:</h2></td>
     </tr>
<tr>
	  <td><b>Product Title</b></td>
	  <td> <input type="text" name="product_title" size="50"/> </td>
 </tr>
 <tr>
       <td><b>Product Category</b></td>
	  <td>
	  <select name="product_cat"> <!-- "product_cart" */ -->
	  <option>select a Category </option>
	  <?php	
	  $sel_cats = "SELECT * FROM cateegories";
	  $run_cats = mysqli_query($conn, $sel_cats);
      while($row = mysqli_fetch_assoc($run_cats)) {
		       $cat_id=$row['cat_id'];
			   $cat_title=$row['cat_title'];
			   echo"<option value='$cat_id'>$cat_title </option>";  
        }
      ?>
	  </select>
	  </td>
 </tr>
 <tr>
       <td><b>Product Band</b></td>
	  <td>
	 <select name="product_brand">  <!-- "product_band" */ -->
	  <option>select  Brand </option>
	 	<?php	
	$sel_brands = "SELECT * FROM brands";
	$run_brands = mysqli_query($conn, $sel_brands);
    while($row = mysqli_fetch_assoc($run_brands)) {
         
		
		        $brand_id=$row['brand_id'];
			   $brand_title=$row['brand_title'];
			echo"<option value='$brand_id'>$brand_title </option>";
    }
    ?>
	  </select>
	  </td>
 </tr>
 <tr>   <td><b>Product Image 1</b></td>
	  <td><input type="file" name="product_img1"/> </td>
 </tr>
 <tr>
       <td><b>Product Image 2</b></td>
	  <td><input type="file" name="product_img2"/> </td>
 </tr>
 <tr>
       <td><b>Product Image 3</b></td>
	  <td><input type="file" name="product_img3"/> </td>
 </tr>
 <tr>
	   <td><b>Product Price</b></td>
	  <td><input type="text" name="product_price"/> </td>
 </tr>
 <tr>
       <td><b>Product Description</b></td>
	  <td><textarea name="product_desc" cols="35" rows="10"></textarea> </td>
 </tr>
  <tr>
       <td><b>ProductKeywords</b></td>
	  <td><input type="text" name="product_keywords"/> </td>
 </tr>
  <tr align="right">
      
	  <td colspan="2"><input type="submit" name="insert_product" value="Insert product"/> </td>
 </tr>
 
 </table>
 </form>
 </body>
 </html>
 
 
 
 <?php
 
   if(isset($_POST['insert_product']))  {
	   
	   $product_title=$_POST['product_title'];
	   $product_cat=$_POST['product_cat'] ;
	   $product_brand=$_POST['product_brand'] ;
	   $product_price=$_POST['product_price'] ;
	   $product_desc=$_POST['product_desc'] ;
	   $status='on';
	   $product_keywords=$_POST['product_keywords'] ;
	   //images name
	   $product_img1=$_FILES['product_img1']['name'];
	   $product_img2=$_FILES['product_img2']['name'] ;
	   $product_img3=$_FILES['product_img3']['name'] ;
	   //images temp name
	   $temp_name1=$_FILES['product_img1']['tmp_name'];
	   $temp_name2=$_FILES['product_img1']['tmp_name'];
	   $temp_name3=$_FILES['product_img1']['tmp_name'];
	  
      if( $product_title=='' OR $product_cat=='' OR $product_brand=='' OR $product_price=='' OR $product_desc=='' OR $product_keywords=='' OR $product_img1==''  )
       {
		  echo "<script> alert('please fill all the field !')</script>";
         exit();		  
	   } 
		else
		{
		//uploading imsge to its folder	
		move_uploaded_file($temp_name1,"product_images/$product_img1");
		move_uploaded_file($temp_name2,"product_images/$product_img2");
		move_uploaded_file($temp_name3,"product_images/$product_img3");
		}
 
		 
	   $insert_product= "insert into products (cat_id,brand_id,date,product_title,product_img1,product_img2,product_img3,product_price,product_desc,status) 
	   values('$product_cat','$product_brand','NOW()','$product_title','$product_img1','$product_img2','$product_img3','$product_price','$product_desc','$status')";
       
	    $run_product=mysqli_query($conn,$insert_product);
     //$run_product = mysqli_query($conn, $sel_brands);		 
		if($run_product){
			 echo "<script>alert('product inserted successfully')</script>";
			 }
	
	   
	 

}
?>
