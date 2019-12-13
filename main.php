<?php

session_start();
if(!isset($_SESSION['uname']))
{
  header('location:Log_in.php');
}
         
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Garments ERP</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="Style.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                
            
            </div>
            <ul class="list-unstyled components">
                
                <li class="active">
                    <a href="main.php">Home</a>
                </li>
                <li>
                    <a href="#merchandisingSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Merchandising</a>
                    <ul class="collapse list-unstyled" id="merchandisingSubmenu">
                        
                        <li>
                            <a href="styleEntry.php">Style Entry</a>
                        </li>
                        <li>
                            <a href="preOrder.php">Pre order</a>
                        </li>
                        <li>
                            <a href="PreOrderTwo.php">Production Order</a>
                        </li>
                        <li>
                            <a href="costingCalculate.php">Cost calculate</a>
                        </li>
                        <li>
                            <a href="postOrder.php">Post Order</a>
                        </li>
                        <li>
                            <a href="view_all_styleEntry.php">View Style Entry</a>
                        </li>
                        <li>
                            <a href="View_all_preOrder.php">View Pre Order</a>
                        </li>
                        <li>
                            <a href="View_all_preOrdertwo.php">View Production Order</a>
                        </li>
                        <li>
                            <a href="View_all_costCalculation.php">View Cost Calculation</a>
                        </li>
                        <li>
                            <a href="View_all_postOrder.php">View Post Order</a>
                        </li>
                        
                        
                    </ul>
                </li>
                
            </ul>
        </nav>
    
        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                        <span>Toggle Sidebar</span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="logout.php">Logout</a>
                            </li>
                            
                        </ul>
                    </div>
                </div>
            </nav>
            <div>
    <?php
    include("dbcon.php");
    ?>
    <body>
        <div class="wrapper">
        <div id="content">
                <div>
                <nav class="navbar navbar-light bg-light">
                    <form class="form-inline" action=" " method="POST">
                    <input class="form-control mr-sm-2" type="text" name="orderid" placeholder="Search By order ID" aria-label="Search" >
                    <input type="submit" class="btn btn-outline-success " type="submit" name="search_submit" value="Search"/>
                    </form>
                </nav>
                </div>
                <center>
                            <h5>All Order information</h5>
                        
                            <br>
                            <div class="scrollable bg-light">
                            <table class="table table-info">
                            <thead>
                                <tr>
                                <th scope="col">Order ID</th>
                                <th scope="col">Style No</th>
                                <th scope="col">Buyer Name</th>
                                <th scope="col">Quantity/PCS</th>
                                <th scope="col">Fabrication</th>
                                <th scope="col">Total Making Cost/U$</th>
                                <th scope="col">Per PCS Cost/U$</th>
                                <th scope="col">LC NO</th>
                                <th scope="col">Bank Name</th>
                                <th scope="col">Entry Date</th>
                                <th scope="col">Delivery Date</th>
                                </tr>
                            </thead>
                            <tbody>
                        
                            <?php
                                $row = [];
                                if(isset($_POST['search_submit']))
                                {
                                    $orderid=$_POST['orderid'];
                                    $show="SELECT styleentry.order_id as OID, styleentry.*,fabrication.*,print_embroidery.*,basic_accessories.*,decorative_accessories.*,finishing_accessories.*,production.*,cost_calculation.*,post_order.* FROM styleentry left outer JOIN fabrication ON styleentry.order_id=fabrication.order_id left outer JOIN print_embroidery ON styleentry.order_id=print_embroidery.order_id left outer JOIN basic_accessories ON styleentry.order_id=basic_accessories.order_id left outer JOIN decorative_accessories ON styleentry.order_id=decorative_accessories.order_id left outer JOIN finishing_accessories ON styleentry.order_id=finishing_accessories.order_id left outer JOIN production ON styleentry.order_id=production.order_id left outer JOIN cost_calculation ON styleentry.order_id=cost_calculation.order_id left outer JOIN post_order ON styleentry.order_id=post_order.order_id  where styleentry.order_id='$orderid'";

                                }else{
                                    $show="SELECT styleentry.order_id as OID, styleentry.*,fabrication.*,print_embroidery.*,basic_accessories.*,decorative_accessories.*,finishing_accessories.*,production.*,cost_calculation.*,post_order.* FROM styleentry left outer JOIN fabrication ON styleentry.order_id=fabrication.order_id left outer JOIN print_embroidery ON styleentry.order_id=print_embroidery.order_id left outer JOIN basic_accessories ON styleentry.order_id=basic_accessories.order_id left outer JOIN decorative_accessories ON styleentry.order_id=decorative_accessories.order_id left outer JOIN finishing_accessories ON styleentry.order_id=finishing_accessories.order_id left outer JOIN production ON styleentry.order_id=production.order_id left outer JOIN cost_calculation ON styleentry.order_id=cost_calculation.order_id left outer JOIN post_order ON styleentry.order_id=post_order.order_id ";


                                }
                                $result = mysqli_query($con,$show) or  die( mysqli_error($con));
                                while($row = mysqli_fetch_assoc($result)){
                                    //if($row['Lc_no']!=null && $row['Bank_name']!=null){
                                echo"
                                <tr>
                                <td>".$row['OID']."</td>
                                <td>".$row['style_no']."</td>
                                <td>".$row['buyer_name']."</td>
                                <td>".$row['approximate_quantity']."</td>
                                <td>".$row['fabname1']."</td>
                                <td>".$row['total_making_cost']."</td>
                                <td>".$row['total_making_cost']."</td>
                                <td>".$row['Lc_no']."</td>
                                <td>".$row['Bank_name']."</td>

                                <td>".$row['entry_date']."</td>
                                <td>".$row['delivery_date']."</td>
                                </tr>
                                ";//}
                                //else{
                                    //exit;
                                //}
                                
                                }

                                $con->close();
                                ?>
                                
                            </tbody>
                            </table>
                        </div>
                    </center>
            </div>     
        </div>
            </div>
            
    </div>

    
    </body>


    </div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
</body>

</html>
    