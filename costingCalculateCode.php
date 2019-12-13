<?php
include("dbcon.php");
session_start();
if (!isset($_SESSION['uname'])) {
    echo 'signup first';
    header("Location:Log_in.php");
    exit;
}

//for style Entry main part insert

$order_id=$_POST['orderid'];
$overdyingTotalcost=$_POST['overdyingTotalcost'];
$machineTotalcost=$_POST['machineTotalcost'];
$washingTotalcost=$_POST['washingTotalcost'];
$finishingTotalcost=$_POST['finishingTotalcost'];

$maincostforOnepcs=$_POST['maincostforOnepcs'];
$making_cost=$_POST['cm'];
$profitPercentage=$_POST['profitPercentage'];
$totalmakeingCost=$_POST['totalmakeingCost'];
$profit_with_cost=$_POST['profit_with_cost'];
$fabtotal=$_POST['fabtotal'];
$totalwaste=$_POST['totalwaste'];








$fabcost_with_waste=($fabtotal+($fabtotal*($totalwaste/100)));

$costcalculation="INSERT INTO cost_calculation(order_id,over_dying_cost,washing_cost,machine_cost,finishing_cost,fabtotal_with_waste,onepcs_cost,making_cost,profit_percentage,total_making_cost,total_cost_with_profit) VALUES ('$order_id','$overdyingTotalcost','$washingTotalcost','$machineTotalcost','$finishingTotalcost','$fabcost_with_waste','$maincostforOnepcs','$making_cost','$profitPercentage','$totalmakeingCost','$profit_with_cost')";



//main query
$sql1=mysqli_query($con,$costcalculation);

if ($sql1==true) {
	
   header('location: postOrder.php');
    }
    else{
    	    echo "Error: " . $sql1 . "<br>" . $con->error;
    }
?>

