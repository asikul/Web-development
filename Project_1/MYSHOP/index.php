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




<!--<div class="main_wrapper"> <!--  main wrapper green start   -->
             <!--  header  white start   -->
<div class="header_wrapper" >
  <img src="images/hp mobile.jpg" width="440" height="206" >
   <img src="images/s.jpg" width="400" height="206">
    <img src="images/nokia tablet.jpg" width="500" height="206">
  
</div>
   
               <!--header end--> 
			   <!-- Navigation var start -->
<div id="navbar" > 
   <ul id="menu">   
            <li><a href='index.php'>Home   </a></li>
			<li><a href='index.php'>All Product </a></li>
			<li><a href="my account.php">My Account </a></li>
			<li><a href="sign up.php">Sign Up </a></li>
			<li><a href="cart.php">Shopping Cart </a></li>
		    <li><a href="contuct_us.php">Contact Us</a></li>
    </ul>
	
	<div id="form">
	<form method="get" action="result.php" enctype="multipart/form-data">
	<input type="text" name="user_query" placeholder="Search a product"/>
	<input type="submit" name="search" value="Search"/>
	</form>
	</div>

</div>
              <!--nav end--> 
			  
            
                        
 <div >  <!--content wrapper start--> 
         
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
		  
		  

    <div>  <!--right_content start-->  
	       <!-- <?php cart();?> -->
		   
		<div id="headline"> 
		
		     <div id="headline_content">
			 <h3>
			 <b>Welcome Guest!</b>
			 <b> Shopping cart-</b>
			 <span> - Total item :<?php total_items();?>
			 -price: <?php total_price();?>
			<b><a style="text-decoration:none ;color:brown" href="cart.php"> go to cart </a></b>
			 </h3>
			 </span>
			 </div>
			 
		   </div>
		   
		 <div id="product_box">
		 <?php
		
		getCatPro();
		getBrandPro();
		getPro();
			   
		 ?>
	
		 
		 </div><!--product box end-->  
		  
      </div>            <!--right content end-->       

</div>	 <!--content wrapper end--> 

<div class="footer"> 

<h1 style="color:#000;padding-top:30px;text-align:center;" >&copy;  2016 -By www.asiksite.com</h1>

 </div>
   

<!-- </div> <!--main wrapper end--> 

</body>
</html>
