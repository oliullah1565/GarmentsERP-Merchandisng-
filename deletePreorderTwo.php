<?php
include("dbcon.php");
session_start();
if (!isset($_SESSION['uname'])) {
    echo 'signup first';
    header("Location:Log_in.php");
    exit;
}

$order_id=$_GET['id'];



$production="DELETE  FROM production  WHERE order_id='$order_id'";
$sql1=mysqli_query($con,$production);

if ($sql1==true) {
	
   header('location: view_all_preOrdertwo.php');
    }
    else{
    	    echo "Error: " . $sql1 . "<br>" . $con->error;
    }
?>