<?php

session_start();
if(!isset($_SESSION['uname']))
{
  header('location:Log_in.php');
}
         
?>

<?php
include("dbcon.php");
session_start();
if (!isset($_SESSION['uname'])) {
    echo 'signup first';
    header("Location:Log_in.php");
    exit;
}

$order_id=$_POST['orderid'];
$fabcomsumtion1=$_POST['fabcomsumtion1'];
$fabcomsumtion2=$_POST['fabcomsumtion2'];
$fabcomsumtion3=$_POST['fabcomsumtion3'];
$totalWaste=$_POST['totalWaste'];
$machineNo=$_POST['machineNo'];
$perHourproduction=$_POST['perHourproduction'];
$working_day=$_POST['working_day'];
$required_machine=$_POST['required_machine'];

$fabcomsumption_total=$fabcomsumtion1+$fabcomsumtion2+$fabcomsumtion3;
$fabcomsumption_total_with_waste=($fabcomsumption_total+($fabcomsumption_total*($totalWaste/100)));

$production="UPDATE  production SET total_waste='$totalWaste',no_of_machine='$machineNo',production_per_hr='$perHourproduction',working_day='$working_day',required_machine='$required_machine',fabcomsumption_total='$fabcomsumption_total',fabcomsumption_total_with_waste='$fabcomsumption_total_with_waste' WHERE order_id='$order_id'";

$sql1=mysqli_query($con,$production);

if ($sql1==true) {
	
   header('location: view_all_preOrdertwo.php');
    }
    else{
    	    echo "Error: " . $sql1 . "<br>" . $con->error;
    }
?>
