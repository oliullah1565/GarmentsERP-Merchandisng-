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



$postorder="UPDATE post_order SET Lc_no='$lcNo',Bank_name='$bankName' WHERE order_id='$order_id'";
$sql1=mysqli_query($con,$postorder);

if ($sql1==true) {
	
   header('location: view_all_postOrder.php');
    }
    else{
    	    echo "Error: " . $sql1 . "<br>" . $con->error;
    }
?>