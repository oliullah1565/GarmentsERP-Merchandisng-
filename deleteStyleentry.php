<?php
include("dbcon.php");
session_start();
if (!isset($_SESSION['uname'])) {
    echo 'signup first';
    header("Location:Log_in.php");
    exit;
}

$order_id=$_GET['id'];



$styleentry="DELETE  FROM styleentry  WHERE order_id='$order_id'";
$sql1=mysqli_query($con,$styleentry);

if ($sql1==true) {
	
   header('location: view_all_styleEntry.php');
    }
    else{
    	    echo "Error: " . $sql1 . "<br>" . $con->error;
    }
?>