<?php
include("dbcon.php");
session_start();
if (!isset($_SESSION['uname'])) {
    echo 'signup first';
    header("Location:Log_in.php");
    exit;
}

$order_id=$_GET['id'];



$postorder="DELETE  FROM post_order  WHERE order_id='$order_id'";
$sql1=mysqli_query($con,$postorder);

if ($sql1==true) {
	
   header('location: view_all_postOrder.php');
    }
    else{
    	    echo "Error: " . $sql1 . "<br>" . $con->error;
    }
?>