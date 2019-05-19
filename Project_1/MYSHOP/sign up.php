<?php
include("includes/db.php");
?>
<html>
<style>
body
{
	background:url('content_background.jpg');
	

}
</style>
<body >
<h1> Sign up </h1>
<form  method="post" action="sign up.php">
Enter your name: <input type="text" name="name"> <br/> 
Enter  password: <input type="password" name="password"> <br/>
Enter  fullname: <input type="text" name="fullname">
<input type="submit" name="insert_account" value="Insert account" /> 
</form>

</body>
</html>


<?php
 if(isset($_POST['insert_account'])) 
{
	  $name=$_POST['name'];
	  $password=$_POST['password'] ;
	  $fullname=$_POST['fullname'] ;


$insert_account= "insert into account(username,password,fullname)  values('$name','$password','$fullname')";
       
$run_account=mysqli_query($conn,$insert_account);



if($run_account) {echo "<script>alert('product inserted successfully')</script>";}
else{
echo "<script>alert('product not inserted ')</script>";}
		 
}
 
?>