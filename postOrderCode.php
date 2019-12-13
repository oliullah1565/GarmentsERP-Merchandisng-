<?php
include("dbcon.php");
session_start();
if (!isset($_SESSION['uname'])) {
    echo 'signup first';
    header("Location:Log_in.php");
    exit;
}


$order_id=$_POST['orderid'];
$lcNo=$_POST['lcNo'];
$bankName=$_POST['bankName'];



$postorder="INSERT INTO post_order(order_id,Lc_no,Bank_name) VALUES ('$order_id','$lcNo','$bankName')";
$sql1=mysqli_query($con,$postorder);

if ($sql1==true) {
	
   header('location: view_all_postOrder.php');
    }
    else{
    	    echo "Error: " . $sql1 . "<br>" . $con->error;
    }
?>
