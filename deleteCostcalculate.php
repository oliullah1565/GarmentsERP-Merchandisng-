<?php
include("dbcon.php");
session_start();
if (!isset($_SESSION['uname'])) {
    echo 'signup first';
    header("Location:Log_in.php");
    exit;
}

$order_id=$_GET['id'];



$cost_calculation="DELETE  FROM cost_calculation  WHERE order_id='$order_id'";
$sql1=mysqli_query($con,$cost_calculation);

if ($sql1==true) {
	
   header('location: view_all_costCalculation.php');
    }
    else{
    	    echo "Error: " . $sql1 . "<br>" . $con->error;
    }
?>