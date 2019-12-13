<?php
include("dbcon.php");
session_start();
if (!isset($_SESSION['uname'])) {
    echo 'signup first';
    header("Location:Log_in.php");
    exit;
}
if ($_FILES["image1"]["name"] == null) {
    echo ('please select an title image');
    exit;
}

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

$style_entry="INSERT INTO styleentry VALUES ('$order_id','$buyer_name','$delivery_date','$entry_date','$style_no','$style_name','$style_model','$description','$approximate_quantity','$xss','$xs','$s','$m','$l','$xl','$xll')";



//main query
$sql1=mysqli_query($con,$style_entry);

if ($sql1==true) {
	
   header('location: preOrder.php');
    }
    else{
    	    echo "Error: " . $sql1 . "<br>" . $con->error;
    }
?>
