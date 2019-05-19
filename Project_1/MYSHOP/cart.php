<?php

session_start();
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
            <li><a href='index.php'>Home   </a></li>
			<li><a href="#">All Product </a></li>
			<li><a href="#">My Account </a></li>
			<li><a href="#">Sign Up </a></li>
			<li><a href="#">Shopping Cart </a></li>
		    <li><a href="#">Contact Us</a></li>
    </ul>
	
	<div id="form">
	<form method="get" action="result.php" enctype="multipart/form-data">
	<input type="text" name="user_query" placeholder="Search a product"/>
	<input type="submit" name="search" value="Search"/>
	</form>
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
    
	 <?php cart();?>
		   
		<div id="headline"> 
		   headline
		     <div id="headline_content">
			 <b>Welcome Guest!</b>
			 <b style="color:yelow"> Shopping cart-</b>
			 <span> - Total item :<?php total_items();?>
			 -price: <?php total_price();?>
			<b> <a href="cart.php"> go to cart </a> </b>  
			 </span>
			 </div>
			 
		   </div>
		   
		 <div id="product_box">
		
		 <form action="cart.php" method="post" enctype="multipart/form-data">
		   <table align="center" width="700" bgcolor="skyblue" >
		    

			<tr align="center">
			   <th>Remove </th>
			   <th>Product(s) </th>
			   <th>Quantity</th>
			   <th>Total Price</th>
			 </tr>
			 
			 
 <?php
	$total=0;
    $qty=0; //initialize for problem	
	global $conn;		 	
	
	$ip=getIp();
	$sel_price="select * from cart where ip_add='$ip'";
	
	$run_price=mysqli_query($conn,$sel_price);
	  while($p_price=mysqli_fetch_array($run_price))   //<!--loop start of while loop from 120 to  171 -->
	        {
	  
	     $pro_id=$p_price['p_id'];
	  
	      $pro_price="select * from products where product_id='$pro_id'";
	      $run_pro_price=mysqli_query($conn,$pro_price);
	      while ($pp_price=mysqli_fetch_array($run_pro_price))
	    {
		      $product_price=array($pp_price['product_price']);
		      $product_title=$pp_price['product_title'];
		     $product_image=$pp_price['product_img1'];
		      $single_price=$pp_price['product_price'];
              $values=array_sum($product_price);
              $total= $total + $values;	
	
	
?>

			 
			 
     
             <tr align="center">
			   <td><input type="checkbox" name="remove[]" value="<?php echo $pro_id;?>";/></td>
			   <td><?php echo $product_title;?> </br>
			        <img src="admin_area/product_imges/<?php echo $product_image;?>"width="60" height="60"/>
			        </td>
	             <td><input type="text" size="4" name="qty" value="<?php echo $_SESSION['qty'];?>" /></td>
			   
			  <?php
				if(isset($_POST['update_cart'])){
					$qty=$_POST['qty'];
					$update_qty="update cart set qty='$qty'";
					$run_qty=mysqli_query($conn,$update_qty);
					
					$_SESSION['qty']=$qty;
					
					$total=$total*$qty;
					
				} 
				?>  
				
			   
			   <td><?php echo $single_price."Tk"  ;?> </td>
             </tr>
			 
			 <tr align="right">
			   <td colspan="7"><b>Sub Total</b> </td>
			    <td><?php echo  $total ."Tk" ; ?></td>
			 </tr>
			 
 
<?php   }   }   ?>	  <!--///loop end of while loop from 120 to  171 -->
	
	         <tr align="right">
			   <td colspan="7"><b>Total</b> </td> 
			    <td><?php echo  $total ."Tk" ;  ?></td>
			 </tr>
			  
			 <tr align="center">
			    <td></td>
			    <td colspan="1"> <input type="submit" name="update_cart" value="Update_cart"/></td>
			    <td><input type="submit" name="continue" value="Continue Shoping" /> </td>
				 <td><button><a href="cheakout.php" >Cheakout</a></button></td>
			 </tr>
			 
			 
			 
			</table> 
		  </form>
		  
		    <?php
		    function updatecart(){
				
		     global $conn;
		    $ip=getIp();
		    if(isset($_POST['update_cart'])){
				foreach($_POST['remove']as $remove_id){   //
		        $delete_product="delete from cart where p_id='$remove_id' AND ip_add='$ip'";
				$run_delete=mysqli_query($conn,$delete_product);
				if($run_delete){
					echo "<script>window.open('cart.php','_self')</script>";
				}
				}
				}
	 if(isset($_POST['continue'])) {
		echo "<script>window.open('index.php','_self')</script>"; 
	 }
	 }
	 echo @$up_cart=updatecart();
	 
		    ?>
		 
		 </div> <!--product box end-->  
		  
		  
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
