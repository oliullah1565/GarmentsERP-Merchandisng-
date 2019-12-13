<?php
include("merchandising.php");
include("dbcon.php");
?>
<b><h2 style="text-align: center">Cost calculation</h2></b>
<div class="row">
                      
                      <div class="col-md-10">
                      <form action="costingCalculate.php" method="POST" enctype="multipart/form-data" >
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
      //  session_start();
      $orderid=$_POST['orderid'];
      $show="SELECT styleentry.order_id as OID, styleentry.*,fabrication.*,print_embroidery.*,basic_accessories.*,decorative_accessories.*,finishing_accessories.*,production.* FROM styleentry left outer JOIN fabrication ON styleentry.order_id=fabrication.order_id left outer JOIN print_embroidery ON styleentry.order_id=print_embroidery.order_id left outer JOIN basic_accessories ON styleentry.order_id=basic_accessories.order_id left outer JOIN decorative_accessories ON styleentry.order_id=decorative_accessories.order_id left outer JOIN finishing_accessories ON styleentry.order_id=finishing_accessories.order_id left outer JOIN production ON styleentry.order_id=production.order_id where styleentry.order_id='$orderid'"; 
      
      $result=mysqli_query($con,$show) or die( mysqli_error($con));
      $row=mysqli_fetch_assoc($result);
     }
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
      <label for="orderId"><b>Order ID:</b> <?php echo $row['OID'] ?? ''?? '';?></label>
    </div>
    <div class="form-group col-md-4">
      <label for="buyerName"><b>Buyer Name:</b><?php echo $row['buyer_name']?? '';?></label>
    </div>
    <div class="form-group col-md-4">
      <label for="deliveryDate"><b>Delivery Date:</b><?php echo $row['delivery_date']?? '';?></label>
    </div>
    </div>

  <div class="form-row">
  <div class="form-group col-md-4">
      <label for="styleNo"><b>Style No:</b><?php echo $row['style_no']?? '';?></label>
    </div>
    <div class="form-group col-md-4">
                <label for="styleName"><b>Style Name:</b><?php echo $row['style_name']?? '';?></label>
            </div>
            <div class="form-group col-md-4">
              <label for="entryDate"><b>Entry Date:&nbsp;&nbsp;&nbsp;</b>  <?php echo $row['entry_date']?? '';?></label>
           </div>

  </div>
  <div class="form-row">
            <div class="form-group col-md-8">
            <label for="itemDescription"><b>Description:</b><?php echo $row['description']?? '';?></label>
            </div>
            <div class="form-group col-md-4">
            <label for="approximateQuantity"><b>Approximate Quantity:</b><?php echo $row['approximate_quantity']?? '';?></label>
            </div>
  </div>
  <div class="form-row">
            <div class="form-group col-md-4">
            <label for="printTotalprice"><b>Print Total Price:</b><?php echo $row['p_totalprice']?? '';?></label>
            </div>
            <div class="form-group col-md-4">
            <label for="embrodaryTotalprice"><b>Embrodary Total Price:</b><?php echo $row['em_totalprice']?? '';?></label>
            </div>
            <div class="form-group col-md-4">
            <label for="FabricTotalprice"><b>Fabric Total Price:</b><?php echo $row['fabtotalprice']?? '';?></label>
            </div>
  </div>

  <div class="form-row">
            <div class="form-group col-md-4">
            <label for="baccessoriesTotalprice"><b>Basic Accessories Total Price:</b><?php echo $row['btotalprice']?? '';?></label>
            </div>
            <div class="form-group col-md-4">
            <label for="daccessoriesTotalprice"><b>Decorative Accessories Total Price:</b><?php echo $row['dtotalprice']?? '';?></label>
            </div>
            <div class="form-group col-md-4">
            <label for="faccessoriesTotalprice"><b>Finishing Accessories Total Price:</b><?php echo $row['ftotalprice']?? '';?></label>
            </div>
  </div>
  <div class="form-row">
                
                <div class="form-group col-md-4 ">
                <label for="totalWaste" active><b>Total Waste/%:</b><?php echo $row['total_waste']?? '';?></label>
              </div>
                <div class="form-group col-md-4 ">
                <label for="machineNo" active><b>No Of Machine:</b><?php echo $row['no_of_machine']?? '';?></label>
              </div>
              <div class="form-group col-md-4 ">
                <label for="perHourproduction" active><b>Production Per Hour/PCS:</b><?php echo $row['production_per_hr']?? '';?></label>
              </div>
             </div>
             <div class="form-row">
             <div class="form-group col-md-6 ">
                <label for="working_day" active><b>Working day/month:</b><?php echo $row['working_day']?? '';?></label>
              </div>
                <div class="form-group col-md-6 ">
                <label for="required_machine" active><b>Total number of Machine required to complete an item:</b><?php echo $row['required_machine']?? '';?></label>
              </div>
             </div>
  <hr>
  <form action="costingCalculateCode.php" method="post">
  <input type="text" class="form-control" id="orderid" name="orderid" hidden="" value="<?php echo $row['OID'];?>">
  <input type="text" class="form-control" id="fabtotal" name="fabtotal" hidden="" value="<?php echo $row['fabtotalprice']?? '';?>">
  <input type="text" class="form-control" id="totalwaste" name="totalwaste" hidden="" value="<?php echo $row['total_waste']?? '';?>">

  <input type="hidden" id="TMC" name="totalmakeingCost" value=>
  <input type="hidden" id="PWC" name="profit_with_cost" value=>
  <input type="hidden" id="PMC" name="maincostforOnepcs" value=>

                <div class="form-row">
                    <div class="form-group col-md-4">
                    <label for="overdyingTotalcost" active><b>Over Dying Cost:</b></label>
                    <input type="number" class="form-control" id="overdyingTotalcost" name="overdyingTotalcost">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="washingTotalcost" active><b>Washing Total Cost:</b></label>
                    <input type="number" class="form-control" id="washingTotalcost" name="washingTotalcost" >
                  </div>
                  <div class="form-group col-md-4">
                    <label for="machineTotalcost" active><b>Machine Total Cost:</b></label>
                    <input type="number" class="form-control" id="machineTotalcost" name="machineTotalcost" >
                  </div>
                 </div>
                 <div class="form-row">
                    <div class="form-group col-md-4">
                    <label for="finishingTotalcost" active><b>Finising Total Cost:</b></label>
                    <input type="number" class="form-control" id="finishingTotalcost" name="finishingTotalcost" >
                  </div>
                  <div class="form-group col-md-4">
                    <label for="cm" active><b>Cost of Making:</b></label>
                    <input type="number" class="form-control" id="cm" name="cm" >
                  </div>
                  <div class="form-group col-md-4">
                    <label for="profitPercentage" active><b>Profit Percentage/%:</b></label>
                    <input type="number" class="form-control" id="profitPercentage" name="profitPercentage" >
                  </div>
                  </div>

                  <hr>
                <div class="row">
                <div class="form-group col-md-4">
                    <label for="pc" active><b>Per PCS Making Cost: <span id="per_pcs_making_cost"></span> </b></label>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="cm" active><b>Total Making Cost: <span id="total_making_cost"></span> </b></label>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="total" active><b>Total Cost With Profit: <span id="total_making_cost_profit"></span> </b></label>
                  </div>
                 
                </div>

                 <div class="form-row">
                <div class="col-md-1"></div>
                <input id="calculate_btn" onclick="update_cost()" type="button" class="col-md-2 btn btn-danger" value="Calculate"> &nbsp;&nbsp;&nbsp;
                <input id="save_btn" type="submit" class="col-md-2 btn btn-success" value="Save">
                </div>
                
                </form>
                


<?php
include("merchandising2.php");


?>

<script>

// normal cost
var fabtotal = <?php echo $row['fabtotalprice']?? '0';?> ;
var totalwaste  = <?php echo $row['total_waste']?? '0';?> ;
var btotal = <?php echo $row['btotalprice']?? '0';?> ; 
var ftotal = <?php echo $row['ftotalprice']?? '0';?> ;
var dtotal = <?php echo $row['dtotalprice']?? '0';?> ;
var p_total = <?php echo $row['p_totalprice']?? '0';?> ;
var em_total = <?php echo $row['em_totalprice']?? '0';?> ;
var approximate_quantity = <?php echo $row['approximate_quantity']?? '0';?> ;



// making cost
var required_machine = <?php echo $row['required_machine']?? '0';?> ,
total_machine = <?php echo $row['no_of_machine']?? '0';?> ,
total_working_day = <?php echo $row['working_day']?? '0';?> ,
production_per_hr = <?php echo $row['production_per_hr']?? '0';?> ;




function update_cost()
{

  var normal_cost=(((fabtotal+(fabtotal*(totalwaste/100)))+(btotal+ftotal+dtotal+p_total+em_total))/approximate_quantity);


var overdying_cost = +document.getElementById("overdyingTotalcost").value,
Machine_cost = +document.getElementById("machineTotalcost").value ,
cost_Of_macking = +document.getElementById("cm").value ,
washing_cost = +document.getElementById("washingTotalcost").value ,
finishing_cost = +document.getElementById("finishingTotalcost").value,
profit_percentage = +document.getElementById("profitPercentage").value ;

var making_cost=(((overdying_cost + Machine_cost + cost_Of_macking + washing_cost + finishing_cost)*required_machine)/(total_machine*total_working_day*8*production_per_hr));



// main cost for One pecs
var maincostforOnepcs=normal_cost+making_cost;

// total makeing Cost
var totalmakeingCost=maincostforOnepcs*approximate_quantity;

var profit_with_cost=(totalmakeingCost+(totalmakeingCost*(profit_percentage/100)));



  document.getElementById("total_making_cost").innerHTML = document.getElementById("TMC").value = totalmakeingCost.toFixed(2);
  document.getElementById("total_making_cost_profit").innerHTML = document.getElementById("PWC").value = profit_with_cost.toFixed(2);
  document.getElementById("per_pcs_making_cost").innerHTML = document.getElementById("PMC").value = maincostforOnepcs.toFixed(2);


}

</script>