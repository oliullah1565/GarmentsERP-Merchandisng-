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

<b><h2 style="text-align: center">Pre-Order</h2></b>

<div class="row">
                      
                        <div class="col-md-10">
                        <form action="preOrder.php" method="POST" enctype="multipart/form-data" >
                                <!--oder id-->
                                <div class="form-group ">
                                    <label for="orderid" class="col-3 control-label"><b>OrderID:</B></label>
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
        <!--code here-->
     <?php
     $row = [];
     if(isset($_POST['order_submit']))
     {
      $orderid=$_POST['orderid'];
      $show="SELECT * from styleentry where order_id='$orderid'"; 

      $result=mysqli_query($con,$show);
      $row=mysqli_fetch_array($result);
     }
    ?>

<!--Its view part and values are come from styleentry-->
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
      <label for="orderId"><b>Order ID:&nbsp;&nbsp;&nbsp;</b>   <?php echo $row['order_id'] ?? ''?? '';?></label>
    </div>
    <div class="form-group col-md-4">
      <label for="buyerName"><b>Buyer Name:&nbsp;&nbsp;&nbsp;</b>  <?php echo $row['buyer_name']?? '';?></label>
    </div>
    <div class="form-group col-md-4">
      <label for="deliveryDate"><b>Delivery Date:&nbsp;&nbsp;&nbsp;</b>  <?php echo $row['delivery_date']?? '';?></label>
    </div>
</div>

  <div class="form-row">
  <div class="form-group col-md-4">
      <label for="styleNo"><b>Style No:&nbsp;&nbsp;&nbsp;</b>  <?php echo $row['style_no']?? '';?></label>
    </div>
    <div class="form-group col-md-4">
                <label for="styleName"><b>Style Name:&nbsp;&nbsp;&nbsp;</b>  <?php echo $row['style_name']?? '';?></label>
            </div>
            <div class="form-group col-md-4">
            <label for="approximateQuantity"><b>Approximate Quantity:&nbsp;&nbsp;&nbsp;</b>  <?php echo $row['approximate_quantity']?? '';?></label>
            </div>

  </div>
  <div class="form-row">
            <div class="form-group col-md-8">
            <label for="itemDescription"><b>Description:&nbsp;&nbsp;&nbsp;</b>   <?php echo $row['description']?? '';?></label>
            </div>
            <div class="form-group col-md-4">
              <label for="entryDate"><b>Entry Date:&nbsp;&nbsp;&nbsp;</b>  <?php echo $row['entry_date']?? '';?></label>
           </div>
          
  </div>
<hr>
  <!--Its input part for this page--> 
  <form action="preOrderCode.php" method="post">
  
  <div class="form-row">
            <input type="text" class="form-control" id="orderid" name="orderid" hidden="" value="<?php echo $row['order_id'];?>">
            
            <div class="form-group col-md-3">
            <label for="printNumber"><b>No. of Print</b></label>
            <input type="number" class="form-control" id="printNumber" name="printNumber">
            </div>
            <div class="form-group col-md-3">
            <label for="printTotalprice"><b>Print Total Price</b></label>
            <input type="number" class="form-control" id="printTotalprice" name="printTotalprice">
            </div>
            <div class="form-group col-md-3">
            <label for="embroideryNumber"><b>No. of Embroidery</b></label>
            <input type="number" class="form-control" id="embroideryNumber" name="embroideryNumber">
            </div>
            <div class="form-group col-md-3">
            <label for="embroideryTotalprice"><b>Embroidery Total Price</b></label>
            <input type="number" class="form-control" id="embroideryTotalprice" name="embroideryTotalprice">
            </div>
  </div>

  <!-- Fabrication-->
  <h4 style="text-align:center">Fabrication</h4>
  <div class="form-row">
  
  <table class="table table-bordered col-10">
                    <thead>
                    <tr>
                        <th>Fabric Name</th>
                        <th>Comsumption</th>
                        <th>Unit</th>
                        <th>Price</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><input type="text" class="form-control" name="Fname1"></td>
                        <td><input type="text" class="form-control" name="Fcomsumption1"></td>
                        <td><input type="text" class="form-control" name="Funit1"></td>
                        <td><input type="number" class="form-control" name="Fprice1"></td>
                        </tr>
                        <tr>
                        <td><input type="text" class="form-control" name="Fname2"></td>
                        <td><input type="text" class="form-control" name="Fcomsumption2"></td>
                        <td><input type="text" class="form-control" name="Funit2"></td>
                        <td><input type="number" class="form-control" name="Fprice2"></td>
                        </tr>
                        <tr>
                        <td><input type="text" class="form-control" name="Fname3"></td>
                        <td><input type="text" class="form-control" name="Fcomsumption3"></td>
                        <td><input type="text" class="form-control" name="Funit3"></td>
                        <td><input type="number" class="form-control" name="Fprice3"></td>
                        </tr>
                                                                        
                    
                    </tbody>
                </table>
                </div>
                
                 <b> <h4 style="text-align:center">Accessories</h4><br></b>
               <!-- Types of Accessories --> 
          <div class="form-row">
             <div class="form-group col-md-4">
              <h5 style="text-align:center">Basic accessories</h5>
             </div>
             <div class="form-group col-md-4">
              <h5 style="text-align:center">Decorative accessories</h5>
             </div>
             <div class="form-group col-md-4">
              <h5 style="text-align:center">Finishing accessories</h5>
             </div>

          </div>

           <!-- NEW ROW START -->
          <div class="form-row">
          <!-- For Basic Accessorise -->
             <div class="form-group col-md-1 bg-success ">
             <input type="text" class="form-control" name="InputBname1" placeholder="Name"> 
             </div>
             <div class="form-group col-md-1">
              <input type="text" class="form-control" name="Bcomsumption1" placeholder="comsumption"> 
             </div>
             <div class="form-group col-md-1">
             <input type="number" class="form-control" name="Bprice1" placeholder="Price">
             </div>
             <div class="form-grorp col-md-1">
               <select id="InputBsupname1" name="InputBsupname1" class="form-control">
                <option></option>
                <option>J K Company</option>
                </select>
             </div>
              <!-- For Decoritive Accessorise -->
              <div class="form-group col-md-1 bg-info ">
             <input type="text" class="form-control" name="InputDname1" placeholder="Name"> 
             </div>
             <div class="form-group col-md-1">
              <input type="text" class="form-control" name="Dcomsumption1" placeholder="comsumption"> 
             </div>
             <div class="form-group col-md-1">
             <input type="number" class="form-control" name="Dprice1" placeholder="Price">
             </div>
             <div class="form-grorp col-md-1">
               <select id="InputDsupname1" name="InputDsupname1" class="form-control">
                <option></option>
                <option>J K Company</option>
                </select>
             </div>

             <!-- For Finishing Accessorise -->
             <div class="form-group col-md-1 bg-warning ">
             <input type="text" class="form-control" name="InputFiname1" placeholder="Name"> 
             </div>
             <div class="form-group col-md-1">
              <input type="text" class="form-control" name="Ficomsumption1" placeholder="comsumption"> 
             </div>
             <div class="form-group col-md-1">
             <input type="number" class="form-control" name="Fiprice1" placeholder="Price">
             </div>
             <div class="form-grorp col-md-1">
               <select id="InputFIsupname1" name="InputFisupname1" class="form-control">
                <option></option>
                <option>J K Company</option>
                </select>
             </div>
            </div>

            <!-- NEW ROW START -->
            <div class="form-row">
            <!-- For Basic Accessorise -->
            <div class="form-group col-md-1 bg-success ">
             <input type="text" class="form-control" name="InputBname2" placeholder="Name"> 
             </div>
             <div class="form-group col-md-1">
              <input type="text" class="form-control" name="Bcomsumption2" placeholder="comsumption"> 
             </div>
             <div class="form-group col-md-1">
             <input type="number" class="form-control" name="Bprice2" placeholder="Price">
             </div>
             <div class="form-grorp col-md-1">
               <select  name="InputBsupname2" class="form-control">
                <option></option>
                <option>J K Company</option>
                </select>
             </div>
             <!-- For Decoritive Accessorise -->
             <div class="form-group col-md-1 bg-info">
             <input type="text" class="form-control" name="InputDname2" placeholder="Name"> 
             </div>
             <div class="form-group col-md-1">
              <input type="text" class="form-control" name="Dcomsumption2" placeholder="comsumption"> 
             </div>
             <div class="form-group col-md-1">
             <input type="number" class="form-control" name="Dprice2" placeholder="Price">
             </div>
             <div class="form-grorp col-md-1">
               <select  name="InputDsupname2" class="form-control">
                <option></option>
                <option>J K Company</option>
                </select>
             </div>
             <!-- For Finishing Accessorise -->
             <div class="form-group col-md-1 bg-warning ">
             <input type="text" class="form-control" name="InputFiname2" placeholder="Name"> 
             </div>
             <div class="form-group col-md-1">
              <input type="text" class="form-control" name="Ficomsumption2" placeholder="comsumption"> 
             </div>
             <div class="form-group col-md-1">
             <input type="number" class="form-control" name="Fiprice2" placeholder="Price">
             </div>
             <div class="form-grorp col-md-1">
               <select  name="InputFisupname2" class="form-control">
                <option></option>
                <option>J K Company</option>
                </select>
             </div>
            </div>

              <!-- NEW ROW START -->
            <div class="form-row">
            <!-- For Basic Accessorise -->
             <div class="form-group col-md-1 bg-success ">
             <input type="text" class="form-control" name="InputBname3" placeholder="Name"> 
             </div>
             <div class="form-group col-md-1">
              <input type="text" class="form-control" name="Bcomsumption3" placeholder="comsumption"> 
             </div>
             <div class="form-group col-md-1">
             <input type="number" class="form-control" name="Bprice3" placeholder="Price">
             </div>
             <div class="form-grorp col-md-1">
               <select  name="InputBsupname3" class="form-control">
                <option></option>
                <option>J K Company</option>
                </select>
             </div>
             <!-- For Decoritive Accessorise -->

             <div class="form-group col-md-1 bg-info ">
             <input type="text" class="form-control" name="InputDname3" placeholder="Name"> 
             </div>
             <div class="form-group col-md-1">
              <input type="text" class="form-control" name="Dcomsumption3" placeholder="comsumption"> 
             </div>
             <div class="form-group col-md-1">
             <input type="number" class="form-control" name="Dprice3" placeholder="Price">
             </div>
             <div class="form-grorp col-md-1">
               <select  name="InputDsupname3" class="form-control">
                <option></option>
                <option>J K Company</option>
                </select>
             </div>
             <!-- For Finishing Accessorise -->
             <div class="form-group col-md-1 bg-warning ">
             <input type="text" class="form-control" name="InputFiname3" placeholder="Name"> 
             </div>
             <div class="form-group col-md-1">
              <input type="text" class="form-control" name="Ficomsumption3" placeholder="comsumption"> 
             </div>
             <div class="form-group col-md-1">
             <input type="number" class="form-control" name="Fiprice3" placeholder="Price">
             </div>
             <div class="form-grorp col-md-1">
               <select  name="InputFisupname3" class="form-control">
                <option></option>
                <option>J K Company</option>
                </select>
             </div>
            </div>

              <!-- NEW ROW START -->
            <div class="form-row">
            <!-- For Basic Accessorise -->
            <div class="form-group col-md-1 bg-success ">
             <input type="text" class="form-control" name="InputBname4" placeholder="Name"> 
             </div>
             <div class="form-group col-md-1">
              <input type="text" class="form-control" name="Bcomsumption4" placeholder="comsumption"> 
             </div>
             <div class="form-group col-md-1">
             <input type="number" class="form-control" name="Bprice4" placeholder="Price">
             </div>
             <div class="form-grorp col-md-1">
               <select  name="InputBsupname4" class="form-control">
                <option></option>
                <option>J K Company</option>
                </select>
             </div>
             <!-- For Decoritive Accessorise -->

             <div class="form-group col-md-1 bg-info ">
             <input type="text" class="form-control" name="InputDname4" placeholder="Name"> 
             </div>
             <div class="form-group col-md-1">
              <input type="text" class="form-control" name="Dcomsumption4" placeholder="comsumption"> 
             </div>
             <div class="form-group col-md-1">
             <input type="number" class="form-control" name="Dprice4" placeholder="Price">
             </div>
             <div class="form-grorp col-md-1">
               <select  name="InputDsupname4" class="form-control">
                <option></option>
                <option>J K Company</option>
                </select>
             </div>
             <!-- For Finishing Accessorise -->
             <div class="form-group col-md-1 bg-warning ">
             <input type="text" class="form-control" name="InputFiname4" placeholder="Name"> 
             </div>
             <div class="form-group col-md-1">
              <input type="text" class="form-control" name="Ficomsumption4" placeholder="comsumption"> 
             </div>
             <div class="form-group col-md-1">
             <input type="number" class="form-control" name="Fiprice4" placeholder="Price">
             </div>
             <div class="form-grorp col-md-1">
               <select  name="InputFisupname4" class="form-control">
                <option></option>
                <option>J K Company</option>
                </select>
             </div>
            </div>

              <!-- NEW ROW START -->
            <div class="form-row">
            <!-- For Basic Accessorise -->
            <div class="form-group col-md-1 bg-success ">
             <input type="text" class="form-control" name="InputBname5" placeholder="Name"> 
             </div>
             <div class="form-group col-md-1">
              <input type="text" class="form-control" name="Bcomsumption5" placeholder="comsumption"> 
             </div>
             <div class="form-group col-md-1">
             <input type="number" class="form-control" name="Bprice5" placeholder="Price">
             </div>
             <div class="form-grorp col-md-1">
               <select  name="InputBsupname5" class="form-control">
                <option></option>
                <option>J K Company</option>
                </select>
             </div>
             <!-- For Decoritive Accessorise -->

             <div class="form-group col-md-1 bg-info ">
             <input type="text" class="form-control" name="InputDname5" placeholder="Name"> 
             </div>
             <div class="form-group col-md-1">
              <input type="text" class="form-control" name="Dcomsumption5" placeholder="comsumption"> 
             </div>
             <div class="form-group col-md-1">
             <input type="texnumbert" class="form-control" name="Dprice5" placeholder="Price">
             </div>
             <div class="form-grorp col-md-1">
               <select  name="InputDsupname5" class="form-control">
                <option></option>
                <option>J K Company</option>
                </select>
             </div>
             <!-- For Finishing Accessorise -->
             <div class="form-group col-md-1 bg-warning ">
             <input type="text" class="form-control" name="InputFiname5" placeholder="Name"> 
             </div>
             <div class="form-group col-md-1">
              <input type="text" class="form-control" name="Ficomsumption5" placeholder="comsumption"> 
             </div>
             <div class="form-group col-md-1">
             <input type="number" class="form-control" name="Fiprice5" placeholder="Price">
             </div>
             <div class="form-grorp col-md-1">
               <select  name="InputFisupname5" class="form-control">
                <option></option>
                <option>J K Company</option>
                </select>
             </div>
            </div>
            <!-- NEW ROW START -->
            <div class="form-row">
            <!-- For Basic Accessorise -->
            <div class="form-group col-md-1 bg-success ">
             <input type="text" class="form-control" name="InputBname6" placeholder="Name"> 
             </div>
             <div class="form-group col-md-1">
              <input type="text" class="form-control" name="Bcomsumption6" placeholder="comsumption"> 
             </div>
             <div class="form-group col-md-1">
             <input type="number" class="form-control" name="Bprice6" placeholder="Price">
             </div>
             <div class="form-grorp col-md-1">
               <select  name="InputBsupname6" class="form-control">
                <option></option>
                <option>J K Company</option>
                </select>
             </div>
             <!-- For Decoritive Accessorise -->

             <div class="form-group col-md-1 bg-info ">
             <input type="text" class="form-control" name="InputDname6" placeholder="Name"> 
             </div>
             <div class="form-group col-md-1">
              <input type="text" class="form-control" name="Dcomsumption6" placeholder="comsumption"> 
             </div>
             <div class="form-group col-md-1">
             <input type="number" class="form-control" name="Dprice6" placeholder="Price">
             </div>
             <div class="form-grorp col-md-1">
               <select  name="InputDsupname6" class="form-control">
                <option></option>
                <option>J K Company</option>
                </select>
             </div>
             <!-- For Finishing Accessorise -->
             <div class="form-group col-md-1 bg-warning ">
             <input type="text" class="form-control" name="InputFiname6" placeholder="Name"> 
             </div>
             <div class="form-group col-md-1">
              <input type="text" class="form-control" name="Ficomsumption6" placeholder="comsumption"> 
             </div>
             <div class="form-group col-md-1">
             <input type="number" class="form-control" name="Fiprice6" placeholder="Price">
             </div>
             <div class="form-grorp col-md-1">
               <select  name="InputFisupname6" class="form-control">
                <option></option>
                <option>J K Company</option>
                </select>
             </div>
            </div>

              <!-- NEW ROW START -->
            <div class="form-row">
            <!-- For Basic Accessorise -->
            <div class="form-group col-md-1 bg-success ">
             <input type="text" class="form-control" name="InputBname7" placeholder="Name"> 
             </div>
             <div class="form-group col-md-1">
              <input type="text" class="form-control" name="Bcomsumption7" placeholder="comsumption"> 
             </div>
             <div class="form-group col-md-1">
             <input type="number" class="form-control" name="Bprice7" placeholder="Price">
             </div>
             <div class="form-grorp col-md-1">
               <select  name="InputBsupname7" class="form-control">
                <option></option>
                <option>J K Company</option>
                </select>
             </div>
             <!-- For Decoritive Accessorise -->

             <div class="form-group col-md-1 bg-info">
             <input type="text" class="form-control" name="InputDname7" placeholder="Name"> 
             </div>
             <div class="form-group col-md-1">
              <input type="text" class="form-control" name="Dcomsumption7" placeholder="comsumption"> 
             </div>
             <div class="form-group col-md-1">
             <input type="number" class="form-control" name="Dprice7" placeholder="Price">
             </div>
             <div class="form-grorp col-md-1">
               <select  name="InputDsupname7" class="form-control">
                <option></option>
                <option>J K Company</option>
                </select>
             </div>
             <!-- For Finishing Accessorise -->
             <div class="form-group col-md-1 bg-warning ">
             <input type="text" class="form-control" name="InputFiname7" placeholder="Name"> 
             </div>
             <div class="form-group col-md-1">
              <input type="text" class="form-control" name="Ficomsumption7" placeholder="comsumption"> 
             </div>
             <div class="form-group col-md-1">
             <input type="number" class="form-control" name="Fiprice7" placeholder="Price">
             </div>
             <div class="form-grorp col-md-1">
               <select  name="InputFisupname7" class="form-control">
                <option></option>
                <option>J K Company</option>
                </select>
             </div>
            </div>


             <!-- NEW ROW START -->
            <div class="form-row">
            <!-- For Basic Accessorise -->
            <div class="form-group col-md-1 bg-success ">
             <input type="text" class="form-control" name="InputBname8" placeholder="Name"> 
             </div>
             <div class="form-group col-md-1">
              <input type="text" class="form-control" name="Bcomsumption8" placeholder="comsumption"> 
             </div>
             <div class="form-group col-md-1">
             <input type="number" class="form-control" name="Bprice8" placeholder="Price">
             </div>
             <div class="form-grorp col-md-1">
               <select  name="InputBsupname8" class="form-control">
                <option></option>
                <option>J K Company</option>
                </select>
             </div>
             <!-- For Decoritive Accessorise -->

             <div class="form-group col-md-1 bg-info ">
             <input type="text" class="form-control" name="InputDname8" placeholder="Name"> 
             </div>
             <div class="form-group col-md-1">
              <input type="text" class="form-control" name="Dcomsumption8" placeholder="comsumption"> 
             </div>
             <div class="form-group col-md-1">
             <input type="number" class="form-control" name="Dprice8" placeholder="Price">
             </div>
             <div class="form-grorp col-md-1">
               <select  name="InputDsupname8" class="form-control">
                <option></option>
                <option>J K Company</option>
                </select>
             </div>
             <!-- For Finishing Accessorise -->
             <div class="form-group col-md-1 bg-warning ">
             <input type="text" class="form-control" name="InputFiname8" placeholder="Name"> 
             </div>
             <div class="form-group col-md-1">
              <input type="text" class="form-control" name="Ficomsumption8" placeholder="comsumption"> 
             </div>
             <div class="form-group col-md-1">
             <input type="number" class="form-control" name="Fiprice8" placeholder="Price">
             </div>
             <div class="form-grorp col-md-1">
               <select  name="InputFisupname8" class="form-control">
                <option></option>
                <option>J K Company</option>
                </select>
             </div>
            </div>



            </div>

      </div>


  
 
  
  <div class="form-row">
                <div class="col-md-5"></div>
                <input id="save_btn" type="submit" class="col-md-2 btn btn-success" value="Save Pre-Order">
            </div>
          
</form>










<?php
include("merchandising2.php");
?>