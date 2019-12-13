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


<b><h2 style="text-align: center">Pre-Order</h2></b>
<hr>

<!--Its view part and values are come from styleentry-->
<div class="form-row">
    <div class="form-group col-md-4"></div>
    <div class="form-group col-md-4">
      <label for="styleModel"><b>Style Model:</b>
      <img src="./images/<?php echo $row['style_model'];?>" alt="<?php echo $row['style_model'];?>">
      </label>
    </div>
    </div>
    <hr>

<div class="form-row">
<div class="form-group col-md-4">
      <label for="orderId"><b>Order ID:&nbsp;&nbsp;&nbsp;</b>   <?php echo $row['OID'];?></label>
    </div>
    <div class="form-group col-md-4">
      <label for="buyerName"><b>Buyer Name:&nbsp;&nbsp;&nbsp;</b>  <?php echo $row['buyer_name'];?></label>
    </div>
    <div class="form-group col-md-4">
      <label for="deliveryDate"><b>Delivery Date:&nbsp;&nbsp;&nbsp;</b>  <?php echo $row['delivery_date'];?></label>
    </div>
</div>

  <div class="form-row">
  <div class="form-group col-md-4">
      <label for="styleNo"><b>Style No:&nbsp;&nbsp;&nbsp;</b>  <?php echo $row['style_no'];?></label>
    </div>
    <div class="form-group col-md-4">
                <label for="styleName"><b>Style Name:&nbsp;&nbsp;&nbsp;</b>  <?php echo $row['style_name'];?></label>
            </div>
            <div class="form-group col-md-4">
            <label for="approximateQuantity"><b>Approximate Quantity:&nbsp;&nbsp;&nbsp;</b>  <?php echo $row['approximate_quantity'];?></label>
            </div>

  </div>
  <div class="form-row">
            <div class="form-group col-md-8">
            <label for="itemDescription"><b>Description:&nbsp;&nbsp;&nbsp;</b>   <?php echo $row['description'];?></label>
            </div>
            <div class="form-group col-md-4">
              <label for="entryDate"><b>Entry Date:&nbsp;&nbsp;&nbsp;</b>  <?php echo $row['entry_date'];?></label>
           </div>
          
  </div>
<hr>
  <!--Its input part for this page--> 
  <form action="updatePreorderCode.php" method="POST">
  
  <div class="form-row">
            <input type="text" class="form-control" id="orderid" name="orderid" hidden="" value="<?php echo $row['OID'];?>">
            
            <div class="form-group col-md-3">
            <label for="printNumber"><b>No. of Print</b></label>
            <input type="number" class="form-control" id="printNumber" name="printNumber" value="<?php echo $row['p_number'];?>">
            </div>
            <div class="form-group col-md-3">
            <label for="printTotalprice"><b>Print Total Price</b></label>
            <input type="number" class="form-control" id="printTotalprice" name="printTotalprice" value="<?php echo $row['p_totalprice'];?>"> 
            </div>
            <div class="form-group col-md-3">
            <label for="embroideryNumber"><b>No. of Embroidery</b></label>
            <input type="number" class="form-control" id="embroideryNumber" name="embroideryNumber" value="<?php echo $row['em_number'];?>">
            </div>
            <div class="form-group col-md-3">
            <label for="embroideryTotalprice"><b>Embroidery Total Price</b></label>
            <input type="number" class="form-control" id="embroideryTotalprice" name="embroideryTotalprice" value="<?php echo $row['em_totalprice'];?>"> 
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
                        <td><input type="text" class="form-control" name="Fname1" value="<?php echo $row['fabname1'];?>"></td>
                        <td><input type="text" class="form-control" name="Fcomsumption1" value="<?php echo $row['fabcomsumtion1'];?>"></td>
                        <td><input type="text" class="form-control" name="Funit1" value="<?php echo $row['fabunit1'];?>"></td>
                        <td><input type="number" class="form-control" name="Fprice1" value="<?php echo $row['fabprice1'];?>"></td>
                        </tr>
                        <tr>
                        <td><input type="text" class="form-control" name="Fname2" value="<?php echo $row['fabname2'];?>"></td>
                        <td><input type="text" class="form-control" name="Fcomsumption2"value="<?php echo $row['fabcomsumtion2'];?>"></td>
                        <td><input type="text" class="form-control" name="Funit2" value="<?php echo $row['fabunit2'];?>"></td>
                        <td><input type="number" class="form-control" name="Fprice2" value="<?php echo $row['fabprice2'];?>"></td>
                        </tr>
                        <tr>
                        <td><input type="text" class="form-control" name="Fname3" value="<?php echo $row['fabname3'];?>"></td>
                        <td><input type="text" class="form-control" name="Fcomsumption3" value="<?php echo $row['fabcomsumtion3'];?>"></td>
                        <td><input type="text" class="form-control" name="Funit3" value="<?php echo $row['fabunit3'];?>"></td>
                        <td><input type="number" class="form-control" name="Fprice3" value="<?php echo $row['fabprice3'];?>"></td>
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
             <input type="text" class="form-control" name="InputBname1" placeholder="Name" value=" <?php echo $row['bname1'];?>"> 
             </div>
             <div class="form-group col-md-1">
              <input type="text" class="form-control" name="Bcomsumption1" placeholder="comsumption" value="<?php echo $row['bcomsumption1'];?>"> 
             </div>
             <div class="form-group col-md-1">
             <input type="number" class="form-control" name="Bprice1" placeholder="Price" value="<?php echo $row['bprice1'];?>">
             </div>
             <div class="form-grorp col-md-1">
               <select id="InputBsupname1" name="InputBsupname1" class="form-control" value="<?php echo $row['bsupname1'];?>">
                <option><?php echo $row['bsupname1'];?></option>
                <option>J K Company</option>
                </select>
             </div>
              <!-- For Decoritive Accessorise -->
              <div class="form-group col-md-1 bg-info ">
             <input type="text" class="form-control" name="InputDname1" placeholder="Name" value="<?php echo $row['dname1'];?>"> 
             </div>
             <div class="form-group col-md-1">
              <input type="text" class="form-control" name="Dcomsumption1" placeholder="comsumption" value="<?php echo $row['dcomsumption1'];?>"> 
             </div>
             <div class="form-group col-md-1">
             <input type="number" class="form-control" name="Dprice1" placeholder="Price" value="<?php echo $row['dprice1'];?>">
             </div>
             <div class="form-grorp col-md-1">
               <select id="InputDsupname1" name="InputDsupname1" class="form-control" value="<?php echo $row['dsupname1'];?>">
                <option><?php echo $row['dsupname1'];?></option>
                <option>J K Company</option>
                </select>
             </div>

             <!-- For Finishing Accessorise -->
             <div class="form-group col-md-1 bg-warning ">
             <input type="text" class="form-control" name="InputFiname1" placeholder="Name" value="<?php echo $row['fname1'];?>"> 
             </div>
             <div class="form-group col-md-1">
              <input type="text" class="form-control" name="Ficomsumption1" placeholder="comsumption" value="<?php echo $row['fcomsumption1'];?>"> 
             </div>
             <div class="form-group col-md-1">
             <input type="number" class="form-control" name="Fiprice1" placeholder="Price" value="<?php echo $row['fprice1'];?>">
             </div>
             <div class="form-grorp col-md-1">
               <select id="InputFIsupname1" name="InputFisupname1" class="form-control" value="<?php echo $row['fsupname1'];?>">
                <option><?php echo $row['fsupname1'];?></option>
                <option>J K Company</option>
                </select>
             </div>
            </div>

            <!-- NEW ROW START -->
            <div class="form-row">
            <!-- For Basic Accessorise -->
            <div class="form-group col-md-1 bg-success ">
             <input type="text" class="form-control" name="InputBname2" placeholder="Name" value="<?php echo $row['bname2'];?>"> 
             </div>
             <div class="form-group col-md-1">
              <input type="text" class="form-control" name="Bcomsumption2" placeholder="comsumption" value="<?php echo $row['bcomsumption2'];?>"> 
             </div>
             <div class="form-group col-md-1">
             <input type="number" class="form-control" name="Bprice2" placeholder="Price" value="<?php echo $row['bprice2'];?>">
             </div>
             <div class="form-grorp col-md-1">
               <select  name="InputBsupname2" class="form-control" value="<?php echo $row['bsupname2'];?>">
                <option><?php echo $row['bsupname2'];?></option>
                <option>J K Company</option>
                </select>
             </div>
             <!-- For Decoritive Accessorise -->
             <div class="form-group col-md-1 bg-info">
             <input type="text" class="form-control" name="InputDname2" placeholder="Name" value="<?php echo $row['dname2'];?>"> 
             </div>
             <div class="form-group col-md-1">
              <input type="text" class="form-control" name="Dcomsumption2" placeholder="comsumption" value="<?php echo $row['dcomsumption2'];?>"> 
             </div>
             <div class="form-group col-md-1">
             <input type="number" class="form-control" name="Dprice2" placeholder="Price" value="<?php echo $row['dprice2'];?>">
             </div>
             <div class="form-grorp col-md-1">
               <select  name="InputDsupname2" class="form-control" value="<?php echo $row['dsupname2'];?>">
                <option><?php echo $row['dsupname2'];?></option>
                <option>J K Company</option>
                </select>
             </div>
             <!-- For Finishing Accessorise -->
             <div class="form-group col-md-1 bg-warning ">
             <input type="text" class="form-control" name="InputFiname2" placeholder="Name" value="<?php echo $row['fname2'];?>"> 
             </div>
             <div class="form-group col-md-1">
              <input type="text" class="form-control" name="Ficomsumption2" placeholder="comsumption" value="<?php echo $row['fcomsumption2'];?>"> 
             </div>
             <div class="form-group col-md-1">
             <input type="number" class="form-control" name="Fiprice2" placeholder="Price" value="<?php echo $row['fprice2'];?>">
             </div>
             <div class="form-grorp col-md-1">
               <select  name="InputFisupname2" class="form-control" value="<?php echo $row['fsupname2'];?>">
                <option><?php echo $row['fsupname2'];?></option>
                <option>J K Company</option>
                </select>
             </div>
            </div>

              <!-- NEW ROW START -->
            <div class="form-row">
            <!-- For Basic Accessorise -->
             <div class="form-group col-md-1 bg-success ">
             <input type="text" class="form-control" name="InputBname3" placeholder="Name" value="<?php echo $row['bname3'];?>"> 
             </div>
             <div class="form-group col-md-1">
              <input type="text" class="form-control" name="Bcomsumption3" placeholder="comsumption" value="<?php echo $row['bcomsumption3'];?>"> 
             </div>
             <div class="form-group col-md-1">
             <input type="number" class="form-control" name="Bprice3" placeholder="Price" value="<?php echo $row['bprice3'];?>">
             </div>
             <div class="form-grorp col-md-1">
               <select  name="InputBsupname3" class="form-control" value="<?php echo $row['bsupname3'];?>">
                <option><?php echo $row['bsupname3'];?></option>
                <option>J K Company</option>
                </select>
             </div>
             <!-- For Decoritive Accessorise -->

             <div class="form-group col-md-1 bg-info ">
             <input type="text" class="form-control" name="InputDname3" placeholder="Name" value="<?php echo $row['dname3'];?>"> 
             </div>
             <div class="form-group col-md-1">
              <input type="text" class="form-control" name="Dcomsumption3" placeholder="comsumption" value="<?php echo $row['dcomsumption3'];?>"> 
             </div>
             <div class="form-group col-md-1">
             <input type="number" class="form-control" name="Dprice3" placeholder="Price" value="<?php echo $row['dprice3'];?>">
             </div>
             <div class="form-grorp col-md-1">
               <select  name="InputDsupname3" class="form-control" value="<?php echo $row['dsupname3'];?>"> 
                <option><?php echo $row['dsupname3'];?></option>
                <option>J K Company</option>
                </select>
             </div>
             <!-- For Finishing Accessorise -->
             <div class="form-group col-md-1 bg-warning ">
             <input type="text" class="form-control" name="InputFiname3" placeholder="Name" value="<?php echo $row['fname3'];?>"> 
             </div>
             <div class="form-group col-md-1">
              <input type="text" class="form-control" name="Ficomsumption3" placeholder="comsumption" value="<?php echo $row['fcomsumption3'];?>"> 
             </div>
             <div class="form-group col-md-1">
             <input type="number" class="form-control" name="Fiprice3" placeholder="Price" value="<?php echo $row['fprice3'];?>">
             </div>
             <div class="form-grorp col-md-1">
               <select  name="InputFisupname3" class="form-control" value="<?php echo $row['fsupname3'];?>">
                <option><?php echo $row['fsupname3'];?></option>
                <option>J K Company</option>
                </select>
             </div>
            </div>

              <!-- NEW ROW START -->
            <div class="form-row">
            <!-- For Basic Accessorise -->
            <div class="form-group col-md-1 bg-success ">
             <input type="text" class="form-control" name="InputBname4" placeholder="Name" value="<?php echo $row['bname4'];?>"> 
             </div>
             <div class="form-group col-md-1">
              <input type="text" class="form-control" name="Bcomsumption4" placeholder="comsumption" value="<?php echo $row['bcomsumption4'];?>"> 
             </div>
             <div class="form-group col-md-1">
             <input type="number" class="form-control" name="Bprice4" placeholder="Price" value="<?php echo $row['bprice4'];?>">
             </div>
             <div class="form-grorp col-md-1">
               <select  name="InputBsupname4" class="form-control" value="<?php echo $row['bsupname4'];?>">
                <option><?php echo $row['bsupname4'];?></option>
                <option>J K Company</option>
                </select>
             </div>
             <!-- For Decoritive Accessorise -->

             <div class="form-group col-md-1 bg-info ">
             <input type="text" class="form-control" name="InputDname4" placeholder="Name" value="<?php echo $row['dname4'];?>"> 
             </div>
             <div class="form-group col-md-1">
              <input type="text" class="form-control" name="Dcomsumption4" placeholder="comsumption" value="<?php echo $row['dcomsumption4'];?>"> 
             </div>
             <div class="form-group col-md-1">
             <input type="number" class="form-control" name="Dprice4" placeholder="Price" value="<?php echo $row['dprice4'];?>">
             </div>
             <div class="form-grorp col-md-1">
               <select  name="InputDsupname4" class="form-control" value="<?php echo $row['dsupname4'];?>">
                <option><?php echo $row['dsupname4'];?></option>
                <option>J K Company</option>
                </select>
             </div>
             <!-- For Finishing Accessorise -->
             <div class="form-group col-md-1 bg-warning ">
             <input type="text" class="form-control" name="InputFiname4" placeholder="Name" value="<?php echo $row['fname4'];?>"> 
             </div>
             <div class="form-group col-md-1">
              <input type="text" class="form-control" name="Ficomsumption4" placeholder="comsumption" value="<?php echo $row['fcomsumption4'];?>"> 
             </div>
             <div class="form-group col-md-1">
             <input type="number" class="form-control" name="Fiprice4" placeholder="Price" value="<?php echo $row['fprice4'];?>">
             </div>
             <div class="form-grorp col-md-1">
               <select  name="InputFisupname4" class="form-control" value="<?php echo $row['fsupname4'];?>">
                <option><?php echo $row['fsupname4'];?></option>
                <option>J K Company</option>
                </select>
             </div>
            </div>

              <!-- NEW ROW START -->
            <div class="form-row">
            <!-- For Basic Accessorise -->
            <div class="form-group col-md-1 bg-success ">
             <input type="text" class="form-control" name="InputBname5" placeholder="Name" value="<?php echo $row['bname5'];?>"> 
             </div>
             <div class="form-group col-md-1">
              <input type="text" class="form-control" name="Bcomsumption5" placeholder="comsumption" value="<?php echo $row['bcomsumption5'];?>"> 
             </div>
             <div class="form-group col-md-1">
             <input type="number" class="form-control" name="Bprice5" placeholder="Price" value="<?php echo $row['bprice5'];?>">
             </div>
             <div class="form-grorp col-md-1">
               <select  name="InputBsupname5" class="form-control" value="<?php echo $row['bsupname5'];?>">
                <option><?php echo $row['bsupname5'];?></option>
                <option>J K Company</option>
                </select>
             </div>
             <!-- For Decoritive Accessorise -->

             <div class="form-group col-md-1 bg-info ">
             <input type="text" class="form-control" name="InputDname5" placeholder="Name" value="<?php echo $row['dname5'];?>"> 
             </div>
             <div class="form-group col-md-1">
              <input type="text" class="form-control" name="Dcomsumption5" placeholder="comsumption" value="<?php echo $row['dcomsumption5'];?>"> 
             </div>
             <div class="form-group col-md-1">
             <input type="texnumbert" class="form-control" name="Dprice5" placeholder="Price" value="<?php echo $row['dprice5'];?>"> 
             </div>
             <div class="form-grorp col-md-1">
               <select  name="InputDsupname5" class="form-control" value="<?php echo $row['dsupname5'];?>">
                <option><?php echo $row['dsupname5'];?></option>
                <option>J K Company</option>
                </select>
             </div>
             <!-- For Finishing Accessorise -->
             <div class="form-group col-md-1 bg-warning ">
             <input type="text" class="form-control" name="InputFiname5" placeholder="Name" value="<?php echo $row['fname5'];?>"> 
             </div>
             <div class="form-group col-md-1">
              <input type="text" class="form-control" name="Ficomsumption5" placeholder="comsumption" value="<?php echo $row['fcomsumption5'];?>"> 
             </div>
             <div class="form-group col-md-1">
             <input type="number" class="form-control" name="Fiprice5" placeholder="Price" value="<?php echo $row['fprice5'];?>">
             </div>
             <div class="form-grorp col-md-1">
               <select  name="InputFisupname5" class="form-control" value="<?php echo $row['fsupname5'];?>">
                <option><?php echo $row['fsupname5'];?></option>
                <option>J K Company</option>
                </select>
             </div>
            </div>
            <!-- NEW ROW START -->
            <div class="form-row">
            <!-- For Basic Accessorise -->
            <div class="form-group col-md-1 bg-success ">
             <input type="text" class="form-control" name="InputBname6" placeholder="Name" value="<?php echo $row['bname6'];?>"> 
             </div>
             <div class="form-group col-md-1">
              <input type="text" class="form-control" name="Bcomsumption6" placeholder="comsumption" value="<?php echo $row['bcomsumption6'];?>"> 
             </div>
             <div class="form-group col-md-1">
             <input type="number" class="form-control" name="Bprice6" placeholder="Price" value="<?php echo $row['bprice6'];?>">
             </div>
             <div class="form-grorp col-md-1">
               <select  name="InputBsupname6" class="form-control" value="<?php echo $row['bsupname6'];?>">
                <option><?php echo $row['bsupname6'];?></option>
                <option>J K Company</option>
                </select>
             </div>
             <!-- For Decoritive Accessorise -->

             <div class="form-group col-md-1 bg-info ">
             <input type="text" class="form-control" name="InputDname6" placeholder="Name" value="<?php echo $row['dname6'];?>"> 
             </div>
             <div class="form-group col-md-1">
              <input type="text" class="form-control" name="Dcomsumption6" placeholder="comsumption" value="<?php echo $row['dcomsumption6'];?>"> 
             </div>
             <div class="form-group col-md-1">
             <input type="number" class="form-control" name="Dprice6" placeholder="Price" value="<?php echo $row['dprice6'];?>">
             </div>
             <div class="form-grorp col-md-1">
               <select  name="InputDsupname6" class="form-control" value="<?php echo $row['dsupname6'];?>">
                <option><?php echo $row['dsupname6'];?></option>
                <option>J K Company</option>
                </select>
             </div>
             <!-- For Finishing Accessorise -->
             <div class="form-group col-md-1 bg-warning ">
             <input type="text" class="form-control" name="InputFiname6" placeholder="Name" value="<?php echo $row['fname6'];?>"> 
             </div>
             <div class="form-group col-md-1">
              <input type="text" class="form-control" name="Ficomsumption6" placeholder="comsumption" value="<?php echo $row['fcomsumption6'];?>"> 
             </div>
             <div class="form-group col-md-1">
             <input type="number" class="form-control" name="Fiprice6" placeholder="Price" value="<?php echo $row['fprice6'];?>">
             </div>
             <div class="form-grorp col-md-1">
               <select  name="InputFisupname6" class="form-control" value="<?php echo $row['fsupname6'];?>">
                <option><?php echo $row['fsupname6'];?></option>
                <option>J K Company</option>
                </select>
             </div>
            </div>

              <!-- NEW ROW START -->
            <div class="form-row">
            <!-- For Basic Accessorise -->
            <div class="form-group col-md-1 bg-success ">
             <input type="text" class="form-control" name="InputBname7" placeholder="Name" value="<?php echo $row['bname7'];?>"> 
             </div>
             <div class="form-group col-md-1">
              <input type="text" class="form-control" name="Bcomsumption7" placeholder="comsumption" value="<?php echo $row['bcomsumption7'];?>"> 
             </div>
             <div class="form-group col-md-1">
             <input type="number" class="form-control" name="Bprice7" placeholder="Price" value="<?php echo $row['bprice7'];?>">
             </div>
             <div class="form-grorp col-md-1">
               <select  name="InputBsupname7" class="form-control" value="<?php echo $row['bsupname7'];?>">
                <option><?php echo $row['bsupname7'];?></option>
                <option>J K Company</option>
                </select>
             </div>
             <!-- For Decoritive Accessorise -->

             <div class="form-group col-md-1 bg-info">
             <input type="text" class="form-control" name="InputDname7" placeholder="Name" value="<?php echo $row['dname7'];?>"> 
             </div>
             <div class="form-group col-md-1">
              <input type="text" class="form-control" name="Dcomsumption7" placeholder="comsumption" value="<?php echo $row['dcomsumption7'];?>"> 
             </div>
             <div class="form-group col-md-1">
             <input type="number" class="form-control" name="Dprice7" placeholder="Price" value="<?php echo $row['dprice7'];?>">
             </div>
             <div class="form-grorp col-md-1">
               <select  name="InputDsupname7" class="form-control" value="<?php echo $row['dsupname7'];?>">
                <option><?php echo $row['dsupname7'];?></option>
                <option>J K Company</option>
                </select>
             </div>
             <!-- For Finishing Accessorise -->
             <div class="form-group col-md-1 bg-warning ">
             <input type="text" class="form-control" name="InputFiname7" placeholder="Name" value="<?php echo $row['fname7'];?>"> 
             </div>
             <div class="form-group col-md-1">
              <input type="text" class="form-control" name="Ficomsumption7" placeholder="comsumption" value="<?php echo $row['fcomsumption7'];?>"> 
             </div>
             <div class="form-group col-md-1">
             <input type="number" class="form-control" name="Fiprice7" placeholder="Price" value="<?php echo $row['fprice7'];?>">
             </div>
             <div class="form-grorp col-md-1">
               <select  name="InputFisupname7" class="form-control" value="<?php echo $row['fsupname7'];?>">
                <option><?php echo $row['fsupname7'];?></option>
                <option>J K Company</option>
                </select>
             </div>
            </div>


             <!-- NEW ROW START -->
            <div class="form-row">
            <!-- For Basic Accessorise -->
            <div class="form-group col-md-1 bg-success ">
             <input type="text" class="form-control" name="InputBname8" placeholder="Name" value="<?php echo $row['bname8'];?>"> 
             </div>
             <div class="form-group col-md-1">
              <input type="text" class="form-control" name="Bcomsumption8" placeholder="comsumption" value="<?php echo $row['bcomsumption8'];?>"> 
             </div>
             <div class="form-group col-md-1">
             <input type="number" class="form-control" name="Bprice8" placeholder="Price" value="<?php echo $row['bprice8'];?>">
             </div>
             <div class="form-grorp col-md-1">
               <select  name="InputBsupname8" class="form-control" value="<?php echo $row['bsupname8'];?>">
                <option><?php echo $row['bsupname8'];?></option>
                <option>J K Company</option>
                </select>
             </div>
             <!-- For Decoritive Accessorise -->

             <div class="form-group col-md-1 bg-info ">
             <input type="text" class="form-control" name="InputDname8" placeholder="Name" value="<?php echo $row['dname8'];?>"> 
             </div>
             <div class="form-group col-md-1">
              <input type="text" class="form-control" name="Dcomsumption8" placeholder="comsumption" value="<?php echo $row['dcomsumption8'];?>"> 
             </div>
             <div class="form-group col-md-1">
             <input type="number" class="form-control" name="Dprice8" placeholder="Price" value="<?php echo $row['dprice8'];?>">
             </div>
             <div class="form-grorp col-md-1">
               <select  name="InputDsupname8" class="form-control" value="<?php echo $row['dsupname8'];?>">
                <option><?php echo $row['dsupname8'];?></option>
                <option>J K Company</option>
                </select>
             </div>
             <!-- For Finishing Accessorise -->
             <div class="form-group col-md-1 bg-warning ">
             <input type="text" class="form-control" name="InputFiname8" placeholder="Name" value="<?php echo $row['fname8'];?>"> 
             </div>
             <div class="form-group col-md-1">
              <input type="text" class="form-control" name="Ficomsumption8" placeholder="comsumption" value="<?php echo $row['fcomsumption8'];?>"> 
             </div>
             <div class="form-group col-md-1">
             <input type="number" class="form-control" name="Fiprice8" placeholder="Price" value="<?php echo $row['fprice8'];?>">
             </div>
             <div class="form-grorp col-md-1">
               <select  name="InputFisupname8" class="form-control" value="<?php echo $row['fsupname8'];?>">
                <option><?php echo $row['fsupname8'];?></option>
                <option>J K Company</option>
                </select>
             </div>
            </div>



            </div>

      </div>


  
 
  
  <div class="form-row">
                <div class="col-md-5"></div>
                <input id="save_btn" type="submit" class="col-md-2 btn btn-success" value="Update Pre-Order">
            </div>
          
</form>










<?php

include("merchandising2.php");
}
?>