<?php

$conn=mysqli_connect("localhost","root","","myshop");
if(mysqli_connect_errno())
{
	echo "Failed to connect to Mysql: ".mysqli_connect_errno();
}

return $conn;




?>