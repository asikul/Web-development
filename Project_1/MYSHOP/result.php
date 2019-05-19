<?php
include("includes/db.php");
include("function/functions.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Myshop</title>
<link rel="stylesheet" href="styles/style.css" media="all" />
</head>

<body>




<div class="main_wrapper"> <!--  main wrapper  start   -->
             <!--  header  start   -->
<div class="header_wrapper" >
  <img src="images/hp mobile.jpg" width="360" height="206" >
   <img src="images/s.jpg" width="400" height="206">
    <img src="images/nokia tablet.jpg" width="400" height="206">
  
</div>
   
               <!--header end--> 
			   <!-- Navigation var start -->
<div id="navbar" > 
   <ul id="menu">   
            <li><a href="#">Home   </a></li>
			<li><a href="#">All Product </a></li>
			<li><a href="#">My Account </a></li>
			<li><a href="#">Sign Up </a></li>
			<li><a href="#">Shopping Cart </a></li>
		    <li><a href="#">Contact Us</a></li>
    </ul>
	
	<div id="form">
	<form method="get" action="result.php" enctype="multipart/form-data">
	<input type="text" name="user_query" placeholder="Search a product"/>
	<input type="submit" name="search" placeholder="Search"/>
	</div>
</div>
</div>
              <!--nav end--> 
			  
             <!--content start--> 
          
<div class="content_wrapper">
         
           <div id="left_sidebar"> <!--left_sidebar start--> 
		        
			<div id="sidebar_title">Categories</div>

		    <ul id="cats">
			
	

<?php	
	getCats();  
?>
</ul>
			
			<div id="sidebar_title">Brands</div>
		    <ul id="cats">
	<?php	
	getBrands();
    ?>

		    </ul>
		   
		   
          </div>           <!--left_sidebar end-->  
		  
		  
 <div id="right_content">  <!--right content start-->  
		   <div id="headline">
		   headline
		     <div id="headline_content">
			 <b>Welcome Guest!</b>
			 <b style="color:yelow"> Shopping cart</b>
			 <span> - Item :-price:
			 <b> <a href="cart.php"> go to cart </a> </b>
			 </span>
			 </div>
			 
		   </div>
		   
		 <div id="product_box">
		 <?php
		 
		 if(isset($_GET['search']))  
		{
		
		   $search_query=$_GET['user_query'];

		  
		 $get_products="select *  from products where product_keywords like '%$search_query%' ";
		 $run_products =mysqli_query($conn, $get_products);
		 while($row_products=mysqli_fetch_array($run_products))
		    {
			 $pro_id=$row_products['product_id'];
			 $pro_title=$row_products['product_title'];
			 $pro_desc=$row_products['product_desc'];
			 $pro_price=$row_products['product_price']; 
			 $pro_image=$row_products['product_img1'];
			 
			 echo "
			 <div id='single_product'>
			 <h3>$pro_title</h3>
			 <img src='admin_area/product_imges/$pro_image' width='180' height='180'/> <br>
			 <p> Price:<b> $pro_price </b> tk </p>
			 <a href='detail.php?pro_id=$pro_id' style='float:left;'>Details </a>
			 <a href='index.php?add_cart=$pro_id'><button style='float:right;'> Add to cart</button></a>
			 
			 </div>  
			 ";
			
		    }
		}   
		 ?>
		 </div><!--product box end-->  
		  
		  
		  </div><!--right content end-->  

 </div>       <!--content end-->  


	
	
</div> 	 <!--new right content end-->

</div>	<!--new content end--> 

<div class="footer">  
<h1 style="color:#000;padding-top:30px;text-align:center;" >&copy;  2016 -By www.asiksite.com</h1>
 </div>
   

</div> <!--main wrapper end--> 

</body>
</html>
