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

<div>
<b><h1 style="text-align: center;color:#61e615; ">GarmentsERP</h1></b>
<hr>
<b><h2 style="text-align: center">Style Entry</h2></b><br><br>
<hr>
<?php
     $row = [];
     
      $orderid=$_GET['id'];
      $show="SELECT * from styleentry where order_id='$orderid'"; 

      $result=mysqli_query($con,$show);
      $row=mysqli_fetch_array($result);
    ?>
    <div class="form-row">
    <div class="form-group col-md-4"></div>
    <div class="form-group col-md-4">
      <label for="styleModel"><b>Style Model:</b>
      <img src="./images/<?php echo $row['style_model']?? '';?>" alt="<?php echo $row['style_model']?? '';?>">
      </label>
    </div>
    </div>
    <hr>

<div class="form-row">
    <div class="form-group col-md-4">
      <label for="orderId"><b>Order ID:&nbsp;&nbsp;&nbsp;</b><?php echo $row['order_id'] ?? ''?? '';?></label>
    </div>
    <div class="form-group col-md-4">
      <label for="buyerName"><b>Buyer Name:&nbsp;&nbsp;&nbsp;</b><?php echo $row['buyer_name']?? '';?></label>
    </div>
    <div class="form-group col-md-4">
      <label for="deliveryDate"><b>Delivery Date:&nbsp;&nbsp;&nbsp;</b><?php echo $row['delivery_date']?? '';?></label>
    </div>

</div>

  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="styleNo"><b>Style No:&nbsp;&nbsp;&nbsp;</b><?php echo $row['style_no']?? '';?></label>
    </div>
    <div class="form-group col-md-4">
                <label for="styleName"><b>Style Name:&nbsp;&nbsp;&nbsp;</b><?php echo $row['style_name']?? '';?></label>
            </div>
   
  </div>
  <div class="form-row">
            
            <div class="form-group col-md-4">
            <label for="itemDescription"><b>Description:&nbsp;&nbsp;&nbsp;</b><?php echo $row['description']?? '';?></label>
            </div>
            <div class="form-group col-md-4">
            <label for="approximateQuantity"><b>Approximate Quantity:&nbsp;&nbsp;&nbsp;</b><?php echo $row['approximate_quantity']?? '';?></label>
            </div>
  </div>
   <!--size details-->
  <h4 style="text-align:left">Size-Breakdown</h4>
  <div class="form-row">
  
  <table class="table table-bordered col-6">
                    <thead class="thead-dark"> 
                    <tr>
                        <th>Size Name</th>
                        <th>Qunatity</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>XSS</td>
                        <td><?php echo $row['xss']?? '';?></td>
                        </tr>
                        <tr>
                        <td>XS</td>
                        <td><?php echo $row['xs']?? '';?></td>
                        </tr>
                        <tr>
                        <td>S</td>
                        <td><?php echo $row['s']?? '';?></td>
                        </tr>
                        <tr>
                        <td>M</td>
                        <td><?php echo $row['m']?? '';?></td>
                        </tr>
                        <tr>
                        <td>L</td>
                        <td><?php echo $row['l']?? '';?></td>
                        </tr>
                        <tr>
                        <td>XL</td>
                        <td><?php echo $row['xl']?? '';?></td>
                        </tr>
                        <tr>
                        <td>XLL</td>
                        <td><?php echo $row['xll']?? '';?></td>
                        </tr>
                    
                    </tbody>
                </table>
                </div>
                <hr>

</div>
<button class="btn-info" onclick="myFunction()">Print this page</button>

<script>
function myFunction() {
  window.print();
  
}
</script>

<?php
include("merchandising2.php");
?>