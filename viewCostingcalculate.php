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
<b><h1 style="text-align: center;color:#61e615; ">GarmentsERP</h1></b>
<hr>
<b><h2 style="text-align: center">Cost calculation</h2></b>
<hr>
<?php
     $row = [];
     
      $orderid=$_GET['id'];
      $show="SELECT styleentry.order_id as OID, styleentry.*,fabrication.*,print_embroidery.*,basic_accessories.*,decorative_accessories.*,finishing_accessories.*,production.*,cost_calculation.*,post_order.* FROM styleentry left outer JOIN fabrication ON styleentry.order_id=fabrication.order_id left outer JOIN print_embroidery ON styleentry.order_id=print_embroidery.order_id left outer JOIN basic_accessories ON styleentry.order_id=basic_accessories.order_id left outer JOIN decorative_accessories ON styleentry.order_id=decorative_accessories.order_id left outer JOIN finishing_accessories ON styleentry.order_id=finishing_accessories.order_id left outer JOIN production ON styleentry.order_id=production.order_id left outer JOIN cost_calculation ON styleentry.order_id=cost_calculation.order_id left outer JOIN post_order ON styleentry.order_id=post_order.order_id  where styleentry.order_id='$orderid'";

      $result=mysqli_query($con,$show);
      $row=mysqli_fetch_array($result);
    ?>
    <div class="form-row">
    <div class="form-group col-md-4">
      <label for="orderId"><b>Order ID:</b>&nbsp;&nbsp;&nbsp;<?php echo $row['OID'] ?? ''?? '';?></label>
    </div>
    <div class="form-group col-md-4">
      <label for="buyerName"><b>Buyer Name:</b>&nbsp;&nbsp;&nbsp;<?php echo $row['buyer_name']?? '';?></label>
    </div>
    <div class="form-group col-md-4">
      <label for="deliveryDate"><b>Entry date:</b>&nbsp;&nbsp;&nbsp;<?php echo $row['entry_date']?? '';?></label>
    </div>
    </div>

  <div class="form-row">
  <div class="form-group col-md-4">
      <label for="styleNo"><b>Style No:</b>&nbsp;&nbsp;&nbsp; <?php echo $row['style_no']?? '';?></label>
    </div>
    <div class="form-group col-md-4">
                <label for="styleName"><b>Style Name:</b>&nbsp;&nbsp;&nbsp;<?php echo $row['style_name']?? '';?></label>
            </div>

    <div class="form-group col-md-4">
      <label for="styleModel"><b>Delivery Date:</b>&nbsp;&nbsp;&nbsp;<?php echo $row['delivery_date']?? '';?></label>
    </div>

  </div>
  <div class="form-row">
            <div class="form-group col-md-8">
            <label for="itemDescription"><b>Description:</b>&nbsp;&nbsp;&nbsp;<?php echo $row['description']?? '';?></label>
            </div>
            <div class="form-group col-md-4">
            <label for="approximateQuantity"><b>Approximate Quantity:</b>&nbsp;&nbsp;&nbsp;<?php echo $row['approximate_quantity']?? '';?></label>
            </div>
  </div>
  <div class="form-row">
            <div class="form-group col-md-4">
            <label for="printTotalprice"><b>Print Total Price:</b>&nbsp;&nbsp;&nbsp; <?php echo $row['p_totalprice']?? '';?>&nbsp; U$</label>
            </div>
            <div class="form-group col-md-4">
            <label for="embrodaryTotalprice"><b>Embroidery Total Price:</b>&nbsp;&nbsp;&nbsp;<?php echo $row['em_totalprice']?? '';?>&nbsp; U$</label>
            </div>
  </div>

  <div class="form-row">
            <div class="form-group col-md-4">
            <label for="FabricTotalprice"><b>Fabric Total Price:</b>&nbsp;&nbsp;&nbsp;<?php echo $row['fabtotalprice']?? '';?>&nbsp; U$</label>
            </div>
            <div class="form-group col-md-4">
            <label for="FabricTotalprice_with_waste"><b>Fabric Total Price With Waste:</b>&nbsp;&nbsp;&nbsp;<?php echo $row['fabtotal_with_waste']?? '';?>&nbsp; U$</label>
            </div>
  </div>
  <div class="form-row">
            <div class="form-group col-md-4">
            <label for="baccessoriesTotalprice"><b>Basic Accessories Total Price:</b>&nbsp;&nbsp;&nbsp;<?php echo $row['btotalprice']?? '';?>&nbsp; U$</label>
            </div>
            <div class="form-group col-md-4">
            <label for="daccessoriesTotalprice"><b>Decorative Accessories Total Price:</b>&nbsp;&nbsp;&nbsp;<?php echo $row['dtotalprice']?? '';?>&nbsp; U$</label>
            </div>
            <div class="form-group col-md-4">
            <label for="faccessoriesTotalprice"><b>Finishing Accessories Total Price:</b>&nbsp;&nbsp;&nbsp;<?php echo $row['ftotalprice']?? '';?>&nbsp; U$</label>
            </div>
  </div>


  <hr>
  <form action="" method="post">
                <div class="form-row">
                    <div class="form-group col-md-4">
                    <label for="overdyingTotalcost" ><b>Over Dying Cost:</b>&nbsp;&nbsp;&nbsp;<?php echo $row['over_dying_cost']?? '';?>&nbsp; U$</label>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="washingTotalcost" ><b>Washing Total Cost:</b>&nbsp;&nbsp;&nbsp;<?php echo $row['washing_cost']?? '';?>&nbsp; U$</label>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="machineTotalcost" ><b>Machine Total Cost:</b>&nbsp;&nbsp;&nbsp;<?php echo $row['machine_cost']?? '';?>&nbsp; U$</label>
                  </div>
                 </div>
                 <div class="form-row">
                    <div class="form-group col-md-4">
                    <label for="finishingTotalcost" ><b>Finising Total Cost:</b>&nbsp;&nbsp;&nbsp;<?php echo $row['finishing_cost']?? '';?>&nbsp; U$</label>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="cm" ><b>Cost of Making:</b>&nbsp;&nbsp;&nbsp;<?php echo $row['making_cost']?? '';?>&nbsp; U$</label>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="profitPercentage" ><b>Profit Percentage/%:</b>&nbsp;&nbsp;&nbsp;<?php echo $row['profit_percentage']?? '';?></label>
                  </div>
                  </div>

                
                </form>
                <div class="row">
                <div class="form-group col-md-4">
                    <label for="pc"><b>Per PCS Making Cost:</b>&nbsp;&nbsp;&nbsp;<?php echo $row['onepcs_cost']?? '';?>&nbsp; U$</label>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="cm"><b>Total Making Cost:</b>&nbsp;&nbsp;&nbsp;<?php echo $row['total_making_cost']?? '';?>&nbsp; U$</label>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="total"><b>Total Cost With Profit:</b> &nbsp;&nbsp;&nbsp;<?php echo $row['total_cost_with_profit']?? '';?>&nbsp; U$</label>
                  </div>
                 
                </div>
                <hr>
                <button class="btn-info" onclick="myFunction()">Print this page</button>

                <script>
                function myFunction() {
                window.print();

                }
                </script>


            </div>

            
           

<?php
include("merchandising2.php");
?>