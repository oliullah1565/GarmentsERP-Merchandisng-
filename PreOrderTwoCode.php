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

$production="INSERT INTO production(order_id, total_waste,no_of_machine,production_per_hr,working_day,required_machine,fabcomsumption_total,fabcomsumption_total_with_waste) VALUES ('$order_id','$totalWaste','$machineNo','$perHourproduction','$working_day','$required_machine','$fabcomsumption_total','$fabcomsumption_total_with_waste')";
$sql1=mysqli_query($con,$production);

if ($sql1==true) {
	
   header('location: costingCalculate.php');
    }
    else{
    	    echo "Error: " . $sql1 . "<br>" . $con->error;
    }
?>
