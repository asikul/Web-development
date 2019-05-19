<?php

$db=mysqli_connect("localhost","root","","myshop");
if(mysqli_connect_error()) echo "The connection is not established : ".mysqli_connect_error();


function getIp(){
	$ip=$_SERVER['REMOTE_ADDR'];
	if(!empty($_SERVER['HTTP_CLIENT_IP'])) {
		$ip=$_SERVER['HTTP_CLIENT_IP'];    }
	
	elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		$ip=$_SERVER['HTTP_X_FORWARDED_FOR'];        }
	
	return $ip ;
}


function cart()
{
 
  if(isset($_GET['add_cart']) )
  {
	global $conn;
	$ip=getIp();
	$pro_id=$_GET['add_cart'];
	$cheak_pro="select * from cart where ip_add='$ip' AND p_id='$pro_id'";
	$run_cheak=mysqli_query($conn,$cheak_pro);
	if(mysqli_num_rows($run_cheak)>0 )
	{
	echo "";	
	}
	else
	{
	 $insert_pro="insert into cart (p_id,ip_add) values('$pro_id','$ip')";
	 
	 $run_pro=mysqli_query($conn,$insert_pro);
	 echo " <script>  windows.open('index.php' ,'_self') </script> ";
	
	}
	return $pro_id; 
  }
 
}



function total_price(){
	
	
	 // if(isset($_GET['add_cart']) ){
  
	global $conn;
	$total=0;
	$ip=getIp();
	$sel_price="select * from cart where ip_add='$ip'";
	
	$run_price=mysqli_query($conn,$sel_price);
	while($p_price=mysqli_fetch_array($run_price)){
	  
	  $pro_id=$p_price['p_id'];
	  
	  $pro_price="select * from products where product_id='$pro_id'";
	  $run_pro_price=mysqli_query($conn,$pro_price);
	  while ($pp_price=mysqli_fetch_array($run_pro_price))
	  {
		$product_price=array($pp_price['product_price']);
         $values=array_sum($product_price);
       $total= $total + $values;	 
	  }
	 
      	  
	}
	echo "Tk".$total;
    }
	
	
	
//}



function total_items(){
	  if(isset($_GET['add_cart']) )
  {
	global $conn;
	$ip=getIp();
	$get_items="select * from cart where ip_add='$ip'";
	
	$run_item=mysqli_query($conn,$get_items);
	$count_item=mysqli_num_rows($run_item);
    }
	else
	{
		global $conn;
		$ip=getIp();
	$get_items="select * from cart where ip_add='$ip'";
	
	$run_item=mysqli_query($conn,$get_items);
	$count_item=mysqli_num_rows($run_item);
	}
	
	
echo $count_item;	
}



function getPro(){
	    global $db;
		
		if(!isset($_GET['cat'])){
		    if(!isset($_GET['brand'])){	
		
	   $get_product="select *  from products order by rand() LIMIT 0,6 ";
		 $run_product =mysqli_query($db, $get_product);
		 while($row_products=mysqli_fetch_array($run_product))
		 {
			 $pro_id=$row_products['product_id'];
			 $pro_title=$row_products['product_title'];
			 $pro_cat=$row_products['cat_id'];
			 $pro_brand=$row_products['brand_id'];
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
		   }
	}


	
	
	
 function getCatPro(){
	    global $db;
		
		if(isset($_GET['cat'])){
		    $cat_id=$_GET['cat'];
		
	   $get_cat_product="select *  from products where cat_id='$cat_id' ";
		 $run_cat_pro =mysqli_query($db, $get_cat_product);
		 $count=mysqli_num_rows($run_cat_pro);
		 if($count==0) echo "<h2> No product found in this category ";
		 while($row_cat_pro=mysqli_fetch_array($run_cat_pro))
		 {
			 $pro_id=$row_cat_pro['product_id'];
			 $pro_title=$row_cat_pro['product_title'];
			 $pro_cat=$row_cat_pro['cat_id'];
			 $pro_brand=$row_cat_pro['brand_id'];
			 $pro_desc=$row_cat_pro['product_desc'];
			 $pro_price=$row_cat_pro['product_price']; 
			 $pro_image=$row_cat_pro['product_img1'];
			 
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
	}

	
	



function getBrandPro(){
	    global $db;
		
		if(isset($_GET['brand'])){
		    $brand_id=$_GET['brand'];
		
	   $get_brand_product="select *  from products where brand_id='$brand_id' ";
		 $run_brand_pro =mysqli_query($db, $get_brand_product);
		 $count=mysqli_num_rows($run_brand_pro);
		 if($count==0) echo "<h2> No product found in this Brand ";
		 while($row_brand_pro=mysqli_fetch_array($run_brand_pro))
		 {
			 $pro_id=$row_brand_pro['product_id'];
			 $pro_title=$row_brand_pro['product_title'];
			 $pro_cat=$row_brand_pro['cat_id'];
			 $pro_brand=$row_brand_pro['brand_id'];
			 $pro_desc=$row_brand_pro['product_desc'];
			 $pro_price=$row_brand_pro['product_price']; 
			 $pro_image=$row_brand_pro['product_img1'];
			 
			 echo "
			 <div id='single_product'>
			 <h3>$pro_title</h3>
			 <img src='admin_area/product_imges/$pro_image' width='180' height='180'/> <br>
			 <p> Price:<b> $pro_price </b> tk </p>
			 <a href='detail.php?pro_id=$pro_id' style='float:left;'>     Details    </a>
			 <a href='index.php?add_cart=$pro_id'><button style='float:right;'>   Add to cart   </button></a>
			 
			 </div>  
			 ";
			
		    }
	
	

		}
	}	
	

function getBrands()
{
	global $db;
    $get_brands = "SELECT * FROM brands";
	$run_brands = mysqli_query($db, $get_brands);

   
    // output data of each row
    while($row = mysqli_fetch_assoc($run_brands)) {
         
		
		        $brand_id=$row['brand_id'];
			   $brand_title=$row['brand_title'];
			 echo" <li><a href='index.php?brand=$brand_id'>$brand_title </a><li>";  
    }	
	
	
	
}



function getCats(){
	
	global $db;
	
	$get_cats = "SELECT * FROM cateegories";
	$run_cats = mysqli_query($db, $get_cats);

   
   
    while($row = mysqli_fetch_assoc($run_cats)) {
    
		 $cat_id=$row['cat_id'];
			   $cat_title=$row['cat_title'];
			 echo" <li><a href='index.php?cat=$cat_id'>$cat_title </a><li>";  
    }
}




