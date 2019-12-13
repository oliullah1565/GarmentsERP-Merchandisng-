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

$costcalculation="UPDATE cost_calculation SET over_dying_cost='$overdyingTotalcost',washing_cost='$washingTotalcost',machine_cost='$machineTotalcost',finishing_cost='$finishingTotalcost',fabtotal_with_waste='$fabcost_with_waste',onepcs_cost='$maincostforOnepcs',making_cost='$making_cost',profit_percentage='$profitPercentage',total_making_cost='$totalmakeingCost',total_cost_with_profit='$profit_with_cost' WHERE order_id='$order_id'";



//main query
$sql1=mysqli_query($con,$costcalculation);

if ($sql1==true) {
	
   header('location: view_all_costCalculation.php');
    }
    else{
    	    echo "Error: " . $sql1 . "<br>" . $con->error;
    }
?>
