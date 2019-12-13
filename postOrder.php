<?php
include("merchandising.php");
include("dbcon.php");
?>
<?php

session_start();
if(!isset($_SESSION['uname']))
{
  header('location:Log_in.php');
}
         
?>


<b><h2 style="text-align: center">Post Order</h2></b>

<div class="row">
                      
                        <div class="col-md-10">
                        <form  action="postOrder.php" method="POST" enctype="multipart/form-data">
                                <!--oder id-->
                                <div class="form-group ">
                                    <label for="Orderid" class="col-3 control-label"><b>OrderID:</b></label>
                                    <div class="col-9">
                                        <input id="orderid" class="form-control" name="orderid" placeholder="Give an Order id" required="required" autocomplete="off">
                                </div>
                                </div>
                                <!-- submit-->
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <input id="submit_btn" type="submit" name="order_submit" class="col-md-3 btn btn-success" value="Submit">
                                </div>
                        
                            </form> 
                        </div>  

                        

        </div>
        <hr>



     <?php
     $row = [];
     if(isset($_POST['order_submit']))
     {
      //  session_start();
      $orderid=$_POST['orderid'];
      $show="SELECT styleentry.order_id as OID, styleentry.*,fabrication.*,print_embroidery.*,basic_accessories.*,decorative_accessories.*,finishing_accessories.*,production.*,cost_calculation.* FROM styleentry left outer JOIN fabrication ON styleentry.order_id=fabrication.order_id left outer JOIN print_embroidery ON styleentry.order_id=print_embroidery.order_id left outer JOIN basic_accessories ON styleentry.order_id=basic_accessories.order_id left outer JOIN decorative_accessories ON styleentry.order_id=decorative_accessories.order_id left outer JOIN finishing_accessories ON styleentry.order_id=finishing_accessories.order_id left outer JOIN production ON styleentry.order_id=production.order_id left outer JOIN cost_calculation ON styleentry.order_id=cost_calculation.order_id  where styleentry.order_id='$orderid'";

      $result=mysqli_query($con,$show) or die( mysqli_error($con));
      $row=mysqli_fetch_assoc($result);
     }
    ?>

<!--Its view part and values are come from styleentry-->
<div class="form-row">
<div class="form-group col-md-4"></div>
   <div class="form-group col-md-4">
      <label for="styleModel"><b>Style Model: </b><img src="./images/<?php echo $row['style_model']?? '';?>" alt="<?php echo $row['style_model']?? '';?>"></label>
    </div>
    </div>
<div class="form-row">
<div class="form-group col-md-4">
      <label for="orderId"><b>Order ID:</B>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['OID'] ?? ''?? '';?></label>
    </div>
    <div class="form-group col-md-4">
      <label for="buyerName"><b>Buyer Name:</b> &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['buyer_name']?? '';?></label>
    </div>
    <div class="form-group col-md-4">
      <label for="deliveryDate"><b>Delivery Date:</b>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['delivery_date']?? '';?></label>
    </div>
</div>

  <div class="form-row">
  <div class="form-group col-md-4">
      <label for="styleNo"><b>Style No:</b>&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $row['style_no']?? '';?></label>
    </div>
    <div class="form-group col-md-4">
                <label for="styleName"><b>Style Name:</b>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['style_name']?? '';?></label>
            </div>
            <div class="form-group col-md-4">
            <label for="approximateQuantity"><b>Approximate Quantity:</b>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['approximate_quantity']?? '';?></b></label>
            </div>

  </div>
  <div class="form-row">
            <div class="form-group col-md-4">
            <label for="itemDescription"><b>Description:</b>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['description']?? '';?></label>
            </div>
            
  </div>
  <div class="form-row">
            <div class="form-group col-md-4">
            <label for="makingCost"><b>Making cost total:</b>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['total_making_cost']?? '';?></label>
            </div>
            <div class="form-group col-md-4">
            <label for="profit"><b>Total with profit</b>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['total_cost_with_profit']?? '';?></label>
            </div>
  </div>
<hr>
<form action="postOrderCode.php" method="post">
<input type="text" class="form-control" id="orderid" name="orderid" hidden="" value="<?php echo $row['OID'];?>">
<div class="form-row">
            <div class="form-group col-md-4">
            <label for="lcNo"><b>LC NO:</b></label>
            <input type="text" class="form-control" id="lcNo" name="lcNo">
            </div>
            <div class="form-group col-md-4">
            <label for="bankName"><b>Bank Name:</b></label>
            <input type="text" class="form-control" id="bankName" name="bankName">
            </div>
  </div>
  <div class="form-row">
                <div class="col-md-1"></div>
                <input id="save_btn" type="submit" class="col-md-2 btn btn-success" value="Save Post order">
            </div>
                
                </form>

  <Br>
<?php
include("merchandising2.php");
?>
