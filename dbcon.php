<?php
$host="localhost";
$username="root";
$password="";
$dbname="garmentserp";
$con=mysqli_connect($host,$username,$password,$dbname);

if(!$con)
{
die("connection failled".mysqli_connect_error());
}
else
{
	//echo "connected";
}

?>