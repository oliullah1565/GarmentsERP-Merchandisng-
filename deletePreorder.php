<?php
include("dbcon.php");
session_start();
if (!isset($_SESSION['uname'])) {
    echo 'signup first';
    header("Location:Log_in.php");
    exit;
}

$order_id=$_GET['id'];



$print_embroidery="DELETE  FROM print_embroidery  WHERE order_id='$order_id'";
$sql1=mysqli_query($con,$print_embroidery);



$fabrication="DELETE  FROM fabrication  WHERE order_id='$order_id'";
$sql2=mysqli_query($con,$fabrication);


$basic_accessories="DELETE  FROM basic_accessories  WHERE order_id='$order_id'";
$sql3=mysqli_query($con,$basic_accessories);


$decorative_accessories="DELETE  FROM decorative_accessories  WHERE order_id='$order_id'";
$sql4=mysqli_query($con,$decorative_accessories);

$finishing_accessories="DELETE  FROM finishing_accessories  WHERE order_id='$order_id'";
$sql5=mysqli_query($con,$finishing_accessories);


if ($sql1==true && $sql2=true && $sql3=true && $sql4==true && $sql5==true) {
	
   header('location: view_all_preOrder.php');
    }
    else{
    	    echo "Error: " . $sql1 . "<br>" . $con->error;
    }
?>