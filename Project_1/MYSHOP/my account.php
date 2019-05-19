<?php
include("includes/db.php");
?>
<html>
<body>
<style>
body
{
	background:url('content_background.jpg');
	

}
</style>
<h1> log in to your account</h1>
<form method="post" action="my account.php">
 username: <input type="text" name="name"> <br/> 
 password: <input type="text" name="password">
 <input type="submit" value="Submit" name="submit">
 </form>
</body>
</html>

<?php

 if(isset($_POST['submit'])) 
{
	  $c_name=$_POST['name'];
	  $c_password=$_POST['password'] ;
	  
	  $query="select * from account";
	 $run=mysqli_query($conn,$query);
	  
	while( $row=mysqli_fetch_array($run))
	{
		 
		
	 if($row['username']==$c_name && $row['password']==$c_password )
	 { $fullname=$row['fullname'];$name=$row['username'];  break;} 
	   
	}	
	  if($name=='admin')
	  {
		   header("location:admin_area/insert_product.php");
	  }
	  else
	  {
		    
			
			echo "<h1>WELCOME TO OUR ONLINE SHOPING  CENTER . </h1>";
			
			echo "<h2>Hi! </h2> ".$fullname ;
			echo "<h2>Your Registration complete successfully and you are now logged in. </br> Thank you for your response to us.<h2> " ;
			
	  }
		
}
?> 