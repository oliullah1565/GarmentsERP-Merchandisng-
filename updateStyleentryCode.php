<?php

session_start();
if(!isset($_SESSION['uname']))
{
  header('location:Log_in.php');
}
         
?>

<?php
include("dbcon.php");

if ($_FILES["image1"]["name"] != null) {
    // echo ('please select an title image');
    // exit;


// valid extensions
$valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp');

$imgName = '';
$i = 0;
foreach($_FILES as $key => $image)
{
    //check if image is uploaded
    if($image['name']!='')
    {
        //validing extension
        $ext= strtolower(pathinfo($image['name'], PATHINFO_EXTENSION));
        if(in_array($ext, $valid_extensions))
        {
            $imgName = "img" . date('m') . date('H').date('s') . rand(0,9999).'.'.$ext;
            //moving file
            $path = './images/'.$imgName;
            $tmp  = $image['tmp_name'];
            if(move_uploaded_file($tmp,$path))
            {
                // $images[$i]=$imgName;
            }
            else
            {
                echo('<br>Faild to upload photo!!!<br>');
                exit;
            }
        }
        else
        {
            echo ('<br>please select an image file.<br>');
            exit;
        }
    }
    $i++;
}

//for style Entry main part insert


$order_id=$_POST['orderId'];
$buyer_name=$_POST['buyerName'];
$delivery_date=$_POST['deliveryDate'];
$entry_date=$_POST['entryDate'];
$style_no=$_POST['styleNo'];
$style_name=$_POST['styleName'];
$style_model=$imgName;
$description=$_POST['itemDescription'];
$approximate_quantity=$_POST['approximateQuantity'];
$xss=$_POST['xss'];
$xs=$_POST['xs'];
$s=$_POST['s'];
$m=$_POST['m'];
$l=$_POST['l'];
$xl=$_POST['xl'];
$xll=$_POST['xll'];

$style_update="UPDATE styleentry SET  buyer_name='$buyer_name', delivery_date='$delivery_date',entry_date='$entry_date',style_no='$style_no',style_name='$style_name',style_model='$style_model',description='$description',approximate_quantity='$approximate_quantity',xss='$xss',xs='$xs',s='$s',m='$m',l='$l',xl='$xl',xll='$xll' WHERE order_id='$order_id'";
}
else{
$order_id=$_POST['orderId'];
$buyer_name=$_POST['buyerName'];
$delivery_date=$_POST['deliveryDate'];
$entry_date=$_POST['entryDate'];
$style_no=$_POST['styleNo'];
$style_name=$_POST['styleName'];
$description=$_POST['itemDescription'];
$approximate_quantity=$_POST['approximateQuantity'];
$xss=$_POST['xss'];
$xs=$_POST['xs'];
$s=$_POST['s'];
$m=$_POST['m'];
$l=$_POST['l'];
$xl=$_POST['xl'];
$xll=$_POST['xll'];

$style_update="UPDATE styleentry SET  buyer_name='$buyer_name', delivery_date='$delivery_date',entry_date='$entry_date',style_no='$style_no',style_name='$style_name',description='$description',approximate_quantity='$approximate_quantity',xss='$xss',xs='$xs',s='$s',m='$m',l='$l',xl='$xl',xll='$xll' WHERE order_id='$order_id'";
}
// $style_update="UPDATE `styleentry` SET `order_id`=[$order_id],`buyer_name`=[$buyer_name],`delivery_date`=[$delivery_date],`entry_date`=[$entry_date],`style_no`=[$style_no],`style_name`=[$style_name],`style_model`=[$style_model],`description`=[$description],`approximate_quantity`=[$approximate_quantity],`xss`=[$xss],`xs`=[$xs],`s`=[$s],`m`=[$m],`l`=[$l],`xl`=[$xl],`xll`=[$xll] WHERE order_id='$order_id'";

if(mysqli_query($con,$style_update)==TRUE){
        header('location:view_all_styleEntry.php');
}
else{
    // 
    echo "Error: " . $style_update . "<br>" . $con->error;
}
?>