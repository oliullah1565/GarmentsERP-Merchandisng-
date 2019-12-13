<?php
include("merchandising.php");

session_start();
if(!isset($_SESSION['uname']))
{
  header('location:Log_in.php');
}
         
?>


<b><h2 style="text-align: center">Style Entry</h2></b>
<form action="styleEntryCode.php" method="POST" enctype="multipart/form-data">

<div class="form-row">
    <div class="form-group col-md-4">
      <label for="orderId"><b>Order ID</b></label>
      <input type="text" class="form-control" id="orderId" name="orderId">
    </div>
    <div class="form-group col-md-4">
      <label for="buyerName"><b>Buyer Name</b></label>
      <input type="text" class="form-control" id="buyerName" name="buyerName">
    </div>
    <div class="form-group col-md-4">
      <label for="deliveryDate"><b>Delivery Date</b></label>
      <input type="date" class="form-control" id="deliveryDate" name="deliveryDate">
    </div>

</div>

  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="styleNo"><b>Style No</b></label>
      <input type="text" class="form-control" id="styleNo" name="styleNo">
    </div>
    <div class="form-group col-md-4">
                <label for="styleName"><b>Style Name</b></label>
                <input type="text" class="form-control" id="styleName" name="styleName">
            </div>

    <div class="form-group col-md-4">
      <label for="image1"><b>Style Model</b></label>
      <ul class="list-group">
                        <li class="list-group-item">
                            <input type="file" name="image1" accept="image/*" >
                        </li>
                    </ul>
    </div>

   
  </div>
  <div class="form-row">
            
            <div class="form-group col-md-4">
            <label for="itemDescription"><b>Description</b></label>
            <textarea class="form-control" id="itemDescription" name="itemDescription" rows="2"></textarea>
            </div>
            <div class="form-group col-md-4">
            <label for="approximateQuantity"><b>Approximate Quantity</b></label>
            <input type="text" class="form-control" id="approximateQuantity" name="approximateQuantity">
            </div>
            <div class="form-group col-md-4">
              <label for="entryDate"><b>Entry Date</b></label>
              <input type="date" class="form-control" id="entryDate" name="entryDate">
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
                        <td><input type="text" class="form-control" name="xss"></td>
                        </tr>
                        <tr>
                        <td>XS</td>
                        <td><input type="text" class="form-control" name="xs"></td>
                        </tr>
                        <tr>
                        <td>S</td>
                        <td><input type="text" class="form-control" name="s"></td>
                        </tr>
                        <tr>
                        <td>M</td>
                        <td><input type="text" class="form-control" name="m"></td>
                        </tr>
                        <tr>
                        <td>L</td>
                        <td><input type="text" class="form-control" name="l"></td>
                        </tr>
                        <tr>
                        <td>XL</td>
                        <td><input type="text" class="form-control" name="xl"></td>
                        </tr>
                        <tr>
                        <td>XLL</td>
                        <td><input type="text" class="form-control" name="xll"></td>
                        </tr>
                    
                    </tbody>
                </table>
                </div>

             <div class="form-row">
                <div class="col-md-4"></div>
                <input id="save_btn" type="submit" class="col-md-2 btn btn-success" value="Save Style Entry">
            </div>

        </form>
        <br>

<?php
include("merchandising2.php");
?>




