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

            
           
            <!--main content-->
            <b><h2 style="text-align: center">Pre-Order For Production</h2></b>
           
            <hr>
        <!--code here-->


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
      <label for="orderId"><b>Order ID:&nbsp;&nbsp;&nbsp;</b> <?php echo $row['OID'] ;?></label>
    </div>
    <div class="form-group col-md-4">
      <label for="buyerName"><b>Buyer Name:&nbsp;&nbsp;&nbsp;</b><?php echo $row['buyer_name'];?></label>
    </div>
    <div class="form-group col-md-4">
      <label for="deliveryDate"><b>Delivery Date:</b><?php echo $row['delivery_date'];?></label>
    </div>
    </div>

  <div class="form-row">
  <div class="form-group col-md-4">
      <label for="styleNo"><b>Style No:&nbsp;&nbsp;&nbsp; </b><?php echo $row['style_no'];?></label>
    </div>
    <div class="form-group col-md-4">
                <label for="styleName"><b>Style Name:&nbsp;&nbsp;&nbsp;</b> <?php echo $row['style_name'];?></label>
            </div>

            <div class="form-group col-md-4">
            <label for="approximateQuantity"><b>Approximate Quantity:&nbsp;&nbsp;&nbsp;</b><?php echo $row['approximate_quantity'];?></label>
            </div>

  </div>
  <div class="form-row">
            <div class="form-group col-md-6">
            <label for="itemDescription"><b>Description:&nbsp;&nbsp;&nbsp;</b><?php echo $row['description'];?></label>
            </div>
            <div class="form-group col-md-4">
              <label for="entryDate"><b>Entry Date:&nbsp;&nbsp;&nbsp;</b>  <?php echo $row['entry_date'];?></label>
           </div>
  </div>

  <div class="form-row">
            <div class="form-group col-md-3">
            <label for="printNumber"><b>No. of Print:&nbsp;&nbsp;&nbsp;</b> <?php echo $row['p_number'];?></label>
            </div>
            <div class="form-group col-md-3">
            <label for="printTotalprice"><b>Print Total Price:&nbsp;&nbsp;&nbsp;</b> <?php echo $row['p_totalprice'];?></label>
            </div>
            <div class="form-group col-md-3">
            <label for="embrodaryNumber"><b>No. of Embrodary:&nbsp;&nbsp;&nbsp;</b><?php echo $row['em_number'];?></label>
            </div>
            <div class="form-group col-md-3">
            <label for="embrodaryTotalprice"><b>Embrodary Total Price:&nbsp;&nbsp;&nbsp;</b><?php echo $row['em_totalprice'];?></label>
            </div>
  </div>
  <hr>

  <!-- Fabrication-->
  <h4 style="text-align:center">Fabrication</h4>
  <div class="form-row">
  
  <table class="table table-bordered col-10">
                    <thead class="thead-dark">
                    <tr>
                        <th>Fabric Name</th>
                        <th>Comsumption</th>
                        <th>Unit</th>
                        <th>Price</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><?php echo $row['fabname1'];?></td>
                        <td><?php echo $row['fabcomsumtion1'];?></td>
                        <td><?php echo $row['fabunit1'];?></td>
                        <td><?php echo $row['fabprice1'];?></td>
                        </tr>
                        <tr>
                        <td><?php echo $row['fabname2'];?></td>
                        <td><?php echo $row['fabcomsumtion2'];?></td>
                        <td><?php echo $row['fabunit2'];?></td>
                        <td><?php echo $row['fabprice2'];?></td>
                        </tr>
                        <tr>
                        <td><?php echo $row['fabname3'];?></td>
                        <td><?php echo $row['fabcomsumtion3'];?></td>
                        <td><?php echo $row['fabunit3'];?></td>
                        <td><?php echo $row['fabprice2'];?></td>
                        </tr>
                                                                        
                    
                    </tbody>
                </table>
                </div>

 <h4 style="text-align:center">Basic Accessories</h4>
  <div class="form-row">
  
  <table class="table table-bordered col-10">
                    <thead class="thead-dark">
                    <tr>
                        <th>Name</th>
                        <th>Comsumption</th>
                        <th>Price</th>
                        <th>Supplier</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><?php echo $row['bname1'];?></td>
                        <td><?php echo $row['bcomsumption1'];?></td>
                        <td><?php echo $row['bprice1'];?></td>
                        <td><?php echo $row['bsupname1'];?></td>
                        </tr>
                        <tr>
                        <td><?php echo $row['bname2'];?></td>
                        <td><?php echo $row['bcomsumption2'];?></td>
                        <td><?php echo $row['bprice2'];?></td>
                        <td><?php echo $row['bsupname2'];?></td>
                        </tr>
                        <tr>
                        <tr>
                        <td><?php echo $row['bname3'];?></td>
                        <td><?php echo $row['bcomsumption3'];?></td>
                        <td><?php echo $row['bprice3'];?></td>
                        <td><?php echo $row['bsupname3'];?></td>
                        </tr>
                        <tr>
                        <tr>
                        <td><?php echo $row['bname4'];?></td>
                        <td><?php echo $row['bcomsumption4'];?></td>
                        <td><?php echo $row['bprice4'];?></td>
                        <td><?php echo $row['bsupname4'];?></td>
                        </tr>
                        <tr>
                        <tr>
                        <td><?php echo $row['bname5'];?></td>
                        <td><?php echo $row['bcomsumption5'];?></td>
                        <td><?php echo $row['bprice5'];?></td>
                        <td><?php echo $row['bsupname5'];?></td>
                        </tr>
                        <tr>
                        <tr>
                        <td><?php echo $row['bname6'];?></td>
                        <td><?php echo $row['bcomsumption6'];?></td>
                        <td><?php echo $row['bprice6'];?></td>
                        <td><?php echo $row['bsupname6'];?></td>
                        </tr>
                        <tr>
                        <tr>
                        <td><?php echo $row['bname7'];?></td>
                        <td><?php echo $row['bcomsumption7'];?></td>
                        <td><?php echo $row['bprice7'];?></td>
                        <td><?php echo $row['bsupname7'];?></td>
                        </tr>
                        <tr>
                        <tr>
                        <td><?php echo $row['bname8'];?></td>
                        <td><?php echo $row['bcomsumption8'];?></td>
                        <td><?php echo $row['bprice8'];?></td>
                        <td><?php echo $row['bsupname8'];?></td>
                        </tr>
                        <tr>                                       
                    
                    </tbody>
                </table>
                </div>

                <h4 style="text-align:center">Decorative Accessories</h4>
  <div class="form-row">
  
  <table class="table table-bordered col-10">
                    <thead class="thead-dark">
                    <tr>
                        <th>Name</th>
                        <th>Comsumption</th>
                        <th>Price</th>
                        <th>Supplier</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><?php echo $row['dname1'];?></td>
                        <td><?php echo $row['dcomsumption1'];?></td>
                        <td><?php echo $row['dprice1'];?></td>
                        <td><?php echo $row['dsupname1'];?></td>
                        </tr>
                        <tr>
                        <td><?php echo $row['dname2'];?></td>
                        <td><?php echo $row['dcomsumption2'];?></td>
                        <td><?php echo $row['dprice2'];?></td>
                        <td><?php echo $row['dsupname2'];?></td>
                        </tr>
                        <tr>
                        <tr>
                        <td><?php echo $row['dname3'];?></td>
                        <td><?php echo $row['dcomsumption3'];?></td>
                        <td><?php echo $row['dprice3'];?></td>
                        <td><?php echo $row['dsupname3'];?></td>
                        </tr>
                        <tr>
                        <tr>
                        <td><?php echo $row['dname4'];?></td>
                        <td><?php echo $row['dcomsumption4'];?></td>
                        <td><?php echo $row['dprice4'];?></td>
                        <td><?php echo $row['dsupname4'];?></td>
                        </tr>
                        <tr>
                        <tr>
                        <td><?php echo $row['dname5'];?></td>
                        <td><?php echo $row['dcomsumption5'];?></td>
                        <td><?php echo $row['dprice5'];?></td>
                        <td><?php echo $row['dsupname5'];?></td>
                        </tr>
                        <tr>
                        <tr>
                        <td><?php echo $row['dname6'];?></td>
                        <td><?php echo $row['dcomsumption6'];?></td>
                        <td><?php echo $row['dprice6'];?></td>
                        <td><?php echo $row['dsupname6'];?></td>
                        </tr>
                        <tr>
                        <tr>
                        <td><?php echo $row['dname7'];?></td>
                        <td><?php echo $row['dcomsumption7'];?></td>
                        <td><?php echo $row['dprice7'];?></td>
                        <td><?php echo $row['dsupname7'];?></td>
                        </tr>
                        <tr>
                        <tr>
                        <td><?php echo $row['dname8'];?></td>
                        <td><?php echo $row['dcomsumption8'];?></td>
                        <td><?php echo $row['dprice8'];?></td>
                        <td><?php echo $row['dsupname8'];?></td>
                        </tr>
                        <tr>                                           
                    
                    </tbody>
                </table>
                </div>

                <h4 style="text-align:center">Finishing Accessories</h4>
  <div class="form-row">
  
  <table class="table table-bordered col-10">
                    <thead class="thead-dark">
                    <tr>
                        <th>Name</th>
                        <th>Comsumption</th>
                        <th>Price</th>
                        <th>Supplier</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><?php echo $row['fname1'];?></td>
                        <td><?php echo $row['fcomsumption1'];?></td>
                        <td><?php echo $row['fprice1'];?></td>
                        <td><?php echo $row['fsupname1'];?></td>
                        </tr>
                        <tr>
                        <td><?php echo $row['fname2'];?></td>
                        <td><?php echo $row['fcomsumption2'];?></td>
                        <td><?php echo $row['fprice2'];?></td>
                        <td><?php echo $row['fsupname2'];?></td>
                        </tr>
                        <tr>
                        <tr>
                        <td><?php echo $row['fname3'];?></td>
                        <td><?php echo $row['fcomsumption3'];?></td>
                        <td><?php echo $row['fprice3'];?></td>
                        <td><?php echo $row['fsupname3'];?></td>
                        </tr>
                        <tr>
                        <tr>
                        <td><?php echo $row['fname4'];?></td>
                        <td><?php echo $row['fcomsumption4'];?></td>
                        <td><?php echo $row['fprice4'];?></td>
                        <td><?php echo $row['fsupname4'];?></td>
                        </tr>
                        <tr>
                        <tr>
                        <td><?php echo $row['fname5'];?></td>
                        <td><?php echo $row['fcomsumption5'];?></td>
                        <td><?php echo $row['fprice5'];?></td>
                        <td><?php echo $row['fsupname5'];?></td>
                        </tr>
                        <tr>
                        <tr>
                        <td><?php echo $row['fname6'];?></td>
                        <td><?php echo $row['fcomsumption6'];?></td>
                        <td><?php echo $row['fprice6'];?></td>
                        <td><?php echo $row['fsupname6'];?></td>
                        </tr>
                        <tr>
                        <tr>
                        <td><?php echo $row['fname7'];?></td>
                        <td><?php echo $row['fcomsumption7'];?></td>
                        <td><?php echo $row['fprice7'];?></td>
                        <td><?php echo $row['fsupname7'];?></td>
                        </tr>
                        <tr>
                        <tr>
                        <td><?php echo $row['fname8'];?></td>
                        <td><?php echo $row['fcomsumption8'];?></td>
                        <td><?php echo $row['fprice8'];?></td>
                        <td><?php echo $row['fsupname8'];?></td>
                        </tr>
                        <tr>                                           
                    
                    </tbody>
                </table>
                </div>
             <hr>
                <form action="updatePreorderTwoCode.php" method="post">
                <input type="text" class="form-control" id="orderid" name="orderid"  value="<?php echo $row['OID'];?>">
                <input type="text" class="form-control" id="fabcomsumtion1" name="fabcomsumtion1" hidden="" value="<?php echo $row['fabcomsumtion1'];?>">
                <input type="text" class="form-control" id="fabcomsumtion2" name="fabcomsumtion2" hidden="" value="<?php echo $row['fabcomsumtion2'];?>">
                
                <input type="text" class="form-control" id="fabcomsumtion3" name="fabcomsumtion3" hidden="" value="<?php echo $row['fabcomsumtion3'];?>">
                <div class="form-row">
                
                    <div class="form-group col-md-4 ">
                    <label for="totalWaste" active><b>Total Waste/%:</b></label>
                    <input type="text" class="form-control" id="totalWaste" name="totalWaste" value="<?php echo $row['total_waste'];?>" required>
                  </div>
                    <div class="form-group col-md-4 ">
                    <label for="machineNo" active><b>No Of Machine:</b></label>
                    <input type="text" class="form-control" id="machineNo" name="machineNo"value="<?php echo $row['no_of_machine'];?>" required>
                  </div>
                  <div class="form-group col-md-4 ">
                    <label for="perHourproduction" active><b>Production Per Hour/PCS:</b></label>
                    <input type="text" class="form-control" id="perHourproduction" name="perHourproduction"value="<?php echo $row['production_per_hr'];?>" required>
                  </div>
                 </div>
                 <div class="form-row">
                 <div class="form-group col-md-6 ">
                    <label for="working_day" active><b>Working day/month:</b></label>
                    <input type="text" class="form-control" id="working_day" name="working_day"value="<?php echo $row['working_day'];?>" required>
                  </div>
                    <div class="form-group col-md-6 ">
                    <label for="required_machine" active><b>Total number of Machine required to complete an item:</b></label>
                    <input type="text" class="form-control" id="required_machine" name="required_machine" value="<?php echo $row['required_machine'];?>" required>
                  </div>
                 </div>

                 <div class="form-row">
                <div class="col-md-4"></div>
                <input id="save_btn" type="submit" class="col-md-2 btn btn-success" value=" Update Production order">
            </div>
                
                </form>





<?php 
    include("merchandising2.php");
    }      
?>