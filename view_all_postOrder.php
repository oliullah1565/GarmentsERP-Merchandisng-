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
                <form class="form-inline" action=" " method="POST">
                  <input class="form-control mr-sm-2" type="text" name="orderid" placeholder="Search By order ID" aria-label="Search" >
                  <input type="submit" class="btn btn-outline-success " type="submit" name="search_submit" value="Search"/>
                </form>
              </nav>
            </div>
              <center>
                        <h5>All Post Order</h5>
                      
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
                              <th scope="col">Option</th>
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
                              <td><div class='btn-group'><button class='btn btn-secondary btn-success '><a href='viewPostorder.php?id=".$row['OID']."'>Report</a></button><button class='btn btn-warning btn-secondary'><a href='updatePostorder.php?id=".$row['OID']."'>Edit</a></button><button class='btn btn-danger btn-secondary'><a href='deletePostorder.php?id=".$row['OID']."'>Delete</a></button></div></td>
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
</body>
<?php
include("merchandising2.php");
?>