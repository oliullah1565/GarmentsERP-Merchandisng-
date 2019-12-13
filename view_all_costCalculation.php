<?php

session_start();
if(!isset($_SESSION['uname']))
{
  header('location:Log_in.php');
}
         
?>
<?php
include("merchandising.php");
include("dbcon.php");
?>
<body>
    <div class="wrapper">
       <div id="content">
            <div>
              <nav class="navbar navbar-light bg-light">
                <form class="form-inline" action="" method="POST">
                  <input class="form-control mr-sm-2" type="text" name="orderid" placeholder="Search By order ID" aria-label="Search" >
                  <input type="submit" class="btn btn-outline-success " type="submit" name="search_submit" value="Search"/>
                </form>
              </nav>
            </div>
              <center>
                        <h5>All Cost calculation Details</h5>
                      
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
                              <th scope="col">Total With Profit/U$</th>
                              <th scope="col">Entry Date</th>
                              <th scope="col">Delivery Date</th>
                              <th scope="col">Option</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php
                              $row = [];
                              if(isset($_POST['search_submit']))
                              {
                                $orderid=$_POST['orderid'];
                                $show="SELECT styleentry.order_id as OID, styleentry.*,fabrication.*,print_embroidery.*,basic_accessories.*,decorative_accessories.*,finishing_accessories.*,production.*,cost_calculation.* FROM styleentry left outer JOIN fabrication ON styleentry.order_id=fabrication.order_id left outer JOIN print_embroidery ON styleentry.order_id=print_embroidery.order_id left outer JOIN basic_accessories ON styleentry.order_id=basic_accessories.order_id left outer JOIN decorative_accessories ON styleentry.order_id=decorative_accessories.order_id left outer JOIN finishing_accessories ON styleentry.order_id=finishing_accessories.order_id left outer JOIN production ON styleentry.order_id=production.order_id left outer JOIN cost_calculation ON styleentry.order_id=cost_calculation.order_id  where styleentry.order_id='$orderid'";

                              }else{
                                $show="SELECT styleentry.order_id as OID, styleentry.*,fabrication.*,print_embroidery.*,basic_accessories.*,decorative_accessories.*,finishing_accessories.*,production.*,cost_calculation.* FROM styleentry left outer JOIN fabrication ON styleentry.order_id=fabrication.order_id left outer JOIN print_embroidery ON styleentry.order_id=print_embroidery.order_id left outer JOIN basic_accessories ON styleentry.order_id=basic_accessories.order_id left outer JOIN decorative_accessories ON styleentry.order_id=decorative_accessories.order_id left outer JOIN finishing_accessories ON styleentry.order_id=finishing_accessories.order_id left outer JOIN production ON styleentry.order_id=production.order_id left outer JOIN cost_calculation ON styleentry.order_id=cost_calculation.order_id";


                              }
                              $result = mysqli_query($con,$show) or  die( mysqli_error($con));
                              while($row = mysqli_fetch_assoc($result)){
                                //if($row['total_making_cost']!=null && $row['total_cost_with_profit']!=null){
                              echo"
                              <tr>
                              <td>".$row['OID']."</td>
                              <td>".$row['style_no']."</td>
                              <td>".$row['buyer_name']."</td>
                              <td>".$row['approximate_quantity']."</td>
                              <td>".$row['fabname1']."</td>
                              <td>".$row['total_making_cost']."</td>
                              <td>".$row['total_cost_with_profit']."</td>
                              <td>".$row['entry_date']."</td>
                              <td>".$row['delivery_date']."</td>
                              <td><div class='btn-group'><button class='btn btn-secondary btn-success '><a href='viewCostingcalculate.php?id=".$row['OID']."'>Report</a></button><button class='btn btn-warning btn-secondary'><a href='updateCostcalculate.php?id=".$row['OID']."'>Edit</a></button><button class='btn btn-danger btn-secondary'><a href='deleteCostcalculate.php?id=".$row['OID']."'>Delete</a></button></div></td>
                              </tr>
                              ";//}
                              //else{
                               // exit;
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
</body>
<?php
include("merchandising2.php");
?>