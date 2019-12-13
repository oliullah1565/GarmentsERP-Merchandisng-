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
if($_GET['id']) {
    $orderid = $_GET['id'];
      
    $show="SELECT styleentry.order_id as OID, styleentry.*,fabrication.*,print_embroidery.*,basic_accessories.*,decorative_accessories.*,finishing_accessories.*,production.*,cost_calculation.*,post_order.* FROM styleentry left outer JOIN fabrication ON styleentry.order_id=fabrication.order_id left outer JOIN print_embroidery ON styleentry.order_id=print_embroidery.order_id left outer JOIN basic_accessories ON styleentry.order_id=basic_accessories.order_id left outer JOIN decorative_accessories ON styleentry.order_id=decorative_accessories.order_id left outer JOIN finishing_accessories ON styleentry.order_id=finishing_accessories.order_id left outer JOIN production ON styleentry.order_id=production.order_id left outer JOIN cost_calculation ON styleentry.order_id=cost_calculation.order_id left outer JOIN post_order ON styleentry.order_id=post_order.order_id  where styleentry.order_id='$orderid'";
  
      $result = mysqli_query($con,$show);
   
      $row  = mysqli_fetch_assoc($result);
?>


<b><h2 style="text-align: center">Post Order</h2></b>
<hr>

<!--Its view part and values are come from styleentry-->
<div class="form-row">
<div class="form-group col-md-4"></div>
   <div class="form-group col-md-4">
      <label for="styleModel"><b>Style Model: </b><img src="./images/<?php echo $row['style_model']?? '';?>" alt="<?php echo $row['style_model']?? '';?>"></label>
    </div>
    </div>
<div class="form-row">
<div class="form-group col-md-4">
      <label for="orderId"><b>Order ID:</B><?php echo $row['OID'] ?? ''?? '';?></label>
    </div>
    <div class="form-group col-md-4">
      <label for="buyerName"><b>Buyer Name:</b> <?php echo $row['buyer_name']?? '';?></label>
    </div>
    <div class="form-group col-md-4">
      <label for="deliveryDate"><b>Delivery Date:</b></b><?php echo $row['delivery_date']?? '';?></label>
    </div>
</div>

  <div class="form-row">
  <div class="form-group col-md-4">
      <label for="styleNo"><b>Style No:</b> <?php echo $row['style_no']?? '';?></label>
    </div>
    <div class="form-group col-md-4">
                <label for="styleName"><b>Style Name:</b><?php echo $row['style_name']?? '';?></label>
            </div>
            <div class="form-group col-md-4">
            <label for="approximateQuantity"><b>Approximate Quantity:</b><?php echo $row['approximate_quantity']?? '';?></b></label>
            </div>

  </div>
  <div class="form-row">
            <div class="form-group col-md-4">
            <label for="itemDescription"><b>Description:</b><?php echo $row['description']?? '';?></label>
            </div>
            
  </div>
  <div class="form-row">
            <div class="form-group col-md-4">
            <label for="makingCost"><b>Making cost total:</b><?php echo $row['total_making_cost']?? '';?></label>
            </div>
            <div class="form-group col-md-4">
            <label for="profit"><b>Total with profit</b><?php echo $row['total_cost_with_profit']?? '';?></label>
            </div>
  </div>
<hr>
<form action="updatePostorderCode.php" method="post">
<input type="text" class="form-control" id="orderid" name="orderid" hidden="" value="<?php echo $row['OID'];?>">
<div class="form-row">
            <div class="form-group col-md-4">
            <label for="lcNo"><b>LC NO:</b></label>
            <input type="text" class="form-control" id="lcNo" name="lcNo" value="<?php echo $row['Lc_no'];?>">
            </div>
            <div class="form-group col-md-4">
            <label for="bankName"><b>Bank Name:</b></label>
            <input type="text" class="form-control" id="bankName" name="bankName" value="<?php echo $row['Bank_name'];?>">
            </div>
  </div>
  <div class="form-row">
                <div class="col-md-1"></div>
                <input id="save_btn" type="submit" class="col-md-2 btn btn-success" value="Update Post order">
            </div>
                
                </form>

  <Br>
<?php
include("merchandising2.php");
}
?>
